<?php //generated at 2021-02-23 14:48:27
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaketWisataController;

Route::get('/paket_wisata/list',[PaketWisataController::class,"list"])->name("paket_wisata.list");
Route::get('/paket_wisata/delete/{id}',[PaketWisataController::class,"delete"])->name("paket_wisata.delete");

//route resource harus di paling bawah
Route::resource('/paket_wisata',PaketWisataController::class)->only(['index','store','show']);