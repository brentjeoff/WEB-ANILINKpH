<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>AniLink - Sales & Earnings</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Lucide Icons -->
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

    <!-- MAIN CONTAINER -->
    <div class="bg-[#F6F5F2] w-full max-w-7xl rounded-2xl shadow-xl flex flex-col md:flex-row overflow-hidden border border-stone-300">

        <!-- ===================================================== -->
        <!-- SIDEBAR -->
        <!-- ===================================================== -->

        <aside class="w-full md:w-64 bg-[#F6F5F2] border-b md:border-b-0 md:border-r border-stone-200 p-6 flex flex-col justify-between shrink-0">

            <div>

                <!-- LOGO -->
                <div class="flex items-center gap-3 mb-8">

                    <div class="w-10 h-10 rounded-full bg-emerald-800 text-white flex items-center justify-center font-bold text-lg">
                        <i data-lucide="sprout" class="w-6 h-6"></i>
                    </div>

                    <span class="text-2xl font-bold text-stone-800 tracking-tight">
                        AniLink
                    </span>

                </div>


                <!-- NAVIGATION -->
                <nav class="space-y-2">

                    <!-- Dashboard -->
                    <a
                        href="/farmer/dashboard"
                        class="flex items-center gap-3 px-4 py-2.5 text-stone-700 hover:bg-stone-200/60 rounded-lg transition-colors font-medium"
                    >
                        <i data-lucide="layout-dashboard" class="w-5 h-5 text-stone-500"></i>
                        <span>Dashboard</span>
                    </a>


                    <!-- Sell Harvest -->
                    <a
                        href="/farmer/sell-harvest"
                        class="flex items-center gap-3 px-4 py-2.5 text-stone-700 hover:bg-stone-200/60 rounded-lg transition-colors font-medium"
                    >
                        <i data-lucide="wheat" class="w-5 h-5 text-stone-500"></i>
                        <span>Sell Harvest</span>
                    </a>


                    <!-- My Listings -->
                    <a
                        href="{{ route('farmer.my-listings') }}"
                        class="flex items-center gap-3 px-4 py-2.5 text-stone-700 hover:bg-stone-200/60 rounded-lg transition-colors font-medium"
                    >
                        <i data-lucide="archive" class="w-5 h-5 text-stone-500"></i>
                        <span>My Listings</span>
                    </a>


                    <!-- Orders Received -->
                    <a
                        href="{{ route('farmer.orders.index') }}"
                        class="flex items-center gap-3 px-4 py-2.5 text-stone-700 hover:bg-stone-200/60 rounded-lg transition-colors font-medium"
                    >
                        <i data-lucide="clipboard-list" class="w-5 h-5 text-stone-500"></i>
                        <span>Orders Received</span>
                    </a>


                    <!-- Sales & Earnings -->
                    <a
                        href="{{ route('farmer.sales.index') }}"
                        class="flex items-center justify-between px-4 py-3 bg-[#1C5B32] text-white rounded-lg font-medium shadow-sm"
                    >
                        <div class="flex items-center gap-3">
                            <i data-lucide="circle-dollar-sign" class="w-5 h-5"></i>
                            <span>Sales & Earnings</span>
                        </div>

                        <span class="text-xs bg-emerald-600/60 px-2 py-0.5 rounded text-emerald-100">
                            Active
                        </span>
                    </a>


                    <!-- Customer Reviews -->
                    <a
                        href="{{ route('farmer.reviews') }}"
                        class="flex items-center gap-3 px-4 py-2.5 text-stone-700 hover:bg-stone-200/60 rounded-lg transition-colors font-medium"
                    >
                        <i data-lucide="star" class="w-5 h-5 text-stone-500"></i>
                        <span>Customer Reviews</span>
                    </a>


                    <!-- Messages -->
                    <a
                        href="/farmer/messages"
                        class="flex items-center gap-3 px-4 py-2.5 text-stone-700 hover:bg-stone-200/60 rounded-lg transition-colors font-medium"
                    >
                        <i data-lucide="message-square" class="w-5 h-5 text-stone-500"></i>
                        <span>Messages</span>

                        @if(isset($unreadMessagesCount) && $unreadMessagesCount > 0)
                            <span class="ml-auto bg-red-500 text-white text-[10px] px-1.5 py-0.5 rounded-full">
                                {{ $unreadMessagesCount > 9 ? '9+' : $unreadMessagesCount }}
                            </span>
                        @endif

                    </a>


                    <!-- Profile -->
                    <a
                        href="/farmer/profile"
                        class="flex items-center gap-3 px-4 py-2.5 text-stone-700 hover:bg-stone-200/60 rounded-lg transition-colors font-medium"
                    >
                        <i data-lucide="user" class="w-5 h-5 text-stone-500"></i>
                        <span>Profile</span>
                    </a>


                    <!-- Settings -->
                    <a
                        href="/farmer/settings"
                        class="flex items-center gap-3 px-4 py-2.5 text-stone-700 hover:bg-stone-200/60 rounded-lg transition-colors font-medium"
                    >
                        <i data-lucide="settings" class="w-5 h-5 text-stone-500"></i>
                        <span>Settings</span>
                    </a>

                </nav>

            </div>


            <!-- LOGOUT -->
            <div class="mt-8 pt-4 border-t border-stone-200">

                <form action="{{ route('logout') }}" method="POST">

                    @csrf

                    <button
                        type="submit"
                        class="w-full flex items-center gap-3 px-4 py-2.5 text-stone-700 hover:bg-red-50 hover:text-red-600 rounded-lg transition-colors font-medium text-left"
                    >
                        <i data-lucide="log-out" class="w-5 h-5"></i>
                        <span>Logout</span>
                    </button>

                </form>

            </div>

        </aside>


        <!-- ===================================================== -->
        <!-- MAIN CONTENT -->
        <!-- ===================================================== -->

        <main class="flex-1 flex flex-col min-w-0">


            <!-- ================================================= -->
            <!-- HEADER -->
            <!-- ================================================= -->

            <header class="p-6 flex flex-col md:flex-row items-center justify-between gap-4 border-b border-stone-200/60">


                <!-- SEARCH -->
                <div class="relative w-full md:w-96">

                    <i
                        data-lucide="search"
                        class="w-5 h-5 absolute left-3 top-1/2 -translate-y-1/2 text-stone-400"
                    ></i>

                    <input
                        id="transactionSearch"
                        type="text"
                        placeholder="Search transaction or type..."
                        class="w-full pl-10 pr-4 py-2 bg-white border border-stone-200 rounded-full text-sm focus:outline-none focus:ring-2 focus:ring-emerald-700 shadow-sm"
                    >

                </div>


                <!-- USER + NOTIFICATIONS -->
                <div class="flex items-center gap-4 self-end md:self-auto">


                    <!-- ================================================= -->
                    <!-- NOTIFICATION -->
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


                            @if(isset($notificationCount) && $notificationCount > 0)

                                <span
                                    id="notificationBadge"
                                    class="absolute -top-0.5 -right-0.5 min-w-[18px] h-[18px] px-1 bg-red-500 text-white text-[9px] font-bold rounded-full flex items-center justify-center border-2 border-[#F6F5F2]"
                                >
                                    {{ $notificationCount > 9 ? '9+' : $notificationCount }}
                                </span>

                            @endif

                        </button>


                        <!-- NOTIFICATION DROPDOWN -->

                        <div
                            id="notificationDropdown"
                            class="hidden absolute right-0 top-12 w-80 bg-white rounded-xl border border-stone-200 shadow-xl z-50 overflow-hidden"
                        >

                            <!-- HEADER -->

                            <div class="px-4 py-3 border-b border-stone-200 flex items-center justify-between">

                                <div>

                                    <h3 class="font-bold text-stone-800 text-sm">
                                        Notifications
                                    </h3>

                                    <p class="text-[10px] text-stone-400 mt-0.5">
                                        Recent activity
                                    </p>

                                </div>


                                @if(isset($notificationCount) && $notificationCount > 0)

                                    <span class="text-[10px] font-semibold text-[#1C5B32]">
                                        {{ $notificationCount }} new
                                    </span>

                                @endif

                            </div>


                            <!-- NOTIFICATION LIST -->

                            <div class="max-h-80 overflow-y-auto">

                                @forelse($notifications ?? [] as $notification)

                                    <a
                                        href="{{ route('farmer.sales.index') }}"
                                        class="flex gap-3 px-4 py-3 hover:bg-stone-50 transition-colors border-b border-stone-100"
                                    >

                                        <div class="w-9 h-9 rounded-full bg-[#1C5B32] text-white flex items-center justify-center shrink-0">

                                            <i
                                                data-lucide="{{ $notification->icon ?? 'bell' }}"
                                                class="w-4 h-4"
                                            ></i>

                                        </div>


                                        <div class="flex-1 min-w-0">

                                            <p class="text-xs font-semibold text-stone-800">
                                                {{ $notification->title }}
                                            </p>

                                            <p class="text-[11px] text-stone-500 mt-0.5">
                                                {{ $notification->message }}
                                            </p>

                                            <p class="text-[10px] text-stone-400 mt-1">
                                                {{ $notification->created_at->diffForHumans() }}
                                            </p>

                                        </div>


                                        @if(!$notification->read_at)

                                            <span class="w-2 h-2 rounded-full bg-[#1C5B32] mt-2 shrink-0"></span>

                                        @endif

                                    </a>

                                @empty

                                    <div class="px-4 py-10 text-center">

                                        <div class="w-11 h-11 mx-auto rounded-full bg-stone-100 flex items-center justify-center mb-3">

                                            <i
                                                data-lucide="bell-off"
                                                class="w-5 h-5 text-stone-400"
                                            ></i>

                                        </div>

                                        <p class="text-sm font-semibold text-stone-700">
                                            No notifications
                                        </p>

                                        <p class="text-[11px] text-stone-400 mt-1">
                                            You're all caught up!
                                        </p>

                                    </div>

                                @endforelse

                            </div>


                            <!-- FOOTER -->

                            <div class="border-t border-stone-200 p-2">

                                <a
                                    href="{{ route('farmer.orders.index') }}"
                                    class="block text-center text-xs font-semibold text-[#1C5B32] hover:bg-stone-50 rounded-lg py-2 transition-colors"
                                >
                                    View Orders
                                </a>

                            </div>

                        </div>

                    </div>


                    <!-- USER -->

                    <div class="flex items-center gap-3">

                        <div class="w-10 h-10 rounded-full bg-emerald-800 text-white flex items-center justify-center font-bold">

                            {{ strtoupper(substr(Auth::user()->first_name ?? 'F', 0, 1)) }}

                        </div>

                        <span class="font-bold text-stone-800 text-sm">

                            Farmer
                            {{ Auth::user()->first_name }}
                            {{ Auth::user()->last_name }}

                        </span>

                    </div>

                </div>

            </header>


            <!-- ================================================= -->
            <!-- PAGE CONTENT -->
            <!-- ================================================= -->

            <div class="p-6 space-y-6 overflow-y-auto">


                <!-- SUCCESS MESSAGE -->

                @if(session('success'))

                    <div class="bg-emerald-50 border border-emerald-200 text-emerald-800 px-4 py-3 rounded-xl text-sm flex items-center gap-2">

                        <i
                            data-lucide="circle-check"
                            class="w-5 h-5"
                        ></i>

                        <span>
                            {{ session('success') }}
                        </span>

                    </div>

                @endif


                <!-- ERROR MESSAGE -->

                @if(session('error'))

                    <div class="bg-red-50 border border-red-200 text-red-800 px-4 py-3 rounded-xl text-sm flex items-center gap-2">

                        <i
                            data-lucide="circle-alert"
                            class="w-5 h-5"
                        ></i>

                        <span>
                            {{ session('error') }}
                        </span>

                    </div>

                @endif


                <!-- VALIDATION ERRORS -->

                @if($errors->any())

                    <div class="bg-red-50 border border-red-200 text-red-800 px-4 py-3 rounded-xl">

                        <div class="flex items-center gap-2 font-semibold text-sm mb-2">

                            <i
                                data-lucide="circle-alert"
                                class="w-5 h-5"
                            ></i>

                            Please check the following:
                        </div>

                        <ul class="list-disc ml-7 text-xs space-y-1">

                            @foreach($errors->all() as $error)

                                <li>
                                    {{ $error }}
                                </li>

                            @endforeach

                        </ul>

                    </div>

                @endif


                <!-- ================================================= -->
                <!-- TITLE -->
                <!-- ================================================= -->

                <div class="flex flex-col sm:flex-row justify-between sm:items-center gap-4 border-b border-stone-200/60 pb-4">

                    <div>

                        <h1 class="text-2xl font-bold text-stone-800">
                            Sales & Earnings
                        </h1>

                        <p class="text-stone-500 text-sm">
                            Track your revenue, payout balance, and top-selling produce.
                        </p>

                    </div>


                    <div class="flex items-center gap-3">

                        <!-- DOWNLOAD -->

                        <a
                            href="{{ route('farmer.sales.download') }}"
                            class="bg-white hover:bg-stone-50 border border-stone-300 text-stone-700 font-medium px-4 py-2 rounded-xl text-sm inline-flex items-center gap-2 transition-colors shadow-sm"
                        >

                            <i
                                data-lucide="download"
                                class="w-4 h-4"
                            ></i>

                            Download Report

                        </a>


                        <!-- PAYOUT -->

                        <button
                            type="button"
                            onclick="openPayoutModal()"
                            class="bg-[#1C5B32] hover:bg-emerald-900 text-white font-medium px-4 py-2 rounded-xl text-sm inline-flex items-center gap-2 transition-colors shadow-sm"
                        >

                            <i
                                data-lucide="wallet"
                                class="w-4 h-4"
                            ></i>

                            Request Payout

                        </button>

                    </div>

                </div>


                <!-- ================================================= -->
                <!-- STATISTICS -->
                <!-- ================================================= -->

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">


                    <!-- TOTAL SALES -->

                    <div class="bg-white p-5 rounded-2xl border border-stone-200 shadow-sm">

                        <div class="flex justify-between items-center text-stone-500 mb-2">

                            <span class="text-xs font-bold uppercase tracking-wider">
                                Total Sales
                            </span>

                            <div class="p-2 bg-emerald-50 text-emerald-800 rounded-lg">

                                <i
                                    data-lucide="trending-up"
                                    class="w-4 h-4"
                                ></i>

                            </div>

                        </div>


                        <div class="text-2xl font-extrabold text-stone-800">

                            ₱{{ number_format($totalSales ?? 0, 2) }}

                        </div>

                        <span class="text-xs text-stone-500 font-medium mt-1 block">
                            From delivered orders
                        </span>

                    </div>


                    <!-- THIS MONTH -->

                    <div class="bg-white p-5 rounded-2xl border border-stone-200 shadow-sm">

                        <div class="flex justify-between items-center text-stone-500 mb-2">

                            <span class="text-xs font-bold uppercase tracking-wider">
                                This Month
                            </span>

                            <div class="p-2 bg-emerald-50 text-emerald-800 rounded-lg">

                                <i
                                    data-lucide="calendar"
                                    class="w-4 h-4"
                                ></i>

                            </div>

                        </div>


                        <div class="text-2xl font-extrabold text-stone-800">

                            ₱{{ number_format($monthlyEarnings ?? 0, 2) }}

                        </div>

                        <span class="text-xs text-stone-500 font-medium mt-1 block">
                            Delivered sales this month
                        </span>

                    </div>


                    <!-- AVAILABLE BALANCE -->

                    <div class="bg-white p-5 rounded-2xl border border-stone-200 shadow-sm">

                        <div class="flex justify-between items-center text-stone-500 mb-2">

                            <span class="text-xs font-bold uppercase tracking-wider">
                                Available Balance
                            </span>

                            <div class="p-2 bg-amber-50 text-amber-800 rounded-lg">

                                <i
                                    data-lucide="coins"
                                    class="w-4 h-4"
                                ></i>

                            </div>

                        </div>


                        <div class="text-2xl font-extrabold text-amber-800">

                            ₱{{ number_format($availableBalance ?? 0, 2) }}

                        </div>

                        <span class="text-xs text-stone-500 font-medium mt-1 block">
                            Based on delivered sales
                        </span>

                    </div>


                    <!-- PENDING -->

                    <div class="bg-white p-5 rounded-2xl border border-stone-200 shadow-sm">

                        <div class="flex justify-between items-center text-stone-500 mb-2">

                            <span class="text-xs font-bold uppercase tracking-wider">
                                Pending Orders
                            </span>

                            <div class="p-2 bg-sky-50 text-sky-800 rounded-lg">

                                <i
                                    data-lucide="clock"
                                    class="w-4 h-4"
                                ></i>

                            </div>

                        </div>


                        <div class="text-2xl font-extrabold text-stone-800">

                            ₱{{ number_format($pendingBalance ?? 0, 2) }}

                        </div>

                        <span class="text-xs text-stone-500 font-medium mt-1 block">
                            Clears upon delivery
                        </span>

                    </div>

                </div>


                <!-- ================================================= -->
                <!-- TRANSACTION HISTORY -->
                <!-- ================================================= -->

                <div class="bg-white rounded-2xl border border-stone-200 overflow-hidden shadow-sm">

                    <!-- HEADER -->

                    <div class="p-4 border-b border-stone-200 flex justify-between items-center">

                        <div>

                            <h2 class="font-bold text-stone-800 text-base">
                                Payout & Earnings History
                            </h2>

                            <p class="text-xs text-stone-400 mt-1">
                                Your recent earnings and payout activity
                            </p>

                        </div>

                    </div>


                    <!-- TABLE -->

                    <div class="overflow-x-auto">

                        <table class="w-full text-left border-collapse text-sm">

                            <thead>

                                <tr class="bg-stone-50 text-stone-600 border-b border-stone-200 text-xs">

                                    <th class="p-3.5 font-semibold">
                                        Date
                                    </th>

                                    <th class="p-3.5 font-semibold">
                                        Transaction ID
                                    </th>

                                    <th class="p-3.5 font-semibold">
                                        Type
                                    </th>

                                    <th class="p-3.5 font-semibold">
                                        Payment Method
                                    </th>

                                    <th class="p-3.5 font-semibold">
                                        Amount
                                    </th>

                                    <th class="p-3.5 font-semibold text-right">
                                        Status
                                    </th>

                                </tr>

                            </thead>


                            <tbody
                                id="transactionTable"
                                class="divide-y divide-stone-100 text-stone-800"
                            >

                                @forelse($transactions ?? [] as $transaction)

                                    <tr
                                        class="transaction-row hover:bg-stone-50 transition-colors"
                                        data-search="{{ strtolower(
                                            ($transaction['transaction_id'] ?? '') . ' ' .
                                            ($transaction['type'] ?? '') . ' ' .
                                            ($transaction['payment_method'] ?? '') . ' ' .
                                            ($transaction['status'] ?? '')
                                        ) }}"
                                    >

                                        <!-- DATE -->

                                        <td class="p-3.5 text-xs text-stone-500 whitespace-nowrap">

                                            {{ $transaction['date']->format('M d, Y') }}

                                        </td>


                                        <!-- TRANSACTION ID -->

                                        <td class="p-3.5 font-mono text-xs whitespace-nowrap">

                                            {{ $transaction['transaction_id'] }}

                                        </td>


                                        <!-- TYPE -->

                                        <td class="p-3.5 font-medium">

                                            {{ $transaction['type'] }}

                                        </td>


                                        <!-- PAYMENT METHOD -->

                                        <td class="p-3.5 text-xs text-stone-600">

                                            {{ $transaction['payment_method'] }}

                                        </td>


                                        <!-- AMOUNT -->

                                        <td
                                            class="p-3.5 font-bold whitespace-nowrap
                                            {{ $transaction['amount'] >= 0
                                                ? 'text-emerald-700'
                                                : 'text-stone-800'
                                            }}"
                                        >

                                            @if($transaction['amount'] >= 0)

                                                +₱{{ number_format($transaction['amount'], 2) }}

                                            @else

                                                -₱{{ number_format(abs($transaction['amount']), 2) }}

                                            @endif

                                        </td>


                                        <!-- STATUS -->

                                        <td class="p-3.5 text-right">

                                            @if($transaction['status'] === 'Completed')

                                                <span class="bg-emerald-100 text-emerald-800 px-2.5 py-1 rounded-md text-xs font-semibold">
                                                    Completed
                                                </span>

                                            @elseif($transaction['status'] === 'Pending')

                                                <span class="bg-amber-100 text-amber-800 px-2.5 py-1 rounded-md text-xs font-semibold">
                                                    Pending
                                                </span>

                                            @elseif($transaction['status'] === 'Approved')

                                                <span class="bg-sky-100 text-sky-800 px-2.5 py-1 rounded-md text-xs font-semibold">
                                                    Approved
                                                </span>

                                            @elseif($transaction['status'] === 'Paid')

                                                <span class="bg-emerald-100 text-emerald-800 px-2.5 py-1 rounded-md text-xs font-semibold">
                                                    Payout Sent
                                                </span>

                                            @elseif($transaction['status'] === 'Rejected')

                                                <span class="bg-red-100 text-red-800 px-2.5 py-1 rounded-md text-xs font-semibold">
                                                    Rejected
                                                </span>

                                            @else

                                                <span class="bg-stone-100 text-stone-700 px-2.5 py-1 rounded-md text-xs font-semibold">
                                                    {{ $transaction['status'] }}
                                                </span>

                                            @endif

                                        </td>

                                    </tr>

                                @empty

                                    <tr id="noTransactions">

                                        <td
                                            colspan="6"
                                            class="p-10 text-center"
                                        >

                                            <div class="flex flex-col items-center justify-center">

                                                <div class="w-12 h-12 rounded-full bg-stone-100 flex items-center justify-center mb-3">

                                                    <i
                                                        data-lucide="receipt-text"
                                                        class="w-6 h-6 text-stone-400"
                                                    ></i>

                                                </div>

                                                <p class="text-sm font-semibold text-stone-700">
                                                    No transactions yet
                                                </p>

                                                <p class="text-xs text-stone-400 mt-1">
                                                    Your delivered orders will appear here.
                                                </p>

                                            </div>

                                        </td>

                                    </tr>

                                @endforelse

                                <tr
                                    id="searchEmpty"
                                    class="hidden"
                                >

                                    <td
                                        colspan="6"
                                        class="p-10 text-center"
                                    >

                                        <div class="flex flex-col items-center">

                                            <i
                                                data-lucide="search-x"
                                                class="w-7 h-7 text-stone-400 mb-2"
                                            ></i>

                                            <p class="text-sm font-semibold text-stone-700">
                                                No matching transactions
                                            </p>

                                            <p class="text-xs text-stone-400 mt-1">
                                                Try another search term.
                                            </p>

                                        </div>

                                    </td>

                                </tr>

                            </tbody>

                        </table>

                    </div>

                </div>

            </div>


            <!-- ================================================= -->
            <!-- PAYOUT MODAL -->
            <!-- ================================================= -->

            <div
                id="payoutModal"
                class="hidden fixed inset-0 bg-black/40 z-50 items-center justify-center p-4"
            >

                <div class="bg-white w-full max-w-md rounded-2xl shadow-2xl overflow-hidden">


                    <!-- MODAL HEADER -->

                    <div class="px-6 py-4 border-b border-stone-200 flex items-center justify-between">

                        <div>

                            <h2 class="font-bold text-stone-800 text-lg">
                                Request Payout
                            </h2>

                            <p class="text-xs text-stone-400 mt-1">
                                Withdraw your available earnings
                            </p>

                        </div>


                        <button
                            type="button"
                            onclick="closePayoutModal()"
                            class="p-2 rounded-lg hover:bg-stone-100 text-stone-500"
                        >

                            <i
                                data-lucide="x"
                                class="w-5 h-5"
                            ></i>

                        </button>

                    </div>


                    <!-- PAYOUT FORM -->

                    <form
                        action="{{ route('farmer.sales.payout') }}"
                        method="POST"
                        class="p-6 space-y-4"
                    >

                        @csrf


                        <!-- AVAILABLE BALANCE -->

                        <div class="bg-emerald-50 border border-emerald-100 rounded-xl p-4">

                            <p class="text-xs text-stone-500">
                                Available Balance
                            </p>

                            <p class="text-xl font-extrabold text-[#1C5B32] mt-1">

                                ₱{{ number_format($availableBalance ?? 0, 2) }}

                            </p>

                        </div>


                        <!-- AMOUNT -->

                        <div>

                            <label class="block text-xs font-semibold text-stone-700 mb-1">
                                Payout Amount
                            </label>

                            <div class="relative">

                                <span class="absolute left-3 top-1/2 -translate-y-1/2 text-stone-500 font-semibold">
                                    ₱
                                </span>

                                <input
                                    type="number"
                                    name="amount"
                                    min="1"
                                    max="{{ $availableBalance ?? 0 }}"
                                    step="0.01"
                                    required
                                    class="w-full pl-8 pr-4 py-2.5 border border-stone-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-emerald-700"
                                    placeholder="Enter amount"
                                >

                            </div>

                        </div>


                        <!-- PAYMENT METHOD -->

                        <div>

                            <label class="block text-xs font-semibold text-stone-700 mb-1">
                                Payment Method
                            </label>

                            <select
                                name="payment_method"
                                required
                                class="w-full px-4 py-2.5 border border-stone-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-emerald-700"
                            >

                                <option value="">
                                    Select payment method
                                </option>

                                <option value="GCash">
                                    GCash
                                </option>

                                <option value="Bank Transfer">
                                    Bank Transfer
                                </option>

                            </select>

                        </div>


                        <!-- ACCOUNT NAME -->

                        <div>

                            <label class="block text-xs font-semibold text-stone-700 mb-1">
                                Account Name
                            </label>

                            <input
                                type="text"
                                name="account_name"
                                required
                                class="w-full px-4 py-2.5 border border-stone-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-emerald-700"
                                placeholder="Enter account name"
                            >

                        </div>


                        <!-- ACCOUNT NUMBER -->

                        <div>

                            <label class="block text-xs font-semibold text-stone-700 mb-1">
                                GCash Number / Bank Account Number
                            </label>

                            <input
                                type="text"
                                name="account_number"
                                required
                                class="w-full px-4 py-2.5 border border-stone-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-emerald-700"
                                placeholder="Enter account number"
                            >

                        </div>


                        <!-- BUTTONS -->

                        <div class="flex gap-3 pt-2">

                            <button
                                type="button"
                                onclick="closePayoutModal()"
                                class="flex-1 bg-white hover:bg-stone-50 border border-stone-300 text-stone-700 font-medium px-4 py-2.5 rounded-xl text-sm"
                            >
                                Cancel
                            </button>

                            <button
                                type="submit"
                                class="flex-1 bg-[#1C5B32] hover:bg-emerald-900 text-white font-medium px-4 py-2.5 rounded-xl text-sm"
                            >
                                Submit Request
                            </button>

                        </div>

                    </form>

                </div>

            </div>


            <!-- FOOTER -->

            <footer class="p-4 text-center text-xs text-stone-500 border-t border-stone-200/60 mt-auto">
                © 2026 AniLink
            </footer>

        </main>

    </div>


    <!-- ===================================================== -->
    <!-- JAVASCRIPT -->
    <!-- ===================================================== -->

    <script>

        // =====================================================
        // LUCIDE ICONS
        // =====================================================

        lucide.createIcons();


        // =====================================================
        // NOTIFICATION DROPDOWN
        // =====================================================

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

                notificationButton.addEventListener('click', function (event) {

                    event.stopPropagation();

                    notificationDropdown.classList.toggle('hidden');

                });


                notificationDropdown.addEventListener('click', function (event) {

                    event.stopPropagation();

                });


                document.addEventListener('click', function (event) {

                    if (!notificationWrapper.contains(event.target)) {

                        notificationDropdown.classList.add('hidden');

                    }

                });

            }


            // =================================================
            // TRANSACTION SEARCH
            // =================================================

            const searchInput =
                document.getElementById('transactionSearch');

            const rows =
                document.querySelectorAll('.transaction-row');

            const searchEmpty =
                document.getElementById('searchEmpty');


            if (searchInput) {

                searchInput.addEventListener('input', function () {

                    const searchValue =
                        this.value.toLowerCase().trim();

                    let visibleRows = 0;


                    rows.forEach(function (row) {

                        const rowText =
                            row.dataset.search || '';

                        if (
                            searchValue === '' ||
                            rowText.includes(searchValue)
                        ) {

                            row.classList.remove('hidden');

                            visibleRows++;

                        } else {

                            row.classList.add('hidden');

                        }

                    });


                    if (searchEmpty) {

                        if (
                            searchValue !== '' &&
                            visibleRows === 0
                        ) {

                            searchEmpty.classList.remove('hidden');

                        } else {

                            searchEmpty.classList.add('hidden');

                        }

                    }

                });

            }

        });


        // =====================================================
        // PAYOUT MODAL
        // =====================================================

        function openPayoutModal() {

            const modal =
                document.getElementById('payoutModal');

            if (!modal) {
                return;
            }

            modal.classList.remove('hidden');

            modal.classList.add('flex');

            lucide.createIcons();

        }


        function closePayoutModal() {

            const modal =
                document.getElementById('payoutModal');

            if (!modal) {
                return;
            }

            modal.classList.add('hidden');

            modal.classList.remove('flex');

        }


        // Close modal when clicking outside

        document.addEventListener('click', function (event) {

            const modal =
                document.getElementById('payoutModal');

            if (!modal) {
                return;
            }

            if (event.target === modal) {

                closePayoutModal();

            }

        });


        // Close modal with ESC

        document.addEventListener('keydown', function (event) {

            if (event.key === 'Escape') {

                closePayoutModal();

            }

        });

    </script>

</body>

</html>