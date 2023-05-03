<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class ProfileController extends Controller
{
    public static function show(int $id): View
    {
        $query = DB::table('users')
            ->where('id', '=', $id)
            ->get();

        if (empty($query[0])) return abort(404);

        $user = $query[0];

        $user_games = Game::getUserBy($id);

        return view('profile', [
            'user' => $user,
            'user_games' => $user_games
        ]);
    }

    public function logout()
    {
        Auth::logout();

        return redirect('/');
    }
}
