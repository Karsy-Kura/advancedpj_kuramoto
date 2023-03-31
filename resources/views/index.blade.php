@extends('layouts.common')

<?php
    $cssPath = asset("/css/shop.css");
?>
@section('css', $cssPath)

@section('header--sub')
<div class="search--cond">
    <form action="/search" method="get" class="search--cond__form">
        <div class="search--cond__wrap--select">
            <select name="area" class="search--cond__select">
                <option selected>All area</option>
                @foreach ($areas as $area)
                <option>{{ $area->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="search--cond__wrap--select">
            <select name="genre" class="search--cond__select">
                <option selected>All genre</option>
                @foreach ($genres as $genre)
                <option>{{ $genre->name }}</option>
                @endforeach
            </select>
        </div>

        <span class="search--cond__logo">□</span>
        <input type="text" name="store" class="search--cond__text" placeholder="Search ...">
    </form>
</div>
@endsection

@section('content')
<div class="main--wrap">
    <div class="shop--list">
        @foreach ($shops as $shop)
        <div class="shop--card">
            <img src="/img/test.png" class="shop--list__card__img">

            <div class="shop--card__text">
                <h2 class="shop--card__name">{{ $shop->name }}</h2>
                <p class="shop--card__tag">
                    <span>#{{ $shop->area }}</span>
                    <span>#{{ $shop->genre }}</span>
                </p>
            </div>

            <div class="shop--card__footer">
                <button class="shop--card__button--detail" onclick="location.href='/detail/{{$shop->id}}'">
                    詳しく見る
                </button>
                <button class="shop--card__button--favorite">&hearts;</button>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
