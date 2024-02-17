<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WidgetsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    { 
        $transmission = [
            ['id'=> 1, 'name' => "BrandColumnWidget", 'specification'=>'Колонки с брендами','status'=>'included','position'=>'top-content-one'],
            ['id'=> 2, 'name' => "CaruselWidget", 'specification'=>'Карусель','status'=>'included','position'=>'top-content-two'],
            ['id'=> 3, 'name' => "LoginRegisterWidget", 'specification'=>'Логин/пароль','status'=>'included','position'=>''],
            ['id'=> 4, 'name' => "RelevanceProductWidget", 'specification'=>'Актуальный продукт','status'=>'included','position'=>''],
            ['id'=> 5, 'name' => "ReviewsOwnersWidget", 'specification'=>'Отзывы владельцев','status'=>'included','position'=>''],
            ['id'=> 6, 'name' => "UserPanelWidget", 'specification'=>'Панель Пользователя','status'=>'turned_off','position'=>'top-panel-right'],
        ];
        DB::table('widgets')->insert($transmission);
    }
}
