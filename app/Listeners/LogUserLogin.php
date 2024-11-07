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
        $location = null;
        $response = Http::get("https://ipinfo.io/{$ip}/json");
        if ($response->successful()) {
            $locationData = $response->json();

            if (isset($locationData['city']) && !empty($locationData['city'])) {
                $location = "{$locationData['city']}, {$locationData['country']}";
            } else {
                // Handle the case where 'city' is not set or empty
                $location = "City not available";
            }
        }

        UserLogin::create([
            'user_id' => $event->user->id,
            'browser' => $agent->browser() . " on " . $agent->platform(),
            'device' => $agent->device(),
            'location' => $location,
            'last_login' => now()
        ]);


    }
}
