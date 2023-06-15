@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/attendance.css') }}">
@endsection

@section('content')
  @foreach($dates as $date)
  <h3 class="attendance-date"><a href="#">&lt;</a>$nbsp;{{ $date->date('Y-m-d') }}&nbsp;<a href="#">$gt;</a>
  </h3>
  @endforeach
  <div class="attendance-table">
    <table class="attendance-table__inner">
      <tr class="attendance-table__row">
        <th class="attendance-table__header">名前</th>
        <th class="attendance-table__header">勤務開始</th>
        <th class="attendance-table__header">勤務終了</th>
        <th class="attendance-table__header">休憩時間</th>
        <th class="attendance-table__header">勤務時間</th>
      </tr>
      @foreach ($dates as $date)
      <tr class="attendance-table__row">
        <td class="attendance-table__item">{{ $date->name }}</td>
        <td class="attendance-table__item">{{ $date->time('H:i:s') }}</td>
        <td class="attendance-table__item">{{ $date->time('H:i:s') }}</td>
        <td class="attendance-table__item">{{ $date->time('H:i:s') }}</td>
        <td class="attendance-table__item">{{ $date->time('H:i:s') }}</td>
      </tr>
      @endforeach
    </table>
  </div>
  <div class="table-page">
      {{ $dates->appends(request()->input())->links('pagination::bootstrap-4') }}
  </div>
</div>
@endsection