<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $color = [
            ['id'=> 1, 'name' => "Белый"],
            ['id'=> 2, 'name' => "Черный"],
            ['id'=> 3, 'name' => "Коричневый"],
            ['id'=> 4, 'name' => "Фиолетовый"],
            ['id'=> 5, 'name' => "Зеленый"],
            ['id'=> 6, 'name' => "серый"],
            ['id'=> 7, 'name' => "серебристый"],
            ['id'=> 8, 'name' => "синий"],
            ['id'=> 9, 'name' => "голубой"],
            ['id'=> 10, 'name' => "бежевый"],
            ['id'=> 11, 'name' => "желтый"],
            ['id'=> 12, 'name' => "золотистый"],
            ['id'=> 13, 'name' => "красный"],
            ['id'=> 14, 'name' => "бордовый"],
            ['id'=> 15, 'name' => "оранжевый"],
            ['id'=> 16, 'name' => "розовый"],
        ];
        DB::table('color')->insert($color);
    }
}
