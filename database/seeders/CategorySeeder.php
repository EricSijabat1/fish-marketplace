<?php
// database/seeders/CategorySeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run()
    {
        $categories = [
            [
                'name' => 'Ikan Air Tawar',
                'slug' => 'ikan-air-tawar',
                'description' => 'Ikan segar dari perairan tawar Danau Toba'
            ],
            [
                'name' => 'Ikan Batak',
                'slug' => 'ikan-batak',
                'description' => 'Ikan khas Batak dari Danau Toba'
            ],
            [
                'name' => 'Ikan Mas',
                'slug' => 'ikan-mas',
                'description' => 'Ikan mas segar dari Danau Toba'
            ],
            [
                'name' => 'Ikan Mujair',
                'slug' => 'ikan-mujair',
                'description' => 'Ikan mujair berkualitas tinggi'
            ],
            [
                'name' => 'Ikan Nila',
                'slug' => 'ikan-nila',
                'description' => 'Ikan nila segar pilihan'
            ],
            [
                'name' => 'Ikan Lele',
                'slug' => 'ikan-lele',
                'description' => 'Ikan lele segar dan berkualitas'
            ],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
