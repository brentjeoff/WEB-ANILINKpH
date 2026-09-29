<?php

namespace App\Http\Controllers;

use App\Models\HarvestListing;
use App\Models\Order;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BuyerOrderController extends Controller
{
    public function showProduct($id)
    {
        $listing = HarvestListing::with('farmer')
            ->where('id', $id)
            ->where('status', 'Available')
            ->where('quantity', '>', 0)
            ->firstOrFail();

        return view('buyer.product-details', compact('listing'));
    }

    public function store(Request $request, $id)
    {
        $request->validate([
            'quantity' => [
                'required',
                'integer',
                'min:1',
            ],
            'fulfillment_method' => [
                'required',
                'in:Farm Pickup,Local Delivery',
            ],
        ]);

        $order = DB::transaction(function () use ($request, $id) {

            $listing = HarvestListing::with('farmer')
                ->where('id', $id)
                ->lockForUpdate()
                ->firstOrFail();

            if (
                $listing->status !== 'Available' ||
                $listing->quantity <= 0
            ) {
                abort(400, 'This product is no longer available.');
            }

            if ($request->quantity > $listing->quantity) {
                abort(
                    400,
                    'Only ' . $listing->quantity . ' ' .
                    $listing->unit . ' available.'
                );
            }

            if (
                $request->fulfillment_method === 'Farm Pickup' &&
                !$listing->farm_pickup
            ) {
                abort(
                    400,
                    'Farm Pickup is not available for this product.'
                );
            }

            if (
                $request->fulfillment_method === 'Local Delivery' &&
                !$listing->local_delivery
            ) {
                abort(
                    400,
                    'Local Delivery is not available for this product.'
                );
            }

            $quantity = (int) $request->quantity;
            $unitPrice = (float) $listing->price;
            $totalPrice = $unitPrice * $quantity;

            // Generate unique order number
            do {
                $orderNumber = 'AN-' . strtoupper(Str::random(8));
            } while (
                Order::where('order_number', $orderNumber)->exists()
            );

            // Create order
            $order = Order::create([
                'buyer_id' => Auth::id(),
                'farmer_id' => $listing->farmer_id,
                'harvest_listing_id' => $listing->id,
                'order_number' => $orderNumber,
                'quantity' => $quantity,
                'unit_price' => $unitPrice,
                'total_price' => $totalPrice,
                'fulfillment_method' => $request->fulfillment_method,
                'status' => 'Pending',
            ]);

            // Reduce available quantity
            $listing->quantity -= $quantity;

            if ($listing->quantity <= 0) {
                $listing->quantity = 0;
            }

            $listing->save();

            /*
            |--------------------------------------------------------------------------
            | NOTIFY FARMER
            |--------------------------------------------------------------------------
            */

            Notification::create([
                'user_id' => $order->farmer_id,
                'title' => 'New Order Received',
                'message' => 'You received a new order for '
                    . $listing->product_name
                    . ' from a buyer.',
                'icon' => 'shopping-bag',
                'type' => 'order',
            ]);

            /*
            |--------------------------------------------------------------------------
            | NOTIFY BUYER
            |--------------------------------------------------------------------------
            */

            Notification::create([
                'user_id' => $order->buyer_id,
                'title' => 'Order Placed',
                'message' => 'Your order for '
                    . $listing->product_name
                    . ' has been placed successfully.',
                'icon' => 'shopping-cart',
                'type' => 'order',
            ]);

            return $order;
        });

        return redirect('/buyer/my-orders')
            ->with(
                'success',
                'Order ' . $order->order_number . ' placed successfully!'
            );
    }

    // =========================
    // BUYER MY ORDERS
    // =========================

    public function myOrders()
    {
        $orders = Order::with([
            'farmer',
            'harvestListing'
        ])
        ->where('buyer_id', Auth::id())
        ->latest()
        ->get();

        return view('buyer.my-orders', compact('orders'));
    }
}