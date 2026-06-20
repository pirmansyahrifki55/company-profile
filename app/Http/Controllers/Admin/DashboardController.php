<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Artikel;
use App\Models\Product;
use App\Models\Gallery;

class DashboardController extends Controller
{
    public function index()
    {
        $artikelCount = Artikel::count();
        $productCount = Product::count();
        $galleryCount = Gallery::count();

        return view('admin.dashboard', compact('artikelCount', 'productCount', 'galleryCount'));
    }
}
