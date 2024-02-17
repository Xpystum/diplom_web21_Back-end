<?php

namespace App\Http\Controllers\Chat;

use App\Actions\FindUserByToken;
use App\Events\GroupChatMessageEvent;
use App\Events\MessageSentEvent;
use App\Http\Controllers\Controller;
use App\Http\Requests\AllChatGroupRequest;
use App\Http\Requests\ChatMessageSendFormRequest;
use App\Http\Requests\GetMessageChatGroupFromRequest;
use App\Http\Resources\ChatBroadcastResource;
use App\Http\Resources\ChatMessageResponseResource;
use App\Http\Resources\TestCollection;
use App\Http\Resources\UserGroupChatRecource;
use App\Models\ChatGroup;
use App\Models\ChatMessages;
use App\Models\User;
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
        $idChatGroup = ChatGroup::checkExisistTwoRecordTable($data['user_from_id'], $data['user_to_id']);
        
        if( !is_null($idChatGroup) ){
           
            if(count(ChatMessages::where('chatgroup_id', $idChatGroup->id)->get()) == 0){
                return response()->json([
                    'success' => false,
                ], 202 );
            }

            return (new TestCollection( ChatMessageResponseResource::collection( ChatMessages::where('chatgroup_id', $idChatGroup->id)->get() ) ) );

        }

        return response()->json([
            'success' => false,
        ], 202 );
           

    }

    public function send(ChatMessageSendFormRequest $request, FindUserByToken $findUserByToken){
        
        $data = $request->validated();
        if(!isset($data['chatgroup_id'])){
           
          try {

            $idChatGroup = ChatGroup::checkExisistTwoRecordTable($data['user_from_id'], $data['user_to_id']);
           

            if(!is_null($idChatGroup))
            {
                $data['chatgroup_id']  = $idChatGroup->id;

            }else{

                //Создаём группу
                $dataChatGroup = ChatGroup::create([
                    'user_from_id' => $data['user_from_id'],
                    'user_to_id' => $data['user_to_id'],
                ])->firstOr('id', function () {
    
                    //если группа не найдена или другая ошибка
                    return response()->json([
                        'messages' => 'Ошибка нахождение Группувого чата',
                    ], 404);
    
                });

                $data['chatgroup_id']  = $dataChatGroup->id;
                
                $groupChat = ChatGroup::returnAllGroupChatToUser($data['user_to_id']);
                broadcast(new GroupChatMessageEvent($data['user_to_id'],  $groupChat));
        
                return response()->json([
                    'messages' => 'Send',
                    'chatgroup_id' => $data['chatgroup_id'],
                ], 200);

                
            }
            
            

          } catch (\Throwable $th) {

            return response()->json([
                'messages' => 'Неизвестная Ошибка',
            ], 404);
          }

        }else{  


            try {

                
            } catch (\Throwable $th) {

                return response()->json([
                    'messages' => 'Error search group',
                ], 404);
    

            }
        }

        $chatMessages = ChatMessages::create([
            'user_id' => $data['user_from_id'],
            'chatgroup_id' => $data['chatgroup_id'],
            'message' => $data['message'],
        ]);


        broadcast(new MessageSentEvent($chatMessages));

        return response()->json([
            'messages' => 'Send',
        ], 200);

    }

    public function allChatGroupUser(AllChatGroupRequest $request){

        $data = $request->validated();
        $groupChat = ChatGroup::returnAllGroupChatToUser($data['user_id']);
    
        // broadcast(new GroupChatMessageEvent( $data['user_id'] , $groupChat));

        return UserGroupChatRecource::collection($groupChat)->resolve();

    }

    public function returnNewGroupChat(AllChatGroupRequest $request){

        $data = $request->validated();
        $groupChat = ChatGroup::find($data['user_id']);
        $groupChat = ChatGroup::returnAllGroupChatToUser($data['user_id']);

        broadcast(new GroupChatMessageEvent($data['user_id'] , $groupChat));

        return [
            'message' => 'succes',
        ];
    }

}
