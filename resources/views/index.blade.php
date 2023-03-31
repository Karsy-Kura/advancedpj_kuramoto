@extends('layouts.common')

@section('css', 'shop.css')

@section('header--sub')
<div class="search--cond">
    <form action="/search" method="get" class="search--cond__form">
        @csrf
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
                <p>
                    <span class="shop--card__tag">#{{ $shop->area }}</span>
                    <span class="shop--card__tag">#{{ $shop->genre }}</span>
                </p>
            </div>
            <div class="shop--card__footer">
                <form action="/detail/{{$shop->id}}" method="get">
                    @csrf
                    <button class="shop--card__button--detail">詳しく見る</button>
                </form>
                <button class="shop--card__button--favorite">&hearts;</button>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
