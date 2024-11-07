<?php

namespace App\Livewire\Admin\Settings;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Security extends Component
{
    public $current_password, $password, $password_confirmation;

    public function update()
    {
        $password = $this->validate([
            'current_password' => ['required'],
            'password' => ['required', 'confirmed']
        ]);

        try {
            $user = User::where('id', Auth::id())->firstOrFail();

            if (Hash::check($this->current_password, $user->password)) {
                $user->password = Hash::make($this->password);
                $user->save();

                session()->flash('success', 'Password changed');
                $this->reset(['current_password', 'password', 'password_confirmation']);
            }else{
                $this->addError('current_password', 'The password you inputted does not match your current password');
            }
        } catch (\Exception $e) {
            session()->flash('error', 'This account does not exist');
            $this->redirectRoute('/');
        }
    }

    #[Layout("components.layouts.admin")]
    public function render()
    {
        return view('livewire.admin.settings.security');
    }
}
