<?php

namespace App\Events;

use App\Http\Resources\UserGroupChatRecource;
use App\Models\ChatGroup;
use App\Models\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Broadcasting\InteractsWithBroadcasting;
use Illuminate\Support\Collection;

class GroupChatMessageEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    use InteractsWithBroadcasting;
    /**
     * Create a new event instance.
     */
    public function __construct(public int $userId, public Collection $chatGroup)
    {
        $this->broadcastVia('pusher');
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): Channel 
    {
        return new PrivateChannel('chatGroup.'.$this->userId);
    }

    public function broadcastAs(): string
    {
       return 'allGroup';
    }

    public function broadcastWith(): array
    {
        return UserGroupChatRecource::collection($this->chatGroup)->resolve();
    }
}
