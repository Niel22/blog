<?php

namespace App\Livewire\Admin\Settings;

use App\Models\UserDetails;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Connections extends Component
{
    public $editFacebook = false, $editInstagram = false, $editTwitter = false;

    public $facebookLink, $instagramLink, $twitterLink;

    public function editFacebookLink(){
        $this->reset('facebookLink');
        $this->editFacebook = !$this->editFacebook;
    }

    public function updateFacebookLink(){
        $data = (object) $this->validate([
            'facebookLink' => ['required', 'url']
        ]);


        $user = UserDetails::where('user_id', Auth::id())->firstOrFail();

        $user->update([
            'facebook' => $data->facebookLink
        ]);

        session()->flash('success', 'Facebook Link Updated');
        $this->editFacebook = false;
    }

    public function removeFacebookLink(){
        $user = UserDetails::where('user_id', Auth::id())->firstOrFail();

        $user->update([
            'facebook' => null
        ]);

        session()->flash('success', 'Facebook disconnected successfully');
    }

    public function editTwitterLink(){
        $this->reset('twitterLink');
        $this->editTwitter = !$this->editTwitter;
    }

    public function updateTwitterLink(){
        $data = (object) $this->validate([
            'twitterLink' => ['required', 'url']
        ]);


        $user = UserDetails::where('user_id', Auth::id())->firstOrFail();

        $user->update([
            'twitter' => $data->twitterLink
        ]);

        session()->flash('success', 'Twitter Link Updated');
        $this->editTwitter = false;
    }

    public function removeTwitterLink(){
        $user = UserDetails::where('user_id', Auth::id())->firstOrFail();

        $user->update([
            'twitter' => null
        ]);

        session()->flash('success', 'Twitter disconnected successfully');
    }

    public function editInstagramLink(){
        $this->reset('instagramLink');
        $this->editInstagram = !$this->editInstagram;
    }

    public function updateInstagramLink(){
        $data = (object) $this->validate([
            'instagramLink' => ['required', 'url']
        ]);


        $user = UserDetails::where('user_id', Auth::id())->firstOrFail();

        $user->update([
            'instagram' => $data->instagramLink
        ]);

        session()->flash('success', 'Instagram Link Updated');
        $this->editInstagram = false;
    }

    public function removeInstagramLink(){
        $user = UserDetails::where('user_id', Auth::id())->firstOrFail();

        $user->update([
            'instagram' => null
        ]);

        session()->flash('success', 'Instagram disconnected successfully');
    }
    

    #[Layout("components.layouts.admin")]
    public function render()
    {
        if(UserDetails::where('user_id', Auth::id())->first()){

            
            return view('livewire.admin.settings.connections');
        }

        abort(404);

    }
}
