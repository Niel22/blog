<?php

namespace App\Livewire\Users\Search;

use App\Models\Category;
use App\Models\Post;
use Livewire\Component;

class Index extends Component
{
    public $posts, $query;

    public function mount($query = null){

        
        if($query != null){
            // $this->query = $query;
            $categories = Category::where('name', 'like', '%'.$query.'%')->get();

            $post_title = Post::where('title', 'like', '%'.$query.'%')->get();

            $post_tags = Post::whereJsonContains('tags', $query)->get();
            
            $post_content = Post::where('content', 'like', '%'.$query.'%')->get();

            $this->posts = collect(); 
            
            if($categories->isNotEmpty()){

                $category_ids = $categories->pluck('id');

                $category_posts = Post::whereIn('category_id', $category_ids)->get();

                $this->posts = $this->posts->merge($category_posts);
            }

            

            if($post_title->isNotEmpty()){
                $this->posts = $this->posts->merge($post_title);
            }
            
            if($post_content->isNotEmpty()){
                $this->posts = $this->posts->merge($post_content);
            }

            if($post_tags->isNotEmpty()){
                $this->posts = $this->posts->merge($post_tags);
            }
            
            $this->posts = $this->posts->unique('id');

            $this->posts = $this->posts->sortByDesc('views')->values();

            return;

        }

        return abort(404);
    }

    public function render()
    {

        
        return view('livewire.users.search.index');
    }
}
