<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class checkOwnerMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $role = $request->session()->get('role');
        $isLoggedIn = $request->session()->get('isLoggedIn');
        
        if ($role != "OWNER" && !$isLoggedIn) {
            return redirect('/');
        }

        return $next($request);
    }

}
