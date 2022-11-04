<?php

namespace App\Http\Middleware;

use Closure;
use Throwable;
use Illuminate\Support\Facades\Response;

class Cors {
    public function handle($request, Closure $next) {
        if (isset($_SERVER['HTTP_REFERER'])) {
            $boom     = explode('/', $_SERVER['HTTP_REFERER']);
            $method   = $boom[0];
            $domain   = $boom[2];
            $referrer = $method.'//'.$domain;
        } else {
            $referrer = '*';
        }

        if ($request->isMethod('OPTIONS')) {
            return Response::make('OK')
                ->header('Access-Control-Allow-Origin', $referrer)
                ->header('Access-Control-Allow-Credentials', 'true')
                ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS')
                ->header('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, X-Token-Auth, Authorization, x-xsrf-token, domain');
        }

        try {
            return $next($request)
                ->header('Access-Control-Allow-Origin', $referrer)
                ->header('Access-Control-Allow-Credentials', 'true')
                ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS')
                ->header('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, X-Token-Auth, Authorization x-xsrf-token, domain ');
        } catch (Throwable) {
            return $next($request);
        }
    }
}
