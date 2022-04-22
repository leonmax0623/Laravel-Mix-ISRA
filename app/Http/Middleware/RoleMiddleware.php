<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RoleMiddleware {
    public function handle(Request $request, Closure $next, ...$roles) {
        foreach($roles as $role) {
            if(auth()->user()->role_id === get_enum_id('role', $role)) {
                return $next($request);
            }
        }

        abort(403);
    }
}
