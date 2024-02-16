<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChatGroup extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'user_from_id',
        'user_to_id',
    ];

    // protected $guarded = [];
    
    protected $table = 'chatgroup';
    public $timestamps = false;

    public static function isExistChatGroup(int $user_id){

        if(count(ChatGroup::where('user_id', $user_id)->get()) != 0){
            return true;
        }else{
            return false;
        }
    }

    public static function checkExisistTwoRecordTable(int $user_one, int $user_two) : ?object
    {
        $data = ChatGroup::where([
            ['user_from_id', $user_one],
            ['user_to_id', $user_two],
        ])
        ->orWhere([
            ['user_from_id', $user_two],
            ['user_to_id', $user_one],
        ])
        ->firstOr(['id'], function () {
            return null;
        });
        return $data;
    }

    public static function returnAllGroupUser(int $user_id){

        $groupChat = ChatGroup::where('user_from_id', $user_id)
        ->orWhere('user_to_id', $user_id)->get();
        return $groupChat;

    }

    public static function returnAllGroupChatToUser(int $userId){

        $groupChat = ChatGroup::returnAllGroupUser($userId);

        $groupChat = $groupChat->map(function (ChatGroup $chatGroup) use ($userId) {

            $userIdToUse = $chatGroup->user_from_id == $userId ? $chatGroup->user_to_id : $chatGroup->user_from_id;
    
            return [
                "id" => $chatGroup->id,
                "user_id" => $userIdToUse,
            ];

        });

        return $groupChat;
    }
}
