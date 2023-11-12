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
            ['id' => 1, 'menu_id' => 1, 'item_name' => 'Автомобили', 'link' => '/category/auto', 'alias' => 'auto' ,'parrent_item_id' => null, 'img'=> null,],
            ['id' => 2, 'menu_id' => 1, 'item_name' => 'Грузовики и спецтехника', 'parrent_item_id' => null, 'link' => '/category/special-equipment', 'alias' => 'special-equipment','img'=> null,],
            ['id' => 3, 'menu_id' => 1, 'item_name' => 'Запчасти', 'parrent_item_id' => null, 'link' => '/category/spare-parts', 'alias' => 'spare-parts','img'=> null,],
            ['id' => 4, 'menu_id' => 1, 'item_name' => 'Отзывы', 'parrent_item_id' => null, 'link' => '/category/reviews', 'alias' => 'reviews','img'=> null,],
            ['id' => 5, 'menu_id' => 1, 'item_name' => 'Каталог', 'parrent_item_id' => null, 'link' => '/category', 'alias' => null,'img'=> null],
            ['id' => 6, 'menu_id' => 1, 'item_name' => 'Шины', 'parrent_item_id' => null, 'link' => '/category/tires', 'alias' => 'tires','img'=> null,],
            ['id' => 7, 'menu_id' => 1, 'item_name' => 'Ещё', 'parrent_item_id' => null, 'link' => null, 'alias' => null,'img'=> null,],

            ['id' => 8, 'menu_id' => 1, 'item_name' => 'Аукционы Японии', 'parrent_item_id' => 7, 'link' => '/category/auctions-japan', 'alias' => 'auctions-japan','img'=> 'flag/japan.svg',],
            ['id' => 9, 'menu_id' => 1, 'item_name' => 'Автомобили из Кореи', 'parrent_item_id' => 7, 'link' => '/category/auctions-korea', 'alias' => 'auctions-korea','img'=> 'flag/korea.svg',],
            ['id' => 10, 'menu_id' => 1, 'item_name' => 'Автомобили из Германии', 'parrent_item_id' => 7, 'link' => '/category/auctions-korea', 'alias' => '','img'=> 'flag/germany.svg',],
            ['id' => 11, 'menu_id' => 1, 'item_name' => 'Электромобили', 'parrent_item_id' => 7, 'link' => '/category/electric-cars', 'alias' => 'electric-cars','img'=> null,],
            ['id' => 12, 'menu_id' => 1, 'item_name' => 'Мотоциклы', 'parrent_item_id' => 7, 'link' => '/category/motorcycles', 'alias' => 'motorcycles','img'=> null,],
            ['id' => 13, 'menu_id' => 1, 'item_name' => 'ОСАГО онлайн', 'parrent_item_id' => 7, 'link' => '/category/osago-online', 'alias' => 'osago-online','img'=> null,],
            ['id' => 14, 'menu_id' => 1, 'item_name' => 'Автокредиты', 'parrent_item_id' => 7, 'link' => '/category/car-loans', 'alias' => 'car-loans','img'=> null,],
            ['id' => 15, 'menu_id' => 1, 'item_name' => 'Проверка по VIN', 'parrent_item_id' => 7, 'link' => '/category/check-by-VIN', 'alias' => 'check-by-VIN','img'=> null,],
            ['id' => 16, 'menu_id' => 1, 'item_name' => 'Оценить автомобиль', 'parrent_item_id' => 7, 'link' => '/category/rate-the-car', 'alias' => 'rate-the-car','img'=> null,],
            ['id' => 17, 'menu_id' => 1, 'item_name' => 'Форумы', 'parrent_item_id' => 7, 'link' => '/category/forums', 'alias' => 'forums','img'=> null,],
            ['id' => 18, 'menu_id' => 1, 'item_name' => 'ПДД онлайн', 'parrent_item_id' => 7, 'link' => '/category/traffic-regulations-online', 'alias' => 'traffic-regulations-online','img'=> null,],
            ['id' => 19, 'menu_id' => 1, 'item_name' => 'Вопросы и ответы', 'parrent_item_id' => 7, 'link' => '/category/questions-and-answers', 'alias' => 'questions-and-answers','img'=> null,],
            ['id' => 20, 'menu_id' => 1, 'item_name' => 'Рейтинг авто', 'parrent_item_id' => 7, 'link' => '/category/car-rating', 'alias' => 'car-rating','img'=> null,],
            ['id' => 21, 'menu_id' => 1, 'item_name' => 'Каталог шин', 'parrent_item_id' => 7, 'link' => '/category/tire-catalog', 'alias' => 'tire-catalog','img'=> null,],
            ['id' => 22, 'menu_id' => 1, 'item_name' => 'Договор купли-продажи', 'parrent_item_id' => 7, 'link' => '/category/contract-of-sale', 'alias' => 'contract-of-sale','img'=> null,],
            ['id' => 23, 'menu_id' => 1, 'item_name' => 'Правовые вопросы', 'parrent_item_id' => 7, 'link' => '/category/legal-issues', 'alias' => 'legal-issues','img'=> null,],
            ['id' => 24, 'menu_id' => 1, 'item_name' => 'Карта сайта', 'parrent_item_id' => 7, 'link' => '/category/site-map', 'alias' => 'site-map','img'=> null,],
            ['id' => 25, 'menu_id' => 1, 'item_name' => 'Размещение на Дроме', 'parrent_item_id' => 7, 'link' => '/category/accommodation-on-drome', 'alias' => 'accommodation-on-drome','img'=> null,],
            ['id' => 26, 'menu_id' => 1, 'item_name' => 'Разместить прайс', 'parrent_item_id' => 7, 'link' => '/category/post-price', 'alias' => 'post-price','img'=> null,],
            ['id' => 27, 'menu_id' => 1, 'item_name' => 'Помощь', 'parrent_item_id' => 7, 'link' => '/category/help', 'alias' => 'help','img'=> null,],
        ];

        DB::table('items_menu')->insert($items);
    }   
}
