<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Exceptions\UnauthorizedException;

class PermissionMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $permission = null, $guard = null)
    {

        $authGuard = app('auth')->guard($guard);

        if ($authGuard->guest()) {
            throw UnauthorizedException::notLoggedIn();
        }

        if (!is_null($permission)) {
            $permissions = is_array($permission)
                ? $permission
                : explode('|', $permission);
        }
        if (is_null($permission)) {
            $permission = $request->route()->getName();

            $permissions = array($permission);
        }

        foreach ($permissions as $permission) {
            //dd($authGuard->user());
            // dd($authGuard->user()->can($permission), $permission);
            if ($authGuard->user()->can($permission)) {
                return $next($request);
            }
        }

        throw UnauthorizedException::forPermissions($permissions);
    }
}
