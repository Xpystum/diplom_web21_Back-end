<?php

use App\Broadcasting\ChatChannel;
use Illuminate\Support\Facades\Broadcast;


// Broadcast::channel('chat', ChatChannel::class);
Broadcast::channel('chat.{chatgroup_id}', function() {
    return true;
});

Broadcast::channel('chat.{chatgroup_id}', function (User $user, int $orderId) {
    return true;
});
