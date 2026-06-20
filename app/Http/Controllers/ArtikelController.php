<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use Illuminate\Http\Request;

class ArtikelController extends Controller
{
    public function index(){
        $artikels = Artikel::where('status', 'published')->latest()->paginate(3);
        return view('pages.artikel', compact('artikels') );
    }
     public function show($id)
     {
         $artikel = Artikel::where('status', 'published')->findOrFail($id);
        return view('pages.artikel-detail', compact('artikel'));
    }
}
