<?php

use App\Livewire\Admin\Auth\Login;
use App\Livewire\Admin\Auth\Register;
use App\Livewire\Admin\Category\Create;
use App\Livewire\Admin\Category\Edit;
use App\Livewire\Admin\Category\Index as CategoryIndex;
use App\Livewire\Admin\Dashboard;
use App\Livewire\Admin\Posts\Create as PostsCreate;
use App\Livewire\Admin\Posts\Edit as PostsEdit;
use App\Livewire\Admin\Posts\Index as PostsIndex;
use App\Livewire\Admin\Posts\View;
use App\Livewire\Admin\RolesAndPermission\Permissions;
use App\Livewire\Admin\RolesAndPermission\Roles;
use App\Livewire\Admin\Settings\Account;
use App\Livewire\Admin\Settings\Connections;
use App\Livewire\Admin\Settings\Index as SettingsIndex;
use App\Livewire\Admin\Settings\Security;
use App\Livewire\Admin\Users\Index;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'admin', 'as' => 'admin',], function () {

    Route::group(['middleware' => 'adminAccess'], function () {
        Route::get('dashboard', Dashboard::class)->name('.dashboard');
        Route::get('users', Index::class)->name('.users');

        // Posts
        Route::get('posts', PostsIndex::class)->name('.posts');
        Route::get('posts/create', PostsCreate::class)->name('.posts.create');
        Route::get('posts/{slug}', View::class)->name('.posts.view');
        Route::get('posts/{slug}/edit', PostsEdit::class)->name('.posts.edit');

        // Category
        Route::get('categories', CategoryIndex::class)->name('.categories');
        Route::get('categories/create', Create::class)->name('.categories.create');
        Route::get('categories/{slug}/edit', Edit::class)->name('.categories.edit');

        Route::get('account-settings', Account::class)->name('.account');
        Route::get('security-settings', Security::class)->name('.security');
        Route::get('connections-settings', Connections::class)->name('.connection');
        Route::get('roles', Roles::class)->name('.roles');
        Route::get('permissions', Permissions::class)->name('.permissions');
    });

    Route::group(['middleware' => 'guest'], function(){
        Route::get('login', Login::class)->name('.login');
        Route::get('register', Register::class)->name('.register');
    });
});
