<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>AniLink — Favorites</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link
        href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Fraunces:opsz,wght@9..144,500;9..144,600&display=swap"
        rel="stylesheet"
    >

    <style>
        :root {
            --sidebar-dark: #173321;
            --sidebar-dark-2: #1d3f29;
            --brand-green: #5f9c3f;
            --brand-green-light: #8bc34a;
            --brand-green-soft: #e8f2df;
            --active-pill: #79b352;
            --cream: #f5f3ec;
            --card: #ffffff;
            --ink: #1f2a22;
            --ink-soft: #5b6b5f;
            --line: #e7e3d8;
            --radius-lg: 20px;
            --shadow-card: 0 2px 10px rgba(23, 51, 33, 0.06);
        }

        * {
            box-sizing: border-box;
        }

        html,
        body {
            margin: 0;
            padding: 0;
        }

        body {
            min-height: 100vh;
            font-family: "Plus Jakarta Sans", sans-serif;
            background: var(--cream);
            color: var(--ink);
        }

        a {
            color: inherit;
            text-decoration: none;
        }

        button,
        input {
            font-family: inherit;
        }

        /* =========================================
           APP
        ========================================= */

        .app {
            display: flex;
            min-height: 100vh;
            width: 100%;
        }

        /* =========================================
           SIDEBAR
        ========================================= */

        .sidebar {
            width: 264px;
            flex: 0 0 264px;
            min-height: 100vh;
            background: linear-gradient(
                180deg,
                var(--sidebar-dark) 0%,
                var(--sidebar-dark-2) 100%
            );
            color: #eef3ea;
            padding: 28px 20px;
            position: sticky;
            top: 0;
            height: 100vh;
            overflow-y: auto;
            transition: left 0.2s ease;
            z-index: 1000;
        }

        /* =========================================
           BRAND
        ========================================= */

        .brand {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 4px 6px 22px 6px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.12);
            margin-bottom: 18px;
        }

        .brand-mark {
            font-size: 26px;
            line-height: 1;
        }

        .brand-name {
            font-family: "Fraunces", serif;
            font-weight: 600;
            font-size: 22px;
            color: var(--brand-green-light);
        }

        .brand-tag {
            font-size: 10.5px;
            color: #b9cdbb;
            margin-top: 7px;
        }

        /* =========================================
           NAVIGATION
        ========================================= */

        .navlist {
            display: flex;
            flex-direction: column;
            gap: 4px;
        }

        .navitem {
            display: flex;
            align-items: center;
            gap: 12px;
            width: 100%;
            padding: 12px 14px;
            border: none;
            border-radius: 12px;
            background: transparent;
            color: #dfe9d9;
            font-size: 14.5px;
            font-weight: 600;
            cursor: pointer;
            text-align: left;
            transition: all 0.2s ease;
        }

        .navitem svg {
            flex: 0 0 20px;
            width: 20px;
            height: 20px;
        }

        .navitem:hover {
            background: rgba(255, 255, 255, 0.06);
            color: white;
        }

        .navitem.active {
            background: var(--active-pill);
            color: #12240f;
        }

        .navitem .badge {
            margin-left: auto;
            background: var(--active-pill);
            color: #12240f;
            font-size: 11px;
            font-weight: 800;
            padding: 2px 7px;
            border-radius: 999px;
        }

        .navitem.active .badge {
            background: #12240f;
            color: #c9e6ab;
        }

        /* =========================================
           MAIN
        ========================================= */

        .main {
            flex: 1 1 auto;
            min-width: 0;
            padding: 22px 32px 48px 32px;
        }

        /* =========================================
           TOPBAR
        ========================================= */

        .topbar {
            display: flex;
            align-items: center;
            gap: 16px;
            margin-bottom: 22px;
            position: relative;
            z-index: 100;
        }

        .hamburger {
            width: 40px;
            height: 40px;
            flex: 0 0 auto;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 10px;
            background: var(--card);
            border: 1px solid var(--line);
            color: var(--ink);
            cursor: pointer;
        }

        .hamburger:hover {
            background: var(--brand-green-soft);
            color: var(--brand-green);
        }

        /* =========================================
           SEARCH
        ========================================= */

        .searchbar {
            flex: 1 1 auto;
            display: flex;
            align-items: center;
            max-width: 720px;
            padding: 4px;
            background: var(--card);
            border: 1px solid var(--line);
            border-radius: 12px;
        }

        .searchbar input {
            flex: 1;
            border: none;
            outline: none;
            background: transparent;
            padding: 10px 14px;
            font-size: 14px;
            color: var(--ink);
        }

        .searchbar input::placeholder {
            color: #879188;
        }

        .searchbar button {
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            border: none;
            border-radius: 9px;
            background: var(--brand-green);
            color: white;
            cursor: pointer;
        }

        .searchbar button:hover {
            background: #4f8934;
        }

        /* =========================================
           TOP ACTIONS
        ========================================= */

        .top-actions {
            display: flex;
            align-items: center;
            gap: 18px;
            flex: 0 0 auto;
            margin-left: auto;
        }

        /* =========================================
           NOTIFICATION
        ========================================= */

        .notification-wrapper {
            position: relative;
        }

        .bell-wrap {
            position: relative;
            width: 42px;
            height: 42px;
            border: none;
            background: transparent;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #173321;
            border-radius: 50%;
        }

        .bell-wrap:hover {
            background: #f0f3ed;
        }

        .bell-wrap svg {
            pointer-events: none;
        }

        .dot {
            position: absolute;
            top: 3px;
            right: 2px;
            min-width: 18px;
            height: 18px;
            padding: 0 4px;
            border-radius: 20px;
            background: #e74c3c;
            color: white;
            font-size: 10px;
            font-weight: 700;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 2px solid white;
        }

        /* Notification Dropdown */

        .notification-dropdown {
            position: absolute;
            top: 52px;
            right: 0;
            width: 370px;
            max-height: 500px;
            background: white;
            border-radius: 14px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.12);
            border: 1px solid #e5e8e2;
            overflow: hidden;
            z-index: 9999;
            display: none;
        }

        .notification-dropdown.show {
            display: block;
        }

        /* Notification Header */

        .notification-header {
            padding: 16px 18px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-bottom: 1px solid #edf0eb;
        }

        .notification-header h3 {
            margin: 0;
            font-size: 17px;
            font-weight: 700;
            color: #173321;
        }

        .notification-header span {
            display: block;
            margin-top: 3px;
            font-size: 12px;
            color: #7b847c;
        }

        .mark-all-btn {
            border: none;
            background: transparent;
            color: #5f9c3f;
            font-size: 12px;
            font-weight: 600;
            cursor: pointer;
        }

        .mark-all-btn:hover {
            text-decoration: underline;
        }

        /* Notification List */

        .notification-list {
            max-height: 420px;
            overflow-y: auto;
        }

        .notification-item {
            position: relative;
            display: flex;
            gap: 12px;
            padding: 15px 18px;
            border-bottom: 1px solid #f0f2ee;
            cursor: pointer;
            transition: background 0.2s;
        }

        .notification-item:hover {
            background: #f7f9f5;
        }

        .notification-item.unread {
            background: #f2f8ee;
        }

        .notification-item.read {
            background: white;
        }

       .notification-icon {
    width: 38px;
    height: 38px;
    flex: 0 0 38px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: #e8f1e2;
    color: #5f9c3f;
    border-radius: 50%;
}

