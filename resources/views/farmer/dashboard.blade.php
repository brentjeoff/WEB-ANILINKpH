<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>AniLink Dashboard</title>

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Lucide Icons CDN -->
    <script src="https://unpkg.com/lucide@latest"></script>

    <style>
        body {
            background-color: #E2DFD8;
            font-family: system-ui, -apple-system, BlinkMacSystemFont,
                'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
        }
    </style>
</head>

<body class="p-4 md:p-8 flex items-center justify-center min-h-screen">

    <!-- Main Container -->
    <div
        class="bg-[#F6F5F2] w-full max-w-7xl rounded-2xl shadow-xl flex flex-col md:flex-row overflow-hidden border border-stone-300">

        <!-- ========================================================= -->
        <!-- SIDEBAR -->
        <!-- ========================================================= -->

        <aside
            class="w-full md:w-64 bg-[#F6F5F2] border-b md:border-b-0 md:border-r border-stone-200 p-6 flex flex-col justify-between shrink-0">

            <div>

                <!-- Logo -->
                <div class="flex items-center gap-3 mb-8">

                    <div
                        class="w-10 h-10 rounded-full bg-emerald-800 text-white flex items-center justify-center font-bold text-lg">

                        <i data-lucide="sprout" class="w-6 h-6"></i>

                    </div>

                    <span class="text-2xl font-bold text-stone-800 tracking-tight">
                        AniLink
                    </span>

                </div>


                <!-- Navigation -->
                <nav class="space-y-2">

                    <!-- Dashboard -->
                    <a
                        href="/farmer/dashboard"
                        class="flex items-center justify-between px-4 py-3 bg-[#1C5B32] text-white rounded-lg font-medium shadow-sm">

                        <div class="flex items-center gap-3">

                            <i data-lucide="layout-dashboard" class="w-5 h-5"></i>

                            <span>Dashboard</span>

                        </div>

                        <span
                            class="text-xs bg-emerald-600/60 px-2 py-0.5 rounded text-emerald-100">
                            Active
                        </span>

                    </a>


                    <!-- Sell Harvest -->
                    <a
                        href="/farmer/sell-harvest"
                        class="flex items-center gap-3 px-4 py-2.5 text-stone-700 hover:bg-stone-200/60 rounded-lg transition-colors font-medium">

                        <i data-lucide="wheat" class="w-5 h-5 text-stone-500"></i>

                        <span>Sell Harvest</span>

                    </a>


                    <!-- My Listings -->
                    <a
                        href="/farmer/my-listing"
                        class="flex items-center gap-3 px-4 py-2.5 text-stone-700 hover:bg-stone-200/60 rounded-lg transition-colors font-medium">

                        <i data-lucide="archive" class="w-5 h-5 text-stone-500"></i>

                        <span>My Listings</span>

                    </a>


                    <!-- Orders Received -->
                    <a
                        href="/farmer/orders-received"
                        class="flex items-center gap-3 px-4 py-2.5 text-stone-700 hover:bg-stone-200/60 rounded-lg transition-colors font-medium">

                        <i data-lucide="clipboard-list" class="w-5 h-5 text-stone-500"></i>

                        <span>Orders Received</span>

                    </a>


                    <!-- Sales & Earnings -->
                    <a
                        href="/farmer/sell-and-earnings"
                        class="flex items-center gap-3 px-4 py-2.5 text-stone-700 hover:bg-stone-200/60 rounded-lg transition-colors font-medium">

                        <i data-lucide="circle-dollar-sign" class="w-5 h-5 text-stone-500"></i>

                        <span>Sales & Earnings</span>

                    </a>


                    <!-- Customer Reviews -->
                    <a
                        href="{{ route('farmer.reviews') }}"
                        class="flex items-center gap-3 px-4 py-2.5 text-stone-700 hover:bg-stone-200/60 rounded-lg transition-colors font-medium">

                        <i data-lucide="star" class="w-5 h-5 text-stone-500"></i>

                        <span>Customer Reviews</span>

                    </a>


                    <!-- Messages -->
                    <a
                        href="/farmer/messages"
                        class="flex items-center gap-3 px-4 py-2.5 text-stone-700 hover:bg-stone-200/60 rounded-lg transition-colors font-medium">

                        <i data-lucide="message-square" class="w-5 h-5 text-stone-500"></i>

                        <span>Messages</span>

                    </a>


                    <!-- Profile -->
                    <a
                        href="/farmer/profile"
                        class="flex items-center gap-3 px-4 py-2.5 text-stone-700 hover:bg-stone-200/60 rounded-lg transition-colors font-medium">

                        <i data-lucide="user" class="w-5 h-5 text-stone-500"></i>

                        <span>Profile</span>

                    </a>


                    <!-- Settings -->
                    <a
                        href="/farmer/settings"
                        class="flex items-center gap-3 px-4 py-2.5 text-stone-700 hover:bg-stone-200/60 rounded-lg transition-colors font-medium">

                        <i data-lucide="settings" class="w-5 h-5 text-stone-500"></i>

                        <span>Settings</span>

                    </a>

                </nav>

            </div>


            <!-- Logout -->
            <div class="mt-8 pt-4 border-t border-stone-200">

                <form action="{{ route('logout') }}" method="POST">

                    @csrf

                    <button
                        type="submit"
                        class="w-full flex items-center gap-3 px-4 py-2.5 text-stone-700 hover:bg-red-50 hover:text-red-600 rounded-lg transition-colors font-medium text-left">

                        <i data-lucide="log-out" class="w-5 h-5"></i>

                        <span>Logout</span>

                    </button>

                </form>

            </div>

        </aside>


        <!-- ========================================================= -->
        <!-- MAIN CONTENT -->
        <!-- ========================================================= -->

        <main class="flex-1 flex flex-col min-w-0">


            <!-- ========================================================= -->
            <!-- HEADER -->
            <!-- ========================================================= -->

            <header
                class="p-6 flex flex-col md:flex-row items-center justify-between gap-4 border-b border-stone-200/60">


                <!-- Search -->
                <div class="relative w-full md:w-96">

                    <i
                        data-lucide="search"
                        class="w-5 h-5 absolute left-3 top-1/2 -translate-y-1/2 text-stone-400">
                    </i>

                    <input
                        type="text"
                        placeholder="Search"
                        class="w-full pl-10 pr-4 py-2 bg-white border border-stone-200 rounded-full text-sm focus:outline-none focus:ring-2 focus:ring-emerald-700 shadow-sm">

                </div>


                <!-- User + Notification -->
                <div class="flex items-center gap-4 self-end md:self-auto">


                    <!-- ================================================= -->
                    <!-- DATABASE NOTIFICATIONS -->
                    <!-- ================================================= -->

                    <div
                        class="relative"
                        id="notificationWrapper">


                        <!-- Notification Button -->
                        <button
                            type="button"
                            id="notificationButton"
                            class="relative p-2 rounded-lg text-stone-600 hover:bg-stone-100 transition-colors"
                            aria-label="Notifications">

                            <i
                                data-lucide="bell"
                                class="w-5 h-5">
                            </i>


                            <!-- Unread Badge -->
                            @if($notificationCount > 0)

                                <span
                                    id="notificationBadge"
                                    class="absolute -top-0.5 -right-0.5 min-w-[18px] h-[18px] px-1 bg-red-500 text-white text-[9px] font-bold rounded-full flex items-center justify-center border-2 border-[#F6F5F2]">

                                    {{ $notificationCount > 9 ? '9+' : $notificationCount }}

                                </span>

                            @endif

                        </button>


                        <!-- ================================================= -->
                        <!-- NOTIFICATION DROPDOWN -->
                        <!-- ================================================= -->

                        <div
                            id="notificationDropdown"
                            class="hidden absolute right-0 top-12 w-80 bg-white rounded-xl border border-stone-200 shadow-xl z-50 overflow-hidden">


                            <!-- Header -->
                            <div
                                class="px-4 py-3 border-b border-stone-200 flex items-center justify-between">

                                <div>

                                    <h3 class="font-bold text-stone-800 text-sm">
                                        Notifications
                                    </h3>

                                    <p class="text-[10px] text-stone-400 mt-0.5">
                                        Recent activity
                                    </p>

                                </div>


                                @if($notificationCount > 0)

                                    <span
                                        class="text-[10px] font-semibold text-[#1C5B32]">

                                        {{ $notificationCount }} new

                                    </span>

                                @endif

                            </div>


                            <!-- Notification List -->
                            <div class="max-h-80 overflow-y-auto">


                                @forelse($notifications as $notification)

                                    <a
                                        href="{{ route('farmer.orders.index') }}"
                                        class="flex gap-3 px-4 py-3 hover:bg-stone-50 transition-colors border-b border-stone-100
                                        {{ is_null($notification->read_at) ? 'bg-emerald-50/40' : '' }}">


                                        <!-- Icon -->
                                        <div
                                            class="w-9 h-9 rounded-full bg-[#1C5B32] text-white flex items-center justify-center shrink-0">

                                            <i
                                                data-lucide="{{ $notification->icon ?? 'bell' }}"
                                                class="w-4 h-4">
                                            </i>

                                        </div>


                                        <!-- Notification Content -->
                                        <div class="flex-1 min-w-0">

                                            <div
                                                class="flex items-start justify-between gap-2">

                                                <p
                                                    class="text-xs font-semibold text-stone-800">

                                                    {{ $notification->title }}

                                                </p>


                                                @if(is_null($notification->read_at))

                                                    <span
                                                        class="w-2 h-2 rounded-full bg-[#1C5B32] mt-1.5 shrink-0">
                                                    </span>

                                                @endif

                                            </div>


                                            <p
                                                class="text-[11px] text-stone-500 mt-0.5 leading-relaxed">

                                                {{ $notification->message }}

                                            </p>


                                            <p
                                                class="text-[10px] text-stone-400 mt-1">

                                                {{ $notification->created_at->diffForHumans() }}

                                            </p>

                                        </div>

                                    </a>

                                @empty


                                    <!-- Empty State -->
                                    <div class="px-4 py-10 text-center">

                                        <div
                                            class="w-11 h-11 mx-auto rounded-full bg-stone-100 flex items-center justify-center mb-3">

                                            <i
                                                data-lucide="bell-off"
                                                class="w-5 h-5 text-stone-400">
                                            </i>

                                        </div>


                                        <p
                                            class="text-sm font-semibold text-stone-700">

                                            No notifications

                                        </p>


                                        <p
                                            class="text-[11px] text-stone-400 mt-1">

                                            You're all caught up!

                                        </p>

                                    </div>

                                @endforelse

                            </div>


                            <!-- Footer -->
                            @if($notifications->count() > 0)

                                <div
                                    class="border-t border-stone-200 p-2">

                                    <a
                                        href="{{ route('farmer.orders.index') }}"
                                        class="block text-center text-xs font-semibold text-[#1C5B32] hover:bg-stone-50 rounded-lg py-2 transition-colors">

                                        View Orders

                                    </a>

                                </div>

                            @endif

                        </div>

                    </div>


                    <!-- ================================================= -->
                    <!-- FARMER PROFILE -->
                    <!-- ================================================= -->

                    <div class="flex items-center gap-3">

                        <div
                            class="w-10 h-10 rounded-full bg-emerald-800 text-white flex items-center justify-center font-bold">

                            {{ strtoupper(substr(Auth::user()->first_name ?? 'F', 0, 1)) }}

                        </div>


                        <span
                            class="font-bold text-stone-800 text-sm">

                            Farmer
                            {{ Auth::user()->first_name }}
                            {{ Auth::user()->last_name }}

                        </span>

                    </div>

                </div>

            </header>


            <!-- ========================================================= -->
            <!-- DASHBOARD CONTENT -->
            <!-- ========================================================= -->

            <div class="p-6 space-y-6 overflow-y-auto">


                <!-- ================================================= -->
                <!-- WELCOME + LOW STOCK -->
                <!-- ================================================= -->

                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">


                    <!-- Welcome Banner -->
                    <div
                        class="lg:col-span-2 bg-[#FAF5E9] border border-amber-200/60 rounded-2xl p-6 flex flex-col sm:flex-row items-center gap-6 relative overflow-hidden">


                        <div
                            class="w-32 h-32 flex-shrink-0 bg-amber-100 rounded-full flex items-center justify-center overflow-hidden border-2 border-amber-300">

                            <img
                                src="https://images.unsplash.com/photo-1595273670150-bd0c3c392e46?w=300&auto=format&fit=crop&q=80"
                                alt="Farmer"
                                class="w-full h-full object-cover">

                        </div>


                        <div>

                            <h1
                                class="text-2xl md:text-3xl font-extrabold text-stone-800 mb-2">

                                Hello, Farmer
                                {{ Auth::user()->first_name }}
                                {{ Auth::user()->last_name }}

                            </h1>


                            <p class="text-stone-600 text-sm">

                                Manage your harvests and grow your business with AniLink.

                            </p>

                        </div>

                    </div>


                    <!-- Low Stock -->
                    <div class="grid grid-cols-2 gap-3">

                        @forelse($lowStock as $listing)

                            <div
                                class="bg-stone-50 border border-stone-200 rounded-xl p-3 relative flex flex-col items-center text-center">


                                <span
                                    class="absolute top-2 right-2 text-amber-500">

                                    <i
                                        data-lucide="triangle-alert"
                                        class="w-4 h-4">
                                    </i>

                                </span>


                                @if($listing->image)

                                    <img
                                        src="{{ asset('storage/' . $listing->image) }}"
                                        class="w-12 h-12 object-cover rounded-lg my-1"
                                        alt="{{ $listing->product_name }}">

                                @else

                                    <span class="text-2xl my-1">
                                        🌾
                                    </span>

                                @endif


                                <h3
                                    class="font-bold text-stone-800 text-xs leading-tight">

                                    {{ $listing->product_name }}

                                </h3>


                                <span
                                    class="text-[11px] text-amber-600 font-medium mt-1">

                                    Only
                                    {{ $listing->quantity }}
                                    {{ $listing->unit }}
                                    left

                                </span>

                            </div>

                        @empty

                            <div
                                class="col-span-2 text-center py-6 text-sm text-stone-500">

                                No low stock items.

                            </div>

                        @endforelse

                    </div>

                </div>


                <!-- ================================================= -->
                <!-- STATISTICS -->
                <!-- ================================================= -->

                <div
                    class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">


                    <!-- Active Listings -->
                    <div
                        class="rounded-xl overflow-hidden shadow-sm border border-stone-300">

                        <div
                            class="bg-[#1C5B32] text-white p-2.5 text-xs font-semibold">

                            Active Listings

                        </div>

                        <div
                            class="bg-[#8C6D62] text-white p-4 font-bold text-xl">

                            {{ $activeListings }} items

                        </div>

                    </div>


                    <!-- Orders Received -->
                    <div
                        class="rounded-xl overflow-hidden shadow-sm border border-stone-300">

                        <div
                            class="bg-[#1C5B32] text-white p-2.5 text-xs font-semibold">

                            Orders Received

                        </div>

                        <div
                            class="bg-[#8C6D62] text-white p-4 font-bold text-xl">

                            {{ $ordersReceived }} orders

                        </div>

                    </div>


                    <!-- Total Sales -->
                    <div
                        class="rounded-xl overflow-hidden shadow-sm border border-stone-300">

                        <div
                            class="bg-[#1C5B32] text-white p-2.5 text-xs font-semibold">

                            Total Sales

                        </div>

                        <div
                            class="bg-[#8C6D62] text-white p-4 font-bold text-xl">

                            ₱{{ number_format($totalSales, 2) }}

                        </div>

                    </div>


                    <!-- Monthly Earnings -->
                    <div
                        class="rounded-xl overflow-hidden shadow-sm border border-stone-300">

                        <div
                            class="bg-[#1C5B32] text-white p-2.5 text-xs font-semibold">

                            Monthly Earnings

                        </div>

                        <div
                            class="bg-[#8C6D62] text-white p-4 font-bold text-xl">

                            ₱{{ number_format($monthlyEarnings, 2) }}

                        </div>

                    </div>

                </div>


                <!-- ================================================= -->
                <!-- MAIN GRID -->
                <!-- ================================================= -->

                <div
                    class="grid grid-cols-1 lg:grid-cols-3 gap-6">


                    <!-- LEFT -->
                    <div class="lg:col-span-2 space-y-6">


                        <!-- ================================================= -->
                        <!-- QUICK ACTIONS -->
                        <!-- ================================================= -->

                        <div class="flex flex-wrap gap-3">


                            <!-- Sell Harvest -->
                            <a
                                href="{{ route('harvest.create') }}"
                                class="bg-[#1C5B32] hover:bg-emerald-900 text-white font-medium px-4 py-2.5 rounded-xl text-sm flex items-center gap-2 transition-colors shadow-sm">

                                <i data-lucide="plus" class="w-4 h-4"></i>

                                Sell Harvest

                            </a>


                            <!-- My Listings -->
                            <a
                                href="{{ route('farmer.my-listings') }}"
                                class="bg-white hover:bg-stone-50 border border-stone-300 text-stone-800 font-medium px-4 py-2.5 rounded-xl text-sm flex items-center gap-2 transition-colors shadow-sm">

                                <i data-lucide="file-text" class="w-4 h-4"></i>

                                View My Listings

                            </a>


                            <!-- Orders -->
                            <a
                                href="{{ route('farmer.orders.index') }}"
                                class="bg-white hover:bg-stone-50 border border-stone-300 text-stone-800 font-medium px-4 py-2.5 rounded-xl text-sm flex items-center gap-2 transition-colors shadow-sm">

                                <i data-lucide="check-square" class="w-4 h-4"></i>

                                Check Orders

                            </a>

                        </div>


                        <!-- ================================================= -->
                        <!-- RECENT ORDERS -->
                        <!-- ================================================= -->

                        <div>

                            <div
                                class="flex items-center justify-between mb-3">

                                <h2
                                    class="font-bold text-stone-800 text-lg">

                                    Recent Orders

                                </h2>


                                <a
                                    href="{{ route('farmer.orders.index') }}"
                                    class="text-sm font-medium text-[#1C5B32] hover:underline">

                                    View All

                                </a>

                            </div>


                            <div
                                class="bg-white rounded-xl border border-stone-200 overflow-x-auto shadow-sm">

                                <table
                                    class="w-full text-left border-collapse text-sm">


                                    <!-- Header -->
                                    <thead>

                                        <tr
                                            class="bg-stone-100/80 text-stone-700 border-b border-stone-200">

                                            <th class="p-3.5 font-semibold">
                                                Product
                                            </th>

                                            <th class="p-3.5 font-semibold">
                                                Customer
                                            </th>

                                            <th class="p-3.5 font-semibold">
                                                Qty
                                            </th>

                                            <th class="p-3.5 font-semibold">
                                                Order Status
                                            </th>

                                            <th class="p-3.5 font-semibold">
                                            </th>

                                        </tr>

                                    </thead>


                                    <!-- Body -->
                                    <tbody
                                        class="divide-y divide-stone-100 text-stone-800">


                                        @forelse($recentOrders as $order)

                                            <tr
                                                class="hover:bg-stone-50 transition-colors">


                                                <!-- Product -->
                                                <td class="p-3.5">

                                                    <div
                                                        class="flex items-center gap-3">

                                                        @if($order->harvestListing && $order->harvestListing->image)

                                                            <img
                                                                src="{{ asset('storage/' . $order->harvestListing->image) }}"
                                                                alt="{{ $order->harvestListing->product_name }}"
                                                                class="w-9 h-9 rounded-lg object-cover">

                                                        @else

                                                            <div
                                                                class="w-9 h-9 rounded-lg bg-emerald-100 flex items-center justify-center">

                                                                🌾

                                                            </div>

                                                        @endif


                                                        <div>

                                                            <p
                                                                class="font-semibold text-stone-800">

                                                                {{ $order->harvestListing->product_name ?? 'Product' }}

                                                            </p>


                                                            <p
                                                                class="text-xs text-stone-400">

                                                                Order #{{ $order->order_number ?? $order->id }}

                                                            </p>

                                                        </div>

                                                    </div>

                                                </td>


                                                <!-- Customer -->
                                                <td class="p-3.5">

                                                    @if($order->buyer)

                                                        <div
                                                            class="flex items-center gap-2">


                                                            <div
                                                                class="w-8 h-8 rounded-full bg-emerald-800 text-white flex items-center justify-center text-xs font-bold">

                                                                {{ strtoupper(
                                                                    substr(
                                                                        $order->buyer->first_name ?? 'U',
                                                                        0,
                                                                        1
                                                                    )
                                                                ) }}

                                                            </div>


                                                            <div>

                                                                <p
                                                                    class="font-medium text-stone-800">

                                                                    {{ $order->buyer->first_name }}
                                                                    {{ $order->buyer->last_name }}

                                                                </p>

                                                            </div>

                                                        </div>

                                                    @else

                                                        <span
                                                            class="text-stone-400">

                                                            Unknown Customer

                                                        </span>

                                                    @endif

                                                </td>


                                                <!-- Quantity -->
                                                <td class="p-3.5">

                                                    <span
                                                        class="font-medium">

                                                        {{ $order->quantity }}

                                                    </span>


                                                    @if($order->harvestListing)

                                                        <span
                                                            class="text-stone-400 text-xs">

                                                            {{ $order->harvestListing->unit }}

                                                        </span>

                                                    @endif

                                                </td>


                                                <!-- Status -->
                                                <td class="p-3.5">

                                                    @php

                                                        $status = strtolower(
                                                            $order->status ?? 'processing'
                                                        );

                                                        $statusClass = match ($status) {

                                                            'pending',
                                                            'processing'
                                                                => 'bg-amber-100 text-amber-800',

                                                            'confirmed'
                                                                => 'bg-purple-100 text-purple-800',

                                                            'shipped'
                                                                => 'bg-sky-100 text-sky-800',

                                                            'delivered'
                                                                => 'bg-emerald-100 text-emerald-800',

                                                            'cancelled'
                                                                => 'bg-red-100 text-red-800',

                                                            default
                                                                => 'bg-stone-100 text-stone-800',

                                                        };

                                                    @endphp


                                                    <span
                                                        class="{{ $statusClass }} px-2.5 py-1 rounded-md text-xs font-semibold">

                                                        {{ ucfirst($order->status ?? 'Processing') }}

                                                    </span>

                                                </td>


                                                <!-- View Details -->
                                                <td
                                                    class="p-3.5 text-right">

                                                    <a
                                                        href="{{ route('farmer.orders.index') }}"
                                                        class="inline-flex items-center gap-1.5 bg-[#1C5B32] hover:bg-emerald-900 text-white px-3 py-2 rounded-lg text-xs font-semibold transition-all duration-200 shadow-sm hover:shadow-md">

                                                        <span>
                                                            View Details
                                                        </span>

                                                        <i
                                                            data-lucide="arrow-up-right"
                                                            class="w-3.5 h-3.5">
                                                        </i>

                                                    </a>

                                                </td>

                                            </tr>


                                        @empty

                                            <tr>

                                                <td
                                                    colspan="5"
                                                    class="p-10 text-center">


                                                    <div
                                                        class="flex flex-col items-center">


                                                        <div
                                                            class="w-12 h-12 rounded-full bg-stone-100 flex items-center justify-center mb-3">

                                                            <i
                                                                data-lucide="shopping-bag"
                                                                class="w-6 h-6 text-stone-400">
                                                            </i>

                                                        </div>


                                                        <p
                                                            class="font-semibold text-stone-700">

                                                            No orders received yet.

                                                        </p>


                                                        <p
                                                            class="text-xs text-stone-400 mt-1">

                                                            Orders from buyers will appear here.

                                                        </p>

                                                    </div>

                                                </td>

                                            </tr>

                                        @endforelse

                                    </tbody>

                                </table>

                            </div>

                        </div>

                    </div>


                    <!-- ================================================= -->
                    <!-- RIGHT COLUMN -->
                    <!-- ================================================= -->

                    <div class="space-y-6">


                        <!-- ================================================= -->
                        <!-- RECENT MESSAGES -->
                        <!-- ================================================= -->

                        <div
                            class="bg-white rounded-xl border border-stone-200 shadow-sm overflow-hidden">


                            <!-- Header -->
                            <div
                                class="p-4 border-b border-stone-200 flex items-center justify-between">

                                <div>

                                    <h2
                                        class="font-bold text-stone-800 text-lg">

                                        Recent Messages

                                    </h2>

                                    <p
                                        class="text-xs text-stone-400 mt-1">

                                        Latest conversations

                                    </p>

                                </div>


                                <a
                                    href="{{ route('farmer.messages') }}"
                                    class="text-xs font-medium text-[#1C5B32] hover:underline">

                                    View All

                                </a>

                            </div>


                            <!-- Message List -->
                            <div class="p-3 space-y-2">

                                @forelse($recentMessages as $message)

                                    <div
                                        class="group flex items-center gap-3 p-3 rounded-lg hover:bg-stone-50 transition-colors border border-transparent hover:border-stone-200">


                                        <!-- Avatar -->
                                        <div
                                            class="w-10 h-10 rounded-full bg-emerald-800 text-white flex items-center justify-center font-bold text-sm shrink-0">

                                            {{ strtoupper(
                                                substr(
                                                    $message->sender->first_name ?? 'U',
                                                    0,
                                                    1
                                                )
                                            ) }}

                                        </div>


                                        <!-- Content -->
                                        <div class="flex-1 min-w-0">


                                            <!-- Name + Time -->
                                            <div
                                                class="flex items-center justify-between gap-2">

                                                <div
                                                    class="flex items-center gap-2 min-w-0">

                                                    <h3
                                                        class="font-bold text-stone-800 text-xs truncate">

                                                        {{ $message->sender->first_name ?? 'Unknown' }}
                                                        {{ $message->sender->last_name ?? '' }}

                                                    </h3>


                                                    @if(!$message->is_read)

                                                        <span
                                                            class="w-2 h-2 rounded-full bg-emerald-800 shrink-0">
                                                        </span>

                                                    @endif

                                                </div>


                                                <span
                                                    class="text-[10px] text-stone-400 shrink-0">

                                                    {{ $message->created_at->diffForHumans() }}

                                                </span>

                                            </div>


                                            <!-- Message -->
                                            <p
                                                class="text-xs text-stone-500 truncate mt-1">

                                                {{ $message->message }}

                                            </p>


                                            <!-- Reply -->
                                            <div
                                                class="flex justify-end mt-1">

                                                <a
                                                    href="{{ route('farmer.messages') }}"
                                                    class="text-[10px] font-medium text-stone-500 hover:text-[#1C5B32]">

                                                    Reply

                                                </a>

                                            </div>

                                        </div>

                                    </div>

                                @empty

                                    <!-- Empty State -->
                                    <div class="text-center py-8">

                                        <div
                                            class="w-10 h-10 rounded-full bg-stone-100 flex items-center justify-center mx-auto mb-2">

                                            <i
                                                data-lucide="message-square"
                                                class="w-5 h-5 text-stone-400">
                                            </i>

                                        </div>


                                        <p
                                            class="text-sm font-semibold text-stone-700">

                                            No recent messages.

                                        </p>


                                        <p
                                            class="text-xs text-stone-400 mt-1">

                                            Messages from buyers will appear here.

                                        </p>

                                    </div>

                                @endforelse

                            </div>

                        </div>


                        <!-- ================================================= -->
                        <!-- SALES OVERVIEW -->
                        <!-- ================================================= -->

                        @php

                            $startOfWeek = now()->startOfWeek();

                            $weeklySalesData = collect(range(0, 6))->map(
                                function ($day) use ($startOfWeek) {

                                    $date = $startOfWeek->copy()->addDays($day);

                                    $sales = \App\Models\Order::where(
                                        'farmer_id',
                                        Auth::id()
                                    )
                                    ->where(
                                        'status',
                                        'Delivered'
                                    )
                                    ->whereDate(
                                        'created_at',
                                        $date
                                    )
                                    ->sum('total_price');

                                    return [

                                        'day' => $date->format('D'),

                                        'date' => $date->format('M d'),

                                        'sales' => (float) $sales,

                                    ];

                                }
                            );


                            $maxSales = max(
                                $weeklySalesData->max('sales'),
                                1
                            );


                            $totalWeeklySales =
                                $weeklySalesData->sum('sales');

                        @endphp


                        <div>


                            <!-- Sales Header -->
                            <div
                                class="flex items-center justify-between mb-3">

                                <div>

                                    <h2
                                        class="font-bold text-stone-800 text-lg">

                                        Sales Overview

                                    </h2>

                                    <p
                                        class="text-xs text-stone-400 mt-1">

                                        Your delivered sales this week

                                    </p>

                                </div>


                                <div class="text-right">

                                    <p
                                        class="text-xs text-stone-400">

                                        This Week

                                    </p>


                                    <p
                                        class="text-lg font-bold text-[#1C5B32]">

                                        ₱{{ number_format($totalWeeklySales, 2) }}

                                    </p>

                                </div>

                            </div>


                            <!-- Chart -->
                            <div
                                class="bg-white p-4 rounded-xl border border-stone-200 shadow-sm">


                                <div class="flex h-40">


                                    <!-- Y Axis -->
                                    <div
                                        class="flex flex-col justify-between text-[10px] text-stone-400 pr-2">

                                        <span>
                                            ₱{{ number_format($maxSales, 0) }}
                                        </span>

                                        <span>
                                            ₱{{ number_format($maxSales * 0.75, 0) }}
                                        </span>

                                        <span>
                                            ₱{{ number_format($maxSales * 0.50, 0) }}
                                        </span>

                                        <span>
                                            ₱{{ number_format($maxSales * 0.25, 0) }}
                                        </span>

                                        <span>
                                            ₱0
                                        </span>

                                    </div>


                                    <!-- Chart Area -->
                                    <div
                                        class="flex-1 relative flex items-end justify-between px-2 border-l border-b border-stone-200">


                                        <!-- Guide Lines -->
                                        <div
                                            class="absolute inset-0 pointer-events-none">

                                            <div
                                                class="absolute top-0 left-0 right-0 border-t border-stone-100">
                                            </div>

                                            <div
                                                class="absolute top-1/4 left-0 right-0 border-t border-stone-100">
                                            </div>

                                            <div
                                                class="absolute top-1/2 left-0 right-0 border-t border-stone-100">
                                            </div>

                                            <div
                                                class="absolute top-3/4 left-0 right-0 border-t border-stone-100">
                                            </div>

                                        </div>


                                        <!-- Bars -->
                                        @foreach($weeklySalesData as $data)

                                            @php

                                                $height = $data['sales'] > 0

                                                    ? max(
                                                        ($data['sales'] / $maxSales) * 100,
                                                        4
                                                    )

                                                    : 2;

                                            @endphp


                                            <div
                                                class="relative h-full flex items-end justify-center group z-10">


                                                <!-- Tooltip -->
                                                <div
                                                    class="absolute bottom-full mb-2 hidden group-hover:block bg-stone-800 text-white text-[10px] px-2 py-1 rounded-md whitespace-nowrap z-20">

                                                    {{ $data['date'] }}:

                                                    ₱{{ number_format($data['sales'], 2) }}

                                                </div>


                                                <!-- Bar -->
                                                <div
                                                    class="w-4 bg-[#1C5B32] hover:bg-emerald-900 rounded-t transition-all duration-200"
                                                    style="height: {{ $height }}%;">
                                                </div>

                                            </div>

                                        @endforeach

                                    </div>

                                </div>


                                <!-- X Axis -->
                                <div
                                    class="flex justify-between text-[10px] text-stone-500 font-medium pl-6 pt-2">

                                    @foreach($weeklySalesData as $data)

                                        <span>
                                            {{ $data['day'] }}
                                        </span>

                                    @endforeach

                                </div>


                                <!-- Empty State -->
                                @if($totalWeeklySales <= 0)

                                    <div
                                        class="text-center mt-4">

                                        <p
                                            class="text-xs text-stone-400">

                                            No delivered sales recorded this week.

                                        </p>

                                    </div>

                                @endif

                            </div>

                        </div>

                    </div>

                </div>


            </div>


            <!-- ========================================================= -->
            <!-- FOOTER -->
            <!-- ========================================================= -->

            <footer
                class="p-4 text-center text-xs text-stone-500 border-t border-stone-200/60 mt-auto">

                © 2026 AniLink

            </footer>


        </main>

    </div>


    <!-- ========================================================= -->
    <!-- NOTIFICATION JAVASCRIPT -->
    <!-- ========================================================= -->

    <script>

        document.addEventListener('DOMContentLoaded', function () {

            const notificationButton =
                document.getElementById('notificationButton');

            const notificationDropdown =
                document.getElementById('notificationDropdown');

            const notificationWrapper =
                document.getElementById('notificationWrapper');


            if (
                !notificationButton ||
                !notificationDropdown ||
                !notificationWrapper
            ) {
                return;
            }


            // Open / close notification dropdown
            notificationButton.addEventListener('click', function (event) {

                event.stopPropagation();

                notificationDropdown.classList.toggle('hidden');

            });


            // Prevent dropdown from closing
            // when clicking inside
            notificationDropdown.addEventListener('click', function (event) {

                event.stopPropagation();

            });


            // Close dropdown when clicking outside
            document.addEventListener('click', function (event) {

                if (!notificationWrapper.contains(event.target)) {

                    notificationDropdown.classList.add('hidden');

                }

            });

        });

    </script>


    <!-- Initialize Lucide Icons -->
    <script>

        lucide.createIcons();

    </script>

</body>

</html>
