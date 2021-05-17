<?="<?php //generated at ".date("Y-m-d H:i:s")?>

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{{$h->tblUper}}Controller;

Route::get('/{{$h->tblLower}}/list',[{{$h->tblUper}}Controller::class,"list"])->name("{{$h->tblLower}}.list")->middleware('auth');
Route::get('/{{$h->tblLower}}/delete/{id}',[{{$h->tblUper}}Controller::class,"delete"])->name("{{$h->tblLower}}.delete")->middleware('auth');
Route::get('/{{$h->tblLower}}/lookup', [{{$h->tblUper}}Controller::class,
"lookup"])->name("{{$h->tblLower}}.lookup")->middleware('auth');

//route resource harus di paling bawah
Route::resource('/{{$h->tblLower}}',{{$h->tblUper}}Controller::class)->only(['index','store','show'])->middleware('auth');