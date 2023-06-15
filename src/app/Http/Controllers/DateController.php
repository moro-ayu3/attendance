<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Date;
use Illuminate\Support\Facades\Auth;


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
        return view('index', ['dates' => $dates, 'date' => $date, 'user' => $user]);
    }
}
