<div class="nav-align-top" wire:ignore.self>
    <ul class="nav nav-pills flex-column flex-md-row mb-6 gap-2 gap-lg-0">
        <li class="nav-item"><a class="nav-link {{ Route::is('admin.account') ? 'active' : "" }} waves-effect waves-light" href="{{ route('admin.account') }}"><i
                    class="ti-sm ti ti-users me-1_5"></i> Account</a></li>
        <li class="nav-item"><a class="nav-link {{ Route::is('admin.security') ? 'active' : "" }} waves-effect waves-light" href="{{ route('admin.security') }}"><i
                    class="ti-sm ti ti-lock me-1_5"></i>
                Security</a></li>
        <li class="nav-item"><a class="nav-link {{ Route::is('admin.connection') ? 'active' : "" }} waves-effect waves-light"
                href="{{ route('admin.connection') }}"><i class="ti-sm ti ti-link me-1_5"></i>
                Connections</a></li>
    </ul>
</div>
