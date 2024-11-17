<?php

namespace App\Livewire\Users\Home;

use App\Models\Post;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.users.home.index', [
            'hero_posts' => Post::where('published', 1)->orderBy('created_at', 'desc')->limit(4)->get()
        ]);
    }
}
