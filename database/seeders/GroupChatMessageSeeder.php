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
            ['id' => 1, 'owner_id' => 1, 'user_minor_id' => 2],
            ['id' => 2, 'onwer_id' => 2, 'user_minor_id' => 1],
        ];
        DB::table('chat_group')->insert($messagesDB);
        
    }
}
