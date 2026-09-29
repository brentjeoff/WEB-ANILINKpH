<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Order;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    /**
     * Store a review from a buyer.
     */
    public function store(Request $request, Order $order)
    {
        $buyerId = Auth::id();

        // Make sure the order belongs to the logged-in buyer
        if ($order->buyer_id !== $buyerId) {
            abort(403);
        }

        // Only delivered orders can be reviewed
        if ($order->status !== 'Delivered') {
            return back()->with(
                'error',
                'Only delivered orders can be reviewed.'
            );
        }

        // Prevent duplicate reviews
        if (Review::where('order_id', $order->id)->exists()) {
            return back()->with(
                'error',
                'You have already reviewed this order.'
            );
        }

        $request->validate([
            'rating' => [
                'required',
                'integer',
                'min:1',
                'max:5'
            ],

            'comment' => [
                'nullable',
                'string',
                'max:1000'
            ],
        ]);

        $review = Review::create([
            'buyer_id' => $buyerId,
            'farmer_id' => $order->farmer_id,
            'order_id' => $order->id,
            'harvest_listing_id' => $order->harvest_listing_id,
            'rating' => $request->rating,
            'comment' => $request->comment,
        ]);

        // Notify farmer
        Notification::create([
            'user_id' => $order->farmer_id,
            'title' => 'New Customer Review',
            'message' =>
                'A buyer left you a ' .
                $request->rating .
                '-star review.',
            'icon' => 'star',
            'type' => 'review',
        ]);

        return back()->with(
            'success',
            'Thank you! Your review has been submitted.'
        );
    }

    /**
     * Display farmer's customer reviews.
     */
    public function farmerReviews()
    {
        $farmerId = Auth::id();

        $reviews = Review::with([
            'buyer',
            'listing',
            'order'
        ])
            ->where('farmer_id', $farmerId)
            ->latest()
            ->get();

        $totalReviews = $reviews->count();

        $averageRating = $totalReviews > 0
            ? $reviews->avg('rating')
            : 0;

        return view(
            'farmer.reviews',
            compact(
                'reviews',
                'totalReviews',
                'averageRating'
            )
        );
    }
}