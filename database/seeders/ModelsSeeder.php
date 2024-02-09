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
            ['id'=> 1, 'brand_id' => 16, 'name'=> "X1"],
            ['id'=> 2, 'brand_id' => 16, 'name'=> "X2"],
            ['id'=> 3, 'brand_id' => 16, 'name'=> "X3"],
            ['id'=> 4, 'brand_id' => 16, 'name'=> "X4"],
            ['id'=> 5, 'brand_id' => 16, 'name'=> "X5"],
            ['id'=> 6, 'brand_id' => 16, 'name'=> "X6"],
            ['id'=> 7, 'brand_id' => 16, 'name'=> "X7"],
            ['id'=> 8, 'brand_id' => 16, 'name'=> "Z4"],
            ['id'=> 9, 'brand_id' => 110, 'name'=> "Panamera"],
            ['id'=> 10, 'brand_id' => 110, 'name'=> "Cayenne"],
            ['id'=> 11, 'brand_id' => 110, 'name'=> "Macan"],
            ['id'=> 12, 'brand_id' => 163, 'name'=> "3151"],
            ['id'=> 13, 'brand_id' => 163, 'name'=> "Патриот"],
            ['id'=> 14, 'brand_id' => 218, 'name'=> "Ивановец"],
            ['id'=> 15, 'brand_id' => 10, 'name'=> "A1"],
            ['id'=> 16, 'brand_id' => 10, 'name'=> "A2"],
            ['id'=> 17, 'brand_id' => 10, 'name'=> "A3"],
            ['id'=> 18, 'brand_id' => 10, 'name'=> "A4"],
            ['id'=> 19, 'brand_id' => 10, 'name'=> "A5"],
            ['id'=> 20, 'brand_id' => 10, 'name'=> "A6"],
            ['id'=> 21, 'brand_id' => 10, 'name'=> "A7"],
            ['id'=> 22, 'brand_id' => 10, 'name'=> "A8"],
        ];
        DB::table('models')->insert($models);
    }
}
