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

            // $dataChatGroup = ChatGroup::where('owner_id' , '=' , $data['owner'])
            //                     ->where('user_minor_id' , '=' , $data['user_minor'])->get();

            return $dataChatGroup = ChatGroup::firstOrCreate(
                ['owner_id' => $data['owner']],
                ['user_minor_id' => $data['user_minor']],
            )->firstOr('id', function () {

                //если группа не найдена или другая ошибка
                return response()->json([
                    'messages' => 'Ошибка нахождение Группувого чата',
                ], 404);

            });

          
           
            

          } catch (\Throwable $th) {

            return response('Error Group ID', 500)
            ->header('Content-Type', 'text/plain');

          }

        }else{

            try {

                $dataChatGroup = ChatGroup::findOrFail($data['chatgroup_id']);
                return $dataChatGroup;

            } catch (\Throwable $th) {

                abort(404, 'Error Group ID');

            }
        }

        broadcast(new MessageSentEvent($user, $message));

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
