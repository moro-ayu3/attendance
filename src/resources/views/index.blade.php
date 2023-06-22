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
    <div class="attendance__panel-z">
      <div class="attendance__panel-1">
        <form class="attendance__button" action="/" method="post">
          @csrf
          <label class="attendance__button-submit">勤務開始</label>
          <input type="hidden" name="submit" value="送信">
        </form>
      </div>
      <div class="attendance__panel-2">
        <form class="attendance__button-1" action="/" method="post">
          @csrf
          <label class="attendance__button-submit">勤務終了</label>
          <input type="hidden" name="submit" value="送信">
        </form>
      </div>
    </div>
    <div class="attendance__panel-z">
      <div class="attendance__panel-3">
        <form class="attendance__button" action="/" method="post">
          @csrf
          <label class="attendance__button-submit">休憩開始</label>
          <input type="hidden" name="submit" value="送信">
        </form>
      </div>
      <div class="attendamce__panel-4">
        <form class="attendance__button-1" action="/" method="post">
          @csrf
          <label class="attendance__button-submit">休憩終了</label>
          <input type="hidden" name="submit" value="送信">
        </form>
      </div>
    </div>
  </div>
</div>
@endsection