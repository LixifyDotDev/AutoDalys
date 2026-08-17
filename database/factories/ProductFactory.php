<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    public function definition(): array
    {
        $name = fake()->unique()->words(3, true);
        $price = fake()->randomFloat(2, 10, 500);
        $hasSale = fake()->boolean(30); // 30% šansas turėti nuolaidą

        return [
            'name' => ucfirst($name),
            'slug' => Str::slug($name) . '-' . fake()->unique()->numberBetween(1000, 9999),
            'description' => fake()->paragraphs(3, true),
            'price' => $price,
            'sale_price' => $hasSale ? round($price * 0.8, 2) : null,
            'stock' => fake()->numberBetween(0, 100),
            'sku' => strtoupper(fake()->unique()->bothify('SKU-####-????')),
            'is_active' => true,
        ];
    }
}