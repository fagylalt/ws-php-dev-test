<?php

namespace Models;

use Illuminate\Database\Eloquent\Model;

class UserClient extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tblusers_clients';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'auth_user_id',
        'client_id',
        'invite_id',
        'owner',
        'permissions',
        'last_login',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'auth_user_id' => 'integer',
        'client_id' => 'integer',
        'invite_id' => 'integer',
        'owner' => 'boolean',
        'last_login' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Get the user that owns this association.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'auth_user_id');
    }

    /**
     * Get the client associated with this record.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id');
    }
}
