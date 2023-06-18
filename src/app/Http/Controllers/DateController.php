<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Date;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class DateController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        $dates = Date::Paginate(5);
        $date = $request->only(['date', 'name', 'time']);
        $date = Carbon::now()
              ->format('Y-m-d', 'H:i:s');
        return view('index', ['dates' => $dates, 'date' => $date, 'user' => $user]);
    }
}
