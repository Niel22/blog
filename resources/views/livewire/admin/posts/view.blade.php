<div class="container-xxl flex-grow-1 container-p-y">
    <div class="col-md-12 col-12">
        <div class="card p-3">
            <h5 class="card-header">
                <h3 class="text-center">{{ $post->title }}</h3>
            </h5>
            <div class="card-body">
                <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->name }}" class="img-fluid rounded">
                <div class="mt-2 d-flex justify-content-between">
                    <label class="badge"
                        style="background-color: {{ $post->category->color }}">{{ $post->category->name }}
                    </label>
                    <div>
                        <span class="mr-3">
                            <i class="menu-icon tf-icons ti ti-calendar"></i>
                            <span class="post-date">{{ $post->created_at->format('D M d, Y') }}</span>
                        </span>
                        <span class="ml-3">
                            <i class="menu-icon tf-icons ti ti-users"></i>
                            <span class="author-name">{{ $post->user->name }}</span>
                        </span>
                    </div>
                </div>
            </div>
            <div class="card-body" style="text-align: justify">
                {!! nl2br(e($post->content)) !!}
            </div>
            <div class="card-footer d-flex align-items-center">
                <p>Tags: </p>
                @foreach (json_decode($post->tags) as $tag)
                    <p class="btn btn-outline-secondary btn-sm" style="margin-left: 5px">
                        #{{ $tag }}
                    </p>
                @endforeach
            </div>

            @if($post->published_at !== null)
            <div class="card-footer d-flex align-items-center">
                <p>Published: <span class="btn btn-secondary btn-sm">{{ \Carbon\Carbon::parse($post->published_at)->format('D M d, Y h:i A') }}</span></p>
            </div>
            @endif

            <div class="card-footer">
                <button onclick="window.history.back();" class="btn btn-primary btn-sm">Back</button>

                @can('publish', \App\Models\Post::class)
                    <button wire:click="publish('{{ $post->id }}')"
                        class="btn btn-sm btn-{{ $post->published ? 'danger' : 'warning' }}">
                        <span wire:loading.remove
                            wire:target="publish('{{ $post->id }}')">{{ $post->published ? 'Unpublish' : 'Publish' }}</span>
                        <x-spinner target="publish('{{ $post->id }}')" />
                    </button>
                @endcan

                <a href="{{ route('admin.posts.edit', $post->slug) }}" class="btn btn-info btn-sm">Edit</a>
                <button wire:click="delete('{{ $post->id }}')" class="btn btn-sm btn-danger">
                    <span wire:loading.remove wire:target="delete('{{ $post->id }}')">Delete</span>
                    <x-spinner target="delete('{{ $post->id }}')" />
                </button>
            </div>
        </div>
    </div>
</div>
