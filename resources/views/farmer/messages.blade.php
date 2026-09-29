<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>AniLink - Messages</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>

    <style>
        body {
            background-color: #E2DFD8;
            font-family:
                system-ui,
                -apple-system,
                BlinkMacSystemFont,
                'Segoe UI',
                Roboto,
                Oxygen,
                Ubuntu,
                Cantarell,
                sans-serif;
        }

        .conversation-item {
            transition: background-color 0.15s ease;
        }

        .message-bubble {
            word-break: break-word;
        }

        /* Scrollbar */
        ::-webkit-scrollbar {
            width: 6px;
            height: 6px;
        }

        ::-webkit-scrollbar-track {
            background: transparent;
        }

        ::-webkit-scrollbar-thumb {
            background: #d6d3d1;
            border-radius: 10px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #a8a29e;
        }
    </style>
</head>

<body class="p-4 md:p-8 flex items-center justify-center min-h-screen">

<div
    class="bg-[#F6F5F2] w-full max-w-7xl rounded-2xl shadow-xl flex flex-col md:flex-row overflow-hidden border border-stone-300 h-[850px]"
>

    <!-- ===================================================== -->
    <!-- SIDEBAR -->
    <!-- ===================================================== -->

    <aside
        class="w-full md:w-64 bg-[#F6F5F2] border-b md:border-b-0 md:border-r border-stone-200 p-6 flex flex-col justify-between shrink-0"
    >

        <div>

            <!-- LOGO -->
            <div class="flex items-center gap-3 mb-8">

                <div
                    class="w-10 h-10 rounded-full bg-emerald-800 text-white flex items-center justify-center font-bold text-lg"
                >
                    <i
                        data-lucide="sprout"
                        class="w-6 h-6"
                    ></i>
                </div>

                <span
                    class="text-2xl font-bold text-stone-800 tracking-tight"
                >
                    AniLink
                </span>

            </div>


            <!-- NAVIGATION -->
            <nav class="space-y-2">

                <!-- Dashboard -->
                <a
                    href="{{ route('farmer.dashboard') }}"
                    class="flex items-center gap-3 px-4 py-2.5 text-stone-700 hover:bg-stone-200/60 rounded-lg transition-colors font-medium"
                >
                    <i
                        data-lucide="layout-dashboard"
                        class="w-5 h-5 text-stone-500"
                    ></i>

                    <span>Dashboard</span>
                </a>


                <!-- Sell Harvest -->
                <a
                    href="{{ route('harvest.create') }}"
                    class="flex items-center gap-3 px-4 py-2.5 text-stone-700 hover:bg-stone-200/60 rounded-lg transition-colors font-medium"
                >
                    <i
                        data-lucide="wheat"
                        class="w-5 h-5 text-stone-500"
                    ></i>

                    <span>Sell Harvest</span>
                </a>


                <!-- My Listings -->
                <a
                    href="{{ route('farmer.my-listings') }}"
                    class="flex items-center gap-3 px-4 py-2.5 text-stone-700 hover:bg-stone-200/60 rounded-lg transition-colors font-medium"
                >
                    <i
                        data-lucide="archive"
                        class="w-5 h-5 text-stone-500"
                    ></i>

                    <span>My Listings</span>
                </a>


                <!-- Orders Received -->
                <a
                    href="{{ route('farmer.orders.index') }}"
                    class="flex items-center gap-3 px-4 py-2.5 text-stone-700 hover:bg-stone-200/60 rounded-lg transition-colors font-medium"
                >
                    <i
                        data-lucide="clipboard-list"
                        class="w-5 h-5 text-stone-500"
                    ></i>

                    <span>Orders Received</span>
                </a>


                <!-- Sales & Earnings -->
                <a
                    href="{{ route('farmer.sales.index') }}"
                    class="flex items-center gap-3 px-4 py-2.5 text-stone-700 hover:bg-stone-200/60 rounded-lg transition-colors font-medium"
                >
                    <i
                        data-lucide="circle-dollar-sign"
                        class="w-5 h-5 text-stone-500"
                    ></i>

                    <span>Sales & Earnings</span>
                </a>


                <!-- Customer Reviews -->
                <a
                    href="{{ route('farmer.reviews') }}"
                    class="flex items-center gap-3 px-4 py-2.5 text-stone-700 hover:bg-stone-200/60 rounded-lg transition-colors font-medium"
                >
                    <i
                        data-lucide="star"
                        class="w-5 h-5 text-stone-500"
                    ></i>

                    <span>Customer Reviews</span>
                </a>


                <!-- Messages ACTIVE -->
                <a
                    href="{{ route('farmer.messages') }}"
                    class="flex items-center justify-between px-4 py-3 bg-[#1C5B32] text-white rounded-lg font-medium shadow-sm"
                >

                    <div class="flex items-center gap-3">

                        <i
                            data-lucide="message-square"
                            class="w-5 h-5"
                        ></i>

                        <span>Messages</span>

                    </div>

                    @if(($unreadMessagesCount ?? 0) > 0)

                        <span
                            class="text-xs bg-emerald-600/60 px-2 py-0.5 rounded text-emerald-100"
                        >
                            {{ $unreadMessagesCount > 99 ? '99+' : $unreadMessagesCount }} New
                        </span>

                    @endif

                </a>


                <!-- Profile -->
                <a
                    href="{{ route('farmer.profile') }}"
                    class="flex items-center gap-3 px-4 py-2.5 text-stone-700 hover:bg-stone-200/60 rounded-lg transition-colors font-medium"
                >
                    <i
                        data-lucide="user"
                        class="w-5 h-5 text-stone-500"
                    ></i>

                    <span>Profile</span>
                </a>


                <!-- Settings -->
                <a
                    href="{{ route('farmer.settings') }}"
                    class="flex items-center gap-3 px-4 py-2.5 text-stone-700 hover:bg-stone-200/60 rounded-lg transition-colors font-medium"
                >
                    <i
                        data-lucide="settings"
                        class="w-5 h-5 text-stone-500"
                    ></i>

                    <span>Settings</span>
                </a>

            </nav>

        </div>


        <!-- LOGOUT -->
        <div class="mt-8 pt-4 border-t border-stone-200">

            <form
                action="{{ route('logout') }}"
                method="POST"
            >

                @csrf

                <button
                    type="submit"
                    class="w-full flex items-center gap-3 px-4 py-2.5 text-stone-700 hover:bg-red-50 hover:text-red-600 rounded-lg transition-colors font-medium text-left"
                >

                    <i
                        data-lucide="log-out"
                        class="w-5 h-5"
                    ></i>

                    <span>Logout</span>

                </button>

            </form>

        </div>

    </aside>


    <!-- ===================================================== -->
    <!-- MAIN -->
    <!-- ===================================================== -->

    <main class="flex-1 flex flex-col min-w-0">


        <!-- ================================================= -->
        <!-- HEADER -->
        <!-- ================================================= -->

        <header
            class="p-6 flex items-center justify-between gap-4 border-b border-stone-200/60 shrink-0"
        >

            <div>

                <h1 class="text-xl font-bold text-stone-800">
                    Messages & Inquiries
                </h1>

                <p class="text-xs text-stone-500">
                    Communicate directly with buyers regarding orders and harvest details.
                </p>

            </div>


            <!-- HEADER RIGHT -->
            <div class="flex items-center gap-4">


                <!-- ================================================= -->
                <!-- NOTIFICATION BELL -->
                <!-- ================================================= -->

                <div
                    class="relative"
                    id="notificationWrapper"
                >

                    <button
                        type="button"
                        id="notificationButton"
                        class="relative p-2 rounded-lg text-stone-600 hover:bg-stone-100 transition-colors"
                        aria-label="Notifications"
                    >

                        <i
                            data-lucide="bell"
                            class="w-5 h-5"
                        ></i>


                        @if(($notificationCount ?? 0) > 0)

                            <span
                                id="notificationBadge"
                                class="absolute -top-0.5 -right-0.5 min-w-[18px] h-[18px] px-1 bg-red-500 text-white text-[9px] font-bold rounded-full flex items-center justify-center border-2 border-[#F6F5F2]"
                            >
                                {{ $notificationCount > 99 ? '99+' : $notificationCount }}
                            </span>

                        @endif

                    </button>


                    <!-- ================================================= -->
                    <!-- NOTIFICATION DROPDOWN -->
                    <!-- ================================================= -->

                    <div
                        id="notificationDropdown"
                        class="hidden absolute right-0 top-12 w-80 md:w-96 bg-white rounded-xl border border-stone-200 shadow-xl z-50 overflow-hidden"
                    >

                        <!-- HEADER -->
                        <div
                            class="px-4 py-3 border-b border-stone-200 flex items-center justify-between"
                        >

                            <div>

                                <h3
                                    class="font-bold text-stone-800 text-sm"
                                >
                                    Notifications
                                </h3>

                                <p
                                    class="text-[10px] text-stone-400 mt-0.5"
                                >
                                    Recent activity
                                </p>

                            </div>


                            @if(($notificationCount ?? 0) > 0)

                                <span
                                    class="text-[10px] font-semibold text-[#1C5B32]"
                                >
                                    {{ $notificationCount }} unread
                                </span>

                            @endif

                        </div>


                        <!-- NOTIFICATION LIST -->
                        <div class="max-h-80 overflow-y-auto">

                            @forelse(($notifications ?? collect()) as $notification)

                                <form
                                   action="{{ route('buyer.notifications.read', $notification->id) }}"
                                    method="POST"
                                >

                                    @csrf

                                    <button
                                        type="submit"
                                        class="w-full flex gap-3 px-4 py-3 text-left hover:bg-stone-50 transition-colors border-b border-stone-100
                                        {{ $notification->read_at ? 'bg-white' : 'bg-emerald-50/60' }}"
                                    >

                                        <!-- ICON -->
                                        <div
                                            class="w-9 h-9 rounded-full bg-[#1C5B32] text-white flex items-center justify-center shrink-0"
                                        >

                                            <i
                                                data-lucide="{{ $notification->icon ?? 'bell' }}"
                                                class="w-4 h-4"
                                            ></i>

                                        </div>


                                        <!-- CONTENT -->
                                        <div class="flex-1 min-w-0">

                                            <div
                                                class="flex items-start justify-between gap-2"
                                            >

                                                <p
                                                    class="text-xs font-semibold text-stone-800"
                                                >
                                                    {{ $notification->title }}
                                                </p>


                                                @if(!$notification->read_at)

                                                    <span
                                                        class="w-2 h-2 rounded-full bg-[#1C5B32] mt-1 shrink-0"
                                                    ></span>

                                                @endif

                                            </div>


                                            <p
                                                class="text-[11px] text-stone-500 mt-0.5 leading-relaxed"
                                            >
                                                {{ $notification->message }}
                                            </p>


                                            <p
                                                class="text-[10px] text-stone-400 mt-1"
                                            >
                                                {{ $notification->created_at->diffForHumans() }}
                                            </p>

                                        </div>

                                    </button>

                                </form>

                            @empty

                                <div class="px-4 py-10 text-center">

                                    <div
                                        class="w-11 h-11 mx-auto rounded-full bg-stone-100 flex items-center justify-center mb-3"
                                    >

                                        <i
                                            data-lucide="bell-off"
                                            class="w-5 h-5 text-stone-400"
                                        ></i>

                                    </div>

                                    <p
                                        class="text-sm font-semibold text-stone-700"
                                    >
                                        No notifications
                                    </p>

                                    <p
                                        class="text-[11px] text-stone-400 mt-1"
                                    >
                                        You're all caught up!
                                    </p>

                                </div>

                            @endforelse

                        </div>


                        <!-- NOTIFICATION FOOTER -->
                        @if(($notificationCount ?? 0) > 0)

                            <div
                                class="border-t border-stone-200 p-2"
                            >

                                <form
                                    action="{{ route('buyer.notifications.markAllRead') }}"
                                    method="POST"
                                >

                                    @csrf

                                    <button
                                        type="submit"
                                        class="w-full text-center text-xs font-semibold text-[#1C5B32] hover:bg-stone-50 rounded-lg py-2 transition-colors"
                                    >
                                        Mark all as read
                                    </button>

                                </form>

                            </div>

                        @endif

                    </div>

                </div>


                <!-- DIVIDER -->
                <div class="w-px h-8 bg-stone-200"></div>


                <!-- FARMER PROFILE -->
                <div class="flex items-center gap-3">

                    <div
                        class="w-10 h-10 rounded-full bg-emerald-800 text-white flex items-center justify-center font-bold"
                    >

                        {{ strtoupper(
                            substr(
                                Auth::user()->first_name ?? 'F',
                                0,
                                1
                            )
                        ) }}

                    </div>

                    <span
                        class="font-bold text-stone-800 text-sm hidden sm:inline"
                    >
                        Farmer
                        {{ Auth::user()->first_name }}
                        {{ Auth::user()->last_name }}
                    </span>

                </div>

            </div>

        </header>


        <!-- ================================================= -->
        <!-- CHAT INTERFACE -->
        <!-- ================================================= -->

        <div
            class="flex-1 flex flex-col md:flex-row overflow-hidden min-h-0"
        >


            <!-- ================================================= -->
            <!-- CONVERSATION LIST -->
            <!-- ================================================= -->

            <div
                class="w-full md:w-80 bg-white border-r border-stone-200 flex flex-col shrink-0"
            >

                <!-- SEARCH -->
                <div
                    class="p-4 border-b border-stone-100"
                >

                    <div class="relative">

                        <i
                            data-lucide="search"
                            class="w-4 h-4 absolute left-3 top-1/2 -translate-y-1/2 text-stone-400"
                        ></i>

                        <input
                            type="text"
                            id="conversationSearch"
                            placeholder="Search conversations..."
                            class="w-full pl-9 pr-4 py-2 bg-stone-50 border border-stone-200 rounded-xl text-xs focus:outline-none focus:ring-2 focus:ring-emerald-700"
                        >

                    </div>

                </div>


                <!-- CONVERSATIONS -->
                <div
                    id="conversationList"
                    class="flex-1 overflow-y-auto divide-y divide-stone-100"
                >

                    @forelse($conversations as $conversation)

                        @php

                            $lastMessage = \App\Models\Message::where(function ($query) use ($conversation) {

                                $query->where('sender_id', Auth::id())
                                    ->where('receiver_id', $conversation->id);

                            })
                            ->orWhere(function ($query) use ($conversation) {

                                $query->where('sender_id', $conversation->id)
                                    ->where('receiver_id', Auth::id());

                            })
                            ->latest()
                            ->first();


                            $unreadCount = \App\Models\Message::where('sender_id', $conversation->id)
                                ->where('receiver_id', Auth::id())
                                ->where('is_read', false)
                                ->count();

                        @endphp


                        <a
                            href="{{ route('farmer.messages', ['user' => $conversation->id]) }}"
                            class="conversation-item w-full p-4 text-left flex items-start gap-3 transition-colors
                            {{ $selectedUser && $selectedUser->id == $conversation->id
                                ? 'bg-stone-100/70 border-l-4 border-[#1C5B32]'
                                : 'hover:bg-stone-50' }}"
                        >

                            <!-- AVATAR -->
                            <div class="relative shrink-0">

                                <div
                                    class="w-11 h-11 rounded-full bg-emerald-800 text-white flex items-center justify-center font-bold"
                                >
                                    {{ strtoupper(
                                        substr(
                                            $conversation->first_name ?? 'U',
                                            0,
                                            1
                                        )
                                    ) }}
                                </div>

                            </div>


                            <!-- INFORMATION -->
                            <div class="flex-1 min-w-0">

                                <div
                                    class="flex justify-between items-baseline mb-1"
                                >

                                    <h2
                                        class="conversation-name font-bold text-stone-800 text-xs truncate"
                                    >
                                        {{ $conversation->first_name }}
                                        {{ $conversation->last_name }}
                                    </h2>


                                    @if($lastMessage)

                                        <span
                                            class="text-[10px] text-stone-400 shrink-0 ml-2"
                                        >
                                            {{ $lastMessage->created_at->format('g:i A') }}
                                        </span>

                                    @endif

                                </div>


                                @if($lastMessage)

                                    <p
                                        class="text-xs truncate
                                        {{ $unreadCount > 0
                                            ? 'text-stone-700 font-semibold'
                                            : 'text-stone-500' }}"
                                    >
                                        {{ $lastMessage->message }}
                                    </p>

                                @else

                                    <p
                                        class="text-xs text-stone-400"
                                    >
                                        No messages yet
                                    </p>

                                @endif


                                @if($unreadCount > 0)

                                    <span
                                        class="inline-block bg-emerald-100 text-emerald-800 text-[10px] font-semibold px-1.5 py-0.5 rounded mt-1"
                                    >
                                        {{ $unreadCount }} new
                                    </span>

                                @endif

                            </div>

                        </a>

                    @empty

                        <div
                            class="p-8 text-center text-stone-400 text-sm"
                        >

                            <i
                                data-lucide="message-circle"
                                class="w-8 h-8 mx-auto mb-2"
                            ></i>

                            <p>
                                No conversations yet.
                            </p>

                            <p class="text-xs mt-1">
                                Buyers who message you will appear here.
                            </p>

                        </div>

                    @endforelse


                    <!-- SEARCH EMPTY -->
                    <div
                        id="noConversationResults"
                        class="hidden p-8 text-center text-stone-400 text-sm"
                    >

                        <i
                            data-lucide="search-x"
                            class="w-8 h-8 mx-auto mb-2"
                        ></i>

                        <p class="font-medium">
                            No matching conversations
                        </p>

                        <p class="text-xs mt-1">
                            Try another buyer name.
                        </p>

                    </div>

                </div>

            </div>


            <!-- ================================================= -->
            <!-- ACTIVE CHAT -->
            <!-- ================================================= -->

            <div
                class="flex-1 flex flex-col bg-stone-50/50 min-w-0"
            >


                <!-- ================================================= -->
                <!-- CHAT HEADER -->
                <!-- ================================================= -->

                <div
                    class="p-4 bg-white border-b border-stone-200 flex items-center justify-between shrink-0"
                >

                    @if($selectedUser)

                        <div class="flex items-center gap-3">

                            <div
                                class="w-10 h-10 rounded-full bg-emerald-800 text-white flex items-center justify-center font-bold"
                            >
                                {{ strtoupper(
                                    substr(
                                        $selectedUser->first_name ?? 'U',
                                        0,
                                        1
                                    )
                                ) }}
                            </div>

                            <div>

                                <h2
                                    class="font-bold text-stone-800 text-sm"
                                >
                                    {{ $selectedUser->first_name }}
                                    {{ $selectedUser->last_name }}
                                </h2>

                                <span
                                    class="text-[11px] text-stone-500 font-medium"
                                >
                                    Buyer
                                </span>

                            </div>

                        </div>

                    @else

                        <div>

                            <h2
                                class="font-bold text-stone-800 text-sm"
                            >
                                No conversation selected
                            </h2>

                            <p
                                class="text-[11px] text-stone-400 mt-0.5"
                            >
                                Select a buyer from the left.
                            </p>

                        </div>

                    @endif


                    <!-- RIGHT SIDE -->
                    <div class="flex items-center gap-3">

                        @if($selectedUser)

                            <div
                                class="hidden sm:flex items-center gap-2 bg-emerald-50 border border-emerald-200 px-3 py-1.5 rounded-xl"
                            >

                                <i
                                    data-lucide="user"
                                    class="w-4 h-4 text-emerald-700"
                                ></i>

                                <div class="text-left">

                                    <p
                                        class="text-[10px] text-stone-400 font-bold uppercase"
                                    >
                                        Contact
                                    </p>

                                    <p
                                        class="text-xs font-bold text-stone-800"
                                    >
                                        Buyer
                                    </p>

                                </div>

                            </div>

                        @endif


                        <button
                            type="button"
                            class="p-2 text-stone-500 hover:bg-stone-100 rounded-lg"
                        >

                            <i
                                data-lucide="more-vertical"
                                class="w-5 h-5"
                            ></i>

                        </button>

                    </div>

                </div>


                <!-- ================================================= -->
                <!-- MESSAGES -->
                <!-- ================================================= -->

                <div
                    id="messagesContainer"
                    class="flex-1 p-4 md:p-6 overflow-y-auto space-y-4"
                >

                    @if($selectedUser)

                        @forelse($messages as $message)

                            @if($message->sender_id == Auth::id())

                                <!-- FARMER MESSAGE -->
                                <div
                                    class="flex items-end justify-end gap-2.5 max-w-md ml-auto"
                                >

                                    <div>

                                        <div
                                            class="message-bubble bg-[#1C5B32] text-white p-3.5 rounded-2xl rounded-br-none text-xs shadow-sm leading-relaxed"
                                        >
                                            {{ $message->message }}
                                        </div>

                                        <span
                                            class="text-[10px] text-stone-400 mt-1 block text-right pr-1"
                                        >
                                            {{ $message->created_at->format('g:i A') }}
                                        </span>

                                    </div>

                                </div>

                            @else

                                <!-- BUYER MESSAGE -->
                                <div
                                    class="flex items-end gap-2.5 max-w-md"
                                >

                                    <div
                                        class="w-7 h-7 rounded-full bg-emerald-800 text-white flex items-center justify-center text-xs font-bold shrink-0 mb-1"
                                    >
                                        {{ strtoupper(
                                            substr(
                                                $selectedUser->first_name ?? 'U',
                                                0,
                                                1
                                            )
                                        ) }}
                                    </div>


                                    <div>

                                        <div
                                            class="message-bubble bg-white border border-stone-200 p-3.5 rounded-2xl rounded-bl-none text-xs text-stone-800 shadow-sm leading-relaxed"
                                        >
                                            {{ $message->message }}
                                        </div>

                                        <span
                                            class="text-[10px] text-stone-400 mt-1 block pl-1"
                                        >
                                            {{ $message->created_at->format('g:i A') }}
                                        </span>

                                    </div>

                                </div>

                            @endif

                        @empty

                            <div
                                class="flex items-center justify-center h-full"
                            >

                                <div
                                    class="text-center text-stone-400"
                                >

                                    <i
                                        data-lucide="message-circle"
                                        class="w-10 h-10 mx-auto mb-3"
                                    ></i>

                                    <p
                                        class="text-sm font-medium"
                                    >
                                        No messages yet
                                    </p>

                                    <p
                                        class="text-xs mt-1"
                                    >
                                        Start the conversation below.
                                    </p>

                                </div>

                            </div>

                        @endforelse

                    @else

                        <div
                            class="flex items-center justify-center h-full"
                        >

                            <div
                                class="text-center text-stone-400"
                            >

                                <i
                                    data-lucide="messages-square"
                                    class="w-10 h-10 mx-auto mb-3"
                                ></i>

                                <p
                                    class="text-sm font-medium"
                                >
                                    Select a conversation
                                </p>

                                <p
                                    class="text-xs mt-1"
                                >
                                    Choose a buyer from the left.
                                </p>

                            </div>

                        </div>

                    @endif

                </div>


                <!-- ================================================= -->
                <!-- MESSAGE INPUT -->
                <!-- ================================================= -->

                <div
                    class="p-4 bg-white border-t border-stone-200 shrink-0"
                >

                    @if($selectedUser)

                        <form
                            action="{{ route('farmer.messages.send') }}"
                            method="POST"
                            class="flex items-center gap-2"
                        >

                            @csrf

                            <input
                                type="hidden"
                                name="receiver_id"
                                value="{{ $selectedUser->id }}"
                            >


                            <input
                                type="text"
                                name="message"
                                placeholder="Type your message..."
                                required
                                autocomplete="off"
                                maxlength="2000"
                                class="flex-1 px-4 py-2.5 bg-stone-50 border border-stone-200 rounded-xl text-xs focus:outline-none focus:ring-2 focus:ring-emerald-700"
                            >


                            <button
                                type="submit"
                                class="bg-[#1C5B32] hover:bg-emerald-900 text-white p-2.5 rounded-xl transition-colors shadow-sm flex items-center justify-center"
                            >

                                <i
                                    data-lucide="send"
                                    class="w-4 h-4"
                                ></i>

                            </button>

                        </form>

                    @else

                        <div
                            class="text-center text-xs text-stone-400"
                        >
                            Select a conversation to send a message.
                        </div>

                    @endif

                </div>

            </div>

        </div>


        <!-- ================================================= -->
        <!-- FOOTER -->
        <!-- ================================================= -->

        <footer
            class="p-3 text-center text-xs text-stone-500 border-t border-stone-200/60 shrink-0"
        >
            © 2026 AniLink
        </footer>

    </main>

