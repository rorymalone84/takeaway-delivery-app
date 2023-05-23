<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Product;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\Store::factory()->create([
            'name' => 'Summerhill',
            'address_line_1' => 'Unit 13, Summerhill Shopping Center',
            'address_line_2' => 'Lang Stracht',
            'city' => 'Aberdeen',
            'postcode' => 'AB1954R',
            'phone' => 01224313131,
            'latitude' => 57.151489283571486,
            'longitude' =>  -2.153055090963397
        ]);
        
        
        \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        \App\Models\Category::factory()->create([
         'title' => 'Starter',
         'user_id' => 1
        ]);

        \App\Models\Category::factory()->create([
            'title' => 'Main',
            'user_id' => 1
        ]);

        \App\Models\Category::factory()->create([
            'title' => 'Dessert',
            'user_id' => 2
        ]);

        \App\Models\Category::factory()->create([
            'title' => 'Drink',
            'user_id' => 3
        ]);

        \App\Models\Category::factory()->create([
            'title' => 'Extras',
            'user_id' => 2
        ]);

        Product::factory(10)->create();
    }
}
