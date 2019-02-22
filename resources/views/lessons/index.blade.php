@extends('layouts.master')
@section('content')
@include('header')
<div class='container'>
  @if (!empty($lessons))
  <div class="card">
    <div class="card-header">
    Уроки
    </div>
    @foreach($lessons as $lesson)
    <div class="card-body">
      <h5 class="card-title">{{$lesson->name}}</h5>
      <p class="card-text">Урок будет проведен: {{\Carbon\Carbon::parse($lesson->date)->format('d F Y')}}</p>
      <a href="/lessons/{{$lesson->id}}">Подробнее</a>
    </div>
    @endforeach
  </div>
  @endif
</div>
@endsection