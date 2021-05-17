<?php
use App\Http\Controllers\FrontendController;
use Illuminate\Support\Facades\Route;

Route::resource('/home', FrontendController::class)->only(['index']);
Route::get('/sonar', [FrontendController::class, "sonar"])->name("sonar");