.notification-icon svg {
    width: 20px;
    height: 20px;
    display: block;
}

        .notification-content {
            flex: 1;
            min-width: 0;
        }

        .notification-content strong {
            display: block;
            margin-bottom: 4px;
            font-size: 14px;
            color: #173321;
        }

        .notification-content p {
            margin: 0 0 5px;
            font-size: 13px;
            line-height: 1.4;
            color: #657066;
        }

        .notification-content small {
            font-size: 11px;
            color: #9aa29b;
        }

        .unread-dot {
            width: 8px;
            height: 8px;
            background: #5f9c3f;
            border-radius: 50%;
            position: absolute;
            right: 15px;
            top: 20px;
        }

        .notification-empty {
            text-align: center;
            padding: 40px 20px;
            color: #7b847c;
        }

        .empty-icon {
            font-size: 32px;
            margin-bottom: 10px;
        }

        .notification-empty strong {
            display: block;
            color: #173321;
            margin-bottom: 5px;
        }

        .notification-empty p {
            margin: 0;
            font-size: 13px;
        }

        /* =========================================
           USER MENU
        ========================================= */

        .user-menu {
            position: relative;
        }

        .user-chip {
            display: flex;
            align-items: center;
            gap: 10px;
            border: none;
            background: transparent;
            padding: 5px 8px;
            border-radius: 12px;
            cursor: pointer;
            color: var(--ink);
            transition: 0.2s;
        }

        .user-chip:hover {
            background: rgba(95, 156, 63, 0.08);
        }

        .user-arrow {
            transition: transform 0.2s ease;
        }

        .user-menu.open .user-arrow {
            transform: rotate(180deg);
        }

        .avatar {
            width: 38px;
            height: 38px;
            flex: 0 0 38px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            background: var(--brand-green);
            color: white;
            font-size: 13px;
            font-weight: 800;
        }

        .user-name {
            font-size: 14px;
            font-weight: 700;
            line-height: 1.2;
            text-align: left;
        }

        .user-role {
            margin-top: 2px;
            font-size: 12px;
            color: var(--ink-soft);
            text-align: left;
        }

        /* =========================================
           USER DROPDOWN
        ========================================= */

        .user-dropdown {
            position: absolute;
            top: calc(100% + 10px);
            right: 0;
            width: 260px;
            background: white;
            border: 1px solid var(--line);
            border-radius: 16px;
            padding: 10px;
            box-shadow: 0 12px 35px rgba(23, 51, 33, 0.15);
            z-index: 9999;
            opacity: 0;
            visibility: hidden;
            transform: translateY(-8px);
            transition:
                opacity 0.2s ease,
                transform 0.2s ease,
                visibility 0.2s ease;
        }

        .user-menu.open .user-dropdown {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }

        .dropdown-profile {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 8px;
        }

        .dropdown-profile strong {
            display: block;
            font-size: 13px;
            color: var(--ink);
            margin-bottom: 3px;
        }

        .dropdown-profile span {
            display: block;
            font-size: 11px;
            color: var(--ink-soft);
            max-width: 170px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        .dropdown-avatar {
            flex-shrink: 0;
        }

        .dropdown-line {
            height: 1px;
            background: var(--line);
            margin: 8px 0;
        }

        .dropdown-link {
            width: 100%;
            display: flex;
            align-items: center;
            gap: 11px;
            padding: 11px 10px;
            border: none;
            background: transparent;
            border-radius: 10px;
            color: #344238;
            font-size: 13px;
            font-weight: 600;
            text-decoration: none;
            cursor: pointer;
            text-align: left;
            transition: 0.2s;
        }

        .dropdown-link svg {
            width: 19px;
            height: 19px;
            flex-shrink: 0;
        }

        .dropdown-link:hover {
            background: #f1f6ed;
            color: #3f7d20;
        }

        .logout-button {
            color: #b43d3d;
        }

        .logout-button:hover {
            background: #fff0f0;
            color: #b43d3d;
        }

        .logout-form {
            margin: 0;
            width: 100%;
        }

        /* =========================================
           PAGE HEADER
        ========================================= */

        .pagehead {
            display: flex;
            align-items: flex-end;
            justify-content: space-between;
            gap: 16px;
            flex-wrap: wrap;
            margin-bottom: 20px;
        }

        .pagehead h1 {
            margin: 0 0 4px 0;
            font-family: "Fraunces", serif;
            font-size: 26px;
            font-weight: 600;
        }

        .pagehead p {
            margin: 0;
            color: var(--ink-soft);
            font-size: 14px;
        }

        .ghost-btn {
            padding: 9px 16px;
            border-radius: 10px;
            border: 1px solid var(--line);
            background: transparent;
            color: var(--ink);
            font-size: 13.5px;
            font-weight: 700;
            cursor: pointer;
        }

        .ghost-btn:hover {
            background: white;
            border-color: var(--brand-green);
            color: var(--brand-green);
        }

        /* =========================================
           FAVORITES GRID
        ========================================= */

        .fav-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 18px;
            margin-top: 18px;
        }

        /* =========================================
           CARD
        ========================================= */

        .card {
            background: var(--card);
            border-radius: var(--radius-lg);
            box-shadow: var(--shadow-card);
            border: 1px solid var(--line);
        }

        .market-card {
            overflow: hidden;
            padding-bottom: 0;
            transition:
                transform 0.2s ease,
                box-shadow 0.2s ease;
        }

        .market-card:hover {
            transform: translateY(-3px);
            box-shadow:
                0 8px 22px rgba(23, 51, 33, 0.10);
        }

        /* =========================================
           PRODUCT IMAGE
        ========================================= */

        .market-thumb {
            height: 132px;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            font-size: 44px;
            border-radius: 16px 16px 0 0;
            overflow: hidden;
        }

        .fav-toggle {
            position: absolute;
            top: 8px;
            right: 8px;
            width: 30px;
            height: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            border: none;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.92);
            color: #d1483f;
            font-size: 14px;
            cursor: pointer;
        }

        .fav-toggle:hover {
            transform: scale(1.05);
        }

        /* =========================================
           PRODUCT BODY
        ========================================= */

        .market-body {
            padding: 14px 14px 16px 14px;
        }

        .market-farmer {
            display: flex;
            align-items: center;
            gap: 5px;
            margin-bottom: 4px;
            color: var(--ink-soft);
            font-size: 11.5px;
        }

        .market-name {
            font-size: 14.5px;
            font-weight: 700;
        }

        .market-loc {
            margin-top: 2px;
            color: var(--ink-soft);
            font-size: 12px;
        }

        .market-foot {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-top: 12px;
        }

        .market-price {
            color: var(--brand-green);
            font-size: 15px;
            font-weight: 800;
        }

        .market-price span {
            color: var(--ink-soft);
            font-size: 11.5px;
            font-weight: 600;
        }

        .add-cart {
            width: 34px;
            height: 34px;
            display: flex;
            align-items: center;
            justify-content: center;
            border: none;
            border-radius: 10px;
            background: var(--brand-green-soft);
            color: var(--brand-green);
            cursor: pointer;
        }

        .add-cart:hover {
            background: var(--brand-green);
            color: white;
        }

        /* =========================================
           EMPTY FAVORITES
        ========================================= */

        .fav-empty {
            grid-column: 1 / -1;
            width: 100%;
            min-height: 400px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: var(--ink-soft);
        }

        .fav-empty-icon {
            margin-bottom: 12px;
            font-size: 48px;
        }

        .fav-empty-title {
            margin-bottom: 6px;
            color: var(--ink);
            font-size: 18px;
            font-weight: 700;
        }

        .fav-empty-text {
            font-size: 13.5px;
        }

        /* =========================================
           RESPONSIVE
        ========================================= */

        @media (max-width: 1080px) {
            .fav-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 860px) {
            .sidebar {
                position: fixed;
                left: -280px;
                top: 0;
                z-index: 1000;
                transition: left 0.2s ease;
            }

            .sidebar.open {
                left: 0;
                box-shadow:
                    10px 0 30px rgba(0, 0, 0, 0.25);
            }

            .main {
                padding: 16px;
            }
        }

        @media (max-width: 600px) {
            .fav-grid {
                grid-template-columns: 1fr;
            }

            .user-name,
            .user-role,
            .user-arrow {
                display: none;
            }

            .searchbar {
                display: none;
            }

            .top-actions {
                margin-left: auto;
            }

            .user-dropdown {
                right: 0;
                width: 250px;
            }

            .notification-dropdown {
                width: 320px;
                right: -55px;
            }

            .logout-form {
                margin: 0;
                width: 100%;
            }

            .logout-button {
                width: 100%;
                color: #b43d3d;
            }
        }
    </style>
