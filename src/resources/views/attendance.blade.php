@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/attendance.css') }}">
@endsection

@section('content')
  @foreach($attendances as $attendance)
  <h3 class="attendance-date"><a href="#">&lt;</a>$nbsp;{{ $attendance->date('Y-m-d') }}&nbsp;<a href="#">$gt;</a>
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
      @foreach ($attendances as $attendance)
      <tr class="attendance-table__row">
        <td class="attendance-table__item">{{ $attendance->user_id }}</td>
        <td class="attendance-table__item">{{ $attendance->work_start_time('H:i:s') }}</td>
        <td class="attendance-table__item">{{ $attendance->work_end_time('H:i:s') }}</td>
        <td class="attendance-table__item">{{ $rest_start_time->diffInHours($rest_end_time)('H:i:s') }}</td>
        <td class="attendance-table__item">{{ $work_start_time->diffInHours($work_end_time)('H:i:s') }}</td>
      </tr>
      @endforeach
    </table>
  </div>
  <div class="table-page">
      {{ $dates->appends(request()->input())->links('pagination::bootstrap-4') }}
  </div>
</div>
@endsection