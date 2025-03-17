- Milyen IDE-t, tool-t használtál a megoldáshoz?
  - PHPStorm, igen, Copilot-ot
- Honnan szerezted be az esetleges hiányzó infót?
    - PHP wiki, illuminate/database dokumentációja
- Körülbelül mennyi időre volt szükség a megoldáshoz? 
  - Körülbelül ~6 órámba telt megoldani a feladatot. 
- Találkoztál olyan fogalommal, megoldással a feladat implementálása közben, ami eddigi karriered során nem jelent meg? Mi volt az?
- Volt olyan rész, ami nehézséget okozott? Miért?
  - A táblák mérete miatt a sémák fejben tartása, és azok összehasonlítása volt a legnehezebb számomra, többszöri átolvasást igényelt.


A projektet legkönnyebben docker segítségével lehet elindítani, a következő paranccsal:
### Első indításnál
.env_example fájl alapján készíteni egy .env fájlt, és a hiányzó adatokat kitölteni a felhasználó által választottakkal.

```bash
  composer install
```
Ezután:

```bash
  docker compose up --build
```
### Minden további indításnál
```bash
  docker compose up
```
egy másik terminál ablakban pedig:

```bash
  docker compose exec app php migration_prepare.php
```

ezzel az sql paranccsal pedig ellenőrizni lehet a migrációt:

```sql
SELECT
    'Schema A' AS source_schema,
    u.first_name AS user_firstname,
    c.firstname AS client_name
FROM schema_a.tblusers_clients uc
         JOIN schema_a.tblusers u ON uc.auth_user_id = u.id
         JOIN schema_a.tblclients c ON uc.client_id = c.id

UNION ALL

SELECT
    'Schema B' AS source_schema,
    u.first_name AS user_firstname,
    c.firstname AS client_name
FROM schema_b.tblusers_clients uc
         JOIN schema_b.tblusers u ON uc.auth_user_id = u.id
         JOIN schema_b.tblclients c ON uc.client_id = c.id

ORDER BY user_firstname, client_name;
```