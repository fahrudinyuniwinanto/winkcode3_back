<?php //generated at 2021-03-28 21:06:01
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SyArticleController;

Route::get('/sy_article/list',[SyArticleController::class,"list"])->name("sy_article.list");
Route::get('/sy_article/delete/{id}',[SyArticleController::class,"delete"])->name("sy_article.delete");

//route resource harus di paling bawah
Route::resource('/sy_article',SyArticleController::class)->only(['index','store','show'])->middleware('auth');