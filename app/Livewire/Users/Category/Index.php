<?php

namespace App\Livewire\Users\Category;

use App\Models\Category;
use Livewire\Component;

class Index extends Component
{
    public $category;

    public function mount($category_slug){
        $this->category = Category::where('slug', $category_slug)->first();
    }

    public function render()
    {
        return view('livewire.users.category.index');
    }
}
