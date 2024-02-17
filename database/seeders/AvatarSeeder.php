<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AvatarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $avatarJpg = [
            ['id'=> 1, 'resource' => 'avatar/dje.jpg'],
            ['id'=> 2, 'resource' => 'avatar/girl2.jpg'],
            ['id'=> 3, 'resource' => 'avatar/muhamed.jpg'],
            ['id'=> 4, 'resource' => 'avatar/programmist.jpg'],
            ['id'=> 5, 'resource' => 'avatar/stalin.jpg'],
            ['id'=> 6, 'resource' => 'avatar/troll.jpg'],
            ['id'=> 7, 'resource' => 'avatar/stiv.jpg'],
            ['id'=> 8, 'resource' => 'avatar/ilia.jpg'],
        ];
        DB::table('avatar')->insert($avatarJpg);
    }
}
