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

            ['id' => 1, 'menu_id' => 1, 'item_name' => 'Автомобили', 'parrent_item_id' => null],
            ['id' => 2, 'menu_id' => 1, 'item_name' => 'Спецтехника', 'parrent_item_id' => null],
            ['id' => 3, 'menu_id' => 1, 'item_name' => 'Запчасти', 'parrent_item_id' => null],
            ['id' => 4, 'menu_id' => 1, 'item_name' => 'Отзывы', 'parrent_item_id' => null],
            ['id' => 5, 'menu_id' => 1, 'item_name' => 'Каталог', 'parrent_item_id' => null],
            ['id' => 6, 'menu_id' => 1, 'item_name' => 'Шины', 'parrent_item_id' => null],
            ['id' => 7, 'menu_id' => 1, 'item_name' => 'Еще', 'parrent_item_id' => null],

            ['id' => 8, 'menu_id' => 1, 'item_name' => 'Аукционы Япониифлаг Японии', 'parrent_item_id' => 7],
            ['id' => 9, 'menu_id' => 1, 'item_name' => 'Автомобили из Кореифлаг Кореи', 'parrent_item_id' => 7],
        ];



        DB::table('items_menu')->insert($items);
    }
}
