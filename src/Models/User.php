<?php


namespace Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tblusers';

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
        'first_name',
        'last_name',
        'email',
        'password',
        'language',
        'second_factor',
        'second_factor_config',
        'remember_token',
        'reset_token',
        'security_question_id',
        'security_question_answer',
        'last_ip',
        'last_hostname',
        'last_login',
        'email_verification_token',
        'email_verification_token_expiry',
        'email_verified_at',
        'reset_token_expiry',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'second_factor',
        'second_factor_config',
        'reset_token',
        'security_question_answer',
        'email_verification_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'last_login' => 'datetime',
        'email_verification_token_expiry' => 'datetime',
        'email_verified_at' => 'datetime',
        'reset_token_expiry' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'security_question_id' => 'integer',
    ];

}