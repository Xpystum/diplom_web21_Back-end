<?php

namespace App\Http\Middleware;

use App\Actions\CheckTokenUser;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class tokenAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, CheckTokenUser $CheckTokenUser): Response
    {       
        
        if ($CheckTokenUser->handler($request->bearerToken() ) ){
            return $next($request);
        }
        
        return Response('Authorisation Error', 403);
        
    }
}
