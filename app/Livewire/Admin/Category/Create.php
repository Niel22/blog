<?php

namespace App\Livewire\Admin\Category;

use App\Models\Category;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Create extends Component
{
    public $name, $color;
    
    public function create(){

        if(Gate::denies('create-category', Category::class)){

            session()->flash('error','You are not authorized to create a category');

            $this->redirectRoute('admin.categories');
        }
        
        $category = $this->validate([
            'name' => ['required', 'string'],
            'color' => ['required', 'unique:categories,color']
        ]);

        $category['slug'] = Str::slug($category['name']);

        Category::create($category);

        session()->flash('success','Category created');

        $this->redirectRoute('admin.categories');

    }

    #[Layout("components.layouts.admin")]
    public function render()
    {
        $this->authorize("create-category", Category::class);

        return view('livewire.admin.category.create');
    }
}
