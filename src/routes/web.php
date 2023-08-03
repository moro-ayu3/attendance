<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AttendanceController;



Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => ['auth']], function () {
     Route::get('/', [AttendanceController::class, 'index']);
     Route::post('/work/start', [AttendanceController::class, 'workStart']);
     Route::post('/work/end', [AttendanceController::class, 'workEnd']);
     Route::post('/rest/start', [AttendanceController::class, 'restStart']);
     Route::post('/rest/end', [AttendanceController::class, 'restEnd']);
     Route::get('/attendances/{num}', [AttendanceController::class, 'show']);
});

require __DIR__.'/auth.php';


