<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DriveUnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $drive_unit = [
            ['id'=> 1, 'name' => "4WD"],
            ['id'=> 2, 'name' => "Передний"],
            ['id'=> 3, 'name' => "Задний"],
        ];
        DB::table('drive_unit')->insert($drive_unit);
    }
}
