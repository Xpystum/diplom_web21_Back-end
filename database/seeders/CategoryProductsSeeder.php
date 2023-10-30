<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $category = [
            ['id' => 1, 'name' => 1, 'name' => 'Автомобили', 'alias' => 'auto'],
            ['id' => 2, 'name' => 'Спецтехника', 'alias' => 'special-equipment'],
            ['id' => 3, 'name' => 'Запчасти', 'alias' => 'spare-parts'],
            ['id' => 4, 'name' => 'Шины', 'alias' => 'tires'],
            ['id' => 5, 'name' => 'Аукционы Япониифлаг Японии', 'alias' => 'auctions-japan'],
            ['id' => 6, 'name' => 'Автомобили из Кореифлаг Кореи', 'alias' => 'auctions-korea'],
        ];


        DB::table('category_products')->insert($category);
    }
}
