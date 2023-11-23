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
            ['id'=> 1, 'product_id' => 1, 'resource'=> "product/bmw1_2.jpg"],
            ['id'=> 2, 'product_id' => 1, 'resource'=> "product/bmw1_3.jpg"],
            ['id'=> 3, 'product_id' => 1, 'resource'=> "product/bmw1_4.jpg"],
            ['id'=> 4, 'product_id' => 1, 'resource'=> "product/bmw1_5.jpg"],

            ['id'=> 5, 'product_id' => 2, 'resource'=> "product/bmw2_2.jpg"],
            ['id'=> 6, 'product_id' => 2, 'resource'=> "product/bmw2_3.jpg"],
            ['id'=> 7, 'product_id' => 2, 'resource'=> "product/bmw2_4.jpg"],
            ['id'=> 8, 'product_id' => 2, 'resource'=> "product/bmw2_5.jpg"],

            ['id'=> 9, 'product_id' => 3, 'resource'=>  "product/porshe1_2.jpg"],
            ['id'=> 10, 'product_id' => 3, 'resource'=> "product/porshe1_3.jpg"],
            ['id'=> 11, 'product_id' => 3, 'resource'=> "product/porshe1_4.jpg"],
            ['id'=> 12, 'product_id' => 3, 'resource'=> "product/porshe1_5.jpg"],

            ['id'=> 13, 'product_id' => 4, 'resource'=> "product/porshe2_2.jpg"],
            ['id'=> 14, 'product_id' => 4, 'resource'=> "product/porshe2_3.jpg"],
            ['id'=> 15, 'product_id' => 4, 'resource'=> "product/porshe2_4.jpg"],
            ['id'=> 16, 'product_id' => 4, 'resource'=> "product/porshe2_5.jpg"],

            ['id'=> 17, 'product_id' => 5, 'resource'=> "product/porshe3_2.jpg"],
            ['id'=> 18, 'product_id' => 5, 'resource'=> "product/porshe3_3.jpg"],
            ['id'=> 19, 'product_id' => 5, 'resource'=> "product/porshe3_4.jpg"],
            ['id'=> 20, 'product_id' => 5, 'resource'=> "product/porshe3_5.jpg"],

            ['id'=> 21, 'product_id' => 6, 'resource'=> "product/porshe4_2.jpg"],
            ['id'=> 22, 'product_id' => 6, 'resource'=> "product/porshe4_3.jpg"],
            ['id'=> 23, 'product_id' => 6, 'resource'=> "product/porshe4_4.jpg"],
            ['id'=> 24, 'product_id' => 6, 'resource'=> "product/porshe4_5.jpg"],

            ['id'=> 25, 'product_id' => 7, 'resource'=> "product/porshe5_2.jpg"],
            ['id'=> 26, 'product_id' => 7, 'resource'=> "product/porshe5_3.jpg"],
            ['id'=> 27, 'product_id' => 7, 'resource'=> "product/porshe5_4.jpg"],
            ['id'=> 28, 'product_id' => 7, 'resource'=> "product/porshe5_5.jpg"],
            
        ];
        DB::table('img_products')->insert($img_products);
    }
}
