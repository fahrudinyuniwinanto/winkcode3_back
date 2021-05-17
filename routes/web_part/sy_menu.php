<?php //generated at 2021-04-12 13:37:04
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SyMenuController;

Route::get('/sy_menu/list',[SyMenuController::class,"list"])->name("sy_menu.list")->middleware('auth');
Route::get('/sy_menu/delete/{id}',[SyMenuController::class,"delete"])->name("sy_menu.delete")->middleware('auth');
Route::get('/sy_menu/lookup', [SyMenuController::class,
"lookup"])->name("sy_menu.lookup")->middleware('auth');

//route resource harus di paling bawah
Route::resource('/sy_menu',SyMenuController::class)->only(['index','store','show'])->middleware('auth');