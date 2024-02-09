<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ChatBroadcastResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'owner' => $request->owner,
            // 'user_minor' => $request->user_minor,
            'chatgroup_id' => $request->chatgroup_id,
            'message' => $request->message,
        ];
    }
}
