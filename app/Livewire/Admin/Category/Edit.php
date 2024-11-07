<?php

namespace App\Livewire\Admin\Category;

use App\Models\Category;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Edit extends Component
{
    public $slug;
    public $category;

    public $name, $color;

    public function update(){
        if(Gate::denies('edit-category', Category::class)){

            session()->flash('error','You are not authorized to edit a category');

            $this->redirectRoute('admin.categories');

            return;
        }

        $newCategory = (object) $this->validate([
            'name' => ['required', 'string'],
            'color' => ['required'],
        ]);

        $this->category->update([
            'name'=> $newCategory->name,
            'color'=> $newCategory->color,
            'slug' => Str::slug($newCategory->name),
        ]);

        session()->flash('success','Category updated successful');

        $this->redirectRoute('admin.categories');
    }

    public function mount(String $slug){
        $this->category =  Category::where("slug", $slug)->select(['id', 'name', 'color'])->firstOrFail();

        $this->slug = $slug;
        $this->name = $this->category['name'];
        $this->color = $this->category['color'];
    }

    #[Layout("components.layouts.admin")]
    public function render()
    {
        $this->authorize('edit-category', $this->category);

        return view('livewire.admin.category.edit');
    }
}
