<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AttendanceController;



Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => ['auth']], function () {
     Route::get('/', [AttendanceController::class, 'index']);
     Route::post('/work/start', [AttendanceController::class, 'workStart']);
     Route::get('/attendances', [AttendanceController::class, 'show']);
});

require __DIR__.'/auth.php';


