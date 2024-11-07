<?php

namespace App\Livewire\Admin\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Register extends Component
{
    public $name, $email, $password;

    public function register(){
        $user = $this->validate([
            'name' => ['required','string','min:5'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required', 'min:8']
        ]);

        $user['role'] = 4;
        $newUser = User::create($user);

        Auth::login($newUser);

        session()->flash('success','Welcome '. $newUser->name .'');
        $this->redirectIntended('/admin/dashboard');

    }

    #[Layout('components.layouts.auth')]
    public function render()
    {
        return view('livewire.admin.auth.register');
    }
}
