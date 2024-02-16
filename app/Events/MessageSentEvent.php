<?php

namespace App\Events;

use App\Http\Resources\ChatMessageResponseResource;
use App\Models\ChatMessages;
use Illuminate\Broadcasting\InteractsWithBroadcasting;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class MessageSentEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    use InteractsWithBroadcasting;


    public function __construct(public ChatMessages $chatMessages)
    {   
        $this->broadcastVia('pusher');
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
        return (new ChatMessageResponseResource($this->chatMessages))->resolve();
    }


}
