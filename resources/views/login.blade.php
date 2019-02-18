@extends('layouts.master')
@section('content')
    <div class='container'>
        <form method="POST" action="/login">
            <div class="form-group">
                <label for="login">Логин</label>
                <input type="text" name="login" class="form-control form-control-lg" id="login" placeholder="Введите логин">
            </div>
            <div class="form-group">
                <label for="password">Пароль</label>
                <input name="password" type="password" class="form-control form-control-lg" id="password" placeholder="Пароль">
            </div>
            <button type="submit" class="btn btn-primary">Войти</button>
            @csrf
        </form>
    </div>
@endsection