<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ModerationStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $moderation_status = [
            ['id'=> 1, 'name' => "идут показы"],
            ['id'=> 2, 'name' => "не прошло модерацию"],
            ['id'=> 3, 'name' => "на модерации"],
            ['id'=> 4, 'name' => "продано"],
            ['id'=> 5, 'name' => "снято с продажи"],
            ['id'=> 6, 'name' => "срок размещения истек"],
        ];
        DB::table('moderation_status')->insert($moderation_status);
    }
}
