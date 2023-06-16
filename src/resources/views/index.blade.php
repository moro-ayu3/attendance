@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
<div class="attendance__alert">
  @if(session('message'))
    {{ session('message') }}
  @endif
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
    <form class="attendance__button" action="/" method="post">
      <button class="attendance__button-submit" type="submit">勤務開始</button>
    </form>
    <form class="attendance__button-1" action="/" method="post">
        <button class="attendance__button-submit" type="submit">勤務終了</button>
    </form>
    <form class="attendance__button" action="/" method="post">
      <button class="attendance__button-submit" type="submit">休憩開始</button>
    </form>
    <form class="attendance__button-1" action="/" method="post">
      <button class="attendance__button-submit" type="submit">休憩終了</button>
    </form>
  </div>
</div>
@endsection