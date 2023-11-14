<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrganisationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $organisation = [
            ['id'=> 1, 'name' => "Собственик"],
            ['id'=> 2, 'name' => "Частник"],
            ['id'=> 3, 'name' => "Компания"],
        ];
        DB::table('organisation')->insert($organisation);
    }
}
