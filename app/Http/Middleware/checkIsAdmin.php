<?php

namespace App\Http\Middleware;

use App\Models\Roles\Roles;
use Closure;
use Illuminate\Support\Facades\Auth;

class checkIsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(!Auth::user()->hasRole(Roles::MANAGER)){
            return abort(403);
        }
        return $next($request);
    }
}
