<?php

namespace App\Http\Controllers;

use App\Models\FarmerSetting;
use App\Models\Notification;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class FarmerSettingsController extends Controller
{
    /**
     * Display farmer settings.
     */
    public function index()
    {
        $farmerId = Auth::id();

        // Get or create settings for this farmer
        $settings = FarmerSetting::firstOrCreate(
            ['user_id' => $farmerId],
            [
                'new_order_alerts' => true,
                'direct_messages' => true,
                'weekly_sales_summaries' => false,
                'allow_farm_pickups' => true,
                'local_delivery' => false,
            ]
        );

        // Notifications
        $notifications = Notification::where('user_id', $farmerId)
            ->latest()
            ->take(10)
            ->get();

        // Unread notification count
        $notificationCount = Notification::where('user_id', $farmerId)
            ->whereNull('read_at')
            ->count();

        // Unread messages
        $unreadMessagesCount = Message::where('receiver_id', $farmerId)
            ->where('is_read', false)
            ->count();

        return view('farmer.settings', compact(
            'settings',
            'notifications',
            'notificationCount',
            'unreadMessagesCount'
        ));
    }

    /**
     * Update notification and fulfillment settings.
     */
    public function update(Request $request)
    {
        $farmerId = Auth::id();

        $settings = FarmerSetting::firstOrCreate(
            ['user_id' => $farmerId]
        );

        $settings->update([
            'new_order_alerts' => $request->boolean('new_order_alerts'),
            'direct_messages' => $request->boolean('direct_messages'),
            'weekly_sales_summaries' => $request->boolean('weekly_sales_summaries'),
            'allow_farm_pickups' => $request->boolean('allow_farm_pickups'),
            'local_delivery' => $request->boolean('local_delivery'),
        ]);

        return back()->with(
            'success',
            'Your settings have been saved successfully.'
        );
    }

    /**
     * Update farmer password.
     */
    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required'],
            'new_password' => [
                'required',
                'string',
                'min:8',
                'confirmed',
            ],
        ]);

        $user = Auth::user();

        // Check current password
        if (!Hash::check($request->current_password, $user->password)) {
            return back()
                ->withErrors([
                    'current_password' => 'Your current password is incorrect.'
                ])
                ->with('password_error', true);
        }

        // Update password
        $user->update([
            'password' => Hash::make($request->new_password),
        ]);

        return back()->with(
            'password_success',
            'Your password has been updated successfully.'
        );
    }
}