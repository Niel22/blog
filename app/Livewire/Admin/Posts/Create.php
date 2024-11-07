<?php

namespace App\Livewire\Admin\Posts;

use App\Models\Category;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;
use Intervention\Image\Laravel\Facades\Image;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $title, $content, $category_id, $image, $tags = [], $newTag;

    public function addTag(){
        $data = (object) $this->validate([
            'newTag' => ['required', 'min:3', 'string']
        ]);

        if (!in_array($data->newTag, $this->tags)) {
            $this->tags[] = $data->newTag;
        }else{
            $this->addError('newTag', 'tag already added');
        }

        $this->reset('newTag');
    }

    public function removeTag($name){
        if(in_array($name, $this->tags)){

            $updated_tags = [];

            foreach($this->tags as $tag){
                if($tag !== $name ){
                    $updated_tags[] = $tag;
                }
            }

            $this->tags = $updated_tags;
        }
    }

    public function create()
    {
        if(Gate::denies('create-posts', Post::class)){
            session()->flash('error', 'You are not authorized to create a post on this platform');
            $this->redirectRoute('admin.posts');
        }
        $post = (object) $this->validate([
            'title' => ['required', 'string'],
            'content' => ['required', 'min:200'],
            'category_id' => ['required', 'integer', 'exists:categories,id'],
            'image' => ['required', 'mimes:jpeg,jpg'],
        ]);

        $imageInstance = Image::read($post->image->getRealPath());


        // Define acceptable width and height ranges
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
            $path = 'uploads/posts'; 
            $imageInstance->save($post->image->getRealPath());
            
            $post->image = $this->image->storeAs($path, $filename, 'public');

            $post->slug = Str::slug($post->title);

            $post->tags = json_encode($this->tags);
            

            Post::create([
                'title' => $post->title,
                'content' => $post->content,
                'user_id' => Auth::id(),
                'slug' => $post->slug,
                'category_id' => $post->category_id,
                'image' => $post->image,
                'tags' => $post->tags,
                'published' => Auth::user()->hasRole('admin') ? 1 : (Auth::user()->hasRole('editor') ? 1 : 0),
                'published_at' => Auth::user()->hasRole('admin') ? Carbon::now() : (Auth::user()->hasRole('editor') ? Carbon::now() : null),
            ]);

            session()->flash('success','Post Created Successfully');


            $this->redirectRoute('admin.posts');
            
        }

    }

    #[Layout("components.layouts.admin")]
    public function render()
    {
        $this->authorize('create-posts', Post::class);

        return view('livewire.admin.posts.create', [
            'categories' => Category::select(['id', 'name'])->get()
        ]);
    }
}
