<?php

namespace App\Http\Controllers\Broadcasting;

use App\Actions\CheckTokenUser;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Pusher\Pusher;

class BroadcastingAuthController extends Controller
{
    public function authenticate(Request $request, CheckTokenUser $CheckTokenUser)
    {

        
        if (!$CheckTokenUser->handler($request->bearerToken())) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }
     
        try {
            
            $socketId = $request->input('socket_id');
            $channelName = $request->input('channel_name');

            if(!$request->has(['socket_id', 'channel_name'])){
                return response()->json(['message' => 'Unauthorized'], 403);
            }
            
            //иницилизация пушера
            $pusher = new Pusher(
                config('broadcasting.connections.pusher.key'),
                config('broadcasting.connections.pusher.secret'),
                config('broadcasting.connections.pusher.app_id'),
                config('broadcasting.connections.pusher.options')
            );

            $authData = $pusher->authorizeChannel($channelName, $socketId);
            return response()->json(json_decode($authData));

        } catch (\Throwable $th) {
            return response()->json(['message' => 'error unknow '], 403);
        }
        // Если пользователь не аутентифицирован или не имеет доступа к каналу, возвращаем ошибку
        return response()->json(['message' => 'Forbidden'], 403);
    }
}
