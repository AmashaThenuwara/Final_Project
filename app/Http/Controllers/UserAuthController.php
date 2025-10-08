<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserAuthController extends Controller
{
    public function showLoginForm()
    {
        return view('User.Auth.Login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::guard('web')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended(route('user.profile'));
        }

        return back()->withErrors(['email' => 'Invalid credentials']);
    }

    public function showRegisterForm()
    {
        return view('User.Auth.Register');
    }

    public function register(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|min:6|confirmed',
        ]);

        $data['password'] = Hash::make($data['password']);
        $user = User::create($data);

        Auth::guard('web')->login($user);
        return redirect()->route('user.profile');
    }

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home');
    }
}
