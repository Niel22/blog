<?php

namespace App\Livewire\Users\Search;

use Livewire\Component;

class Widget extends Component
{
    public $query;

    public function search(){
        $this->redirectRoute('search');
    }

    public function render()
    {
        return view('livewire.users.search.widget');
    }
}
