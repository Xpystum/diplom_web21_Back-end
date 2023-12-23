<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ImgReviewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $img_reviews = [
            [ 'id'=>1, 'review_id'=>1, 'resource'=>'reviews/audi1_1.jpg'],
            [ 'id'=>2, 'review_id'=>1, 'resource'=>'reviews/audi1_2.jpg'],
            [ 'id'=>3, 'review_id'=>1, 'resource'=>'reviews/audi1_3.jpg'],
            [ 'id'=>4, 'review_id'=>1, 'resource'=>'reviews/audi1_4.jpg'],
            [ 'id'=>5, 'review_id'=>1, 'resource'=>'reviews/audi1_5.jpg'],

            [ 'id'=>6, 'review_id'=>2, 'resource'=>'reviews/audi2_1.jpg'],
            [ 'id'=>7, 'review_id'=>2, 'resource'=>'reviews/audi2_2.jpg'],
            [ 'id'=>8, 'review_id'=>2, 'resource'=>'reviews/audi2_3.jpg'],

            [ 'id'=>9, 'review_id'=>3, 'resource'=>'reviews/audi3_1.jpg'],

            [ 'id'=>10, 'review_id'=>4, 'resource'=>'reviews/audi4_1.jpg'],

            [ 'id'=>11, 'review_id'=>5, 'resource'=>'reviews/bmw1_1.jpg'],
            [ 'id'=>12, 'review_id'=>5, 'resource'=>'reviews/bmw1_2.jpg'],
            [ 'id'=>13, 'review_id'=>5, 'resource'=>'reviews/bmw1_3.jpg'],
            [ 'id'=>14, 'review_id'=>5, 'resource'=>'reviews/bmw1_4.jpg'],
            [ 'id'=>15, 'review_id'=>5, 'resource'=>'reviews/bmw1_5.jpg'],

            [ 'id'=>16, 'review_id'=>6, 'resource'=>'reviews/bmw2_1.jpg'],
            [ 'id'=>17, 'review_id'=>6, 'resource'=>'reviews/bmw2_2.jpg'],
            [ 'id'=>18, 'review_id'=>6, 'resource'=>'reviews/bmw2_3.jpg'],
            [ 'id'=>19, 'review_id'=>6, 'resource'=>'reviews/bmw2_4.jpg'],

            [ 'id'=>20, 'review_id'=>7, 'resource'=>'reviews/bmw3_1.jpg'],
            [ 'id'=>21, 'review_id'=>7, 'resource'=>'reviews/bmw3_2.jpg'],
            [ 'id'=>22, 'review_id'=>7, 'resource'=>'reviews/bmw3_3.jpg'],
            [ 'id'=>23, 'review_id'=>7, 'resource'=>'reviews/bmw3_4.jpg'],
        ];
        DB::table('img_reviews')->insert($img_reviews);
    }
}
