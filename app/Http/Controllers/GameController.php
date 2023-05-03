<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Error;
use Illuminate\Database\Query\JoinClause;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class GameController extends Controller
{
    public function show(int $id): View
    {
        $query = Game::getFullInfo($id);

        if (empty($query[0])) return abort(404);

        $game = $query[0];

        return view('game', [
            'game' => $game
        ]);
    }
}