</head>

<body>

@php
    /*
    |--------------------------------------------------------------------------
    | GET BUYER NOTIFICATIONS
    |--------------------------------------------------------------------------
    | This fixes the "Undefined variable $notificationCount" error.
    */

    $buyerId = Auth::id();

    $notifications = \App\Models\Notification::where('user_id', $buyerId)
        ->latest()
        ->get();

    $notificationCount = $notifications
        ->whereNull('read_at')
        ->count();
@endphp

<div class="app">

    <!-- =========================================
         SIDEBAR
    ========================================== -->

    <aside class="sidebar" id="sidebar">

        <div class="brand">

            <span class="brand-mark">
                🌾
            </span>

            <div>
                <div class="brand-name">
                    AniLink
                </div>

                <div class="brand-tag">
                    Bridging Farmers and Buyers
                </div>
            </div>

        </div>

        <nav class="navlist">

            <!-- Dashboard -->
            <a href="/buyer/dashboard" class="navitem">

                <svg
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="2"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                >
                    <path d="M3 10.5 12 3l9 7.5"/>
                    <path d="M5 9.5V21h14V9.5"/>
                </svg>

                Dashboard

            </a>

            <!-- Marketplace -->
            <a href="/buyer/marketplace" class="navitem">

                <svg
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="2"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                >
                    <path d="M4 8h16l-1.5 11a2 2 0 0 1-2 1.8H7.5a2 2 0 0 1-2-1.8L4 8Z"/>
                    <path d="M8 8V6a4 4 0 0 1 8 0v2"/>
                </svg>

                Marketplace

            </a>

            <!-- My Orders -->
            <a href="/buyer/my-orders" class="navitem">

                <svg
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="2"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                >
                    <rect
                        x="3.5"
                        y="7"
                        width="17"
                        height="13"
                        rx="2"
                    />

                    <path d="M8 7V5a4 4 0 0 1 8 0v2"/>
                </svg>

                My Orders

            </a>

            <!-- Favorites -->
            <a href="/buyer/favorites" class="navitem active">

                <svg
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="2"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                >
                    <path d="M12 21s-7.5-4.6-10-9.2C.3 8.1 2 4.5 5.5 4A5.4 5.4 0 0 1 12 7a5.4 5.4 0 0 1 6.5-3C22 4.5 23.7 8.1 22 11.8 19.5 16.4 12 21 12 21Z"/>
                </svg>

                Favorites

            </a>

            <!-- Messages -->
            <a href="/buyer/messages" class="navitem">

                <svg
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="2"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                >
                    <path d="M21 15a2 2 0 0 1-2 2H8l-5 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2v10Z"/>
                </svg>

                Messages

            </a>


        </nav>

    </aside>


    <!-- =========================================
         MAIN
    ========================================== -->

    <main class="main">

        <!-- =========================================
             TOPBAR
        ========================================== -->

        <div class="topbar">

            <!-- Hamburger -->
            <button
                class="hamburger"
                id="hamburgerBtn"
                type="button"
            >

                <svg
                    width="20"
                    height="20"
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="2"
                    stroke-linecap="round"
                >
                    <path d="M4 6h16"/>
                    <path d="M4 12h16"/>
                    <path d="M4 18h16"/>
                </svg>

            </button>


            <!-- Search -->
            <div class="searchbar">

                <input
                    type="text"
                    placeholder="Search for produce, farmers, or categories..."
                >

                <button type="button">

                    <svg
                        width="17"
                        height="17"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="white"
                        stroke-width="2.2"
                        stroke-linecap="round"
                    >
                        <circle
                            cx="11"
                            cy="11"
                            r="7"
                        />

                        <path d="m21 21-4.3-4.3"/>
                    </svg>

                </button>

            </div>


            <!-- =========================================
                 TOP ACTIONS
            ========================================== -->

            <div class="top-actions">

                <!-- =====================================
                     NOTIFICATION BELL
                ====================================== -->

                <div
                    class="notification-wrapper"
                    id="notificationWrapper"
                >

                    <button
                        class="bell-wrap"
                        id="bellBtn"
                        type="button"
                        aria-label="Notifications"
                        aria-expanded="false"
                    >

                        <svg
                            width="21"
                            height="21"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                        >
                            <path d="M18 8a6 6 0 1 0-12 0c0 7-3 9-3 9h18s-3-2-3-9"/>
                            <path d="M13.7 21a2 2 0 0 1-3.4 0"/>
                        </svg>

                        @if($notificationCount > 0)

                            <span
                                class="dot"
                                id="notificationCount"
                            >
                                {{ $notificationCount > 99 ? '99+' : $notificationCount }}
                            </span>

                        @else

                            <span
                                class="dot"
                                id="notificationCount"
                                style="display:none;"
                            >
                                0
                            </span>

                        @endif

                    </button>


                    <!-- =================================
                         NOTIFICATION DROPDOWN
                    ================================== -->

                    <div
                        class="notification-dropdown"
                        id="notificationDropdown"
                    >

                        <div class="notification-header">

                            <div>

                                <h3>
                                    Notifications
                                </h3>

                                <span id="notificationSummary">

                                    @if($notificationCount > 0)

                                        {{ $notificationCount }} unread

                                    @else

                                        You're all caught up

                                    @endif

                                </span>

                            </div>


                            <button
                                type="button"
                                class="mark-all-btn"
                                id="markAllRead"
                                style="{{ $notificationCount > 0 ? '' : 'display:none;' }}"
                            >
                                Mark all as read
                            </button>

                        </div>


                        <!-- Notification List -->

                        <div class="notification-list">

                            @forelse($notifications as $notification)

                                <div
                                    class="notification-item {{ is_null($notification->read_at) ? 'unread' : 'read' }}"
                                    data-notification-id="{{ $notification->id }}"
                                >

                                    <div class="notification-icon">

                                        @if($notification->icon === 'check-circle')
                                            ✓

                                        @elseif($notification->icon === 'truck')
                                            🚚

                                        @elseif($notification->icon === 'package-check')
                                            📦

                                        @elseif($notification->icon === 'shopping-bag')
                                            🛍️

                                        @elseif($notification->icon === 'shopping-cart')
                                            🛒

                                        @elseif($notification->icon === 'star')
                                            ⭐

                                        @elseif($notification->icon === 'wallet')
                                            💰

                                        @elseif($notification->icon === 'message-square')
                                             <svg
                                                 viewBox="0 0 24 24"
                                                 fill="none"
                                                 stroke="currentColor"
                                                  stroke-width="2"
                                                 stroke-linecap="round"
                                                  stroke-linejoin="round"
                                             >
                                                 <path d="M21 15a2 2 0 0 1-2 2H8l-5 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2v10Z"/>
                                              </svg>


                                        @else
                                            🔔
                                        @endif

                                    </div>


                                    <div class="notification-content">

                                        <strong>
                                            {{ $notification->title }}
                                        </strong>

                                        <p>
                                            {{ $notification->message }}
                                        </p>

                                        <small>
                                            {{ $notification->created_at->diffForHumans() }}
                                        </small>

                                    </div>


                                    @if(is_null($notification->read_at))

                                        <span class="unread-dot"></span>

                                    @endif

                                </div>

                            @empty

                                <div class="notification-empty">

                                    <div class="empty-icon">
                                        🔔
                                    </div>

                                    <strong>
                                        No notifications
                                    </strong>

                                    <p>
                                        You're all caught up!
                                    </p>

                                </div>

                            @endforelse

                        </div>


                    </div>

                </div>


                <!-- =====================================
                     USER MENU
                ====================================== -->

                <div
                    class="user-menu"
                    id="userMenu"
                >

                    <button
                        class="user-chip"
                        id="userChip"
                        type="button"
                    >

                        <div class="avatar">

                            {{ strtoupper(substr(Auth::user()->first_name, 0, 1)) }}{{ strtoupper(substr(Auth::user()->last_name, 0, 1)) }}

                        </div>


                        <div>

                            <div class="user-name">

                                {{ Auth::user()->first_name }}
                                {{ Auth::user()->last_name }}

                            </div>

                            <div class="user-role">

                                {{ ucfirst(Auth::user()->role) }}

                            </div>

                        </div>


                        <svg
                            class="user-arrow"
                            width="15"
                            height="15"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                        >
                            <path d="m6 9 6 6 6-6"/>
                        </svg>

                    </button>


                    <!-- USER DROPDOWN -->

                    <div
                        class="user-dropdown"
                        id="userDropdown"
                    >

                        <div class="dropdown-profile">

                            <div class="avatar dropdown-avatar">

                                {{ strtoupper(substr(Auth::user()->first_name, 0, 1)) }}{{ strtoupper(substr(Auth::user()->last_name, 0, 1)) }}

                            </div>

                            <div>

                                <strong>

                                    {{ Auth::user()->first_name }}
                                    {{ Auth::user()->last_name }}

                                </strong>

                                <span>

                                    {{ Auth::user()->email }}

                                </span>

                            </div>

                        </div>


                        <div class="dropdown-line"></div>


                        <!-- My Profile -->

                        <a
                            href="/buyer/profile"
                            class="dropdown-link"
                        >

                            <svg
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="2"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                            >
                                <circle
                                    cx="12"
                                    cy="8"
                                    r="4"
                                />

                                <path d="M4 21a8 8 0 0 1 16 0"/>
                            </svg>

                            My Profile

                        </a>


                        <!-- Settings -->

                        <a
                            href="/buyer/settings"
                            class="dropdown-link"
                        >

                            <svg
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="2"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                            >
                                <circle
                                    cx="12"
                                    cy="12"
                                    r="3"
                                />

                                <path d="M19.4 15a1.7 1.7 0 0 0 .3 1.9l.1.1-1.5 1.5-.1-.1a1.7 1.7 0 0 0-1.9-.3 1.7 1.7 0 0 0-1 1.6V20h-2.1v-.2a1.7 1.7 0 0 0-1-1.6 1.7 1.7 0 0 0-1.9.3l-.1.1-1.5-1.5.1-.1a1.7 1.7 0 0 0 .3-1.9 1.7 1.7 0 0 0-1.6-1H5v-2.1h.2a1.7 1.7 0 0 0 1.6-1 1.7 1.7 0 0 0-.3-1.9l-.1-.1 1.5-1.5.1.1a1.7 1.7 0 0 0 1.9.3 1.7 1.7 0 0 0 1-1.6V4h2.1v.2a1.7 1.7 0 0 0 1 1.6 1.7 1.7 0 0 0 1.9-.3l.1-.1 1.5 1.5-.1.1a1.7 1.7 0 0 0-.3 1.9 1.7 1.7 0 0 0 .3 1.9 1.7 1.7 0 0 0 1.6 1z"/>
                            </svg>

                            Settings

                        </a>


                        <div class="dropdown-line"></div>


                        <!-- Logout -->

                        <form
                            action="{{ route('logout') }}"
                            method="POST"
                            class="logout-form"
                        >

                            @csrf

                            <button
                                type="submit"
                                class="dropdown-link logout-button"
                            >

                                <svg
                                    viewBox="0 0 24 24"
                                    fill="none"
                                    stroke="currentColor"
                                    stroke-width="2"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                >
                                    <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/>
                                    <path d="M16 17l5-5-5-5"/>
                                    <path d="M21 12H9"/>
                                </svg>

                                <span>
                                    Logout
                                </span>

                            </button>

                        </form>

                    </div>

                </div>

            </div>

        </div>


        <!-- =========================================
             PAGE HEADER
        ========================================== -->

        <div class="pagehead">

            <div>

                <h1>
                    Favorites
                </h1>

                <p>
                    Produce you've saved for your next order.
                </p>

            </div>


            <button
                class="ghost-btn"
                id="clearFavBtn"
                type="button"
            >
                Clear all
            </button>

        </div>


        <!-- =========================================
             FAVORITES
        ========================================== -->

        <div
            class="fav-grid"
            id="favGrid"
        >

            @forelse($favorites as $favorite)

                @php
                    $listing = $favorite->harvestListing;
                    $farmer = $listing->farmer;
                @endphp

                <div
                    class="card market-card"
                    id="favorite-card-{{ $listing->id }}"
                >

                    <div class="market-thumb">

                        @if($listing->image)

                            <img
                                src="{{ asset('storage/' . $listing->image) }}"
                                alt="{{ $listing->product_name }}"
                                style="
                                    width:100%;
                                    height:100%;
                                    object-fit:cover;
                                "
                            >

                        @else

                            <div style="font-size:44px;">
                                🌾
                            </div>

                        @endif


                        <button
                            class="fav-toggle"
                            type="button"
                            onclick="removeFavorite({{ $listing->id }})"
                            title="Remove from favorites"
                        >
                            ♥
                        </button>

                    </div>


                    <div class="market-body">

                        <div class="market-farmer">

                            👤

                            {{ $farmer->first_name }}
                            {{ $farmer->last_name }}

                        </div>


                        <div class="market-name">

                            {{ $listing->product_name }}

                        </div>


                        <div class="market-loc">

                            📍

                            {{ $farmer->farm_location ?? $farmer->address ?? 'Location not provided' }}

                        </div>


                        <div class="market-foot">

                            <div class="market-price">

                                ₱{{ number_format($listing->price, 2) }}

                                <span>
                                    /{{ $listing->unit }}
                                </span>

                            </div>


                            <a
                                href="/buyer/marketplace/{{ $listing->id }}"
                                class="add-cart"
                                title="View product"
                            >

                                <svg
                                    width="16"
                                    height="16"
                                    viewBox="0 0 24 24"
                                    fill="none"
                                    stroke="currentColor"
                                    stroke-width="2.2"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                >
                                    <path d="M9 18l6-6-6-6"/>
                                </svg>

                            </a>

                        </div>

                    </div>

                </div>

            @empty

                <div
                    class="fav-empty"
                    id="dynamicEmpty"
                >

                    <div class="fav-empty-icon">
                        🤍
                    </div>

                    <div class="fav-empty-title">
                        No favorites yet
                    </div>

                    <div class="fav-empty-text">
                        Tap the heart on any product to save it here.
                    </div>

                </div>

            @endforelse

        </div>

    </main>

