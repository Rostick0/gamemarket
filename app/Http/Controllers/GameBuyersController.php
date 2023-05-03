<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class GameBuyersController extends Controller
{
    public static function buy(int $id)
    {
        if (!Auth::check()) return;

        $user_id = Auth::user()->id;
        $game_id = $id;

        $game = DB::table('game_buyers')->insert([
            'game_id' => $game_id,
            'user_id' => $user_id
        ]);

        return redirect()->back();
    }
}
