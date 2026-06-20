<?php

namespace Database\Seeders;

use App\Models\CompanyProfile;
use Illuminate\Database\Seeder;

class CompanyProfileSeeder extends Seeder
{
    public function run(): void
    {
        CompanyProfile::create([
            'name' => 'PT Frisian Flag Indonesia',
            'email' => 'info@frisianflag.co.id',
            'phone' => '021-123456',
            'address' => 'Jakarta, Indonesia',
            'about_title' => 'Perjalanan Kami dalam Menjadi Bagian dari Kehidupan',
            'about_description' => "Kami hadir untuk memberikan produk dan layanan yang konsisten, terpercaya, dan relevan.\n\nDengan komitmen jangka panjang, kami terus berkembang mengikuti kebutuhan zaman.",
            'vision' => 'Menjadi bagian penting dalam kehidupan masyarakat melalui kualitas yang dipercaya.',
            'mission' => 'Menyediakan produk berkualitas dan terus berinovasi untuk masa depan yang lebih baik.',
            'logo' => 'logo.png',
        ]);
    }
}
