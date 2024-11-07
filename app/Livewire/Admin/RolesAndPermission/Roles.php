<?php

namespace App\Livewire\Admin\RolesAndPermission;

use App\Models\Permission;
use App\Models\Roles as ModelsRoles;
use App\Models\RolesPermission;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Roles extends Component
{
    public $name, $permissions = [];

    public $role_id;
    public $newRoleForm = false;
    public $editRoleForm = false;

    public function delete($id){
        if($id == 1 || $id == 2 || $id == 3 || $id == 4){
            session()->flash("error","Can't delete top roles");
        }else{
            ModelsRoles::find($id)->delete();
    
            session()->flash("success","Roles Deleted");
        }

    }

    public function addNewRole(){
        $this->reset(['name', 'permissions']);
        $this->newRoleForm = !$this->newRoleForm;
    }

    public function editRole($id){
        $this->reset(['name', 'permissions']);
        $this->editRoleForm = !$this->editRoleForm;

        $role = ModelsRoles::find($id);

        // dd($role->permissions);
        $this->role_id = $role->id;
        $this->name = $role->name;
        foreach ($role->permissionsList as $permission) {
            $this->permissions[] = $permission->id;
        }
    }

    public function updateRole(){
        
        
        $role = (object) $this->validate([
            'name' => ['required'],
            'permissions' => ['array']
        ]);
        
        $editingRole = ModelsRoles::where('id', $this->role_id)->first();
        
        $editingRole->update([
            'name' => $role->name
        ]);
        
        RolesPermission::where('role_id', $this->role_id)->delete();


        foreach($role->permissions as $permission){
            RolesPermission::create([
                'role_id' => $editingRole->id,
                'permission_id' => $permission
            ]);
        }

        $this->editRoleForm = false;
        $this->reset(['name', 'permissions']);
    }

    public function addRole(){
        $role = (object) $this->validate([
            'name' => ['required', 'unique:roles'],
            'permissions' => ['array'],
            'permissions.*' => ['integer', 'exists:permissions,id']
        ]);

        $newRole = ModelsRoles::create([
            'name' => $role->name
        ]);

        foreach($role->permissions as $permission){
            RolesPermission::create([
                'role_id' => $newRole->id,
                'permission_id' => $permission
            ]);
        }

        $this->newRoleForm = !$this->newRoleForm;
        $this->reset(['name', 'permissions']);
        session()->flash('success', 'Role Created');
    }

    #[Layout("components.layouts.admin")]
    public function render()
    {

        $this->authorize('view-roles', ModelsRoles::class);
        
        return view('livewire.admin.roles-and-permission.roles', [
            'roles' => ModelsRoles::select(['id', 'name'])->get(),
            'permissionLists' => Permission::select(['id','name'])->get(),
        ]);
    }
}
