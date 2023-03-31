<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rese</title>
    <link rel="stylesheet" href="./css/app.css">
    <link rel="stylesheet" href="./css/reset.css">
    <link rel="stylesheet" href="./css/common.css">
    <link rel="stylesheet" href="./css/@yield('css')">
</head>

<body>
    <div class="wrap">
        <header class="header">
            <div class="header__logo">
                <button class="header__logo--button" id="header__logo--button">
                    <span class="header__logo--button__line--top"></span>
                    <span class="header__logo--button__line--middle"></span>
                    <span class="header__logo--button__line--middle"></span>
                    <span class="header__logo--button__line--bottom"></span>
                </button>
                <h1 class="header__logo--text">Rese</h1>
            </div>
            <div class="header__menu" id="header__menu">
                <ul>
                    <li class="header__menu__elem"><a href="/">Home</a></li>
                    @if(Auth::check())
                    <li class="header__menu__elem"><a href="/logout">Logout</a></li>
                    <li class="header__menu__elem"><a href="/mypage">MyPage</a></li>
                    @else
                    <li class="header__menu__elem"><a href="/register">Register</a></li>
                    <li class="header__menu__elem"><a href="/login">Login</a></li>
                    @endif
                </ul>
            </div>
            @yield('header--sub')
        </header>

        <section class="content">
            @yield('content')
        </section>
    </div>
</body>
<script src="./js/common.js"></script>

</html>
