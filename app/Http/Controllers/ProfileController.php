<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\HarvestListing;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    // ==========================================
    // FARMER PROFILE
    // ==========================================

    public function farmerProfile()
    {
        $farmer = Auth::user();

        // Farmer statistics
        $activeListings = HarvestListing::where('farmer_id', $farmer->id)
            ->where('quantity', '>', 0)
            ->where('status', 'Available')
            ->count();

        $totalProducts = HarvestListing::where('farmer_id', $farmer->id)
            ->count();

        $completedOrders = Order::where('farmer_id', $farmer->id)
            ->where('status', 'Delivered')
            ->count();

        // Customer reviews received by this farmer
        $customerReviews = Review::where('farmer_id', $farmer->id)
            ->count();

        return view('farmer.profile', compact(
            'activeListings',
            'totalProducts',
            'completedOrders',
            'customerReviews'
        ));
    }


    // ==========================================
    // BUYER PROFILE
    // ==========================================

    public function buyerProfile()
{
    $user = Auth::user();

    $notifications = \App\Models\Notification::where('user_id', $user->id)
        ->latest()
        ->take(10)
        ->get();

    $notificationCount = \App\Models\Notification::where('user_id', $user->id)
        ->whereNull('read_at')
        ->count();

    return view('buyer.profile', compact(
        'user',
        'notifications',
        'notificationCount'
    ));
}


    // ==========================================
    // UPDATE BUYER PROFILE
    // ==========================================

    public function buyerUpdate(Request $request)
    {
        $user = Auth::user();

        $validated = $request->validate([
            'first_name' => [
                'required',
                'string',
                'max:255'
            ],

            'last_name' => [
                'required',
                'string',
                'max:255'
            ],

            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('users', 'email')->ignore($user->id),
            ],

            'phone' => [
                'required',
                'string',
                'max:20',
                Rule::unique('users', 'phone')->ignore($user->id),
            ],

            'address' => [
                'nullable',
                'string',
                'max:500'
            ],
        ]);

        $user->update($validated);

        return back()->with(
            'success',
            'Profile updated successfully.'
        );
    }


    // ==========================================
    // LOGOUT
    // ==========================================

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}