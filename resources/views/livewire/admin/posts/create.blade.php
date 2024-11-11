<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-xl mb-6">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Create New Post</h5>
                </div>
                <div class="card-body">
                    <form class="row" wire:submit="create">
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
                            <input type="file" accept="image/jpeg,image/jpg,image/png" wire:model="image" class="form-control">
                            <div class="mt-3">
                                @if ($image)
                                    <img src="{{ $image->temporaryUrl() }}" alt="" class="img-fluid"
                                        width="50%" height="auto">
                                @else
                                <div wire:loading.remove wire:target="image">
                                    <img src="{{ asset('assets/img/placeholder.jpg') }}" class="img-fluid"
                                        alt="img placeholder">
                                </div>


                                <div wire:loading wire:target="image">
                                    <img src="{{ asset('assets/img/loading-image.jpg') }}" class="img-fluid"
                                        alt="img placeholder">
                                </div>
                                @endif
                            </div>
                            <div wire:loading wire:target='image'>
                                <span class="text-info">Please wait while image is being uploaded...</span>
                            </div>
                            @error('image')
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

                        <div class="mb-6 col-md-12">
                            <div class="mb-6">
                                <label for="tags" class="form-label">Add Tags <small class="muted">(Enter a tag name and click enter.)</small></label>
                                <input wire:model="newTag" wire:keydown.enter.prevent="addTag" type="text" class="form-control mt-2">
                                @error('newTag')
                                <span class="text-sm text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            @if ($tags !== [])
                                @foreach ($tags as $tag)
                                    <p class="btn btn-sm btn-secondary">{{ $tag }} <button wire:click="removeTag('{{ $tag }}')" type="button"
                                            class="btn-close ms-2 btn-secondary"></button></p>
                                @endforeach
                            @endif
                        </div>

                        <button type="submit" class="btn btn-primary waves-effect waves-light">
                            <span wire:loading.remove wire:target="create">Create</span>
                            <x-spinner target="create" />
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
