<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register() {
        return view('auth.register');
    }

    public function submit_register(Request $request) {
        $request->validate([
            'first_name' => 'required|string|max:255|min:2',
            'last_name' => 'required|string|max:255|min:2',
            'username' => 'required|unique:users,username|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => Password::min(6)->numbers(),
            'confirm_password' => 'required|same:password'
        ]);

        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        Auth::login($user);
        // TODO: redirect to feed page
        return redirect()->route('photos.index')->with('success', 'You have successfully registered!');
    }

    public function login() {
        return view('auth.login');
    }

    public function submit_login() {
        $credentials = request()->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            return redirect()->route('index')->with('success', 'You have successfully logged in!');
        }

        return back()->withErrors([
            'username' => 'The provided credentials do not match our records.'
        ]);
    }

    public function logout() {
        Auth::logout();

        return redirect()->route('index')->with('success', 'You have successfully logged out!');
    }
}
