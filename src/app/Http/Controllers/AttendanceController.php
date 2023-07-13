<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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

      if($data !== null){
        return redirect('/')->disable($time);
      }
      
      return redirect('/');
    }

    public function workEnd()
    {
      $id = Auth::id();

      $dt = new carbon;
      $date = $dt->toDateString();
      $time = $dt->toTimeString();
    

      $data = [
        'work_end_time' => $time
      ];
      
      Attendance::where('user_id', $id)->where('date', $date)->update($data);

      if($time == 'ischecked'){
        return redirect('/')->disable($time->work_end_time, $time->rest_start_time);
      }
      
      return redirect('/');
    }

    public function restStart()
    {
      $user_id = Auth::id();

      $dt = new Carbon();
      $date = $dt->toDateString();
      $time = $dt->toTimeString();

      $attendance = Attendance::where('user_id', $user_id)->where('date', $date)->first();
      $attendance_id = $attendance->id;

      $data = [
        'attendance_id' => $attendance_id,
        'rest_start_time' => $time,
      ];

      Rest::create($data);
      
      return redirect('/');
    }

    public function restEnd()
    {
      $user_id = Auth::id();

      $dt = new Carbon();
      $date = $dt->toDateString();
      $time = $dt->toTimeString();

      $attendance = Attendance::where('user_id', $user_id)->where('date', $date)->first();
      $attendance_id = $attendance->id;

      $data = [
        'rest_end_time' => $time,
      ];

      Rest::where('attendance_id', $attendance_id)->update($data);

      if($time == 'ischecked'){
        return redirect('/')->disable($time->work_start_time, $time->rest_end_time);
      }

      return redirect('/');
    }

    public function show()
    {
        $datas = Attendance::Paginate(5);

        $dt = new Carbon();
        $yestarday = $dt->toDateString('yesterday');
        $tommorow = $dt->toDateString('tomorrow');

        $hour = 1;
        $minute = 0;
        $second = 0;
        echo Carbon::createFromTime($hour, $minute, $second);
        
        $rest_time = [
        'rest_start_time' => $hour, $minute, $second,
        'rest_end_time' => $hour, $minute, $second,
      ];

        $hour = 9;
        $minute = 0;
        $second = 0;
        echo Carbon::createFromTime($hour, $minute, $second);
 
        $work_time = [
        'work_start_time' => $hour, $minute, $second,
        'work_end_time' => $hour, $minute, $second
      ];

        return view('attendance', ['datas' => $datas, 'rest_time' => $rest_time, 'work_time' => $work_time, 'yesterday' => $yesterday, 'tomorrow' => $tomorrow]);
    }
}
