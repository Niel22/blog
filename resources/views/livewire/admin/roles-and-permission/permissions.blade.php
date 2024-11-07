<div class="container-xxl flex-grow-1 container-p-y">
    @php
        $showPermission = false;

        if($addPermissionForm){

            $showPermission = $addPermissionForm;    

        }elseif($editPermissionForm){

            $showPermission = $editPermissionForm;
        }else{
            $showPermission = false;
        }
    @endphp

    <!-- Permission Table -->
    @if(!$showPermission)
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h5 class="card-title">Permissions</h5>
            <button class="btn btn-primary" wire:click="addPermission">
                <span wire:loading.remove wire:target="addPermission">Add Permission</span>
                <x-spinner target="addPermission" />
            </button>
        </div>
        <div class="card-datatable table-responsive">
            <table class="datatables-permissions table border-top">
                <thead>
                    <tr>
                        <th>S/N</th>
                        <th>Name</th>
                        <th>Assigned To</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($permissions as $index => $permission)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $permission->name }}</td>
                            <td>{{ $permission->roleList->count() }} Roles</td>
                            <td>
                                <button wire:click="editPermission('{{ $permission->id }}')" class="btn btn-warning btn-sm">
                                    <span wire:loading.remove wire:target="editPermission('{{ $permission->id }}')">Edit</span>
                                    <x-spinner target="editPermission('{{ $permission->id }}')" />
                                </button>
                                <button wire:click="delete('{{ $permission->id }}')" class="btn btn-danger btn-sm">
                                    <span wire:loading.remove wire:target="delete('{{ $permission->id }}')">Delete</span>
                                    <x-spinner target="delete('{{ $permission->id }}')" />
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            {{ $permissions->links() }}
        </div>
    </div>
    @endif
    <!--/ Permission Table -->

    <!-- Add Permission Modal -->
    @if($addPermissionForm)
    <div class="col-xl-8 col-lg-8 col-md-12 mt-6 m-auto">
        <div class="card">
            <div class="card-body">
                <div class="text-center mb-6">
                    <h4 class="mb-2">Add New Permission</h4>
                    <p>Permissions you may use and assign to your users.</p>
                </div>
                <form id="addPermissionForm" class="row" wire:submit="create">
                    <div class="col-12 mb-4">
                        <label class="form-label" for="modalPermissionName">Permission Name</label>
                        <input wire:model="name" type="text" id="modalPermissionName" name="modalPermissionName" class="form-control"
                            placeholder="Permission Name" autofocus />
                            @error('name')
                                <span class="text-center text-sm text-danger">{{ $message }}</span>
                            @enderror
                    </div>
                    <div class="col-12 text-center demo-vertical-spacing">
                        <button type="submit" class="btn btn-primary me-4">
                            <span wire:loading.remove wire:target="create">Create Permission</span>
                            <x-spinner target="create" />
                        </button>

                        <button type="button" class="btn btn-label-secondary" wire:click="addPermission">
                            <span wire:loading.remove wire:target="addPermission">Discard</span>
                            <x-spinner target="addPermission" />
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endif
    <!--/ Add Permission Modal -->

    <!-- Edit Permission Modal -->
    @if($editPermissionForm)
    <div class="col-xl-8 col-lg-8 col-md-12 mt-6 m-auto">
        <div class="card">
            <div class="card-body">
                <div class="text-center mb-6">
                    <h4 class="mb-2">Edit Permission</h4>
                    <p>Permissions you may use and assign to your users.</p>
                </div>
                <form id="addPermissionForm" class="row" wire:submit="update">
                    <div class="col-12 mb-4">
                        <label class="form-label" for="modalPermissionName">Permission Name</label>
                        <input wire:model="name" type="text" id="modalPermissionName" name="modalPermissionName" class="form-control"
                            placeholder="Permission Name" autofocus />
                    </div>
                    <div class="col-12 text-center demo-vertical-spacing">
                        <button type="submit" class="btn btn-primary me-4">
                            <span wire:loading.remove wire:target="update">Update Permission</span>
                            <x-spinner target="update" />
                        </button>
                        <button type="reset" class="btn btn-label-secondary" wire:click="editPermission('{{ 1 }}')">
                            <span wire:loading.remove wire:target="editPermission('{{ 1 }}')">Discard</span>
                            <x-spinner target="editPermission('{{ 1 }}')" />
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endif
    <!--/ Edit Permission Modal -->
</div>
