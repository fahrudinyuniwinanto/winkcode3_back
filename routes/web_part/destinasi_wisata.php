<?php //generated at 2021-04-30 10:36:13
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DestinasiWisataController;

Route::get('/destinasi_wisata/list',[DestinasiWisataController::class,"list"])->name("destinasi_wisata.list")->middleware('auth');
Route::get('/destinasi_wisata/delete/{id}',[DestinasiWisataController::class,"delete"])->name("destinasi_wisata.delete")->middleware('auth');
Route::get('/destinasi_wisata/lookup', [DestinasiWisataController::class,
"lookup"])->name("destinasi_wisata.lookup")->middleware('auth');

//route resource harus di paling bawah
Route::resource('/destinasi_wisata',DestinasiWisataController::class)->only(['index','store','show'])->middleware('auth');