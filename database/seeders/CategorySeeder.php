<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            'Variklio dalys' => ['Filtrai', 'Diržai ir grandinės', 'Tarpinės', 'Uždegimo žvakės'],
            'Stabdžių sistema' => ['Stabdžių diskai', 'Stabdžių kaladėlės', 'Suportai', 'Stabdžių žarnelės'],
            'Važiuoklė ir pakaba' => ['Amortizatoriai', 'Svirtys ir šarnyrai', 'Pusašiai', 'Guoliai'],
            'Kėbulo dalys' => ['Bamperiai', 'Žibintai', 'Veidrodėliai', 'Kapoktai ir sparnai'],
            'Autochemija ir skysčiai' => ['Variklio alyva', 'Aušinimo skystis', 'Langų ploviklis', 'Priedai alyvai'],
        ];

        foreach ($categories as $parentName => $children) {
            $parent = Category::create([
                'name' => $parentName,
                'slug' => Str::slug($parentName),
            ]);

            foreach ($children as $childName) {
                Category::create([
                    'name' => $childName,
                    'slug' => Str::slug($parentName . '-' . $childName),
                    'parent_id' => $parent->id,
                ]);
            }
        }
    }
}