<?php

use App\Http\Controllers\RandomNumbersController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/generate', [RandomNumbersController::class, 'generate']);
Route::get('/retrieve/{id}', [RandomNumbersController::class, 'retrieve']);
