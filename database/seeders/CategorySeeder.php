<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'Electronics', 'slug' => 'electronics', 'description' => 'Gadgets and devices.'],
            ['name' => 'Fashion', 'slug' => 'fashion', 'description' => 'Clothing and accessories.'],
            ['name' => 'Home & Garden', 'slug' => 'home-garden', 'description' => 'Furniture and plants.'],
            ['name' => 'Books', 'slug' => 'books', 'description' => 'Literature and guides.'],
        ];

        foreach ($categories as $category) {
            \App\Models\Category::create($category);
        }
    }
}
