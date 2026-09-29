<?php

namespace App\Http\Controllers;

use App\Models\HarvestListing;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class HarvestListingController extends Controller
{
    // =========================================================
    // SELL HARVEST PAGE
    // =========================================================
    public function create()
    {
        $farmerId = Auth::id();

        $notifications = Notification::where('user_id', $farmerId)
            ->latest()
            ->take(10)
            ->get();

        $notificationCount = Notification::where('user_id', $farmerId)
            ->whereNull('read_at')
            ->count();

        return view('farmer.sell-harvest', compact(
            'notifications',
            'notificationCount'
        ));
    }

    // =========================================================
    // STORE HARVEST
    // =========================================================
    public function store(Request $request)
    {
        // =====================================================
        // SAVE AS DRAFT
        // =====================================================
        if ($request->has('save_draft')) {

            $request->validate([
                'product_name' => 'nullable|string|max:255',
                'category' => 'nullable|string|max:100',
                'farming_method' => 'nullable|string|max:100',
                'description' => 'nullable|string|max:1000',
                'price' => 'nullable|numeric|min:0',
                'quantity' => 'nullable|integer|min:0',
                'unit' => 'nullable|string|max:50',
                'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
            ]);

            $imagePath = null;

            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')
                    ->store('harvest-images', 'public');
            }

            HarvestListing::create([
                'farmer_id' => Auth::id(),
                'product_name' => $request->product_name ?: 'Untitled Harvest',
                'category' => $request->category,
                'farming_method' => $request->farming_method,
                'description' => $request->description,
                'price' => $request->price ?? 0,
                'quantity' => $request->quantity ?? 0,
                'unit' => $request->unit,
                'image' => $imagePath,
                'farm_pickup' => $request->boolean('farm_pickup'),
                'local_delivery' => $request->boolean('local_delivery'),
                'status' => 'Draft',
            ]);

            return redirect()
                ->route('farmer.my-listings')
                ->with(
                    'success',
                    'Harvest saved as draft successfully!'
                );
        }

        // =====================================================
        // PUBLISH HARVEST
        // =====================================================
        $request->validate([
            'product_name' => 'required|string|max:255',
            'category' => 'required|string|max:100',
            'farming_method' => 'nullable|string|max:100',
            'description' => 'nullable|string|max:1000',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:1',
            'unit' => 'required|string|max:50',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
        ]);

        $imagePath = null;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')
                ->store('harvest-images', 'public');
        }

        HarvestListing::create([
            'farmer_id' => Auth::id(),
            'product_name' => $request->product_name,
            'category' => $request->category,
            'farming_method' => $request->farming_method,
            'description' => $request->description,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'unit' => $request->unit,
            'image' => $imagePath,
            'farm_pickup' => $request->boolean('farm_pickup'),
            'local_delivery' => $request->boolean('local_delivery'),
            'status' => 'Available',
        ]);

        return redirect()
            ->route('farmer.my-listings')
            ->with(
                'success',
                'Harvest listing published successfully!'
            );
    }

    // =========================================================
    // MY LISTINGS
    // =========================================================
    public function index()
    {
        $farmerId = Auth::id();

        $listings = HarvestListing::where('farmer_id', $farmerId)
            ->latest()
            ->get();

        $notifications = Notification::where('user_id', $farmerId)
            ->latest()
            ->take(10)
            ->get();

        $notificationCount = Notification::where('user_id', $farmerId)
            ->whereNull('read_at')
            ->count();

        return view(
            'farmer.my-listing',
            compact(
                'listings',
                'notifications',
                'notificationCount'
            )
        );
    }

    // =========================================================
    // EDIT LISTING
    // =========================================================
    public function edit($id)
    {
        $listing = HarvestListing::where('id', $id)
            ->where('farmer_id', Auth::id())
            ->firstOrFail();

        return view(
            'farmer.edit-listing',
            compact('listing')
        );
    }

    // =========================================================
    // UPDATE LISTING
    // =========================================================
    public function update(Request $request, $id)
    {
        $listing = HarvestListing::where('id', $id)
            ->where('farmer_id', Auth::id())
            ->firstOrFail();

        $request->validate([
            'product_name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'farming_method' => 'nullable|string|max:255',
            'description' => 'nullable|string|max:1000',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:0',
            'unit' => 'required|string|max:50',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
        ]);

        $data = [
            'product_name' => $request->product_name,
            'category' => $request->category,
            'farming_method' => $request->farming_method,
            'description' => $request->description,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'unit' => $request->unit,
            'farm_pickup' => $request->boolean('farm_pickup'),
            'local_delivery' => $request->boolean('local_delivery'),
        ];

        // =====================================================
        // REPLACE IMAGE
        // =====================================================
        if ($request->hasFile('image')) {

            if ($listing->image) {
                Storage::disk('public')->delete($listing->image);
            }

            $data['image'] = $request->file('image')
                ->store('harvest-images', 'public');
        }

        // =====================================================
        // UPDATE STATUS
        // =====================================================
        if ($listing->status === 'Draft') {
            $data['status'] = 'Draft';
        } else {
            $data['status'] = 'Available';
        }

        $listing->update($data);

        return redirect()
            ->route('farmer.my-listings')
            ->with(
                'success',
                'Listing updated successfully!'
            );
    }

    // =========================================================
    // DELETE LISTING
    // =========================================================
    public function destroy($id)
    {
        $listing = HarvestListing::where('id', $id)
            ->where('farmer_id', Auth::id())
            ->firstOrFail();

        if ($listing->image) {
            Storage::disk('public')
                ->delete($listing->image);
        }

        $listing->delete();

        return redirect()
            ->route('farmer.my-listings')
            ->with(
                'success',
                'Listing deleted successfully!'
            );
    }

    // =========================================================
    // RESTOCK
    // =========================================================
    public function restock(Request $request, $id)
    {
        $listing = HarvestListing::where('id', $id)
            ->where('farmer_id', Auth::id())
            ->firstOrFail();

        $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);

        $listing->quantity += (int) $request->quantity;

        $listing->status = 'Available';

        $listing->save();

        return redirect()
            ->route('farmer.my-listings')
            ->with(
                'success',
                'Listing restocked successfully!'
            );
    }
}