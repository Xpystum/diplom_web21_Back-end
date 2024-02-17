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
                // 'id' => $this->id,
                'user_id' => $this->user_id,
                'raiting'=>$this->raiting,
                'brand_id' => $this->brand_id,
                'model_id' => $this->model_id,
                'steering_wheel' => $this->steering_wheel,
                'body_type_id' => $this->body_type_id,
                'year' => $this->year,
                'engine_capacity' => $this->engine_capacity, 
                'power' => $this->power,
                'fuel_id' => $this->fuel_id,
                'transmission_id' => $this->transmission_id,
                'drive_unit_id' => $this->drive_unit_id,
                'sale_year'=> $this->sale_year,
                'mileage'=> $this->mileage,
                'review'=> $this->review,
                // 'review_img_collection' => $this->review_img_collection,
                'created_at' => $this->created_at,

            ];
        
    }
}
 