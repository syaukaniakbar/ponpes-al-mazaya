<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\NavLinkController;
use App\Http\Controllers\ProfileController;
use App\Models\Blog;
use Illuminate\Support\Facades\Route;

Route::prefix('/')->group(function () {
    Route::get('/', [MainController::class, 'index'])->name('index');
    Route::get('/pendaftaran', [MainController::class, 'pendaftaran'])->name('pendaftaran');
    Route::get('/al-mazaya-blog', [MainController::class, 'blog'])->name('blog.al-mazaya');
    Route::get('/al-mazaya-blog/{slug}', [MainController::class, 'show'])->name('blog.show');
    Route::get('/al-mazaya-nav-link/{slug}', [MainController::class, 'navShow'])->name('nav.show');
    Route::get('/about-us', [MainController::class, 'aboutUs'])->name('about-us');
});

Route::get('/dashboard', function () {
    return view('pages.admin.admin-dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/blog', [BlogController::class, 'index'])->name('blog');
    Route::get('/blog/create', [BlogController::class, 'create'])->name('blog.create');
    Route::post('/blog/store', [BlogController::class, 'store'])->name('blog.store');
    Route::get('/blog/edit/{id}', [BlogController::class, 'edit'])->name('blog.edit');
    Route::put('/blog/update/{id}', [BlogController::class, 'update'])->name('blog.update');
    Route::get('/blog/detail/{id}', [BlogController::class, 'show'])->name('blog.detail');
    Route::delete('/blog/delete/{id}', [BlogController::class, 'destroy'])->name('blog.delete');

    Route::get('/nav-links', [NavLinkController::class, 'index'])->name('nav-links');
    Route::get('/nav-links/create', [NavLinkController::class, 'create'])->name('nav-links.create');
    Route::post('/nav-links/store', [NavLinkController::class, 'store'])->name('nav-links.store');
    Route::get('/nav-links/edit/{id}', [NavLinkController::class, 'edit'])->name('nav-links.edit');
    Route::put('/nav-links/update/{id}', [NavLinkController::class, 'update'])->name('nav-links.update');
    Route::get('/nav-links/detail/{id}', [NavLinkController::class, 'show'])->name('nav-links.detail');
    Route::delete('/nav-links/delete/{id}', [NavLinkController::class, 'destroy'])->name('nav-links.delete');
});

require __DIR__ . '/auth.php';
