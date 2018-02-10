<?php

namespace App\Http\Middleware;

use Closure;
use URL;

class DefaultUrlLocale
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
        $locale = cookie('locale', 'XX');
        URL::defaults(['locale' => $locale]);
        return $next($request);
    }
}
