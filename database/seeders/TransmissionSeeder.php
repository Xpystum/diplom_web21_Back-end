<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TransmissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $transmission = [
            ['id'=> 1, 'name' => "АКПП"],
            ['id'=> 2, 'name' => "Робот"],
            ['id'=> 3, 'name' => "Вариатор"],
            ['id'=> 4, 'name' => "МКПП"],
        ];
        DB::table('transmission')->insert($transmission);
    }
}