</div>


<script>

/* =====================================================
   CSRF TOKEN
===================================================== */

const csrfToken =
    document.querySelector('meta[name="csrf-token"]')
        ?.getAttribute("content")
    || "{{ csrf_token() }}";


/* =====================================================
   MOBILE SIDEBAR
===================================================== */

const sidebar =
    document.getElementById("sidebar");

const hamburgerBtn =
    document.getElementById("hamburgerBtn");

if (hamburgerBtn) {

    hamburgerBtn.addEventListener(
        "click",
        function(event) {

            event.stopPropagation();

            sidebar.classList.toggle("open");

        }
    );
}


/* =====================================================
   USER DROPDOWN
===================================================== */

const userMenu =
    document.getElementById("userMenu");

const userChip =
    document.getElementById("userChip");

const userDropdown =
    document.getElementById("userDropdown");


if (userChip) {

    userChip.addEventListener(
        "click",
        function(event) {

            event.stopPropagation();

            /*
             * Close notification when
             * opening profile menu.
             */
            if (notificationDropdown) {

                notificationDropdown.classList.remove(
                    "show"
                );

            }

            if (bellBtn) {

                bellBtn.setAttribute(
                    "aria-expanded",
                    "false"
                );

            }

            userMenu.classList.toggle("open");

        }
    );
}


