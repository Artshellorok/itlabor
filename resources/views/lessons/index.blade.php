@extends('layouts.master')
@section('content')
@include('header')
<div class='container'>
  @if (!empty($paid))
    <div class="card">
      <div class="card-header">
      Уроки
      </div>
      <div class="card-body">
        <h5 class="card-title">Урок флекса</h5>
        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
        <a href="#" class="btn btn-primary">Go somewhere</a>
      </div>
    </div>
  @endif
  @if (!empty($lessons))
  <div class="card">
    <div class="card-header">
    Уроки
    </div>
    @foreach($lessons as $lesson)
    <div class="card-body">
      <h5 class="card-title">{{$lesson->name}}</h5>
      <p class="card-text">{{$lesson->created_at}}</p>
      <a href="/lessons/{{$lesson->id}}" class="btn btn-primary">Go somewhere</a>
    </div>
    @endforeach
  </div>
  @endif
</div>
@endsection