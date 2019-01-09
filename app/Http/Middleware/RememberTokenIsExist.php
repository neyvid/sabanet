<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\DB;

class RememberTokenIsExist
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
        $tokenIsExist=DB::table('password_resets')->where('token',$request->rtk)->exists();
        if(!$tokenIsExist){
            abort('403');
        }
        return $next($request);
    }
}
