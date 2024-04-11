<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = fake()->name();
        $user = User::where('role', 'seller')->inRandomOrder()->first();
        return [
            'user_id' => $user->id,
            'category_id' => Category::inRandomOrder()->first()->id,
            'image' => fake()->randomElement(['picture/AmmxtnwGO4iDRXg0f5MMjhV0EEYxtD3EjVtqqmNx.jpg', 'picture/xDfeyVppKCTG597AR5RtweJwofGVjJMDd1YPYnr7.jpg']),
            'name' => $name,
            'slug' => Str::slug($name),
            'price' => fake()->numberBetween(10000, 999999),
            'description' => fake()->paragraph(4),
            'is_stock' => fake()->boolean(),
        ];
    }
}
