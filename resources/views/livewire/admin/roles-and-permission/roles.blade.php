<div class="container-xxl flex-grow-1 container-p-y">

    @php
        $hideRoles = false;
        if ($newRoleForm) {
            $hideRoles = $newRoleForm;
        } elseif ($editRoleForm) {
            $hideRoles = $editRoleForm;
        } else {
            $hideRoles = false;
        }
    @endphp

    @if (!$hideRoles)
        <h4 class="mb-1">Roles List</h4>

        <p class="mb-6">A role provided access to predefined menus and features so that depending on <br> assigned role
            an
            administrator can have access to what user needs.</p>
        <!-- Role cards -->
        <div class="row g-6">
            @foreach ($roles as $role)
                <div class="col-xl-4 col-lg-6 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <div>
                                <h6 class="fw-normal mb-0 text-body">Total {{ $role->users->count() }} users</h6>
                                <h6 class="fw-normal mb-0 text-body">Total {{ $role->permissionsList->count() }} Permissions</h6>
                            </div>
                                <x-spinner target="editRole('{{ $role->id }}')" />
                                <x-spinner target="delete('{{ $role->id }}')" />
                            </div>
                            <div class="d-flex justify-content-between align-items-end">
                                <div class="role-heading">
                                    <h5 class="mb-1 text-capitalize">{{ $role->name }}</h5>
                                    <a href="javascript:;" 
                                        wire:click="editRole('{{ $role->id }}')" class="role-edit-modal"><span>Edit
                                            Role</span></a>
                                </div>
                                <a href="javascript:void(0);" wire:click="delete('{{ $role->id }}')"><i class="ti ti-trash ti-md text-heading"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="col-xl-4 col-lg-6 col-md-6">
                <div class="card h-100">
                    <div class="row h-100">
                        <div class="col-sm-5">
                            <div class="d-flex align-items-end h-100 justify-content-center mt-sm-0 mt-4">
                                <img src="{{ asset('assets/img/illustrations/add-new-roles.png') }}"
                                    class="img-fluid mt-sm-4 mt-md-0" alt="add-new-roles" width="83">
                            </div>
                        </div>
                        <div class="col-sm-7">
                            <div class="card-body text-sm-end text-center ps-sm-0">
                                <x-spinner target="addNewRole" />
                                <button wire:click="addNewRole"
                                    class="btn btn-sm btn-primary mb-4 text-nowrap add-new-role">Add New Role</button>
                                <p class="mb-0"> Add new role, <br> if it doesn't exist.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
    <!--/ Role cards -->

    @if ($newRoleForm)
        <div class="col-xl-12 col-lg-12 col-md-12 mt-6">
            <div class="card">
                <div class="card-header">
                    <h3>Add New Role</h3>
                </div>
                <div class="card-body">
                    <form id="addRoleForm" class="row g-6" wire:submit="addRole">
                        <div class="col-12">
                            <label class="form-label" for="modalRoleName">Role Name</label>
                            <input wire:model="name" type="text" id="modalRoleName" name="modalRoleName"
                                class="form-control" placeholder="Enter a role name" tabindex="-1" />
                            @error('name')
                                <span class="text-sm text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-12">
                            <div class="permissions-list row">
                                <div class="col-12 row">
                                    @foreach ($permissionLists as $permission)
                                        <div class="form-check col-4">
                                            <input wire:model="permissions" class="form-check-input" type="checkbox"
                                                value="{{ $permission->id }}" id="" />
                                            <label class="form-check-label text-capitalize"
                                                for="view-users">{{ $permission->name }}</label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="col-12 text-center">
                            <button type="submit" class="btn btn-primary me-3">
                                <span wire:loading.remove wire:target="addRole">Submit</span>
                                <x-spinner target="addRole" />
                            </button>
                            <button type="reset" wire:click="addNewRole" class="btn btn-label-secondary">
                                <span wire:loading.remove wire:target="addNewRole">Cancel</span>
                                <x-spinner target="addNewRole" />
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endif

    @if ($editRoleForm)
        <div class="col-xl-12 col-lg-12 col-md-12 mt-6">
            <div class="card">
                <div class="card-header">
                    <h3>Edit Role</h3>
                </div>
                <div class="card-body">
                    <form id="addRoleForm" class="row g-6" wire:submit="updateRole">
                        <div class="col-12">
                            <label class="form-label" for="modalRoleName">Role Name</label>
                            <input wire:model="name" type="text" id="modalRoleName" name="modalRoleName"
                                class="form-control" placeholder="Enter a role name" tabindex="-1" />
                            @error('name')
                                <span class="text-sm text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-12">
                            @error('permission')
                                <span class="text-sm text-danger">{{ $message }}</span>
                            @enderror
                            <div class="permissions-list row">
                                <div class="col-12 row">
                                    @foreach ($permissionLists as $permission)
                                        <div class="form-check col-4">
                                            <input wire:model="permissions" class="form-check-input" type="checkbox"
                                                value="{{ $permission->id }}" id="" />
                                            <label class="form-check-label text-capitalize"
                                                for="view-users">{{ $permission->name }}</label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="col-12 text-center">
                            <button type="submit" class="btn btn-primary me-3">
                                <span wire:loading.remove wire:target="updateRole">Submit</span>
                                <x-spinner target="updateRole" />
                            </button>
                            <button wire:click="editRole('{{ 1 }}')" type="button" class="btn btn-label-secondary">
                                <span wire:loading.remove wire:target="editRole('{{ 1 }}')">Cancel</span>
                                <x-spinner target="editRole('{{ 1 }}')" />
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endif
    <!-- / Add Role Modal -->
</div>
