<?php //generated at 2021-04-04 10:26:39
use App\Http\Controllers\SyGroupController;
use Illuminate\Support\Facades\Route;

Route::get('/sy_group/list', [SyGroupController::class, "list"])->name("sy_group.list");
Route::get('/sy_group/delete/{id}', [SyGroupController::class, "delete"])->name("sy_group.delete");
Route::get('/sy_group/lookup', [SyGroupController::class, "lookup"])->name("sy_group.lookup");

//route resource harus di paling bawah
Route::resource('/sy_group', SyGroupController::class)->only(['index', 'store', 'show'])->middleware('auth');
