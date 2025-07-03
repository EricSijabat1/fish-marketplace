<?php
// database/seeders/ProductSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category;
use App\Models\User;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $seller1 = User::where('email', 'nelayan1@fishdanautoba.com')->first();
        $seller2 = User::where('email', 'nelayan2@fishdanautoba.com')->first();

        $categories = Category::all();

        $products = [
            [
                'name' => 'Ikan Mas Segar',
                'scientific_name' => 'Cyprinus carpio',
                'description' => 'Ikan mas segar langsung dari Danau Toba. Ditangkap pagi hari dengan tingkat kesegaran terjamin.',
                'price' => 25000,
                'stock' => 50,
                'unit' => 'kg',
                'catch_location' => 'Danau Toba - Parapat',
                'catch_date' => now()->subDays(1),
                'freshness_level' => 'sangat_segar',
                'seller_id' => $seller1->id,
                'is_active' => true
            ],
            [
                'name' => 'Ikan Nila Merah',
                'scientific_name' => 'Oreochromis niloticus',
                'description' => 'Ikan nila merah berkualitas premium dari perairan jernih Danau Toba.',
                'price' => 22000,
                'stock' => 30,
                'unit' => 'kg',
                'catch_location' => 'Danau Toba - Samosir',
                'catch_date' => now()->subDays(1),
                'freshness_level' => 'sangat_segar',
                'seller_id' => $seller2->id,
                'is_active' => true
            ],
            [
                'name' => 'Ikan Mujair',
                'scientific_name' => 'Oreochromis mossambicus',
                'description' => 'Ikan mujair segar dengan daging tebal dan rasa yang lezat.',
                'price' => 20000,
                'stock' => 40,
                'unit' => 'kg',
                'catch_location' => 'Danau Toba - Parapat',
                'catch_date' => now()->subDays(1),
                'freshness_level' => 'segar',
                'seller_id' => $seller1->id,
                'is_active' => true
            ],
            [
                'name' => 'Ikan Batak (Ihan)',
                'scientific_name' => 'Neolissochilus thienemanni',
                'description' => 'Ikan khas Batak yang hanya ada di Danau Toba. Sangat langka dan bernutrisi tinggi.',
                'price' => 45000,
                'stock' => 15,
                'unit' => 'kg',
                'catch_location' => 'Danau Toba - Samosir',
                'catch_date' => now()->subDays(1),
                'freshness_level' => 'sangat_segar',
                'seller_id' => $seller2->id,
                'is_active' => true
            ],
            [
                'name' => 'Ikan Lele Dumbo',
                'scientific_name' => 'Clarias gariepinus',
                'description' => 'Ikan lele dumbo segar dengan ukuran besar dan daging empuk.',
                'price' => 18000,
                'stock' => 60,
                'unit' => 'kg',
                'catch_location' => 'Danau Toba - Parapat',
                'catch_date' => now()->subDays(1),
                'freshness_level' => 'segar',
                'seller_id' => $seller1->id,
                'is_active' => true
            ]
        ];

        foreach ($products as $productData) {
            $product = Product::create($productData);

            // Attach random categories
            $randomCategories = $categories->random(rand(1, 3));
            $product->categories()->attach($randomCategories);
        }
    }
}
