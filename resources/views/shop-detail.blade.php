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
        <img src="{{$shop->img_url}}" class="shop--detail__img">
        <p class="shop--detail__tag">
            <span>#{{$shop->area}}</span>
            <span>#{{$shop->genre}}</span>
        </p>
        <p class="shop--detail__description">
            {{$shop->description}}
        </p>
    </div>
    <div class="shop--detail__reserve">
        <form action="/reserve/create" method="post">
            @csrf
            <div class="shop--detail__reserve__content">
                <h1>予約</h1>
                <input type="number" name="shop_id" class="display--none" value="{{$shop->id}}">
                <input class="shop--detail__reserve__form--input" type="date" name="date" id="formDate" onchange="reflectValue('Date')">
                <select class="shop--detail__reserve__form--select" name="time" id="formTime" onchange="reflectValue('Time')"></select>
                <select class="shop--detail__reserve__form--select" name="num_of_people" id="formNumOfPeople" onchange="reflectValue('NumOfPeople')"></select>
                <div class="shop--detail__reserve__confirm">
                    <table>
                        <tr class="shop--detail__reserve__confirm--tr">
                            <td>Shop</td>
                            <td>{{$shop->name}}</td>
                        </tr>
                        <tr class="shop--detail__reserve__confirm--tr">
                            <td>Date</td>
                            <td id="confirmDate"></td>
                        </tr>
                        <tr class="shop--detail__reserve__confirm--tr">
                            <td>Time</td>
                            <td id="confirmTime"></td>
                        </tr>
                        <tr class="shop--detail__reserve__confirm--tr">
                            <td>Number</td>
                            <td id="confirmNumOfPeople"></td>
                        </tr>
                    </table>
                </div>
            </div>
            <button class="shop--detail__reserve__button">予約する</button>
        </form>
    </div>
</div>
@endsection

@section('script--add')
<script src="{{asset('/js/shop-detail.js')}}"></script>
@endsection
