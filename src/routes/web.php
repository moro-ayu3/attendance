<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StampController;
use App\Http\Controllers\DateController;


Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
     Route::get('/', [StampController::class, 'index']);
     Route::post('/', [StampController::class, 'store']);
     Route::get('/attendance', [DateController::class, 'index']);
});

require __DIR__.'/auth.php';
