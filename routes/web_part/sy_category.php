<?php //generated at 2021-03-28 21:01:58
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SyCategoryController;

Route::get('/sy_category/list',[SyCategoryController::class,"list"])->name("sy_category.list");
Route::get('/sy_category/delete/{id}',[SyCategoryController::class,"delete"])->name("sy_category.delete");

//route resource harus di paling bawah
Route::resource('/sy_category',SyCategoryController::class)->only(['index','store','show'])->middleware('auth');