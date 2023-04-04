@extends('layouts.common')

<?php
    $cssPath = asset("/css/shop.css");
?>
@section('css', $cssPath)

@section('header--sub')
<div class="search--cond">
    <form action="/search" method="get" class="search--cond__form">
        <div class="search--cond__wrap--select">
            <select name="area" class="search--cond__select" id="searchArea">
                <option selected>All area</option>
                @foreach ($areas as $area)
                <option
                    @if (isset($query) && $query['area'] == $area->name)
                    selected
                    @endif>
                    {{ $area->name }}
                </option>
                @endforeach
            </select>
        </div>

        <div class="search--cond__wrap--select">
            <select name="genre" class="search--cond__select" id="searchGenre">
                <option selected>All genre</option>
                @foreach ($genres as $genre)
                <option
                    @if (isset($query) && $query['genre'] == $genre->name)
                    selected
                    @endif>
                    {{ $genre->name }}
                </option>
                @endforeach
            </select>
        </div>

        <img src="{{asset('/img/icon_search.png')}}" class="search--cond__icon">
        <input type="text" name="store" class="search--cond__text" placeholder="Search ..."
            @if ( isset($query) )
                value = "{{$query['store']}}"
            @endif
        >
    </form>
</div>
@endsection

@section('content')
<div class="main--wrap">
    <div class="shop--list">
        @foreach ($shops as $shop)
        <div class="shop--card">
            <img src="{{$shop->img_url}}" alt="{{$shop->name}}" class="shop--card__img">

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
                @if (Auth::check())
                <favorite-component
                    shop_id="{{$shop->id}}"
                    favorite_id="{{$shop->user_favorite_id}}"
                    @if ($shop->user_favorite_id != null)
                        toggle
                    @endif
                    >
                </favorite-component>
                @endif
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
