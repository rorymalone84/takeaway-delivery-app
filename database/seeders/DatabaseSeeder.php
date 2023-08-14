<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
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
            'delivery_price' => 5.00,
        ]);

        $this->call(RoleSeeder::class);

        \App\Models\User::factory(10)->create();

        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'address' => 'Lang Stracht',
            'postcode' => 'AB10 ABZ',
            'city' => 'aberdeen',
            'store_id' => 1,
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        ])->assignRole('admin');

        User::factory()->create([
            'name' => 'customer',
            'email' => 'customer@customer.com',
            'city' => 'aberdeen',
            'store_id' => 1,
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        ])->assignRole('customer');

        User::factory()->create([
            'name' => 'chef',
            'email' => 'chef@chef.com',
            'city' => 'aberdeen',
            'store_id' => 1,
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        ])->assignRole('chef');

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