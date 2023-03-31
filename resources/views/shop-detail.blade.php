@extends('layouts.common')

<?php
$cssPath = asset("/css/shop.css");
?>
@section('css', $cssPath)

@section('head--add')
<script src="https://unpkg.com/dayjs"></script>
<script src="https://unpkg.com/dayjs@1.7.7/locale/ja.js"></script>
@endsection

@section('content')
<div class="main--wrap">
    <div class="shop--detail">
        <div class="shop--detail__header">
            <button class="shop--detail__back--button" onclick="location.href='/'">
                &lt;
            </button>
            <h1 class="shop--detail__name">{{$shop->name}}</h1>
        </div>
        <img src="{{asset('/img/test.png')}}" class="shop--detail__img">
        <p class="shop--detail__tag">
            <span>#{{$shop->area}}</span>
            <span>#{{$shop->genre}}</span>
        </p>
        <p class="shop--detail__description">
            {{$shop->description}}
        </p>
    </div>
    <div class="shop--detail__reserve">
        <div class="shop--detail__reserve__content">
            <h1>予約</h1>
            <form action="/reserve" method="post">
                @csrf
                <input class="shop--detail__reserve__form--input" type="date" name="date" id="formDate">
                <select class="shop--detail__reserve__form--select" name="time" id="formTime"></select>
                <select class="shop--detail__reserve__form--select" name="num_of_people" id="formNumOfPeople"></select>
            </form>
            <div class="shop--detail__reserve__confirm">
                <table>
                    <tr class="shop--detail__reserve__confirm--tr">
                        <td>Shop</td>
                        <td>{{$shop->name}}</td>
                    </tr>
                    <tr class="shop--detail__reserve__confirm--tr">
                        <td>Date</td>
                        <td>2021-04-01</td>
                    </tr>
                    <tr class="shop--detail__reserve__confirm--tr">
                        <td>Time</td>
                        <td>17:00</td>
                    </tr>
                    <tr class="shop--detail__reserve__confirm--tr">
                        <td>Number</td>
                        <td>1人</td>
                    </tr>
                </table>
            </div>
        </div>
        <button class="shop--detail__reserve__button">予約する</button>
    </div>
</div>

<script src="{{asset('/js/shop-detail.js')}}"></script>
@endsection
