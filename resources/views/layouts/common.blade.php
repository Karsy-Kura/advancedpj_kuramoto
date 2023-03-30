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
                <h1 class="header__logo-text">Rese</h1>
            </div>
            @yield('header-sub')
        </header>

        <section class="content">
            @yield('content')
        </section>
    </div>
</body>

</html>
