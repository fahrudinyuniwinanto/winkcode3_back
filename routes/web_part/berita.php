<?php //generated at 2021-04-12 11:32:49
use App\Http\Controllers\BeritaController;
use Illuminate\Support\Facades\Route;

Route::get('/berita/web', [BeritaController::class, "web"])->name("berita.web");
Route::get('/berita/list', [BeritaController::class, "list"])->name("berita.list")->middleware('auth');
Route::get('/berita/delete/{id}', [BeritaController::class, "delete"])->name("berita.delete")->middleware('auth');
Route::get('/berita/lookup', [BeritaController::class,
    "lookup"])->name("berita.lookup")->middleware('auth');

//route resource harus di paling bawah
Route::resource('/berita', BeritaController::class)->only(['index', 'store', 'show'])->middleware('auth');
