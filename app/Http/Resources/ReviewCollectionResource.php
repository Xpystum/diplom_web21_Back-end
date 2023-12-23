<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ReviewCollectionResource extends ResourceCollection
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
            'user' => $this->updated_at,
            'raiting'=>$this->raiting,
            'brand' => $this->updated_at,
            'model' => $this->updated_at,
            'steering_wheel' => $this->steering_wheel,
            'body_type' => $this->updated_at,
            'year' => $this->year,
            'engine_capacity' => $this->engine_capacity, 
            'power' => $this->updated_at,
            'fuel' => $this->updated_at,
            'transmission' => $this->updated_at,
            'drive_unit' => $this->updated_at,
            'sale_year'=> $this->sale_year,
            'mileage'=> $this->mileage,
            'img_src' => $this->updated_at,
        ];
    }
}
 