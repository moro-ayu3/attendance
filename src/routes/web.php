<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StampController;


Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
     Route::get('/', [StampController::class, 'index']);
     Route::post('/', [StampController::class, 'store']);
});

require __DIR__.'/auth.php';
