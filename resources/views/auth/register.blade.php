@extends('layouts.common')

@section('css', 'auth.css')

@section('content')
<div class="auth-card">
    <div class="auth-card__header">
        <h2>Registration</h2>
    </div>
    <div class="auth-card__input">
        <form action="/thanks" method="post">
            @csrf
            <div class="auth-card__input__elem">
                <!-- Todo: icon user -->
                <span class="auth-card__input__elem-logo">□</span>
                <input type="text" name="name" class="auth-card__input__elem-text" placeholder="Username">
            </div>
            <div class="auth-card__input__elem">
                <!-- Todo: icon email -->
                <span class="auth-card__input__elem-logo">□</span>
                <input type="email" name="email" class="auth-card__input__elem-text" placeholder="Email">
            </div>
            <div class="auth-card__input__elem">
                <!-- Todo: icon password -->
                <span class="auth-card__input__elem-logo">□</span>
                <input type="password" name="password" class="auth-card__input__elem-text" placeholder="Password">
            </div>

            <div class="auth-card__input__elem align-right">
                <button class="auth-card__input__button">登録</button>
            </div>
        </form>
    </div>
</div>
@endsection
