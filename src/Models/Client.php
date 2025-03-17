<?php

namespace Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tblclients';

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
        'uuid',
        'firstname',
        'lastname',
        'companyname',
        'email',
        'address1',
        'address2',
        'city',
        'state',
        'postcode',
        'country',
        'phonenumber',
        'tax_id',
        'password',
        'authmodule',
        'authdata',
        'currency',
        'defaultgateway',
        'credit',
        'taxexempt',
        'latefeeoveride',
        'overideduenotices',
        'separateinvoices',
        'disableautocc',
        'datecreated',
        'notes',
        'billingcid',
        'securityqid',
        'securityqans',
        'groupid',
        'cardtype',
        'cardlastfour',
        'bankname',
        'banktype',
        'gatewayid',
        'ip',
        'host',
        'status',
        'language',
        'pwresetkey',
        'emailoptout',
        'marketing_emails_opt_in',
        'overrideautoclose',
        'allow_sso',
        'email_verified',
        'email_preferences',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'cardnum',
        'startdate',
        'expdate',
        'issuenumber',
        'bankcode',
        'bankacct',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'taxexempt' => 'boolean',
        'latefeeoveride' => 'boolean',
        'overideduenotices' => 'boolean',
        'separateinvoices' => 'boolean',
        'disableautocc' => 'boolean',
        'datecreated' => 'date',
        'lastlogin' => 'datetime',
        'credit' => 'decimal:2',
        'marketing_emails_opt_in' => 'boolean',
        'overrideautoclose' => 'boolean',
        'allow_sso' => 'boolean',
        'email_verified' => 'boolean',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'pwresetexpiry' => 'datetime',
    ];
}
