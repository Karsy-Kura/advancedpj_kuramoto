@extends('layouts.common')

<?php
    $cssPath = asset("/css/auth.css");
?>
@section('css', $cssPath)

@section('content')
<div class="auth--card">
    <div class="auth--card__input">
        <div class="auth--card__input__elem align--center">
            <p class="auth--card__thanks--text">ご予約ありがとうございます</p>
        </div>
        <form action="/" method="get">
            @csrf
            <div class="auth--card__input__elem align--center">
                <button class="auth--card__input__button">戻る</button>
            </div>
        </form>
    </div>
</div>
@endsection

