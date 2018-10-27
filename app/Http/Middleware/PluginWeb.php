<?php

namespace App\Http\Middleware;

use Closure;

class PluginWeb
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
        $finder = app('view')->getFinder();
        $finder->prependLocation(resource_path('views/plugins'));
        return $next($request);
    }
}
