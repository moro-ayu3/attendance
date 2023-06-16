<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StampController;
use App\Http\Controllers\DateController;


Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => ['auth']], function () {
     Route::get('/', [StampController::class, 'index']);
     Route::post('/attendance', [StampController::class, 'store']);
     Route::get('/attendance', [DateController::class, 'index']);
});

require __DIR__.'/auth.php';


