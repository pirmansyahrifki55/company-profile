<?php

namespace Database\Seeders;

use App\Models\Gallery;
use Illuminate\Database\Seeder;

class GallerySeeder extends Seeder
{
    public function run(): void
    {
        $galleries = [
            [
                'title' => 'Pabrik Produksi Higienis',
                'description' => 'Proses produksi modern dengan standar kebersihan tertinggi.',
                'image' => 'susu4.png',
                'status' => 'active',
            ],
            [
                'title' => 'Peternakan Sapi Mitra',
                'description' => 'Kerja sama dengan peternak lokal untuk menghasilkan susu segar terbaik.',
                'image' => 'susu5.png',
                'status' => 'active',
            ],
            [
                'title' => 'Distribusi Nutrisi Nasional',
                'description' => 'Mengirimkan susu berkualitas ke seluruh pelosok Indonesia.',
                'image' => 'susu1.png',
                'status' => 'active',
            ],
        ];

        foreach ($galleries as $gallery) {
            Gallery::create($gallery);
        }
    }
}
