<?php

namespace App\Http\Resources;

use App\Models\Avatar;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'created_at' => $this->created_at,
            'email' => $this->email,
            'email_verified_at' => $this->email_verified_at,
            'name' => $this->name,
            'updated_at' => $this->updated_at,
            'status' => $this->status,
            'avatar_id' => $this->status,
            'pathAvatar' => Avatar::returnAvatarUrl($this->id)->resolve(),
            'cash' => $this->cash,
            'city' => $this->city,
        ];  
    }
}
