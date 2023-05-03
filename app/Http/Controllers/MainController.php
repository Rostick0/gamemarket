<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class MainController extends Controller
{
    public function show(): View
    {
        $banner_game = Game::find(1);
        $games_new = Game::orderBy('release_date', 'DESC')
            ->limit(10)
            ->get();

        $genres = DB::table('genres')->get() ?? [];

        return view('main', [
            'banner_game' => $banner_game,
            'genres' => $genres,
            'games_new' => $games_new
        ]);
    }
}
