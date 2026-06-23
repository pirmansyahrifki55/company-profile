<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Barryvdh\DomPDF\Facade\Pdf;

class AdminProdukController extends Controller
{
    private function getImagePath($filename = null)
    {
        $base = public_path('images');

        if (!is_dir($base)) {
            mkdir($base, 0755, true);
        }

        return $filename ? $base . '/' . $filename : $base;
    }

    public function index()
    {
        $products = Product::latest()->paginate(10);
        return view('admin.produk.index', compact('products'));
    }

    public function create()
    {
        return view('admin.produk.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'status' => 'required|in:active,inactive',
            'image' => 'required|image|mimes:jpeg,png,jpg,webp,gif|max:2048',
        ], [
            'name.required' => 'Nama produk wajib diisi.',
            'description.required' => 'Deskripsi produk wajib diisi.',
            'price.required' => 'Harga produk wajib diisi.',
            'price.numeric' => 'Harga harus berupa angka.',
            'price.min' => 'Harga minimal adalah 0.',
            'status.required' => 'Status produk wajib dipilih.',
            'image.required' => 'Gambar produk wajib diunggah.',
            'image.image' => 'File yang diunggah harus berupa gambar.',
            'image.mimes' => 'Format gambar yang didukung adalah jpeg, png, jpg, webp, gif.',
            'image.max' => 'Ukuran gambar maksimal adalah 2MB.',
        ]);

        if ($request->hasFile('image')) {
            $imageFile = $request->file('image');
            $filename = 'produk_' . time() . '_' . uniqid() . '.' . $imageFile->getClientOriginalExtension();
            $imageFile->move($this->getImagePath(), $filename);
            $validated['image'] = $filename;
        }

        Product::create($validated);

        return redirect()->route('admin.produk.index')->with('success', 'Produk berhasil ditambahkan.');
    }

    public function show($id)
    {
        return redirect()->route('admin.produk.edit', $id);
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.produk.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'status' => 'required|in:active,inactive',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp,gif|max:2048',
        ], [
            'name.required' => 'Nama produk wajib diisi.',
            'description.required' => 'Deskripsi produk wajib diisi.',
            'price.required' => 'Harga produk wajib diisi.',
            'price.numeric' => 'Harga harus berupa angka.',
            'price.min' => 'Harga minimal adalah 0.',
            'status.required' => 'Status produk wajib dipilih.',
            'image.image' => 'File yang diunggah harus berupa gambar.',
            'image.mimes' => 'Format gambar yang didukung adalah jpeg, png, jpg, webp, gif.',
            'image.max' => 'Ukuran gambar maksimal adalah 2MB.',
        ]);

        if ($request->hasFile('image')) {
            $oldPath = $this->getImagePath($product->image);
            if ($product->image && File::exists($oldPath)) {
                File::delete($oldPath);
            }

            $imageFile = $request->file('image');
            $filename = 'produk_' . time() . '_' . uniqid() . '.' . $imageFile->getClientOriginalExtension();
            $imageFile->move($this->getImagePath(), $filename);
            $validated['image'] = $filename;
        }

        $product->update($validated);

        return redirect()->route('admin.produk.index')->with('success', 'Produk berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        $path = $this->getImagePath($product->image);
        if ($product->image && File::exists($path)) {
            File::delete($path);
        }

        $product->delete();

        return redirect()->route('admin.produk.index')->with('success', 'Produk berhasil dihapus.');
    }

    public function exportPdf()
    {
        $products = Product::all();
        $date = date('d F Y H:i');

        $pdf = Pdf::loadView('admin.produk.pdf', compact('products', 'date'));
        return $pdf->download('laporan_produk_' . date('Ymd_His') . '.pdf');
    }
}
