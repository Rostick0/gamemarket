<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class RegistrationController extends Controller
{
    public function show(): View
    {
        return view('registration');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nickname' => ['required', 'regex:/([a-zA-Z]+|\d+)/', 'min:4', 'unique:users'],
            'email' => 'required|min:4|email|unique:users',
            'telephone' => 'required|min:12|unique:users',
            'password' => 'required|min:8'
        ]);

        $user = User::create([
            'nickname' => $request->nickname,
            'email' => $request->email,
            'telephone' => $request->telephone,
            'password' => Hash::make($request->password)
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect('/profile/' . Auth::user()->id);
    }
}
