<?php

namespace App\Http\Controllers\Chat;

use App\Actions\FindUserByToken;
use App\Events\MessageSent;
use App\Http\Controllers\Controller;
use App\Events\MessageSentEvent;
use App\Events\ReturnMessageAllEvent;
use App\Http\Requests\ChatMessageFormRequest;
use App\Http\Resources\ChatMessageResponse;
use App\Http\Resources\ChatMessageResponseResource;
use App\Http\Resources\UserResourceChat;
use App\Models\ChatMessages;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function index(Request $request){
        //брать последнии 100
        // return $request->bearerToken();
        // return new UserResourceChat(User::findOrFail(2));
        return ChatMessageResponseResource::collection(ChatMessages::all())->resolve();
    }

    public function messages()
    {
        // broadcast(new ReturnMessageAllEvent());
        return ChatMessageResponseResource::collection(ChatMessages::all())->resolve();
        // return ChatMessageResponseResource::collection(ChatMessages::all());
    }

    public function send(ChatMessageFormRequest $request, FindUserByToken $findUserByToken){
        $data = $request->validated();
        $message = ChatMessages::create([
            'user_id' => $data['user_id'],
            'message' => $data['message'],
        ]);
        
        $user = $findUserByToken->handler($request->bearerToken());
        broadcast(new MessageSentEvent($user, $message));
        // смысл возврата теряется, если мы получаем возврат через broadcast (возврат только для request)
        // return ChatMessageResponseResource::make($message);
    }

}
