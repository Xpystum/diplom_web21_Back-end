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
  
    protected function getHeaders($maxAttempts,
    $remainingAttempts,
    $retryAfter = null,
    ?Response $response = null){
        {
            if ($response &&
                ! is_null($response->headers->get('X-RateLimit-Remaining')) &&
                (int) $response->headers->get('X-RateLimit-Remaining') <= (int) $remainingAttempts) {
                return [];
            }
    
            $headers = [
                'X-RateLimit-Limit' => $maxAttempts,
                'X-RateLimit-Remaining' => $remainingAttempts,
            ];
    
            if (! is_null($retryAfter)) {
                $headers['Retry-After'] = $retryAfter;
                $headers['Access-Control-Expose-Headers'] = 'Retry-After';
                $headers['X-RateLimit-Reset'] = $this->availableAt($retryAfter);
            }
    
            return $headers;
        }
    }
   
  
   
}
