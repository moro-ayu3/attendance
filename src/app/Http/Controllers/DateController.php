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
        $request->validate([
            'date' => 'required|integer',
            'name' => 'required|string|max:191',
            'time' => 'required|integer',
        ]);

        $user = Auth::user();
        $dates->$user->dates;
        $dates = Date::Pagenate(5);
        $date = $request->only(['date', 'name', 'time']);
        $date = Carbon::now()
              ->format('Y-m-d', 'H:i:s');
        return view('index', ['dates' => $dates, 'date' => $date, 'user' => $user]);
    }
}
