<?php

namespace App\Http\Middleware;

use Closure;
use Exception;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;


class AuthToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
       
        $token = \Laravel\Sanctum\PersonalAccessToken::findToken($request->token);
        
        if($token)
            return $next($request);
    
        return Response(false, 202);
        
    }
}
