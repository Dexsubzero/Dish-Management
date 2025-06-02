<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register()
    {
        return view('auth.register');
    }

    public function store()
    {
        $validated = request()->validate([
            'name' => 'required|min:3|max:40',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:8',
        ]);

        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        return redirect()->route('dashboard.welcome');
    }

    public function login()
    {
        return view('auth.login');
    }

    public function authenticate()
    {

        $validated = request()->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

          if (auth()->attempt($validated)) {
            request()->session()->regenerate();

            if (auth()->user()->is_role == 1) {
                return redirect()->route('adminmanager.mgr-dashboard');
            } elseif (auth()->user()->is_role == 2) {
                return redirect()->route('adminmanager.dashboard');
            } else {
                return redirect()->route('dashboard.home', ['id' => Auth::id()]);
            }
        }

        return redirect()->route('login')->withErrors([
            'email' => 'No matching user found on email and password',
        ]);
    }

    public function logout()
    {
        auth()->logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect()->route('dashboard.welcome');
    }
}
