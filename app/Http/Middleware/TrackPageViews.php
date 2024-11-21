<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\PageViews;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class TrackPageViews
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        PageViews::create([
            'url' => $request->path(),
            'user_id' => Auth::check() ? Auth::id() : null,
            'ip_address' => $request->ip(),
        ]);
        
        return $next($request);
    }
}