if (userDropdown) {

    userDropdown.addEventListener(
        "click",
        function(event) {

            event.stopPropagation();

        }
    );
}


/* =====================================================
   NOTIFICATION ELEMENTS
===================================================== */

const notificationWrapper =
    document.getElementById(
        "notificationWrapper"
    );

const bellBtn =
    document.getElementById(
        "bellBtn"
    );

const notificationDropdown =
    document.getElementById(
        "notificationDropdown"
    );

const notificationCount =
    document.getElementById(
        "notificationCount"
    );

const notificationSummary =
    document.getElementById(
        "notificationSummary"
    );

const markAllRead =
    document.getElementById(
        "markAllRead"
    );


/* =====================================================
   OPEN / CLOSE NOTIFICATIONS
===================================================== */

if (bellBtn) {

    bellBtn.addEventListener(
        "click",
        function(event) {

            event.stopPropagation();

            const isOpen =
                notificationDropdown.classList.contains(
                    "show"
                );

            /*
             * Close profile dropdown.
             */
            if (userMenu) {

                userMenu.classList.remove(
                    "open"
                );

            }


            if (isOpen) {

                notificationDropdown.classList.remove(
                    "show"
                );

                bellBtn.setAttribute(
                    "aria-expanded",
                    "false"
                );

            } else {

                notificationDropdown.classList.add(
                    "show"
                );

                bellBtn.setAttribute(
                    "aria-expanded",
                    "true"
                );

            }

        }
    );
}


