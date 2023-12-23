<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ReviewResource extends JsonResource
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
                'user' => $this->user,
                'raiting'=>$this->raiting,
                'brand' => $this->brand,
                'model' => $this->model,
                'steering_wheel' => $this->steering_wheel,
                'body_type' => $this->body_type,
                'year' => $this->year,
                'engine_capacity' => $this->engine_capacity, 
                'power' => $this->power,
                'fuel' => $this->fuel,
                'transmission' => $this->transmission,
                'drive_unit' => $this->drive_unit,
                'sale_year'=> $this->sale_year,
                'mileage'=> $this->mileage,
                'review_img_collection' => $this->review_img_collection,
                'created_at' => $this->created_at,
            ];
        
    }
}
 