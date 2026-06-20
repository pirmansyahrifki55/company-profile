<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;

class FrontendGalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::where('status', 'active')->latest()->paginate(9);
        return view('pages.galeri', compact('galleries'));
    }
}
