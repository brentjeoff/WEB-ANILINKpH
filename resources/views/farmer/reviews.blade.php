<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Customer Reviews - AniLink</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>

    <style>
        body {
            background-color: #E2DFD8;
            font-family:
                system-ui,
                -apple-system,
                BlinkMacSystemFont,
                "Segoe UI",
                Roboto,
                Oxygen,
                Ubuntu,
                Cantarell,
                sans-serif;
        }

        .star {
            color: #e7ad28;
        }

        .review-card {
            transition: all 0.2s ease;
        }

        .review-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(28, 91, 50, 0.08);
        }
    </style>
</head>

<body class="p-4 md:p-8 flex items-center justify-center min-h-screen">

<div
    class="bg-[#F6F5F2] w-full max-w-7xl rounded-2xl shadow-xl flex flex-col md:flex-row overflow-hidden border border-stone-300">


    {{-- =====================================================
         SIDEBAR
    ====================================================== --}}

    <aside
        class="w-full md:w-64 bg-[#F6F5F2] border-b md:border-b-0 md:border-r border-stone-200 p-6 flex flex-col justify-between shrink-0">

        <div>

            {{-- Logo --}}
            <div class="flex items-center gap-3 mb-8">

                <div
                    class="w-10 h-10 rounded-full bg-emerald-800 text-white flex items-center justify-center font-bold text-lg">

                    <i data-lucide="sprout" class="w-6 h-6"></i>

                </div>

                <span class="text-2xl font-bold text-stone-800 tracking-tight">
                    AniLink
                </span>

            </div>


            {{-- Navigation --}}
            <nav class="space-y-2">

                {{-- Dashboard --}}
                <a
                    href="{{ route('farmer.dashboard') }}"
                    class="flex items-center gap-3 px-4 py-2.5 text-stone-700 hover:bg-stone-200/60 rounded-lg transition-colors font-medium">

                    <i data-lucide="layout-dashboard"
                       class="w-5 h-5 text-stone-500"></i>

                    <span>Dashboard</span>

                </a>


                {{-- Sell Harvest --}}
                <a
                    href="{{ route('harvest.create') }}"
                    class="flex items-center gap-3 px-4 py-2.5 text-stone-700 hover:bg-stone-200/60 rounded-lg transition-colors font-medium">

                    <i data-lucide="wheat"
                       class="w-5 h-5 text-stone-500"></i>

                    <span>Sell Harvest</span>

                </a>


                {{-- My Listings --}}
                <a
                    href="{{ route('farmer.my-listings') }}"
                    class="flex items-center gap-3 px-4 py-2.5 text-stone-700 hover:bg-stone-200/60 rounded-lg transition-colors font-medium">

                    <i data-lucide="archive"
                       class="w-5 h-5 text-stone-500"></i>

                    <span>My Listings</span>

                </a>


                {{-- Orders Received --}}
                <a
                    href="{{ route('farmer.orders.index') }}"
                    class="flex items-center gap-3 px-4 py-2.5 text-stone-700 hover:bg-stone-200/60 rounded-lg transition-colors font-medium">

                    <i data-lucide="clipboard-list"
                       class="w-5 h-5 text-stone-500"></i>

                    <span>Orders Received</span>

                </a>


                {{-- Sales --}}
                <a
                    href="{{ route('farmer.sales.index') }}"
                    class="flex items-center gap-3 px-4 py-2.5 text-stone-700 hover:bg-stone-200/60 rounded-lg transition-colors font-medium">

                    <i data-lucide="circle-dollar-sign"
                       class="w-5 h-5 text-stone-500"></i>

                    <span>Sales & Earnings</span>

                </a>


                {{-- Customer Reviews --}}
                <a
                    href="{{ route('farmer.reviews') }}"
                    class="flex items-center gap-3 px-4 py-3 bg-[#1C5B32] text-white rounded-lg font-medium shadow-sm">

                    <i data-lucide="star" class="w-5 h-5"></i>

                    <span>Customer Reviews</span>

                </a>


                {{-- Messages --}}
                <a
                    href="{{ route('farmer.messages') }}"
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


                {{-- Profile --}}
                <a
                    href="{{ route('farmer.profile') }}"
                    class="flex items-center gap-3 px-4 py-2.5 text-stone-700 hover:bg-stone-200/60 rounded-lg transition-colors font-medium">

                    <i data-lucide="user"
                       class="w-5 h-5 text-stone-500"></i>

                    <span>Profile</span>

                </a>


                {{-- Settings --}}
                <a
                    href="{{ route('farmer.settings') }}"
                    class="flex items-center gap-3 px-4 py-2.5 text-stone-700 hover:bg-stone-200/60 rounded-lg transition-colors font-medium">

                    <i data-lucide="settings"
                       class="w-5 h-5 text-stone-500"></i>

                    <span>Settings</span>

                </a>

            </nav>

        </div>


        {{-- Logout --}}
        <div class="mt-8 pt-4 border-t border-stone-200">

            <form
                action="{{ route('logout') }}"
                method="POST">

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



    {{-- =====================================================
         MAIN
    ====================================================== --}}

    <main class="flex-1 flex flex-col min-w-0">


        {{-- =====================================================
             HEADER
        ====================================================== --}}

        <header
            class="p-6 flex flex-col md:flex-row items-center justify-between gap-4 border-b border-stone-200/60">


            {{-- Search --}}
            <div class="relative w-full md:w-96">

                <i
                    data-lucide="search"
                    class="w-5 h-5 absolute left-3 top-1/2 -translate-y-1/2 text-stone-400">
                </i>

                <input
                    id="reviewSearch"
                    type="text"
                    placeholder="Search reviews..."
                    class="w-full pl-10 pr-4 py-2 bg-white border border-stone-200 rounded-full text-sm focus:outline-none focus:ring-2 focus:ring-emerald-700 shadow-sm">

            </div>



            {{-- =================================================
                 HEADER RIGHT
            ================================================== --}}

            <div class="flex items-center gap-4">


                {{-- =================================================
                     NOTIFICATION BELL
                ================================================== --}}

                <div class="relative">

                    <button
                        type="button"
                        id="notificationButton"
                        class="relative w-10 h-10 rounded-full flex items-center justify-center hover:bg-stone-200 transition-colors">

                        <i
                            data-lucide="bell"
                            class="w-5 h-5 text-stone-700">
                        </i>


                        {{-- Unread Notification Badge --}}
                        @if(($notificationCount ?? 0) > 0)

                            <span
                                class="absolute -top-1 -right-1 min-w-[19px] h-[19px] px-1 bg-red-500 text-white text-[10px] font-bold rounded-full flex items-center justify-center border-2 border-[#F6F5F2]">

                                {{ $notificationCount > 99 ? '99+' : $notificationCount }}

                            </span>

                        @endif

                    </button>



                    {{-- =================================================
                         NOTIFICATION DROPDOWN
                    ================================================== --}}

                    <div
                        id="notificationDropdown"
                        class="hidden absolute right-0 top-12 w-80 md:w-96 bg-white rounded-xl shadow-2xl border border-stone-200 overflow-hidden z-50">


                        {{-- Dropdown Header --}}
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



                        {{-- Notification List --}}
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


                                            {{-- Notification Icon --}}
                                            <div
                                                class="w-9 h-9 rounded-full bg-emerald-100 flex items-center justify-center flex-shrink-0">

                                                <i
                                                    data-lucide="{{ $notification->icon ?? 'bell' }}"
                                                    class="w-4 h-4 text-emerald-800">
                                                </i>

                                            </div>


                                            {{-- Notification Content --}}
                                            <div class="flex-1 min-w-0">

                                                <div class="flex items-start justify-between gap-2">

                                                    <p class="text-sm font-semibold text-stone-800">

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


                                                <p class="text-[10px] text-stone-400 mt-1.5">

                                                    {{ $notification->created_at->diffForHumans() }}

                                                </p>

                                            </div>

                                        </div>

                                    </button>

                                </form>

                            @empty

                                {{-- No Notifications --}}
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

                {{-- Farmer --}}
                <div class="flex items-center gap-3">

                    <div
                        class="w-10 h-10 rounded-full bg-emerald-800 text-white flex items-center justify-center font-bold">

                        {{ strtoupper(
                            substr(
                                Auth::user()->first_name ?? 'F',
                                0,
                                1
                            )
                        ) }}

                    </div>

                    <span class="font-bold text-stone-800 text-sm">

                        Farmer
                        {{ Auth::user()->first_name }}
                        {{ Auth::user()->last_name }}

                    </span>

                </div>

            </div>

        </header>



        {{-- =====================================================
             CONTENT
        ====================================================== --}}

        <div class="p-6 space-y-6 overflow-y-auto">


            {{-- PAGE TITLE --}}
            <div>

                <h1
                    class="text-2xl md:text-3xl font-extrabold text-stone-800">

                    Customer Reviews

                </h1>

                <p class="text-sm text-stone-500 mt-1">

                    See what customers are saying about your products.

                </p>

            </div>



            {{-- =================================================
                 SUMMARY CARDS
            ================================================== --}}

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">


                {{-- Average Rating --}}
                <div
                    class="bg-white rounded-xl border border-stone-200 shadow-sm p-5">

                    <div class="flex items-center justify-between">

                        <div>

                            <p class="text-xs text-stone-400 font-medium">
                                Average Rating
                            </p>

                            <div class="flex items-center gap-2 mt-2">

                                <span
                                    class="text-3xl font-extrabold text-stone-800">

                                    {{ number_format($averageRating, 1) }}

                                </span>

                                <span class="text-xl star">
                                    ★
                                </span>

                            </div>

                        </div>


                        <div
                            class="w-11 h-11 rounded-full bg-amber-100 flex items-center justify-center">

                            <i
                                data-lucide="star"
                                class="w-5 h-5 text-amber-600">
                            </i>

                        </div>

                    </div>

                </div>



                {{-- Total Reviews --}}
                <div
                    class="bg-white rounded-xl border border-stone-200 shadow-sm p-5">

                    <div class="flex items-center justify-between">

                        <div>

                            <p class="text-xs text-stone-400 font-medium">
                                Total Reviews
                            </p>

                            <p
                                class="text-3xl font-extrabold text-stone-800 mt-2">

                                {{ $totalReviews }}

                            </p>

                        </div>


                        <div
                            class="w-11 h-11 rounded-full bg-emerald-100 flex items-center justify-center">

                            <i
                                data-lucide="message-square"
                                class="w-5 h-5 text-emerald-800">
                            </i>

                        </div>

                    </div>

                </div>



                {{-- Feedback --}}
                <div
                    class="bg-[#1C5B32] rounded-xl shadow-sm p-5 text-white">

                    <p class="text-xs text-emerald-100">
                        Customer Feedback
                    </p>


                    @if($totalReviews > 0)

                        <p class="text-lg font-bold mt-2">
                            Thank you for serving your customers!
                        </p>

                        <p class="text-xs text-emerald-100 mt-1">
                            Keep providing quality products.
                        </p>

                    @else

                        <p class="text-lg font-bold mt-2">
                            No reviews yet
                        </p>

                        <p class="text-xs text-emerald-100 mt-1">
                            Reviews from buyers will appear here.
                        </p>

                    @endif

                </div>

            </div>



            {{-- SUCCESS MESSAGE --}}
            @if(session('success'))

                <div
                    class="bg-emerald-50 border border-emerald-200 text-emerald-800 px-4 py-3 rounded-xl">

                    {{ session('success') }}

                </div>

            @endif



            {{-- ERROR MESSAGE --}}
            @if(session('error'))

                <div
                    class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-xl">

                    {{ session('error') }}

                </div>

            @endif



            {{-- VALIDATION ERRORS --}}
            @if($errors->any())

                <div
                    class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-xl">

                    <ul class="list-disc ml-5">

                        @foreach($errors->all() as $error)

                            <li>
                                {{ $error }}
                            </li>

                        @endforeach

                    </ul>

                </div>

            @endif



            {{-- =================================================
                 REVIEWS
            ================================================== --}}

            <div>

                <div class="mb-3">

                    <h2 class="font-bold text-stone-800 text-lg">
                        Customer Feedback
                    </h2>

                    <p class="text-xs text-stone-400 mt-1">
                        Recent reviews from your customers
                    </p>

                </div>



                <div
                    id="reviewsContainer"
                    class="space-y-4">


                    @forelse($reviews as $review)

                        <div
                            class="review-card review-item bg-white rounded-xl border border-stone-200 shadow-sm p-5"
                            data-search="{{ strtolower(
                                ($review->buyer->first_name ?? '') . ' ' .
                                ($review->buyer->last_name ?? '') . ' ' .
                                ($review->listing->product_name ?? '') . ' ' .
                                ($review->comment ?? '')
                            ) }}">


                            {{-- TOP --}}
                            <div
                                class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">


                                {{-- CUSTOMER --}}
                                <div class="flex items-center gap-3">

                                    <div
                                        class="w-11 h-11 rounded-full bg-emerald-800 text-white flex items-center justify-center font-bold">

                                        {{ strtoupper(
                                            substr(
                                                $review->buyer->first_name ?? 'U',
                                                0,
                                                1
                                            )
                                        ) }}

                                    </div>


                                    <div>

                                        <p class="font-bold text-stone-800">

                                            {{ $review->buyer->first_name ?? 'Unknown' }}
                                            {{ $review->buyer->last_name ?? 'Customer' }}

                                        </p>

                                        <p class="text-xs text-stone-400">

                                            {{ $review->created_at->format('M d, Y') }}

                                        </p>

                                    </div>

                                </div>



                                {{-- RATING --}}
                                <div class="flex items-center gap-1">

                                    @for($i = 1; $i <= 5; $i++)

                                        @if($i <= $review->rating)

                                            <span class="star text-lg">
                                                ★
                                            </span>

                                        @else

                                            <span class="text-stone-300 text-lg">
                                                ★
                                            </span>

                                        @endif

                                    @endfor

                                    <span
                                        class="text-xs font-semibold text-stone-500 ml-1">

                                        {{ $review->rating }}/5

                                    </span>

                                </div>

                            </div>



                            {{-- PRODUCT --}}
                            <div
                                class="mt-4 flex items-center gap-3 bg-stone-50 rounded-lg p-3">

                                @if(
                                    $review->listing &&
                                    $review->listing->image
                                )

                                    <img
                                        src="{{ asset(
                                            'storage/' .
                                            $review->listing->image
                                        ) }}"
                                        alt="{{ $review->listing->product_name }}"
                                        class="w-12 h-12 rounded-lg object-cover">

                                @else

                                    <div
                                        class="w-12 h-12 rounded-lg bg-emerald-100 flex items-center justify-center text-xl">

                                        🌾

                                    </div>

                                @endif


                                <div>

                                    <p class="text-xs text-stone-400">
                                        Product
                                    </p>

                                    <p
                                        class="font-semibold text-stone-800 text-sm">

                                        {{ $review->listing->product_name ?? 'Product' }}

                                    </p>

                                </div>

                            </div>



                            {{-- COMMENT --}}
                            @if($review->comment)

                                <div class="mt-4">

                                    <p
                                        class="text-xs font-semibold text-stone-500 mb-1">

                                        Customer Review

                                    </p>

                                    <p
                                        class="text-sm text-stone-700 leading-relaxed">

                                        "{{ $review->comment }}"

                                    </p>

                                </div>

                            @else

                                <p
                                    class="text-xs text-stone-400 mt-4 italic">

                                    The customer left a rating without a written comment.

                                </p>

                            @endif



                            {{-- ORDER --}}
                            @if($review->order)

                                <div
                                    class="mt-4 pt-3 border-t border-stone-100">

                                    <span class="text-xs text-stone-400">
                                        Order #
                                    </span>

                                    <span
                                        class="text-xs font-semibold text-stone-600">

                                        {{ $review->order->order_number ?? $review->order->id }}

                                    </span>

                                </div>

                            @endif

                        </div>


                    @empty


                        {{-- EMPTY STATE --}}
                        <div
                            class="bg-white rounded-xl border border-stone-200 shadow-sm p-12 text-center">

                            <div
                                class="w-16 h-16 mx-auto rounded-full bg-stone-100 flex items-center justify-center mb-4">

                                <i
                                    data-lucide="star"
                                    class="w-7 h-7 text-stone-400">
                                </i>

                            </div>

                            <h3 class="font-bold text-stone-700">
                                No customer reviews yet
                            </h3>

                            <p class="text-sm text-stone-400 mt-1">

                                Reviews from buyers will appear here after they review their delivered orders.

                            </p>

                        </div>

                    @endforelse



                    {{-- SEARCH EMPTY --}}
                    <div
                        id="noSearchResults"
                        class="hidden bg-white rounded-xl border border-stone-200 p-10 text-center">

                        <i
                            data-lucide="search-x"
                            class="w-7 h-7 text-stone-400 mx-auto mb-3">
                        </i>

                        <p class="font-semibold text-stone-700">
                            No matching reviews
                        </p>

                        <p class="text-xs text-stone-400 mt-1">
                            Try searching for another customer or product.
                        </p>

                    </div>

                </div>

            </div>

        </div>



        {{-- FOOTER --}}
        <footer
            class="p-4 text-center text-xs text-stone-500 border-t border-stone-200/60 mt-auto">

            © 2026 AniLink

        </footer>

    </main>

