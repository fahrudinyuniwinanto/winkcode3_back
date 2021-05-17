<?php //generated at 2021-04-04 10:27:02
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SyAccessController;

Route::get('/sy_access/list',[SyAccessController::class,"list"])->name("sy_access.list");
Route::get('/sy_access/delete/{id}',[SyAccessController::class,"delete"])->name("sy_access.delete");

//route resource harus di paling bawah
Route::resource('/sy_access',SyAccessController::class)->only(['index','store','show'])->middleware('auth');