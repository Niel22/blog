<?php

namespace App\Listeners;

use App\Models\UserLogin;
use Illuminate\Auth\Events\Login;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Http;
use Jenssegers\Agent\Agent;

class LogUserLogin
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(Login $event): void
    {
        $agent = new Agent();

        $ip = request()->ip();

        UserLogin::create([
            'user_id' => $event->user->id,
            'browser' => $agent->browser() . " on " . $agent->platform(),
            'device' => $agent->device(),
            'last_login' => now()
        ]);


    }
}
