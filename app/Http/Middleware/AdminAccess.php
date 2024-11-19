<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Jenssegers\Agent\Agent;
use Symfony\Component\HttpFoundation\Response;

class AdminAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {

            $agent = new Agent();

            if($agent->isDesktop()){

                return $next($request);
            }else{
                session()->flash('warning', 'This page cannot be accessed on a mobile phone');
                return redirect()->to(route('home'));
            }
        } else {
            return redirect()->to(route('admin.login'));
        }
    }
}
