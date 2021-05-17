<?php //generated at 2021-03-28 21:00:14
use App\Http\Controllers\SyParsysController;
use Illuminate\Support\Facades\Route;

Route::get('/sy_parsys/dash', [SyParsysController::class, "dash"])->name("sy_parsys.dash")->middleware('auth');
Route::get('/sy_parsys/show_dash', [SyParsysController::class, "showDash"])->name("sy_parsys.show_dash")->middleware('auth');
Route::post('/sy_parsys/store_dash', [SyParsysController::class, "storeDash"])->name("sy_parsys.store_dash")->middleware('auth');
Route::get('/sy_parsys/list', [SyParsysController::class, "list"])->name("sy_parsys.list")->middleware('auth');
Route::get('/sy_parsys/delete/{id}', [SyParsysController::class, "delete"])->name("sy_parsys.delete")->middleware('auth');

//route resource harus di paling bawah
Route::resource('/sy_parsys', SyParsysController::class)->only(['index', 'store', 'show'])->middleware('auth');
