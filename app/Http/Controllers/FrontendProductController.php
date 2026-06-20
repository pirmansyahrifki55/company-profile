<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class FrontendProductController extends Controller
{
    public function index()
    {
        $products = Product::where('status', 'active')->latest()->paginate(6);
        return view('pages.produk', compact('products'));
    }
}
