<?php

namespace App\Livewire\Admin\Category;

use App\Models\Category;
use Illuminate\Support\Facades\Gate;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Index extends Component
{
    public function delete($id){
        $category = Category::find($id);
        
        if(Gate::denies("delete-category", Category::class)){
            session()->flash("error","You are not authorized to delete this category");
            return;
        }

        $category->delete();

        session()->flash("success","Category deleted");
    }

    #[Layout("components.layouts.admin")]
    public function render()
    {
        $this->authorize('view-categories', Category::class);

        return view('livewire.admin.category.index', [
            'categories' => Category::select(['id', 'name', 'color', 'slug'])->get()
        ]);
    }
}
