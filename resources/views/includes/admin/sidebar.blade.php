<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">


    <div class="app-brand demo ">
      <a href="{{ route('admin.dashboard') }}" class="app-brand-link">
        <span class="app-brand-logo demo">
          <svg width="32" height="22" viewBox="0 0 32 22" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" clip-rule="evenodd"
              d="M0.00172773 0V6.85398C0.00172773 6.85398 -0.133178 9.01207 1.98092 10.8388L13.6912 21.9964L19.7809 21.9181L18.8042 9.88248L16.4951 7.17289L9.23799 0H0.00172773Z"
              fill="#7367F0" />
            <path opacity="0.06" fill-rule="evenodd" clip-rule="evenodd"
              d="M7.69824 16.4364L12.5199 3.23696L16.5541 7.25596L7.69824 16.4364Z" fill="#161616" />
            <path opacity="0.06" fill-rule="evenodd" clip-rule="evenodd"
              d="M8.07751 15.9175L13.9419 4.63989L16.5849 7.28475L8.07751 15.9175Z" fill="#161616" />
            <path fill-rule="evenodd" clip-rule="evenodd"
              d="M7.77295 16.3566L23.6563 0H32V6.88383C32 6.88383 31.8262 9.17836 30.6591 10.4057L19.7824 22H13.6938L7.77295 16.3566Z"
              fill="#7367F0" />
          </svg>
        </span>
        <span class="app-brand-text demo menu-text fw-bold">Blog</span>
      </a>

      <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
        <i class="ti menu-toggle-icon d-none d-xl-block align-middle"></i>
        <i class="ti ti-x d-block d-xl-none ti-md align-middle"></i>
      </a>
    </div>

    <div class="menu-inner-shadow"></div>



    <ul class="menu-inner py-1">
      <!-- Dashboards -->
      <li class="menu-item {{ Route::is('admin.dashboard') ? 'active' : '' }}">
        <a href="{{ route('admin.dashboard') }}" class="menu-link">
          <i class="menu-icon tf-icons ti ti-smart-home"></i>
          <div data-i18n="Dashboards">Dashboards</div>
        </a>
      </li>

      <!-- Apps & Pages -->
      <li class="menu-header small">
        <span class="menu-header-text" data-i18n="Apps & Pages">Apps &amp; Pages</span>
      </li>

      @can('viewAny', \App\Models\User::class)
      <li class="menu-item {{ Route::is('admin.users') ? 'active' : '' }}">
        <a href="{{ route('admin.users') }}" class="menu-link">
          <i class="menu-icon tf-icons ti ti-users"></i>
          <div data-i18n="Users">Users</div>
        </a>
      </li>
      @endcan

      @can('viewAny', \App\Models\Permission::class)
      <li class="menu-item {{ Route::is('admin.roles') ? 'active' : (Route::is('admin.permissions') ? 'active' : '')}}" style="">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
          <i class="menu-icon tf-icons ti ti-settings"></i>
          <div data-i18n="Roles &amp; Permissions">Roles &amp; Permissions</div>
        </a>
        <ul class="menu-sub">
          <li class="menu-item {{ Route::is('admin.roles') ? 'active' : '' }}">
            <a href="{{ route('admin.roles') }}" class="menu-link">
              <div data-i18n="Roles">Roles</div>
            </a>
          </li>
          <li class="menu-item {{ Route::is('admin.permissions') ? 'active' : '' }}">
            <a href="{{ route('admin.permissions') }}" class="menu-link">
              <div data-i18n="Permission">Permission</div>
            </a>
          </li>
        </ul>
      </li>
      @endcan

      @can('viewAny', \App\Models\Category::class)
      <li class="menu-item {{ Route::is('admin.categories') ? 'active' : '' }}">
        <a href="{{ route('admin.categories') }}" class="menu-link">
          <i class="menu-icon tf-icons ti ti-tags"></i>
          <div data-i18n="Categories">Categories</div>
      </a>      
      </li>
      @endcan

      @can('viewAny', \App\Models\Post::class)
      <li class="menu-item {{ Route::is('admin.posts') ? 'active' : '' }}">
        <a href="{{ route('admin.posts') }}" class="menu-link">
          <i class="menu-icon tf-icons ti ti-file-text"></i> <!-- Changed to a file icon -->
          <div data-i18n="Posts">Posts</div>
      </a>   
      </li>
      @endcan
      
      <li class="menu-item {{ (Route::is('admin.account') || Route::is('admin.security') || Route::is('admin.connection')) ? 'active' : '' }}">
        <a href="{{ route('admin.account') }}" class="menu-link">
          <i class="menu-icon tf-icons ti ti-settings"></i>
          <div data-i18n="Settings">Settings</div>
      </a>      
      </li>
    </ul>



  </aside>