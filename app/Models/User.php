<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'users';
    protected $primaryKey = 'id_user'; // 🔥 INI PENTING
    public $timestamps = true;

    protected $fillable = [
        'name',
        'email',
        'password',
        'id_level'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
}
