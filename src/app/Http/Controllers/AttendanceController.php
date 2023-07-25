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
      $user_id = Auth::id();

      $today = Carbon::today();

      $attendance = Attendance::where('user_id', $user_id)->where('date', $today)->first();

      if(empty($attendance)){
        //　出勤していない
        return view('index')->with(["is_attendance_start" => true]);
      } 

      $rest = $attendance->rests->whereNull('rest_end_time')->first();
      
      // 勤務終了後
      if ($attendance->work_end_time){
        return view('index');
      }

      // 勤務開始後
      if ($attendance->work_start_time){
        if (isset($rest)){
          return view('index')->with(["is_rest_end" => true]);
        } else {
          return view('index')->with(["is_attendance_end" => true,
          "is_rest_start" => true]);
        }
      }
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
    

      $data = [
        'work_end_time' => $time
      ];
      
      Attendance::where('user_id', $id)->where('date', $date)->update($data);
    
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
      
      return redirect('/');
    }

    public function show()
    {
        $now = now()->format('Y-m-d');
        echo date('Y-m-d', strtotime($now . '-1 day')); 
        echo date('Y-m-d', strtotime($now));
        echo date('Y-m-d', strtotime($now . '+1 day')); 


        $datas = Attendance::select('user_id','work_start_time', 'work_end_time')->get()
                ->paginate(5);


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

        return view('attendance', ['datas' => $datas, 'rest_time' => $rest_time, 'work_time' => $work_time, 'now' => $now]);
    }
}
