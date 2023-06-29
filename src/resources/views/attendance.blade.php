@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/attendance.css') }}">
@endsection

@section('content')
  @foreach($datas as $data)
  <h3 class="attendance-date"><a href="#">&lt;</a>{{ $data->date }}<a href="#">&gt;</a></h3>
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
      @foreach ($datas as $data)
      <tr class="attendance-table__row">
        <td class="attendance-table__item">{{ Auth::user()->name }}</td>
        <td class="attendance-table__item">{{ $data->work_start_time }}</td>
        <td class="attendance-table__item">{{ $data->work_end_time }}</td>
        <td class="attendance-table__item">{{ $data($time)->diffInHours->diffInMinutes->diffInSeconds($data($time1)) }}</td>
        <td class="attendance-table__item">{{ $data($time)->diffInHours->diffInMinutes->diffInSeconds($data($time1)) }}</td>
      </tr>
      @endforeach
    </table>
  </div>
  <div class="table-page">
      {{ $datas->appends(request()->input())->links('pagination::bootstrap-4') }}
  </div>
</div>
@endsection