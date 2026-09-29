<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>AniLink - Orders Received</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Lucide Icons -->
    <script src="https://unpkg.com/lucide@latest"></script>

    <style>
        body {
            background-color: #E2DFD8;
            font-family: system-ui, -apple-system, BlinkMacSystemFont,
                'Segoe UI', Roboto, Oxygen, Cantarell, sans-serif;
        }

        .active-filter {
            background-color: #1C5B32 !important;
            color: white !important;
        }

        .order-row {
            transition: background-color 0.2s ease;
        }
    </style>
</head>


<body class="p-4 md:p-8 flex items-center justify-center min-h-screen">

    @php
        /*
        |--------------------------------------------------------------------------
        | ORDER COUNTS
        |--------------------------------------------------------------------------
        */

        $allCount = $orders->count();

        $processingCount = $orders
            ->whereIn('status', ['Pending', 'Confirmed'])
            ->count();

        $shippedCount = $orders
            ->where('status', 'Shipped')
            ->count();

        $deliveredCount = $orders
            ->where('status', 'Delivered')
            ->count();

        $cancelledCount = $orders
            ->where('status', 'Cancelled')
            ->count();

        $farmer = Auth::user();
    @endphp


    <!-- ====================================================== -->
    <!-- MAIN CONTAINER -->
    <!-- ====================================================== -->

    <div
        class="bg-[#F6F5F2] w-full max-w-7xl rounded-2xl shadow-xl
               flex flex-col md:flex-row overflow-hidden
               border border-stone-300"
    >


        <!-- ====================================================== -->
        <!-- SIDEBAR -->
        <!-- ====================================================== -->

        <aside
            class="w-full md:w-64 bg-[#F6F5F2]
                   border-b md:border-b-0 md:border-r
                   border-stone-200 p-6 flex flex-col
                   justify-between shrink-0"
        >

            <div>

                <!-- LOGO -->

                <div class="flex items-center gap-3 mb-8">

                    <div
                        class="w-10 h-10 rounded-full
                               bg-emerald-800 text-white
                               flex items-center justify-center
                               font-bold text-lg"
                    >
                        <i
                            data-lucide="sprout"
                            class="w-6 h-6"
                        ></i>
                    </div>

                    <span
                        class="text-2xl font-bold
                               text-stone-800 tracking-tight"
                    >
                        AniLink
                    </span>

                </div>


                <!-- ================================================= -->
                <!-- NAVIGATION -->
                <!-- ================================================= -->

                <nav class="space-y-2">


                    <!-- DASHBOARD -->

                    <a
                        href="{{ url('/farmer/dashboard') }}"
                        class="flex items-center gap-3 px-4 py-2.5
                               text-stone-700 hover:bg-stone-200/60
                               rounded-lg transition-colors font-medium"
                    >

                        <i
                            data-lucide="layout-dashboard"
                            class="w-5 h-5 text-stone-500"
                        ></i>

                        <span>Dashboard</span>

                    </a>


                    <!-- SELL HARVEST -->

                    <a
                        href="{{ url('/farmer/sell-harvest') }}"
                        class="flex items-center gap-3 px-4 py-2.5
                               text-stone-700 hover:bg-stone-200/60
                               rounded-lg transition-colors font-medium"
                    >

                        <i
                            data-lucide="wheat"
                            class="w-5 h-5 text-stone-500"
                        ></i>

                        <span>Sell Harvest</span>

                    </a>


                    <!-- MY LISTINGS -->

                    <a
                        href="{{ route('farmer.my-listings') }}"
                        class="flex items-center gap-3 px-4 py-2.5
                               text-stone-700 hover:bg-stone-200/60
                               rounded-lg transition-colors font-medium"
                    >

                        <i
                            data-lucide="archive"
                            class="w-5 h-5 text-stone-500"
                        ></i>

                        <span>My Listings</span>

                    </a>


                    <!-- ORDERS RECEIVED ACTIVE -->

                    <a
                        href="{{ route('farmer.orders.index') }}"
                        class="flex items-center justify-between
                               px-4 py-3
                               bg-[#1C5B32]
                               text-white rounded-lg
                               font-medium shadow-sm"
                    >

                        <div class="flex items-center gap-3">

                            <i
                                data-lucide="clipboard-list"
                                class="w-5 h-5"
                            ></i>

                            <span>Orders Received</span>

                        </div>


                        <span
                            class="text-xs
                                   bg-emerald-600/60
                                   px-2 py-0.5 rounded
                                   text-emerald-100"
                        >
                            {{ $allCount }}
                        </span>

                    </a>


                    <!-- SALES & EARNINGS -->

                    <a
                        href="{{ url('/farmer/sell-and-earnings') }}"
                        class="flex items-center gap-3 px-4 py-2.5
                               text-stone-700 hover:bg-stone-200/60
                               rounded-lg transition-colors font-medium"
                    >

                        <i
                            data-lucide="circle-dollar-sign"
                            class="w-5 h-5 text-stone-500"
                        ></i>

                        <span>Sales & Earnings</span>

                    </a>


                    <!-- CUSTOMER REVIEWS -->

                    <a
                        href="{{ route('farmer.reviews') }}"
                        class="flex items-center gap-3 px-4 py-2.5
                               text-stone-700 hover:bg-stone-200/60
                               rounded-lg transition-colors font-medium"
                    >

                        <i
                            data-lucide="star"
                            class="w-5 h-5 text-stone-500"
                        ></i>

                        <span>Customer Reviews</span>

                    </a>


                    <!-- MESSAGES -->

                    <a
                        href="{{ url('/farmer/messages') }}"
                        class="flex items-center justify-between
                               px-4 py-2.5
                               text-stone-700 hover:bg-stone-200/60
                               rounded-lg transition-colors font-medium"
                    >

                        <div class="flex items-center gap-3">

                            <i
                                data-lucide="message-square"
                                class="w-5 h-5 text-stone-500"
                            ></i>

                            <span>Messages</span>

                        </div>


                        @if(($unreadMessagesCount ?? 0) > 0)

                            <span
                                class="min-w-[20px] h-5 px-1.5
                                       bg-red-500 text-white
                                       text-[10px] font-bold
                                       rounded-full
                                       flex items-center justify-center"
                            >
                                {{ $unreadMessagesCount > 9 ? '9+' : $unreadMessagesCount }}
                            </span>

                        @endif

                    </a>


                    <!-- PROFILE -->

                    <a
                        href="{{ url('/farmer/profile') }}"
                        class="flex items-center gap-3 px-4 py-2.5
                               text-stone-700 hover:bg-stone-200/60
                               rounded-lg transition-colors font-medium"
                    >

                        <i
                            data-lucide="user"
                            class="w-5 h-5 text-stone-500"
                        ></i>

                        <span>Profile</span>

                    </a>


                    <!-- SETTINGS -->

                    <a
                        href="{{ url('/farmer/settings') }}"
                        class="flex items-center gap-3 px-4 py-2.5
                               text-stone-700 hover:bg-stone-200/60
                               rounded-lg transition-colors font-medium"
                    >

                        <i
                            data-lucide="settings"
                            class="w-5 h-5 text-stone-500"
                        ></i>

                        <span>Settings</span>

                    </a>

                </nav>

            </div>


            <!-- ================================================= -->
            <!-- LOGOUT -->
            <!-- ================================================= -->

            <div class="mt-8 pt-4 border-t border-stone-200">

                <form
                    action="{{ route('logout') }}"
                    method="POST"
                >

                    @csrf

                    <button
                        type="submit"
                        class="w-full flex items-center gap-3
                               px-4 py-2.5
                               text-stone-700
                               hover:bg-red-50
                               hover:text-red-600
                               rounded-lg
                               transition-colors
                               font-medium text-left"
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


        <!-- ====================================================== -->
        <!-- MAIN CONTENT -->
        <!-- ====================================================== -->

        <main class="flex-1 flex flex-col min-w-0">


            <!-- ================================================= -->
            <!-- HEADER -->
            <!-- ================================================= -->

            <header
                class="p-6 flex flex-col md:flex-row
                       items-center justify-between gap-4
                       border-b border-stone-200/60"
            >


                <!-- SEARCH -->

                <div class="relative w-full md:w-96">

                    <i
                        data-lucide="search"
                        class="w-5 h-5 absolute left-3
                               top-1/2 -translate-y-1/2
                               text-stone-400"
                    ></i>

                    <input
                        id="orderSearch"
                        type="text"
                        placeholder="Search orders by customer or ID..."
                        class="w-full pl-10 pr-4 py-2
                               bg-white
                               border border-stone-200
                               rounded-full text-sm
                               focus:outline-none
                               focus:ring-2
                               focus:ring-emerald-700
                               shadow-sm"
                    >

                </div>


                <!-- ================================================= -->
                <!-- USER + NOTIFICATION -->
                <!-- ================================================= -->

                <div
                    class="flex items-center gap-4
                           self-end md:self-auto"
                >


                    <!-- NOTIFICATION -->

                    <div
                        class="relative"
                        id="notificationWrapper"
                    >

                        <button
                            type="button"
                            id="notificationButton"
                            class="relative p-2
                                   rounded-lg
                                   text-stone-600
                                   hover:bg-stone-100
                                   transition-colors"
                            aria-label="Notifications"
                        >

                            <i
                                data-lucide="bell"
                                class="w-5 h-5"
                            ></i>


                            @if(($notificationCount ?? 0) > 0)

                                <span
                                    id="notificationBadge"
                                    class="absolute
                                           -top-0.5
                                           -right-0.5
                                           min-w-[18px]
                                           h-[18px]
                                           px-1
                                           bg-red-500
                                           text-white
                                           text-[9px]
                                           font-bold
                                           rounded-full
                                           flex
                                           items-center
                                           justify-center
                                           border-2
                                           border-[#F6F5F2]"
                                >
                                    {{ $notificationCount > 9 ? '9+' : $notificationCount }}
                                </span>

                            @endif

                        </button>


                        <!-- NOTIFICATION DROPDOWN -->

                        <div
                            id="notificationDropdown"
                            class="hidden absolute
                                   right-0 top-12
                                   w-80
                                   bg-white
                                   rounded-xl
                                   border border-stone-200
                                   shadow-xl
                                   z-50
                                   overflow-hidden"
                        >


                            <!-- HEADER -->

                            <div
                                class="px-4 py-3
                                       border-b
                                       border-stone-200
                                       flex items-center
                                       justify-between"
                            >

                                <div>

                                    <h3
                                        class="font-bold
                                               text-stone-800
                                               text-sm"
                                    >
                                        Notifications
                                    </h3>

                                    <p
                                        class="text-[10px]
                                               text-stone-400
                                               mt-0.5"
                                    >
                                        Recent activity
                                    </p>

                                </div>


                                @if(($notificationCount ?? 0) > 0)

                                    <span
                                        class="text-[10px]
                                               font-semibold
                                               text-[#1C5B32]"
                                    >
                                        {{ $notificationCount }} new
                                    </span>

                                @endif

                            </div>


                            <!-- NOTIFICATION LIST -->

                            <div
                                class="max-h-80
                                       overflow-y-auto"
                            >

                                @forelse($notifications ?? [] as $notification)

                                    <a
                                        href="{{ route('farmer.orders.index') }}"
                                        class="flex gap-3
                                               px-4 py-3
                                               hover:bg-stone-50
                                               transition-colors
                                               border-b
                                               border-stone-100"
                                    >

                                        <!-- ICON -->

                                        <div
                                            class="w-9 h-9
                                                   rounded-full
                                                   bg-[#1C5B32]
                                                   text-white
                                                   flex items-center
                                                   justify-center
                                                   shrink-0"
                                        >

                                            <i
                                                data-lucide="{{ $notification->icon ?? 'bell' }}"
                                                class="w-4 h-4"
                                            ></i>

                                        </div>


                                        <!-- TEXT -->

                                        <div
                                            class="flex-1
                                                   min-w-0"
                                        >

                                            <p
                                                class="text-xs
                                                       font-semibold
                                                       text-stone-800"
                                            >
                                                {{ $notification->title }}
                                            </p>

                                            <p
                                                class="text-[11px]
                                                       text-stone-500
                                                       mt-0.5"
                                            >
                                                {{ $notification->message }}
                                            </p>

                                            <p
                                                class="text-[10px]
                                                       text-stone-400
                                                       mt-1"
                                            >
                                                {{ $notification->created_at->diffForHumans() }}
                                            </p>

                                        </div>


                                        @if(!$notification->read_at)

                                            <span
                                                class="w-2 h-2
                                                       rounded-full
                                                       bg-[#1C5B32]
                                                       mt-2
                                                       shrink-0"
                                            ></span>

                                        @endif

                                    </a>

                                @empty

                                    <div
                                        class="px-4 py-10
                                               text-center"
                                    >

                                        <div
                                            class="w-11 h-11
                                                   mx-auto
                                                   rounded-full
                                                   bg-stone-100
                                                   flex items-center
                                                   justify-center
                                                   mb-3"
                                        >

                                            <i
                                                data-lucide="bell-off"
                                                class="w-5 h-5
                                                       text-stone-400"
                                            ></i>

                                        </div>

                                        <p
                                            class="text-sm
                                                   font-semibold
                                                   text-stone-700"
                                        >
                                            No notifications
                                        </p>

                                        <p
                                            class="text-[11px]
                                                   text-stone-400
                                                   mt-1"
                                        >
                                            You're all caught up!
                                        </p>

                                    </div>

                                @endforelse

                            </div>


                            <!-- FOOTER -->

                            <div
                                class="border-t
                                       border-stone-200
                                       p-2"
                            >

                                <a
                                    href="{{ route('farmer.orders.index') }}"
                                    class="block
                                           text-center
                                           text-xs
                                           font-semibold
                                           text-[#1C5B32]
                                           hover:bg-stone-50
                                           rounded-lg
                                           py-2
                                           transition-colors"
                                >
                                    View Orders
                                </a>

                            </div>

                        </div>

                    </div>


                    <!-- FARMER -->

                    <div
                        class="flex items-center gap-3"
                    >

                        <div
                            class="w-10 h-10
                                   rounded-full
                                   bg-emerald-800
                                   text-white
                                   flex items-center
                                   justify-center
                                   font-bold"
                        >

                            {{ strtoupper(
                                substr(
                                    $farmer->first_name ?? 'F',
                                    0,
                                    1
                                )
                            ) }}

                        </div>


                        <span
                            class="font-bold
                                   text-stone-800
                                   text-sm"
                        >

                            Farmer
                            {{ $farmer->first_name }}
                            {{ $farmer->last_name }}

                        </span>

                    </div>

                </div>

            </header>


            <!-- ================================================= -->
            <!-- CONTENT -->
            <!-- ================================================= -->

            <div
                class="p-6
                       space-y-6
                       overflow-y-auto"
            >


                <!-- ================================================= -->
                <!-- SUCCESS -->
                <!-- ================================================= -->

                @if(session('success'))

                    <div
                        class="bg-green-50
                               border border-green-200
                               text-green-700
                               px-4 py-3
                               rounded-xl
                               flex items-center gap-2"
                    >

                        <i
                            data-lucide="check-circle"
                            class="w-5 h-5"
                        ></i>

                        <span>
                            {{ session('success') }}
                        </span>

                    </div>

                @endif


                <!-- ================================================= -->
                <!-- ERROR -->
                <!-- ================================================= -->

                @if(session('error'))

                    <div
                        class="bg-red-50
                               border border-red-200
                               text-red-700
                               px-4 py-3
                               rounded-xl
                               flex items-center gap-2"
                    >

                        <i
                            data-lucide="alert-circle"
                            class="w-5 h-5"
                        ></i>

                        <span>
                            {{ session('error') }}
                        </span>

                    </div>

                @endif


                <!-- ================================================= -->
                <!-- TITLE -->
                <!-- ================================================= -->

                <div
                    class="flex flex-col
                           sm:flex-row
                           justify-between
                           sm:items-center
                           gap-4
                           border-b
                           border-stone-200/60
                           pb-4"
                >

                    <div>

                        <h1
                            class="text-2xl
                                   font-bold
                                   text-stone-800"
                        >
                            Orders Received
                        </h1>

                        <p
                            class="text-stone-500
                                   text-sm"
                        >
                            Track, fulfill, and update buyer orders in real time.
                        </p>

                    </div>


                    <!-- PRINT -->

                    <button
                        type="button"
                        onclick="window.print()"
                        class="bg-white
                               hover:bg-stone-50
                               border border-stone-300
                               text-stone-700
                               font-medium
                               px-4 py-2
                               rounded-xl
                               text-sm
                               inline-flex
                               items-center
                               gap-2
                               transition-colors
                               shadow-sm"
                    >

                        <i
                            data-lucide="printer"
                            class="w-4 h-4"
                        ></i>

                        Print Orders

                    </button>

                </div>


                <!-- ================================================= -->
                <!-- FILTERS -->
                <!-- ================================================= -->

                <div
                    class="flex flex-col
                           md:flex-row
                           items-center
                           justify-between
                           gap-4
                           bg-white
                           p-4
                           rounded-xl
                           border border-stone-200
                           shadow-sm"
                >


                    <!-- STATUS -->

                    <div
                        class="flex gap-2
                               w-full md:w-auto
                               overflow-x-auto
                               pb-2 md:pb-0"
                    >

                        <!-- ALL -->

                        <button
                            type="button"
                            onclick="setStatusFilter('all', this)"
                            class="order-filter
                                   active-filter
                                   px-4 py-1.5
                                   rounded-lg
                                   text-xs
                                   font-semibold
                                   whitespace-nowrap"
                        >
                            All Orders ({{ $allCount }})
                        </button>


                        <!-- PROCESSING -->

                        <button
                            type="button"
                            onclick="setStatusFilter('processing', this)"
                            class="order-filter
                                   px-4 py-1.5
                                   bg-stone-100
                                   hover:bg-stone-200
                                   text-stone-700
                                   rounded-lg
                                   text-xs
                                   font-semibold
                                   whitespace-nowrap"
                        >

                            Processing

                            <span
                                class="bg-amber-200
                                       text-amber-900
                                       px-1.5 py-0.5
                                       rounded-full
                                       text-[10px]"
                            >
                                {{ $processingCount }}
                            </span>

                        </button>


                        <!-- SHIPPED -->

                        <button
                            type="button"
                            onclick="setStatusFilter('shipped', this)"
                            class="order-filter
                                   px-4 py-1.5
                                   bg-stone-100
                                   hover:bg-stone-200
                                   text-stone-700
                                   rounded-lg
                                   text-xs
                                   font-semibold
                                   whitespace-nowrap"
                        >

                            Shipped

                            <span
                                class="bg-sky-200
                                       text-sky-900
                                       px-1.5 py-0.5
                                       rounded-full
                                       text-[10px]"
                            >
                                {{ $shippedCount }}
                            </span>

                        </button>


                        <!-- DELIVERED -->

                        <button
                            type="button"
                            onclick="setStatusFilter('delivered', this)"
                            class="order-filter
                                   px-4 py-1.5
                                   bg-stone-100
                                   hover:bg-stone-200
                                   text-stone-700
                                   rounded-lg
                                   text-xs
                                   font-semibold
                                   whitespace-nowrap"
                        >

                            Delivered

                            <span
                                class="bg-emerald-200
                                       text-emerald-900
                                       px-1.5 py-0.5
                                       rounded-full
                                       text-[10px]"
                            >
                                {{ $deliveredCount }}
                            </span>

                        </button>

                    </div>


                    <!-- DATE -->

                    <div
                        class="flex items-center
                               gap-3
                               w-full md:w-auto
                               justify-end"
                    >

                        <div
                            class="relative
                                   w-full sm:w-auto"
                        >

                            <i
                                data-lucide="calendar"
                                class="w-4 h-4
                                       absolute left-3
                                       top-1/2
                                       -translate-y-1/2
                                       text-stone-400"
                            ></i>

                            <select
                                id="dateFilter"
                                class="pl-9 pr-4
                                       py-1.5
                                       bg-stone-50
                                       border
                                       border-stone-200
                                       rounded-lg
                                       text-xs
                                       font-medium
                                       text-stone-700
                                       focus:outline-none
                                       focus:ring-2
                                       focus:ring-emerald-700
                                       w-full"
                            >

                                <option value="all">
                                    All Time
                                </option>

                                <option value="this-week">
                                    This Week
                                </option>

                                <option value="this-month">
                                    This Month
                                </option>

                                <option value="last-30">
                                    Last 30 Days
                                </option>

                            </select>

                        </div>

                    </div>

                </div>


                <!-- ================================================= -->
                <!-- ORDERS TABLE -->
                <!-- ================================================= -->

                <div
                    class="bg-white
                           rounded-2xl
                           border border-stone-200
                           overflow-hidden
                           shadow-sm"
                >

                    <div class="overflow-x-auto">

                        <table
                            class="w-full
                                   text-left
                                   border-collapse
                                   text-sm"
                        >

                            <!-- HEADER -->

                            <thead>

                                <tr
                                    class="bg-stone-100/80
                                           text-stone-700
                                           border-b
                                           border-stone-200"
                                >

                                    <th class="p-4 font-semibold">
                                        Order ID
                                    </th>

                                    <th class="p-4 font-semibold">
                                        Product
                                    </th>

                                    <th class="p-4 font-semibold">
                                        Customer
                                    </th>

                                    <th class="p-4 font-semibold">
                                        Qty
                                    </th>

                                    <th class="p-4 font-semibold">
                                        Total Price
                                    </th>

                                    <th class="p-4 font-semibold">
                                        Fulfillment
                                    </th>

                                    <th class="p-4 font-semibold">
                                        Status
                                    </th>

                                    <th
                                        class="p-4 font-semibold text-right"
                                    >
                                        Action
                                    </th>

                                </tr>

                            </thead>


                            <!-- BODY -->

                            <tbody id="ordersTableBody">

                                @forelse($orders as $order)

                                    @php

                                        $status =
                                            strtolower(
                                                trim(
                                                    $order->status ?? 'Pending'
                                                )
                                            );

                                        $orderNumber =
                                            $order->order_number
                                            ?? $order->id;

                                        $customerName =
                                            trim(
                                                ($order->buyer->first_name ?? '') .
                                                ' ' .
                                                ($order->buyer->last_name ?? '')
                                            );

                                        if ($customerName === '') {
                                            $customerName = 'Customer';
                                        }

                                        $productName =
                                            $order->harvestListing->product_name
                                            ?? 'Product';

                                        $unit =
                                            $order->harvestListing->unit
                                            ?? 'unit';

                                    @endphp


                                    <tr
                                        class="order-row
                                               border-b
                                               hover:bg-stone-50"
                                        data-status="{{ $status }}"
                                        data-date="{{ $order->created_at?->format('Y-m-d') }}"
                                        data-search="{{ strtolower(
                                            $orderNumber . ' ' .
                                            $customerName . ' ' .
                                            $productName
                                        ) }}"
                                    >


                                        <!-- ORDER ID -->

                                        <td
                                            class="px-6 py-4
                                                   font-medium"
                                        >

                                            #{{ $orderNumber }}

                                            <div
                                                class="text-xs
                                                       text-stone-400
                                                       mt-1"
                                            >
                                                {{ $order->created_at?->format('M d, Y') }}
                                            </div>

                                        </td>


                                        <!-- PRODUCT -->

                                        <td class="px-6 py-4">

                                            <div
                                                class="flex
                                                       items-center
                                                       gap-3"
                                            >

                                                <div
                                                    class="w-10 h-10
                                                           rounded-lg
                                                           bg-stone-100
                                                           overflow-hidden
                                                           flex
                                                           items-center
                                                           justify-center
                                                           shrink-0"
                                                >

                                                    @if(
                                                        $order->harvestListing &&
                                                        $order->harvestListing->image
                                                    )

                                                        <img
                                                            src="{{ asset(
                                                                'storage/' .
                                                                $order->harvestListing->image
                                                            ) }}"
                                                            alt="{{ $productName }}"
                                                            class="w-full
                                                                   h-full
                                                                   object-cover"
                                                        >

                                                    @else

                                                        <span class="text-lg">
                                                            🌾
                                                        </span>

                                                    @endif

                                                </div>

                                                <div>

                                                    <div
                                                        class="font-medium
                                                               text-stone-800"
                                                    >
                                                        {{ $productName }}
                                                    </div>

                                                    <div
                                                        class="text-xs
                                                               text-stone-400
                                                               mt-1"
                                                    >
                                                        ₱{{ number_format($order->unit_price ?? 0, 2) }}
                                                        / {{ $unit }}
                                                    </div>

                                                </div>

                                            </div>

                                        </td>


                                        <!-- CUSTOMER -->

                                        <td class="px-6 py-4">

                                            <div
                                                class="flex
                                                       items-center
                                                       gap-2"
                                            >

                                                <div
                                                    class="w-8 h-8
                                                           rounded-full
                                                           bg-emerald-800
                                                           text-white
                                                           flex
                                                           items-center
                                                           justify-center
                                                           text-xs
                                                           font-bold"
                                                >

                                                    {{ strtoupper(
                                                        substr(
                                                            $order->buyer->first_name ?? 'C',
                                                            0,
                                                            1
                                                        )
                                                    ) }}

                                                </div>

                                                <div>

                                                    <p
                                                        class="font-medium
                                                               text-stone-800"
                                                    >
                                                        {{ $customerName }}
                                                    </p>

                                                    @if($order->buyer?->email)

                                                        <p
                                                            class="text-[10px]
                                                                   text-stone-400"
                                                        >
                                                            {{ $order->buyer->email }}
                                                        </p>

                                                    @endif

                                                </div>

                                            </div>

                                        </td>


                                        <!-- QUANTITY -->

                                        <td class="px-6 py-4">

                                            {{ $order->quantity }}
                                            {{ $unit }}

                                        </td>


                                        <!-- TOTAL -->

                                        <td
                                            class="px-6 py-4
                                                   font-semibold"
                                        >

                                            ₱{{ number_format(
                                                $order->total_price ?? 0,
                                                2
                                            ) }}

                                        </td>


                                        <!-- FULFILLMENT -->

                                        <td class="px-6 py-4">

                                            @if(
                                                $order->fulfillment_method
                                                === 'Farm Pickup'
                                            )

                                                <span
                                                    class="inline-flex
                                                           items-center
                                                           gap-1.5
                                                           px-2.5 py-1
                                                           rounded-full
                                                           bg-orange-100
                                                           text-orange-700
                                                           text-xs
                                                           font-medium"
                                                >

                                                    <i
                                                        data-lucide="map-pin"
                                                        class="w-3.5 h-3.5"
                                                    ></i>

                                                    Farm Pickup

                                                </span>

                                            @else

                                                <span
                                                    class="inline-flex
                                                           items-center
                                                           gap-1.5
                                                           px-2.5 py-1
                                                           rounded-full
                                                           bg-blue-100
                                                           text-blue-700
                                                           text-xs
                                                           font-medium"
                                                >

                                                    <i
                                                        data-lucide="truck"
                                                        class="w-3.5 h-3.5"
                                                    ></i>

                                                    Local Delivery

                                                </span>

                                            @endif

                                        </td>


                                        <!-- STATUS -->

                                        <td class="px-6 py-4">

                                            @if($order->status === 'Pending')

                                                <span
                                                    class="px-2.5 py-1
                                                           rounded-full
                                                           bg-amber-100
                                                           text-amber-700
                                                           text-xs
                                                           font-medium"
                                                >
                                                    Pending
                                                </span>

                                            @elseif($order->status === 'Confirmed')

                                                <span
                                                    class="px-2.5 py-1
                                                           rounded-full
                                                           bg-green-100
                                                           text-green-700
                                                           text-xs
                                                           font-medium"
                                                >
                                                    Confirmed
                                                </span>

                                            @elseif($order->status === 'Shipped')

                                                <span
                                                    class="px-2.5 py-1
                                                           rounded-full
                                                           bg-blue-100
                                                           text-blue-700
                                                           text-xs
                                                           font-medium"
                                                >
                                                    Shipped
                                                </span>

                                            @elseif($order->status === 'Delivered')

                                                <span
                                                    class="px-2.5 py-1
                                                           rounded-full
                                                           bg-emerald-100
                                                           text-emerald-700
                                                           text-xs
                                                           font-medium"
                                                >
                                                    Delivered
                                                </span>

                                            @elseif($order->status === 'Cancelled')

                                                <span
                                                    class="px-2.5 py-1
                                                           rounded-full
                                                           bg-red-100
                                                           text-red-700
                                                           text-xs
                                                           font-medium"
                                                >
                                                    Cancelled
                                                </span>

                                            @else

                                                <span
                                                    class="px-2.5 py-1
                                                           rounded-full
                                                           bg-stone-100
                                                           text-stone-600
                                                           text-xs
                                                           font-medium"
                                                >
                                                    {{ $order->status }}
                                                </span>

                                            @endif

                                        </td>


                                        <!-- ACTION -->

                                        <td
                                            class="px-6 py-4
                                                   text-right"
                                        >


                                            <!-- PENDING -->

                                            @if($order->status === 'Pending')

                                                <form
                                                    method="POST"
                                                    action="{{ route(
                                                        'farmer.orders.confirm',
                                                        $order
                                                    ) }}"
                                                >

                                                    @csrf

                                                    @method('PATCH')

                                                    <button
                                                        type="submit"
                                                        class="px-4 py-2
                                                               rounded-lg
                                                               bg-green-600
                                                               hover:bg-green-700
                                                               text-white
                                                               text-xs
                                                               font-medium"
                                                    >
                                                        Confirm Order
                                                    </button>

                                                </form>


                                            <!-- CONFIRMED -->

                                            @elseif($order->status === 'Confirmed')

                                                <form
                                                    method="POST"
                                                    action="{{ route(
                                                        'farmer.orders.ship',
                                                        $order
                                                    ) }}"
                                                >

                                                    @csrf

                                                    @method('PATCH')

                                                    <button
                                                        type="submit"
                                                        class="px-4 py-2
                                                               rounded-lg
                                                               bg-blue-600
                                                               hover:bg-blue-700
                                                               text-white
                                                               text-xs
                                                               font-medium"
                                                    >
                                                        Mark Shipped
                                                    </button>

                                                </form>


                                            <!-- SHIPPED -->

                                            @elseif($order->status === 'Shipped')

                                                <form
                                                    method="POST"
                                                    action="{{ route(
                                                        'farmer.orders.deliver',
                                                        $order
                                                    ) }}"
                                                >

                                                    @csrf

                                                    @method('PATCH')

                                                    <button
                                                        type="submit"
                                                        class="px-4 py-2
                                                               rounded-lg
                                                               bg-green-600
                                                               hover:bg-green-700
                                                               text-white
                                                               text-xs
                                                               font-medium"
                                                    >
                                                        Mark Delivered
                                                    </button>

                                                </form>


                                            <!-- DELIVERED -->

                                            @elseif($order->status === 'Delivered')

                                                <span
                                                    class="inline-flex
                                                           items-center
                                                           gap-1
                                                           text-green-600
                                                           font-medium
                                                           text-xs"
                                                >

                                                    <i
                                                        data-lucide="check-circle"
                                                        class="w-4 h-4"
                                                    ></i>

                                                    Completed

                                                </span>


                                            <!-- CANCELLED -->

                                            @elseif($order->status === 'Cancelled')

                                                <span
                                                    class="inline-flex
                                                           items-center
                                                           gap-1
                                                           text-red-500
                                                           font-medium
                                                           text-xs"
                                                >

                                                    <i
                                                        data-lucide="x-circle"
                                                        class="w-4 h-4"
                                                    ></i>

                                                    Cancelled

                                                </span>

                                            @endif

                                        </td>

                                    </tr>

                                @empty

                                    <tr>

                                        <td
                                            colspan="8"
                                            class="px-6 py-12
                                                   text-center
                                                   text-gray-500"
                                        >

                                            <div
                                                class="flex
                                                       flex-col
                                                       items-center
                                                       gap-3"
                                            >

                                                <i
                                                    data-lucide="clipboard-list"
                                                    class="w-10 h-10
                                                           text-stone-300"
                                                ></i>

                                                <p>
                                                    No orders received yet.
                                                </p>

                                            </div>

                                        </td>

                                    </tr>

                                @endforelse

                            </tbody>

                        </table>

                    </div>


                    <!-- RESULT COUNT -->

                    <div
                        class="flex
                               items-center
                               justify-between
                               bg-stone-50
                               p-4
                               border-t
                               border-stone-200
                               text-xs
                               text-stone-600"
                    >

                        <span id="orderCount">

                            Showing
                            {{ $allCount }}
                            {{ $allCount === 1 ? 'order' : 'orders' }}

                        </span>

                    </div>

                </div>

            </div>


            <!-- FOOTER -->

            <footer
                class="p-4
                       text-center
                       text-xs
                       text-stone-500
                       border-t
                       border-stone-200/60
                       mt-auto"
            >
                © 2026 AniLink
            </footer>

        </main>

    </div>


    <!-- ========================================================== -->
    <!-- JAVASCRIPT -->
    <!-- ========================================================== -->

    <script>

        /*
        |--------------------------------------------------------------------------
        | LUCIDE
        |--------------------------------------------------------------------------
        */

        lucide.createIcons();


        /*
        |--------------------------------------------------------------------------
        | NOTIFICATION DROPDOWN
        |--------------------------------------------------------------------------
        */

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

            notificationButton.addEventListener(
                'click',
                function(event) {

                    event.stopPropagation();

                    notificationDropdown.classList.toggle(
                        'hidden'
                    );

                }
            );


            notificationDropdown.addEventListener(
                'click',
                function(event) {

                    event.stopPropagation();

                }
            );


            document.addEventListener(
                'click',
                function(event) {

                    if (
                        !notificationWrapper.contains(
                            event.target
                        )
                    ) {

                        notificationDropdown.classList.add(
                            'hidden'
                        );

                    }

                }
            );

        }


        /*
        |--------------------------------------------------------------------------
        | STATUS
        |--------------------------------------------------------------------------
        */

        let currentStatus = 'all';


        function setStatusFilter(status, button) {

            currentStatus = status;


            document
                .querySelectorAll('.order-filter')
                .forEach(function(btn) {

                    btn.classList.remove(
                        'active-filter'
                    );

                    btn.classList.add(
                        'bg-stone-100',
                        'text-stone-700'
                    );

                });


            button.classList.remove(
                'bg-stone-100',
                'text-stone-700'
            );

            button.classList.add(
                'active-filter'
            );


            applyFilters();

        }


        /*
        |--------------------------------------------------------------------------
        | SEARCH
        |--------------------------------------------------------------------------
        */

        const searchInput =
            document.getElementById('orderSearch');


        if (searchInput) {

            searchInput.addEventListener(
                'input',
                applyFilters
            );

        }


        /*
        |--------------------------------------------------------------------------
        | DATE
        |--------------------------------------------------------------------------
        */

        const dateFilter =
            document.getElementById('dateFilter');


        if (dateFilter) {

            dateFilter.addEventListener(
                'change',
                applyFilters
            );

        }


        /*
        |--------------------------------------------------------------------------
        | FILTER ORDERS
        |--------------------------------------------------------------------------
        */

        function applyFilters() {

            const rows =
                document.querySelectorAll(
                    '.order-row'
                );


            const search =
                searchInput
                    ? searchInput.value
                        .toLowerCase()
                        .trim()
                    : '';


            const selectedDate =
                dateFilter
                    ? dateFilter.value
                    : 'all';


            let visibleCount = 0;


            rows.forEach(function(row) {

                const status =
                    row.dataset.status || '';


                const date =
                    row.dataset.date || '';


                const searchText =
                    row.dataset.search || '';


                /*
                ------------------------------------------------------
                STATUS
                ------------------------------------------------------
                */

                let statusMatch = true;


                if (currentStatus === 'processing') {

                    statusMatch =
                        status === 'pending' ||
                        status === 'confirmed';

                }

                else if (currentStatus === 'shipped') {

                    statusMatch =
                        status === 'shipped';

                }

                else if (currentStatus === 'delivered') {

                    statusMatch =
                        status === 'delivered';

                }


                /*
                ------------------------------------------------------
                SEARCH
                ------------------------------------------------------
                */

                const searchMatch =
                    search === '' ||
                    searchText.includes(search);


                /*
                ------------------------------------------------------
                DATE
                ------------------------------------------------------
                */

                const dateMatch =
                    checkDate(
                        date,
                        selectedDate
                    );


                /*
                ------------------------------------------------------
                SHOW / HIDE
                ------------------------------------------------------
                */

                if (
                    statusMatch &&
                    searchMatch &&
                    dateMatch
                ) {

                    row.style.display = '';

                    visibleCount++;

                }

                else {

                    row.style.display = 'none';

                }

            });


            updateCount(
                visibleCount
            );


            updateEmptyMessage(
                visibleCount
            );

        }


        /*
        |--------------------------------------------------------------------------
        | DATE CHECK
        |--------------------------------------------------------------------------
        */

        function checkDate(
            dateString,
            filter
        ) {

            if (
                filter === 'all' ||
                !dateString
            ) {

                return true;

            }


            const orderDate =
                new Date(
                    dateString +
                    'T00:00:00'
                );


            const today =
                new Date();


            today.setHours(
                23,
                59,
                59,
                999
            );


            /*
            ----------------------------------------------------------
            THIS WEEK
            ----------------------------------------------------------
            */

            if (
                filter === 'this-week'
            ) {

                const startOfWeek =
                    new Date(today);


                const day =
                    startOfWeek.getDay();


                const difference =
                    day === 0
                        ? 6
                        : day - 1;


                startOfWeek.setDate(
                    startOfWeek.getDate() -
                    difference
                );


                startOfWeek.setHours(
                    0,
                    0,
                    0,
                    0
                );


                return (
                    orderDate >= startOfWeek &&
                    orderDate <= today
                );

            }


            /*
            ----------------------------------------------------------
            THIS MONTH
            ----------------------------------------------------------
            */

            if (
                filter === 'this-month'
            ) {

                const startOfMonth =
                    new Date(
                        today.getFullYear(),
                        today.getMonth(),
                        1
                    );


                return (
                    orderDate >= startOfMonth &&
                    orderDate <= today
                );

            }


            /*
            ----------------------------------------------------------
            LAST 30 DAYS
            ----------------------------------------------------------
            */

            if (
                filter === 'last-30'
            ) {

                const last30 =
                    new Date(today);


                last30.setDate(
                    last30.getDate() -
                    30
                );


                last30.setHours(
                    0,
                    0,
                    0,
                    0
                );


                return (
                    orderDate >= last30 &&
                    orderDate <= today
                );

            }


            return true;

        }


        /*
        |--------------------------------------------------------------------------
        | UPDATE COUNT
        |--------------------------------------------------------------------------
        */

        function updateCount(count) {

            const element =
                document.getElementById(
                    'orderCount'
                );


            if (!element) {
                return;
            }


            element.textContent =
                'Showing ' +
                count +
                ' ' +
                (
                    count === 1
                        ? 'order'
                        : 'orders'
                );

        }


        /*
        |--------------------------------------------------------------------------
        | EMPTY FILTER MESSAGE
        |--------------------------------------------------------------------------
        */

        function updateEmptyMessage(
            count
        ) {

            const tbody =
                document.getElementById(
                    'ordersTableBody'
                );


            if (!tbody) {
                return;
            }


            let emptyMessage =
                document.getElementById(
                    'noFilteredOrders'
                );


            if (count === 0) {

                if (!emptyMessage) {

                    emptyMessage =
                        document.createElement(
                            'tr'
                        );


                    emptyMessage.id =
                        'noFilteredOrders';


                    emptyMessage.innerHTML = `
                        <td
                            colspan="8"
                            class="px-6 py-12
                                   text-center
                                   text-gray-500"
                        >

                            <div
                                class="flex
                                       flex-col
                                       items-center
                                       gap-3"
                            >

                                <i
                                    data-lucide="search-x"
                                    class="w-10 h-10
                                           text-stone-300"
                                ></i>

                                <p
                                    class="font-medium"
                                >
                                    No orders match your filter.
                                </p>

                                <p
                                    class="text-xs
                                           text-stone-400"
                                >
                                    Try another status,
                                    date, or search.
                                </p>

                            </div>

                        </td>
                    `;


                    tbody.appendChild(
                        emptyMessage
                    );


                    lucide.createIcons();

                }

            }

            else {

                if (emptyMessage) {

                    emptyMessage.remove();

                }

            }

        }

    </script>

</body>

</html>