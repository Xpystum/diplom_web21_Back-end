<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class MenuitemsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {


        $items = [

            ['id' => 1, 'menu_id' => 1, 'item_name' => 'Автомобили', 'parrent_item_id' => null, 'link' => '/category/auto', 'alias' => 'auto'],
            ['id' => 2, 'menu_id' => 1, 'item_name' => 'Спецтехника', 'parrent_item_id' => null, 'link' => '/category/special-equipment', 'alias' => 'special-equipment'],
            ['id' => 3, 'menu_id' => 1, 'item_name' => 'Запчасти', 'parrent_item_id' => null, 'link' => '/category/spare-parts', 'alias' => 'spare-parts'],
            ['id' => 4, 'menu_id' => 1, 'item_name' => 'Отзывы', 'parrent_item_id' => null, 'link' => '/category/reviews', 'alias' => 'reviews'],
            ['id' => 5, 'menu_id' => 1, 'item_name' => 'Каталог', 'parrent_item_id' => null, 'link' => '/category', 'alias' => null],
            ['id' => 6, 'menu_id' => 1, 'item_name' => 'Шины', 'parrent_item_id' => null, 'link' => '/category/tires', 'alias' => 'tires'],
            ['id' => 8, 'menu_id' => 1, 'item_name' => 'Аукционы Япониифлаг Японии', 'parrent_item_id' => 7, 'link' => '/category/auctions-japan', 'alias' => 'auctions-japan'],
            ['id' => 9, 'menu_id' => 1, 'item_name' => 'Автомобили из Кореифлаг Кореи', 'parrent_item_id' => 7, 'link' => '/category/auctions-korea', 'alias' => 'auctions-korea'],
        ];



        DB::table('items_menu')->insert($items);
    }   
}
