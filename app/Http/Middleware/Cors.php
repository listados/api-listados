<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Cors
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $headers = [
            'Access-Control-Allow-Origin' => '*',
            'Access-Control-Allow-Methods' => 'POST, GET, OPTIONS, PUT, DELETE',
            'Access-Control-Allow-Headers' => 'Content-Type, X-Auth-Token, Origin, Authorization, Accept',
            'Access-Control-Max-Age' => '3600',
        ];

        // Responde imediatamente a requisições OPTIONS (Preflight)
        if ($request->isMethod('OPTIONS')) {
            return response()->json('OK', 204, $headers);
        }

        $response = $next($request);

        return $response;
    }
}
