<?php

namespace App\Livewire\Users\Home;

use App\Models\Category;
use App\Models\Post;
use Carbon\Carbon;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {

        $lastweek = Carbon::now()->subDays(7);
        $today = Carbon::today();
        $top_of_week = Post::where('published', 1)->whereBetween('created_at', [$lastweek, $today])->orderBy('views', 'desc')->first();
        $tops_of_week = null;
        if($top_of_week != null){
            $tops_of_week = Post::where('published', 1)->whereNot('id',$top_of_week->id)->whereBetween('created_at', [$lastweek, $today])->orderBy('views', 'desc')->limit(4)->get();
        }

        return view('livewire.users.home.index', [
            'hero_posts' => Post::where('published', 1)->orderBy('created_at', 'desc')->limit(4)->get(),
            'recent_posts' => Post::where('published', 1)->whereDate('created_at', $today)->orderBy('created_at', 'desc')->orderBy('views', 'desc')->get(),
            'top_of_week' => $top_of_week,
            'tops_of_week' => $tops_of_week,
            'categories' => Category::withCount('posts')->orderBy('posts_count', 'desc')->limit(4)->get(),
            'trending' => Post::where('published', 1)->orderBy('views', 'desc')->limit(6)->get()
        ]);
    }
}
