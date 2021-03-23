<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Lumen\Auth\Authorizable;
class Users extends Model
{
    protected $table = 'users';

    protected $fillable = [
        'id', 
        'name', 
        'email', 
        'password', 
        'cnpj',
        'cpf',
        'type'
    ];

    public static $rules = [
        "name" => "required|max:120",
        "email" => "required|email|max:60",
        "type" => "required|max:10",
    ];

}
