<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CompanyProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AdminProfilController extends Controller
{
    public function edit()
    {
        $profile = CompanyProfile::firstOrCreate([
            'name' => 'PT Frisian Flag Indonesia'
        ], [
            'email' => 'info@frisianflag.co.id',
            'phone' => '021-123456',
            'address' => 'Jakarta, Indonesia',
            'about_title' => 'Perjalanan Kami dalam Menjadi Bagian dari Kehidupan',
            'about_description' => "Kami hadir untuk memberikan produk dan layanan yang konsisten, terpercaya, dan relevan.\n\nDengan komitmen jangka panjang, kami terus berkembang mengikuti kebutuhan zaman.",
            'vision' => 'Menjadi bagian penting dalam kehidupan masyarakat melalui kualitas yang dipercaya.',
            'mission' => 'Menyediakan produk berkualitas dan terus berinovasi untuk masa depan yang lebih baik.',
            'logo' => 'logo.png',
        ]);
        return view('admin.profil.edit', compact('profile'));
    }

    public function update(Request $request)
    {
        $profile = CompanyProfile::first();
        if (!$profile) {
            $profile = new CompanyProfile();
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:50',
            'address' => 'required|string|max:255',
            'about_title' => 'required|string|max:255',
            'about_description' => 'required|string',
            'vision' => 'required|string',
            'mission' => 'required|string',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,webp,gif|max:2048',
        ], [
            'name.required' => 'Nama perusahaan wajib diisi.',
            'email.required' => 'Email perusahaan wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'phone.required' => 'Telepon perusahaan wajib diisi.',
            'address.required' => 'Alamat perusahaan wajib diisi.',
            'about_title.required' => 'Judul Tentang Kami wajib diisi.',
            'about_description.required' => 'Deskripsi Tentang Kami wajib diisi.',
            'vision.required' => 'Visi perusahaan wajib diisi.',
            'mission.required' => 'Misi perusahaan wajib diisi.',
            'logo.image' => 'File yang diunggah harus berupa gambar.',
            'logo.mimes' => 'Format gambar yang didukung adalah jpeg, png, jpg, webp, gif.',
            'logo.max' => 'Ukuran gambar maksimal adalah 2MB.',
        ]);

        if ($request->hasFile('logo')) {
            if ($profile->logo && File::exists(public_path('images/' . $profile->logo)) && $profile->logo !== 'logo.png') {
                File::delete(public_path('images/' . $profile->logo));
            }

            $logoFile = $request->file('logo');
            $filename = 'logo_' . time() . '_' . uniqid() . '.' . $logoFile->getClientOriginalExtension();
            $logoFile->move(public_path('images'), $filename);
            $validated['logo'] = $filename;
        }

        $profile->fill($validated);
        $profile->save();

        return redirect()->route('admin.profil.edit')->with('success', 'Profil perusahaan berhasil diperbarui.');
    }
}
