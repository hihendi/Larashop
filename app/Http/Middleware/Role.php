<?php

namespace App\Http\Middleware;

use Closure;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        if (Auth::user()->can($role.'-access')) {
            # code...
            return $next($request);
        }
        abort(403, 'Anda tidak memiliki cukup hak akses');
    }
}
