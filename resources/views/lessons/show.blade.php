@extends('layouts.master')
@section('content')
@include('header')
<div class="jumbotron">
    <div class='container'>
        <h1 class="display-4">{{$lesson->name}}</h1>
        <p class="lead">{{$lesson->description}}</p>
        <hr class="my-4">
        <p>Урок будет проведен: {{\Carbon\Carbon::parse($lesson->date)->format('d F Y')}}. Учитель: {{$lesson->teacher->user->name}}</p>
        @foreach ($viewables as $viewable)
            {{$viewable->content}} - 
            @switch(get_class($viewable))
                @case('App\Asset')
                    Материал урока
                    @break
                @case('App\Video')
                    Ссылка на видео
                    @break
                @case('App\Program')
                    Программа урока
            @endswitch
        @endforeach
    </div>
</div>
@endsection