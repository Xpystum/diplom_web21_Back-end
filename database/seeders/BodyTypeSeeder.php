<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BodyTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $body_type = [
            ['id'=> 1, 'name' => "Седан"],
            ['id'=> 2, 'name' => "Хэтчбек 5 дв."],
            ['id'=> 3, 'name' => "Хэтчбек 3 дв."],
            ['id'=> 4, 'name' => "Лифтбек"],
            ['id'=> 5, 'name' => "Джип 5 дв."],
            ['id'=> 6, 'name' => "Джип 3 дв."],
            ['id'=> 7, 'name' => "Универсал"],
            ['id'=> 8, 'name' => "Минивэн"],
            ['id'=> 9, 'name' => "Пикап"],
            ['id'=> 10, 'name' => "Купе"],
            ['id'=> 11, 'name' => "Открытый"],
        ];
        DB::table('body_type')->insert($body_type);
    }
}
