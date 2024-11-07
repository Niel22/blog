<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    protected $table = "roles";

    protected $fillable = [
        'name'
    ];

    public function users(){
        return $this->hasMany(User::class, 'role', 'id');
    }

    public function permissionsList(){
        return $this->belongsToMany(Permission::class, 'roles_permissions', 'role_id','permission_id');
    }

    public function hasPermission($permission){
        $permissions = $this->permissionsList->pluck('name')->toArray();

        return in_array($permission, $permissions);
    }
}
