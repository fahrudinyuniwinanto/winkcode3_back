<?php
use App\Http\Controllers\FrontendController;
use Illuminate\Support\Facades\Route;

foreach (File::allFiles(__DIR__ . '/web_part') as $route) {
    require_once $route->getPathname();
}

Route::get('/', [FrontendController::class, "index"]);
