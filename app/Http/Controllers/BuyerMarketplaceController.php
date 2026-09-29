<?php

namespace App\Http\Controllers;

use App\Models\HarvestListing;
use App\Models\Notification;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BuyerMarketplaceController extends Controller
{
    public function index(Request $request)
    {
        $buyerId = Auth::id();

        // Get available products
        $listings = HarvestListing::with('farmer')
            ->where('status', 'Available')
            ->where('quantity', '>', 0)
            ->latest()
            ->get();

        /*
        |--------------------------------------------------------------------------
        | Notifications
        |--------------------------------------------------------------------------
        */

        $notifications = Notification::where('user_id', $buyerId)
            ->latest()
            ->take(10)
            ->get();

        $notificationCount = Notification::where('user_id', $buyerId)
            ->whereNull('read_at')
            ->count();

        /*
        |--------------------------------------------------------------------------
        | Unread Messages
        |--------------------------------------------------------------------------
        */

        $unreadMessagesCount = Message::where('receiver_id', $buyerId)
            ->where('is_read', false)
            ->count();

        return view('buyer.marketplace', compact(
            'listings',
            'notifications',
            'notificationCount',
            'unreadMessagesCount'
        ));
    }
}