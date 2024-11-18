<?php

namespace App\Livewire\Users\Post;

use App\Models\Category;
use App\Models\Post;
use Livewire\Component;

class Details extends Component
{
    public $category, $post, $posts, $previous, $next;


    public function mount($category_slug, $post_slug){
        
        $this->category = Category::where('slug', $category_slug)->firstOrFail();
        $this->post = Post::where('slug', $post_slug)->firstOrFail();
        $this->posts = Post::where('category_id', $this->category->id)->whereNot('id', $this->post->id)->orderBy('created_at', 'desc')->limit(4)->get();

        $this->previous = Post::where('id', '<', $this->post->id)->orderBy('id', 'desc')->first();
        $this->next = Post::where('id', '>', $this->post->id)->orderBy('id', 'asc')->first();

    }
    
    public function render()
    {
        $this->post->increment('views');
        
        return view('livewire.users.post.details');
    }
}
