<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\TeacherStaffController;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\ExcelController;
use App\Http\Controllers\ExcellController;
use App\Http\Controllers\HeaderController;
use App\Http\Controllers\ImageDownloadController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\NavLinkController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\TotalSiswaController;
use Illuminate\Support\Facades\Route;

Route::prefix('/')->group(function () {
    Route::get('/', [MainController::class, 'index'])->name('index');
    Route::post('/siswa/search', [SiswaController::class, 'search'])->name('siswa.search');
    Route::get('/cek-status', [MainController::class, 'cek_status'])->name('cek-status');
    Route::get('/pendaftaran', [SiswaController::class, 'create'])->name('pendaftaran');
    Route::post('/pendaftaran/store', [SiswaController::class, 'store'])->name('pendaftaran.store');
    Route::get('/success/{nisn}', [SiswaController::class, 'success'])->name('success');
    Route::get('/category/{category}', [MainController::class, 'category'])->name('category');
    Route::get('/search', [MainController::class, 'search'])->name('blog.search');
    Route::get('/al-mazaya-blog', [MainController::class, 'blog'])->name('blog.al-mazaya');
    Route::get('/al-mazaya-blog/{slug}', [MainController::class, 'show'])->name('blog.show');
    Route::get('/al-mazaya-nav-link/{slug}', [MainController::class, 'navShow'])->name('nav.show');
    Route::get('/about-us', [MainController::class, 'about_us'])->name('about-us');
});

Route::get('/dashboard', function () {
    return view('pages.admin.admin-dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
// routes/web.php

Route::get('/chart-data', [ChartController::class, 'getStudentData']);
Route::get('/chart-data2', [ChartController::class, 'getStudentData2']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/siswa/{program_pendidikan}', [SiswaController::class, 'siswa'])->name('siswa');
    Route::get('/siswa/edit/{id}', [SiswaController::class, 'edit'])->name('siswa.edit');
    Route::put('/siswa/update/{id}', [SiswaController::class, 'update'])->name('siswa.update');
    Route::delete('/siswa/delete/{id}', [SiswaController::class, 'destroy'])->name('siswa.delete');
    Route::post('/siswa/search/admin', [SiswaController::class, 'cari_siswa'])->name('cari_siswa');

    Route::get('/download-images', [ImageDownloadController::class, 'downloadImages'])->name('download.images');

    Route::get('/header', [HeaderController::class, 'index'])->name('header');
    Route::get('/header/create', [HeaderController::class, 'create'])->name('header.create');
    Route::post('/header/store', [HeaderController::class, 'store'])->name('header.store');
    Route::get('/header/edit/{id}', [HeaderController::class, 'edit'])->name('header.edit');
    Route::put('/header/update/{id}', [HeaderController::class, 'update'])->name('header.update');
    Route::delete('/header/delete/{id}', [HeaderController::class, 'destroy'])->name('header.delete');

    Route::get('/blog', [BlogController::class, 'index'])->name('blog');
    Route::get('/blog/create', [BlogController::class, 'create'])->name('blog.create');
    Route::post('/blog/store', [BlogController::class, 'store'])->name('blog.store');
    Route::get('/blog/edit/{id}', [BlogController::class, 'edit'])->name('blog.edit');
    Route::put('/blog/update/{id}', [BlogController::class, 'update'])->name('blog.update');
    Route::get('/blog/detail/{id}', [BlogController::class, 'show'])->name('blog.detail');
    Route::delete('/blog/delete/{id}', [BlogController::class, 'destroy'])->name('blog.delete');

    Route::get('/teacher-staff', [TeacherStaffController::class, 'index'])->name('teacher-staff');
    Route::get('/teacher-staff/create', [TeacherStaffController::class, 'create'])->name('teacher-staff.create');
    Route::post('/teacher-staff/store', [TeacherStaffController::class, 'store'])->name('teacher-staff.store');
    Route::get('/teacher-staff/edit/{id}', [TeacherStaffController::class, 'edit'])->name('teacher-staff.edit');
    Route::put('/teacher-staff/update/{id}', [TeacherStaffController::class, 'update'])->name('teacher-staff.update');
    Route::get('/teacher-staff/detail/{id}', [TeacherStaffController::class, 'show'])->name('teacher-staff.detail');
    Route::delete('/teacher-staff/delete/{id}', [TeacherStaffController::class, 'destroy'])->name('teacher-staff.delete');

    Route::get('/nav-links', [NavLinkController::class, 'index'])->name('nav-links');
    Route::get('/nav-links/create', [NavLinkController::class, 'create'])->name('nav-links.create');
    Route::post('/nav-links/store', [NavLinkController::class, 'store'])->name('nav-links.store');
    Route::get('/nav-links/edit/{id}', [NavLinkController::class, 'edit'])->name('nav-links.edit');
    Route::put('/nav-links/update/{id}', [NavLinkController::class, 'update'])->name('nav-links.update');
    Route::get('/nav-links/detail/{id}', [NavLinkController::class, 'show'])->name('nav-links.detail');
    Route::delete('/nav-links/delete/{id}', [NavLinkController::class, 'destroy'])->name('nav-links.delete');

    Route::get('/total-siswa', [TotalSiswaController::class, 'index'])->name('total-siswa');
    Route::get('/total-siswa/create', [TotalSiswaController::class, 'create'])->name('total-siswa.create');
    Route::post('/total-siswa/store', [TotalSiswaController::class, 'store'])->name('total-siswa.store');
    Route::get('/total-siswa/edit/{id}', [TotalSiswaController::class, 'edit'])->name('total-siswa.edit');
    Route::put('/total-siswa/update/{id}', [TotalSiswaController::class, 'update'])->name('total-siswa.update');
    Route::get('/total-siswa/detail/{id}', [TotalSiswaController::class, 'show'])->name('total-siswa.detail');
    Route::delete('/total-siswa/delete/{id}', [TotalSiswaController::class, 'destroy'])->name('total-siswa.delete');

    Route::get('/video-profile', [VideoController::class, 'index'])->name('video');
    Route::get('/video-profile/create', [VideoController::class, 'create'])->name('video.create');
    Route::post('/video-profile/store', [VideoController::class, 'store'])->name('video.store');
    Route::get('/video-profile/edit/{id}', [VideoController::class, 'edit'])->name('video.edit');
    Route::put('/video-profile/update/{id}', [VideoController::class, 'update'])->name('video.update');
    Route::delete('/video-profile/delete/{id}', [VideoController::class, 'destroy'])->name('video.destroy');

    Route::get('/document', [DocumentController::class, 'index'])->name('document');
    Route::get('/document/create', [DocumentController::class, 'create'])->name('document.create');
    Route::post('/document/store', [DocumentController::class, 'store'])->name('document.store');
    Route::get('/document/edit/{id}', [DocumentController::class, 'edit'])->name('document.edit');
    Route::put('/document/update/{id}', [DocumentController::class, 'update'])->name('document.update');
    Route::delete('/document/delete/{id}', [DocumentController::class, 'destroy'])->name('document.destroy');

    Route::get('/export', [ExcelController::class, 'index'])->name('export');
    Route::get('/export-excel', [ExcelController::class, 'exportExcel'])->name('export.excel');

    Route::get('/export-data-image', [ImageDownloadController::class, 'downloadImages'])->name('export.image');
    // Route::get('/export-siswa/{programPendidikan}', [ExcelController::class, 'exportByProgramPendidikan'])
    //     ->whereIn('programPendidikan', ['mts', 'ma', 'ulya', 'wustha'])
    //     ->name('export.siswa.program_pendidikan');
});

require __DIR__ . '/auth.php';
