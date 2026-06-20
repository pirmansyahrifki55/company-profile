<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Artikel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AdminArtikelController extends Controller
{
    public function index()
    {
        $artikels = Artikel::latest()->paginate(10);
        return view('admin.artikel.index', compact('artikels'));
    }

    public function create()
    {
        return view('admin.artikel.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255|unique:artikels,title',
            'description' => 'required|string',
            'categori' => 'required|string|max:100',
            'status' => 'required|in:draft,published,archived',
            'image' => 'required|image|mimes:jpeg,png,jpg,webp,gif|max:2048',
        ], [
            'title.required' => 'Judul artikel wajib diisi.',
            'title.unique' => 'Judul artikel sudah digunakan, silakan buat judul lain.',
            'description.required' => 'Konten deskripsi wajib diisi.',
            'categori.required' => 'Kategori wajib diisi.',
            'status.required' => 'Status publikasi wajib dipilih.',
            'image.required' => 'Gambar artikel wajib diunggah.',
            'image.image' => 'File yang diunggah harus berupa gambar.',
            'image.mimes' => 'Format gambar yang didukung adalah jpeg, png, jpg, webp, gif.',
            'image.max' => 'Ukuran gambar maksimal adalah 2MB.',
        ]);

        if ($request->hasFile('image')) {
            $imageFile = $request->file('image');
            $filename = 'artikel_' . time() . '_' . uniqid() . '.' . $imageFile->getClientOriginalExtension();
            $imageFile->move(public_path('images'), $filename);
            $validated['image'] = $filename;
        }

        Artikel::create($validated);

        return redirect()->route('admin.artikel.index')->with('success', 'Artikel berhasil ditambahkan.');
    }

    public function show($id)
    {
        $artikel = Artikel::findOrFail($id);
        return view('admin.artikel.show', compact('artikel'));
    }

    public function edit($id)
    {
        $artikel = Artikel::findOrFail($id);
        return view('admin.artikel.edit', compact('artikel'));
    }

    public function update(Request $request, $id)
    {
        $artikel = Artikel::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255|unique:artikels,title,' . $artikel->id,
            'description' => 'required|string',
            'categori' => 'required|string|max:100',
            'status' => 'required|in:draft,published,archived',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp,gif|max:2048',
        ], [
            'title.required' => 'Judul artikel wajib diisi.',
            'title.unique' => 'Judul artikel sudah digunakan.',
            'description.required' => 'Konten deskripsi wajib diisi.',
            'categori.required' => 'Kategori wajib diisi.',
            'status.required' => 'Status publikasi wajib dipilih.',
            'image.image' => 'File yang diunggah harus berupa gambar.',
            'image.mimes' => 'Format gambar yang didukung adalah jpeg, png, jpg, webp, gif.',
            'image.max' => 'Ukuran gambar maksimal adalah 2MB.',
        ]);

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($artikel->image && File::exists(public_path('images/' . $artikel->image))) {
                File::delete(public_path('images/' . $artikel->image));
            }

            $imageFile = $request->file('image');
            $filename = 'artikel_' . time() . '_' . uniqid() . '.' . $imageFile->getClientOriginalExtension();
            $imageFile->move(public_path('images'), $filename);
            $validated['image'] = $filename;
        }

        $artikel->update($validated);

        return redirect()->route('admin.artikel.index')->with('success', 'Artikel berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $artikel = Artikel::findOrFail($id);

        if ($artikel->image && File::exists(public_path('images/' . $artikel->image))) {
            File::delete(public_path('images/' . $artikel->image));
        }

        $artikel->delete();

        return redirect()->route('admin.artikel.index')->with('success', 'Artikel berhasil dihapus.');
    }
}
