<?php

namespace App\Http\Controllers\Chat;

use App\Actions\FindUserByToken;
use App\Events\MessageSent;
use App\Http\Controllers\Controller;
use App\Events\MessageSentEvent;
use App\Http\Requests\ChatMessageFormRequest;
use App\Http\Resources\ChatMessageResponse;
use App\Http\Resources\ChatMessageResponseResource;
use App\Models\ChatMessages;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function index(){
        //брать последнии 100
        $messages = ChatMessages::all();
        // $messages = ChatMessageResponse::collection($messages)->resolve();
        return $messages;
    }

    public function messages(){
        return [];
        // return ChatMessages::query()
        // ->with('user')
        // ->get();
    }

    public function send(ChatMessageFormRequest $request, FindUserByToken $findUserByToken){
        $data = $request->validated();
        $message = ChatMessages::create([
            'user_id' => $data['user_id'],
            'message' => $data['message'],
        ]);

        $user = $findUserByToken->handler($request->bearerToken());;

        broadcast(new MessageSentEvent($user, $message));

        return ChatMessageResponseResource::make($message)->resolve();
    }

}
