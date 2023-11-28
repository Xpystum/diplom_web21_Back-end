<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ModelsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $models = [
            ['id'=> 1, 'brand_id' => 1, 'name'=> "X1"],
            ['id'=> 2, 'brand_id' => 1, 'name'=> "X2"],
            ['id'=> 3, 'brand_id' => 1, 'name'=> "X3"],
            ['id'=> 4, 'brand_id' => 1, 'name'=> "X4"],
            ['id'=> 5, 'brand_id' => 1, 'name'=> "X5"],
            ['id'=> 6, 'brand_id' => 1, 'name'=> "X6"],
            ['id'=> 7, 'brand_id' => 1, 'name'=> "X7"],
            ['id'=> 8, 'brand_id' => 1, 'name'=> "Z4"],
            ['id'=> 9, 'brand_id' => 2, 'name'=> "Panamera"],
            ['id'=> 10, 'brand_id' => 2, 'name'=> "Cayenne"],
            ['id'=> 11, 'brand_id' => 2, 'name'=> "Macan"],
            ['id'=> 12, 'brand_id' => 3, 'name'=> "3151"],
            ['id'=> 13, 'brand_id' => 3, 'name'=> "Патриот"],
            ['id'=> 14, 'brand_id' => 4, 'name'=> "Ивановец"],
        ];
        DB::table('models')->insert($models);
    }
}
