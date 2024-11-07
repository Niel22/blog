<?php

namespace App\Livewire\Admin\RolesAndPermission;

use App\Models\Permission;
use Illuminate\Support\Str;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class Permissions extends Component
{
    use WithPagination, WithoutUrlPagination;

    public $name;

    public $permission_id;
    public $addPermissionForm = false;
    public $editPermissionForm = false;

    public function addPermission(){

        $this->reset(['name']);

        $this->addPermissionForm = !$this->addPermissionForm;
    }

    public function editPermission($id){

        $this->reset(['name']);

        $this->permission_id = $id;
        
        $this->editPermissionForm = !$this->editPermissionForm;

        $this->name = Permission::find($id)->name;
    }

    public function create(){
        $permission = (object) $this->validate([
            'name' => ['required', 'string']
        ]);

        Permission::create([
            'name' => Str::slug($permission->name)
        ]);

        $this->addPermissionForm = !$this->addPermissionForm;
        $this->reset(['name']);
    }

    public function update(){
        $permission = (object) $this->validate([
            'name' => ['required', 'string']
        ]);

        $editingPermission = Permission::where('id', $this->permission_id)->first();

        $editingPermission->update([
            'name' => Str::slug($permission->name)
        ]);

        $this->editPermissionForm = !$this->editPermissionForm;
        $this->reset(['name']);
    }

    public function delete($id){
        Permission::findOrFail($id)->delete();

        session()->flash('success','Deleted');
    }

    #[Layout("components.layouts.admin")]
    public function render()
    {
        $this->authorize('view-permissions', Permission::class);

        return view('livewire.admin.roles-and-permission.permissions', [
            'permissions' => Permission::with(['roleList'])->latest()->select(['id','name'])->paginate(5),
        ]);
    }
}
