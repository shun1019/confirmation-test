<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FashionablyLate</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    @yield('css')
</head>

<body>
    <header class="header">
        <div class="header__inner">
            <div class="header__utilities">
                <a class="header__logo" href="/">
                    FashionablyLate
                </a>
                <nav>
                    <ul class="header-nav">
                        @if (Auth::check())
                        <li class="header-nav__item">
                            <a class="header-nav__link" href="/mypage">マイページ</a>
                        </li>
                        <li class="header-nav__item">
                            <form class="form" action="/logout" method="post">
                                @csrf
                                <button class="header-nav__button">ログアウト</button>
                            </form>
                        </li>
                        @else
                        <!-- ページによってリンクを表示 -->
                        @if (Route::is('login')) <!-- ログインページならRegisterボタンを表示 -->
                        <li class="header-nav__item">
                            <div class="register__link">
                                <a class="register__button-submit" href="/register">Register</a>
                            </div>
                        </li>
                        @elseif (Route::is('register')) <!-- 登録ページならLoginボタンを表示 -->
                        <li class="header-nav__item">
                            <div class="login__link">
                                <a class="login__button-submit" href="/login">Login</a>
                            </div>
                        </li>
                        @endif
                        @endif
                    </ul>
                </nav>
            </div>
        </div>
    </header>

    <main>
        @yield('content')
    </main>
</body>

</html>