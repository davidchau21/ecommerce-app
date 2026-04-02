<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $tech = Category::where('slug', 'electronics')->first();
        $fashion = Category::where('slug', 'fashion')->first();

        $products = [
            // Tech Collection - Exhibition 01
            [
                'category_id' => $tech->id,
                'name'        => 'AURA ONE / CERAMIC',
                'slug'        => 'aura-one-ceramic',
                'description' => 'A singular slab of high-density ceramic. The Aura One redefines the interface between human and digital intent.',
                'price'       => 1299.00,
                'stock'       => 15,
                'image_url'   => 'https://images.unsplash.com/photo-1592899677977-9c10ca588bbd?q=80&w=1000',
                'is_active'   => true,
            ],
            [
                'category_id' => $tech->id,
                'name'        => 'MONOLITH / LAPTOP',
                'slug'        => 'monolith-laptop',
                'description' => 'Milled from a solid block of aerospace-grade magnesium. Performance delivered through architectural silence.',
                'price'       => 2450.00,
                'stock'       => 8,
                'image_url'   => 'https://images.unsplash.com/photo-1517336714731-489689fd1ca8?q=80&w=1000',
                'is_active'   => true,
            ],
            [
                'category_id' => $tech->id,
                'name'        => 'VOID / HEADPHONES',
                'slug'        => 'void-headphones',
                'description' => 'Active acoustic cancellation. A seamless loop of sound and form, crafted for the auditory purist.',
                'price'       => 599.00,
                'stock'       => 25,
                'image_url'   => 'https://images.unsplash.com/photo-1505740420928-5e560c06d30e?q=80&w=1000',
                'is_active'   => true,
            ],

            // Fashion Collection - Exhibition 02
            [
                'category_id' => $fashion->id,
                'name'        => 'OBJECT 01 / HEAVY TEE',
                'slug'        => 'object-01-heavy-tee',
                'description' => '400GSM organic cotton. A study in drape and structural permanence. Minimalist silhouette.',
                'price'       => 85.00,
                'stock'       => 100,
                'image_url'   => 'https://images.unsplash.com/photo-1521572163474-6864f9cf17ab?q=80&w=1000',
                'is_active'   => true,
            ],
            [
                'category_id' => $fashion->id,
                'name'        => 'ARTIFACT / SHELL',
                'slug'        => 'artifact-shell',
                'description' => 'Three-layer waterproof membrane. Designed for the urban explorer navigating architectural grids.',
                'price'       => 420.00,
                'stock'       => 12,
                'image_url'   => 'https://images.unsplash.com/photo-1591047139829-d91aecb6caea?q=80&w=1000',
                'is_active'   => true,
            ],
            [
                'category_id' => $fashion->id,
                'name'        => 'PRIMITIVE / BACKPACK',
                'slug'        => 'primitive-backpack',
                'description' => 'Ballistic nylon and vegetable-tanned leather. A daily container for your digital essentials.',
                'price'       => 295.00,
                'stock'       => 30,
                'image_url'   => 'https://images.unsplash.com/photo-1553062407-98eeb64c6a62?q=80&w=1000',
                'is_active'   => true,
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
