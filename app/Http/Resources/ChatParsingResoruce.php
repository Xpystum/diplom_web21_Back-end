<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ChatParsingResoruce extends ResourceCollection
{

    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            $this->collection
        ];

    }

    public function with(Request $request): array
    {   
        $chatgroup_id = $this->collection->first()->chatgroup_id;
        return [
            'chatgroup_id' => $chatgroup_id,
        ];
    }
}
