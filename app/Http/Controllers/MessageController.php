<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use App\Models\Notification;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | FARMER MESSAGES
    |--------------------------------------------------------------------------
    */
    public function farmerMessages(Request $request)
    {
        $farmerId = Auth::id();

        // Get all buyers who have conversations with this farmer
        $conversationIds = Message::where(function ($query) use ($farmerId) {
                $query->where('sender_id', $farmerId)
                    ->orWhere('receiver_id', $farmerId);
            })
            ->get()
            ->map(function ($message) use ($farmerId) {
                return $message->sender_id == $farmerId
                    ? $message->receiver_id
                    : $message->sender_id;
            })
            ->unique()
            ->values();

        $conversations = User::whereIn('id', $conversationIds)
            ->where('role', 'buyer')
            ->get();

        // Selected buyer
        $selectedUser = null;
        $messages = collect();

        if ($request->filled('user')) {

            $selectedUser = User::where('id', $request->user)
                ->where('role', 'buyer')
                ->first();

            if ($selectedUser) {

                $messages = Message::where(function ($query) use ($farmerId, $selectedUser) {
                        $query->where('sender_id', $farmerId)
                            ->where('receiver_id', $selectedUser->id);
                    })
                    ->orWhere(function ($query) use ($farmerId, $selectedUser) {
                        $query->where('sender_id', $selectedUser->id)
                            ->where('receiver_id', $farmerId);
                    })
                    ->orderBy('created_at', 'asc')
                    ->get();

                // Mark buyer's messages as read
                Message::where('sender_id', $selectedUser->id)
                    ->where('receiver_id', $farmerId)
                    ->where('is_read', false)
                    ->update([
                        'is_read' => true
                    ]);
            }
        }

        /*
        |--------------------------------------------------------------------------
        | NOTIFICATIONS
        |--------------------------------------------------------------------------
        */

        $notifications = Notification::where('user_id', $farmerId)
            ->latest()
            ->take(10)
            ->get();

        $notificationCount = Notification::where('user_id', $farmerId)
            ->whereNull('read_at')
            ->count();

        /*
        |--------------------------------------------------------------------------
        | UNREAD MESSAGES
        |--------------------------------------------------------------------------
        */

        $unreadMessagesCount = Message::where('receiver_id', $farmerId)
            ->where('is_read', false)
            ->count();

        return view('farmer.messages', compact(
            'conversations',
            'selectedUser',
            'messages',
            'notifications',
            'notificationCount',
            'unreadMessagesCount'
        ));
    }


    /*
    |--------------------------------------------------------------------------
    | FARMER SEND MESSAGE
    |--------------------------------------------------------------------------
    */

    public function send(Request $request)
    {
        $request->validate([
            'receiver_id' => ['required', 'exists:users,id'],
            'message' => ['required', 'string', 'max:2000'],
        ]);

        $farmerId = Auth::id();

        $receiver = User::findOrFail($request->receiver_id);

        // Make sure farmer is only messaging a buyer
        if ($receiver->role !== 'buyer') {
            abort(403);
        }

        Message::create([
            'sender_id' => $farmerId,
            'receiver_id' => $receiver->id,
            'message' => $request->message,
            'is_read' => false,
        ]);

        // Create notification for buyer
        Notification::create([
            'user_id' => $receiver->id,
            'title' => 'New Message',
            'message' => Auth::user()->first_name . ' ' .
                         Auth::user()->last_name .
                         ' sent you a message.',
            'icon' => 'message-square',
            'type' => 'message',
        ]);

        return redirect()
            ->route('farmer.messages', ['user' => $receiver->id])
            ->with('success', 'Message sent successfully.');
    }


    /*
    |--------------------------------------------------------------------------
    | BUYER MESSAGES
    |--------------------------------------------------------------------------
    */

    public function buyerMessages(Request $request)
    {
        $buyerId = Auth::id();

        $conversationIds = Message::where(function ($query) use ($buyerId) {
                $query->where('sender_id', $buyerId)
                    ->orWhere('receiver_id', $buyerId);
            })
            ->get()
            ->map(function ($message) use ($buyerId) {
                return $message->sender_id == $buyerId
                    ? $message->receiver_id
                    : $message->sender_id;
            })
            ->unique()
            ->values();

        $conversations = User::whereIn('id', $conversationIds)
            ->where('role', 'farmer')
            ->get();

        $selectedUser = null;
        $messages = collect();

        if ($request->filled('user')) {

            $selectedUser = User::where('id', $request->user)
                ->where('role', 'farmer')
                ->first();

            if ($selectedUser) {

                $messages = Message::where(function ($query) use ($buyerId, $selectedUser) {
                        $query->where('sender_id', $buyerId)
                            ->where('receiver_id', $selectedUser->id);
                    })
                    ->orWhere(function ($query) use ($buyerId, $selectedUser) {
                        $query->where('sender_id', $selectedUser->id)
                            ->where('receiver_id', $buyerId);
                    })
                    ->orderBy('created_at', 'asc')
                    ->get();

                // Mark farmer messages as read
                Message::where('sender_id', $selectedUser->id)
                    ->where('receiver_id', $buyerId)
                    ->where('is_read', false)
                    ->update([
                        'is_read' => true
                    ]);
            }
        }

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

        return view('buyer.messages', compact(
            'conversations',
            'selectedUser',
            'messages',
            'notifications',
            'notificationCount',
            'unreadMessagesCount'
        ));
    }


    /*
    |--------------------------------------------------------------------------
    | BUYER SEND MESSAGE
    |--------------------------------------------------------------------------
    */

    public function buyerSend(Request $request)
    {
        $request->validate([
            'receiver_id' => ['required', 'exists:users,id'],
            'message' => ['required', 'string', 'max:2000'],
        ]);

        $buyerId = Auth::id();

        $receiver = User::findOrFail($request->receiver_id);

        if ($receiver->role !== 'farmer') {
            abort(403);
        }

        Message::create([
            'sender_id' => $buyerId,
            'receiver_id' => $receiver->id,
            'message' => $request->message,
            'is_read' => false,
        ]);

        Notification::create([
            'user_id' => $receiver->id,
            'title' => 'New Message',
            'message' => Auth::user()->first_name . ' ' .
                         Auth::user()->last_name .
                         ' sent you a message.',
            'icon' => 'message-square',
            'type' => 'message',
        ]);

        return redirect()
            ->route('buyer.messages', ['user' => $receiver->id])
            ->with('success', 'Message sent successfully.');
    }
}