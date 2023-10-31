<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ProductCollectionResource extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'year' => $this->email,
            'price' => $this->created_at,
            'mileage' => $this->updated_at,
            'status' => $this->updated_at,
            'img_src' => $this->updated_at,
            'engine' => $this->updated_at,
            'power' => $this->updated_at,
            'transmission' => $this->updated_at,
            'drive_unit' => $this->updated_at,
            'color' => $this->updated_at,
            'steering_wheel' => $this->updated_at,
            'generation' => $this->updated_at,
            'equipment' => $this->updated_at,
            'vin' => $this->updated_at,
            'city' => $this->updated_at,
            'category_id' => $this->updated_at,
            'additional' => $this->updated_at,
        ];
    }
}
