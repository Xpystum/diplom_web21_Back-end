<?php

namespace App\Events;

use App\Http\Requests\ChatMessageSendFormRequest;
use App\Http\Resources\ChatBroadcastResource;
use App\Http\Resources\ChatMessageResponseResource;
use App\Models\ChatGroup;
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
    // public $user_from_id;
    // // public $user_minor;
    // public $chatgroup_id;
    // public $message;

    // public ?ChatMessages $chatMessages;

    public function __construct(public ChatMessages $chatMessages)
    {   
        $this->broadcastVia('pusher');
        // $this->user_from_id = $chatMessages->user_id;
        // $this->chatgroup_id = $chatMessages->chatgroup_id;
        // $this->message = $chatMessages->message;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): PrivateChannel 
    {
        return new PrivateChannel('chat.'.$this->chatMessages->chatgroup_id);
    
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
        return (new ChatMessageResponseResource($this->chatMessages))->resolve();
    }


}
