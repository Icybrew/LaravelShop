<?php

namespace shop\Http\Middleware;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;
use Closure;

class LanguageSwitcher
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
        App::setLocale(session('lang') ? session('lang') : Config::get('app.locale', 'en'));
        return $next($request);
    }
}