</div>


<!-- ===================================================== -->
<!-- JAVASCRIPT -->
<!-- ===================================================== -->

<script>

    /*
    |--------------------------------------------------------------------------
    | NOTIFICATION DROPDOWN
    |--------------------------------------------------------------------------
    */

    document.addEventListener('DOMContentLoaded', function () {

        const notificationButton =
            document.getElementById('notificationButton');

        const notificationDropdown =
            document.getElementById('notificationDropdown');

        const notificationWrapper =
            document.getElementById('notificationWrapper');


        if (
            notificationButton &&
            notificationDropdown &&
            notificationWrapper
        ) {

            // Open / close notification dropdown
            notificationButton.addEventListener('click', function (event) {

                event.stopPropagation();

                notificationDropdown.classList.toggle('hidden');

            });


            // Keep dropdown open when clicking inside
            notificationDropdown.addEventListener('click', function (event) {

                event.stopPropagation();

            });


            // Close dropdown when clicking outside
            document.addEventListener('click', function (event) {

                if (!notificationWrapper.contains(event.target)) {

                    notificationDropdown.classList.add('hidden');

                }

            });

        }


        /*
        |--------------------------------------------------------------------------
        | SEARCH CONVERSATIONS
        |--------------------------------------------------------------------------
        */

        const searchInput =
            document.getElementById('conversationSearch');

        const conversationItems =
            document.querySelectorAll('.conversation-item');

        const noConversationResults =
            document.getElementById('noConversationResults');


        if (searchInput) {

            searchInput.addEventListener('input', function () {

                const search =
                    this.value.toLowerCase().trim();

                let visibleCount = 0;


                conversationItems.forEach(function (item) {

                    const name =
                        item
                            .querySelector('.conversation-name')
                            ?.textContent
                            .toLowerCase()
                            .trim() || '';


                    if (name.includes(search)) {

                        item.style.display = '';

                        visibleCount++;

                    } else {

                        item.style.display = 'none';

                    }

                });


                if (
                    search !== '' &&
                    visibleCount === 0 &&
                    conversationItems.length > 0
                ) {

                    noConversationResults.classList.remove('hidden');

                } else {

                    noConversationResults.classList.add('hidden');

                }

            });

        }


        /*
        |--------------------------------------------------------------------------
        | SCROLL CHAT TO BOTTOM
        |--------------------------------------------------------------------------
        */

        const messagesContainer =
            document.getElementById('messagesContainer');


        if (messagesContainer) {

            messagesContainer.scrollTop =
                messagesContainer.scrollHeight;

        }


        /*
        |--------------------------------------------------------------------------
        | LUCIDE ICONS
        |--------------------------------------------------------------------------
        */

        lucide.createIcons();

    });

</script>

</body>
</html>