<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    private $studios = [
        [
            'title' => 'Respawn Entertainment',
            'description' => 'Американская компания, специализирующаяся на разработке компьютерных игр, основанная двумя бывшими разработчиками Infinity Ward, президентом Джейсоном Уэстом и генеральным менеджером Винсом Зэмпелла.',
            'image' => 'https://avatars.mds.yandex.net/get-entity_search/5509992/551843097/S122x122Fit_2x',
            'date_founded' => '2010-04-12'
        ],
        [
            'title' => 'PUBG Studios',
            'description' => "Является южнокорейской компанией. Она является разработчиком лицензии PlayerUnknown's Battlegrounds и принадлежит Krafton.",
            'image' => 'https://avatars.mds.yandex.net/get-entity_search/2448268/526550525/S122x122Fit_2x',
            'date_founded' => '2017-07-02'
        ],
        [
            'title' => 'Bohemia Interactive Studio',
            'description' => NULL,
            'image' => NULL,
            'date_founded' => '2017-07-02'
        ],
        [
            'title' => 'Valve',
            'description' => NULL,
            'image' => NULL,
            'date_founded' => '1996-08-24'
        ],
        [
            'title' => 'BeamNG',
            'description' => NULL,
            'image' => NULL,
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
        foreach ($this->studios as $studio) {
            DB::table('studios')->insert([
                'title' => $studio['title'],
                'description' => $studio['description'],
                'image' => $studio['image'],
                'date_founded' => $studio['date_founded']
            ]);
        }
    }
}
