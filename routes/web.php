<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Route;

Route::get('/', [BlogController::class, 'index']);
Route::get('/about', [AboutController::class, 'index']);
Route::get('/blogs/{id}', [BlogController::class, 'show']);
