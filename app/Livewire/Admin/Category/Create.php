<?php

namespace App\Livewire\Admin\Category;

use Livewire\Component;
use App\Models\Category;
use Illuminate\Support\Str;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Gate;
use Intervention\Image\Laravel\Facades\Image;
use Livewire\WithFileUploads;

class Create extends Component
{

    use WithFileUploads;
    
    public $name, $color, $image;
    
    public function create(){

        if(Gate::denies('create-category', Category::class)){

            session()->flash('error','You are not authorized to create a category');

            $this->redirectRoute('admin.categories');
        }
        
        $category = $this->validate([
            'name' => ['required', 'string'],
            'color' => ['required', 'unique:categories,color'],
            'image' => ['required', 'mimes:png,jpg,jpeg']
        ]);

        $category['slug'] = Str::slug($category['name']);

        $imageInstance = Image::read($category['image']->getRealPath());

        $minWidth = 1000;
        $minHeight = 600;

        if (
            $imageInstance->width() < $minWidth || $imageInstance->height() < $minHeight
        ) {
            
            $this->reset('image');
            $this->addError('image', 'The image must not be less than 1000px wide and 600 px high.');
        }else{
            $imageInstance->cover(1920, 982);
            $filename = time() . '.' . $this->image->getClientOriginalExtension();
            $path = 'uploads/category'; 
            $imageInstance->save($category['image']->getRealPath());
            
            $category['image'] = $this->image->storeAs($path, $filename, 'public');

           
            Category::create($category);
    
            session()->flash('success','Category created');
    
            $this->redirectRoute('admin.categories');
            
        }


    }

    #[Layout("components.layouts.admin")]
    public function render()
    {
        $this->authorize("create-category", Category::class);

        return view('livewire.admin.category.create');
    }
}
