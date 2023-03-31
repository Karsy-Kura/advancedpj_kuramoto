@extends('layouts.common')

@section('css', 'shop.css')

@section('content')
<div class="shop--detail">
    <div class="shop--detail__header">
        <form action="/" method="get">
            @csrf
            <button class="shop--detail__back--button"></button>
        </form>
        <h1 class="shop--detail__name">{{$shop->name}}</h1>
    </div>
</div>
@endsection
