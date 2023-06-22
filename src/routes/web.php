<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AttendanceController;



Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => ['auth']], function () {
     Route::get('/', [AttendanceController::class, 'index']);
     Route::post('/', [AttendanceController::class, 'store']);
     Route::get('/dates', [AttendanceController::class, 'show']);
});

require __DIR__.'/auth.php';


