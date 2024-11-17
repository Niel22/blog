<?php

namespace App\Livewire\Admin\Posts;

use App\Models\Category;
use App\Models\Post;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Laravel\Facades\Image;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use WithFileUploads;

    public $title, $content, $category_id, $image, $newImage;
    public $slug;

    public function mount($slug)
    {
        $this->slug = $slug;
        $post = Post::where('slug', $slug)->firstOrFail();

        $this->title = $post->title;
        $this->content = $post->content;
        $this->category_id = $post->category_id;
        $this->image = $post->image;
    }

    public function update()
    {
        $post = (object) $this->validate([
            'title' => ['required', 'string'],
            'content' => ['required', 'min:200'],
            'category_id' => ['required', 'integer', 'exists:categories,id'],
            'newImage' => ['nullable', 'mimes:jpeg,jpg']
        ]);

        $post->slug = Str::slug($post->title);


        if ($post->newImage != null) {


            $imageInstance = Image::read($post->newImage->getRealPath());

            // Define acceptable width and height ranges
            $minWidth = 1000;
            $minHeight = 600;

            if (
                $imageInstance->width() < $minWidth || $imageInstance->height() < $minHeight
            ) {

                $this->reset('image');
                $this->addError('image', 'The image must not be less than 1000px wide and 600 px high.');
            } else {
                try {
                    
                    $oldPost = Post::where('slug', $this->slug)->firstOrFail();

                    
                    if(Gate::denies('update-posts', $oldPost)){
                        session()->flash('error', 'You are not authorized to update this post');
                        $this->redirectRoute('admin.posts');
                    }
                    
                    $imageInstance->cover(1920, 982);
                    
                    $filename = time() . '.' . $this->newImage->getClientOriginalExtension();
                    $path = 'uploads/posts';
                    $imageInstance->save($post->newImage->getRealPath());
                    
                    $post->newImage = $post->newImage->storeAs($path, $filename, 'public');
                    
                    

                    if (file_exists(public_path('storage/' . $oldPost->image))) {
                        unlink(public_path('storage/' . $oldPost->image));
                    }

                    $oldPost->update([
                        'title' => $post->title,
                        'content' => $post->content,
                        'slug' => $post->slug,
                        'category_id' => $post->category_id,
                        'image' => $post->newImage,
                        'published' => Auth::user()->hasRole('admin') ? 1 : (Auth::user()->hasRole('editor') ? 1 : 0)
                    ]);



                    session()->flash('success', 'Post Updated Successfully');

                    $this->redirectRoute('admin.posts');
                } catch (Exception $e) {
                    $this->redirectRoute('admin.posts');
                    session()->flash('error', 'Post doesnt exist or has been deleted');
                }
            }
        } else {

            try {
                $oldPost = Post::where('slug', $this->slug)->firstOrFail();

                if(Gate::denies('update-posts', $oldPost)){
                    session()->flash('error', 'You are not authorized to update this post');
                    $this->redirectRoute('admin.posts');
                }

                $oldPost->update([
                    'title' => $post->title,
                    'content' => $post->content,
                    'slug' => $post->slug,
                    'category_id' => $post->category_id,
                    'published' => Auth::user()->hasRole('admin') ? 1 : (Auth::user()->hasRole('editor') ? 1 : 0)
                ]);

                session()->flash('success', 'Post Updated Successfully');

                $this->redirectRoute('admin.posts');
            } catch (Exception $e) {
                $this->redirectRoute('admin.posts');
                session()->flash('error', 'Post doesnt exist or has been deleted');
            }
        }
    }

    #[Layout("components.layouts.admin")]
    public function render()
    {
        $post = Post::where('slug', $this->slug)->firstOrFail();

        $this->authorize('update-posts', $post);

        return view('livewire.admin.posts.edit', [
            'categories' => Category::select(['id', 'name'])->get()
        ]);
    }
}
