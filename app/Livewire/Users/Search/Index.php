<?php

namespace App\Livewire\Users\Search;

use Livewire\Component;

class Index extends Component
{
    public $query;

    public function mount($query = null){
        $this->query = $query;
    }

    public function render()
    {

        dd($this->query);
        return view('livewire.users.search.index');
    }
}
