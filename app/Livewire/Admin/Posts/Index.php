<?php

namespace App\Livewire\Admin\Posts;

use App\Models\Category;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\Livewire;

class Index extends Component
{

    public $status, $category, $date;

    public function delete($id)
    {
        
            try {
                $post = Post::findOrFail($id);

                if (Gate::denies('delete-posts', $post)) {
                    session()->flash('error', 'You are not authorized to delete this post');
                    return;
                }

                if ($post->image && file_exists(public_path('storage/' . $post->image))) {
                    unlink(public_path('storage/' . $post->image));
                }

                $post->delete();

                session()->flash('success', 'Post Deleted');
            } catch (\Exception $e) {
                session()->flash('error', "Post not found or already deleted");
            }
        
    }

    public function publish($id)
    {
        try {
            $post = Post::findOrFail($id);

            if (Gate::denies('publish-posts', $post)) {
                session()->flash('error', 'You are not authorized to publish posts on this platform');
                return;
            }

            $post->update([
                'published' => $post->published === 0 ? 1 : 0,
                'published_at' => $post->published === 0 ? Carbon::now() : null
            ]);

            session()->flash('success', 'Post Published');
        } catch (\Exception $e) {
            session()->flash('error', $e->getMessage());
        }
    }

    #[Layout("components.layouts.admin")]
    public function render()
    {
        $this->authorize('viewAny-posts', Post::class);

        return view('livewire.admin.posts.index', [
            'posts' => Post::when(!(Auth::user()->hasRole('admin') || Auth::user()->hasRole('editor')), function($q){
                return $q->where('user_id', Auth::user()->id);
            })
            ->select(['id', 'title', 'user_id', 'category_id', 'published', 'created_at', 'slug'])
                ->when($this->status != "", function ($q) {
                    return $q->where('published', $this->status);
                })
                ->when($this->category, function ($q) {
                    return $q->where('category_id', $this->category);
                })
                ->when($this->date, function ($q) {
                    return $q->whereDate('created_at', Carbon::parse($this->date)->format('Y-m-d'));
                })
                ->orderBy('created_at', 'desc')->get(),
            'categories' => Category::select(['id', 'name'])->get()
        ]);
        
    }
}
