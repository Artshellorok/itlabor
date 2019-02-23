@extends('layouts.master')
@section('content')
@include('header')
<div class="jumbotron">
    <div class='container'>
        <h1 class="display-4">{{$lesson->name}}</h1>
        <p class="lead">{{$lesson->description}}</p>
        <hr class="my-4">
        <p>Урок будет проведен: {{\Carbon\Carbon::parse($lesson->date)->format('d F Y')}}. Учитель заработал: {{$lesson->teacher->user->name}} рублей</p>
        @foreach ($viewables as $viewable)
            
        @endforeach
        <p class="lead">
          <a class="btn btn-primary btn-lg" href="#" role="button">Записаться</a>
        </p>
    </div>
</div>
@endsection