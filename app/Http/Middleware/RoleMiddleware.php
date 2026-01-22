<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        if ($request->user() && $request->user()->usertype !== $role) {
            // Instead of aborting, redirect to the appropriate dashboard
            if ($request->user()->usertype === 'admin') {
                return redirect('/admin');
            }
            return redirect('/dashboard');
        }

        return $next($request);
    }
}