/* =====================================================
   PREVENT DROPDOWN FROM CLOSING
===================================================== */

if (notificationDropdown) {

    notificationDropdown.addEventListener(
        "click",
        function(event) {

            event.stopPropagation();

        }
    );
}


/* =====================================================
   UPDATE NOTIFICATION COUNT
===================================================== */

function updateNotificationCount() {

    const unreadItems =
        document.querySelectorAll(
            ".notification-item.unread"
        );

    const count =
        unreadItems.length;


    /*
     * Update red badge.
     */

    if (notificationCount) {

        if (count > 0) {

            notificationCount.style.display =
                "flex";

            notificationCount.textContent =
                count > 99
                    ? "99+"
                    : count;

        } else {

            notificationCount.style.display =
                "none";

        }

    }


    /*
     * Update summary.
     */

    if (notificationSummary) {

        notificationSummary.textContent =
            count > 0
                ? count + " unread"
                : "You're all caught up";

    }


    /*
     * Show/hide Mark All button.
     */

    if (markAllRead) {

        markAllRead.style.display =
            count > 0
                ? "block"
                : "none";

    }

}


/* =====================================================
   MARK ONE NOTIFICATION AS READ
===================================================== */

document
    .querySelectorAll(
        ".notification-item.unread"
    )
    .forEach(function(item) {

        item.addEventListener(
            "click",
            function() {

                const notificationId =
                    this.dataset.notificationId;


                if (!notificationId) {
                    return;
                }


                /*
                 * Prevent double-click requests.
                 */

                if (
                    this.dataset.processing ===
                    "true"
                ) {
                    return;
                }


                this.dataset.processing =
                    "true";


                fetch(
                    "/buyer/notifications/" +
                    notificationId +
                    "/read",
                    {
                        method: "POST",

                        headers: {

                            "Content-Type":
                                "application/json",

                            "X-CSRF-TOKEN":
                                csrfToken,

                            "Accept":
                                "application/json"

                        }
                    }
                )
                .then(function(response) {

                    if (!response.ok) {

                        throw new Error(
                            "Failed to mark notification as read."
                        );

                    }

                    return response.json();

                })
                .then(function(data) {

                    if (data.success) {

                        /*
                         * Change notification
                         * from unread to read.
                         */

                        item.classList.remove(
                            "unread"
                        );

                        item.classList.add(
                            "read"
                        );


                        /*
                         * Remove green dot.
                         */

                        const unreadDot =
                            item.querySelector(
                                ".unread-dot"
                            );

                        if (unreadDot) {

                            unreadDot.remove();

                        }


                        /*
                         * Update badge.
                         */

                        updateNotificationCount();

                    }

                })
                .catch(function(error) {

                    console.error(
                        "Notification error:",
                        error
                    );

                })
                .finally(function() {

                    item.dataset.processing =
                        "false";

                });

            }
        );

    });


