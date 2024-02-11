<?php

namespace App\Http\Controllers\Chat;

use App\Actions\FindUserByToken;
use App\Http\Controllers\Controller;
use App\Http\Requests\ChatMessageSendFormRequest;
use App\Http\Requests\GetMessageChatGroupFromRequest;
use App\Http\Resources\ChatMessageResponseResource;
use App\Models\ChatGroup;
use App\Models\ChatMessages;
use Illuminate\Http\Request;



class ChatController extends Controller
{
    public function index(Request $request){
        //брать последнии 100
        
        // return ChatMessageResponseResource::collection(ChatMessages::all())->resolve();
    }

    public function messages(GetMessageChatGroupFromRequest $request)
    {
        $data = $request->validated();

        //TODO подумать о реворке название в бд (добавить unique ключ)
        $chatGroup = ChatGroup::where([
            ['user_main_id' , '=' , "".$data['user_main'] ],
            ['user_minor_id' , '=' , "".$data['user_minor'] ],
        ])->firstOr(['id'] , function () {
            abort(404);
        });
        return ChatMessageResponseResource::collection(ChatMessages::where('chatgroup_id', $chatGroup->id)->get());

        // broadcast(new ReturnMessageAllEvent()); не трогать
        // return ChatMessageResponseResource::collection(ChatMessages::all())->resolve();
    }


    public function send(ChatMessageSendFormRequest $request, FindUserByToken $findUserByToken){

        //owner кто отправил сообщение
        $data = $request->validated();
        if($data['chatgroup_id'] == null){
            
          try {


            $dataChatGroup = ChatGroup::firstOrCreate(
                ['owner_id' => $data['owner']],
                ['user_minor_id' => $data['user_minor']],
            )->firstOr('id', function () {

                //если группа не найдена или другая ошибка
                return response()->json([
                    'messages' => 'Ошибка нахождение Группувого чата',
                ], 404);

            });
            $data['chatgroup_id']  = $dataChatGroup->id;
            

          } catch (\Throwable $th) {

            return response()->json([
                'messages' => 'Неизвестная Ошибка',
            ], 404);

          }

        }else{

            try {

                ChatGroup::findOrFail($data['chatgroup_id']);


            } catch (\Throwable $th) {

                abort(404, 'Error Group ID');

            }
        }

        return ChatMessages::create([
            'user_id' => $data['owner'],
            'chatgroup_id' => $data['chatgroup_id'],
            'message' => $data['message'],
        ])->FirstOr(['*'], function(){
            return response()->json([
                'messages' => 'Ошибка Отправки Сообщение',
            ], 404);
        });

        // broadcast(new MessageSentEvent(ChatBroadcastResource::make($data)));

        // $message = ChatMessages::create([
        //     'user_id' => $data['user_id'],
        //     'message' => $data['message'],
        // ]);

        // try{

        //     $user = $findUserByToken->handler($request->bearerToken());

        //     if($user == null){
        //         return response('Unauthorized', 401)
        //         ->header('Content-Type', 'text/plain');
        //     }

        // }catch(Exception  $error){

        //     return response('error', 500)
        //     ->header('Content-Type', 'text/plain');

        // }
        
        // broadcast(new MessageSentEvent($user, $message));
        // смысл возврата теряется, если мы получаем возврат через broadcast (возврат только для request)
        // return ChatMessageResponseResource::make($message);
    }

}
