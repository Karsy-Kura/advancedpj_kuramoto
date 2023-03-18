<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rese</title>
    <link rel="stylesheet" href="./css/app.css">
    <link rel="stylesheet" href="./css/auth.css">
    <link rel="stylesheet" href="./css/reset.css">
</head>

<body>
    <div class="wrap">
        <header class="header">
            <div class="header__logo">
                <h1 class="header__logo-text">Rese</h1>
            </div>
        </header>

        <section class="content">
            <div class="auth-card">
                <div class="auth-card__header">
                    <h2>Login</h2>
                </div>
                <div class="auth-card__input">
                    <form action="/login" method="post">
                        @csrf
                        <div class="auth-card__input__elem">
                            <!-- Todo: icon email -->
                            <span class="auth-card__input__elem-logo">□</span>
                            <input type="email" name="email" class="auth-card__input__elem-text" placeholder="Email">
                        </div>
                        <div class="auth-card__input__elem">
                            <!-- Todo: icon password -->
                            <span class="auth-card__input__elem-logo">□</span>
                            <input type="password" name="password" class="auth-card__input__elem-text" placeholder="Password">
                        </div>
                        <div class="auth-card__input__elem align-right">
                            <button class="auth-card__input__button">ログイン</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
</body>

</html>
