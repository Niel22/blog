<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserLogin extends Model
{
    protected $fillable = [
        'user_id',
        'browser',
        'device',
        'location',
        'last_login'
    ];
}