/* =====================================================
   MARK ALL NOTIFICATIONS AS READ
===================================================== */

if (markAllRead) {

    markAllRead.addEventListener(
        "click",
        function(event) {

            event.preventDefault();

            if (
                this.dataset.processing ===
                "true"
            ) {
                return;
            }


            this.dataset.processing =
                "true";


            const button = this;

            button.disabled = true;


            fetch(
                "/buyer/notifications/mark-all-read",
                {
                    method: "POST",

                    headers: {

                        "Content-Type":
                            "application/json",

                        "X-CSRF-TOKEN":
                            csrfToken,

                        "Accept":
                            "application/json"

                    }
                }
            )
            .then(function(response) {

                if (!response.ok) {

                    throw new Error(
                        "Failed to mark notifications as read."
                    );

                }

                return response.json();

            })
            .then(function(data) {

                if (data.success) {

                    /*
                     * Change every unread
                     * notification to read.
                     */

                    document
                        .querySelectorAll(
                            ".notification-item.unread"
                        )
                        .forEach(
                            function(item) {

                                item.classList.remove(
                                    "unread"
                                );

                                item.classList.add(
                                    "read"
                                );


                                const unreadDot =
                                    item.querySelector(
                                        ".unread-dot"
                                    );

                                if (unreadDot) {

                                    unreadDot.remove();

                                }

                            }
                        );


                    updateNotificationCount();

                }

            })
            .catch(function(error) {

                console.error(
                    "Mark all notifications error:",
                    error
                );

            })
            .finally(function() {

                button.disabled = false;

                button.dataset.processing =
                    "false";

                updateNotificationCount();

            });

        }
    );

}


