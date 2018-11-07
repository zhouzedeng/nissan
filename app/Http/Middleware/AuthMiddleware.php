<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Redis;

class AuthMiddleware
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
        $token = $request->cookie('token');
        if (empty($token)) {
            return redirect(config('plugin.login_page'));
        }
        $user = Redis::get($token);
        if (empty($user)) {
            return redirect(config('plugin.login_page'));
        }
        return $next($request);
    }
}
