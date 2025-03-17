<?php

namespace Migrations;

use Illuminate\Database\Connection;

require_once "../Config/bootstrap.php";

class SchemaMigrator
{

    private array $clientIdMap = [];
    private array $userIdMap = [];

    public function __construct(private readonly Connection $sourceDb, private readonly Connection $targetDb)
    {
    }

    public function migrate(): void
    {
        $this->beginTransaction();

        try {
            $this->migrateClients();
            $this->migrateUsers();
            $this->migrateUserClients();

            $this->commitTransaction();
            echo "Migration completed successfully.\n";
        } catch (\Exception $e) {
            $this->rollbackTransaction();
            echo "Migration failed: " . $e->getMessage() . "\n";
        }
    }

    private function migrateClients(): void
    {
        echo "Migrating clients...\n";

        $clients = $this->sourceDb->table('tblclients')->get();

        foreach ($clients as $client) {
            $oldId = $client->id;
            $clientData = (array) $client;
            unset($clientData['id']);

            $newId = $this->targetDb->table('tblclients')->insertGetId($clientData);
            $this->clientIdMap[$oldId] = $newId;
        }

        echo "Migrated " . count($clients) . " clients.\n";
    }

    private function migrateUsers(): void
    {
        echo "Migrating users...\n";

        $users = $this->sourceDb->table('tblusers')->get();

        foreach ($users as $user) {
            $oldId = $user->id;
            $userData = (array) $user;
            unset($userData['id']);

            $newId = $this->targetDb->table('tblusers')->insertGetId($userData);
            $this->userIdMap[$oldId] = $newId;
        }

        echo "Migrated " . count($users) . " users.\n";
    }

    private function migrateUserClients(): void
    {
        echo "Migrating user-client relationships...\n";

        $userClients = $this->sourceDb->table('tblusers_clients')->get();

        foreach ($userClients as $userClient) {
            $userClientData = (array) $userClient;
            unset($userClientData['id']);

            $userClientData['auth_user_id'] = $this->userIdMap[$userClient->auth_user_id] ?? null;
            $userClientData['client_id'] = $this->clientIdMap[$userClient->client_id] ?? null;

            if (!$userClientData['auth_user_id'] || !$userClientData['client_id']) {
                echo "Skipping relationship due to missing user or client.\n";
                continue;
            }

            $this->targetDb->table('tblusers_clients')->insert($userClientData);
        }

        echo "Migrated " . count($userClients) . " user-client relationships.\n";
    }

    private function beginTransaction(): void
    {
        $this->targetDb->beginTransaction();
    }

    private function commitTransaction(): void
    {
        $this->targetDb->commit();
    }

    private function rollbackTransaction(): void
    {
        if ($this->targetDb->getPdo()->inTransaction()) {
            $this->targetDb->rollBack();
        }
    }
}
