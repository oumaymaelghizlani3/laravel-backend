<?php

namespace App\Http\Middleware;

use Closure;

class HandleCors
{
    public function handle($request, Closure $next)
{
    $response = $next($request);

    $response->headers->set('Access-Control-Allow-Origin', 'http://localhost:4200');
    $response->headers->set('Access-Control-Allow-Methods', 'POST, GET, PUT, OPTIONS,DELETE');
    $response->headers->set('Access-Control-Allow-Headers', 'Content-Type, X-Auth-Token, Authorization');

    return $response;
}
}