<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Notification;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FarmerSalesController extends Controller
{
    public function index()
    {
        $farmerId = Auth::id();

        // Delivered orders
        $deliveredOrders = Order::where('farmer_id', $farmerId)
            ->where('status', 'Delivered')
            ->with('harvestListing')
            ->latest()
            ->get();

        // Total sales
        $totalSales = Order::where('farmer_id', $farmerId)
            ->where('status', 'Delivered')
            ->sum('total_price');

        // Current month's earnings
        $monthlyEarnings = Order::where('farmer_id', $farmerId)
            ->where('status', 'Delivered')
            ->whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->sum('total_price');

        // Orders that are still being processed
        $pendingBalance = Order::where('farmer_id', $farmerId)
            ->whereIn('status', [
                'Pending',
                'Confirmed',
                'Shipped'
            ])
            ->sum('total_price');

        // For now, available balance is total delivered sales.
        $availableBalance = $totalSales;

        // Transactions
        $transactions = $deliveredOrders->map(function ($order) {
            return [
                'date' => $order->created_at,
                'transaction_id' => $order->order_number
                    ?? 'ORD-' . $order->id,
                'type' => 'Sale',
                'payment_method' => $order->fulfillment_method
                    ?? 'Order Payment',
                'amount' => (float) $order->total_price,
                'status' => 'Completed',
                'product' => $order->harvestListing->product_name
                    ?? 'Product',
                'quantity' => $order->quantity,
            ];
        });

        // Notifications
        $notifications = Notification::where('user_id', $farmerId)
            ->latest()
            ->take(10)
            ->get();

        // Unread notification count
        $notificationCount = Notification::where('user_id', $farmerId)
            ->whereNull('read_at')
            ->count();

        // Unread messages count
        $unreadMessagesCount = Message::where(
                'receiver_id',
                $farmerId
            )
            ->where('is_read', false)
            ->count();

        return view(
            'farmer.sell-and-earnings',
            compact(
                'totalSales',
                'monthlyEarnings',
                'availableBalance',
                'pendingBalance',
                'transactions',
                'notifications',
                'notificationCount',
                'unreadMessagesCount'
            )
        );
    }

    public function requestPayout(Request $request)
    {
        $request->validate([
            'amount' => [
                'required',
                'numeric',
                'min:1'
            ],

            'payment_method' => [
                'required',
                'in:GCash,Bank Transfer'
            ],

            'account_name' => [
                'required',
                'string',
                'max:255'
            ],

            'account_number' => [
                'required',
                'string',
                'max:100'
            ],
        ]);

        $farmerId = Auth::id();

        // Check available balance
        $availableBalance = Order::where('farmer_id', $farmerId)
            ->where('status', 'Delivered')
            ->sum('total_price');

        if ($request->amount > $availableBalance) {
            return back()->with(
                'error',
                'The requested payout amount is greater than your available balance.'
            );
        }

        // Create notification
        Notification::create([
            'user_id' => $farmerId,
            'title' => 'Payout Request Submitted',
            'message' =>
                'Your payout request of ₱' .
                number_format($request->amount, 2) .
                ' via ' .
                $request->payment_method .
                ' has been submitted.',
            'icon' => 'wallet',
            'type' => 'payout',
        ]);

        return back()->with(
            'success',
            'Your payout request has been submitted successfully.'
        );
    }

    public function downloadReport()
    {
        $farmerId = Auth::id();

        $orders = Order::where('farmer_id', $farmerId)
            ->where('status', 'Delivered')
            ->with('harvestListing')
            ->latest()
            ->get();

        $filename =
            'anilink-sales-report-' .
            now()->format('Y-m-d') .
            '.csv';

        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' =>
                'attachment; filename="' .
                $filename .
                '"',
        ];

        return response()->stream(
            function () use ($orders) {

                $handle = fopen('php://output', 'w');

                fputcsv($handle, [
                    'Date',
                    'Transaction ID',
                    'Product',
                    'Quantity',
                    'Unit Price',
                    'Total Price',
                    'Status',
                ]);

                foreach ($orders as $order) {

                    fputcsv($handle, [
                        $order->created_at
                            ? $order->created_at->format('Y-m-d')
                            : '',
                        $order->order_number
                            ?? 'ORD-' . $order->id,
                        $order->harvestListing->product_name
                            ?? 'Product',
                        $order->quantity,
                        $order->unit_price,
                        $order->total_price,
                        $order->status,
                    ]);
                }

                fclose($handle);
            },
            200,
            $headers
        );
    }
}