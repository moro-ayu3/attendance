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
      $attendances = Attendance::with('rest')->get();
      $rests = Rest::all();
      return view('index', ['attendances' => $attendances, 'rests' => $rests]);
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

      if($time == 'ischecked'){
        return redirect('/')->disable($time->work_start_time, $time->rest_end_time);
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

    public function restStart(Request $request)
    {
      $id = Attendance::find($request->id);

      $dt = new Carbon();
      $time = $dt->toTimeString();

      $data = [
        'attendance_id' => $id,
        'rest_start_time' => $time,
      ];

      Rest::create($data);

      if($time == 'ischecked'){
        return redirect('/')->disable($time->work_end_time, $time->rest_start_time);
      }

      return redirect('/');
    }

    public function restEnd(Request $request)
    {
      $id = Attendance::find($request->id);

      $dt = new Carbon();
      $time = $dt->toTimeString();

      $data = [
        'rest_end_time' => $time,
      ];

      Rest::where('attendance_id', $id)->update($data);

      if($time == 'ischecked'){
        return redirect('/')->disable($time->work_start_time, $time->rest_end_time);
      }

      return redirect('/');
    }

    public function show()
    {
        $datas = Attendance::Paginate(5);

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

        return view('attendance', ['datas' => $datas, 'rest_time' => $rest_time, 'work_time' => $work_time]);
    }
}
