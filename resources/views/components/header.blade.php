<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" media="rgb(10, 14, 28)" content="black" />
    <meta name="color-scheme" content="dark">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" crossorigin="anonymous" />
    <link rel="stylesheet" href="/css/app.css">
    <title>{{ $title }}</title>
</head>

<body>
    <div class="wrapper">
        <header class="header">
            <div class="container">
                <div class="header__container">
                    <a class="header__title" href="/"><span class="header__title_first-letter">G</span>ame<span
                            class="header__title_first-letter">M</span>arket</a>
                    <nav class="header__nav">
                        <a class="a header__nav_a" href="/">Главная</a>
                        <a class="a header__nav_a" href="/catalog">Каталог</a>
                        @if (Auth::check())
                            <a class="a header__nav_a" href="{{ route('profile', auth()->user()->id) }}">Профиль</a>
                        @else
                            <a class="a header__nav_a" href="{{ route('login') }}">Войти</a>
                        @endif
                    </nav>
                    <form class="header__form" action="/catalog?title={{ trim(Request::get('game_title')) }}">
                        <input class="input header__input" type="text" name="game_title"
                            placeholder="Введите название игры">
                        <button class="button header__button">Поиск</button>
                    </form>
                </div>
            </div>
        </header>
