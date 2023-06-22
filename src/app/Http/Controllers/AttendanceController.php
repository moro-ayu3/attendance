<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendance;
use App\Models\Rest;
use Illuminate\Support\Facades\Auth;



class AttendanceController extends Controller
{
    public function index()
    {
      $user = Auth::user();
      $attendancies = $user->attendancies;
      return view('index', ['attendancies' => $attendancies, 'user' => $user]);
    }

    public function store(Request $request)
    {
      $user = Auth::user();
      $attendance = $request->only(['date', 'work_start_time', 'work_end_time']);
      $rest = $request->only(['rest_start_time', 'rest_end_time']);
      Attendance::create($attendance, $rest);
      return view('attendance', ['attendance' => $attendance, 'user' => $user])->with('message', '福場凛太郎さんお疲れ様です！');
    }

    public function show(Request $request)
    {
        $user = Auth::user();
        $result = Attendance::Paginate(5);
        return view('attendance', ['attendance' => $result, 'user' => $user]);
    }
}
