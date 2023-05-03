<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ProfileEditController extends Controller
{
    public static function show()
    {
        $user_id = Auth::user()->id ?? NULL;

        $user = DB::table('users')
            ->where('id', '=', $user_id)
            ->get()[0];

        return view('profile-edit', [
            'user' => $user
        ]);
    }

    public static function edit(Request $request)
    {
        $user = DB::table('users')
            ->where('id', '=', Auth::user()->id ?? 0)
            ->get()[0] ?? [];

        $user_valid = [];
        $update_query = [];

        if ($user->nickname != $request->nickname) {
            $user_valid['nickname'] = ['required', 'regex:/([a-zA-Z]+|\d+)/', 'min:4', 'unique:users'];
            $update_query['nickname'] = $request->nickname;
        }

        if ($user->email != $request->email) {
            $user_valid['email'] = 'required|min:4|email|unique:users';
            $update_query['email'] = $request->email;
        }

        if ($user->telephone != $request->telephone) {
            $user_valid['telephone'] = 'required|min:12|unique:users';
            $update_query['telephone'] = $request->telephone;
        }

        $user_valid['password'] = 'required|min:8';
        $update_query['password'] = $request->password;

        $request->validate($user_valid);

        DB::table('users')
            ->where('id', '=', Auth::user()->id)
            ->update($update_query);

        return redirect('/profile/' . Auth::user()->id);
    }

    public static function delete()
    {
        DB::table('users')->delete(Auth::user()->id);

        return redirect('/');
    }
}
