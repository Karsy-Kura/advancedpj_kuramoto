<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rese</title>
    <link rel="stylesheet" href="./css/app.css">
    <link rel="stylesheet" href="./css/auth.css">
    <link rel="stylesheet" href="./css/reset.css">
</head>

@extends('layouts.common')

@section('content')
<div class="auth-card">
    <div class="auth-card__input">
        <div class="auth-card__input__elem align-center">
            <p class="auth-card__thanks-text">会員登録ありがとうございます</p>
        </div>
        <form action="/login" method="get">
            @csrf
            <div class="auth-card__input__elem align-center">
                <button class="auth-card__input__button">ログインする</button>
            </div>
        </form>
    </div>
</div>
@endsection

</html>
