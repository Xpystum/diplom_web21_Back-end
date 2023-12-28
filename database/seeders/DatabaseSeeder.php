<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'status' => 'admin',
            'password' => Hash::make('admin'),
            'cash' => 1000000,
            'city' => 'Нижний Новгород',
        ]);
        \App\Models\User::factory(3)->create();

        \App\Models\User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
        
        \App\Models\User::factory()->create([
            'name' => 'Bad Man',
            'email' => 'bad_man@example.com',
            'status' => 'ban',
            'password' => Hash::make('banMan'),
        ]);

        $this->call([
            MenuSeeder::class,
            MenuitemsSeeder::class,
            CategoryProductsSeeder::class,
    
            BrandsSeeder::class,
            ModelsSeeder::class,
            OrganisationSeeder::class,
            FuelSeeder::class,
            TransmissionSeeder::class,
            DriveUnitSeeder::class,
            BodyTypeSeeder::class,
            ColorSeeder::class,
            
            ProductImgSeeder::class,
            ProductSeeder::class,
            

        ]);
    }
}
