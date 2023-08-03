@extends('layouts.app')

@section('css')
<!-- <link rel="stylesheet" href="{{ asset('css/attendance.css') }}"> -->
@endsection

@section('content')
  <div class="date">
    <button class="date_button"><a href="{!! '/attendances/' . ($num - 1) !!}">&lt;</a></button>
  </div>
  <h3 class="attendance-date">{{ $fixed_date }}</h3>
  <div class="date">
    <button class="date_button"><a href="{!! '/attendances/' . ($num + 1) !!}">&gt;</a></button>
  </div>
  <div class="attendance-table">
    <table class="attendance-table__inner">
      <tr class="attendance-table__row">
        <th class="attendance-table__header">名前</th>
        <th class="attendance-table__header">勤務開始</th>
        <th class="attendance-table__header">勤務終了</th>
        <th class="attendance-table__header">休憩時間</th>
        <th class="attendance-table__header">勤務時間</th>
      </tr>

      @foreach($attendances as $attendance)
      {{ $attendance }}
      <tr class="attendance-table__row">
        <td class="attendance-table__item"></td>
        <td class="attendance-table__item"></td>
        <td class="attendance-table__item"></td>
        <td class="attendance-table__item"></td>
        <td class="attendance-table__item"></td>
      </tr>
      @endforeach
    </table>
  </div>
  <div class="table-page">
      
  </div>
</div>
@endsection