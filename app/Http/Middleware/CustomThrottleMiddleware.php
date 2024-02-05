<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

namespace App\Http\Middleware;
use Illuminate\Routing\Middleware\ThrottleRequests;
use RuntimeException;

class CustomThrottleMiddleware extends ThrottleRequests
{
    protected function resolveRequestSignature($request)
    {
        //по чему будет проверять пользователя? -> по токену
        if($request->bearerToken()){

            return $request->bearerToken();

        }

        throw new RuntimeException('Нету токена, ошибка авторизации');
    }   
}
