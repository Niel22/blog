<?php

namespace App\Livewire\Admin\Category;

use Livewire\Component;
use App\Models\Category;
use Exception;
use Illuminate\Support\Str;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Gate;
use Intervention\Image\Laravel\Facades\Image;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class Edit extends Component
{
    use WithFileUploads;

    public $slug;
    public $category;


    public $name, $color, $image, $newImage;

    public function update(){
        if(Gate::denies('edit-category', Category::class)){

            session()->flash('error','You are not authorized to edit a category');

            $this->redirectRoute('admin.categories');

            return;
        }

        $newCategory = (object) $this->validate([
            'name' => ['required', 'string'],
            'color' => ['required'],
            'newImage' => ['nullable', 'mimes:png,jpg,jpeg']
        ]);


        if ($newCategory->newImage != null) {


            $imageInstance = Image::read($newCategory->newImage->getRealPath());

            // Define acceptable width and height ranges
            $minWidth = 1000;
            $minHeight = 600;

            if (
                $imageInstance->width() < $minWidth || $imageInstance->height() < $minHeight
            ) {

                $this->reset('newImage');
                $this->addError('newImage', 'The image must not be less than 1000px wide and 600 px high.');
            } else {
                
                try {
                    
                    $imageInstance->cover(1920, 982);
                    $filename = time() . '.' . $this->newImage->getClientOriginalExtension();
                    $path = 'uploads/category';
                    $imageInstance->save($newCategory->newImage->getRealPath());

                    $newCategory->newImage = $newCategory->newImage->storeAs($path, $filename, 'public');



                    if ($this->category->image) {
                        if (file_exists(public_path('storage/' . $this->category->image))) {
                            unlink(public_path('storage/' . $this->category->image));
                        }
                    }


                    $this->category->update([
                        'name'=> $newCategory->name,
                        'color'=> $newCategory->color,
                        'slug' => Str::slug($newCategory->name),
                        'image' => $newCategory->newImage
                    ]);


                    session()->flash('success', 'Category updated successful');

                    $this->redirectRoute('admin.categories');

                } catch (Exception $e) {
                    $this->redirectRoute('admin.categories');
                    session()->flash('error', 'Category doesnt exist or has been deleted');
                }
            }
        } else {

            try {
                $this->category->update([
                    'name'=> $newCategory->name,
                    'color'=> $newCategory->color,
                    'slug' => Str::slug($newCategory->name),
                ]);


                session()->flash('success', 'Category updated successful');

                $this->redirectRoute('admin.categories');

            } catch (Exception $e) {
                $this->redirectRoute('admin.categories');
                session()->flash('error', 'Category doesnt exist or has been deleted');
            }
        }
    }

    public function mount(String $slug){
        $this->category =  Category::where("slug", $slug)->select(['id', 'name', 'color', 'image'])->firstOrFail();

        $this->slug = $slug;
        $this->name = $this->category['name'];
        $this->color = $this->category['color'];
        $this->image = $this->category['image'];
    }

    #[Layout("components.layouts.admin")]
    public function render()
    {
        $this->authorize('edit-category', $this->category);

        return view('livewire.admin.category.edit');
    }
}