</div>



{{-- =====================================================
     JAVASCRIPT
====================================================== --}}

<script>

    // =========================================
    // LUCIDE ICONS
    // =========================================

    lucide.createIcons();



    // =========================================
    // NOTIFICATION DROPDOWN
    // =========================================

    const notificationButton =
        document.getElementById('notificationButton');

    const notificationDropdown =
        document.getElementById('notificationDropdown');


    if (notificationButton && notificationDropdown) {

        notificationButton.addEventListener('click', function(event) {

            event.stopPropagation();

            notificationDropdown.classList.toggle('hidden');

        });


        // Prevent dropdown click from closing itself
        notificationDropdown.addEventListener('click', function(event) {

            event.stopPropagation();

        });


        // Close dropdown when clicking outside
        document.addEventListener('click', function() {

            notificationDropdown.classList.add('hidden');

        });

    }



    // =========================================
    // SEARCH REVIEWS
    // =========================================

    const searchInput =
        document.getElementById('reviewSearch');

    const reviewItems =
        document.querySelectorAll('.review-item');

    const noSearchResults =
        document.getElementById('noSearchResults');


    if (searchInput) {

        searchInput.addEventListener(
            'input',
            function () {

                const searchValue =
                    this.value.toLowerCase().trim();

                let visibleCount = 0;


                reviewItems.forEach(
                    function (review) {

                        const searchableText =
                            review.dataset.search || '';


                        if (
                            searchableText.includes(
                                searchValue
                            )
                        ) {

                            review.style.display = '';

                            visibleCount++;

                        } else {

                            review.style.display = 'none';

                        }

                    }
                );


                if (
                    searchValue !== '' &&
                    visibleCount === 0 &&
                    reviewItems.length > 0
                ) {

                    noSearchResults.classList.remove(
                        'hidden'
                    );

                } else {

                    noSearchResults.classList.add(
                        'hidden'
                    );

                }

            }
        );

    }

</script>

</body>
</html>