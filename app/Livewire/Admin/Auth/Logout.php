<?php

namespace App\Livewire\Admin\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Logout extends Component
{
    public function logout(){
        Auth::logout();

        session()->invalidate();
 
        session()->regenerateToken();

        return redirect('/');

    }

    public function render()
    {
        return view('livewire.admin.auth.logout');
    }
}
