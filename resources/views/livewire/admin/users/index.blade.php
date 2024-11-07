<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row g-6 mb-6">
        <!-- Session Card -->
        <div class="col-sm-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-start justify-content-between">
                        <div class="content-left">
                            <span class="text-heading">Session</span>
                            <div class="d-flex align-items-center my-1">
                                <h4 class="mb-0 me-2">21,459</h4>
                                <p class="text-success mb-0">(+29%)</p>
                            </div>
                            <small class="mb-0">Total Users</small>
                        </div>
                        <div class="avatar">
                            <span class="avatar-initial rounded bg-label-primary">
                                <i class="ti ti-users ti-26px"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Paid Users Card -->
        <div class="col-sm-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-start justify-content-between">
                        <div class="content-left">
                            <span class="text-heading">Paid Users</span>
                            <div class="d-flex align-items-center my-1">
                                <h4 class="mb-0 me-2">4,567</h4>
                                <p class="text-success mb-0">(+18%)</p>
                            </div>
                            <small class="mb-0">Last week analytics</small>
                        </div>
                        <div class="avatar">
                            <span class="avatar-initial rounded bg-label-danger">
                                <i class="ti ti-user-plus ti-26px"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Active Users Card -->
        <div class="col-sm-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-start justify-content-between">
                        <div class="content-left">
                            <span class="text-heading">Active Users</span>
                            <div class="d-flex align-items-center my-1">
                                <h4 class="mb-0 me-2">19,860</h4>
                                <p class="text-danger mb-0">(-14%)</p>
                            </div>
                            <small class="mb-0">Last week analytics</small>
                        </div>
                        <div class="avatar">
                            <span class="avatar-initial rounded bg-label-success">
                                <i class="ti ti-user-check ti-26px"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Pending Users Card -->
        <div class="col-sm-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-start justify-content-between">
                        <div class="content-left">
                            <span class="text-heading">Pending Users</span>
                            <div class="d-flex align-items-center my-1">
                                <h4 class="mb-0 me-2">237</h4>
                                <p class="text-success mb-0">(+42%)</p>
                            </div>
                            <small class="mb-0">Last week analytics</small>
                        </div>
                        <div class="avatar">
                            <span class="avatar-initial rounded bg-label-warning">
                                <i class="ti ti-user-search ti-26px"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Users List Table -->
    <div class="card">
        <div class="card-header border-bottom">
            <h5 class="card-title mb-0">Registered Users</h5>
            <div class="d-flex justify-content-between align-items-center row pt-4 gap-4 gap-md-0">
                <div class="col-md-4 user_role">
                    <!-- Role Filter -->
                    <select wire:model.live="filterRole" class="form-select">
                        <option value="">Select Role</option>
                        @foreach ($roles as $role)
                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table">
                <thead class="border-top">
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Posts</th>
                        <th>Joined</th>
                        @can('delete', \App\Models\User::class)
                            <th>Actions</th>
                        @endcan
                    </tr>
                </thead>
                <tbody>
                    @forelse($users as $index => $user)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td class="text-capitalize">
                                @if ($editingRole && $user_id == $user->id)
                                    <form class="d-flex" wire:submit="updateRole">
                                        <select wire:model="role" class="form-control text-capitalize">
                                            <option value="">Select role</option>
                                            @foreach ($roles as $role)
                                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                                            @endforeach
                                        </select>
                                        <button type="submit" class="btn btn-sm btn-success">
                                            <i wire:loading.remove wire:target="updateRole"
                                                class="menu-icon tf-icons ti ti-check"></i>
                                            <x-spinner target="updateRole" />
                                        </button>
                                    </form>
                                @else
                                    <span>
                                        {{ $user->roleName->name }}
                                        @can('update', \App\Models\User::class)
                                            <button wire:click="editRole('{{ $user->id }}')"
                                                class="btn btn-sm btn-success"><i class="menu-icon tf-icons ti ti-pencil"
                                                    wire:loading.remove wire:target="editRole('{{ $user->id }}')"></i>
                                                <x-spinner target="editRole('{{ $user->id }}')" />
                                            </button>
                                        @endcan
                                    </span>
                                @endif

                            </td>
                            <td>{{ $user->posts->count() }}</td>
                            <td>{{ $user->created_at->format('D M d, Y') }}</td>
                            @can('delete', \App\Models\User::class)
                                <td>
                                    <button wire:click="delete('{{ $user->id }}')" class="btn btn-sm btn-danger">
                                        <span wire:loading.remove wire:target="delete('{{ $user->id }}')">Delete</span>
                                        <x-spinner target="delete('{{ $user->id }}')" />
                                    </button>
                                </td>
                            @endcan
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7">
                                <div class="alert alert-info alert-sm text-dark text-center">No Users Found</div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
