<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class userMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $isLoggedIn = $request->session()->get('isLoggedIn');
        $role = $request->session()->get('role');
        $currentUrl = request()->segment(count(request()->segments()));

        if ($currentUrl == "wishlist" || $currentUrl == "profile") {
            
            // checking if user haven't logged in
            if (!$isLoggedIn) {
                return redirect('/');
            } else {
                return $next($request);
            }
        }

        if ($role == "ADMIN") {
            return redirect('/admin/dashboard');
        } else if ($role == "OWNER") {
            return redirect('/owner/dashboard');
        }

        return $next($request);
    }
}
