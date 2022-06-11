<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\UnauthorizedException;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (!Auth::check()) {
            return route('admin.login');
        }
    }
    public function handle($request, Closure $next, ...$guards)
    {
        if (!auth()->check())
        {
            return redirect(route('admin.login'));
        }
        return $next($request);
    }
}
