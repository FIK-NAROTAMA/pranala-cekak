<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;

class Users extends Authenticatable
{
    use Notifiable;
    use CanResetPassword;

    protected $fillable = [
        'email_address',
        'password',
        'full_name',
        'active'
    ];
}
