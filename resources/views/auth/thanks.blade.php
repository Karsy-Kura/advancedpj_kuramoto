@extends('layouts.common')

@section('css', 'auth.css')

@section('content')
<div class="auth--card">
    <div class="auth--card__input">
        <div class="auth--card__input__elem align--center">
            <p class="auth--card__thanks--text">会員登録ありがとうございます</p>
        </div>
        <form action="/login" method="get">
            @csrf
            <div class="auth--card__input__elem align--center">
                <button class="auth--card__input__button">ログインする</button>
            </div>
        </form>
    </div>
</div>
@endsection
