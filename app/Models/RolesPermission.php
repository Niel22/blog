<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RolesPermission extends Model
{
    protected $fillable = [
        'role_id',
        'permission_id'
    ];
}
