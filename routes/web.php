<?php

use App\Http\Controllers\Frontend\FrontendController;
use Illuminate\Support\Facades\Route;



Route::get('/', [FrontendController::class, 'index']);
Route::get('/wedding-details/{id}', [FrontendController::class, 'weddingDetails']);
Route::get('/contact', [FrontendController::class, 'contact']);
