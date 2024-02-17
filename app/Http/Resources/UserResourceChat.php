<?php

namespace App\Http\Resources;

use App\Models\Avatar;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResourceChat extends JsonResource
{
    public $collects = User::class;
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        
        return [
            'id' => $this->id,
            'name' => $this->name,
            'pathAvatar' => (new AvatarResource(Avatar::findOrFail($this->avatar_id)))->resolve(),
        ];

    }   
}
