<?php

namespace Chatty\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'username',
		'email',
		'password',
		'firstname',
		'lastname',
		'location',
    ];

    protected $hidden = [
        'password',
		'remember_token',
    ];
}
