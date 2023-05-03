<x-header :title="$game->title" />
<main class="main">
    <section class="game">
        <div class="container">
            <div class="game__container">
                <div class="game__image">
                    <img src="{{ $game->image }}" alt="{{ $game->title }}">
                </div>
                <div class="game__info">
                    <div class="game__info_top">
                        <h1 class="game__title">{{ $game->title }}</h1>
                        @if ($game->user_have)
                            <strong class="game__application">Куплено</strong>
                        @else
                            <form class="game__application" action="{{ route('game', $game->id) }}" method="post">
                                @csrf
                                <div class="game__price">{{ $game->price }} руб</div>
                                <button class="button game__buy">Купить</button>
                            </form>
                        @endif
                    </div>
                    <div class="game__description">{!! $game->description !!}</div>
                    <ul class="game__info_list">
                        <li class="game__info_item">
                            <strong>Жанр:</strong>
                            <span>{{ $game->genre_name }}</span>
                        </li>
                        <li class="game__info_item">
                            <strong>Дата релиза:</strong>
                            <span>{{ $game->release_date }}</span>
                        </li>
                        <li class="game__info_item">
                            <strong>Издательство:</strong>
                            <span>{{ $game->publisher_title }}</span>
                        </li>
                        <li class="game__info_item">
                            <strong>Разработчик:</strong>
                            <span>{{ $game->studio_title }}</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
</main>
<x-footer />
