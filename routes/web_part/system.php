<?php
use App\Http\Controllers\SystemController;
use Illuminate\Support\Facades\Route;

/* Route::post('/upload_file', function(){
uploadFile();
})->name('upload_file'); */

Route::get('/system/help', [SystemController::class, "help"])->name("system.help")->middleware('auth');
Route::get('/system/about', [SystemController::class, "about"])->name("system.about")->middleware('auth');
Route::post('/upload_file', [SystemController::class, 'uploadFile'])->name('upload_file')->middleware('auth');
Route::get('/upload_list', [SystemController::class, 'uploadList'])->name('upload_list');
Route::get('/file/{filename}', [SystemController::class, 'uploadGet'])->name('upload_get')->where('filename', '.+');

// AUTH
Route::get('/login', [SystemController::class, "wfLogin"]);
Route::post('/login', [SystemController::class, "wfLoginAuth"])->name('login-auth');
Route::get('/logout', [SystemController::class, "wfLogout"]);
Route::get('/reload-captcha', [SystemController::class, 'reloadCaptcha']);
