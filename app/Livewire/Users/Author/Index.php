<?php

namespace App\Livewire\Users\Author;

use App\Models\Post;
use App\Models\User;
use Illuminate\Contracts\Encryption\DecryptException;
use Livewire\Component;

class Index extends Component
{
    public $author, $posts, $perPage = 6;

    public function mount($author){
        try{
        $id = decrypt($author);

        $this->author = User::where('id', $id)->firstOrFail();
        
        } catch(DecryptException $e){
            abort(404, 'This author was not found');
        }

    }
    
    public function loadMore(){
        $total_posts = $this->author->posts->count();
        
        if($total_posts > 5){
            
            $this->perPage = $this->perPage + 5;
        }else{
            $this->perPage = $this->perPage + ($total_posts - $this->perPage);
        }
        
    }

    public function render()
    {
        $this->posts = Post::where('user_id', $this->author->id)->orderBy('created_at', 'desc')->limit($this->perPage)->get();
        return view('livewire.users.author.index');
    }
}
