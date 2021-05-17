<?php //generated at 2021-03-28 20:24:16
use App\Http\Controllers\SyLinkController;
use Illuminate\Support\Facades\Route;

Route::get('/sy_link/dash', [SyLinkController::class, "dash"])->name("sy_link.dash")->middleware('auth');
Route::get('/sy_link/get_dash', [SyLinkController::class, "getDash"])->name("sy_link.get_dash")->middleware('auth');
Route::post('/sy_link/set', [SyLinkController::class, "set"])->name("sy_link.set")->middleware('auth');
Route::get('/sy_link/getList', [SyLinkController::class, "getList"])->name("sy_link.getlist")->middleware('auth');
Route::get('/sy_link/list', [SyLinkController::class, "list"])->name("sy_link.list")->middleware('auth');
Route::get('/sy_link/delete/{id}', [SyLinkController::class, "delete"])->name("sy_link.delete")->middleware('auth');

//route resource harus di paling bawah
Route::resource('/sy_link', SyLinkController::class)->only(['index', 'store', 'show'])->middleware('auth');
