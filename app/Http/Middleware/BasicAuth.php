<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class BasicAuth
{
    public function handle(Request $request, Closure $next)
    {
        $user = $request->getUser();
        $pass = $request->getPassword();

        $adminUser = env('ADMIN_USER');
        $adminPass = env('ADMIN_PASS');

        if (!$adminUser || !$adminPass || $user !== $adminUser || $pass !== $adminPass) {
            return response('Unauthorized', 401)->header('WWW-Authenticate', 'Basic realm="Admin"');
        }

        return $next($request);
    }
}
