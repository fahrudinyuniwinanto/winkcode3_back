<?php //generated at 2021-02-08 13:47:03
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

Route::get('/users/profil', [UsersController::class, "profil"])->name("users.profil");
Route::get('/users/list', [UsersController::class, "list"])->name("users.list");
Route::get('/users/lookup', [UsersController::class, "lookup"])->name("users.lookup");
Route::get('/users/delete/{id}', [UsersController::class, "delete"])->name("users.delete");

//route resource harus di paling bawah
Route::resource('/users', UsersController::class)->only(['index', 'store', 'show'])->middleware('auth');
