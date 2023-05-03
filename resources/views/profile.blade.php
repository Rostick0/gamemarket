<x-header :title="'Игры на любой вкус'" />
<main class="main">
    <section class="profile">
        <div class="container">
            <div class="profile__container">
                <h2 class="section-title">Профиль игрока: {{ $user->nickname }}</h2>
                <div class="profile__info">
                    <ul class="profile__list">
                        <li class="profile__item">
                            <strong>Никнейм:</strong>
                            <span>{{ $user->nickname }}</span>
                        </li>
                        <li class="profile__item">
                            <strong>E-mail:</strong>
                            <span>{{ $user->email }}</span>
                        </li>
                        <li class="profile__item">
                            <strong>Телефон:</strong>
                            <span>{{ $user->telephone }}</span>
                        </li>
                        <li class="profile__item">
                            <strong>Аккаунт создан :</strong>
                            <span>{{ $user->created_date }}</span>
                        </li>
                    </ul>
                    @if ((Auth::user()->id ?? 0) == $user->id)
                        <div class="profile__application">
                            <a class="button" href="{{ route('profile_edit') }}">Редактировать</a>
                            <a class="a _red" href="{{ route('profile_exit') }}">Выйти</a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
    @if (!empty($user_games[0]))
        <section class="catalog-game">
            <div class="container">
                @if ((Auth::user()->id ?? 0) == $user->id)
                    <h2 class="section-title">Мои игры</h2>
                @else
                    <h2 class="section-title">Игры пользователя</h2>
                @endif
                <ul class="catalog__list profile-catalog">
                    @foreach ($user_games as $game)
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
                {{ $user_games->links('vendor.pagination') }}
            </div>
        </section>
    @endif
</main>
<x-footer />
