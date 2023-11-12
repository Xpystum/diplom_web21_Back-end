<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $menu = [
            ['id'=> 1, 'name_menu' => "main_menu"],
            ['id'=> 2, 'name_menu' => "footer_1_menu"],
            ['id'=> 3, 'name_menu' => "footer_2_menu"],
            ['id'=> 4, 'name_menu' => "footer_3_menu"],
            ['id'=> 5, 'name_menu' => "footer_4_menu"],
            ['id'=> 6, 'name_menu' => "footer_5_menu"],
        ];


        DB::table('menus')->insert($menu);
    }
}
