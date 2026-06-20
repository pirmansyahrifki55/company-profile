<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FrontendProductController;
use App\Http\Controllers\FrontendGalleryController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AdminArtikelController;
use App\Http\Controllers\Admin\AdminProdukController;
use App\Http\Controllers\Admin\AdminGaleriController;
use App\Http\Controllers\Admin\AdminProfilController;
use Illuminate\Support\Facades\Route;

// Frontend Routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::get('/artikel', [ArtikelController::class, 'index'])->name('artikel');
Route::get('/artikel/{id}', [ArtikelController::class, 'show'])->name('artikel.show');
Route::get('/produk', [FrontendProductController::class, 'index'])->name('produk');
Route::get('/galeri', [FrontendGalleryController::class, 'index'])->name('galeri');

// Admin Guest Routes (Login)
Route::get('/admin/login', [AuthController::class, 'showLogin'])->name('admin.login');
Route::post('/admin/login', [AuthController::class, 'login']);
Route::post('/admin/logout', [AuthController::class, 'logout'])->name('admin.logout');

// Admin Protected Routes
Route::middleware(['admin.auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    // CRUD Artikel
    Route::resource('artikel', AdminArtikelController::class);
    
    // CRUD Produk & PDF
    Route::get('produk/pdf', [AdminProdukController::class, 'exportPdf'])->name('produk.pdf');
    Route::resource('produk', AdminProdukController::class);
    
    // CRUD Galeri
    Route::resource('galeri', AdminGaleriController::class);
    
    // Kelola Profil
    Route::get('profil', [AdminProfilController::class, 'edit'])->name('profil.edit');
    Route::put('profil', [AdminProfilController::class, 'update'])->name('profil.update');
});