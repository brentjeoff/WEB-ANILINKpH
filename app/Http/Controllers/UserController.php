<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'role' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'password_confirmation' => 'required|same:password',
            'address' => 'required',
            'phone' => 'required|numeric|digits:11|unique:users,phone',
             'farm_name' => 'required_if:role,farmer|nullable|string|max:255',
            'farm_location' => 'required_if:role,farmer|nullable|string|max:255',
            
        ]);

        User::create([
            'role' => $request->role,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'address' => $request->address,
            'phone' => $request->phone,

            // Save farmer information only for farmers
            'farm_name' => $request->role === 'farmer'
                ? $request->farm_name
                : null,

            'farm_location' => $request->role === 'farmer'
                ? $request->farm_location
                : null,
        ]);

        return redirect('/login')->with(
            'success',
            'User account created successfully!'
        );
    }           
}