/* =====================================================
   CLOSE MENUS WHEN CLICKING OUTSIDE
===================================================== */

document.addEventListener(
    "click",
    function(event) {

        /*
         * Close profile dropdown.
         */

        if (
            userMenu &&
            !userMenu.contains(event.target)
        ) {

            userMenu.classList.remove(
                "open"
            );

        }


        /*
         * Close notification dropdown.
         */

        if (
            notificationWrapper &&
            !notificationWrapper.contains(
                event.target
            )
        ) {

            if (notificationDropdown) {

                notificationDropdown.classList.remove(
                    "show"
                );

            }

            if (bellBtn) {

                bellBtn.setAttribute(
                    "aria-expanded",
                    "false"
                );

            }

        }


        /*
         * Close mobile sidebar.
         */

        if (
            window.innerWidth <= 860 &&
            sidebar &&
            sidebar.classList.contains("open") &&
            !sidebar.contains(event.target) &&
            event.target !== hamburgerBtn
        ) {

            sidebar.classList.remove(
                "open"
            );

        }

    }
);


/* =====================================================
   REMOVE ONE FAVORITE
===================================================== */

function removeFavorite(listingId) {

    fetch(
        "/buyer/favorites/" + listingId,
        {
            method: "POST",

            headers: {

                "Content-Type":
                    "application/json",

                "X-CSRF-TOKEN":
                    csrfToken,

                "Accept":
                    "application/json"

            }
        }
    )
    .then(function(response) {

        if (!response.ok) {

            throw new Error(
                "Failed to remove favorite."
            );

        }

        return response.json();

    })
    .then(function(data) {

        if (
            data.success &&
            data.favorited === false
        ) {

            const card =
                document.getElementById(
                    "favorite-card-" +
                    listingId
                );

            if (card) {

                card.remove();

            }

            checkEmptyFavorites();

        }

    })
    .catch(function(error) {

        console.error(
            "Favorite error:",
            error
        );

    });

}


/* =====================================================
   CLEAR ALL FAVORITES
===================================================== */

const clearFavBtn =
    document.getElementById(
        "clearFavBtn"
    );


if (clearFavBtn) {

    clearFavBtn.addEventListener(
        "click",
        function() {

            if (
                !confirm(
                    "Remove all favorites?"
                )
            ) {

                return;

            }


            fetch(
                "{{ route('buyer.favorites.clear') }}",
                {
                    method: "DELETE",

                    headers: {

                        "Content-Type":
                            "application/json",

                        "X-CSRF-TOKEN":
                            csrfToken,

                        "Accept":
                            "application/json"

                    }
                }
            )
            .then(function(response) {

                if (!response.ok) {

                    throw new Error(
                        "Failed to clear favorites."
                    );

                }

                return response.json();

            })
            .then(function(data) {

                if (data.success) {

                    document
                        .querySelectorAll(
                            ".market-card"
                        )
                        .forEach(
                            function(card) {

                                card.remove();

                            }
                        );


                    checkEmptyFavorites();

                }

            })
            .catch(function(error) {

                console.error(
                    "Clear favorites error:",
                    error
                );

            });

        }
    );

}


/* =====================================================
   CHECK EMPTY FAVORITES
===================================================== */

function checkEmptyFavorites() {

    const grid =
        document.getElementById(
            "favGrid"
        );

    if (!grid) {
        return;
    }


    const cards =
        grid.querySelectorAll(
            ".market-card"
        );


    let emptyMessage =
        document.getElementById(
            "dynamicEmpty"
        );


    if (cards.length === 0) {

        if (!emptyMessage) {

            emptyMessage =
                document.createElement(
                    "div"
                );

            emptyMessage.id =
                "dynamicEmpty";

            emptyMessage.className =
                "fav-empty";

            emptyMessage.innerHTML = `

                <div class="fav-empty-icon">
                    🤍
                </div>

                <div class="fav-empty-title">
                    No favorites yet
                </div>

                <div class="fav-empty-text">
                    Tap the heart on any product to save it here.
                </div>

            `;

            grid.appendChild(
                emptyMessage
            );

        }

    } else {

        if (emptyMessage) {

            emptyMessage.remove();

        }

    }

}


/* =====================================================
   INITIALIZE NOTIFICATION COUNT
===================================================== */

updateNotificationCount();

</script>

</body>
</html>