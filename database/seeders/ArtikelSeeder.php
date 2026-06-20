<?php

namespace Database\Seeders;

use App\Models\Artikel;
use Illuminate\Database\Seeder;

class ArtikelSeeder extends Seeder
{
    public function run(): void
    {
        $artikels = [
            [
                'image'       => 'susu1.png',
                'title'        => 'Pentingnya Nutrisi Susu untuk Kesehatan Keluarga',
                'description'  => 'Susu merupakan sumber nutrisi penting yang mengandung kalsium, protein, dan vitamin yang dibutuhkan tubuh.',
                'categori'     => 'Nutrisi',
                'status'       => 'published',
            ],
            [
                'image'       => 'susu2.png',
                'title'        => 'Proses Produksi Susu Berkualitas Tinggi',
                'description'  => 'PT Frisian Flag memastikan setiap produk susu melalui proses produksi yang higienis.',
                'categori'     => 'Produksi',
                'status'       => 'published',
            ],
            [
                'image'       => 'susu3.png',
                'title'        => 'Inovasi Produk Susu untuk Generasi Sehat',
                'description'  => 'Inovasi terus dilakukan untuk menghadirkan berbagai varian produk susu yang lezat.',
                'categori'     => 'Inovasi',
                'status'       => 'published',
            ],
            [
                'image'       => 'susu4.png',
                'title'        => 'Tips Memilih Susu yang Tepat untuk Anak',
                'description'  => 'Memilih susu yang tepat sangat penting untuk mendukung tumbuh kembang anak.',
                'categori'     => 'Edukasi',
                'status'       => 'published',
            ],
            [
                'image'       => 'susu5.png',
                'title'        => 'Komitmen PT Frisian Flag untuk Indonesia',
                'description'  => 'Sebagai perusahaan nutrisi terkemuka, PT Frisian Flag berkomitmen mendukung kesehatan masyarakat.',
                'categori'     => 'Perusahaan',
                'status'       => 'published',
            ],
        ];

        foreach ($artikels as $artikel) {
            Artikel::create($artikel);
        }
    }
}