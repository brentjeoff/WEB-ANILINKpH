<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use App\Models\HarvestListing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    public function toggle(Request $request, $listingId)
    {
        $listing = HarvestListing::findOrFail($listingId);

        $favorite = Favorite::where('user_id', Auth::id())
            ->where('harvest_listing_id', $listing->id)
            ->first();

        if ($favorite) {
            $favorite->delete();

            return response()->json([
                'success' => true,
                'favorited' => false,
                'message' => 'Removed from favorites.',
            ]);
        }

        Favorite::create([
            'user_id' => Auth::id(),
            'harvest_listing_id' => $listing->id,
        ]);

        return response()->json([
            'success' => true,
            'favorited' => true,
            'message' => 'Added to favorites.',
        ]);
    }

    public function index()
    {
        $favorites = Favorite::with([
            'harvestListing.farmer'
        ])
        ->where('user_id', Auth::id())
        ->latest()
        ->get();

        return view('buyer.favorites', compact('favorites'));
    }

    public function clear()
    {
        Favorite::where('user_id', Auth::id())->delete();

        return response()->json([
            'success' => true,
            'message' => 'All favorites cleared.',
        ]);
    }
}