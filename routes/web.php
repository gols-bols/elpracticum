<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageWebController;

Route::get('/', [PageWebController::class, 'home']);

// Подключаем API-маршруты под префиксом /api (иначе общий catch-all перекроет их)
Route::prefix('api')->middleware('api')->group(function () {
	require __DIR__.'/api_custom.php';
});

Route::get('/{slug}', [PageWebController::class, 'show'])->where('slug', '^[A-Za-z0-9\-\_]+$');
