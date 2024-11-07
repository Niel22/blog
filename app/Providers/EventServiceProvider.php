<?php

namespace App\Providers;

use App\Listeners\LogUserLogin;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    protected $listeners = [
        Login::class => [
            LogUserLogin::class,
        ]
    ];
    /**
     * Register services.
     */
    public function register(): void {}

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
