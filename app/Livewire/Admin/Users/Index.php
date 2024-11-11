<?php

namespace App\Livewire\Admin\Users;

use App\Models\Roles;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Index extends Component
{
    public $filterRole;

    public $editingRole = false;
    public $user_id;
    public $role;

    
    public function editRole($id){

        if(Gate::denies('update-users', User::class)){
            session()->flash('error', 'You are not authorized to change a users role');
            return;
        }

        if($id == 1){
            session()->flash('error', 'Cannot change administrator role');
        }else{

            $this->editingRole = true;
            
            $this->user_id = $id;

            $this->role = User::find($id)->role;
        }
    }

    public function updateRole(){

        if(Gate::denies('update-users', User::class)){
            session()->flash('error', 'You are not authorized to change a users role');
            return;
        }

        if ($this->user_id == 1) {
            session()->flash('error', 'Cannot change administrator role');
        } else {

            $user = User::find($this->user_id);

            $data = (object) $this->validate([
                'role' => ['required', 'exists:roles,id']
            ]);

            $user->update([
                'role' => $data->role
            ]);

            $this->editingRole = false;
        }

    }

    public function delete($id){

        if(Gate::denies('delete-users', User::class)){
            session()->flash('error', 'You are not authorized to delete users');
            return;
        }

        $user = User::find($id);


        if($user->roleName->name == 'admin'){

            session()->flash('error','Cannot delete admin');
            
        }else{

            $user->delete();

            session()->flash('success','User deleted successfully');
        }
    }

    private function calculatePercentageChange($current, $previous)
    {
        if ($previous == 0) {
            return $current > 0 ? 100 : 0; 
        }

        return (($current - $previous) / $previous) * 100;
    }

    #[Layout("components.layouts.admin")]
    public function render()
    {
        $this->authorize('view-users', User::class);
        $lastWeek = Carbon::now()->subweek();

        // session
        $sessions = DB::table('sessions')->count();

        $all_users = User::count();
        $lastWeek_registered_users = User::where('created_at', '>=', $lastWeek)->count();
        $activeUser_change = $this->calculatePercentageChange($all_users, $lastWeek_registered_users);




        return view('livewire.admin.users.index', [
            'users' => User::when($this->filterRole, function($q){
                return $q->where('role', $this->filterRole);
            })->select(['id', 'name', 'email', 'role', 'created_at'])->get(),
            'roles' => Roles::select(['id', 'name'])->get(),
            'sessions' => $sessions,
            'all_users' => $all_users,
            'activeUser_change' => $activeUser_change
            
            
        ]);
    }
}
