<?php

namespace App\Http\Controllers;

use App\Http\Requests\AttendanceRequest;
use App\Http\Requests\RestRequest;
use App\Models\Attendance;
use App\Models\Rest;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;



class AttendanceController extends Controller
{
    public function index()
    {
      $attendances = Attendance::all();
      return view('index');
    }

    public function workStart()
    {
      $id = Auth::id();

      $dt = new Carbon();
      $date = $dt->toDateString();
      $time = $dt->toTimeString();

      $data = [
        'user_id' => $id,
        'date' => $date,
        'work_start_time' => $time,
      ];

      Attendance::create($data);
      
      return redirect('/');
    }

    public function workEnd()
    {
      $id = Auth::id();

      $dt = new carbon;
      $date = $dt->toDateString();
      $time = $dt->toTimeString();
      $time1 = $dt->toTimeString();

      $data = [
        'user_id' => $id,
        'date' => $date,
        'work_start_time' => $time,
        'work_end_time' => $time1
      ];
      Attendance::update($data);
      
      return redirect('/');
    }


    public function show()
    {
        $user = Auth::user();
        $attendances = Attendance::Paginate(5);
        $rest_start_time = new Carbon('2023-06-22 15:00:00');
        $rest_end_time = new Carbon('2023-06-22 16:00:00');
        echo $rest_start_time->diffInHours($rest_end_time)->format('H:i:s');
        $work_start_time = new Carbon('2023-06-22 10:00:00');
        $work_end_time = new Carbon('2023-06-22 19:00:00');
        echo $work_start_time->diffInHours($work_end_time)->format('H:i:s');
        return view('attendance', ['attendances' => $attendances, 'rest_start_time' => $rest_start_time, 'rest_end_time'=> $rest_end_time, 'work_start_time' => $work_start_time, 'work_end_time' => $work_end_time, 'user' => $user]);
    }
}
