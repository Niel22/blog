<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row g-6 mb-6">
        <!-- Total Posts Card -->
        <div class="col-sm-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-start justify-content-between">
                        <div class="content-left">
                            <span class="text-heading">Total Posts</span>
                            <div class="d-flex align-items-center my-1">
                                <h4 class="mb-0 me-2">{{ $total_posts }}</h4> <!-- Total number of posts -->
                                <p class="text-{{ $published_change > 10 ? "success" : "danger"}} mb-0">({{ $published_change >= 0 ? '+' : '' }}{{ number_format($published_change) }}%)</p> <!-- Published change percentage -->
                            </div>
                            <small class="mb-0">All Time</small>
                        </div>
                        <div class="avatar">
                            <span class="avatar-initial rounded bg-label-primary">
                                <i class="ti ti-file-text ti-26px"></i> <!-- Icon for posts -->
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
        <!-- Published Posts Card -->
        <div class="col-sm-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-start justify-content-between">
                        <div class="content-left">
                            <span class="text-heading">Published Posts</span>
                            <div class="d-flex align-items-center my-1">
                                <h4 class="mb-0 me-2">{{ $published_posts }}</h4> <!-- Number of published posts -->
                                <p class="text-{{ $published_change > 10 ? "success" : "danger"}} mb-0">({{ $published_change >= 0 ? '+' : '' }}{{ number_format($published_change) }}%)</p> <!-- Published change percentage -->
                            </div>
                            <small class="mb-0">Last week</small>
                        </div>
                        <div class="avatar">
                            <span class="avatar-initial rounded bg-label-success">
                                <i class="ti ti-checks"y></i> <!-- Icon for published posts -->
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
    
        <!-- Pending Posts Card -->
        <div class="col-sm-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-start justify-content-between">
                        <div class="content-left">
                            <span class="text-heading">Pending Posts</span>
                            <div class="d-flex align-items-center my-1">
                                <h4 class="mb-0 me-2">{{ $pending_posts }}</h4> <!-- Number of pending posts -->
                                <p class="text-{{ $pending_change > 10 ? "success" : "danger"}} mb-0">({{ $pending_change >= 0 ? '+' : '' }}{{ number_format($pending_change) }}%)</p> <!-- Pending change percentage -->
                            </div>
                            <small class="mb-0">Last week</small>
                        </div>
                        <div class="avatar">
                            <span class="avatar-initial rounded bg-label-danger">
                                <i class="ti ti-alert-circle ti-26px"></i> <!-- Icon for pending posts -->
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    

    <!-- Posts List Table -->
    <div class="card">
        <div class="card-header border-bottom">
            <div class="d-flex justify-content-between">
                <h5 class="card-title mb-0">Posts List</h5>
                <a href="{{ route('admin.posts.create') }}" class="btn btn-sm btn-primary">Add Post</a>
            </div>
            <div class="d-flex justify-content-between align-items-center row pt-4 gap-4 gap-md-0">
                <div class="col-md-4 post_status">
                    <!-- Status Filter -->
                    <select wire:model.live="status" class="form-select">
                        <option value="">Select Status</option>
                        <option value="1">Published</option>
                        <option value="0">Pending</option>
                    </select>
                </div>
                <div class="col-md-4 post_category">
                    <!-- Category Filter -->
                    <select wire:model.live="category" class="form-select">
                        <option value="">Select Category</option>
                        @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-4 post_author">
                    <!-- Author Filter -->
                    <input type="date" wire:model.live="date" class="form-control">
                </div>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table text-nowrap">
                <thead class="border-top">
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Category</th>
                        <th>Status</th>
                        <th>Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody wire:poll.5s>
                    <!-- Example Rows -->
                    @forelse($posts as $index => $post)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ substr($post->title, 0, 20) }}...</td>
                        <td>{{ $post->user->name }}</td>
                        <td><label class="badge" style="background-color: {{ $post->category->color }}">{{ $post->category->name }}</label></td>
                        <td>{{ $post->published ? 'Published' : 'Pending' }}</td>
                        <td>{{ $post->created_at->format('D M d, Y - h:i A') }}</td>
                        <td>
                            @can('publish', \App\Models\Post::class)
                            <button wire:click="publish('{{ $post->id }}')" class="btn btn-sm btn-{{ $post->published ? 'danger' : 'warning' }}">
                                <span wire:loading.remove wire:target="publish('{{ $post->id }}')">{{ $post->published ? 'Unpublish' : 'Publish' }}</span>
                                <x-spinner target="publish('{{ $post->id }}')" />
                            </button>
                            @endcan
                            <a href="{{ route('admin.posts.view', $post->slug) }}" class="btn btn-sm btn-success">View</a>
                            <a href="{{ route('admin.posts.edit', $post->slug) }}" class="btn btn-sm btn-info">Edit</a>
                            <button wire:click="delete('{{ $post->id }}')" class="btn btn-sm btn-danger">
                                <span wire:loading.remove wire:target="delete('{{ $post->id }}')">Delete</span>
                                <x-spinner target="delete('{{ $post->id }}')" />
                            </button>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7">
                            <div class="alert alert-primary text-center">No Posts Added Yet</div>
                        </td>
                    </tr>
                    @endforelse
                    <!-- Repeat as needed -->
                </tbody>
            </table>
            <div class="container pt-3">
            {{ $posts->links() }}
            </div>
        </div>
    </div>
</div>
