<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>AniLink PH - Marketplace</title>

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
            font-family: "Plus Jakarta Sans", sans-serif;
            background: var(--cream);
            color: var(--ink);
            min-height: 100vh;
        }

        a {
            color: inherit;
            text-decoration: none;
        }

        button {
            font-family: inherit;
        }

        /* =========================
           APP
        ========================= */

        .app {
            display: flex;
            min-height: 100vh;
            width: 100%;
        }

        /* =========================
           SIDEBAR
        ========================= */

        .sidebar {
            width: 264px;
            flex: 0 0 264px;
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
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 4px 6px 22px;
            border-bottom: 1px solid rgba(255,255,255,0.12);
            margin-bottom: 18px;
        }

        .brand-mark {
            font-size: 26px;
        }

        .brand-name {
            font-family: "Fraunces", serif;
            font-weight: 600;
            font-size: 22px;
            color: var(--brand-green-light);
        }

        .brand-tag {
            font-size: 11.5px;
            color: #c7d6c2;
            margin-top: 1px;
        }

        .navlist {
            display: flex;
            flex-direction: column;
            gap: 4px;
        }

        .navitem {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 14px;
            border-radius: 12px;
            color: #dfe9d9;
            font-weight: 600;
            font-size: 14.5px;
            cursor: pointer;
            border: none;
            background: transparent;
            width: 100%;
            text-align: left;
            transition: 0.2s;
        }

        .navitem svg {
            width: 20px;
            height: 20px;
            flex: 0 0 20px;
        }

        .navitem:hover {
            background: rgba(255,255,255,0.06);
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

        /* =========================
           MAIN
        ========================= */

        .main {
            flex: 1;
            min-width: 0;
            padding: 24px 30px 40px;
        }

        /* =========================
           TOPBAR
        ========================= */

        .topbar {
            display: flex;
            align-items: center;
            gap: 16px;
            margin-bottom: 28px;
        }

        .hamburger {
            display: none;
            width: 42px;
            height: 42px;
            border: 1px solid var(--line);
            background: white;
            border-radius: 12px;
            cursor: pointer;
            align-items: center;
            justify-content: center;
        }

        .hamburger svg {
            width: 22px;
            height: 22px;
        }

        .searchbar {
            flex: 1;
            max-width: 600px;
            display: flex;
            align-items: center;
            background: white;
            border: 1px solid var(--line);
            border-radius: 14px;
            overflow: hidden;
        }

        .searchbar input {
            flex: 1;
            border: none;
            outline: none;
            padding: 13px 16px;
            font-family: inherit;
            font-size: 14px;
            background: transparent;
        }

        .searchbar input::placeholder {
            color: #9aa49c;
        }

        .search-btn {
            width: 48px;
            height: 48px;
            border: none;
            background: var(--brand-green);
            color: white;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .search-btn:hover {
            background: #4f8933;
        }

        .search-btn svg {
            width: 20px;
            height: 20px;
        }

        .top-actions {
            margin-left: auto;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        /* =========================
           NOTIFICATION BELL
        ========================= */
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

    transition: 0.2s;
}


.bell-wrap:hover {

    background: #f0f3ed;
}


.bell-wrap svg {

    pointer-events: none;
}


/* =========================================================
   NOTIFICATION COUNT
========================================================= */

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


/* =========================================================
   NOTIFICATION DROPDOWN
========================================================= */

.notification-dropdown {

    position: absolute;

    top: 52px;

    right: 0;

    width: 370px;

    max-height: 500px;

    background: white;

    border-radius: 14px;

    box-shadow:
        0 10px 30px
        rgba(0, 0, 0, 0.12);

    border:
        1px solid #e5e8e2;

    overflow: hidden;

    z-index: 9999;

    display: none;
}


.notification-dropdown.show {

    display: block;
}


/* =========================================================
   NOTIFICATION HEADER
========================================================= */

.notification-header {

    padding: 16px 18px;

    display: flex;

    align-items: center;

    justify-content: space-between;

    border-bottom:
        1px solid #edf0eb;

    gap: 15px;
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

    white-space: nowrap;
}


.mark-all-btn:hover {

    text-decoration: underline;
}


/* =========================================================
   NOTIFICATION LIST
========================================================= */

.notification-list {

    max-height: 420px;

    overflow-y: auto;
}


.notification-item {

    position: relative;

    display: flex;

    gap: 12px;

    padding: 15px 18px;

    border-bottom:
        1px solid #f0f2ee;

    cursor: pointer;

    transition:
        background 0.2s;
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


/* =========================================================
   NOTIFICATION ICON
========================================================= */

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


/* =========================================================
   NOTIFICATION CONTENT
========================================================= */

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


/* =========================================================
   UNREAD DOT
========================================================= */

.unread-dot {

    width: 8px;

    height: 8px;

    background: #5f9c3f;

    border-radius: 50%;

    position: absolute;

    right: 15px;

    top: 20px;
}


/* =========================================================
   EMPTY NOTIFICATIONS
========================================================= */

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
        /* =========================
           USER MENU
        ========================= */

        .user-menu {
            position: relative;
        }

        .user-chip {
            border: none;
            background: transparent;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 5px 8px;
            border-radius: 12px;
            transition: 0.2s;
        }

        .user-chip:hover {
            background: rgba(95,156,63,0.08);
        }

        .avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: #5f9c3f;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 800;
            font-size: 13px;
        }

        .user-name {
            font-size: 13px;
            font-weight: 800;
            color: var(--ink);
            text-align: left;
        }

        .user-role {
            font-size: 11px;
            color: var(--ink-soft);
            text-align: left;
            margin-top: 2px;
        }

        .user-arrow {
            width: 17px;
            height: 17px;
            color: var(--ink-soft);
            transition: transform 0.2s ease;
        }

        .user-menu.open .user-arrow {
            transform: rotate(180deg);
        }

        /* =========================
           USER DROPDOWN
        ========================= */

        .user-dropdown {
            position: absolute;
            top: calc(100% + 10px);
            right: 0;
            width: 260px;
            background: white;
            border: 1px solid var(--line);
            border-radius: 16px;
            padding: 10px;
            box-shadow: 0 12px 35px rgba(23,51,33,0.15);
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

        .logout-form {
            margin: 0;
            width: 100%;
        }

        .logout-button {
            color: #b43d3d;
        }

        .logout-button:hover {
            background: #fff0f0;
            color: #b43d3d;
        }

        /* =========================
           PAGE HEADER
        ========================= */

        .page-header {
            display: flex;
            align-items: flex-end;
            justify-content: space-between;
            gap: 20px;
            margin-bottom: 20px;
        }

        .page-title {
            margin: 0;
            font-family: "Fraunces", serif;
            font-size: 34px;
            font-weight: 600;
            color: var(--ink);
        }

        .page-subtitle {
            margin: 7px 0 0;
            color: var(--ink-soft);
            font-size: 14px;
        }

        .sort-select {
            border: 1px solid var(--line);
            background: white;
            border-radius: 11px;
            padding: 10px 13px;
            font-family: inherit;
            color: var(--ink);
            font-size: 13px;
            outline: none;
            cursor: pointer;
        }

        /* =========================
           CATEGORY CHIPS
        ========================= */

        .category-chips {
            display: flex;
            align-items: center;
            gap: 8px;
            flex-wrap: wrap;
            margin-bottom: 22px;
        }

        .category-chip {
            border: 1px solid var(--line);
            background: white;
            color: var(--ink-soft);
            border-radius: 999px;
            padding: 9px 16px;
            font-size: 12.5px;
            font-weight: 700;
            cursor: pointer;
            transition: 0.2s;
        }

        .category-chip:hover {
            border-color: var(--brand-green);
            color: var(--brand-green);
        }

        .category-chip.active {
            background: var(--brand-green);
            border-color: var(--brand-green);
            color: white;
        }

        /* =========================
           MARKET GRID
        ========================= */

        .market-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 18px;
        }

        .market-card {
            background: var(--card);
            border: 1px solid var(--line);
            border-radius: var(--radius-lg);
            overflow: hidden;
            box-shadow: var(--shadow-card);
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .market-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 22px rgba(23,51,33,0.09);
        }

        .product-image {
            height: 190px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 76px;
            position: relative;
        }

        .favorite-btn {
            position: absolute;
            top: 12px;
            right: 12px;
            width: 36px;
            height: 36px;
            border-radius: 50%;
            border: 1px solid rgba(23,51,33,0.08);
            background: rgba(255,255,255,0.9);
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            color: #657268;
            transition: 0.2s;
        }

        .favorite-btn:hover {
            transform: scale(1.05);
        }

        .favorite-btn.active {
            color: #d94b4b;
        }

        .favorite-btn svg {
            width: 19px;
            height: 19px;
        }

        .product-content {
            padding: 17px;
        }

        .product-category {
            display: inline-block;
            font-size: 10px;
            text-transform: uppercase;
            letter-spacing: 0.7px;
            font-weight: 800;
            color: #6a786d;
            background: #f0f4ec;
            border-radius: 999px;
            padding: 5px 8px;
            margin-bottom: 9px;
        }

        .product-name {
            font-family: "Fraunces", serif;
            font-size: 21px;
            font-weight: 600;
            margin: 0 0 5px;
            color: var(--ink);
        }

        .farmer-name {
            font-size: 12px;
            font-weight: 700;
            color: #46554b;
            margin-bottom: 4px;
        }

        .farmer-location {
            color: var(--ink-soft);
            font-size: 11px;
            margin-bottom: 15px;
        }

        .product-bottom {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 10px;
        }

        .product-price {
            font-size: 18px;
            font-weight: 800;
            color: #3f7d20;
        }

        .product-price span {
            font-size: 11px;
            color: var(--ink-soft);
            font-weight: 600;
        }

        .view-btn {
            border: none;
            background: var(--brand-green);
            color: white;
            border-radius: 10px;
            padding: 9px 13px;
            font-size: 11.5px;
            font-weight: 800;
            cursor: pointer;
            transition: 0.2s;
        }

        .view-btn:hover {
            background: #4f8933;
        }

        .empty-state {
            grid-column: 1 / -1;
            background: white;
            border: 1px solid var(--line);
            border-radius: var(--radius-lg);
            padding: 50px 20px;
            text-align: center;
            color: var(--ink-soft);
        }

        .empty-state div {
            font-size: 42px;
            margin-bottom: 10px;
        }

        .empty-state h3 {
            color: var(--ink);
            margin: 0 0 6px;
        }

        .empty-state p {
            margin: 0;
            font-size: 13px;
        }

        /* =========================
           RESPONSIVE
        ========================= */

        @media (max-width: 1100px) {

            .market-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }

        }

        @media (max-width: 860px) {

            .sidebar {
                position: fixed;
                left: -280px;
                z-index: 40;
                transition: left 0.2s ease;
            }

            .sidebar.open {
                left: 0;
                box-shadow: 10px 0 30px rgba(0,0,0,0.25);
            }

            .main {
                padding: 16px;
            }

            .hamburger {
                display: flex;
            }

            .searchbar {
                max-width: none;
            }

        }

        @media (max-width: 600px) {

            .market-grid {
                grid-template-columns: 1fr;
            }

            .user-name,
            .user-role,
            .user-arrow {
                display: none;
            }

            .user-dropdown {
                right: 0;
                width: 250px;
            }

            .notification-dropdown {
                right: -55px;
                width: 340px;
            }

            .page-header {
                align-items: flex-start;
                flex-direction: column;
            }

            .page-title {
                font-size: 29px;
            }

            .topbar {
                gap: 8px;
            }

            .top-actions {
                gap: 5px;
            }

            .product-image {
                height: 210px;
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

<div class="app">

    <!-- =========================
         SIDEBAR
    ========================== -->

    <aside class="sidebar" id="sidebar">

        <div class="brand">

            <div class="brand-mark">🌾</div>

            <div>
                <div class="brand-name">AniLink</div>

                <div class="brand-tag">
                    Bridging Farmers and Buyers
                </div>
            </div>

        </div>


        <nav class="navlist">

            <!-- Dashboard -->

            <a href="/buyer/dashboard"
               class="navitem">

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

                <span>Dashboard</span>

            </a>


            <!-- Marketplace -->

            <a href="/buyer/marketplace"
               class="navitem active">

                <svg
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="2"
                >

                    <path d="M4 8h16l-1.5 11a2 2 0 0 1-2 1.8H7.5a2 2 0 0 1-2-1.8L4 8Z"/>
                    <path d="M8 8V6a4 4 0 0 1 8 0v2"/>

                </svg>

                <span>Marketplace</span>

            </a>


            <!-- My Orders -->

            <a href="/buyer/my-orders"
               class="navitem">

                <svg
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="2"
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

                <span>My Orders</span>

            </a>


            <!-- Favorites -->

            <a href="/buyer/favorites"
               class="navitem">

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

                <span>Favorites</span>

            </a>


            <!-- Messages -->

            <a href="/buyer/messages"
               class="navitem">

                <svg
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="2"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                >

                    <path d="M21 15a2 2 0 0 1-2 2H8l-5 4V5a2 2 0 0 1 2-2h14v10Z"/>

                </svg>

                <span>Messages</span>

                @if(($unreadMessagesCount ?? 0) > 0)

                    <span class="badge">

                        {{ $unreadMessagesCount > 99 ? '99+' : $unreadMessagesCount }}

                    </span>

                @endif

            </a>

        </nav>

    </aside>


    <!-- =========================
         MAIN
    ========================== -->

    <main class="main">


        <!-- =========================
             TOPBAR
        ========================== -->

        <div class="topbar">


            <!-- Hamburger -->

            <button
                class="hamburger"
                id="hamburgerBtn"
                type="button"
            >

                <svg
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
                    id="searchInput"
                    placeholder="Search for fresh produce..."
                >

                <button
                    class="search-btn"
                    id="searchBtn"
                    type="button"
                >

                    <svg
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                    >

                        <circle cx="11" cy="11" r="7"/>

                        <path d="m20 20-4-4"/>

                    </svg>

                </button>

            </div>


            <!-- =========================
                 TOP ACTIONS
            ========================== -->

            <div class="top-actions">


<!-- =================================================
     NOTIFICATION
================================================= -->

<div
    class="notification-wrapper"
    id="notificationWrapper"
>


<button
    type="button"
    class="bell-wrap"
    id="notificationBtn"
    aria-label="Notifications"
    aria-expanded="false"
>


<svg
    width="24"
    height="24"
    viewBox="0 0 24 24"
    fill="none"
    stroke="currentColor"
    stroke-width="2"
    stroke-linecap="round"
    stroke-linejoin="round"
>

    <path
        d="M18 8A6 6 0 0 0 6 8c0 7-3 7-3 9h18c0-2-3-2-3-9"
    ></path>

    <path
        d="M13.73 21a2 2 0 0 1-3.46 0"
    ></path>

</svg>


@if($notificationCount > 0)

<span
    class="dot"
    id="notificationCount"
>

    {{ $notificationCount > 99 ? '99+' : $notificationCount }}

</span>

@endif


</button>


<!-- =================================================
     NOTIFICATION DROPDOWN
================================================= -->

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

                {{ $notificationCount }}
                unread

            @else

                You're all caught up

            @endif

        </span>

    </div>


    @if($notificationCount > 0)

    <button
        type="button"
        id="markAllRead"
        class="mark-all-btn"
    >

        Mark all as read

    </button>

    @endif

</div>


<div
    class="notification-list"
    id="notificationList"
>


@forelse($notifications as $notification)


<div
    class="notification-item
    {{ is_null($notification->read_at) ? 'unread' : 'read' }}"
    data-notification-id="{{ $notification->id }}"
>


<div class="notification-icon">

    @if($notification->icon === 'message-square')

        <!-- Messages icon - same as Marketplace sidebar -->
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

    @elseif($notification->icon === 'check-circle')

        <svg
            viewBox="0 0 24 24"
            fill="none"
            stroke="currentColor"
            stroke-width="2"
            stroke-linecap="round"
            stroke-linejoin="round"
        >
            <circle cx="12" cy="12" r="9"/>
            <path d="m9 12 2 2 4-4"/>
        </svg>

    @elseif($notification->icon === 'truck')

        <svg
            viewBox="0 0 24 24"
            fill="none"
            stroke="currentColor"
            stroke-width="2"
            stroke-linecap="round"
            stroke-linejoin="round"
        >
            <path d="M3 7h11v10H3z"/>
            <path d="M14 10h4l3 3v4h-7z"/>
            <circle cx="7" cy="19" r="2"/>
            <circle cx="18" cy="19" r="2"/>
        </svg>

    @elseif($notification->icon === 'package-check')

        <svg
            viewBox="0 0 24 24"
            fill="none"
            stroke="currentColor"
            stroke-width="2"
            stroke-linecap="round"
            stroke-linejoin="round"
        >
            <path d="m16.5 9.4-9-5.19"/>
            <path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l2-1.14"/>
            <polyline points="3.29 7 12 12 20.71 7"/>
            <line x1="12" y1="22" x2="12" y2="12"/>
            <path d="m16 19 2 2 4-4"/>
        </svg>

    @elseif($notification->icon === 'shopping-bag')

        <svg
            viewBox="0 0 24 24"
            fill="none"
            stroke="currentColor"
            stroke-width="2"
            stroke-linecap="round"
            stroke-linejoin="round"
        >
            <path d="M6 8h12l-1 12H7L6 8Z"/>
            <path d="M9 8V6a3 3 0 0 1 6 0v2"/>
        </svg>

    @elseif($notification->icon === 'shopping-cart')

        <svg
            viewBox="0 0 24 24"
            fill="none"
            stroke="currentColor"
            stroke-width="2"
            stroke-linecap="round"
            stroke-linejoin="round"
        >
            <circle cx="9" cy="20" r="1"/>
            <circle cx="18" cy="20" r="1"/>
            <path d="M3 4h2l2.4 11.4a2 2 0 0 0 2 1.6h7.8a2 2 0 0 0 2-1.6L21 8H6"/>
        </svg>

    @elseif($notification->icon === 'star')

        <svg
            viewBox="0 0 24 24"
            fill="none"
            stroke="currentColor"
            stroke-width="2"
            stroke-linecap="round"
            stroke-linejoin="round"
        >
            <path d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9L12 3Z"/>
        </svg>

    @elseif($notification->icon === 'wallet')

        <svg
            viewBox="0 0 24 24"
            fill="none"
            stroke="currentColor"
            stroke-width="2"
            stroke-linecap="round"
            stroke-linejoin="round"
        >
            <path d="M20 7H5a2 2 0 0 1 0-4h13a2 2 0 0 1 2 2v2"/>
            <path d="M5 7h15a1 1 0 0 1 1 1v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5"/>
            <path d="M16 13h.01"/>
        </svg>

    @else

        <!-- Default notification bell -->
        <svg
            viewBox="0 0 24 24"
            fill="none"
            stroke="currentColor"
            stroke-width="2"
            stroke-linecap="round"
            stroke-linejoin="round"
        >
            <path d="M18 8A6 6 0 0 0 6 8c0 7-3 7-3 9h18c0-2-3-2-3-9"/>
            <path d="M13.73 21a2 2 0 0 1-3.46 0"/>
        </svg>

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
        You don't have any notifications yet.
    </p>

</div>


@endforelse


</div>

</div>

</div>

                <!-- =========================
                     USER MENU
                ========================== -->

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
                                Buyer
                            </div>

                        </div>


                        <svg
                            class="user-arrow"
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
                            >

                                <circle
                                    cx="12"
                                    cy="8"
                                    r="4"
                                />

                                <path d="M4 21c0-4 3.5-7 8-7s8 3 8 7"/>

                            </svg>

                            <span>
                                My Profile
                            </span>

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
                            >

                                <circle
                                    cx="12"
                                    cy="12"
                                    r="3"
                                />

                                <path d="M19.4 15a1.7 1.7 0 0 0 .3 1.9l.1.1-1.8 1.8-.1-.1a1.7 1.7 0 0 0-1.9-.3 1.7 1.7 0 0 0-1 1.6v.2h-2.6V20a1.7 1.7 0 0 0-1-1.6 1.7 1.7 0 0 0-1.9.3l-.1.1-1.8-1.8.1-.1A1.7 1.7 0 0 0 8 15a1.7 1.7 0 0 0-1.6-1H6v-2.6h.2A1.7 1.7 0 0 0 8 10a1.7 1.7 0 0 0-.3-1.9l-.1-.1 1.8-1.8.1.1a1.7 1.7 0 0 0 1.9.3 1.7 1.7 0 0 0 1-1.6v-.2H15V5a1.7 1.7 0 0 0 1 1.6 1.7 1.7 0 0 0 1.9-.3l.1-.1 1.8 1.8-.1.1a1.7 1.7 0 0 0-.3 1.9 1.7 1.7 0 0 0 .3 1.9 1.7 1.7 0 0 0 1.6 1h.2v2.6H21a1.7 1.7 0 0 0-1.6 1Z"/>

                            </svg>

                            <span>
                                Settings
                            </span>

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


        <!-- =========================
             PAGE HEADER
        ========================== -->

        <div class="page-header">

            <div>

                <h1 class="page-title">
                    Marketplace
                </h1>

                <p class="page-subtitle">
                    Fresh products directly from local farmers.
                </p>

            </div>


            <select
                class="sort-select"
                id="sortSelect"
            >

                <option value="default">
                    Sort: Recommended
                </option>

                <option value="price-low">
                    Price: Low to High
                </option>

                <option value="price-high">
                    Price: High to Low
                </option>

                <option value="name">
                    Name: A-Z
                </option>

            </select>

        </div>


        <!-- =========================
             CATEGORIES
        ========================== -->

        <div
            class="category-chips"
            id="categoryChips"
        >

            <button
                type="button"
                class="category-chip active"
                onclick="filterCategory('All')"
            >
                All
            </button>


            @foreach($listings->pluck('category')->unique()->sort() as $category)

                <button
                    type="button"
                    class="category-chip"
                    onclick="filterCategory('{{ $category }}')"
                >

                    {{ $category }}

                </button>

            @endforeach

        </div>


        <!-- =========================
             MARKETPLACE GRID
        ========================== -->

        <div
            class="market-grid"
            id="marketGrid"
        >

            @forelse($listings as $listing)

                <article
                    class="market-card"

                    data-category="{{ strtolower($listing->category) }}"

                    data-name="{{ strtolower($listing->product_name) }}"

                    data-farmer="{{ strtolower($listing->farmer->first_name . ' ' . $listing->farmer->last_name) }}"

                    data-location="{{ strtolower($listing->farmer->farm_location ?? $listing->farmer->address) }}"

                    data-price="{{ $listing->price }}"
                >

                    <div
                        class="product-image"
                        style="background:#f0f4ec;"
                    >

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

                            <span>🌾</span>

                        @endif


                        <!-- Favorite -->

                        <button
                            class="favorite-btn {{ $listing->is_favorited ? 'active' : '' }}"
                            type="button"
                            onclick="toggleFav(this, {{ $listing->id }})"
                            aria-label="Favorite {{ $listing->product_name }}"
                        >

                            <svg
                                viewBox="0 0 24 24"
                                fill="{{ $listing->is_favorited ? 'currentColor' : 'none' }}"
                                stroke="currentColor"
                                stroke-width="2"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                            >

                                <path d="M12 21s-7.5-4.6-10-9.2C.3 8.1 2 4.5 5.5 4A5.4 5.4 0 0 1 12 7a5.4 5.4 0 0 1 6.5-3C22 4.5 23.7 8.1 22 11.8 19.5 16.4 12 21 12 21Z"/>

                            </svg>

                        </button>

                    </div>


                    <div class="product-content">

                        <span class="product-category">

                            {{ $listing->category }}

                        </span>


                        <h2 class="product-name">

                            {{ $listing->product_name }}

                        </h2>


                        <div class="farmer-name">

                            Farmer:

                            {{ $listing->farmer->first_name }}
                            {{ $listing->farmer->last_name }}

                        </div>


                        <div class="farmer-location">

                            📍

                            {{ $listing->farmer->farm_location ?? $listing->farmer->address }}

                        </div>


                        <div class="product-bottom">

                            <div>

                                <div class="product-price">

                                    ₱{{ number_format($listing->price, 2) }}

                                    <span>
                                        /{{ $listing->unit }}
                                    </span>

                                </div>


                                <small style="color:#6a786d;">

                                    {{ $listing->quantity }}
                                    {{ $listing->unit }}
                                    available

                                </small>

                            </div>


                            <button
                                class="view-btn"
                                type="button"
                                onclick="viewProduct({{ $listing->id }})"
                            >

                                View Product

                            </button>

                        </div>

                    </div>

                </article>

            @empty

                <div class="empty-state">

                    <div>🌾</div>

                    <h3>
                        No products available
                    </h3>

                    <p>
                        There are currently no available harvest listings.
                    </p>

                </div>

            @endforelse

        </div>

    </main>

</div>


<script>

    /* =========================================
       VARIABLES
    ========================================= */

    const sidebar =
        document.getElementById("sidebar");

    const hamburgerBtn =
        document.getElementById("hamburgerBtn");

    const userMenu =
        document.getElementById("userMenu");

    const userChip =
        document.getElementById("userChip");

    const userDropdown =
        document.getElementById("userDropdown");


    /* =========================================
       NOTIFICATION VARIABLES
    ========================================= */

    const notificationWrapper =
        document.getElementById("notificationWrapper");

    const notificationBtn =
        document.getElementById("notificationBtn");

    const notificationDropdown =
        document.getElementById("notificationDropdown");

    const notificationCount =
        document.getElementById("notificationCount");

    const notificationSummary =
        document.getElementById("notificationSummary");

    const markAllRead =
        document.getElementById("markAllRead");


    /* =========================================
       CSRF TOKEN
    ========================================= */

    const csrfMeta =
        document.querySelector('meta[name="csrf-token"]');

    const csrfToken =
        csrfMeta
            ? csrfMeta.getAttribute("content")
            : "";


    /* =========================================
       SEARCH VARIABLES
    ========================================= */

    const searchInput =
        document.getElementById("searchInput");

    const searchBtn =
        document.getElementById("searchBtn");

    const sortSelect =
        document.getElementById("sortSelect");

    const marketGrid =
        document.getElementById("marketGrid");


    let selectedCategory = "all";


    /* =========================================
       MOBILE SIDEBAR
    ========================================= */

    if (hamburgerBtn) {

        hamburgerBtn.addEventListener("click", function(event) {

            event.stopPropagation();

            if (sidebar) {

                sidebar.classList.toggle("open");

            }

        });

    }


    /* =========================================
       NOTIFICATION COUNT
    ========================================= */

    function updateNotificationCount(count = null) {

        /*
         * If no count was provided,
         * count unread notification items.
         */

        if (count === null) {

            count =
                document.querySelectorAll(
                    ".notification-item.unread"
                ).length;

        }


        /* Update red badge */

        if (notificationCount) {

            if (count <= 0) {

                notificationCount.style.display =
                    "none";

            } else {

                notificationCount.style.display =
                    "flex";

                notificationCount.textContent =
                    count > 99
                        ? "99+"
                        : count;

            }

        }


        /* Update notification summary */

        updateNotificationSummary(count);

    }


    /* =========================================
       NOTIFICATION SUMMARY
    ========================================= */

    function updateNotificationSummary(count) {

        if (!notificationSummary) {

            return;

        }


        if (count <= 0) {

            notificationSummary.textContent =
                "You're all caught up";

        } else {

            notificationSummary.textContent =
                count + " unread";

        }

    }


    /* =========================================
       OPEN / CLOSE NOTIFICATION DROPDOWN
    ========================================= */

    if (
        notificationBtn &&
        notificationDropdown
    ) {

        notificationBtn.addEventListener(
            "click",
            function(event) {

                event.stopPropagation();


                const willOpen =
                    !notificationDropdown.classList.contains(
                        "show"
                    );


                /*
                 * Close user dropdown
                 */

                if (userMenu) {

                    userMenu.classList.remove("open");

                }


                /*
                 * Toggle notification dropdown
                 */

                notificationDropdown.classList.toggle(
                    "show",
                    willOpen
                );


                notificationBtn.setAttribute(
                    "aria-expanded",
                    willOpen
                        ? "true"
                        : "false"
                );

            }
        );

    }


    /* =========================================
       PREVENT DROPDOWN FROM CLOSING
    ========================================= */

    if (notificationDropdown) {

        notificationDropdown.addEventListener(
            "click",
            function(event) {

                event.stopPropagation();

            }
        );

    }


    /* =========================================
       MARK SINGLE NOTIFICATION AS READ
    ========================================= */

    function attachNotificationEvents() {

        document
            .querySelectorAll(
                ".notification-item.unread"
            )
            .forEach(function(item) {

                item.addEventListener(
                    "click",
                    function() {

                        const notificationItem =
                            this;


                        const notificationId =
                            notificationItem.dataset.notificationId;


                        /*
                         * Prevent double clicking
                         */

                        if (
                            notificationItem.dataset.processing ===
                            "true"
                        ) {

                            return;

                        }


                        notificationItem.dataset.processing =
                            "true";


                        /*
                         * Send request to Laravel
                         */

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
                                    "Request failed."
                                );

                            }

                            return response.json();

                        })

                        .then(function(data) {

                            if (data.success) {


                                /*
                                 * Change notification
                                 * from unread to read
                                 */

                                notificationItem.classList.remove(
                                    "unread"
                                );

                                notificationItem.classList.add(
                                    "read"
                                );


                                /*
                                 * Remove red unread dot
                                 */

                                const unreadDot =
                                    notificationItem.querySelector(
                                        ".unread-dot"
                                    );


                                if (unreadDot) {

                                    unreadDot.remove();

                                }


                                /*
                                 * Update badge
                                 */

                                if (
                                    typeof data.unreadCount !==
                                    "undefined"
                                ) {

                                    updateNotificationCount(
                                        data.unreadCount
                                    );

                                } else {

                                    updateNotificationCount();

                                }

                            }

                        })

                        .catch(function(error) {

                            console.error(
                                "Notification error:",
                                error
                            );

                        })

                        .finally(function() {

                            notificationItem.dataset.processing =
                                "false";

                        });

                    }
                );

            });

    }


    /*
     * Attach notification click events
     */

    attachNotificationEvents();


    /* =========================================
       MARK ALL NOTIFICATIONS AS READ
    ========================================= */

    if (markAllRead) {

        markAllRead.addEventListener(
            "click",
            function(event) {

                event.stopPropagation();


                /*
                 * Disable button while processing
                 */

                markAllRead.disabled =
                    true;

                markAllRead.textContent =
                    "Updating...";


                /*
                 * Send request to Laravel
                 */

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
                            "Request failed."
                        );

                    }

                    return response.json();

                })

                .then(function(data) {

                    if (data.success) {


                        /*
                         * Change every unread
                         * notification to read
                         */

                        document
                            .querySelectorAll(
                                ".notification-item.unread"
                            )
                            .forEach(function(item) {

                                item.classList.remove(
                                    "unread"
                                );

                                item.classList.add(
                                    "read"
                                );


                                /*
                                 * Remove red dot
                                 */

                                const dot =
                                    item.querySelector(
                                        ".unread-dot"
                                    );


                                if (dot) {

                                    dot.remove();

                                }

                            });


                        /*
                         * Set notification count to zero
                         */

                        updateNotificationCount(0);


                        /*
                         * Hide button
                         */

                        markAllRead.style.display =
                            "none";

                    }

                })

                .catch(function(error) {

                    console.error(
                        "Mark all read error:",
                        error
                    );


                    /*
                     * Restore button
                     */

                    markAllRead.disabled =
                        false;

                    markAllRead.textContent =
                        "Mark all as read";

                });

            }
        );

    }


    /* =========================================
       USER PROFILE DROPDOWN
    ========================================= */

    if (userChip) {

        userChip.addEventListener(
            "click",
            function(event) {

                event.stopPropagation();


                /*
                 * Close notification dropdown
                 */

                if (notificationDropdown) {

                    notificationDropdown.classList.remove(
                        "show"
                    );

                }


                if (notificationBtn) {

                    notificationBtn.setAttribute(
                        "aria-expanded",
                        "false"
                    );

                }


                /*
                 * Toggle user dropdown
                 */

                if (userMenu) {

                    userMenu.classList.toggle(
                        "open"
                    );

                }

            }
        );

    }


    /* =========================================
       PREVENT USER DROPDOWN FROM CLOSING
    ========================================= */

    if (userDropdown) {

        userDropdown.addEventListener(
            "click",
            function(event) {

                event.stopPropagation();

            }
        );

    }


    /* =========================================
       CLOSE DROPDOWNS WHEN CLICKING OUTSIDE
    ========================================= */

    document.addEventListener(
        "click",
        function(event) {


            /*
             * Close notification dropdown
             */

            if (notificationDropdown) {

                notificationDropdown.classList.remove(
                    "show"
                );

            }


            if (notificationBtn) {

                notificationBtn.setAttribute(
                    "aria-expanded",
                    "false"
                );

            }


            /*
             * Close user dropdown
             */

            if (userMenu) {

                userMenu.classList.remove(
                    "open"
                );

            }


            /*
             * Close mobile sidebar
             */

            if (
                window.innerWidth <= 860 &&
                sidebar &&
                sidebar.classList.contains("open") &&
                !sidebar.contains(event.target) &&
                event.target !== hamburgerBtn
            ) {

                sidebar.classList.remove("open");

            }

        }
    );


    /* =========================================
       CATEGORY FILTER
    ========================================= */

    function filterCategory(category) {

        selectedCategory =
            category.toLowerCase();


        const buttons =
            document.querySelectorAll(
                ".category-chip"
            );


        buttons.forEach(function(button) {

            button.classList.remove(
                "active"
            );


            if (
                button.textContent
                    .trim()
                    .toLowerCase()
                === selectedCategory
            ) {

                button.classList.add(
                    "active"
                );

            }

        });


        applyFilters();

    }


    /* =========================================
       SEARCH
    ========================================= */

    function searchProducts() {

        applyFilters();

    }


    if (searchBtn) {

        searchBtn.addEventListener(
            "click",
            function() {

                searchProducts();

            }
        );

    }


    if (searchInput) {

        searchInput.addEventListener(
            "input",
            function() {

                searchProducts();

            }
        );


        searchInput.addEventListener(
            "keydown",
            function(event) {

                if (event.key === "Enter") {

                    event.preventDefault();

                    searchProducts();

                }

            }
        );

    }


    /* =========================================
       APPLY SEARCH + CATEGORY
    ========================================= */

    function applyFilters() {

        const cards =
            Array.from(
                document.querySelectorAll(
                    ".market-card"
                )
            );


        const searchText =
            searchInput
                ? searchInput.value
                    .toLowerCase()
                    .trim()
                : "";


        let visibleCount = 0;


        cards.forEach(function(card) {

            const category =
                card.dataset.category || "";

            const name =
                card.dataset.name || "";

            const farmer =
                card.dataset.farmer || "";

            const location =
                card.dataset.location || "";


            const matchesCategory =
                selectedCategory === "all" ||
                category === selectedCategory;


            const matchesSearch =
                searchText === "" ||
                name.includes(searchText) ||
                category.includes(searchText) ||
                farmer.includes(searchText) ||
                location.includes(searchText);


            if (
                matchesCategory &&
                matchesSearch
            ) {

                card.style.display = "";

                visibleCount++;

            } else {

                card.style.display =
                    "none";

            }

        });


        updateEmptyMessage(
            visibleCount
        );

    }


    /* =========================================
       NO RESULTS MESSAGE
    ========================================= */

    function updateEmptyMessage(count) {

        let emptyMessage =
            document.getElementById(
                "filterEmptyState"
            );


        if (count === 0) {

            if (!emptyMessage) {

                emptyMessage =
                    document.createElement(
                        "div"
                    );


                emptyMessage.id =
                    "filterEmptyState";


                emptyMessage.className =
                    "empty-state";


                emptyMessage.innerHTML = `

                    <div>🌾</div>

                    <h3>
                        No products found
                    </h3>

                    <p>
                        Try another category or search for a different product.
                    </p>

                `;


                marketGrid.appendChild(
                    emptyMessage
                );

            }

        } else {

            if (emptyMessage) {

                emptyMessage.remove();

            }

        }

    }


    /* =========================================
       SORT PRODUCTS
    ========================================= */

    if (sortSelect) {

        sortSelect.addEventListener(
            "change",
            function() {

                sortProducts(
                    this.value
                );

            }
        );

    }


    function sortProducts(sortType) {

        const cards =
            Array.from(
                document.querySelectorAll(
                    ".market-card"
                )
            );


        if (sortType === "price-low") {

            cards.sort(function(a, b) {

                return (
                    parseFloat(
                        a.dataset.price
                    ) -
                    parseFloat(
                        b.dataset.price
                    )
                );

            });

        }

        else if (sortType === "price-high") {

            cards.sort(function(a, b) {

                return (
                    parseFloat(
                        b.dataset.price
                    ) -
                    parseFloat(
                        a.dataset.price
                    )
                );

            });

        }

        else if (sortType === "name") {

            cards.sort(function(a, b) {

                return (
                    a.dataset.name || ""
                ).localeCompare(
                    b.dataset.name || ""
                );

            });

        }

        else {

            cards.sort(function(a, b) {

                return (
                    parseInt(
                        a.dataset.originalOrder
                    ) -
                    parseInt(
                        b.dataset.originalOrder
                    )
                );

            });

        }


        cards.forEach(function(card) {

            marketGrid.appendChild(
                card
            );

        });


        applyFilters();

    }


    /* =========================================
       STORE ORIGINAL PRODUCT ORDER
    ========================================= */

    document
        .querySelectorAll(".market-card")
        .forEach(function(card, index) {

            card.dataset.originalOrder =
                index;

        });


    /* =========================================
       FAVORITES
    ========================================= */

    function toggleFav(
        button,
        listingId
    ) {

        fetch(
            "/buyer/favorites/" +
            listingId,
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

            return response.json();

        })

        .then(function(data) {

            if (data.success) {

                const svg =
                    button.querySelector(
                        "svg"
                    );


                if (data.favorited) {

                    button.classList.add(
                        "active"
                    );

                    svg.setAttribute(
                        "fill",
                        "currentColor"
                    );

                } else {

                    button.classList.remove(
                        "active"
                    );

                    svg.setAttribute(
                        "fill",
                        "none"
                    );

                }

            }

        })

        .catch(function(error) {

            console.error(
                "Favorite error:",
                error
            );

        });

    }


    /* =========================================
       VIEW PRODUCT
    ========================================= */

    function viewProduct(id) {

        window.location.href =
            "/buyer/marketplace/" +
            id;

    }


    /* =========================================
       INITIALIZE NOTIFICATION COUNT
    ========================================= */

    updateNotificationCount();


    /* =========================================
       INITIAL FILTER
    ========================================= */

    applyFilters();

</script>

</body>
</html>