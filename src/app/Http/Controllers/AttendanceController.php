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
      $attendances = Attendance::all();
      $rests = Rest::all();
      return view('index',['attendances' => $attendances, 'rests' => $rests]);
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

      if($data->work_start_time == 'ischecked'){
        return redirect('/')->disable($data->work_start_time, $rest->rest_end_time);
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

      if($data->work_end_time == 'ischecked'){
        return redirect('/')->disable($data->work_end_time, $rest->rest_start_time);
      }
      
      return redirect('/');
    }

    public function restStart()
    {
      $id = Auth::id();

      $dt = new Carbon();
      $time = $dt->toTimeString();

      $rest = [ 
        'attendance_id' => $id,                              
        'rest_start_time' => $time,
      ];

      Rest::create($rest);
      
      if($rest->rest_start_time == 'ischecked'){
        return redirect('/')->disable($data->work_end_time, $rest->rest_start_time);
      }

      return redirect('/');
    }

    public function restEnd(Request $request)
    {
      $id = Auth::id();

      $dt = new carbon;
      $time = $dt->toTimeString();    

      $rest = [ 
        'rest_end_time' => $time
      ];

      $rest = $request->only(['attendance_id', 'rest_start_time', 'rest_end_time']);

      Rest::find($request->id)->update($rest);
      
      if($rest->rest_end_time == 'ischecked'){
        return redirect('/')->disable($data->work_start_time, $rest->rest_end_time);
      }

      return redirect('/');
    }

    public function show()
    {
        $datas = Attendance::Paginate(5);

        $dt = new Carbon;
        $rest_time = $dt->setTime();
        
        $rest_time = [
        'rest_start_time',
        'rest_end_time',
      ];

        $dt = new Carbon;
        $work_time = $dt->setTime();
 
        $work_time = [
        'work_start_time',
        'work_end_time'
      ];

        return view('attendance', ['datas' => $datas, 'rest_time' => $rest_time, 'work_time' => $work_time]);
    }
}
