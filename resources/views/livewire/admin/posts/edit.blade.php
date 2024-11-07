<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-xl mb-6">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Edit Post</h5>
                </div>
                <div class="card-body">
                    <form class="row" wire:submit="update">
                        <div class="mb-6 col-md-12">
                            <label class="form-label" for="basic-default-fullname">Title</label>
                            <input wire:model="title" type="text" class="form-control"
                                placeholder="e.g the reason why...">
                            @error('title')
                                <span class="text-sm text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-5 col-md-12">
                            <label for="category" class="form-label">Category</label>
                            <select wire:model="category_id" class="form-control">
                                <option value="">Select Category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('category')
                                <span class="text-sm text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-6 col-md-12">
                            <input type="file" wire:model="newImage" class="form-control">
                            <div class="mt-3">
                                @if($newImage)
                                <img src="{{ $newImage->temporaryUrl() }}" alt="" class="img-fluid" width="50%" height="auto">
                                @else
                                <img src="{{ asset('storage/'. $image) }}" width="50%" height="auto" class="img-fluid"
                                    alt="img placeholder">
                                @endif
                            </div>
                            @error('newImage')
                                <span class="text-sm text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-6 col-md-12">
                            <label class="form-label" for="basic-default-company">Content</label>
                            <textarea wire:model="content" rows="20" class="form-control"></textarea>
                            @error('content')
                                <span class="text-sm text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div wire:loading wire:target="photo" class="text-success">Uploading image...</div>
                        <button type="submit" class="btn btn-primary waves-effect waves-light">
                            <span wire:loading.remove wire:target="update">Create</span>
                            <x-spinner target="update" />
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
