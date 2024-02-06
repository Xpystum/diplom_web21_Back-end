<?php

namespace App\Http\Middleware;
use Symfony\Component\HttpFoundation\Response;
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
  

     /**
     * Add the limit header information to the given response.
     *
     * @param  \Symfony\Component\HttpFoundation\Response  $response
     * @param  int  $maxAttempts
     * @param  int  $remainingAttempts
     * @param  int|null  $retryAfter
     * @return \Symfony\Component\HttpFoundation\Response
     */
    // protected function addHeaders(Response $response, $maxAttempts, $remainingAttempts, $retryAfter = null){
    //     $response->headers->add([
    //         'X-RateLimit-Limit' => $maxAttempts,
    //         'X-RateLimit-Remaining' => $remainingAttempts,
    //         'X-RateLimit-Reset' => time() + ($retryAfter ?? 0),
    //     ]);

    //     if (is_null($retryAfter)) {
    //         return $response;
    //     }

    //     $response->headers->add(['Retry-After' => $retryAfter]);
    //     $response->setStatusCode(429);

    //     return $response;
    // }
   
    



  
   
}
