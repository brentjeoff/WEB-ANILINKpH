<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>AniLink PH - Farmer Profile</title>

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Lucide Icons CDN -->
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
                    <a href="{{ route('farmer.dashboard') }}"
                        class="flex items-center gap-3 px-4 py-2.5 text-stone-700 hover:bg-stone-200/60 rounded-lg transition-colors font-medium">

                        <i data-lucide="layout-dashboard" class="w-5 h-5 text-stone-500"></i>

                        <span>Dashboard</span>

                    </a>

                    <!-- Sell Harvest -->
                    <a href="{{ route('harvest.create') }}"
                        class="flex items-center gap-3 px-4 py-2.5 text-stone-700 hover:bg-stone-200/60 rounded-lg transition-colors font-medium">

                        <i data-lucide="wheat" class="w-5 h-5 text-stone-500"></i>

                        <span>Sell Harvest</span>

                    </a>

                    <!-- My Listings -->
                    <a href="{{ route('farmer.my-listings') }}"
                        class="flex items-center gap-3 px-4 py-2.5 text-stone-700 hover:bg-stone-200/60 rounded-lg transition-colors font-medium">

                        <i data-lucide="archive" class="w-5 h-5 text-stone-500"></i>

                        <span>My Listings</span>

                    </a>

                    <!-- Orders Received -->
                    <a href="{{ route('farmer.orders.index') }}"
                        class="flex items-center gap-3 px-4 py-2.5 text-stone-700 hover:bg-stone-200/60 rounded-lg transition-colors font-medium">

                        <i data-lucide="clipboard-list" class="w-5 h-5 text-stone-500"></i>

                        <span>Orders Received</span>

                    </a>

                    <!-- Sales & Earnings -->
                    <a href="{{ route('farmer.sales.index') }}"
                        class="flex items-center gap-3 px-4 py-2.5 text-stone-700 hover:bg-stone-200/60 rounded-lg transition-colors font-medium">

                        <i data-lucide="circle-dollar-sign" class="w-5 h-5 text-stone-500"></i>

                        <span>Sales &amp; Earnings</span>

                    </a>

                    <!-- Customer Reviews -->
                    <a href="{{ route('farmer.reviews') }}"
                        class="flex items-center gap-3 px-4 py-2.5 text-stone-700 hover:bg-stone-200/60 rounded-lg transition-colors font-medium">

                        <i data-lucide="star" class="w-5 h-5 text-stone-500"></i>

                        <span>Customer Reviews</span>

                    </a>

                    <!-- Messages -->
                    <a href="{{ route('farmer.messages') }}"
                        class="flex items-center justify-between px-4 py-2.5 text-stone-700 hover:bg-stone-200/60 rounded-lg transition-colors font-medium">

                        <div class="flex items-center gap-3">

                            <i data-lucide="message-square" class="w-5 h-5 text-stone-500"></i>

                            <span>Messages</span>

                        </div>

                        @if(($unreadMessagesCount ?? 0) > 0)

                            <span
                                class="text-[10px] bg-red-500 text-white min-w-[20px] h-5 px-1 rounded-full flex items-center justify-center font-bold">

                                {{ $unreadMessagesCount > 99 ? '99+' : $unreadMessagesCount }}

                            </span>

                        @endif

                    </a>

                    <!-- Profile ACTIVE -->
                    <a href="{{ route('farmer.profile') }}"
                        class="flex items-center justify-between px-4 py-3 bg-[#1C5B32] text-white rounded-lg font-medium shadow-sm">

                        <div class="flex items-center gap-3">

                            <i data-lucide="user" class="w-5 h-5"></i>

                            <span>Profile</span>

                        </div>

                        <span
                            class="text-xs bg-emerald-600/60 px-2 py-0.5 rounded text-emerald-100">

                            Active

                        </span>

                    </a>

                    <!-- Settings -->
                    <a href="{{ route('farmer.settings') }}"
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

            <!-- ===================================================== -->
            <!-- HEADER -->
            <!-- ===================================================== -->

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


                <!-- Right Header -->
                <div class="flex items-center gap-4 self-end md:self-auto">


                    <!-- ================================================= -->
                    <!-- NOTIFICATION BELL -->
                    <!-- ================================================= -->

                    <div class="relative" id="notificationWrapper">

                        <button
                            type="button"
                            id="notificationButton"
                            class="relative p-2 rounded-lg text-stone-600 hover:bg-stone-100 transition-colors"
                            aria-label="Notifications">

                            <i data-lucide="bell" class="w-5 h-5"></i>

                            @if(($notificationCount ?? 0) > 0)

                                <span
                                    id="notificationBadge"
                                    class="absolute -top-0.5 -right-0.5 min-w-[18px] h-[18px] px-1 bg-red-500 text-white text-[9px] font-bold rounded-full flex items-center justify-center border-2 border-[#F6F5F2]">

                                    {{ $notificationCount > 99 ? '99+' : $notificationCount }}

                                </span>

                            @endif

                        </button>


                        <!-- Notification Dropdown -->
                        <div
                            id="notificationDropdown"
                            class="hidden absolute right-0 top-12 w-80 md:w-96 bg-white rounded-xl border border-stone-200 shadow-xl z-50 overflow-hidden">

                            <!-- Dropdown Header -->
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

                                @if(($notificationCount ?? 0) > 0)

                                    <span class="text-[10px] font-semibold text-[#1C5B32]">

                                        {{ $notificationCount }} new

                                    </span>

                                @endif

                            </div>


                            <!-- Notification List -->
                            <div class="max-h-96 overflow-y-auto">

                                @forelse(($notifications ?? collect()) as $notification)

                                    <form
                                        action="{{ route('notifications.read', $notification->id) }}"
                                        method="POST">

                                        @csrf

                                        <button
                                            type="submit"
                                            class="w-full text-left flex gap-3 px-4 py-3 hover:bg-stone-50 transition-colors border-b border-stone-100
                                            {{ $notification->read_at ? 'bg-white' : 'bg-emerald-50/60' }}">

                                            <!-- Icon -->
                                            <div
                                                class="w-9 h-9 rounded-full bg-emerald-100 text-[#1C5B32] flex items-center justify-center shrink-0">

                                                <i
                                                    data-lucide="{{ $notification->icon ?? 'bell' }}"
                                                    class="w-4 h-4">
                                                </i>

                                            </div>


                                            <!-- Content -->
                                            <div class="flex-1 min-w-0">

                                                <div class="flex items-start justify-between gap-2">

                                                    <p class="text-xs font-semibold text-stone-800">

                                                        {{ $notification->title }}

                                                    </p>

                                                    @if(!$notification->read_at)

                                                        <span
                                                            class="w-2 h-2 rounded-full bg-[#1C5B32] mt-1 shrink-0">
                                                        </span>

                                                    @endif

                                                </div>


                                                <p
                                                    class="text-[11px] text-stone-500 mt-0.5 leading-relaxed">

                                                    {{ $notification->message }}

                                                </p>


                                                <p class="text-[10px] text-stone-400 mt-1">

                                                    {{ $notification->created_at->diffForHumans() }}

                                                </p>

                                            </div>

                                        </button>

                                    </form>

                                @empty

                                    <div class="px-4 py-10 text-center">

                                        <div
                                            class="w-11 h-11 mx-auto rounded-full bg-stone-100 flex items-center justify-center mb-3">

                                            <i
                                                data-lucide="bell-off"
                                                class="w-5 h-5 text-stone-400">
                                            </i>

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


                            <!-- Dropdown Footer -->
                            <div class="border-t border-stone-200 p-2">

                                <a
                                    href="{{ route('farmer.orders.index') }}"
                                    class="block text-center text-xs font-semibold text-[#1C5B32] hover:bg-stone-50 rounded-lg py-2 transition-colors">

                                    View Orders

                                </a>

                            </div>

                        </div>

                    </div>


                    <!-- Divider -->
                    <div class="w-px h-8 bg-stone-200"></div>


                    <!-- Farmer Name -->
                    <div class="flex items-center gap-3">

                        <div
                            class="w-10 h-10 rounded-full bg-emerald-800 text-white flex items-center justify-center font-bold">

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


            <!-- ===================================================== -->
            <!-- PROFILE CONTENT -->
            <!-- ===================================================== -->

            <div class="p-6 space-y-6 overflow-y-auto">


                <!-- Page Title -->
                <div
                    class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">

                    <div>

                        <h1
                            class="text-2xl md:text-3xl font-extrabold text-stone-800 mb-1">

                            My Profile

                        </h1>

                        <p class="text-stone-600 text-sm">

                            Manage your farmer account and farm information.

                        </p>

                    </div>


                    <!-- Edit Profile -->
                    <a
                        href="{{ route('farmer.profile-edit') }}"
                        class="bg-[#1C5B32] hover:bg-emerald-900 text-white font-medium px-4 py-2.5 rounded-xl text-sm flex items-center gap-2 transition-colors shadow-sm">

                        <i data-lucide="square-pen" class="w-4 h-4"></i>

                        Edit Profile

                    </a>

                </div>


                <!-- ================================================= -->
                <!-- PROFILE HEADER CARD -->
                <!-- ================================================= -->

                <div
                    class="bg-white p-6 rounded-2xl border border-stone-200 shadow-sm">

                    <div
                        class="flex flex-col sm:flex-row items-center sm:items-start gap-6">


                        <!-- Avatar -->
                        <div
                            class="w-28 h-28 rounded-full bg-emerald-50 border-4 border-[#1C5B32] flex items-center justify-center text-[#1C5B32] shrink-0">

                            <i data-lucide="user" class="w-12 h-12"></i>

                        </div>


                        <!-- User Information -->
                        <div class="flex-1 text-center sm:text-left">

                            <div class="text-2xl font-extrabold text-stone-800">

                                {{ Auth::user()->first_name }}
                                {{ Auth::user()->last_name }}

                            </div>


                            <div
                                class="text-stone-500 flex items-center justify-center sm:justify-start gap-1.5 mt-1 text-sm">

                                <i data-lucide="badge-check" class="w-4 h-4"></i>

                                Farmer

                            </div>


                            <div
                                class="text-stone-500 flex items-center justify-center sm:justify-start gap-1.5 mt-1 text-sm">

                                <i data-lucide="mail" class="w-4 h-4"></i>

                                {{ Auth::user()->email }}

                            </div>

                        </div>


                        <!-- Account Status -->
                        <span
                            class="bg-emerald-100 text-emerald-800 px-3 py-1.5 rounded-md text-xs font-semibold flex items-center gap-1.5 shrink-0">

                            <i data-lucide="check-circle" class="w-3.5 h-3.5"></i>

                            Active Account

                        </span>

                    </div>

                </div>


                <!-- ================================================= -->
                <!-- PERSONAL + FARM INFORMATION -->
                <!-- ================================================= -->

                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">


                    <!-- Personal Information -->
                    <div
                        class="bg-white p-5 rounded-2xl border border-stone-200 shadow-sm">

                        <h2
                            class="font-bold text-stone-800 mb-4 text-lg flex items-center gap-2">

                            <i
                                data-lucide="user"
                                class="w-5 h-5 text-[#1C5B32]">
                            </i>

                            Personal Information

                        </h2>


                        <div class="space-y-4">


                            <!-- Full Name -->
                            <div class="flex items-start gap-3">

                                <div
                                    class="w-10 h-10 bg-emerald-50 text-[#1C5B32] rounded-lg flex items-center justify-center shrink-0">

                                    <i data-lucide="user" class="w-4.5 h-4.5"></i>

                                </div>

                                <div>

                                    <div class="text-stone-500 text-xs">
                                        Full Name
                                    </div>

                                    <div class="font-semibold text-stone-800">

                                        {{ Auth::user()->first_name }}
                                        {{ Auth::user()->last_name }}

                                    </div>

                                </div>

                            </div>


                            <!-- Email -->
                            <div class="flex items-start gap-3">

                                <div
                                    class="w-10 h-10 bg-emerald-50 text-[#1C5B32] rounded-lg flex items-center justify-center shrink-0">

                                    <i data-lucide="mail" class="w-4.5 h-4.5"></i>

                                </div>

                                <div>

                                    <div class="text-stone-500 text-xs">
                                        Email Address
                                    </div>

                                    <div class="font-semibold text-stone-800">

                                        {{ Auth::user()->email }}

                                    </div>

                                </div>

                            </div>


                            <!-- Phone -->
                            <div class="flex items-start gap-3">

                                <div
                                    class="w-10 h-10 bg-emerald-50 text-[#1C5B32] rounded-lg flex items-center justify-center shrink-0">

                                    <i data-lucide="phone" class="w-4.5 h-4.5"></i>

                                </div>

                                <div>

                                    <div class="text-stone-500 text-xs">
                                        Phone Number
                                    </div>

                                    <div class="font-semibold text-stone-800">

                                        {{ Auth::user()->phone ?? 'Not provided' }}

                                    </div>

                                </div>

                            </div>


                            <!-- Address -->
                            <div class="flex items-start gap-3">

                                <div
                                    class="w-10 h-10 bg-emerald-50 text-[#1C5B32] rounded-lg flex items-center justify-center shrink-0">

                                    <i data-lucide="map-pin" class="w-4.5 h-4.5"></i>

                                </div>

                                <div>

                                    <div class="text-stone-500 text-xs">
                                        Address
                                    </div>

                                    <div class="font-semibold text-stone-800">

                                        {{ Auth::user()->address ?? 'Not provided' }}

                                    </div>

                                </div>

                            </div>


                        </div>

                    </div>


                    <!-- ================================================= -->
                    <!-- FARM INFORMATION -->
                    <!-- ================================================= -->

                    <div
                        class="bg-white p-5 rounded-2xl border border-stone-200 shadow-sm">

                        <h2
                            class="font-bold text-stone-800 mb-4 text-lg flex items-center gap-2">

                            <i
                                data-lucide="tree-deciduous"
                                class="w-5 h-5 text-[#1C5B32]">
                            </i>

                            Farm Information

                        </h2>


                        <div class="space-y-4">


                            <!-- Farm Name -->
                            <div class="flex items-start gap-3">

                                <div
                                    class="w-10 h-10 bg-amber-50 text-amber-600 rounded-lg flex items-center justify-center shrink-0">

                                    <i data-lucide="house" class="w-4.5 h-4.5"></i>

                                </div>

                                <div>

                                    <div class="text-stone-500 text-xs">
                                        Farm Name
                                    </div>

                                    <div class="font-semibold text-stone-800">

                                        {{ Auth::user()->farm_name ?? 'Not provided' }}

                                    </div>

                                </div>

                            </div>


                            <!-- Farm Location -->
                            <div class="flex items-start gap-3">

                                <div
                                    class="w-10 h-10 bg-amber-50 text-amber-600 rounded-lg flex items-center justify-center shrink-0">

                                    <i data-lucide="map-pin" class="w-4.5 h-4.5"></i>

                                </div>

                                <div>

                                    <div class="text-stone-500 text-xs">
                                        Farm Location
                                    </div>

                                    <div class="font-semibold text-stone-800">

                                        {{ Auth::user()->farm_location ?? Auth::user()->address ?? 'Not provided' }}

                                    </div>

                                </div>

                            </div>


                            <!-- Farming Method -->
                            <div class="flex items-start gap-3">

                                <div
                                    class="w-10 h-10 bg-amber-50 text-amber-600 rounded-lg flex items-center justify-center shrink-0">

                                    <i data-lucide="flower-2" class="w-4.5 h-4.5"></i>

                                </div>

                                <div>

                                    <div class="text-stone-500 text-xs">
                                        Farming Method
                                    </div>

                                    <div class="font-semibold text-stone-800">
                                        Organic Farming
                                    </div>

                                </div>

                            </div>


                            <!-- Member Since -->
                            <div class="flex items-start gap-3">

                                <div
                                    class="w-10 h-10 bg-amber-50 text-amber-600 rounded-lg flex items-center justify-center shrink-0">

                                    <i
                                        data-lucide="calendar-days"
                                        class="w-4.5 h-4.5">
                                    </i>

                                </div>

                                <div>

                                    <div class="text-stone-500 text-xs">
                                        Member Since
                                    </div>

                                    <div class="font-semibold text-stone-800">

                                        {{ Auth::user()->created_at
                                            ? Auth::user()->created_at->format('F Y')
                                            : 'N/A'
                                        }}

                                    </div>

                                </div>

                            </div>


                        </div>

                    </div>

                </div>


                <!-- ================================================= -->
                <!-- FARMER STATISTICS -->
                <!-- ================================================= -->

                <div>

                    <h2
                        class="font-bold text-stone-800 mb-3 text-lg flex items-center gap-2">

                        <i
                            data-lucide="bar-chart-3"
                            class="w-5 h-5 text-[#1C5B32]">
                        </i>

                        Farmer Statistics

                    </h2>


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

                                {{ $activeListings ?? 0 }}

                            </div>

                        </div>


                        <!-- Total Products -->
                        <div
                            class="rounded-xl overflow-hidden shadow-sm border border-stone-300">

                            <div
                                class="bg-[#1C5B32] text-white p-2.5 text-xs font-semibold">

                                Total Products

                            </div>

                            <div
                                class="bg-[#8C6D62] text-white p-4 font-bold text-xl">

                                {{ $totalProducts ?? 0 }}

                            </div>

                        </div>


                        <!-- Completed Orders -->
                        <div
                            class="rounded-xl overflow-hidden shadow-sm border border-stone-300">

                            <div
                                class="bg-[#1C5B32] text-white p-2.5 text-xs font-semibold">

                                Completed Orders

                            </div>

                            <div
                                class="bg-[#8C6D62] text-white p-4 font-bold text-xl">

                                {{ $completedOrders ?? 0 }} orders

                            </div>

                        </div>


                        <!-- Customer Reviews -->
                        <div
                            class="rounded-xl overflow-hidden shadow-sm border border-stone-300">

                            <div
                                class="bg-[#1C5B32] text-white p-2.5 text-xs font-semibold">

                                Customer Reviews

                            </div>

                            <div
                                class="bg-[#8C6D62] text-white p-4 font-bold text-xl">

                                {{ $customerReviews ?? 0 }} reviews

                            </div>

                        </div>


                    </div>

                </div>


            </div>


            <!-- Footer -->
            <footer
                class="p-4 text-center text-xs text-stone-500 border-t border-stone-200/60 mt-auto">

                © 2026 AniLink

            </footer>

        </main>

    </div>


    <!-- ============================================================= -->
    <!-- NOTIFICATION JAVASCRIPT -->
    <!-- ============================================================= -->

    <script>

        document.addEventListener('DOMContentLoaded', function () {

            lucide.createIcons();


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


            // Open / Close notification dropdown
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

        });

    </script>

</body>

</html>