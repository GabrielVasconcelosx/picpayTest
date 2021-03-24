<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

class Users extends Model
{
    protected $table = 'users';

    protected $attributes = array(
        'is_shopkeeper' => 0
    );

    protected $fillable = [
        'id', 
        'name', 
        'email', 
        'password', 
        'cnpj',
        'cpf',
        'balance',
        'is_shopkeeper'
    ];

    public static $rules = [
        "name" => "required|max:120",
        "email" => "required|email|max:60",
        'cpf' => 'unique:users',
        'cnpj' => 'unique:users'
    ];

}
