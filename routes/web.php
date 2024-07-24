<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BukuController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Models\Buku;
use App\Models\kategories;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/login', function () {
//     return view('auth.login');
// });

Route::get('register', [RegisterController::class, 'register'])->name('register');
Route::post('register/action', [RegisterController::class, 'actionregister'])->name('actionregister');

Route::get('login', [LoginController::class, 'login'])->name('login');
Route::post('actionlogin', [LoginController::class, 'actionlogin'])->name('actionlogin');

Route::get('actionlogout', [LoginController::class, 'actionlogout'])->name('actionlogout')->middleware('auth');

Route::get('/admin', [AdminController::class, 'admin'])->name('admin')->middleware('auth');
Route::get('/kelola', [AdminController::class, 'kelola'])->name('kelola')->middleware('auth');

Route::put('/bukus/{id}', [BukuController::class, 'update'])->name('bukus.update')->middleware('auth');
Route::delete('/bukus/{id}', [BukuController::class, 'destroy'])->name('bukus.destroy')->middleware('auth');
Route::post('addbooks/action', [BukuController::class, 'store'])->name('addbooksaction')->middleware('auth');
Route::get('/peminjaman', [AdminController::class, 'peminjaman'])->name('peminjaman')->middleware('auth');
Route::post('/peminjaman/actionpinjam',[BukuController::class, 'pinjam'])->name('actionpinjam')->middleware('auth');
Route::put('/peminjaman/actionkembali',[BukuController::class, 'kembali'])->name('actionkembali')->middleware('auth');
Route::get('/laporan', [AdminController::class, 'laporan'])->name('laporan')->middleware('auth');
Route::get('/laporan/{month}/{year}/laporanpdf', [AdminController::class, 'generatePdf'])->middleware('auth'); 
Route::get('/laporan/{month}/{year}/laporanpinjampdf', [AdminController::class, 'peminjamangeneratePdf'])->middleware('auth'); 

Route::get('/kelola/{kategori}', [AdminController::class, 'SearchKat'])->middleware('auth');
Route::get('/laporan/{month}/{year}', [AdminController::class, 'Searchlaporan'])->middleware('auth');

Route::get('/', function(){
    $query = Buku::query();
    if (request('search')) {
        $query->where('judul', 'like', '%' . request('search') . '%');
    }
    $bukus = $query->get();
    $kategori = kategories::all();
    return view('welcome', ['bukus' => $bukus, 'kategories' => $kategori]);
});
Route::get('/{id}', function($kategori){
    $kategori = kategories::where('kategori', $kategori)->firstOrFail();
    // Inisialisasi query builder untuk model Buku
    $query = $kategori->bukus();
    if (request('search')) {
        $query->where('judul', 'like', '%' . request('search') . '%');
    }

    $bukus = $query->get();

    $kategori = kategories::all();
        return view('welcome', ['bukus' => $bukus, 'kategories' => $kategori]);
});