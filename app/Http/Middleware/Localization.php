<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Localization {
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next) {
        if (session()->has('locale')) {
            if(!in_array(session()->get('locale'), array_keys(config('app.locales')))) {
                session()->put('locale', config('app.locale'));
            }

            app()->setLocale(session()->get('locale'));
        }

        return $next($request);
    }
}
