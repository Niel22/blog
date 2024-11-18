<?php

namespace App\Livewire\Users\Category;

use App\Models\Category;
use App\Models\Post;
use Livewire\Component;

class Index extends Component
{
    public $category, $posts, $perPage = 6;

    public function mount($category_slug){
        $this->category = Category::where('slug', $category_slug)->first();

    }
    
    public function loadMore(){
        $total_posts = $this->category->posts->count();
        
        if($total_posts > 5){
            
            $this->perPage = $this->perPage + 5;
        }else{
            $this->perPage = $this->perPage + ($total_posts - $this->perPage);
        }
        
    }
    
    public function render()
    {
        $this->posts = Post::where('category_id', $this->category->id)->orderBy('created_at', 'desc')->limit($this->perPage)->get();

        return view('livewire.users.category.index');
    }
}
