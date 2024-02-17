<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GroupChatMessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $messagesDB = [
            ['id' => 1, 'user_from_id' => 1 , 'user_to_id' => 2],
        ];
        DB::table('chatgroup')->insert($messagesDB);
        
    }
}
