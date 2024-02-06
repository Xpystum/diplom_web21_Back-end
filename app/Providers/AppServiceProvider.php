<?php

namespace App\Providers;

use App\Actions\CheckTokenUser;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\RateLimiter;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // RateLimiter::for('customThrottle', function (Request $request) {
        //     // Количество попыток, время в секундах
        //     $CheckTokenUser = new CheckTokenUser;
        //     $decaySeconds = 1;
        //     $maxAttempts = 1;

        //     return Limit::perMinutes($decaySeconds, $maxAttempts)->by($CheckTokenUser->handler($request->bearerToken()));

            
        //     // return Limit::perMinutes($maxAttempts, $decaySeconds / 60)->by($CheckTokenUser->handler($request->bearerToken()));
        // });
    }
}
