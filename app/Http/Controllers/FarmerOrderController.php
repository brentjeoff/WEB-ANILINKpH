<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Notification;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;

class FarmerOrderController extends Controller
{
    // =========================================================
    // ORDERS RECEIVED
    // =========================================================

    public function index()
    {
        $farmerId = Auth::id();

        // Get this farmer's orders
        $orders = Order::with([
            'buyer',
            'harvestListing'
        ])
            ->where('farmer_id', $farmerId)
            ->latest()
            ->get();


        // =====================================================
        // NOTIFICATIONS
        // =====================================================

        $notifications = Notification::where(
                'user_id',
                $farmerId
            )
            ->latest()
            ->take(10)
            ->get();


        // =====================================================
        // UNREAD NOTIFICATION COUNT
        // =====================================================

        $notificationCount = Notification::where(
                'user_id',
                $farmerId
            )
            ->whereNull('read_at')
            ->count();


        // =====================================================
        // UNREAD MESSAGES
        // =====================================================

        $unreadMessagesCount = Message::where(
                'receiver_id',
                $farmerId
            )
            ->where('is_read', false)
            ->count();


        return view(
            'farmer.orders-received',
            compact(
                'orders',
                'notifications',
                'notificationCount',
                'unreadMessagesCount'
            )
        );
    }


    // =========================================================
    // CONFIRM ORDER
    // =========================================================

    public function confirm(Order $order)
    {
        $this->checkFarmer($order);

        if ($order->status !== 'Pending') {
            return back()->with(
                'error',
                'This order cannot be confirmed.'
            );
        }

        $order->update([
            'status' => 'Confirmed'
        ]);


        Notification::create([
            'user_id' => $order->buyer_id,

            'title' => 'Order Confirmed',

            'message' =>
                'Your order has been confirmed by the farmer.',

            'icon' => 'check-circle',

            'type' => 'order',
        ]);


        return back()->with(
            'success',
            'Order confirmed successfully.'
        );
    }


    // =========================================================
    // MARK ORDER AS SHIPPED
    // =========================================================

    public function ship(Order $order)
    {
        $this->checkFarmer($order);

        if ($order->status !== 'Confirmed') {
            return back()->with(
                'error',
                'Only confirmed orders can be shipped.'
            );
        }

        $order->update([
            'status' => 'Shipped'
        ]);


        Notification::create([
            'user_id' => $order->buyer_id,

            'title' => 'Order Shipped',

            'message' =>
                'Your order has been shipped by the farmer.',

            'icon' => 'truck',

            'type' => 'order',
        ]);


        return back()->with(
            'success',
            'Order marked as shipped.'
        );
    }


    // =========================================================
    // MARK ORDER AS DELIVERED
    // =========================================================

    public function deliver(Order $order)
    {
        $this->checkFarmer($order);

        if ($order->status !== 'Shipped') {
            return back()->with(
                'error',
                'Only shipped orders can be delivered.'
            );
        }

        $order->update([
            'status' => 'Delivered'
        ]);


        Notification::create([
            'user_id' => $order->buyer_id,

            'title' => 'Order Delivered',

            'message' =>
                'Your order has been delivered successfully.',

            'icon' => 'package-check',

            'type' => 'order',
        ]);


        return back()->with(
            'success',
            'Order marked as delivered.'
        );
    }


    // =========================================================
    // CHECK FARMER OWNERSHIP
    // =========================================================

    private function checkFarmer(Order $order)
    {
        if ($order->farmer_id !== Auth::id()) {
            abort(403);
        }
    }
}