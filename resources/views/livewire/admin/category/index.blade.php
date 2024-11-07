<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card">
        <div class="card-header border-bottom">
            <h5 class="card-title mb-0">Categories List</h5>
            {{-- @can('create', \App\Models\Category::class) --}}
            <div class="d-flex justify-content-end">
                <a href="{{ route('admin.categories.create') }}" class="btn btn-primary">Add Category</a>
            </div>
            {{-- @endcan --}}
        </div>
        <div class="table-responsive">
            <table class="table">
                <thead class="border-top">
                    <tr>
                        <th>S/N</th>
                        <th>Name</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Example Rows -->
                    @forelse($categories as $index => $category)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td><label class="badge" style="background-color: {{ $category->color }}">{{ $category->name }}</label></td>
                        <td>
                            @can('edit', \App\Models\Category::class)
                            <a href="{{ route('admin.categories.edit', $category->slug) }}" class="btn btn-sm btn-primary">Edit</a>
                            @else
                            <button disabled class="btn btn-sm btn-primary">
                                <span>Unauthorized</span>
                            </button>
                            @endcan

                            @can('delete', \App\Models\Category::class)
                            <button wire:click="delete('{{ $category->id }}')" class="btn btn-sm btn-danger">
                                <span wire:loading.remove wire:target="delete('{{ $category->id }}')">Delete</span>
                                <x-spinner target="delete('{{ $category->id }}')" />
                            </button>
                            @else
                            <button disabled class="btn btn-sm btn-danger">
                                <span>Unauthorized</span>
                            </button>
                            @endcan


                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="3">
                            <div class="alert alert-info text-center">No Categories</div>
                        </td>
                    </tr>
                    @endforelse
                    <!-- Repeat as needed -->
                </tbody>
            </table>
        </div>
    </div>
    
</div>
