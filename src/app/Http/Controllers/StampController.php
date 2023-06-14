<?php

namespace App\Http\Controllers;

use App\Http\Requests\StampRequest;
use App\Models\Stamp;
use Illuminate\Support\Facades\Auth;


class StampController extends Controller
{
    public function index()
    {
      $user = Auth::user();
      $stamps = $user->stamps;
      return view('index', ['stamps' => $stamps, 'user' => $user]);
    }

    public function store(StampRequest, $request)
    {
      $stamp = $request->only(['content', 'submit']);
      Stamp::create($stamp);
      return view('index', ['stamps' => $stamps]);
    }
}
