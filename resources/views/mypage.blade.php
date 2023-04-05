@extends('layouts.common')

@section('head--add')
<link rel="stylesheet" href="{{asset('/css/mypage.css')}}">
<link rel="stylesheet" href="{{asset('/css/shop.css')}}">
@endsection

@section('content')
<div class="main--wrap">
    <div class="mypage--grid">
        <div class="mypage__user">
            <h1 class="mypage__user__name">{{$user->name}}さん</h1>
        </div>

        <div class="mypage__reserves">
            <h2 class="mypage__caption">予約状況</h2>
            <div class="maypage__list">
                @php
                $numReserve = 0;
                @endphp
                @foreach ($reserves as $reserve)
                @php
                $numReserve++;
                @endphp
                <div class="mypage__reserves__card">

                    <div class="mypage__reserves__card--title">
                        <img src="{{asset('/img/icon_clock.png')}}">
                        <p>予約{{$numReserve}}</p>
                        <form action="/reserve/delete" method="post">
                            @csrf
                            <input type="number" name="id" class="display--none" value="{{$reserve->id}}">
                            <button class="mypage__reserves__card--delete"> <span>&times;</span> </button>
                        </form>
                    </div>

                    <table class="mypage__reserves__card--table">
                        <tr class="mypage__reserves__card--table__tr">
                            <td>Shop</td>
                            <td>{{$reserve->shop}}</td>
                        </tr>
                        <tr class="mypage__reserves__card--table__tr">
                            <td>Date</td>
                            <td>{{$reserve->date}}</td>
                        </tr>
                        <tr class="mypage__reserves__card--table__tr">
                            <td>Time</td>
                            <td>{{$reserve->time}}</td>
                        </tr>
                        <tr class="mypage__reserves__card--table__tr">
                            <td>Number</td>
                            <td>{{$reserve->num_of_people}}</td>
                        </tr>
                    </table>
                </div>
                @endforeach
            </div>
        </div>

        <div class="mypage__favorites">
            <h2 class="mypage__caption">お気に入り店舗</h2>
            <div class="mypage__list">
                <div class="shop--list">
                    @foreach ($favorites as $favorite)
                    @php
                    $shop = $favorite->shop;
                    @endphp
                    <div class="shop--card">
                        <img src="{{$shop->img_src}}" alt="{{$shop->name}}" class="shop--card__img">

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
                            <favorite-component shop_id="{{$shop->id}}" favorite_id="{{$shop->user_favorite_id}}" toggle>
                            </favorite-component>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
