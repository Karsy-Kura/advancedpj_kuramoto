@extends('layouts.common')

<?php
    $cssPath = asset("/css/auth.css");
?>
@section('css', $cssPath)

@section('content')
<div class="auth--card">
    <div class="auth--card__header">
        <h2>Registration</h2>
    </div>
    <div class="auth--card__input">
        <form action="/thanks" method="post">
            @csrf

            @if ($errors->has('name'))
            <ul class="auth--card__input__error"><li>{{$errors->first('name')}}</li></ul>
            @endif
            <div class="auth--card__input__elem">
                <img src="{{asset('/img/icon_user.png')}}" class="auth--card__input__elem--icon">
                <input type="text" name="name" class="auth--card__input__elem--text" placeholder="Username">
            </div>

            @if ($errors->has('email'))
            <ul class="auth--card__input__error"><li>{{$errors->first('email')}}</li></ul>
            @endif
            <div class="auth--card__input__elem">
                <img src="{{asset('/img/icon_email.png')}}" class="auth--card__input__elem--icon">
                <input type="email" name="email" class="auth--card__input__elem--text" placeholder="Email">
            </div>

            @if ($errors->has('password'))
            <ul class="auth--card__input__error"><li>{{$errors->first('password')}}</li></ul>
            @endif
            <div class="auth--card__input__elem">
                <img src="{{asset('/img/icon_password.png')}}" class="auth--card__input__elem--icon">
                <input type="password" name="password" class="auth--card__input__elem--text" placeholder="Password">
            </div>

            <div class="auth--card__input__elem align--right">
                <button class="auth--card__input__button">登録</button>
            </div>
        </form>
    </div>
</div>
@endsection
