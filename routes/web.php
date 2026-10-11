<?php

use App\Http\Controllers\Admin\AccountController;
use App\Http\Controllers\Admin\CatalogController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CatalogDetailController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SitemapController;
use Illuminate\Support\Facades\Route;

// Public User Routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/katalog/{slug}', [CatalogDetailController::class, 'show'])->name('katalog.detail');
Route::get('/sitemap.xml', [SitemapController::class, 'index'])->name('sitemap');
Route::get('/robots.txt', [SitemapController::class, 'robots'])->name('robots');

// Authentication Routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::get('/admin/login', [AuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/admin/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::post('/admin/logout', [AuthController::class, 'logout']);

// Admin Protected Routes (Metronic Theme)
Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboard', [DashboardController::class, 'index']);

    // Manajemen Profil (Update saja jika sudah diinput 1)
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');

    // Manajemen Akun (CRUD: uuid, username, password)
    Route::resource('accounts', AccountController::class)->parameters(['accounts' => 'uuid']);

    // Manajemen Katalog (CRUD: nama produk, harga, keterangan, foto max 3)
    Route::resource('catalogs', CatalogController::class)->parameters(['catalogs' => 'uuid']);

    // Manajemen Testimoni (CRUD: uuid, nama pelanggan, keterangan, foto)
    Route::resource('testimonials', TestimonialController::class)->parameters(['testimonials' => 'uuid']);
});
