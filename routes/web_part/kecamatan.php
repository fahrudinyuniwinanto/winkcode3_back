<?php //generated at 2021-05-17 09:01:17
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KecamatanController;

Route::get('/kecamatan/list',[KecamatanController::class,"list"])->name("kecamatan.list")->middleware('auth');
Route::get('/kecamatan/delete/{id}',[KecamatanController::class,"delete"])->name("kecamatan.delete")->middleware('auth');
Route::get('/kecamatan/lookup', [KecamatanController::class,
"lookup"])->name("kecamatan.lookup")->middleware('auth');

//route resource harus di paling bawah
Route::resource('/kecamatan',KecamatanController::class)->only(['index','store','show'])->middleware('auth');