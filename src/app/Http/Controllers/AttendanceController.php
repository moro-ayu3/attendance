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
      $user = Auth::user();
      $attendances = $user->attendances;
      return view('index', ['attendancies' => $attendancies, 'user' => $user]);
    }

    public function store(Request $request)
    {
      $user = Auth::user();
      $attendance = $request->only(['date', 'work_start_time', 'work_end_time']);
      $rest = $request->only(['rest_start_time', 'rest_end_time']);
      Attendance::create($attendance, $rest);
      return view('attendance', ['attendance' => $attendance, 'rest' => $rest, 'user' => $user])->with('message', '福場凛太郎さんお疲れ様です！');
    }

    public function show()
    {
        $user = Auth::user();
        $attendances = Attendance::Paginate(5);
        $rest_start_time = new Carbon('2023-06-22 15:00:00');
        $rest_end_time = new Carbon('2023-06-22 16:00:00');
        echo $rest_start_time->diffInHours($rest_end_time);
        $work_start_time = new Carbon('2023-06-22 10:00:00');
        $work_end_time = new Carbon('2023-06-22 19:00:00');
        echo $work_start_time->diffInHours($work_end_time);
        return view('attendance', ['attendances' => $attendances, 'rest_start_time' => $rest_start_time, 'rest_end_time'=> $rest_end_time, 'work_start_time' => $work_start_time, 'work_end_time' => $work_end_time, 'user' => $user]);
    }
}
