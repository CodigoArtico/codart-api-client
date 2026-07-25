<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ApiQueryController;

Route::get('/', [ApiQueryController::class, 'index'])->name('home');
Route::post('/api/execute-query', [ApiQueryController::class, 'query'])->name('api.query');

