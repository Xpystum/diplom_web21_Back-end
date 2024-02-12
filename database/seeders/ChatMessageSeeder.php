<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ChatMessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $messagesDB = [
            ['id' => 1, 'user_id' => '1', 'message' => 'Всем привет, я Админ привествую в нашем чате', 'created_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['id' => 2, 'user_id' => '2', 'message' => 'Приветствую Админ, рад знакомству, это лучший чат в моей жизни', 'created_at' => Carbon::now()->format('Y-m-d H:i:s') ],
            ['id' => 3, 'user_id' => '3', 'message' => 'Всем привет, я третия!', 'created_at' => Carbon::now()->format('Y-m-d H:i:s') ],
            ['id' => 4, 'user_id' => '4', 'message' => 'Илья, Это Лучший чат', 'created_at' => Carbon::now()->format('Y-m-d H:i:s') ],
            ['id' => 5, 'user_id' => '6', 'message' => 'Я так не думаю', 'created_at' => Carbon::now()->format('Y-m-d H:i:s') ],
        ];
        DB::table('chatmessages')->insert($messagesDB);
    }
}
