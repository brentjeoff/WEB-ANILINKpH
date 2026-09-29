<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Admin Dashboard
    |--------------------------------------------------------------------------
    */

    public function dashboard()
    {
        $totalUsers = User::count();

        $totalFarmers = User::where('role', 'farmer')->count();

        $totalBuyers = User::where('role', 'buyer')->count();

        $totalAdmins = User::where('role', 'admin')->count();

        return view('admin.dashboard', compact(
            'totalUsers',
            'totalFarmers',
            'totalBuyers',
            'totalAdmins'
        ));
    }


    /*
    |--------------------------------------------------------------------------
    | User Management
    |--------------------------------------------------------------------------
    */

    public function users(Request $request)
    {
        $query = User::query();

        // Search
        if ($request->filled('search')) {

            $search = $request->search;

            $query->where(function ($q) use ($search) {

                $q->where('first_name', 'like', "%{$search}%")
                    ->orWhere('last_name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%")
                    ->orWhere('phone', 'like', "%{$search}%");

            });
        }

        // Filter by role
        if ($request->filled('role')) {
            $query->where('role', $request->role);
        }

        $users = $query
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('admin.users', compact('users'));
    }


    /*
    |--------------------------------------------------------------------------
    | Edit User
    |--------------------------------------------------------------------------
    */

    public function editUser($id)
    {
        $user = User::findOrFail($id);

        return view('admin.edit-user', compact('user'));
    }


    /*
    |--------------------------------------------------------------------------
    | Update User
    |--------------------------------------------------------------------------
    */

    public function updateUser(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $validated = $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'unique:users,email,' . $user->id],
            'phone' => ['required', 'digits:11', 'unique:users,phone,' . $user->id],
            'address' => ['required', 'string', 'max:500'],
            'role' => ['required', 'in:buyer,farmer,admin'],
        ]);

        $user->update($validated);

        return redirect()
            ->route('admin.users')
            ->with('success', 'User updated successfully.');
    }


    /*
    |--------------------------------------------------------------------------
    | Delete User
    |--------------------------------------------------------------------------
    */

    public function deleteUser($id)
    {
        $user = User::findOrFail($id);

        // Prevent deleting yourself
        if ($user->id === auth()->id()) {
            return redirect()
                ->route('admin.users')
                ->with('error', 'You cannot delete your own admin account.');
        }

        $user->delete();

        return redirect()
            ->route('admin.users')
            ->with('success', 'User deleted successfully.');
    }
}