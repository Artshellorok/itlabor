@extends('layouts.master')
@section('content')
    @include('header')
    <div class="container">
        <div class='row'>
            <div class='col-md-12'>
                <form method='POST' action='/lessons/create'>
                    <div class="form-group">
                        <label for="name">Название</label>
                        <input type="text" name="name" class="form-control form-control-lg" id="name" placeholder="Введите название урока">
                    </div>
                    <div class="form-group">
                        <label for="description">Описание</label>
                        <textarea name="description" type="text" class="form-control form-control-lg" id="description" placeholder="Описание"></textarea>
                    </div>
                    <div class='form-group'>
                        <label for="date">Выберите дату проведения урока</label>
                        <datetime-picker name="date" class="form-control form-control-lg" placeholder="Описание" id='date'></datetime-picker>
                    </div>

                    <button type="submit" class="btn btn-primary">Создать урок</button>
                    @csrf
                </form>
            </div>
        </div>
    </div>
@endsection