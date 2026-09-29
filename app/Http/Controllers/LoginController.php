<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // LOGIN
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {

            $request->session()->regenerate();

            $user = Auth::user();

            if ($user->role === 'admin') {
    return redirect()->route('admin.dashboard');
                }

            if ($user->role === 'farmer') {
    return redirect()->route('farmer.dashboard');
                    }

            if ($user->role === 'buyer') {
    return redirect()->route('buyer.dashboard');
                }

    return back()->withErrors([
    'email' => 'Invalid user role.',
]); 
        }

        return back()->withErrors([
            'email' => 'Invalid email or password.'
        ]);
    }


    // REGISTER
    public function register(Request $request)
    {
        // Validate registration form
        $request->validate([
            'role' => 'required|in:farmer,buyer',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:11|unique:users,phone',
            'password' => 'required|min:6|confirmed',
        ]);


        // Create user
        $user = User::create([
            'role' => $request->role,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'address' => $request->address,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),

            // Only save farm information for farmers
            'farm_name' => $request->role === 'farmer'
                ? $request->farm_name
                : null,

            'farm_location' => $request->role === 'farmer'
                ? $request->farm_location
                : null,
        ]);


        // After registration
        return redirect('/login')->with(
            'success',
            'Account created successfully!'
        );
    }


    // LOGOUT
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}

