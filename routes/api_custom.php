<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\PageController;
use App\Http\Controllers\API\PracticeReportController;
use App\Http\Controllers\API\DocumentController;

Route::apiResource('pages', PageController::class);
Route::apiResource('reports', PracticeReportController::class);
Route::apiResource('documents', DocumentController::class);
