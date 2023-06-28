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
      Attendance::find($id)->update($data);
      
      return redirect('/');
    }

    public function restStart()
    {
      $id = Auth::id();

      $dt = new Carbon();
      $time = $dt->toTimeString();

      $data = [
        'attendance_id' => $id,
        'rest_start_time' => $time,
      ];

      Rest::create($data);
      
      return redirect('/');
    }

    public function restEnd()
    {
      $id = Auth::id();

      $dt = new carbon;
      $time = $dt->toTimeString();
      $time1 = $dt->toTimeString();

      $data = [
        'attendance_id' => $id,
        'rest_start_time' => $time,
        'rest_end_time' => $time1
      ];
      Rest::find($id)->update($data);
      
      return redirect('/');
    }

    public function show()
    {
        $datas = Attendance::Paginate(5);

        $dt = new Carbon;
        $time = $dt->toTimeString();
        $time1 = $dt->toTimeString();
 
        $data = [
        'rest_start_time' => $time,
        'rest_end_time' => $time1
      ];

        echo $time->diffInHours($time1);
        echo $time->diffInMinutes($time1);
        echo $time->diffInSeconds($time1);

        $dt = new Carbon;
        $time = $dt->toTimeString();
        $time1 = $dt->toTimeString();
 
        $data = [
        'work_start_time' => $time,
        'work_end_time' => $time1
      ];

        echo $time->diffInHours($time1);
        echo $time->diffInMinutes($time1);
        echo $time->diffInSeconds($time1);

        return view('attendance', ['datas' => $datas, 'data' => $data]);
    }
}
