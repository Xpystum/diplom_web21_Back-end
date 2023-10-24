<?php

namespace Database\Factories;
use App\Models\Product;


use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ProductFactory extends Factory
{


    protected $model = Product::class;

    public function definition(): array
    {   
        return [ 

            'title' => fake()->words(4, true),
            'name' => fake()->sentence(3),

            'price' => fake()->numberBetween(200000, 10000000),
            'old_price' => fake()->numberBetween(100000, 10000000),

            'mileage' => fake()->numberBetween(2000, 300000),
            'status' => fake()->boolean(),
            'img_src' => fake()->imageUrl(580, 435, 'automobile', true),


            'engine' => fake()->words(1, true).fake()->randomFloat(1, 1, 10),
            'power' => fake()->numberBetween(5, 400),
            'transmission' => fake()->words(1, true),
            'drive_unit' => fake()->words(1, true),
            'color' => fake()->colorName(),
            'steering_wheel' => fake()->words(1, true),
            'generation' => fake()->numberBetween(1, 6),
            'equipment' => fake()->words(3, true),
            'vin' => fake()->isbn10(),

            'city' => fake()->words(1, true),
            'category_id' => fake()->numberBetween(1, 200),
            'wheel_formula' => fake()->numberBetween(1, 6)."x".fake()->numberBetween(1, 4),
            'load_capacity' => fake()->numberBetween(5000, 50000),
            'vin_body' => fake()->isbn10(),
            'body_length' => fake()->randomFloat(1, 3, 20),        
            'body_volume' => fake()->randomFloat(1, 3, 20),
            'weight' => fake()->numberBetween(1000, 15000),
            'desription' => fake()->text(),
            
        ];
    }
}
