<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $electronics = \App\Models\Category::where('slug', 'electronics')->first();
        $fashion = \App\Models\Category::where('slug', 'fashion')->first();

        // Ensure categories exist
        if (!$electronics || !$fashion) {
            return;
        }

        $products = [
            [
                'category_id' => $electronics->id,
                'name'        => 'Smartphone X',
                'slug'        => 'smartphone-x',
                'description' => 'High-end smartphone with advanced features.',
                'price'       => 999.99,
                'stock'       => 50,
                'is_active'   => true,
            ],
            [
                'category_id' => $electronics->id,
                'name'        => 'Laptop Pro',
                'slug'        => 'laptop-pro',
                'description' => 'Powerful laptop for professionals.',
                'price'       => 1499.99,
                'stock'       => 20,
                'is_active'   => true,
            ],
            [
                'category_id' => $fashion->id,
                'name'        => 'T-Shirt White',
                'slug'        => 't-shirt-white',
                'description' => 'Comfortable cotton t-shirt.',
                'price'       => 19.99,
                'stock'       => 100,
                'is_active'   => true,
            ],
        ];

        foreach ($products as $product) {
            \App\Models\Product::create($product);
        }
    }
}
