<?php
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\BackendController;
use Illuminate\Support\Facades\Route;

Route::resource('/home/web', FrontendController::class)->only(['index']);
Route::resource('/dashboard', BackendController::class)->only(['index'])->middleware('auth');
// Route::post('/backend/cek', [BackendController::class, "cek"]);
