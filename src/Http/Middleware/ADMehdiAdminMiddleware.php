<?php

namespace ADMehdi\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class ADMehdiAdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure                 $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!Auth::guest()) {
            $user = Auth::user();
            return $user->hasRole('admin') ? $next($request) : redirect('/');
        }
        return redirect()->guest('/admin/login');
    }
}
