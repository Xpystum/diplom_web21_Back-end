<?php

use App\Broadcasting\ChatChannel;
use App\Models\ChatGroup;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Broadcast;
use Illuminate\Support\Facades\Auth;

// Broadcast::channel('chat', ChatChannel::class);
// Broadcast::channel('chat.{chatgroup_id}', function() {
//     return true;

// });

Broadcast::channel('chat.{chagroup_id}', function (User $user, $chatgroup_id) {
    
    return (int) Auth::check() === (int) ChatGroup::find($chatgroup_id)->id;
}); 
