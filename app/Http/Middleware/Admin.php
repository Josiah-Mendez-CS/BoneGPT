<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ( $request->user() && $request->user()->roles->contains('code', 'admin') ) {
            return $next($request);
        }

        return redirect()->route('home')->with('error', 'You do not have permission to access this page.');
    }
}
