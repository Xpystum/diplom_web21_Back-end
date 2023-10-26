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
            ['id' => 2, 'menu_id' => 1, 'item_name' => 'Грузовики и спецтехника', 'parrent_item_id' => null],
            ['id' => 3, 'menu_id' => 1, 'item_name' => 'Запчасти', 'parrent_item_id' => null],
            ['id' => 4, 'menu_id' => 1, 'item_name' => 'Отзывы', 'parrent_item_id' => null],
            ['id' => 5, 'menu_id' => 1, 'item_name' => 'Каталог', 'parrent_item_id' => null],
            ['id' => 6, 'menu_id' => 1, 'item_name' => 'Шины', 'parrent_item_id' => null],
            ['id' => 7, 'menu_id' => 1, 'item_name' => 'Еще', 'parrent_item_id' => null],

            ['id' => 8, 'menu_id' => 1, 'item_name' => 'Продажа шин', 'parrent_item_id' => 7],
            ['id' => 9, 'menu_id' => 1, 'item_name' => 'Аукционы Японии', 'parrent_item_id' => 7,"image"=> "flag/japan.svg"],
            ['id' => 10, 'menu_id' => 1, 'item_name' => 'Автомобили из Кореи', 'parrent_item_id' => 7,"image"=> "flag/korea.svg"],
            ['id' => 11, 'menu_id' => 1, 'item_name' => 'Автомобили из Германии', 'parrent_item_id' => 7,"image"=> "flag/germany.svg"],
            ['id' => 12, 'menu_id' => 1, 'item_name' => 'Электромобили', 'parrent_item_id' => 7],
            ['id' => 13, 'menu_id' => 1, 'item_name' => 'Мотоциклы', 'parrent_item_id' => 7],
            ['id' => 14, 'menu_id' => 1, 'item_name' => 'ОСАГО онлайн', 'parrent_item_id' => 7],
            ['id' => 15, 'menu_id' => 1, 'item_name' => 'Автокредиты', 'parrent_item_id' => 7],
            ['id' => 16, 'menu_id' => 1, 'item_name' => 'Проверка по VIN', 'parrent_item_id' => 7],
            ['id' => 17, 'menu_id' => 1, 'item_name' => 'Оценить автомобиль', 'parrent_item_id' => 7],
            ['id' => 18, 'menu_id' => 1, 'item_name' => 'Форумы', 'parrent_item_id' => 7],
            ['id' => 19, 'menu_id' => 1, 'item_name' => 'ПДД онлайн', 'parrent_item_id' => 7],
            ['id' => 20, 'menu_id' => 1, 'item_name' => 'Вопросы и ответы', 'parrent_item_id' => 7],
            ['id' => 21, 'menu_id' => 1, 'item_name' => 'Рейтинг авто', 'parrent_item_id' => 7],
            ['id' => 22, 'menu_id' => 1, 'item_name' => 'Каталог шин', 'parrent_item_id' => 7],
            ['id' => 23, 'menu_id' => 1, 'item_name' => 'Договор купли-продажи', 'parrent_item_id' => 7],
            ['id' => 24, 'menu_id' => 1, 'item_name' => 'Правовые вопросы', 'parrent_item_id' => 7],
            ['id' => 25, 'menu_id' => 1, 'item_name' => 'Карта сайта', 'parrent_item_id' => 7],
            ['id' => 26, 'menu_id' => 1, 'item_name' => 'Размещение на Дроме', 'parrent_item_id' => 7],
            ['id' => 27, 'menu_id' => 1, 'item_name' => 'Разместить прайс', 'parrent_item_id' => 7],
            ['id' => 28, 'menu_id' => 1, 'item_name' => 'Помощь', 'parrent_item_id' => 7],
        ];

        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        


        DB::table('items_menu')->insert($items);
    }
}
