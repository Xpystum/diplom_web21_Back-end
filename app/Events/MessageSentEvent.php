<?php

namespace App\Events;

use App\Http\Resources\ChatMessageResponseResource;
use App\Models\ChatMessages;
use App\Models\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithBroadcasting;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class MessageSentEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    use InteractsWithBroadcasting;

    //проверить private
    public $user;
    public $message;

    public function __construct(User $user, ChatMessages $message)
    {
        $this->broadcastVia('pusher');
        $this->user = $user;
        $this->message = $message;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new Channel('chat'),
        ];
    }

    public function broadcastAs(): string
    {
       return 'message';
    }

    /**
    * Get the data to broadcast.
    *
    * @return array<string, mixed>
    */

    public function broadcastWith(): array
    {
        return ChatMessageResponseResource::make($this->message)->resolve();
    }
}
