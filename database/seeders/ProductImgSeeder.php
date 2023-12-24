<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductImgSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $img_products = [
            ['id'=> 1, 'product_id' => 1, 'resource'=> "products/bmw1_2.jpg"],
            ['id'=> 2, 'product_id' => 1, 'resource'=> "products/bmw1_3.jpg"],
            ['id'=> 3, 'product_id' => 1, 'resource'=> "products/bmw1_4.jpg"],
            ['id'=> 4, 'product_id' => 1, 'resource'=> "products/bmw1_5.jpg"],

            ['id'=> 5, 'product_id' => 2, 'resource'=> "products/bmw2_2.jpg"],
            ['id'=> 6, 'product_id' => 2, 'resource'=> "products/bmw2_3.jpg"],
            ['id'=> 7, 'product_id' => 2, 'resource'=> "products/bmw2_4.jpg"],
            ['id'=> 8, 'product_id' => 2, 'resource'=> "products/bmw2_5.jpg"],

            ['id'=> 9, 'product_id' => 3, 'resource'=>  "products/bmw3_2.jpg"],
            ['id'=> 10, 'product_id' => 3, 'resource'=> "products/bmw3_3.jpg"],
            ['id'=> 11, 'product_id' => 3, 'resource'=> "products/bmw3_4.jpg"],
            ['id'=> 12, 'product_id' => 3, 'resource'=> "products/bmw3_5.jpg"],

            ['id'=> 13, 'product_id' => 5, 'resource'=> "products/porshe2_2.jpg"],
            ['id'=> 14, 'product_id' => 5, 'resource'=> "products/porshe2_3.jpg"],
            ['id'=> 15, 'product_id' => 5, 'resource'=> "products/porshe2_4.jpg"],
            ['id'=> 16, 'product_id' => 5, 'resource'=> "products/porshe2_5.jpg"],

            ['id'=> 17, 'product_id' => 6, 'resource'=> "products/porshe3_2.jpg"],
            ['id'=> 18, 'product_id' => 6, 'resource'=> "products/porshe3_3.jpg"],
            ['id'=> 19, 'product_id' => 6, 'resource'=> "products/porshe3_4.jpg"],
            ['id'=> 20, 'product_id' => 6, 'resource'=> "products/porshe3_5.jpg"],

            ['id'=> 21, 'product_id' => 7, 'resource'=> "products/porshe4_2.jpg"],
            ['id'=> 22, 'product_id' => 7, 'resource'=> "products/porshe4_3.jpg"],
            ['id'=> 23, 'product_id' => 7, 'resource'=> "products/porshe4_4.jpg"],
            ['id'=> 24, 'product_id' => 7, 'resource'=> "products/porshe4_5.jpg"],

            ['id'=> 25, 'product_id' => 8, 'resource'=> "products/porshe5_2.jpg"],
            ['id'=> 26, 'product_id' => 8, 'resource'=> "products/porshe5_3.jpg"],
            ['id'=> 27, 'product_id' => 8, 'resource'=> "products/porshe5_4.jpg"],
            ['id'=> 28, 'product_id' => 8, 'resource'=> "products/porshe5_5.jpg"],

            ['id'=> 29, 'product_id' => 4, 'resource'=> "products/porshe1_2.jpg"],
            ['id'=> 30, 'product_id' => 4, 'resource'=> "products/porshe1_3.jpg"],
            ['id'=> 31, 'product_id' => 4, 'resource'=> "products/porshe1_4.jpg"],
            ['id'=> 32, 'product_id' => 4, 'resource'=> "products/porshe1_5.jpg"],

            ['id'=> 33, 'product_id' => 15, 'resource'=> "products/bmw4_2.jpg"],
            ['id'=> 34, 'product_id' => 15, 'resource'=> "products/bmw4_3.jpg"],
            ['id'=> 35, 'product_id' => 15, 'resource'=> "products/bmw4_4.jpg"],
            ['id'=> 36, 'product_id' => 15, 'resource'=> "products/bmw4_5.jpg"],

            ['id'=> 37, 'product_id' => 16, 'resource'=> "products/bmw5_2.jpg"],
            ['id'=> 38, 'product_id' => 16, 'resource'=> "products/bmw5_3.jpg"],
            ['id'=> 39, 'product_id' => 16, 'resource'=> "products/bmw5_4.jpg"],
            ['id'=> 40, 'product_id' => 16, 'resource'=> "products/bmw5_5.jpg"],

            ['id'=> 41, 'product_id' => 17, 'resource'=> "products/bmw6_2.jpg"],
            ['id'=> 42, 'product_id' => 17, 'resource'=> "products/bmw6_3.jpg"],
            ['id'=> 43, 'product_id' => 17, 'resource'=> "products/bmw6_4.jpg"],
            ['id'=> 44, 'product_id' => 17, 'resource'=> "products/bmw6_5.jpg"],
            
        ];
        DB::table('img_products')->insert($img_products);
    }
}
