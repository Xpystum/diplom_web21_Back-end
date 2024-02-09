<?php

namespace App\Events;

use App\Http\Requests\ChatMessageSendFormRequest;
use App\Http\Resources\ChatBroadcastResource;
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
    public $owner;
    public $user_minor;
    public $chatgroup_id;
    public $message;

    public function __construct(ChatBroadcastResource $request)
    {   
        $this->broadcastVia('pusher');

        $this->owner = $request->owner;
        $this->user_minor = $request->user_minor;
        $this->chatgroup_id = $request->chatgroup_id;
        $this->message = $request->message;

    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('chat'.$this->chatgroup_id),
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

        //нужно отпрвлять только user_id
        return ChatMessageResponseResource::make($this->message)->resolve();
    }
}
