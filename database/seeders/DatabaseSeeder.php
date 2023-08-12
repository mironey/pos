<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Customer;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@pos.com',
            'password' => bcrypt('12345678'),
        ]);

        $categories = ["Fashion and Lifestyle", "Health and Beauty", "Electronic Device", "Groceries", "Sports", "Baby Care", "Pet Care", "Home and Kitchen", "Stationery and Office", "Food"];
        foreach ($categories as $category) {
            Category::create([
                'name' => $category
            ]);
        }

        Customer::factory(10)->create();
        Product::factory(50)->create();
    }
}
