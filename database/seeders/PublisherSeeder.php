<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PublisherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    private $publishers = [
        [
            'title' => 'Electronic Arts',
            'description' => 'Американская корпорация, занимающаяся распространением и изданием компьютерных игр со штаб-квартирой в Редвуд-Сити, штат Калифорния. По состоянию на май 2020 года EA является второй по величине игровой компанией в Америке и Европе по объёму выручки и рыночной капитализации после Activision Blizzard и опережает Take-Two Interactive и Ubisoft.',
            'image' => 'https://avatars.mds.yandex.net/get-entity_search/5542822/551788220/S122x122Fit_2x',
            'date_founded' => '1982-05-28'
        ],
        [
            'title' => 'Bluehole',
            'description' => "PUBG Corporation, Bluehole, Inc. (до января 2015 года Blueballs Studio, Inc.) корейская компания, разработчик компьютерных игр в жанре MMORPG, основана в марте 2007 года, основатель компании ГанСок Ким (англ. Gang-Seok Kim). Она разработала TERA и PlayerUnknown's Battlegrounds. Северо-американским филиалом компании является En Masse Entertainment.",
            'image' => NULL,
            'date_founded' => '2007-03-12'
        ],
        [
            'title' => 'Bohemia Interactive',
            'description' => 'Чешский разработчик и издатель видеоигр, базирующийся в Праге . Компания занимается созданием военных симуляторов, таких как Operation Flashpoint: Cold War Crisis и серии ARMA . Он также известен тем, что работал над игровой конверсией мода DayZ , созданного для ARMA 2 .',
            'image' => 'https://upload.wikimedia.org/wikipedia/commons/1/1b/Bohemia_Interactive.svg',
            'date_founded' => '1999-08-24'
        ],
        [
            'title' => 'Valve',
            'description' => 'Американская частная компания, занимающаяся разработкой, изданием и цифровой дистрибуцией компьютерных игр. Её наиболее известные продукты — сервис цифровой дистрибуции игр и программного обеспечения Steam, компьютерные игры и серии Half-Life, Portal, Counter-Strike, Left 4 Dead и Dota 2. Большинство разработанных Valve игр использует её собственные игровые движки GoldSrc (до 2004-го), Source и Source 2. Штаб-квартира компании находится в городе Белвью, штат Вашингтон, недалеко от Сиэтла.',
            'image' => 'https://upload.wikimedia.org/wikipedia/commons/a/ab/Valve_logo.svg',
            'date_founded' => '1996-08-24'
        ],
        [
            'title' => 'BeamNG',
            'description' => NULL,
            'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/d/da/BeamNG.drive_logo.svg/1059px-BeamNG.drive_logo.svg.png?20170507082741',
            'date_founded' => '2012-05-28'
        ],
        [
            'title' => 'Saber Interactive',
            'description' => NULL,
            'image' => NULL,
            'date_founded' => '2001-11-05'
        ],
        [
            'title' => 'Pirotexnik',
            'description' => NULL,
            'image' => NULL,
            'date_founded' => NULL
        ]
    ];

    public function run()
    {
        foreach ($this->publishers as $publisher) {
            DB::table('publishers')->insert([
                'title' => $publisher['title'],
                'description' => $publisher['description'],
                'image' => $publisher['image'],
                'date_founded' => $publisher['date_founded']
            ]);
        }
    }
}
