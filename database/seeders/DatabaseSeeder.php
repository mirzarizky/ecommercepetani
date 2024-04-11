<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\PaymentMethod;
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
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'role' => 'admin',
        ]);
        User::factory()->create([
            'name' => 'Customer',
            'email' => 'customer@gmail.com',
            'role' => 'customer'
        ]);
        User::factory()->create([
            'name' => 'Seller',
            'email' => 'seller@gmail.com',
            'role' => 'seller'
        ]);

        $this->call([
            CategorySeeder::class,
            ProductSeeder::class,
            PaymentMethodSeeder::class,
        ]);
    }
}
