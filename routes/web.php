<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageWebController;
use App\Http\Controllers\ApplicationController;

Route::get('/', [PageWebController::class, 'home']);

// Подключаем API-маршруты под префиксом /api (иначе общий catch-all перекроет их)
Route::prefix('api')->middleware('api')->group(function () {
	require __DIR__.'/api_custom.php';
});

Route::get('/{slug}', [PageWebController::class, 'show'])->where('slug', '^[A-Za-z0-9\-\_]+$');

// Форма заявки для организации (замена ущербной формы)
Route::get('/application', [ApplicationController::class, 'showForm'])->name('application.form');
Route::post('/application', [ApplicationController::class, 'submit'])->name('application.submit');
