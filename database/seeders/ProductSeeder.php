<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $categories = Category::whereNotNull('parent_id')->get();

        Product::factory(40)->create()->each(function ($product) use ($categories) {
            $randomCategories = $categories->random(rand(1, 3)); //Nuo 1 iki 3 atsitiktinės subkategorijos
            $product->categories()->attach($randomCategories->pluck('id'));
        });
    }
}