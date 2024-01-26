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
        // DB::table('avatar')->insert([
        //     ['id'=> 1, 'resources' => 'avatar/dje.jpg'],
        //     ['id'=> 2, 'resources' => 'avatar/girl2.jpg'],
        //     ['id'=> 3, 'resources' => 'avatar/muhamed.jpg'],
        //     ['id'=> 4, 'resources' => 'avatar/programmist.jpg'],
        //     ['id'=> 5, 'resources' => 'avatar/stalin.jpg'],
        //     ['id'=> 6, 'resources' => 'avatar/troll.jpg'],
        // ]);

        $avatarJpg = [
            ['id'=> 1, 'resource' => 'avatar/dje.jpg'],
            ['id'=> 2, 'resource' => 'avatar/girl2.jpg'],
            ['id'=> 3, 'resource' => 'avatar/muhamed.jpg'],
            ['id'=> 4, 'resource' => 'avatar/programmist.jpg'],
            ['id'=> 5, 'resource' => 'avatar/stalin.jpg'],
            ['id'=> 6, 'resource' => 'avatar/troll.jpg'],
            ['id'=> 7, 'resource' => 'avatar/stiv.jpg'],
        ];
        DB::table('avatar')->insert($avatarJpg);
    }
}
