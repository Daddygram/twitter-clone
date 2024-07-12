<?php

namespace App\Http\Controllers;

use App\Mail\WelcomeEmail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    public function register(){

        return view('auth.register');
    }

    public function store(Request $request, User $user) {

        $validated = $request->validate([
            'name' => 'required|min:3|max:40|unique:users,name,'  . $user->id,
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:3|max:40|confirmed',
        ]);

        $user = User::create(
            [
                'name' => $validated['name'],
                'email' => $validated['email'],
                'password' => Hash::make($validated['password'])
            ]
        );

        Mail::to($user->email)->send(new WelcomeEmail($user));

        return redirect()->route('login')->with('success', 'You have registered successfully!');
    }

    public function login(){

        return view('auth.login');
    }

    public function authenticate(Request $request) {

        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:3|max:40',
        ]);

        if(auth()->attempt($validated)){
            $request->session()->regenerate();

            return redirect()->route('dashboard')->with('success', 'You have logged in successfully!');
        }

        return redirect()->route('dashboard')->withErrors([
            'email' => 'Invalid credentials'
        ]);
    }

    public function logout(Request $request) {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('dashboard')->with('success', 'You have logged out successfully!');
    }
}