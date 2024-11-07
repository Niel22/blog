<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $fillable = [
        'name'
    ];

    public function roleList(){
        return $this->belongsToMany(Roles::class, 'roles_permissions','permission_id', 'role_id');
    }
}
