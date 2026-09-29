<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>AniLink - Sell Harvest</title>

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


    <!-- ========================================================= -->
    <!-- MAIN CONTAINER -->
    <!-- ========================================================= -->

    <div
        class="bg-[#F6F5F2] w-full max-w-7xl rounded-2xl shadow-xl
               flex flex-col md:flex-row overflow-hidden
               border border-stone-300">


        <!-- ========================================================= -->
        <!-- SIDEBAR -->
        <!-- ========================================================= -->

        <aside
            class="w-full md:w-64 bg-[#F6F5F2]
                   border-b md:border-b-0 md:border-r
                   border-stone-200 p-6 flex flex-col
                   justify-between shrink-0">


            <div>


                <!-- ================================================= -->
                <!-- LOGO -->
                <!-- ================================================= -->

                <div class="flex items-center gap-3 mb-8">

                    <div
                        class="w-10 h-10 rounded-full
                               bg-emerald-800 text-white
                               flex items-center justify-center
                               font-bold text-lg">

                        <i
                            data-lucide="sprout"
                            class="w-6 h-6">
                        </i>

                    </div>


                    <span
                        class="text-2xl font-bold text-stone-800
                               tracking-tight">

                        AniLink

                    </span>

                </div>


                <!-- ================================================= -->
                <!-- NAVIGATION -->
                <!-- ================================================= -->

                <nav class="space-y-2">


                    <!-- Dashboard -->
                    <a
                        href="/farmer/dashboard"
                        class="flex items-center gap-3 px-4 py-2.5
                               text-stone-700 hover:bg-stone-200/60
                               rounded-lg transition-colors
                               font-medium">

                        <i
                            data-lucide="layout-dashboard"
                            class="w-5 h-5 text-stone-500">
                        </i>

                        <span>
                            Dashboard
                        </span>

                    </a>


                    <!-- ================================================= -->
                    <!-- SELL HARVEST - ACTIVE -->
                    <!-- ================================================= -->

                    <a
                        href="{{ route('harvest.create') }}"
                        class="flex items-center justify-between
                               px-4 py-3 bg-[#1C5B32]
                               text-white rounded-lg
                               font-medium shadow-sm">

                        <div class="flex items-center gap-3">

                            <i
                                data-lucide="wheat"
                                class="w-5 h-5">
                            </i>

                            <span>
                                Sell Harvest
                            </span>

                        </div>


                        <span
                            class="text-xs bg-emerald-600/60
                                   px-2 py-0.5 rounded
                                   text-emerald-100">

                            Active

                        </span>

                    </a>


                    <!-- My Listings -->
                    <a
                        href="{{ route('farmer.my-listings') }}"
                        class="flex items-center gap-3 px-4 py-2.5
                               text-stone-700 hover:bg-stone-200/60
                               rounded-lg transition-colors
                               font-medium">

                        <i
                            data-lucide="archive"
                            class="w-5 h-5 text-stone-500">
                        </i>

                        <span>
                            My Listings
                        </span>

                    </a>


                    <!-- Orders Received -->
                    <a
                        href="{{ route('farmer.orders.index') }}"
                        class="flex items-center gap-3 px-4 py-2.5
                               text-stone-700 hover:bg-stone-200/60
                               rounded-lg transition-colors
                               font-medium">

                        <i
                            data-lucide="clipboard-list"
                            class="w-5 h-5 text-stone-500">
                        </i>

                        <span>
                            Orders Received
                        </span>

                    </a>


                    <!-- Sales & Earnings -->
                    <a
                        href="/farmer/sales"
                        class="flex items-center gap-3 px-4 py-2.5
                               text-stone-700 hover:bg-stone-200/60
                               rounded-lg transition-colors
                               font-medium">

                        <i
                            data-lucide="circle-dollar-sign"
                            class="w-5 h-5 text-stone-500">
                        </i>

                        <span>
                            Sales & Earnings
                        </span>

                    </a>


                    <!-- Customer Reviews -->
                    <a
                        href="{{ route('farmer.reviews') }}"
                        class="flex items-center gap-3 px-4 py-2.5
                               text-stone-700 hover:bg-stone-200/60
                               rounded-lg transition-colors
                               font-medium">

                        <i
                            data-lucide="star"
                            class="w-5 h-5 text-stone-500">
                        </i>

                        <span>
                            Customer Reviews
                        </span>

                    </a>


                    <!-- Messages -->
                    <a
                        href="/farmer/messages"
                        class="flex items-center gap-3 px-4 py-2.5
                               text-stone-700 hover:bg-stone-200/60
                               rounded-lg transition-colors
                               font-medium">

                        <i
                            data-lucide="message-square"
                            class="w-5 h-5 text-stone-500">
                        </i>

                        <span>
                            Messages
                        </span>

                    </a>


                    <!-- Profile -->
                    <a
                        href="/farmer/profile"
                        class="flex items-center gap-3 px-4 py-2.5
                               text-stone-700 hover:bg-stone-200/60
                               rounded-lg transition-colors
                               font-medium">

                        <i
                            data-lucide="user"
                            class="w-5 h-5 text-stone-500">
                        </i>

                        <span>
                            Profile
                        </span>

                    </a>


                    <!-- Settings -->
                    <a
                        href="/farmer/settings"
                        class="flex items-center gap-3 px-4 py-2.5
                               text-stone-700 hover:bg-stone-200/60
                               rounded-lg transition-colors
                               font-medium">

                        <i
                            data-lucide="settings"
                            class="w-5 h-5 text-stone-500">
                        </i>

                        <span>
                            Settings
                        </span>

                    </a>

                </nav>

            </div>


            <!-- ================================================= -->
            <!-- LOGOUT -->
            <!-- ================================================= -->

            <div
                class="mt-8 pt-4 border-t border-stone-200">

                <form
                    action="{{ route('logout') }}"
                    method="POST">

                    @csrf

                    <button
                        type="submit"
                        class="w-full flex items-center gap-3
                               px-4 py-2.5 text-stone-700
                               hover:bg-red-50 hover:text-red-600
                               rounded-lg transition-colors
                               font-medium text-left">

                        <i
                            data-lucide="log-out"
                            class="w-5 h-5">
                        </i>

                        <span>
                            Logout
                        </span>

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
                class="p-6 flex flex-col md:flex-row
                       items-center justify-between gap-4
                       border-b border-stone-200/60">


                <!-- Search -->
                <div
                    class="relative w-full md:w-96">

                    <i
                        data-lucide="search"
                        class="w-5 h-5 absolute left-3
                               top-1/2 -translate-y-1/2
                               text-stone-400">
                    </i>


                    <input
                        type="text"
                        placeholder="Search product guides, templates..."
                        class="w-full pl-10 pr-4 py-2
                               bg-white border border-stone-200
                               rounded-full text-sm
                               focus:outline-none
                               focus:ring-2
                               focus:ring-emerald-700
                               shadow-sm">

                </div>


                <!-- ================================================= -->
                <!-- HEADER RIGHT -->
                <!-- ================================================= -->

                <div
                    class="flex items-center gap-4
                           self-end md:self-auto">


                    <!-- ================================================= -->
                    <!-- NOTIFICATIONS -->
                    <!-- ================================================= -->

                    <div
                        class="relative"
                        id="notificationWrapper">


                        <!-- Bell -->
                        <button
                            type="button"
                            id="notificationButton"
                            class="relative p-2 rounded-lg
                                   text-stone-600
                                   hover:bg-stone-100
                                   transition-colors"
                            aria-label="Notifications">

                            <i
                                data-lucide="bell"
                                class="w-5 h-5">
                            </i>


                            <!-- Notification Badge -->
                            @if(($notificationCount ?? 0) > 0)

                                <span
                                    id="notificationBadge"
                                    class="absolute -top-0.5 -right-0.5
                                           min-w-[18px] h-[18px] px-1
                                           bg-red-500 text-white
                                           text-[9px] font-bold
                                           rounded-full
                                           flex items-center
                                           justify-center
                                           border-2
                                           border-[#F6F5F2]">

                                    {{ $notificationCount > 9 ? '9+' : $notificationCount }}

                                </span>

                            @endif

                        </button>


                        <!-- ================================================= -->
                        <!-- NOTIFICATION DROPDOWN -->
                        <!-- ================================================= -->

                        <div
                            id="notificationDropdown"
                            class="hidden absolute right-0 top-12
                                   w-80 bg-white rounded-xl
                                   border border-stone-200
                                   shadow-xl z-50 overflow-hidden">


                            <!-- Header -->
                            <div
                                class="px-4 py-3
                                       border-b border-stone-200
                                       flex items-center
                                       justify-between">

                                <div>

                                    <h3
                                        class="font-bold
                                               text-stone-800 text-sm">

                                        Notifications

                                    </h3>


                                    <p
                                        class="text-[10px]
                                               text-stone-400 mt-0.5">

                                        Recent activity

                                    </p>

                                </div>


                                @if(($notificationCount ?? 0) > 0)

                                    <span
                                        class="text-[10px]
                                               font-semibold
                                               text-[#1C5B32]">

                                        {{ $notificationCount }} new

                                    </span>

                                @endif

                            </div>


                            <!-- Notification List -->
                            <div
                                class="max-h-80 overflow-y-auto">


                                @forelse(($notifications ?? collect()) as $notification)


                                    <a
                                        href="{{ route('farmer.orders.index') }}"
                                        class="flex gap-3 px-4 py-3
                                               hover:bg-stone-50
                                               transition-colors
                                               border-b
                                               border-stone-100
                                               {{ is_null($notification->read_at)
                                                    ? 'bg-emerald-50/40'
                                                    : '' }}">


                                        <!-- Icon -->
                                        <div
                                            class="w-9 h-9 rounded-full
                                                   bg-[#1C5B32]
                                                   text-white
                                                   flex items-center
                                                   justify-center
                                                   shrink-0">

                                            <i
                                                data-lucide="{{ $notification->icon ?? 'bell' }}"
                                                class="w-4 h-4">
                                            </i>

                                        </div>


                                        <!-- Content -->
                                        <div
                                            class="flex-1 min-w-0">


                                            <div
                                                class="flex items-start
                                                       justify-between
                                                       gap-2">

                                                <p
                                                    class="text-xs
                                                           font-semibold
                                                           text-stone-800">

                                                    {{ $notification->title }}

                                                </p>


                                                @if(is_null($notification->read_at))

                                                    <span
                                                        class="w-2 h-2
                                                               rounded-full
                                                               bg-[#1C5B32]
                                                               mt-1.5
                                                               shrink-0">
                                                    </span>

                                                @endif

                                            </div>


                                            <p
                                                class="text-[11px]
                                                       text-stone-500
                                                       mt-0.5
                                                       leading-relaxed">

                                                {{ $notification->message }}

                                            </p>


                                            <p
                                                class="text-[10px]
                                                       text-stone-400 mt-1">

                                                {{ $notification->created_at->diffForHumans() }}

                                            </p>

                                        </div>

                                    </a>


                                @empty


                                    <!-- Empty State -->
                                    <div
                                        class="px-4 py-10 text-center">

                                        <div
                                            class="w-11 h-11 mx-auto
                                                   rounded-full
                                                   bg-stone-100
                                                   flex items-center
                                                   justify-center
                                                   mb-3">

                                            <i
                                                data-lucide="bell-off"
                                                class="w-5 h-5
                                                       text-stone-400">
                                            </i>

                                        </div>


                                        <p
                                            class="text-sm
                                                   font-semibold
                                                   text-stone-700">

                                            No notifications

                                        </p>


                                        <p
                                            class="text-[11px]
                                                   text-stone-400 mt-1">

                                            You're all caught up!

                                        </p>

                                    </div>

                                @endforelse

                            </div>


                            <!-- Footer -->
                            @if(($notifications ?? collect())->count() > 0)

                                <div
                                    class="border-t
                                           border-stone-200 p-2">

                                    <a
                                        href="{{ route('farmer.orders.index') }}"
                                        class="block text-center
                                               text-xs font-semibold
                                               text-[#1C5B32]
                                               hover:bg-stone-50
                                               rounded-lg py-2
                                               transition-colors">

                                        View Orders

                                    </a>

                                </div>

                            @endif

                        </div>

                    </div>


                    <!-- ================================================= -->
                    <!-- FARMER PROFILE -->
                    <!-- ================================================= -->

                    <div
                        class="flex items-center gap-3">


                        <div
                            class="w-10 h-10 rounded-full
                                   bg-emerald-800 text-white
                                   flex items-center
                                   justify-center
                                   font-bold">

                            {{ strtoupper(
                                substr(
                                    Auth::user()->first_name ?? 'F',
                                    0,
                                    1
                                )
                            ) }}

                        </div>


                        <span
                            class="font-bold
                                   text-stone-800 text-sm">

                            Farmer
                            {{ Auth::user()->first_name }}
                            {{ Auth::user()->last_name }}

                        </span>

                    </div>

                </div>

            </header>


            <!-- ========================================================= -->
            <!-- FORM CONTENT -->
            <!-- ========================================================= -->

            <div
                class="p-6 space-y-6 overflow-y-auto">


                <!-- ================================================= -->
                <!-- SUCCESS MESSAGE -->
                <!-- ================================================= -->

                @if(session('success'))

                    <div
                        class="p-4 bg-green-100
                               border border-green-300
                               text-green-800 rounded-xl">

                        <div
                            class="flex items-center gap-2">

                            <i
                                data-lucide="check-circle"
                                class="w-5 h-5">
                            </i>

                            <span>
                                {{ session('success') }}
                            </span>

                        </div>

                    </div>

                @endif


                <!-- ================================================= -->
                <!-- ERROR MESSAGE -->
                <!-- ================================================= -->

                @if(session('error'))

                    <div
                        class="p-4 bg-red-100
                               border border-red-300
                               text-red-800 rounded-xl">

                        <div
                            class="flex items-center gap-2">

                            <i
                                data-lucide="circle-alert"
                                class="w-5 h-5">
                            </i>

                            <span>
                                {{ session('error') }}
                            </span>

                        </div>

                    </div>

                @endif


                <!-- ================================================= -->
                <!-- VALIDATION ERRORS -->
                <!-- ================================================= -->

                @if($errors->any())

                    <div
                        class="p-4 bg-red-100
                               border border-red-300
                               text-red-800 rounded-xl">

                        <p
                            class="font-bold mb-2">

                            Please fix the following:

                        </p>


                        <ul
                            class="list-disc pl-5 text-sm">

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

                <div
                    class="flex flex-col sm:flex-row
                           justify-between sm:items-center
                           gap-2 border-b
                           border-stone-200/60 pb-4">


                    <div>

                        <h1
                            class="text-2xl font-bold
                                   text-stone-800">

                            List New Harvest

                        </h1>


                        <p
                            class="text-stone-500 text-sm">

                            Fill in the details below to offer
                            your produce directly to buyers.

                        </p>

                    </div>


                    <!-- Back to Dashboard -->
                    <a
                        href="{{ route('farmer.dashboard') }}"
                        class="inline-flex items-center gap-2
                               text-stone-600
                               hover:text-stone-900
                               text-sm font-medium">

                        <i
                            data-lucide="arrow-left"
                            class="w-4 h-4">
                        </i>

                        Back to Dashboard

                    </a>

                </div>


                <!-- ================================================= -->
                <!-- FORM -->
                <!-- ================================================= -->

                <form
                    id="harvestForm"
                    action="{{ route('harvest.store') }}"
                    method="POST"
                    enctype="multipart/form-data"
                    class="grid grid-cols-1 lg:grid-cols-3 gap-6">

                    @csrf


                    <!-- ================================================= -->
                    <!-- LEFT COLUMN -->
                    <!-- ================================================= -->

                    <div
                        class="lg:col-span-2 space-y-6">


                        <!-- ================================================= -->
                        <!-- BASIC DETAILS -->
                        <!-- ================================================= -->

                        <div
                            class="bg-white p-6 rounded-2xl
                                   border border-stone-200
                                   shadow-sm space-y-4">


                            <h2
                                class="font-bold text-stone-800
                                       text-base
                                       border-b
                                       border-stone-100 pb-2">

                                Basic Details

                            </h2>


                            <div class="space-y-4">


                                <!-- Product Name -->
                                <div>

                                    <label
                                        class="block text-xs
                                               font-bold text-stone-700
                                               uppercase tracking-wider
                                               mb-1">

                                        Produce / Crop Name *

                                    </label>


                                    <input
                                        type="text"
                                        name="product_name"
                                        value="{{ old('product_name') }}"
                                        placeholder="e.g. Organic Red Carrots"
                                        required
                                        class="w-full px-4 py-2.5
                                               bg-stone-50
                                               border border-stone-200
                                               rounded-xl text-sm
                                               focus:outline-none
                                               focus:ring-2
                                               focus:ring-emerald-700">

                                </div>


                                <!-- Category + Farming Method -->
                                <div
                                    class="grid grid-cols-1
                                           sm:grid-cols-2 gap-4">


                                    <!-- Category -->
                                    <div>

                                        <label
                                            class="block text-xs
                                                   font-bold
                                                   text-stone-700
                                                   uppercase
                                                   tracking-wider
                                                   mb-1">

                                            Category *

                                        </label>


                                        <select
                                            name="category"
                                            required
                                            class="w-full px-4 py-2.5
                                                   bg-stone-50
                                                   border
                                                   border-stone-200
                                                   rounded-xl text-sm
                                                   focus:outline-none
                                                   focus:ring-2
                                                   focus:ring-emerald-700
                                                   text-stone-700">

                                            <option value="">
                                                Select Category
                                            </option>


                                            <option
                                                value="vegetables"
                                                {{ old('category') == 'vegetables' ? 'selected' : '' }}>

                                                Vegetables

                                            </option>


                                            <option
                                                value="fruits"
                                                {{ old('category') == 'fruits' ? 'selected' : '' }}>

                                                Fruits

                                            </option>


                                            <option
                                                value="grains"
                                                {{ old('category') == 'grains' ? 'selected' : '' }}>

                                                Grains & Rice

                                            </option>


                                            <option
                                                value="root"
                                                {{ old('category') == 'root' ? 'selected' : '' }}>

                                                Root Crops

                                            </option>

                                        </select>

                                    </div>


                                    <!-- Farming Method -->
                                    <div>

                                        <label
                                            class="block text-xs
                                                   font-bold
                                                   text-stone-700
                                                   uppercase
                                                   tracking-wider
                                                   mb-1">

                                            Farming Method

                                        </label>


                                        <select
                                            name="farming_method"
                                            class="w-full px-4 py-2.5
                                                   bg-stone-50
                                                   border
                                                   border-stone-200
                                                   rounded-xl text-sm
                                                   focus:outline-none
                                                   focus:ring-2
                                                   focus:ring-emerald-700
                                                   text-stone-700">

                                            <option
                                                value="organic"
                                                {{ old('farming_method', 'organic') == 'organic' ? 'selected' : '' }}>

                                                Organic

                                            </option>


                                            <option
                                                value="conventional"
                                                {{ old('farming_method') == 'conventional' ? 'selected' : '' }}>

                                                Conventional

                                            </option>


                                            <option
                                                value="hydroponic"
                                                {{ old('farming_method') == 'hydroponic' ? 'selected' : '' }}>

                                                Hydroponic

                                            </option>

                                        </select>

                                    </div>

                                </div>


                                <!-- Description -->
                                <div>

                                    <label
                                        class="block text-xs
                                               font-bold
                                               text-stone-700
                                               uppercase
                                               tracking-wider
                                               mb-1">

                                        Description

                                    </label>


                                    <textarea
                                        name="description"
                                        rows="4"
                                        placeholder="Describe quality, freshness, harvest date, packaging details..."
                                        class="w-full px-4 py-2.5
                                               bg-stone-50
                                               border border-stone-200
                                               rounded-xl text-sm
                                               focus:outline-none
                                               focus:ring-2
                                               focus:ring-emerald-700
                                               resize-none">{{ old('description') }}</textarea>

                                </div>

                            </div>

                        </div>


                        <!-- ================================================= -->
                        <!-- PRICING & INVENTORY -->
                        <!-- ================================================= -->

                        <div
                            class="bg-white p-6 rounded-2xl
                                   border border-stone-200
                                   shadow-sm space-y-4">


                            <h2
                                class="font-bold text-stone-800
                                       text-base
                                       border-b
                                       border-stone-100 pb-2">

                                Pricing & Inventory

                            </h2>


                            <div
                                class="grid grid-cols-1
                                       sm:grid-cols-3 gap-4">


                                <!-- PRICE -->
                                <div>

                                    <label
                                        class="block text-xs
                                               font-bold
                                               text-stone-700
                                               uppercase
                                               tracking-wider
                                               mb-1">

                                        Price per Unit (₱) *

                                    </label>


                                    <div
                                        class="relative">


                                        <span
                                            class="absolute left-3.5
                                                   top-1/2
                                                   -translate-y-1/2
                                                   text-stone-500
                                                   font-medium
                                                   text-sm">

                                            ₱

                                        </span>


                                        <input
                                            type="number"
                                            name="price"
                                            value="{{ old('price') }}"
                                            step="0.01"
                                            min="0.01"
                                            placeholder="0.00"
                                            required
                                            class="w-full pl-8 pr-4
                                                   py-2.5
                                                   bg-stone-50
                                                   border
                                                   border-stone-200
                                                   rounded-xl text-sm
                                                   focus:outline-none
                                                   focus:ring-2
                                                   focus:ring-emerald-700">

                                    </div>

                                </div>


                                <!-- QUANTITY -->
                                <div>

                                    <label
                                        class="block text-xs
                                               font-bold
                                               text-stone-700
                                               uppercase
                                               tracking-wider
                                               mb-1">

                                        Available Quantity *

                                    </label>


                                    <input
                                        type="number"
                                        name="quantity"
                                        value="{{ old('quantity') }}"
                                        step="1"
                                        min="1"
                                        placeholder="50"
                                        required
                                        class="w-full px-4 py-2.5
                                               bg-stone-50
                                               border
                                               border-stone-200
                                               rounded-xl text-sm
                                               focus:outline-none
                                               focus:ring-2
                                               focus:ring-emerald-700">

                                </div>


                                <!-- UNIT -->
                                <div>

                                    <label
                                        class="block text-xs
                                               font-bold
                                               text-stone-700
                                               uppercase
                                               tracking-wider
                                               mb-1">

                                        Unit *

                                    </label>


                                    <select
                                        name="unit"
                                        required
                                        class="w-full px-4 py-2.5
                                               bg-stone-50
                                               border
                                               border-stone-200
                                               rounded-xl text-sm
                                               focus:outline-none
                                               focus:ring-2
                                               focus:ring-emerald-700
                                               text-stone-700">


                                        <option
                                            value="kg"
                                            {{ old('unit', 'kg') == 'kg' ? 'selected' : '' }}>

                                            Kilogram (kg)

                                        </option>


                                        <option
                                            value="sack"
                                            {{ old('unit') == 'sack' ? 'selected' : '' }}>

                                            Sack (50kg)

                                        </option>


                                        <option
                                            value="box"
                                            {{ old('unit') == 'box' ? 'selected' : '' }}>

                                            Box/Crate

                                        </option>


                                        <option
                                            value="piece"
                                            {{ old('unit') == 'piece' ? 'selected' : '' }}>

                                            Piece

                                        </option>

                                    </select>

                                </div>

                            </div>

                        </div>

                    </div>


                    <!-- ================================================= -->
                    <!-- RIGHT COLUMN -->
                    <!-- ================================================= -->

                    <div
                        class="space-y-6">


                        <!-- ================================================= -->
                        <!-- UPLOAD PHOTO -->
                        <!-- ================================================= -->

                        <div
                            class="bg-white p-6 rounded-2xl
                                   border border-stone-200
                                   shadow-sm">


                            <h2
                                class="font-bold text-stone-800
                                       text-base
                                       border-b
                                       border-stone-100
                                       pb-3 mb-5">

                                Upload Photo

                            </h2>


                            <!-- Upload Box -->
                            <label
                                for="image"
                                id="uploadBox"
                                class="relative block w-full h-64
                                       border-2 border-dashed
                                       border-stone-300
                                       rounded-xl overflow-hidden
                                       cursor-pointer
                                       hover:border-emerald-700
                                       transition">


                                <!-- Default Upload Content -->
                                <div
                                    id="uploadContent"
                                    class="absolute inset-0
                                           flex flex-col
                                           items-center
                                           justify-center
                                           text-center bg-white">


                                    <div
                                        class="w-16 h-16
                                               bg-emerald-100
                                               text-emerald-800
                                               rounded-full
                                               flex items-center
                                               justify-center
                                               mb-4">

                                        <i
                                            data-lucide="cloud-upload"
                                            class="w-8 h-8">
                                        </i>

                                    </div>


                                    <p
                                        class="text-lg font-semibold
                                               text-stone-800">

                                        Click to upload photo

                                    </p>


                                    <p
                                        class="text-sm
                                               text-stone-400 mt-1">

                                        PNG, JPG or WEBP
                                        (Max 5MB)

                                    </p>

                                </div>


                                <!-- Image Preview -->
                                <img
                                    id="photoPreview"
                                    src=""
                                    alt="Uploaded photo"
                                    class="hidden absolute inset-0
                                           w-full h-full
                                           object-cover">


                                <!-- File Input -->
                                <input
                                    type="file"
                                    name="image"
                                    id="image"
                                    accept=".jpg,.jpeg,.png,.webp"
                                    class="hidden">

                            </label>


                            <!-- Photo Error -->
                            <p
                                id="photoError"
                                class="hidden text-red-600
                                       text-xs mt-2">
                            </p>

                        </div>


                        <!-- ================================================= -->
                        <!-- FULFILLMENT OPTIONS -->
                        <!-- ================================================= -->

                        <div
                            class="bg-white p-6 rounded-2xl
                                   border border-stone-200
                                   shadow-sm space-y-4">


                            <h2
                                class="font-bold text-stone-800
                                       text-base
                                       border-b
                                       border-stone-100 pb-2">

                                Fulfillment Options

                            </h2>


                            <div
                                class="space-y-3">


                                <!-- Farm Pickup -->
                                <label
                                    class="flex items-center gap-3
                                           p-3 bg-stone-50
                                           border
                                           border-stone-200
                                           rounded-xl
                                           cursor-pointer">


                                    <input
                                        type="checkbox"
                                        name="farm_pickup"
                                        value="1"
                                        {{ old('farm_pickup', '1') ? 'checked' : '' }}
                                        class="w-4 h-4
                                               text-emerald-700
                                               rounded
                                               border-stone-300
                                               focus:ring-emerald-700">


                                    <span
                                        class="text-sm
                                               font-medium
                                               text-stone-700">

                                        Farm Pickup Available

                                    </span>

                                </label>


                                <!-- Local Delivery -->
                                <label
                                    class="flex items-center gap-3
                                           p-3 bg-stone-50
                                           border
                                           border-stone-200
                                           rounded-xl
                                           cursor-pointer">


                                    <input
                                        type="checkbox"
                                        name="local_delivery"
                                        value="1"
                                        {{ old('local_delivery', '1') ? 'checked' : '' }}
                                        class="w-4 h-4
                                               text-emerald-700
                                               rounded
                                               border-stone-300
                                               focus:ring-emerald-700">


                                    <span
                                        class="text-sm
                                               font-medium
                                               text-stone-700">

                                        Local Delivery Offered

                                    </span>

                                </label>

                            </div>

                        </div>


                        <!-- ================================================= -->
                        <!-- BUTTONS -->
                        <!-- ================================================= -->

                        <div
                            class="space-y-3 pt-2">


                            <!-- Publish -->
                            <button
                                type="submit"
                                class="w-full bg-[#1C5B32]
                                       hover:bg-emerald-900
                                       text-white font-bold
                                       py-3 px-4 rounded-xl
                                       transition-colors
                                       shadow-md
                                       flex items-center
                                       justify-center gap-2">


                                <i
                                    data-lucide="check"
                                    class="w-5 h-5">
                                </i>


                                Publish Harvest Listing

                            </button>


                            <!-- Draft -->
                            <button
                                type="submit"
                                name="save_draft"
                                value="1"
                                formnovalidate
                                class="w-full bg-white
                                       hover:bg-stone-100
                                       text-stone-700
                                       font-semibold
                                       py-3 px-4
                                       border border-stone-300
                                       rounded-xl
                                       transition-colors">

                                Save as Draft

                            </button>

                        </div>

                    </div>

                </form>

            </div>


            <!-- ========================================================= -->
            <!-- FOOTER -->
            <!-- ========================================================= -->

            <footer
                class="p-4 text-center text-xs
                       text-stone-500
                       border-t
                       border-stone-200/60
                       mt-auto">

                © 2026 AniLink

            </footer>

        </main>

    </div>


    <!-- ========================================================= -->
    <!-- JAVASCRIPT -->
    <!-- ========================================================= -->

    <script>

        document.addEventListener('DOMContentLoaded', function () {


            /* =========================================================
               LUCIDE ICONS
            ========================================================= */

            lucide.createIcons();


            /* =========================================================
               NOTIFICATION DROPDOWN
            ========================================================= */

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


                // Open / close dropdown
                notificationButton.addEventListener(
                    'click',
                    function (event) {

                        event.stopPropagation();

                        notificationDropdown.classList.toggle(
                            'hidden'
                        );

                    }
                );


                // Prevent dropdown from closing
                // when clicking inside it
                notificationDropdown.addEventListener(
                    'click',
                    function (event) {

                        event.stopPropagation();

                    }
                );


                // Close when clicking outside
                document.addEventListener(
                    'click',
                    function (event) {

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


            /* =========================================================
               IMAGE UPLOAD PREVIEW
            ========================================================= */

            const imageInput =
                document.getElementById('image');

            const photoPreview =
                document.getElementById('photoPreview');

            const uploadContent =
                document.getElementById('uploadContent');

            const photoError =
                document.getElementById('photoError');


            if (
                imageInput &&
                photoPreview &&
                uploadContent &&
                photoError
            ) {


                imageInput.addEventListener(
                    'change',
                    function () {

                        const file =
                            this.files[0];


                        // Reset error
                        photoError.classList.add(
                            'hidden'
                        );

                        photoError.textContent = '';


                        if (!file) {

                            return;

                        }


                        /* -----------------------------------------
                           FILE TYPE VALIDATION
                        ----------------------------------------- */

                        const allowedTypes = [
                            'image/jpeg',
                            'image/png',
                            'image/webp'
                        ];


                        if (
                            !allowedTypes.includes(
                                file.type
                            )
                        ) {

                            photoError.textContent =
                                'Please upload a JPG, PNG, or WEBP image.';

                            photoError.classList.remove(
                                'hidden'
                            );

                            this.value = '';

                            photoPreview.classList.add(
                                'hidden'
                            );

                            uploadContent.classList.remove(
                                'hidden'
                            );

                            return;

                        }


                        /* -----------------------------------------
                           FILE SIZE VALIDATION
                        ----------------------------------------- */

                        const maxSize =
                            5 * 1024 * 1024;


                        if (
                            file.size > maxSize
                        ) {

                            photoError.textContent =
                                'The photo must be smaller than 5MB.';

                            photoError.classList.remove(
                                'hidden'
                            );

                            this.value = '';

                            photoPreview.classList.add(
                                'hidden'
                            );

                            uploadContent.classList.remove(
                                'hidden'
                            );

                            return;

                        }


                        /* -----------------------------------------
                           IMAGE PREVIEW
                        ----------------------------------------- */

                        const reader =
                            new FileReader();


                        reader.onload =
                            function (event) {

                                photoPreview.src =
                                    event.target.result;

                                uploadContent.classList.add(
                                    'hidden'
                                );

                                photoPreview.classList.remove(
                                    'hidden'
                                );

                            };


                        reader.readAsDataURL(file);

                    }
                );

            }


        });

    </script>

</body>

</html>