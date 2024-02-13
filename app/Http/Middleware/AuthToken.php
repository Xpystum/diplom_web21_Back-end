<?php

namespace App\Http\Middleware;

use App\Actions\CheckTokenUser;
use App\Actions\FindUserByToken;
use Closure;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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


        if($token){
           
            $token = $request->bearerToken();
            if($request->bearerToken()){

                //нужли каждй раз пользователя регать в laravel? при проверки токена
                $user = (new FindUserByToken)->handler($token);
                Auth::login($user);
                return $next($request);
            }
            
            return $next($request);
        }

        $token = $request->bearerToken();
        if($request->bearerToken()){

            //нужли каждй раз пользователя регать в laravel? при проверки токена
            $user = (new FindUserByToken)->handler($token);
            Auth::login($user);
            return $next($request);
        }

           
        return Response('unauthorized', 403);
        
    }
}
