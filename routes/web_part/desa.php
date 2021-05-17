<?php //generated at 2021-05-17 09:04:16
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DesaController;

Route::get('/desa/list',[DesaController::class,"list"])->name("desa.list")->middleware('auth');
Route::get('/desa/delete/{id}',[DesaController::class,"delete"])->name("desa.delete")->middleware('auth');
Route::get('/desa/lookup', [DesaController::class,
"lookup"])->name("desa.lookup")->middleware('auth');

//route resource harus di paling bawah
Route::resource('/desa',DesaController::class)->only(['index','store','show'])->middleware('auth');