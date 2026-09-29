<?php

namespace App\Http\Controllers;

use App\Models\HarvestListing;
use App\Models\Order;
use App\Models\Message;
use App\Models\Notification;
use Illuminate\Support\Facades\Auth;

class FarmerDashboardController extends Controller
{
    public function index()
    {
        $farmer = Auth::user();

        // =========================
        // ACTIVE LISTINGS
        // =========================

        $activeListings = HarvestListing::where('farmer_id', $farmer->id)
            ->where('status', 'Available')
            ->where('quantity', '>', 0)
            ->count();


        // =========================
        // LOW STOCK
        // =========================

        $lowStock = HarvestListing::where('farmer_id', $farmer->id)
            ->where('quantity', '>', 0)
            ->where('quantity', '<=', 5)
            ->latest()
            ->take(4)
            ->get();


        // =========================
        // RECENT ORDERS
        // =========================

        $recentOrders = Order::with([
            'buyer',
            'harvestListing'
        ])
            ->where('farmer_id', $farmer->id)
            ->latest()
            ->take(5)
            ->get();


        // =========================
        // TOTAL ORDERS RECEIVED
        // =========================

        $ordersReceived = Order::where('farmer_id', $farmer->id)
            ->count();


        // =========================
        // TOTAL SALES
        // =========================

        $totalSales = Order::where('farmer_id', $farmer->id)
            ->where('status', 'Delivered')
            ->sum('total_price');


        // =========================
        // MONTHLY EARNINGS
        // =========================

        $monthlyEarnings = Order::where('farmer_id', $farmer->id)
            ->where('status', 'Delivered')
            ->whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->sum('total_price');


        // =========================
        // RECENT MESSAGES
        // =========================

        $recentMessages = Message::with('sender')
            ->where('receiver_id', $farmer->id)
            ->latest()
            ->take(5)
            ->get();


        // =========================
        // FARMER NOTIFICATIONS
        // =========================

        $notifications = Notification::where('user_id', $farmer->id)
            ->latest()
            ->take(10)
            ->get();


        // =========================
        // UNREAD NOTIFICATION COUNT
        // =========================

        $notificationCount = Notification::where('user_id', $farmer->id)
            ->whereNull('read_at')
            ->count();


        // =========================
        // UNREAD MESSAGE COUNT
        // =========================

        $unreadMessagesCount = Message::where('receiver_id', $farmer->id)
            ->where('is_read', false)
            ->count();


        return view('farmer.dashboard', compact(
            'activeListings',
            'lowStock',
            'recentOrders',
            'ordersReceived',
            'totalSales',
            'monthlyEarnings',
            'recentMessages',
            'notifications',
            'notificationCount',
            'unreadMessagesCount'
        ));
    }
}