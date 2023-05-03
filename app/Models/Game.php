<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Game extends Model
{
    use HasFactory;

    public static function getFullInfo(int $id)
    {
        $user_id = Auth::user()->id ?? NULL;

        $user_buyer = DB::table('game_buyers')
            ->where([
                ['user_id', '=', $user_id],
                ['game_id', '=', $id]
            ])
            ->count();

        $select_sql = [
            'games.*',
            'genres.name as genre_name',
            'publishers.title as publisher_title',
            'studios.title as studio_title',
            DB::raw("'$user_buyer' " . 'as user_have')
        ];


        $game = DB::table('games')
            ->select($select_sql)
            ->leftJoin('genres', 'games.genre_id', '=', 'genres.id')
            ->leftJoin('publishers', 'games.publisher_id', '=', 'publishers.id')
            ->leftJoin('studios', 'games.studio_id', '=', 'studios.id')
            ->where('games.id', '=', $id)
            ->limit(1)
            ->get();

        return $game;
    }

    public static function search(Request $request)
    {
        $genre = $request->get('game_genre');
        $title = $request->get('game_title');
        $price_min = $request->get('game_price_min');
        $price_max = $request->get('game_price_max');
        $publisher = $request->get('game_publisher');
        $studio = $request->get('game_studio');

        $where_query = [];

        if ($genre) $where_query[] = ['games.genre_id', '=', "$genre"];
        if ($title) $where_query[] = ['games.title', 'LIKE', "%$title%"];
        if ($price_min) $where_query[] = ['price', ">=", "$price_min"];
        if ($price_max) $where_query[] = ['price', "<=", "$price_max"];
        if ($publisher) $where_query[] = ['publishers.title', 'LIKE', "%$publisher%"];
        if ($studio) $where_query[] = ['studios.title', 'LIKE', "%$studio%"];

        $query =  DB::table('games')
            ->select(
                'games.*',
                'publishers.title as `publisher_title`',
                'studios.title as `studio_title`'
            )
            ->leftJoin('publishers', 'games.publisher_id', '=', 'publishers.id')
            ->leftJoin('studios', 'games.studio_id', '=', 'studios.id');

        if (!empty($where_query)) $query->where($where_query);

        return $query->paginate(12);
    }

    public static function getUserBy(int $id)
    {
        $query =  DB::table('games')
            ->select(
                'games.*',
                'publishers.title as `publisher_title`',
                'studios.title as `studio_title`'
            )
            ->leftJoin('publishers', 'games.publisher_id', '=', 'publishers.id')
            ->leftJoin('studios', 'games.studio_id', '=', 'studios.id')
            ->join('game_buyers', 'games.id', '=', 'game_buyers.game_id')
            ->where('game_buyers.user_id', '=', "$id");

        return $query->paginate(12);
    }
}
