<?php //generated at 2021-02-18 19:18:44
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LinkController;

Route::get('/link/list',[LinkController::class,"list"])->name("link.list");
Route::get('/link/delete/{id}',[LinkController::class,"delete"])->name("link.delete");

//route resource harus di paling bawah
Route::resource('/link',LinkController::class)->only(['index','store','show']);