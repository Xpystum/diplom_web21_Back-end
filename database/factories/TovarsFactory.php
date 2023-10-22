<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class TovarsFactory extends Factory
{

    protected $model = Tovar::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [ 
            'title' => fake()->words(4, true),
            'name' => fake()->sentence(3),

            'img_src' => fake()->words(580, 435, 'automobile', true),
            'price' => fake()->biasedNumberBetween(200000, 10000000),
            'old_price' => fake()->biasedNumberBetween(100000, 10000000),

            'engine' => fake()->biasedNumberBetween(4, true),
            'power' => fake()->words(4, true),
            'transmission' => fake()->words(4, true),
            'drive_unit' => fake()->words(4, true),
            'color' => fake()->words(4, true),
            'steering_wheel' => fake()->words(4, true),
            'generation' => fake()->words(4, true),
            'equipment' => fake()->words(4, true),
            'vin' => fake()->words(4, true),


            
        ];
    }
}
