<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    private $genres = [
        'Экшен',
        'Стратегия',
        'Гонки',
        'Хоррор',
        'Аркада',
        'Симулятор',
        'Файтинг',
        'Ролевые игры',
        'Платформер'
    ];
    public function run()
    {
        foreach ($this->genres as $genre) {
            DB::table('genres')->insert([
                'name' => $genre
            ]);
        }
    }
}
