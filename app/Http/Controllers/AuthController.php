<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = User::findBy('email', $request->input('email'));

        if (!$user || !$user->checkPassword($request->input('password'))) {
            return Redirect::back()->withInput($request->all())->withErrors([
                'email' => 'Invalid email or password'
            ]);
        } else {
            Auth::login($user);
            return Redirect::to('/');
        }
    }

    public function logout()
    {
        Auth::logout();
        return Redirect::to('/');
    }
}
