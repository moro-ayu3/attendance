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

    public function restStart(Request $request)
    {

      $dt = new Carbon();
      $time = $dt->toTimeString();

      $rest = $request->only([
        'rest_start_time' => $time,
      ]);

      Rest::create($rest);
      
      return redirect('/');
    }

    public function restEnd(Request $request)
    {

      $dt = new carbon;
      $time = $dt->toTimeString();    

      $rest = $request->only([ 
        'rest_end_time' => $time
      ]);

      Rest::find($request->id)->update($rest);
      
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
