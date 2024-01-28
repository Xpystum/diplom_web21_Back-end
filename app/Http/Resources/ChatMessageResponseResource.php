<?php

namespace App\Http\Resources;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ChatMessageResponseResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {   
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'message' => $this->message,
            // 'realTime' => $this->created_at->diffForHumans(),
            'user' => new UserResourceChat(User::findOrFail($this->user_id)),
            'timeYear' => $this->created_at->format('d.m.Y'),
            'timeHour' => $this->created_at->format('H:m:s'),
        ];
    }
}
