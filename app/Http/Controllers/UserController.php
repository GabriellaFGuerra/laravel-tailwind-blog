<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function create()
    {
        return view('register');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6|confirmed'
        ]);

        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = $request->input('password');

        if (!$user->save()) {
            return Redirect::back()->withInput($request->all())->withErrors($user->getErrors());
        } else {
            Auth::login($user);
            return Redirect::to('/');
        }
    }

    public function show(string $id)
    {
        if (Auth::id() == $id) {
            $user = User::find(Auth::id())->get();

            return view('user', $user);
        } else {
            return Redirect::back()->withErrors([
                'error' => 'You are not authorized to view this user'
            ]);
        }
    }

    public function update(Request $request, string $id)
    {
        if (Auth::id() == $id) {
            $user = User::find(Auth::id())->get();
            $user->name = $request->input('name');
            $user->email = $request->input('email');

            if (!$user->save()) {
                return Redirect::back()->withInput($request->all())->withErrors($user->getErrors());
            }
        } else {
            return Redirect::back()->withErrors([
                'error' => 'You are not authorized to update this user'
            ]);
        }

        return Redirect::back();
    }

    public function destroy(string $id)
    {
        if (Auth::id() == $id) {
            $user = User::find(Auth::id())->get();
            $user->delete();
            return Redirect::to('/');
        } else {
            return Redirect::back()->withErrors([
                'error' => 'You are not authorized to delete this user'
            ]);
        }
    }
}
