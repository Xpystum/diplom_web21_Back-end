<?php

namespace App\Http\Controllers\Broadcasting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Pusher\Pusher;

class BroadcastingAuthController extends Controller
{
    public function authenticate(Request $request)
    {
        // Получите данные из запроса, например идентификатор канала
        $channelName = $request->channel_name;
        // return $channelName;
        // Реализуйте здесь логику проверки доступа пользователя к данному каналу
        // Например, проверка, что пользователь аутентифицирован и имеет права доступа к каналу
        if ($request->bearerToken()) {
            // Генерация успешного ответа для подключения

            // Инициализация Pusher
            $pusher = new Pusher(
            config('broadcasting.connections.pusher.key'),
            config('broadcasting.connections.pusher.secret'),
            config('broadcasting.connections.pusher.app_id'),
            config('broadcasting.connections.pusher.options')
        );

            return response()->json([
                'auth' => 'wgverb34r3gvearber',
            ]);
        }
      
     

        // Если пользователь не аутентифицирован или не имеет доступа к каналу, возвращаем ошибку
        return response()->json(['message' => 'Forbidden'], 403);
    }
}
