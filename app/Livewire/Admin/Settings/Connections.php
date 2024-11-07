<?php

namespace App\Livewire\Admin\Settings;

use Livewire\Attributes\Layout;
use Livewire\Component;

class Connections extends Component
{
    #[Layout("components.layouts.admin")]
    public function render()
    {
        return view('livewire.admin.settings.connections');
    }
}
