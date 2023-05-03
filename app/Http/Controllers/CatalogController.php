<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use Illuminate\View\View;

class CatalogController extends Controller
{
    public function show(Request $request): View
    {
        if (!empty($_GET)) {
            $new_get = array_filter($_GET);
            if (count($new_get) < count($_GET)) {
                $request_uri = URL()->current();
                die(header('Location: ' . $request_uri . '?' . http_build_query($new_get)));
            }
        }

        $genres = DB::table('genres')->get();

        $games = Game::search($request);

        return view('catalog', [
            'genres' => $genres,
            'games' => $games,
        ]);
    }
}
