<?php

namespace App\Livewire\Admin\Auth;

use Flux\Flux;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Login extends Component
{
    
    public $email, $password;

    protected $rules = [
        "email"=> ["required","email"],
        "password"=> ["required"],
    ];

    public function login(){
        $user = $this->validate();

        if(Auth::attempt($user)){

            session()->regenerate();

            $this->redirectRoute('admin.dashboard');

            session()->flash('success','Welcome Back');
        }else{
            $this->addError('email', 'Invalid email or password');
        }
    }

    #[Layout('components.layouts.auth')]
    public function render()
    {
        return view('livewire.admin.auth.login');
    }
}
