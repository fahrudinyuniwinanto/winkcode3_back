<?php
use App\Http\Controllers\Mesys\CrudController;
use Illuminate\Support\Facades\Route;

Route::resource('/crud', CrudController::class)->only(['index'])->middleware('auth');
Route::get('/crud/delFileExist', [CrudController::class, "delFileExist"]);
Route::post('/crud/createAccess', [CrudController::class, "createAccess"]);
Route::post('/crud/deleteAccess', [CrudController::class, "deleteAccess"]);
// Route::get('/crud/writeScript', [CrudController::class, "writeScript"]);
// Route::get('/crud/previewScript', [CrudController::class, "previewScript"]);
Route::post('/crud/previewScript', [CrudController::class, "previewScript"]);
Route::get('/crud/getDatabases', [CrudController::class, "getDatabases"]);
Route::get('/crud/getTables', [CrudController::class, "getTables"]);
// Route::get('/crud/getFields', [CrudController::class, "getFields"]);
Route::post('/crud/getFields', [CrudController::class, "getFields"]);
Route::post('/crud/writeScript', [CrudController::class, "writeScript"]);
