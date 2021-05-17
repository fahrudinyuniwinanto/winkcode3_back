<?php //generated at 2021-02-07 21:12:24
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KategoriController;

Route::get('/kategori/list',[KategoriController::class,"list"])->name("kategori.list");
Route::get('/kategori/delete/{id}',[KategoriController::class,"delete"])->name("kategori.delete");

//route resource harus di paling bawah
Route::resource('/kategori',KategoriController::class)->only(['index','store','show']);