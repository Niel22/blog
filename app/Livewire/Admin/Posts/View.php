<?php

namespace App\Livewire\Admin\Posts;

use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Support\Facades\Gate;
use Livewire\Attributes\Layout;
use Livewire\Component;

class View extends Component
{
    public $slug;

    public function mount($slug){
        $this->slug = $slug;
    }

    public function delete($id)
    {
        try {
            $post = Post::findOrFail($id);

            if (Gate::allows('delete-posts', $post)) {
                session()->flash('error', 'You are not authorized to delete this post');
                $this->redirectRoute('admin.posts');
            }

            if ($post->image && file_exists(public_path('storage/' . $post->image))) {
                unlink(public_path('storage/' . $post->image));
            }

            $post->delete();

            session()->flash('success', 'Post Deleted');

        } catch (\Exception $e) {
            session()->flash('error', 'post already deleted or doesnt exist');
            $this->redirectRoute('admin.posts');
        }
    }

    public function publish($id){
        try {
            $post = Post::findOrFail($id);

            if (Gate::denies('publish-posts', Post::class)) {
                session()->flash('error', 'You are not authorized to publish posts on this platform');
                return;
            }

            $post->update([
                'published' => $post->published === 0 ? 1 : 0,
                'published_at' => $post->published === 0 ? Carbon::now() : null
            ]);

            session()->flash('success', 'Post Published');

        }catch (\Exception $e) {
            $this->redirectRoute('admin.posts');
            session()->flash('error', 'post already deleted or doesnt exist');
        }
    }

    #[Layout("components.layouts.admin")]
    public function render()
    {
        $post = Post::where('slug', $this->slug)->firstOrFail();
        
        $this->authorize('view-post', $post);

        return view('livewire.admin.posts.view', [
            'post' => Post::where('slug', $this->slug)->select(['id', 'category_id', 'user_id', 'title', 'image', 'content', 'slug', 'published', 'tags', 'created_at', 'published_at'])->firstOrFail(),
        ]);
    }
}
