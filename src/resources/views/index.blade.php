@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
<div class="attendance__alert">
  <h1>{{ Auth::user()->name }}さんお疲れ様です！</h1>
</div>
  @if ($errors->any())
  <div class="attendance__alert--danger">
    <ul>
      @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
  @endif

<div class="attendance__content">
  <div class="attendance__panel">
    <div class="attendance__panel-z">
      <div class="attendance__panel-1">
        <form class="attendance__button" action="/work/start" method="post">
          @csrf
          <button class="attendance__button-submit" id="submit" disable="disabled" popovertarget>勤務開始</button>
        </form>
      </div>
      <div class="attendance__panel-2">
        <form class="attendance__button-1" action="/work/end" method="post">
          @csrf
          <button class="attendance__button-submit" id="submit" disable="disabled" popovertarget>勤務終了</button>
        </form>
      </div>
    </div>
    <div class="attendance__panel-z">
      <div class="attendance__panel-3">
        <form class="attendance__button" action="/rest/start" method="post">
          @csrf
          <button class="attendance__button-submit" id="submit" disable="disabled" popovertarget>休憩開始</button>
        </form>
      </div>
      <div class="attendamce__panel-4">
        <form class="attendance__button-1" action="/rest/end" method="post">
          @csrf
          <button class="attendance__button-submit" id="submit" disable="disabled" popovertarget>休憩終了</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection