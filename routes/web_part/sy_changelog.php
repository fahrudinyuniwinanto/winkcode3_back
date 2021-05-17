<?php //generated at 2021-05-09 08:26:16
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SyChangelogController;

Route::get('/sy_changelog/list',[SyChangelogController::class,"list"])->name("sy_changelog.list")->middleware('auth');
Route::get('/sy_changelog/delete/{id}',[SyChangelogController::class,"delete"])->name("sy_changelog.delete")->middleware('auth');
Route::get('/sy_changelog/lookup', [SyChangelogController::class,
"lookup"])->name("sy_changelog.lookup")->middleware('auth');

//route resource harus di paling bawah
Route::resource('/sy_changelog',SyChangelogController::class)->only(['index','store','show'])->middleware('auth');