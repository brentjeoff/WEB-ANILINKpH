<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\HarvestListing;
use App\Models\Notification;
use Illuminate\Support\Facades\Auth;

class BuyerDashboardController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | BUYER DASHBOARD
    |--------------------------------------------------------------------------
    */

    public function index()
    {
        $buyerId = Auth::id();

        /*
        |--------------------------------------------------------------------------
        | AVAILABLE HARVESTS
        |--------------------------------------------------------------------------
        */

        $listings = HarvestListing::with('farmer')
            ->where('status', 'Available')
            ->where('quantity', '>', 0)
            ->latest()
            ->get();


        /*
        |--------------------------------------------------------------------------
        | BUYER ORDERS
        |--------------------------------------------------------------------------
        */

        $orders = Order::with([
            'harvestListing',
            'farmer'
        ])
        ->where('buyer_id', $buyerId)
        ->latest()
        ->get();


        /*
        |--------------------------------------------------------------------------
        | BUYER NOTIFICATIONS
        |--------------------------------------------------------------------------
        */

        $notifications = Notification::where('user_id', $buyerId)
            ->latest()
            ->get();


        /*
        |--------------------------------------------------------------------------
        | UNREAD NOTIFICATION COUNT
        |--------------------------------------------------------------------------
        */

        $notificationCount = Notification::where('user_id', $buyerId)
            ->whereNull('read_at')
            ->count();


        /*
        |--------------------------------------------------------------------------
        | RETURN DASHBOARD
        |--------------------------------------------------------------------------
        */

        return view('buyer.dashboard', compact(
            'listings',
            'orders',
            'notifications',
            'notificationCount'
        ));
    }


    /*
    |--------------------------------------------------------------------------
    | MARK ONE NOTIFICATION AS READ
    |--------------------------------------------------------------------------
    */

    public function markNotificationAsRead(Notification $notification)
    {
        /*
        | Make sure the notification belongs
        | to the currently logged-in buyer.
        */

        if ($notification->user_id !== Auth::id()) {

            return response()->json([
                'success' => false,
                'message' => 'Unauthorized.'
            ], 403);
        }


        /*
        | Only update if currently unread.
        */

        if (is_null($notification->read_at)) {

            $notification->update([
                'read_at' => now()
            ]);
        }


        /*
        | Get remaining unread notifications.
        */

        $unreadCount = Notification::where(
            'user_id',
            Auth::id()
        )
        ->whereNull('read_at')
        ->count();


        return response()->json([
            'success' => true,
            'unreadCount' => $unreadCount
        ]);
    }


    /*
    |--------------------------------------------------------------------------
    | MARK ALL NOTIFICATIONS AS READ
    |--------------------------------------------------------------------------
    */

    public function markAllNotificationsAsRead()
    {
        Notification::where('user_id', Auth::id())
            ->whereNull('read_at')
            ->update([
                'read_at' => now()
            ]);


        return response()->json([
            'success' => true,
            'unreadCount' => 0
        ]);
    }
}