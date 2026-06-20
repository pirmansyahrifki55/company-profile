<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            [
                'name' => 'Susu Kental Manis Frisian Flag',
                'description' => 'Lezat, manis, cocok untuk campuran minuman dan makanan penutup harian Anda.',
                'price' => 15000,
                'image' => 'susu1.png',
                'status' => 'active',
            ],
            [
                'name' => 'Susu UHT Purefarm',
                'description' => 'Praktis dan bernutrisi tinggi, diproses dengan teknologi UHT untuk menjaga kesegaran susu sapi alami.',
                'price' => 6500,
                'image' => 'susu2.png',
                'status' => 'active',
            ],
            [
                'name' => 'Susu Bubuk Kompleks Keluarga',
                'description' => 'Melengkapi kebutuhan nutrisi seluruh anggota keluarga dengan formula gizi seimbang.',
                'price' => 45000,
                'image' => 'susu3.png',
                'status' => 'active',
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
