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
        $user = json_decode($user, true);
        define('IS_ADMIN', $user['seller']['isAdmin']);
        define('IS_OWN_SHOP', $user['is_own_shop']);
        return $next($request);
    }
}
