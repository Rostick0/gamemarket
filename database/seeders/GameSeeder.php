<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    private $games = [
        [
            'title' => 'Star Wars Jedi: Survivor',
            'description' => 'Star Wars Jedi: Survivor — компьютерная игра в жанре action-adventure, разработанная компанией Respawn Entertainment и изданная Electronic Arts. Является прямым продолжением Star Wars Jedi: Fallen Order, выпущенной в 2019 году. Релиз игры состоялся 28 апреля 2023 года.<br /><br /> Действие нового экшена стартует через пять лет после событий Fallen Order. Как и сюжет предыдущей части, история Survivor разворачивается во временном отрезке между третьим и четвёртым эпизодами относительно киносаги — то есть уже после образования Галактической Империи, но ещё до того, как молодой Люк Скайуокер впервые взял в руки световой меч.',
            'image' => '/img/Star_Wars_Jedi_Survivor.jpeg',
            'release_date' => '2023-04-28',
            'price' => 4999,
            'price_sell' => NULL,
            'genre_id' => 1,
            'publisher_id' => 1,
            'studio_id' => 1
        ],
        [
            'title' => "PlayerUnknown's Battlegrounds",
            'description' => 'Многопользовательская онлайн-игра в жанре королевской битвы, разрабатываемая и издаваемая студией PUBG Corporation, дочерней компанией корейского издателя Krafton, ранее известного как Bluehole. Игра основана на предыдущих модификациях для других игр, созданных Бренданом Грином под псевдонимом «PlayerUnknown», концепция которых была вдохновлена японским фильмом «Королевская битва». В итоге это привело к созданию самостоятельной игры, где Грин выступил в качестве ведущего геймдизайнера. В игре до 100 игроков, которые десантируются на остров, после чего ищут снаряжение и оружие, чтобы убить других участников и при этом самим остаться в живых.',
            'image' => 'https://klike.net/uploads/posts/2023-01/1674401668_3-15.jpg',
            'release_date' => '2017-12-21',
            'price' => 0,
            'price_sell' => NULL,
            'genre_id' => 1,
            'publisher_id' => 2,
            'studio_id' => 2
        ],
        [
            'title' => "Arma 3",
            'description' => 'Испытайте вкус боевых действий в массовой военной игре. C более чем 20 видами техники и 40 видами оружия, различными режимами игры и безграничными возможностями создания контента, вы получаете наилучший реализм и разнообразие в Arma 3.',
            'image' => 'https://i.ytimg.com/vi/7Wboj2Z2XTU/maxresdefault.jpg',
            'release_date' => '2013-09-12',
            'price' => 1199,
            'price_sell' => NULL,
            'genre_id' => 1,
            'publisher_id' => 3,
            'studio_id' => 3
        ],
        [
            'title' => 'Dota 2',
            'description' => 'Ежедневно миллионы игроков по всему миру сражаются от лица одного из более сотни героев Dota 2, и даже после тысячи часов в ней есть чему научиться. Благодаря регулярным обновлениям игра живёт своей жизнью: геймплей, возможности и герои постоянно преображаются.',
            'image' => 'https://cdn.akamai.steamstatic.com/steam/apps/570/header.jpg?t=1682639497',
            'release_date' => '2013-07-09',
            'price' => 0,
            'price_sell' => NULL,
            'genre_id' => 2,
            'publisher_id' => 4,
            'studio_id' => 4
        ],
        [
            'title' => 'BeamNG.drive',
            'description' => 'Основанный на физике мягких объектов автомобильный симулятор, способный практически на всё.',
            'image' => 'https://cdn.akamai.steamstatic.com/steam/apps/284160/header.jpg?t=1670937192',
            'release_date' => '2015-05-29',
            'price' => 465,
            'price_sell' => NULL,
            'genre_id' => 3,
            'publisher_id' => 5,
            'studio_id' => 5
        ],
        [
            'title' => 'Star Wars Jedi: Fallen Order',
            'description' => 'Игра Star Wars Jedi: Fallen Order, рассказывает историю об одном из последних членов Ордена Джедаев, падаване Кэле Кастисе, уцелевшим в ходе  Приказа 66, действия игры проходят вскоре после событий Звездные войны: Эпизод III - Месть Ситхов.',
            'image' => 'https://avatars.mds.yandex.net/i?id=ebc4653dee3801dc72739951d8687d06_l-7084983-images-thumbs&n=13',
            'release_date' => '2019-11-21',
            'price' => 1999,
            'price_sell' => NULL,
            'genre_id' => 1,
            'publisher_id' => 1,
            'studio_id' => 1
        ],
        [
            'title' => 'World War Z',
            'description' => 'World War Z — ураганный, динамичный и кровавый шутер от третьего лица против полчищ зомби (до 4 игроков).',
            'image' => 'https://cdn.akamai.steamstatic.com/steam/apps/699130/header.jpg?t=1680096435',
            'release_date' => '2021-09-21',
            'price' => 999,
            'price_sell' => NULL,
            'genre_id' => 4,
            'publisher_id' => 6,
            'studio_id' => 6
        ],
        [
            'title' => 'Симулятор Побега от Военкомата',
            'description' => 'Новейший крутеший симулятор побега. А ты сможешь убежать?',
            'image' => 'https://cdn.akamai.steamstatic.com/steam/apps/1248090/header.jpg?t=1680529256',
            'release_date' => '2023-04-03',
            'price' => 42,
            'price_sell' => NULL,
            'genre_id' => 6,
            'publisher_id' => 7,
            'studio_id' => 7
        ]
    ];

    public function run()
    {
        foreach ($this->games as $game) {
            DB::table('games')->insert([
                'title' => $game['title'],
                'description' => $game['description'],
                'image' => $game['image'],
                'release_date' => $game['release_date'],
                'price' => $game['price'],
                'price_sell' => $game['price_sell'],
                'genre_id' => $game['genre_id'],
                'publisher_id' => $game['publisher_id'],
                'studio_id' => $game['studio_id']
            ]);
        }
    }
}
