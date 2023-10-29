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
            ['id' => 1, 'menu_id' => 1, 'item_name' => 'Автомобили', 'parrent_item_id' => null, 'link' => '/category/auto', 'alias' => 'auto' ,"image"=> null],
            ['id' => 2, 'menu_id' => 1, 'item_name' => 'Спецтехника', 'parrent_item_id' => null, 'link' => '/category/special-equipment', 'alias' => 'special-equipment',"image"=> null],
            ['id' => 3, 'menu_id' => 1, 'item_name' => 'Запчасти', 'parrent_item_id' => null, 'link' => '/category/spare-parts', 'alias' => 'spare-parts',"image"=> null],
            ['id' => 4, 'menu_id' => 1, 'item_name' => 'Отзывы', 'parrent_item_id' => null, 'link' => '/category/reviews', 'alias' => 'reviews',"image"=> null],
            ['id' => 5, 'menu_id' => 1, 'item_name' => 'Каталог', 'parrent_item_id' => null, 'link' => '/category', 'alias' => null,"image"=> null],
            ['id' => 6, 'menu_id' => 1, 'item_name' => 'Шины', 'parrent_item_id' => null, 'link' => '/category/tires', 'alias' => 'tires',"image"=> null],
            ['id' => 7, 'menu_id' => 1, 'item_name' => 'Ещё', 'parrent_item_id' => null, 'link' => null, 'alias' => null,"image"=> null],

            ['id' => 8, 'menu_id' => 1, 'item_name' => 'Аукционы Японии', 'parrent_item_id' => 7, 'link' => '/category/auctions-japan', 'alias' => 'auctions-japan',"image"=> "flag/japan.svg"],
            ['id' => 9, 'menu_id' => 1, 'item_name' => 'Автомобили из Кореи', 'parrent_item_id' => 7, 'link' => '/category/auctions-korea', 'alias' => 'auctions-korea',"image"=> "flag/korea.svg"],
            ['id' => 10, 'menu_id' => 1, 'item_name' => 'Автомобили из Германии', 'parrent_item_id' => 7, 'link' => '/category/auctions-korea', 'alias' => '',"image"=> "flag/germany.svg"],
            ['id' => 11, 'menu_id' => 1, 'item_name' => 'Электромобили', 'parrent_item_id' => 7, 'link' => '/category/electric-cars', 'alias' => 'electric-cars',"image"=> null],
            ['id' => 12, 'menu_id' => 1, 'item_name' => 'Мотоциклы', 'parrent_item_id' => 7, 'link' => '/category/motorcycles', 'alias' => 'motorcycles',"image"=> null],
            ['id' => 13, 'menu_id' => 1, 'item_name' => 'ОСАГО онлайн', 'parrent_item_id' => 7, 'link' => '/category/osago-online', 'alias' => 'osago-online',"image"=> null],
            ['id' => 14, 'menu_id' => 1, 'item_name' => 'Автокредиты', 'parrent_item_id' => 7, 'link' => '/category/car-loans', 'alias' => 'car-loans',"image"=> null],
            ['id' => 15, 'menu_id' => 1, 'item_name' => 'Проверка по VIN', 'parrent_item_id' => 7, 'link' => '/category/check-by-VIN', 'alias' => 'check-by-VIN',"image"=> null],
            ['id' => 16, 'menu_id' => 1, 'item_name' => 'Оценить автомобиль', 'parrent_item_id' => 7, 'link' => '/category/rate-the-car', 'alias' => 'rate-the-car',"image"=> null],
            ['id' => 17, 'menu_id' => 1, 'item_name' => 'Форумы', 'parrent_item_id' => 7, 'link' => '/category/forums', 'alias' => 'forums',"image"=> null],
            ['id' => 18, 'menu_id' => 1, 'item_name' => 'ПДД онлайн', 'parrent_item_id' => 7, 'link' => '/category/traffic-regulations-online', 'alias' => 'traffic-regulations-online',"image"=> null],
            ['id' => 19, 'menu_id' => 1, 'item_name' => 'Вопросы и ответы', 'parrent_item_id' => 7, 'link' => '/category/questions-and-answers', 'alias' => 'questions-and-answers',"image"=> null],
            ['id' => 20, 'menu_id' => 1, 'item_name' => 'Рейтинг авто', 'parrent_item_id' => 7, 'link' => '/category/car-rating', 'alias' => 'car-rating',"image"=> null],
            ['id' => 21, 'menu_id' => 1, 'item_name' => 'Каталог шин', 'parrent_item_id' => 7, 'link' => '/category/tire-catalog', 'alias' => 'tire-catalog'],
            ['id' => 22, 'menu_id' => 1, 'item_name' => 'Договор купли-продажи', 'parrent_item_id' => 7, 'link' => '/category/contract-of-sale', 'alias' => 'contract-of-sale',"image"=> null],
            ['id' => 23, 'menu_id' => 1, 'item_name' => 'Правовые вопросы', 'parrent_item_id' => 7, 'link' => '/category/legal-issues', 'alias' => 'legal-issues',"image"=> null],
            ['id' => 24, 'menu_id' => 1, 'item_name' => 'Карта сайта', 'parrent_item_id' => 7, 'link' => '/category/site-map', 'alias' => 'site-map',"image"=> null],
            ['id' => 25, 'menu_id' => 1, 'item_name' => 'Размещение на Дроме', 'parrent_item_id' => 7, 'link' => '/category/accommodation-on-drome', 'alias' => 'accommodation-on-drome',"image"=> null],
            ['id' => 26, 'menu_id' => 1, 'item_name' => 'Разместить прайс', 'parrent_item_id' => 7, 'link' => '/category/post-price', 'alias' => 'post-price',"image"=> null],
            ['id' => 27, 'menu_id' => 1, 'item_name' => 'Помощь', 'parrent_item_id' => 7, 'link' => '/category/help', 'alias' => 'help',"image"=> null],

           
        ];

        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        


        DB::table('items_menu')->insert($items);
    }
}
