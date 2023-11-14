<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FuelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $fuel = [
            ['id'=> 1, 'name' => "Бензин"],
            ['id'=> 2, 'name' => "Дизель"],
            ['id'=> 3, 'name' => "Электро"],
            ['id'=> 4, 'name' => "Гибрид"],
            ['id'=> 5, 'name' => "ГБО"],
        ];
        DB::table('fuel')->insert($fuel);
    }
}
