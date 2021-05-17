<?php //generated at 2021-02-18 19:02:23
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LogController;

Route::get('/log/list',[LogController::class,"list"])->name("log.list");
Route::get('/log/delete/{id}',[LogController::class,"delete"])->name("log.delete");

//route resource harus di paling bawah
Route::resource('/log',LogController::class)->only(['index','store','show']);