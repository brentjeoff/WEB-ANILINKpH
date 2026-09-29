<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>AniLink - Settings</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Lucide Icons -->
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

        <!-- ===================================================== -->
        <!-- SIDEBAR -->
        <!-- ===================================================== -->

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

                        <i data-lucide="layout-dashboard"
                            class="w-5 h-5 text-stone-500"></i>

                        <span>Dashboard</span>

                    </a>

                    <!-- Sell Harvest -->
                    <a href="{{ route('harvest.create') }}"
                        class="flex items-center gap-3 px-4 py-2.5 text-stone-700 hover:bg-stone-200/60 rounded-lg transition-colors font-medium">

                        <i data-lucide="wheat"
                            class="w-5 h-5 text-stone-500"></i>

                        <span>Sell Harvest</span>

                    </a>

                    <!-- My Listings -->
                    <a href="{{ route('farmer.my-listings') }}"
                        class="flex items-center gap-3 px-4 py-2.5 text-stone-700 hover:bg-stone-200/60 rounded-lg transition-colors font-medium">

                        <i data-lucide="archive"
                            class="w-5 h-5 text-stone-500"></i>

                        <span>My Listings</span>

                    </a>

                    <!-- Orders -->
                    <a href="{{ route('farmer.orders.index') }}"
                        class="flex items-center gap-3 px-4 py-2.5 text-stone-700 hover:bg-stone-200/60 rounded-lg transition-colors font-medium">

                        <i data-lucide="clipboard-list"
                            class="w-5 h-5 text-stone-500"></i>

                        <span>Orders Received</span>

                    </a>

                    <!-- Sales -->
                    <a href="{{ route('farmer.sales.index') }}"
                        class="flex items-center gap-3 px-4 py-2.5 text-stone-700 hover:bg-stone-200/60 rounded-lg transition-colors font-medium">

                        <i data-lucide="circle-dollar-sign"
                            class="w-5 h-5 text-stone-500"></i>

                        <span>Sales & Earnings</span>

                    </a>

                    <!-- Reviews -->
                    <a href="{{ route('farmer.reviews') }}"
                        class="flex items-center gap-3 px-4 py-2.5 text-stone-700 hover:bg-stone-200/60 rounded-lg transition-colors font-medium">

                        <i data-lucide="star"
                            class="w-5 h-5 text-stone-500"></i>

                        <span>Customer Reviews</span>

                    </a>

                    <!-- Messages -->
                    <a href="{{ route('farmer.messages') }}"
                        class="flex items-center gap-3 px-4 py-2.5 text-stone-700 hover:bg-stone-200/60 rounded-lg transition-colors font-medium">

                        <i data-lucide="message-square"
                            class="w-5 h-5 text-stone-500"></i>

                        <span>Messages</span>

                        @if(($unreadMessagesCount ?? 0) > 0)

                            <span
                                class="ml-auto bg-red-500 text-white text-[10px] font-bold rounded-full min-w-[20px] h-5 px-1 flex items-center justify-center">

                                {{ $unreadMessagesCount > 99 ? '99+' : $unreadMessagesCount }}

                            </span>

                        @endif

                    </a>

                    <!-- Profile -->
                    <a href="{{ route('farmer.profile') }}"
                        class="flex items-center gap-3 px-4 py-2.5 text-stone-700 hover:bg-stone-200/60 rounded-lg transition-colors font-medium">

                        <i data-lucide="user"
                            class="w-5 h-5 text-stone-500"></i>

                        <span>Profile</span>

                    </a>

                    <!-- Active Settings -->
                    <a href="{{ route('farmer.settings') }}"
                        class="flex items-center gap-3 px-4 py-3 bg-[#1C5B32] text-white rounded-lg font-medium shadow-sm">

                        <i data-lucide="settings"
                            class="w-5 h-5"></i>

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

                        <i data-lucide="log-out"
                            class="w-5 h-5"></i>

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
                class="p-6 flex flex-col md:flex-row items-center justify-between gap-4 border-b border-stone-200/60">

                <!-- Search -->
                <div class="relative w-full md:w-96">

                    <i data-lucide="search"
                        class="w-5 h-5 absolute left-3 top-1/2 -translate-y-1/2 text-stone-400">
                    </i>

                    <input
                        type="text"
                        placeholder="Search account or notification preferences..."
                        class="w-full pl-10 pr-4 py-2 bg-white border border-stone-200 rounded-full text-sm focus:outline-none focus:ring-2 focus:ring-emerald-700 shadow-sm">

                </div>


                <!-- User + Notification -->
                <div class="flex items-center gap-4 self-end md:self-auto">

                    <!-- Notification -->
                    <div class="relative">

                        <button
                            type="button"
                            id="notificationButton"
                            class="relative w-10 h-10 rounded-full flex items-center justify-center hover:bg-stone-200 transition-colors">

                            <i data-lucide="bell"
                                class="w-5 h-5 text-stone-700">
                            </i>

                            @if(($notificationCount ?? 0) > 0)

                                <span
                                    class="absolute -top-1 -right-1 min-w-[19px] h-[19px] px-1 bg-red-500 text-white text-[10px] font-bold rounded-full flex items-center justify-center border-2 border-[#F6F5F2]">

                                    {{ $notificationCount > 99 ? '99+' : $notificationCount }}

                                </span>

                            @endif

                        </button>


                        <!-- Notification Dropdown -->
                        <div
                            id="notificationDropdown"
                            class="hidden absolute right-0 top-12 w-80 md:w-96 bg-white rounded-xl shadow-2xl border border-stone-200 overflow-hidden z-50">

                            <!-- Header -->
                            <div
                                class="px-4 py-3 border-b border-stone-200 flex items-center justify-between">

                                <div>

                                    <h3 class="font-bold text-stone-800">
                                        Notifications
                                    </h3>

                                    <p class="text-xs text-stone-400 mt-0.5">
                                        {{ $notificationCount ?? 0 }} unread
                                    </p>

                                </div>


                                @if(($notificationCount ?? 0) > 0)

                                    <form
                                        action="{{ route('notifications.readAll') }}"
                                        method="POST">

                                        @csrf

                                        <button
                                            type="submit"
                                            class="text-xs font-semibold text-emerald-700 hover:text-emerald-900">

                                            Mark all as read

                                        </button>

                                    </form>

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
                                            class="w-full text-left px-4 py-3 border-b border-stone-100 hover:bg-stone-50 transition-colors
                                            {{ $notification->read_at ? 'bg-white' : 'bg-emerald-50/60' }}">

                                            <div class="flex gap-3">

                                                <div
                                                    class="w-9 h-9 rounded-full bg-emerald-100 flex items-center justify-center flex-shrink-0">

                                                    <i
                                                        data-lucide="{{ $notification->icon ?? 'bell' }}"
                                                        class="w-4 h-4 text-emerald-800">
                                                    </i>

                                                </div>


                                                <div class="flex-1 min-w-0">

                                                    <div
                                                        class="flex items-start justify-between gap-2">

                                                        <p
                                                            class="text-sm font-semibold text-stone-800">

                                                            {{ $notification->title }}

                                                        </p>

                                                        @if(!$notification->read_at)

                                                            <span
                                                                class="w-2 h-2 bg-emerald-600 rounded-full flex-shrink-0 mt-1.5">
                                                            </span>

                                                        @endif

                                                    </div>


                                                    <p
                                                        class="text-xs text-stone-600 mt-1 leading-relaxed">

                                                        {{ $notification->message }}

                                                    </p>


                                                    <p
                                                        class="text-[10px] text-stone-400 mt-1.5">

                                                        {{ $notification->created_at->diffForHumans() }}

                                                    </p>

                                                </div>

                                            </div>

                                        </button>

                                    </form>

                                @empty

                                    <div class="px-6 py-10 text-center">

                                        <div
                                            class="w-12 h-12 mx-auto rounded-full bg-stone-100 flex items-center justify-center">

                                            <i
                                                data-lucide="bell-off"
                                                class="w-6 h-6 text-stone-400">
                                            </i>

                                        </div>

                                        <p
                                            class="font-semibold text-stone-700 text-sm mt-3">

                                            No notifications yet

                                        </p>

                                        <p
                                            class="text-xs text-stone-400 mt-1">

                                            You're all caught up!

                                        </p>

                                    </div>

                                @endforelse

                            </div>

                        </div>

                    </div>


                    <!-- Divider -->
                    <div class="w-px h-8 bg-stone-200"></div>


                    <!-- Farmer -->
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


            <!-- ================================================= -->
            <!-- MAIN CONTENT -->
            <!-- ================================================= -->

            <div class="p-6 space-y-6 overflow-y-auto">


                <!-- Success -->
                @if(session('success'))

                    <div
                        class="bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-xl text-sm flex items-center gap-2">

                        <i data-lucide="check-circle"
                            class="w-5 h-5">
                        </i>

                        <span>
                            {{ session('success') }}
                        </span>

                    </div>

                @endif


                <!-- Password Success -->
                @if(session('password_success'))

                    <div
                        class="bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-xl text-sm flex items-center gap-2">

                        <i data-lucide="check-circle"
                            class="w-5 h-5">
                        </i>

                        <span>
                            {{ session('password_success') }}
                        </span>

                    </div>

                @endif


                <!-- Error -->
                @if(session('error'))

                    <div
                        class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-xl text-sm">

                        {{ session('error') }}

                    </div>

                @endif


                <!-- Validation Errors -->
                @if($errors->any())

                    <div
                        class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-xl text-sm">

                        <ul class="list-disc pl-5 space-y-1">

                            @foreach($errors->all() as $error)

                                <li>
                                    {{ $error }}
                                </li>

                            @endforeach

                        </ul>

                    </div>

                @endif


                <!-- Title -->
                <div
                    class="flex flex-col sm:flex-row justify-between sm:items-center gap-4 border-b border-stone-200/60 pb-4">

                    <div>

                        <h1 class="text-2xl font-bold text-stone-800">
                            Account Settings
                        </h1>

                        <p class="text-stone-500 text-sm">
                            Manage security, notification alerts, and fulfillment preferences.
                        </p>

                    </div>

                </div>


                <!-- ================================================= -->
                <!-- SETTINGS LAYOUT -->
                <!-- ================================================= -->

                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">


                    <!-- ================================================= -->
                    <!-- SUB NAVIGATION -->
                    <!-- ================================================= -->

                    <div
                        class="bg-white p-3 rounded-2xl border border-stone-200 shadow-sm space-y-1 h-fit">


                        <!-- Notifications Tab -->
                        <button
                            type="button"
                            onclick="showSection('notifications')"
                            id="notificationsTab"
                            class="settings-tab w-full flex items-center gap-3 px-4 py-2.5 bg-[#1C5B32] text-white rounded-xl text-xs font-semibold shadow-sm">

                            <i data-lucide="bell"
                                class="w-4 h-4">
                            </i>

                            <span>
                                Notifications & Alerts
                            </span>

                        </button>


                        <!-- Security Tab -->
                        <button
                            type="button"
                            onclick="showSection('security')"
                            id="securityTab"
                            class="settings-tab w-full flex items-center gap-3 px-4 py-2.5 text-stone-700 hover:bg-stone-100 rounded-xl text-xs font-medium transition-colors">

                            <i data-lucide="shield-check"
                                class="w-4 h-4 text-stone-500">
                            </i>

                            <span>
                                Account Security
                            </span>

                        </button>


                        <!-- Fulfillment Tab -->
                        <button
                            type="button"
                            onclick="showSection('fulfillment')"
                            id="fulfillmentTab"
                            class="settings-tab w-full flex items-center gap-3 px-4 py-2.5 text-stone-700 hover:bg-stone-100 rounded-xl text-xs font-medium transition-colors">

                            <i data-lucide="truck"
                                class="w-4 h-4 text-stone-500">
                            </i>

                            <span>
                                Fulfillment & Delivery
                            </span>

                        </button>

                    </div>


                    <!-- ================================================= -->
                    <!-- DETAILS -->
                    <!-- ================================================= -->

                    <div class="lg:col-span-2 space-y-6">


                        <!-- ================================================= -->
                        <!-- NOTIFICATIONS -->
                        <!-- ================================================= -->

                        <section
                            id="notifications"
                            class="settings-section bg-white p-6 rounded-2xl border border-stone-200 shadow-sm space-y-4">

                            <h2
                                class="font-bold text-stone-800 text-base border-b border-stone-100 pb-3 flex items-center gap-2">

                                <i data-lucide="bell"
                                    class="w-5 h-5 text-emerald-800">
                                </i>

                                Notification Preferences

                            </h2>


                            <form
                                action="{{ route('farmer.settings.update') }}"
                                method="POST">

                                @csrf


                                <div class="space-y-4 text-xs">


                                    <!-- New Order Alerts -->
                                    <div
                                        class="flex items-center justify-between pb-3 border-b border-stone-100">

                                        <div>

                                            <p class="font-bold text-stone-800">
                                                New Order Alerts
                                            </p>

                                            <p class="text-stone-500">
                                                Receive alerts when a customer places an order.
                                            </p>

                                        </div>


                                        <label
                                            class="relative inline-flex items-center cursor-pointer">

                                            <input
                                                type="checkbox"
                                                name="new_order_alerts"
                                                value="1"
                                                class="sr-only peer"
                                                {{ $settings->new_order_alerts ? 'checked' : '' }}>

                                            <div
                                                class="w-11 h-6 bg-stone-200 peer-focus:outline-none rounded-full peer
                                                peer-checked:after:translate-x-full
                                                peer-checked:after:border-white
                                                after:content-['']
                                                after:absolute
                                                after:top-[2px]
                                                after:left-[2px]
                                                after:bg-white
                                                after:border-stone-300
                                                after:border
                                                after:rounded-full
                                                after:h-5
                                                after:w-5
                                                after:transition-all
                                                peer-checked:bg-[#1C5B32]">
                                            </div>

                                        </label>

                                    </div>


                                    <!-- Direct Messages -->
                                    <div
                                        class="flex items-center justify-between pb-3 border-b border-stone-100">

                                        <div>

                                            <p class="font-bold text-stone-800">
                                                Direct Messages
                                            </p>

                                            <p class="text-stone-500">
                                                Get notified when buyers send inquiries about your harvest.
                                            </p>

                                        </div>


                                        <label
                                            class="relative inline-flex items-center cursor-pointer">

                                            <input
                                                type="checkbox"
                                                name="direct_messages"
                                                value="1"
                                                class="sr-only peer"
                                                {{ $settings->direct_messages ? 'checked' : '' }}>

                                            <div
                                                class="w-11 h-6 bg-stone-200 rounded-full peer
                                                peer-checked:after:translate-x-full
                                                after:content-['']
                                                after:absolute
                                                after:top-[2px]
                                                after:left-[2px]
                                                after:bg-white
                                                after:border-stone-300
                                                after:border
                                                after:rounded-full
                                                after:h-5
                                                after:w-5
                                                after:transition-all
                                                peer-checked:bg-[#1C5B32]">
                                            </div>

                                        </label>

                                    </div>


                                    <!-- Weekly Sales -->
                                    <div
                                        class="flex items-center justify-between">

                                        <div>

                                            <p class="font-bold text-stone-800">
                                                Weekly Sales Summaries
                                            </p>

                                            <p class="text-stone-500">
                                                Receive a weekly report of your total earnings and sales.
                                            </p>

                                        </div>


                                        <label
                                            class="relative inline-flex items-center cursor-pointer">

                                            <input
                                                type="checkbox"
                                                name="weekly_sales_summaries"
                                                value="1"
                                                class="sr-only peer"
                                                {{ $settings->weekly_sales_summaries ? 'checked' : '' }}>

                                            <div
                                                class="w-11 h-6 bg-stone-200 rounded-full peer
                                                peer-checked:after:translate-x-full
                                                after:content-['']
                                                after:absolute
                                                after:top-[2px]
                                                after:left-[2px]
                                                after:bg-white
                                                after:border-stone-300
                                                after:border
                                                after:rounded-full
                                                after:h-5
                                                after:w-5
                                                after:transition-all
                                                peer-checked:bg-[#1C5B32]">
                                            </div>

                                        </label>

                                    </div>

                                </div>


                                <!-- Save -->
                                <button
                                    type="submit"
                                    class="mt-5 bg-[#1C5B32] hover:bg-emerald-900 text-white font-medium px-4 py-2 rounded-xl text-xs inline-flex items-center gap-2 transition-colors shadow-sm">

                                    <i data-lucide="save"
                                        class="w-4 h-4">
                                    </i>

                                    Save Notification Settings

                                </button>

                            </form>

                        </section>


                        <!-- ================================================= -->
                        <!-- SECURITY -->
                        <!-- ================================================= -->

                        <section
                            id="security"
                            class="settings-section hidden bg-white p-6 rounded-2xl border border-stone-200 shadow-sm space-y-4">

                            <h2
                                class="font-bold text-stone-800 text-base border-b border-stone-100 pb-3 flex items-center gap-2">

                                <i data-lucide="shield-check"
                                    class="w-5 h-5 text-emerald-800">
                                </i>

                                Password & Security

                            </h2>


                            <form
                                action="{{ route('farmer.settings.password') }}"
                                method="POST"
                                class="space-y-3 text-xs">

                                @csrf


                                <!-- Current Password -->
                                <div class="space-y-1">

                                    <label
                                        class="font-semibold text-stone-700">

                                        Current Password

                                    </label>

                                    <input
                                        type="password"
                                        name="current_password"
                                        placeholder="Enter current password"
                                        class="w-full p-2.5 bg-stone-50 border border-stone-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-emerald-700">

                                </div>


                                <!-- New Password -->
                                <div
                                    class="grid grid-cols-1 sm:grid-cols-2 gap-3">

                                    <div class="space-y-1">

                                        <label
                                            class="font-semibold text-stone-700">

                                            New Password

                                        </label>

                                        <input
                                            type="password"
                                            name="new_password"
                                            placeholder="Enter new password"
                                            class="w-full p-2.5 bg-stone-50 border border-stone-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-emerald-700">

                                    </div>


                                    <!-- Confirm -->
                                    <div class="space-y-1">

                                        <label
                                            class="font-semibold text-stone-700">

                                            Confirm New Password

                                        </label>

                                        <input
                                            type="password"
                                            name="new_password_confirmation"
                                            placeholder="Confirm new password"
                                            class="w-full p-2.5 bg-stone-50 border border-stone-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-emerald-700">

                                    </div>

                                </div>


                                <!-- Update -->
                                <button
                                    type="submit"
                                    class="mt-2 bg-stone-100 hover:bg-stone-200 text-stone-700 font-medium px-3.5 py-2 rounded-xl transition-colors">

                                    Update Password

                                </button>

                            </form>

                        </section>


                        <!-- ================================================= -->
                        <!-- FULFILLMENT -->
                        <!-- ================================================= -->

                        <section
                            id="fulfillment"
                            class="settings-section hidden bg-white p-6 rounded-2xl border border-stone-200 shadow-sm space-y-4">

                            <h2
                                class="font-bold text-stone-800 text-base border-b border-stone-100 pb-3 flex items-center gap-2">

                                <i data-lucide="truck"
                                    class="w-5 h-5 text-emerald-800">
                                </i>

                                Default Fulfillment Settings

                            </h2>


                            <form
                                action="{{ route('farmer.settings.update') }}"
                                method="POST">

                                @csrf


                                <div class="space-y-3 text-xs">


                                    <!-- Farm Pickup -->
                                    <label
                                        class="flex items-center gap-3 p-3 bg-stone-50 border border-stone-200 rounded-xl cursor-pointer">

                                        <input
                                            type="checkbox"
                                            name="allow_farm_pickups"
                                            value="1"
                                            class="w-4 h-4 text-emerald-800 rounded focus:ring-emerald-700"
                                            {{ $settings->allow_farm_pickups ? 'checked' : '' }}>

                                        <div>

                                            <p class="font-bold text-stone-800">
                                                Allow Farm Pickups
                                            </p>

                                            <p class="text-stone-500">
                                                Buyers can collect orders directly at your registered farm location.
                                            </p>

                                        </div>

                                    </label>


                                    <!-- Local Delivery -->
                                    <label
                                        class="flex items-center gap-3 p-3 bg-stone-50 border border-stone-200 rounded-xl cursor-pointer">

                                        <input
                                            type="checkbox"
                                            name="local_delivery"
                                            value="1"
                                            class="w-4 h-4 text-emerald-800 rounded focus:ring-emerald-700"
                                            {{ $settings->local_delivery ? 'checked' : '' }}>

                                        <div>

                                            <p class="font-bold text-stone-800">
                                                Local Delivery Available
                                            </p>

                                            <p class="text-stone-500">
                                                Offer direct local drop-off for buyers within your town/municipality.
                                            </p>

                                        </div>

                                    </label>

                                </div>


                                <!-- Save -->
                                <button
                                    type="submit"
                                    class="mt-5 bg-[#1C5B32] hover:bg-emerald-900 text-white font-medium px-4 py-2 rounded-xl text-xs inline-flex items-center gap-2 transition-colors shadow-sm">

                                    <i data-lucide="save"
                                        class="w-4 h-4">
                                    </i>

                                    Save Fulfillment Settings

                                </button>

                            </form>

                        </section>

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


    <!-- ========================================================= -->
    <!-- JAVASCRIPT -->
    <!-- ========================================================= -->

    <script>

        // Initialize Lucide
        lucide.createIcons();


        // =========================================================
        // NOTIFICATION DROPDOWN
        // =========================================================

        const notificationButton =
            document.getElementById('notificationButton');

        const notificationDropdown =
            document.getElementById('notificationDropdown');


        if (notificationButton && notificationDropdown) {

            notificationButton.addEventListener('click', function(event) {

                event.stopPropagation();

                notificationDropdown.classList.toggle('hidden');

            });


            notificationDropdown.addEventListener('click', function(event) {

                event.stopPropagation();

            });


            document.addEventListener('click', function() {

                notificationDropdown.classList.add('hidden');

            });

        }


        // =========================================================
        // SETTINGS TABS
        // =========================================================

        function showSection(sectionName) {

            // Hide all sections
            document
                .querySelectorAll('.settings-section')
                .forEach(function(section) {

                    section.classList.add('hidden');

                });


            // Show selected section
            const selectedSection =
                document.getElementById(sectionName);

            if (selectedSection) {

                selectedSection.classList.remove('hidden');

            }


            // Reset tabs
            document
                .querySelectorAll('.settings-tab')
                .forEach(function(tab) {

                    tab.classList.remove(
                        'bg-[#1C5B32]',
                        'text-white',
                        'shadow-sm',
                        'font-semibold'
                    );

                    tab.classList.add(
                        'text-stone-700',
                        'font-medium'
                    );

                });


            // Activate selected tab
            const activeTab =
                document.getElementById(sectionName + 'Tab');


            if (activeTab) {

                activeTab.classList.remove(
                    'text-stone-700',
                    'font-medium'
                );

                activeTab.classList.add(
                    'bg-[#1C5B32]',
                    'text-white',
                    'shadow-sm',
                    'font-semibold'
                );

            }

        }

    </script>

</body>

</html>