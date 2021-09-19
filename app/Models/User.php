<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as AuthUser;
// use Illuminate\Database\Eloquent\Model;

class User extends AuthUser
{
    use HasFactory;

    protected $table='tb_user';
    protected $primaryKey='id';

    public $fillable = ['name', 'username','password','email'];
}
