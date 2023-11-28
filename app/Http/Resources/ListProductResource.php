<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
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
            'brand' => $this->brand,
            'model' => $this->model,
            'year' => $this->year,
            'price' => $this->price,
            'old_price' => $this->old_price,
            'mileage' => $this->mileage,
            'main_img' => $this->main_img,
            'engine_capacity' => $this->engine_capacity,
            'fuel' => $this->fuel,
            'organisation'=> $this->organisation,
            'power' => $this->power,
            'transmission' => $this->transmission,
            'body_type' => $this->body_type,
            'city' => $this->city,
            'color' => $this->color,
            'drive_unit' => $this->drive_unit,
            'generation' => $this->generation,
            'vin' => $this->vin,
            'additional' => $this->additional,
            'equipment' => $this->equipment,
            'steering_wheel' => $this->steering_wheel,
            'body_length' => $this->body_length,
            'body_volume' => $this->body_volume,
            'category' => $this->category,
            'desription' => $this->desription, 
            'img_collection' => $this->img_collection,
            'load_capacity' => $this->load_capacity,
            'status' => $this->status,
            'vin_body' => $this->vin_body,
            'weight' => $this->weight,
            'wheel_formula' => $this->wheel_formula,

            'created_at' => $this->created_at,
        ];
    }
}
