<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>AniLink - My Listings</title>

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

        .listing-card.hidden {
            display: none;
        }

        .filter-btn.active {
            background-color: #1C5B32;
            color: white;
        }
    </style>
</head>

<body class="p-4 md:p-8 flex items-center justify-center min-h-screen">

<div
    class="bg-[#F6F5F2] w-full max-w-7xl rounded-2xl shadow-xl
           flex flex-col md:flex-row overflow-hidden
           border border-stone-300"
>

    <!-- =========================================================
         SIDEBAR
    ========================================================== -->

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
                    class="w-10 h-10 rounded-full bg-emerald-800
                           text-white flex items-center justify-center
                           font-bold text-lg"
                >
                    <i data-lucide="sprout" class="w-6 h-6"></i>
                </div>

                <span
                    class="text-2xl font-bold text-stone-800
                           tracking-tight"
                >
                    AniLink
                </span>

            </div>


            <!-- NAVIGATION -->

            <nav class="space-y-2">

                <!-- Dashboard -->
                <a
                    href="{{ route('farmer.dashboard') }}"
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


                <!-- Sell Harvest -->
                <a
                    href="{{ route('harvest.create') }}"
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


                <!-- My Listings ACTIVE -->
                <a
                    href="{{ route('farmer.my-listings') }}"
                    class="flex items-center justify-between
                           px-4 py-3 bg-[#1C5B32]
                           text-white rounded-lg
                           font-medium shadow-sm"
                >

                    <div class="flex items-center gap-3">

                        <i
                            data-lucide="archive"
                            class="w-5 h-5"
                        ></i>

                        <span>My Listings</span>

                    </div>

                    <span
                        class="text-xs bg-emerald-600/60
                               px-2 py-0.5 rounded
                               text-emerald-100"
                    >
                        {{ $listings->count() }}
                    </span>

                </a>


                <!-- Orders Received -->
                <a
                    href="{{ route('farmer.orders.index') }}"
                    class="flex items-center gap-3 px-4 py-2.5
                           text-stone-700 hover:bg-stone-200/60
                           rounded-lg transition-colors font-medium"
                >

                    <i
                        data-lucide="clipboard-list"
                        class="w-5 h-5 text-stone-500"
                    ></i>

                    <span>Orders Received</span>

                </a>


                <!-- Sales & Earnings -->
                <a
                    href="{{ route('farmer.sales') }}"
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


                <!-- Customer Reviews -->
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


                <!-- Messages -->
                <a
                    href="{{ route('farmer.messages') }}"
                    class="flex items-center gap-3 px-4 py-2.5
                           text-stone-700 hover:bg-stone-200/60
                           rounded-lg transition-colors font-medium"
                >

                    <i
                        data-lucide="message-square"
                        class="w-5 h-5 text-stone-500"
                    ></i>

                    <span>Messages</span>

                </a>


                <!-- Profile -->
                <a
                    href="{{ route('farmer.profile') }}"
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


                <!-- Settings -->
                <a
                    href="/farmer/settings"
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


        <!-- LOGOUT -->

        <div class="mt-8 pt-4 border-t border-stone-200">

            <form
                action="{{ route('logout') }}"
                method="POST"
            >

                @csrf

                <button
                    type="submit"
                    class="w-full flex items-center gap-3
                           px-4 py-2.5 text-stone-700
                           hover:bg-red-50 hover:text-red-600
                           rounded-lg transition-colors
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


    <!-- =========================================================
         MAIN
    ========================================================== -->

    <main class="flex-1 flex flex-col min-w-0">


        <!-- =====================================================
             HEADER
        ====================================================== -->

        <header
            class="p-6 flex flex-col md:flex-row
                   items-center justify-between gap-4
                   border-b border-stone-200/60"
        >

            <!-- SEARCH -->

            <div class="relative w-full md:w-96">

                <i
                    data-lucide="search"
                    class="w-5 h-5 absolute left-3 top-1/2
                           -translate-y-1/2 text-stone-400"
                ></i>

                <input
                    id="searchInput"
                    type="text"
                    placeholder="Search my listings..."
                    class="w-full pl-10 pr-4 py-2 bg-white
                           border border-stone-200 rounded-full
                           text-sm focus:outline-none
                           focus:ring-2 focus:ring-emerald-700
                           shadow-sm"
                >

            </div>


            <!-- USER -->

            <div
                class="flex items-center gap-4
                       self-end md:self-auto"
            >

                <!-- NOTIFICATION -->

                <div class="relative" id="notificationWrapper">

                    <button
                        type="button"
                        id="notificationButton"
                        class="p-2 text-stone-600
                               hover:bg-stone-200/50
                               rounded-full relative"
                    >

                        <i
                            data-lucide="bell"
                            class="w-5 h-5"
                        ></i>

                        @if($notificationCount > 0)

                            <span
                                class="absolute -top-1 -right-1
                                       min-w-[18px] h-[18px]
                                       px-1 bg-red-500
                                       text-white text-[10px]
                                       rounded-full flex
                                       items-center justify-center
                                       font-bold"
                            >
                                {{ $notificationCount > 99 ? '99+' : $notificationCount }}
                            </span>

                        @endif

                    </button>


                    <!-- NOTIFICATION DROPDOWN -->

                    <div
                        id="notificationDropdown"
                        class="hidden absolute right-0 top-12
                               w-80 bg-white rounded-xl
                               shadow-xl border border-stone-200
                               z-50 overflow-hidden"
                    >

                        <div
                            class="px-4 py-3 border-b
                                   border-stone-200 flex
                                   items-center justify-between"
                        >

                            <div>

                                <h3
                                    class="font-bold text-stone-800"
                                >
                                    Notifications
                                </h3>

                                <p
                                    class="text-[11px]
                                           text-stone-400"
                                >
                                    Your latest updates
                                </p>

                            </div>

                            @if($notificationCount > 0)

                                <span
                                    class="text-xs font-semibold
                                           text-emerald-700"
                                >
                                    {{ $notificationCount }} unread
                                </span>

                            @endif

                        </div>


                        <div class="max-h-80 overflow-y-auto">

                            @forelse($notifications as $notification)

                                <div
                                    class="px-4 py-3 border-b
                                           border-stone-100
                                           hover:bg-stone-50
                                           transition
                                           {{ is_null($notification->read_at) ? 'bg-emerald-50/50' : '' }}"
                                >

                                    <div class="flex gap-3">

                                        <div
                                            class="w-9 h-9 rounded-full
                                                   bg-emerald-100
                                                   text-emerald-700
                                                   flex items-center
                                                   justify-center
                                                   shrink-0"
                                        >

                                            <i
                                                data-lucide="{{ $notification->icon ?? 'bell' }}"
                                                class="w-4 h-4"
                                            ></i>

                                        </div>


                                        <div class="min-w-0">

                                            <p
                                                class="text-sm font-semibold
                                                       text-stone-800"
                                            >
                                                {{ $notification->title }}
                                            </p>

                                            <p
                                                class="text-xs
                                                       text-stone-500 mt-0.5"
                                            >
                                                {{ $notification->message }}
                                            </p>

                                            <p
                                                class="text-[10px]
                                                       text-stone-400 mt-1"
                                            >
                                                {{ $notification->created_at?->diffForHumans() }}
                                            </p>

                                        </div>

                                    </div>

                                </div>

                            @empty

                                <div
                                    class="px-4 py-10 text-center"
                                >

                                    <i
                                        data-lucide="bell-off"
                                        class="w-8 h-8 mx-auto
                                               text-stone-300 mb-2"
                                    ></i>

                                    <p
                                        class="text-sm
                                               text-stone-500"
                                    >
                                        No notifications yet.
                                    </p>

                                </div>

                            @endforelse

                        </div>

                    </div>

                </div>


                <!-- USER PROFILE -->

                <div class="flex items-center gap-3">

                    <div
                        class="w-10 h-10 rounded-full
                               bg-emerald-800 text-white
                               flex items-center justify-center
                               font-bold"
                    >
                        {{ strtoupper(substr(Auth::user()->first_name ?? 'F', 0, 1)) }}
                    </div>

                    <span
                        class="font-bold text-stone-800 text-sm"
                    >
                        Farmer
                        {{ Auth::user()->first_name }}
                        {{ Auth::user()->last_name }}
                    </span>

                </div>

            </div>

        </header>


        <!-- =====================================================
             CONTENT
        ====================================================== -->

        <div
            class="p-6 space-y-6 overflow-y-auto"
        >


            <!-- SUCCESS MESSAGE -->

            @if(session('success'))

                <div
                    class="bg-emerald-50 border
                           border-emerald-200
                           text-emerald-800 px-4 py-3
                           rounded-xl text-sm flex
                           items-center gap-2"
                >

                    <i
                        data-lucide="check-circle"
                        class="w-5 h-5"
                    ></i>

                    {{ session('success') }}

                </div>

            @endif


            <!-- ERROR MESSAGE -->

            @if(session('error'))

                <div
                    class="bg-red-50 border border-red-200
                           text-red-800 px-4 py-3 rounded-xl
                           text-sm flex items-center gap-2"
                >

                    <i
                        data-lucide="circle-alert"
                        class="w-5 h-5"
                    ></i>

                    {{ session('error') }}

                </div>

            @endif


            <!-- TITLE -->

            <div
                class="flex flex-col sm:flex-row
                       justify-between sm:items-center
                       gap-4 border-b border-stone-200/60 pb-4"
            >

                <div>

                    <h1
                        class="text-2xl font-bold text-stone-800"
                    >
                        My Harvest Listings
                    </h1>

                    <p
                        class="text-stone-500 text-sm"
                    >
                        Manage, update, and track your active,
                        draft, and archived produce inventory.
                    </p>

                </div>


                <a
                    href="{{ route('harvest.create') }}"
                    class="bg-[#1C5B32] hover:bg-emerald-900
                           text-white font-medium px-4 py-2.5
                           rounded-xl text-sm inline-flex
                           items-center gap-2 transition-colors
                           shadow-sm self-start sm:self-auto"
                >

                    <i
                        data-lucide="plus"
                        class="w-4 h-4"
                    ></i>

                    Add New Harvest

                </a>

            </div>


            <!-- =================================================
                 FILTER BAR
            ================================================== -->

            <div
                class="flex flex-col md:flex-row
                       items-center justify-between gap-4
                       bg-white p-4 rounded-xl
                       border border-stone-200 shadow-sm"
            >

                <!-- STATUS -->

                <div
                    class="flex gap-2 w-full md:w-auto
                           overflow-x-auto pb-2 md:pb-0"
                >

                    <button
                        type="button"
                        class="filter-btn active px-4 py-1.5
                               rounded-lg text-xs font-semibold
                               whitespace-nowrap"
                        data-filter="all"
                    >
                        All
                        (<span id="allCount">0</span>)
                    </button>


                    <button
                        type="button"
                        class="filter-btn px-4 py-1.5
                               bg-stone-100 hover:bg-stone-200
                               text-stone-700 rounded-lg
                               text-xs font-semibold
                               whitespace-nowrap"
                        data-filter="draft"
                    >
                        Draft
                        (<span id="draftCount">0</span>)
                    </button>


                    <button
                        type="button"
                        class="filter-btn px-4 py-1.5
                               bg-stone-100 hover:bg-stone-200
                               text-stone-700 rounded-lg
                               text-xs font-semibold
                               whitespace-nowrap"
                        data-filter="active"
                    >
                        Active
                        (<span id="activeCount">0</span>)
                    </button>


                    <button
                        type="button"
                        class="filter-btn px-4 py-1.5
                               bg-stone-100 hover:bg-stone-200
                               text-stone-700 rounded-lg
                               text-xs font-semibold
                               whitespace-nowrap"
                        data-filter="low-stock"
                    >
                        Low Stock
                        (<span id="lowStockCount">0</span>)
                    </button>


                    <button
                        type="button"
                        class="filter-btn px-4 py-1.5
                               bg-stone-100 hover:bg-stone-200
                               text-stone-700 rounded-lg
                               text-xs font-semibold
                               whitespace-nowrap"
                        data-filter="out-of-stock"
                    >
                        Out of Stock
                        (<span id="outOfStockCount">0</span>)
                    </button>

                </div>


                <!-- CATEGORY + SORT -->

                <div
                    class="flex items-center gap-3
                           w-full md:w-auto justify-end"
                >

                    <select
                        id="categoryFilter"
                        class="px-3 py-1.5 bg-stone-50
                               border border-stone-200
                               rounded-lg text-xs font-medium
                               text-stone-700 focus:outline-none
                               focus:ring-2
                               focus:ring-emerald-700"
                    >

                        <option value="all">
                            All Categories
                        </option>

                        <option value="vegetables">
                            Vegetables
                        </option>

                        <option value="fruits">
                            Fruits
                        </option>

                        <option value="root">
                            Root Crops
                        </option>

                        <option value="grains">
                            Grains
                        </option>

                        <option value="other">
                            Other
                        </option>

                    </select>


                    <select
                        id="sortFilter"
                        class="px-3 py-1.5 bg-stone-50
                               border border-stone-200
                               rounded-lg text-xs font-medium
                               text-stone-700 focus:outline-none
                               focus:ring-2
                               focus:ring-emerald-700"
                    >

                        <option value="newest">
                            Sort by: Newest
                        </option>

                        <option value="price-low">
                            Price: Low to High
                        </option>

                        <option value="price-high">
                            Price: High to Low
                        </option>

                        <option value="stock">
                            Stock Quantity
                        </option>

                    </select>

                </div>

            </div>


            <!-- =================================================
                 LISTINGS
            ================================================== -->

            <div
                id="listingsGrid"
                class="grid grid-cols-1 sm:grid-cols-2
                       lg:grid-cols-3 xl:grid-cols-4 gap-6"
            >

                @forelse($listings as $listing)

                    @php

                        $quantity = (int) $listing->quantity;

                        if ($listing->status === 'Draft') {

                            $listingStatus = 'draft';

                        } elseif ($quantity <= 0) {

                            $listingStatus = 'out-of-stock';

                        } elseif ($quantity <= 5) {

                            $listingStatus = 'low-stock';

                        } else {

                            $listingStatus = 'active';

                        }

                    @endphp


                    <!-- LISTING CARD -->

                    <div
                        class="listing-card bg-white rounded-2xl
                               border border-stone-200 overflow-hidden
                               shadow-sm flex flex-col
                               justify-between hover:shadow-md
                               transition-shadow"
                        data-status="{{ $listingStatus }}"
                        data-category="{{ strtolower($listing->category ?? 'other') }}"
                        data-name="{{ strtolower($listing->product_name ?? '') }}"
                        data-price="{{ $listing->price ?? 0 }}"
                        data-stock="{{ $quantity }}"
                        data-date="{{ $listing->created_at?->timestamp ?? 0 }}"
                    >

                        <div>


                            <!-- IMAGE -->

                            <div
                                class="relative h-40
                                       bg-stone-100"
                            >

                                @if($listing->image)

                                    <img
                                        src="{{ asset('storage/' . $listing->image) }}"
                                        alt="{{ $listing->product_name }}"
                                        class="w-full h-full
                                               object-cover"
                                    >

                                @else

                                    <div
                                        class="w-full h-full flex
                                               items-center
                                               justify-center
                                               text-stone-400"
                                    >

                                        <i
                                            data-lucide="image-off"
                                            class="w-10 h-10"
                                        ></i>

                                    </div>

                                @endif


                                <!-- STATUS -->

                                @if($listingStatus === 'draft')

                                    <span
                                        class="absolute top-3 left-3
                                               bg-stone-100 border
                                               border-stone-300
                                               text-stone-700
                                               text-[10px] font-bold
                                               px-2 py-0.5 rounded-md
                                               flex items-center gap-1"
                                    >

                                        <i
                                            data-lucide="file-edit"
                                            class="w-3 h-3"
                                        ></i>

                                        Draft

                                    </span>

                                @elseif($listingStatus === 'out-of-stock')

                                    <span
                                        class="absolute top-3 left-3
                                               bg-red-100 border
                                               border-red-300
                                               text-red-800
                                               text-[10px] font-bold
                                               px-2 py-0.5 rounded-md"
                                    >
                                        Out of Stock
                                    </span>

                                @elseif($listingStatus === 'low-stock')

                                    <span
                                        class="absolute top-3 left-3
                                               bg-amber-100 border
                                               border-amber-300
                                               text-amber-800
                                               text-[10px] font-bold
                                               px-2 py-0.5 rounded-md
                                               flex items-center gap-1"
                                    >

                                        <i
                                            data-lucide="triangle-alert"
                                            class="w-3 h-3"
                                        ></i>

                                        Low Stock

                                    </span>

                                @else

                                    <span
                                        class="absolute top-3 left-3
                                               bg-emerald-100 border
                                               border-emerald-300
                                               text-emerald-800
                                               text-[10px] font-bold
                                               px-2 py-0.5 rounded-md"
                                    >
                                        Active
                                    </span>

                                @endif

                            </div>


                            <!-- INFORMATION -->

                            <div class="p-4">

                                <div
                                    class="flex justify-between
                                           items-start mb-1 gap-2"
                                >

                                    <h3
                                        class="font-bold
                                               text-stone-800
                                               text-base truncate"
                                        title="{{ $listing->product_name }}"
                                    >
                                        {{ $listing->product_name ?? 'Untitled Harvest' }}
                                    </h3>


                                    @if($listingStatus === 'draft')

                                        <span
                                            class="font-semibold
                                                   text-stone-400
                                                   text-xs
                                                   whitespace-nowrap"
                                        >
                                            Not Published
                                        </span>

                                    @else

                                        <span
                                            class="font-bold
                                                   text-emerald-800
                                                   text-sm
                                                   whitespace-nowrap"
                                        >
                                            ₱{{ number_format($listing->price ?? 0, 2) }}/{{ $listing->unit ?? 'unit' }}
                                        </span>

                                    @endif

                                </div>


                                <!-- CATEGORY -->

                                <p
                                    class="text-[11px]
                                           text-stone-400 mb-2"
                                >
                                    {{ ucfirst($listing->category ?? 'other') }}
                                </p>


                                <!-- DESCRIPTION -->

                                <p
                                    class="text-xs text-stone-500
                                           mb-3 line-clamp-2"
                                >
                                    {{ $listing->description ?: 'No description provided.' }}
                                </p>


                                <!-- STOCK -->

                                @if($listingStatus === 'draft')

                                    <div
                                        class="flex justify-between
                                               items-center text-xs
                                               text-stone-600
                                               bg-stone-50 p-2
                                               rounded-lg"
                                    >

                                        <span>
                                            Listing Status:
                                            <strong>
                                                Draft
                                            </strong>
                                        </span>

                                        <span
                                            class="text-stone-500
                                                   font-semibold"
                                        >
                                            Not Published
                                        </span>

                                    </div>

                                @else

                                    <div
                                        class="flex justify-between
                                               items-center text-xs
                                               text-stone-600
                                               bg-stone-50 p-2
                                               rounded-lg"
                                    >

                                        <span>
                                            Stock Left:

                                            <strong
                                                class="
                                                @if($listingStatus === 'out-of-stock')
                                                    text-red-600
                                                @elseif($listingStatus === 'low-stock')
                                                    text-amber-600
                                                @else
                                                    text-emerald-700
                                                @endif
                                                "
                                            >
                                                {{ $quantity }}
                                                {{ $listing->unit }}
                                            </strong>

                                        </span>


                                        @if($listingStatus === 'out-of-stock')

                                            <span
                                                class="text-red-600
                                                       font-semibold"
                                            >
                                                Empty
                                            </span>

                                        @elseif($listingStatus === 'low-stock')

                                            <span
                                                class="text-amber-600
                                                       font-semibold"
                                            >
                                                Running Low
                                            </span>

                                        @else

                                            <span
                                                class="text-emerald-700
                                                       font-semibold"
                                            >
                                                Available
                                            </span>

                                        @endif

                                    </div>

                                @endif

                            </div>

                        </div>


                        <!-- ACTION BUTTONS -->

                        <div
                            class="p-4 pt-0 flex gap-2"
                        >

                            <!-- EDIT -->

                            <a
                                href="{{ route('farmer.listing.edit', $listing->id) }}"
                                class="flex-1 bg-[#1C5B32]
                                       hover:bg-emerald-900
                                       text-white font-medium
                                       py-2 rounded-lg text-xs
                                       transition-colors
                                       flex items-center
                                       justify-center gap-1"
                            >

                                @if($listingStatus === 'draft')

                                    <i
                                        data-lucide="file-edit"
                                        class="w-3.5 h-3.5"
                                    ></i>

                                    Continue Editing

                                @else

                                    <i
                                        data-lucide="pencil"
                                        class="w-3.5 h-3.5"
                                    ></i>

                                    Edit

                                @endif

                            </a>


                            <!-- DELETE -->

                            <form
                                action="{{ route('farmer.listing.destroy', $listing->id) }}"
                                method="POST"
                                onsubmit="return confirm('Are you sure you want to delete this listing?');"
                            >

                                @csrf

                                @method('DELETE')

                                <button
                                    type="submit"
                                    class="px-3 bg-red-50
                                           hover:bg-red-100
                                           text-red-600
                                           rounded-lg text-xs
                                           font-medium
                                           transition-colors"
                                    title="Delete listing"
                                >

                                    <i
                                        data-lucide="trash-2"
                                        class="w-3.5 h-3.5"
                                    ></i>

                                </button>

                            </form>

                        </div>

                    </div>

                @empty

                    <!-- EMPTY STATE -->

                    <div
                        class="col-span-full bg-white
                               rounded-2xl border
                               border-stone-200 p-10
                               text-center"
                    >

                        <i
                            data-lucide="wheat"
                            class="w-12 h-12 mx-auto
                                   text-stone-300 mb-3"
                        ></i>

                        <h3
                            class="font-bold text-stone-700
                                   text-lg"
                        >
                            No Harvest Listings Yet
                        </h3>

                        <p
                            class="text-sm text-stone-500 mt-1"
                        >
                            Start selling your harvest by creating
                            your first listing.
                        </p>

                        <a
                            href="{{ route('harvest.create') }}"
                            class="inline-flex items-center gap-2
                                   mt-4 bg-[#1C5B32]
                                   hover:bg-emerald-900
                                   text-white px-4 py-2
                                   rounded-lg text-sm"
                        >

                            <i
                                data-lucide="plus"
                                class="w-4 h-4"
                            ></i>

                            Add New Harvest

                        </a>

                    </div>

                @endforelse

            </div>


            <!-- NO RESULTS -->

            <div
                id="noResults"
                class="hidden bg-white rounded-2xl
                       border border-stone-200 p-10
                       text-center"
            >

                <i
                    data-lucide="search-x"
                    class="w-12 h-12 mx-auto
                           text-stone-300 mb-3"
                ></i>

                <h3
                    class="font-bold text-stone-700 text-lg"
                >
                    No Listings Found
                </h3>

                <p
                    class="text-sm text-stone-500 mt-1"
                >
                    Try changing your search or filters.
                </p>

            </div>


            <!-- RESULT INFORMATION -->

            <div
                class="flex flex-col sm:flex-row
                       items-center justify-between gap-3
                       bg-white p-4 rounded-xl
                       border border-stone-200
                       text-xs text-stone-600"
            >

                <span id="resultCount">
                    Showing 0 listings
                </span>

                <button
                    id="clearFilters"
                    type="button"
                    class="px-3 py-1.5
                           border border-stone-200
                           rounded-lg hover:bg-stone-50
                           font-medium"
                >
                    Clear Filters
                </button>

            </div>

        </div>


        <!-- FOOTER -->

        <footer
            class="p-4 text-center text-xs
                   text-stone-500
                   border-t border-stone-200/60 mt-auto"
        >
            © 2026 AniLink
        </footer>

    </main>

</div>


<!-- =============================================================
     JAVASCRIPT
============================================================= -->

<script>

document.addEventListener('DOMContentLoaded', function () {

    // =========================================================
    // LUCIDE
    // =========================================================

    lucide.createIcons();


    // =========================================================
    // ELEMENTS
    // =========================================================

    const cards = Array.from(
        document.querySelectorAll('.listing-card')
    );

    const filterButtons =
        document.querySelectorAll('.filter-btn');

    const searchInput =
        document.getElementById('searchInput');

    const categoryFilter =
        document.getElementById('categoryFilter');

    const sortFilter =
        document.getElementById('sortFilter');

    const listingsGrid =
        document.getElementById('listingsGrid');

    const noResults =
        document.getElementById('noResults');

    const resultCount =
        document.getElementById('resultCount');

    const clearFilters =
        document.getElementById('clearFilters');


    // =========================================================
    // NOTIFICATIONS
    // =========================================================

    const notificationButton =
        document.getElementById('notificationButton');

    const notificationDropdown =
        document.getElementById('notificationDropdown');

    const notificationWrapper =
        document.getElementById('notificationWrapper');


    if (
        notificationButton &&
        notificationDropdown
    ) {

        notificationButton.addEventListener(
            'click',
            function (event) {

                event.stopPropagation();

                notificationDropdown.classList.toggle(
                    'hidden'
                );

            }
        );


        document.addEventListener(
            'click',
            function (event) {

                if (
                    notificationWrapper &&
                    !notificationWrapper.contains(event.target)
                ) {

                    notificationDropdown.classList.add(
                        'hidden'
                    );

                }

            }
        );

    }


    // =========================================================
    // CURRENT STATUS
    // =========================================================

    let currentStatus = 'all';


    // =========================================================
    // UPDATE COUNTS
    // =========================================================

    function updateCounts() {

        let all = cards.length;

        let draft = 0;
        let active = 0;
        let lowStock = 0;
        let outOfStock = 0;


        cards.forEach(card => {

            const status =
                card.dataset.status;


            if (status === 'draft') {
                draft++;
            }


            if (status === 'active') {
                active++;
            }


            if (status === 'low-stock') {
                lowStock++;
            }


            if (status === 'out-of-stock') {
                outOfStock++;
            }

        });


        document.getElementById('allCount').textContent =
            all;

        document.getElementById('draftCount').textContent =
            draft;

        document.getElementById('activeCount').textContent =
            active;

        document.getElementById('lowStockCount').textContent =
            lowStock;

        document.getElementById('outOfStockCount').textContent =
            outOfStock;

    }


    // =========================================================
    // APPLY FILTERS
    // =========================================================

    function applyFilters() {

        const search =
            searchInput.value.toLowerCase().trim();

        const category =
            categoryFilter.value;

        let visibleCards = [];


        cards.forEach(card => {

            const status =
                card.dataset.status;

            const cardCategory =
                card.dataset.category;

            const name =
                card.dataset.name;


            // STATUS

            const statusMatch =
                currentStatus === 'all' ||
                status === currentStatus;


            // SEARCH

            const searchMatch =
                search === '' ||
                name.includes(search);


            // CATEGORY

            let categoryMatch = true;

            if (category !== 'all') {

                categoryMatch =
                    cardCategory === category;

            }


            // FINAL

            const show =
                statusMatch &&
                searchMatch &&
                categoryMatch;


            if (show) {

                card.classList.remove('hidden');

                visibleCards.push(card);

            } else {

                card.classList.add('hidden');

            }

        });


        // SORT

        sortCards(visibleCards);


        // NO RESULTS

        if (visibleCards.length === 0) {

            noResults.classList.remove('hidden');

        } else {

            noResults.classList.add('hidden');

        }


        // RESULT COUNT

        resultCount.textContent =
            `Showing ${visibleCards.length} of ${cards.length} listings`;

    }


    // =========================================================
    // SORT
    // =========================================================

    function sortCards(visibleCards) {

        const sort =
            sortFilter.value;


        visibleCards.sort((a, b) => {

            if (sort === 'price-low') {

                return (
                    parseFloat(a.dataset.price) -
                    parseFloat(b.dataset.price)
                );

            }


            if (sort === 'price-high') {

                return (
                    parseFloat(b.dataset.price) -
                    parseFloat(a.dataset.price)
                );

            }


            if (sort === 'stock') {

                return (
                    parseFloat(b.dataset.stock) -
                    parseFloat(a.dataset.stock)
                );

            }


            // NEWEST

            return (
                parseInt(b.dataset.date) -
                parseInt(a.dataset.date)
            );

        });


        visibleCards.forEach(card => {

            listingsGrid.appendChild(card);

        });

    }


    // =========================================================
    // STATUS BUTTONS
    // =========================================================

    filterButtons.forEach(button => {

        button.addEventListener(
            'click',
            function () {

                currentStatus =
                    this.dataset.filter;


                filterButtons.forEach(btn => {

                    btn.classList.remove('active');

                    btn.classList.add(
                        'bg-stone-100',
                        'text-stone-700'
                    );

                });


                this.classList.add('active');

                this.classList.remove(
                    'bg-stone-100',
                    'text-stone-700'
                );


                applyFilters();

            }
        );

    });


    // =========================================================
    // SEARCH
    // =========================================================

    searchInput.addEventListener(
        'input',
        applyFilters
    );


    // =========================================================
    // CATEGORY
    // =========================================================

    categoryFilter.addEventListener(
        'change',
        applyFilters
    );


    // =========================================================
    // SORT
    // =========================================================

    sortFilter.addEventListener(
        'change',
        applyFilters
    );


    // =========================================================
    // CLEAR FILTERS
    // =========================================================

    clearFilters.addEventListener(
        'click',
        function () {

            currentStatus = 'all';

            searchInput.value = '';

            categoryFilter.value = 'all';

            sortFilter.value = 'newest';


            filterButtons.forEach(btn => {

                btn.classList.remove('active');

                btn.classList.add(
                    'bg-stone-100',
                    'text-stone-700'
                );

            });


            const allButton =
                document.querySelector(
                    '[data-filter="all"]'
                );


            allButton.classList.add('active');

            allButton.classList.remove(
                'bg-stone-100',
                'text-stone-700'
            );


            applyFilters();

        }
    );


    // =========================================================
    // INITIALIZE
    // =========================================================

    updateCounts();

    applyFilters();

});

</script>

</body>
</html>