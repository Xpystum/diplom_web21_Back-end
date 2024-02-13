<?php

namespace App\Providers;

use Illuminate\Support\Facades\Broadcast;
use Illuminate\Support\ServiceProvider;

class BroadcastServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {   
        // ['middleware' => ['auth:api']]
        Broadcast::routes(['middleware' => ['authToken']]);
        require base_path('routes/channels.php');
    }
}
