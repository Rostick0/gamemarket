<x-header :title="'Игры на любой вкус'" />
<main class="main main-main">
    <section class="banner" style="background-image: url({{ $banner_game['image'] }})">
        <div class="container">
            <div class="banner__container">
                <h2 class="banner__title">{{ $banner_game['title'] }}</h2>
                <div class="banner__description">
                    {!! $banner_game['description'] !!}
                </div>
                <a class="banner__buy" href="{{ '/game/' . $banner_game['id'] }}">Купить</a>
            </div>
        </div>
    </section>

    <section class="catalog-game _slider">
        <div class="container">
            <h2 class="section-title catalog-slider__section-title">Рекомендуемое</h2>
            <div class="swiper catalog-game__swiper">
                <div class="swiper-wrapper">
                    <a class="swiper-slide catalog-game__item" href="#">
                        <div class="catalog-game__image">
                            <img src="https://i.ytimg.com/vi/7Wboj2Z2XTU/maxresdefault.jpg" alt="">
                        </div>
                        <div class="catalog-game__text">
                            <div class="catalog-game__title">Arma 3</div>
                            <div class="catalog-game__price"><del>100</del> 100 руб</div>
                        </div>
                    </a>
                    <a class="swiper-slide catalog-game__item" href="#">
                        <div class="catalog-game__image">
                            <img src="https://klike.net/uploads/posts/2023-01/1674401668_3-15.jpg" alt="">
                        </div>
                        <div class="catalog-game__text">
                            <div class="catalog-game__title">PUBG: BATTLEGROUNDS</div>
                            <div class="catalog-game__price">Бесплатно</div>
                        </div>
                    </a>
                    <a class="swiper-slide catalog-game__item" href="#">
                        <div class="catalog-game__image">
                            <img src="https://i.ytimg.com/vi/7Wboj2Z2XTU/maxresdefault.jpg" alt="">
                        </div>
                        <div class="catalog-game__text">
                            <div class="catalog-game__title">Arma 3</div>
                            <div class="catalog-game__price">1100 руб</div>
                        </div>
                    </a>
                    <a class="swiper-slide catalog-game__item" href="#">
                        <div class="catalog-game__image">
                            <img src="https://i.ytimg.com/vi/7Wboj2Z2XTU/maxresdefault.jpg" alt="">
                        </div>
                        <div class="catalog-game__text">
                            <div class="catalog-game__title">Arma 3</div>
                            <div class="catalog-game__price">390 руб</div>
                        </div>
                    </a>
                    <a class="swiper-slide catalog-game__item" href="#">
                        <div class="catalog-game__image">
                            <img src="https://i.ytimg.com/vi/7Wboj2Z2XTU/maxresdefault.jpg" alt="">
                        </div>
                        <div class="catalog-game__text">
                            <div class="catalog-game__title">Arma 3</div>
                            <div class="catalog-game__price">100 руб</div>
                        </div>
                    </a>
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </section>

    @if (!empty($genres))
        <section class="main-genre">
            <div class="container">
                <h2 class="section-title main-genre__section-list">Жанры</h2>
                <div class="main-genre__list">
                    @foreach ($genres as $genre)
                        <a class="button main-genre__link"
                            href="/catalog?genre={{ $genre->id }}">{{ $genre->name }}</a>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    <section class="catalog-game _slider">
        <div class="container">
            <h2 class="section-title catalog-slider__section-title">Новинки</h2>
            <div class="swiper catalog-game__swiper">
                <div class="swiper-wrapper">
                    @foreach ($games_new as $game)
                        <a class="swiper-slide catalog-game__item" href="/game/{{ $game->id }}">
                            <div class="catalog-game__image">
                                <img src="{{ $game->image }}" alt="{{ $game->title }}">
                            </div>
                            <div class="catalog-game__text">
                                <div class="catalog-game__title">{{ $game->title }}</div>
                                @if ($game->price == 0)
                                    <div class="catalog-game__price">Бесплатно</div>
                                @else
                                    @if ($game->price_sell)
                                        <div class="catalog-game__price"><del>{{ $game->price }}</del>
                                            {{ $game->price_sell }} руб</div>
                                    @else
                                        <div class="catalog-game__price">{{ $game->price }} руб</div>
                                    @endif
                                @endif
                            </div>
                        </a>
                    @endforeach
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </section>

    <div class="main-more">
        <a class="button" href="/catalog">Больше игр</a>
    </div>
</main>
<x-footer />
