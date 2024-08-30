<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login_form()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = User::where('email', $request->input('email'))->first();

        if (!$user) {
            return Redirect::back()->withErrors([
                'email' => 'Invalid email'
            ]);
        }

        if (!Hash::check($request->input('password'), $user->password)) {
            return Redirect::back()->withErrors([
                'password' => 'Invaild password'
            ]);
        }

        Auth::login($user);
        $request->session()->regenerate();

        return Redirect::to('/');
    }


    public function logout()
    {
        Auth::logout();
        return Redirect::to('/');
    }
}
