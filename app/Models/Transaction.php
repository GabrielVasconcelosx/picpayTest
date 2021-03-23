<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = 'type_users';

    protected $fillable = [
        'id', 
        'id_user_payer',
        'id_user_payee',
        'value'
    ];

    public static $rules = [
        "id_user_payer" => "required",
        "id_user_payee" => "required",
        "value" => "required",

    ];

}
