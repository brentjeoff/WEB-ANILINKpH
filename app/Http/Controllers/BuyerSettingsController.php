<?php

namespace App\Http\Controllers;

use App\Models\BuyerSetting;
use App\Models\Notification;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class BuyerSettingsController extends Controller
{
    public function index()
    {
        $buyerId = Auth::id();

        $settings = BuyerSetting::firstOrCreate([
            'user_id' => $buyerId,
        ]);

        $notifications = Notification::where('user_id', $buyerId)
            ->latest()
            ->take(10)
            ->get();

        $notificationCount = Notification::where('user_id', $buyerId)
            ->whereNull('read_at')
            ->count();

        $unreadMessagesCount = Message::where('receiver_id', $buyerId)
            ->where('is_read', false)
            ->count();

        return view('buyer.settings', compact(
            'settings',
            'notifications',
            'notificationCount',
            'unreadMessagesCount'
        ));
    }

    public function updateNotifications(Request $request)
    {
        $settings = BuyerSetting::firstOrCreate([
            'user_id' => Auth::id(),
        ]);

        $settings->update([
            'order_updates' => $request->boolean('order_updates'),
            'messages' => $request->boolean('messages'),
            'marketplace_updates' => $request->boolean('marketplace_updates'),
        ]);

        return back()->with(
            'success',
            'Notification preferences saved successfully.'
        );
    }

    public function updatePreferences(Request $request)
    {
        $request->validate([
            'default_fulfillment_method' => [
                'nullable',
                'in:Farm Pickup,Local Delivery'
            ],
        ]);

        $settings = BuyerSetting::firstOrCreate([
            'user_id' => Auth::id(),
        ]);

        $settings->update([
            'default_fulfillment_method' =>
                $request->default_fulfillment_method,
        ]);

        return back()->with(
            'success',
            'Shopping preferences saved successfully.'
        );
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required'],
            'password' => ['required', 'min:8', 'confirmed'],
        ]);

        $user = Auth::user();

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors([
                'current_password' => 'The current password is incorrect.',
            ]);
        }

        $user->update([
            'password' => Hash::make($request->password),
        ]);

        return back()->with(
            'success',
            'Password updated successfully.'
        );
    }
}