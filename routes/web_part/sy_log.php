<?php //generated at 2021-03-28 20:51:55
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SyLogController;

Route::get('/sy_log/list',[SyLogController::class,"list"])->name("sy_log.list");
Route::get('/sy_log/delete/{id}',[SyLogController::class,"delete"])->name("sy_log.delete");

//route resource harus di paling bawah
Route::resource('/sy_log',SyLogController::class)->only(['index','store','show'])->middleware('auth');