<x-header :title="'Каталог'" />
<main class="main">
    <div class="catalog">
        <div class="container">
            <div class="catalog__container">
                <aside class="catalog__aside">
                    <form class="catalog__form" action="{{ url()->current() }}">
                        <label class="label">
                            <span>Жанр</span>
                            <select class="select input" name="game_genre">
                                <option value="" hidden>Выберите:</option>
                                @foreach ($genres as $genre)
                                    <option value="{{ $genre->id }}"
                                        @if ($genre->id == Request::get('game_genre')) selected @endif>{{ $genre->name }}
                                    </option>
                                @endforeach
                            </select>
                        </label>
                        <label class="label">
                            <span>Название игры:</span>
                            <input class="input" type="text" name="game_title"
                                value={{ Request::get('game_title') }}>
                        </label>
                        <label class="label">
                            <span>Цена:</span>
                            <div class="label__inputs">
                                <input class="input" type="number" name="game_price_min"
                                    value={{ Request::get('game_price_min') }} placeholder="от" pattern="0.01">
                                <input class="input" type="number" name="game_price_max"
                                    value={{ Request::get('game_price_max') }} placeholder="до" pattern="0.01">
                            </div>
                        </label>
                        <label class="label">
                            <span>Разработчик:</span>
                            <input class="input" type="text" name="game_studio"
                                value={{ Request::get('game_studio') }}>
                        </label>
                        <label class="label">
                            <span>Издательство:</span>
                            <input class="input" type="text" name="game_publisher"
                                value={{ Request::get('game_publisher') }}>
                        </label>
                        <div class="catalog__form_bottom">
                            <button class="button" type="submit">Поиск</button>
                            <a class="a catalog__form_reset" href="{{ url()->current() }}">Сброс</a>
                        </div>
                    </form>
                </aside>
                <div class="catalog__content">
                    <ul class="catalog__list">
                        @foreach ($games as $game)
                            <li class="catalog__item">
                                <a class="catalog-game__item" href="/game/{{ $game->id }}">
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
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            {{ $games->links('vendor.pagination') }}

        </div>
    </div>
</main>
<x-footer />
