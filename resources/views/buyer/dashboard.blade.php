<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <!-- CSRF TOKEN -->
    <meta
        name="csrf-token"
        content="{{ csrf_token() }}"
    >

    <title>AniLink PH - Buyer Dashboard</title>


    <!-- Google Fonts -->

    <link
        rel="preconnect"
        href="https://fonts.googleapis.com"
    >

    <link
        rel="preconnect"
        href="https://fonts.gstatic.com"
        crossorigin
    >

    <link
        href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Fraunces:opsz,wght@9..144,500;9..144,600&display=swap"
        rel="stylesheet"
    >


    <!-- Bootstrap -->

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
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

    --shadow-card:
        0 2px 10px rgba(23, 51, 33, 0.06);
}


* {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
}


body {

    font-family: "Plus Jakarta Sans", sans-serif;

    background: var(--cream);

    color: var(--ink);

    min-height: 100vh;
}


/* =========================================================
   MAIN LAYOUT
========================================================= */

.dashboard-layout {

    display: flex;

    min-height: 100vh;
}


/* =========================================================
   SIDEBAR
========================================================= */

.sidebar {

    width: 264px;

    flex: 0 0 264px;

    background:
        linear-gradient(
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

    z-index: 100;
}


.brand {

    display: flex;

    align-items: center;

    gap: 10px;

    padding: 4px 6px 22px;

    border-bottom:
        1px solid rgba(255,255,255,0.12);

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

    text-decoration: none;

    transition: 0.2s;
}


.navitem svg {

    width: 20px;

    height: 20px;

    flex: 0 0 20px;
}


.navitem:hover {

    background:
        rgba(255,255,255,0.06);

    color: white;
}


.navitem.active {

    background: var(--active-pill);

    color: #12240f;
}


/* =========================================================
   MAIN CONTENT
========================================================= */

.main-content {

    flex: 1;

    min-width: 0;
}


/* =========================================================
   TOPBAR
========================================================= */

.topbar {

    height: 76px;

    background: #ffffff;

    border-bottom:
        1px solid var(--line);

    display: flex;

    align-items: center;

    padding: 0 30px;

    gap: 20px;

    position: sticky;

    top: 0;

    z-index: 50;
}


.menu-btn {

    display: none;

    border: none;

    background: transparent;

    cursor: pointer;

    padding: 6px;
}


.menu-btn svg {

    width: 24px;

    height: 24px;
}


.search-wrapper {

    flex: 1;

    max-width: 620px;

    position: relative;
}


.search-wrapper svg {

    position: absolute;

    left: 15px;

    top: 50%;

    transform:
        translateY(-50%);

    width: 19px;

    height: 19px;

    color: #89958d;
}


.search-wrapper input {

    width: 100%;

    height: 44px;

    border:
        1px solid var(--line);

    border-radius: 12px;

    background: #f8f8f4;

    padding:
        0 16px 0 44px;

    font-family: inherit;

    font-size: 13px;

    outline: none;
}


.search-wrapper input:focus {

    border-color:
        var(--brand-green);

    background: #ffffff;
}


.topbar-right {

    margin-left: auto;

    display: flex;

    align-items: center;

    gap: 18px;
}


/* =========================================================
   NOTIFICATION BELL
========================================================= */

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


/* =========================================================
   PROFILE
========================================================= */

.profile-wrapper {

    position: relative;
}


.profile-chip {

    border: none;

    background: transparent;

    display: flex;

    align-items: center;

    gap: 10px;

    cursor: pointer;

    padding: 6px 8px;

    border-radius: 12px;

    transition: 0.2s;
}


.profile-chip:hover {

    background:
        rgba(95, 156, 63, 0.08);
}


.profile-avatar {

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


.profile-avatar.large {

    width: 44px;

    height: 44px;

    flex-shrink: 0;
}


.profile-info {

    display: flex;

    flex-direction: column;

    align-items: flex-start;

    line-height: 1.3;
}


.profile-info strong {

    font-size: 13px;

    color: #1f2a22;
}


.profile-info span {

    font-size: 11px;

    color: #6c786f;
}


.profile-arrow {

    width: 17px;

    height: 17px;

    color: #5b6b5f;

    transition:
        transform 0.2s ease;
}


.profile-wrapper.open
.profile-arrow {

    transform:
        rotate(180deg);
}


/* =========================================================
   PROFILE DROPDOWN
========================================================= */

.profile-dropdown {

    position: absolute;

    top: calc(100% + 10px);

    right: 0;

    width: 270px;

    background: white;

    border:
        1px solid #e7e3d8;

    border-radius: 16px;

    box-shadow:
        0 12px 35px
        rgba(23, 51, 33, 0.15);

    padding: 10px;

    z-index: 1000;

    opacity: 0;

    visibility: hidden;

    transform:
        translateY(-8px);

    transition:
        all 0.2s ease;
}


.profile-wrapper.open
.profile-dropdown {

    opacity: 1;

    visibility: visible;

    transform:
        translateY(0);
}


.dropdown-user {

    display: flex;

    align-items: center;

    gap: 10px;

    padding: 8px;
}


.dropdown-user strong {

    display: block;

    font-size: 13px;

    color: #1f2a22;

    margin-bottom: 3px;
}


.dropdown-user span {

    display: block;

    font-size: 11px;

    color: #718076;

    max-width: 175px;

    overflow: hidden;

    text-overflow: ellipsis;

    white-space: nowrap;
}


.dropdown-divider {

    height: 1px;

    background: #e7e3d8;

    margin: 8px 0;
}


.dropdown-item {

    width: 100%;

    display: flex;

    align-items: center;

    gap: 11px;

    padding: 11px 10px;

    border: none;

    background: transparent;

    border-radius: 10px;

    text-decoration: none;

    color: #344238;

    font-size: 13px;

    font-weight: 600;

    cursor: pointer;

    text-align: left;

    transition: 0.2s;
}


.dropdown-item:hover {

    background: #f1f6ed;

    color: #3f7d20;
}


.dropdown-item svg {

    width: 19px;

    height: 19px;

    flex-shrink: 0;
}


.logout-item {

    color: #b43d3d;
}


.logout-item:hover {

    background: #fff0f0;

    color: #b43d3d;
}


/* =========================================================
   PAGE
========================================================= */

.page {

    padding: 30px;

    max-width: 1500px;

    margin: auto;
}


/* =========================================================
   WELCOME
========================================================= */

.welcome-card {

    background:
        linear-gradient(
            135deg,
            #e8f2df,
            #f5f8ef
        );

    border-radius: var(--radius-lg);

    padding: 30px;

    display: flex;

    align-items: center;

    justify-content: space-between;

    overflow: hidden;

    margin-bottom: 25px;
}


.welcome-text {

    max-width: 620px;
}


.welcome-text h1 {

    font-family: "Fraunces", serif;

    font-size: 32px;

    margin-bottom: 8px;

    color: #23442b;
}


.welcome-text h2 {

    font-size: 18px;

    font-weight: 700;

    margin-bottom: 8px;

    color: #2f4d35;
}


.welcome-text p {

    font-size: 13px;

    color: var(--ink-soft);

    line-height: 1.7;

    margin: 0;
}


.welcome-image {

    width: 260px;

    height: 150px;

    border-radius: 18px;

    object-fit: cover;

    margin-left: 20px;
}


/* =========================================================
   SECTION HEADER
========================================================= */

.section-header {

    display: flex;

    align-items: center;

    justify-content: space-between;

    margin-bottom: 15px;
}


.section-header h2 {

    font-family: "Fraunces", serif;

    font-size: 23px;

    color: #294731;

    margin: 0;
}


.view-all {

    color: #5f9c3f;

    font-size: 13px;

    font-weight: 700;

    text-decoration: none;
}


.view-all:hover {

    color: #3f7d20;
}


/* =========================================================
   STATS
========================================================= */

.stats-grid {

    display: grid;

    grid-template-columns:
        repeat(3, 1fr);

    gap: 18px;

    margin-bottom: 30px;
}


.stat-card {

    background: var(--card);

    border:
        1px solid var(--line);

    border-radius: 16px;

    padding: 20px;

    box-shadow: var(--shadow-card);

    display: flex;

    align-items: center;

    gap: 15px;
}


.stat-icon {

    width: 48px;

    height: 48px;

    border-radius: 14px;

    background:
        var(--brand-green-soft);

    display: flex;

    align-items: center;

    justify-content: center;
}


.stat-icon svg {

    width: 23px;

    height: 23px;

    color:
        var(--brand-green);
}


.stat-number {

    font-size: 24px;

    font-weight: 800;

    color: #23382a;
}


.stat-label {

    font-size: 12px;

    color: var(--ink-soft);

    margin-top: 2px;
}


/* =========================================================
   PRODUCTS
========================================================= */

.products-grid {

    display: grid;

    grid-template-columns:
        repeat(5, 1fr);

    gap: 18px;

    margin-bottom: 35px;
}


.product-card {

    background: white;

    border:
        1px solid var(--line);

    border-radius: 17px;

    overflow: hidden;

    box-shadow:
        var(--shadow-card);

    transition:
        transform 0.2s,
        box-shadow 0.2s;
}


.product-card:hover {

    transform:
        translateY(-3px);

    box-shadow:
        0 8px 25px
        rgba(23, 51, 33, 0.10);
}


.product-image {

    width: 100%;

    height: 155px;

    object-fit: cover;
}


.product-body {

    padding: 15px;
}


.product-name {

    font-size: 14px;

    font-weight: 800;

    color: #263b2c;

    margin-bottom: 5px;
}


.product-location {

    font-size: 11px;

    color: #7a867e;

    margin-bottom: 10px;
}


.product-bottom {

    display: flex;

    align-items: center;

    justify-content: space-between;

    gap: 3px;

    margin-top: 14px;

    padding-top: 13px;

    margin-left: -4px;

    border-top:
        1px solid #edf0e9;
}


.product-price {

    color: #3f7d20;

    font-size: 8px;

    font-weight: 800;

    line-height: 1.2;
}


.product-rating {

    background: #f4f8ef;

    color: #4f694f;

    padding: 6px 9px;

    border-radius: 8px;

    font-size: 10px;

    font-weight: 700;

    white-space: nowrap;
}


/* =========================================================
   ORDERS
========================================================= */

.orders-card {

    background: white;

    border:
        1px solid var(--line);

    border-radius: 18px;

    overflow: hidden;

    box-shadow:
        var(--shadow-card);
}


.table-responsive {

    overflow-x: auto;
}


.orders-table {

    width: 100%;

    border-collapse: collapse;

    min-width: 700px;
}


.orders-table th {

    background: #f7f8f3;

    padding: 14px 18px;

    text-align: left;

    font-size: 11px;

    text-transform: uppercase;

    letter-spacing: 0.5px;

    color: #6d7a70;

    font-weight: 800;
}


.orders-table td {

    padding: 17px 18px;

    border-top:
        1px solid #eeeae1;

    font-size: 12px;

    color: #455248;
}


.order-id {

    font-weight: 800;

    color: #315738;
}


.order-product {

    font-weight: 700;

    color: #293d2e;
}


.status {

    display: inline-flex;

    align-items: center;

    padding: 5px 10px;

    border-radius: 999px;

    font-size: 10px;

    font-weight: 800;
}


.status.delivered {

    background: #e4f2dc;

    color: #3e782a;
}


.status.pending {

    background: #fff1d5;

    color: #9a6a15;
}


.status.processing {

    background: #e0edf8;

    color: #32648b;
}


/* =========================================================
   MOBILE
========================================================= */

.sidebar-overlay {

    display: none;
}


@media (max-width: 1100px) {

    .products-grid {

        grid-template-columns:
            repeat(3, 1fr);
    }
}


@media (max-width: 860px) {

    .sidebar {

        position: fixed;

        left: -280px;

        top: 0;

        transition:
            left 0.2s ease;

        z-index: 1000;
    }


    .sidebar.open {

        left: 0;

        box-shadow:
            10px 0 30px
            rgba(0,0,0,0.25);
    }


    .sidebar-overlay {

        position: fixed;

        inset: 0;

        background:
            rgba(0,0,0,0.35);

        z-index: 900;
    }


    .sidebar-overlay.show {

        display: block;
    }


    .menu-btn {

        display: flex;
    }


    .main-content {

        width: 100%;
    }


    .stats-grid {

        grid-template-columns: 1fr;
    }


    .products-grid {

        grid-template-columns:
            repeat(2, 1fr);
    }


    .welcome-card {

        align-items: flex-start;
    }


    .welcome-image {

        width: 55%;
    }


    .page {

        padding: 22px;
    }
}


@media (max-width: 600px) {

    .topbar {

        padding: 0 15px;

        gap: 10px;
    }


    .search-wrapper {

        display: none;
    }


    .profile-info,
    .profile-arrow {

        display: none;
    }


    .topbar-right {

        gap: 8px;
    }


    .notification-dropdown {

        width: 320px;

        right: -55px;
    }


    .welcome-card {

        flex-direction: column;

        padding: 22px;
    }


    .welcome-text h1 {

        font-size: 27px;
    }


    .welcome-image {

        width: 100%;

        height: 180px;

        margin: 18px 0 0;
    }


    .products-grid {

        grid-template-columns: 1fr;
    }


    .product-image {

        height: 190px;
    }


    .page {

        padding: 15px;
    }
}

</style>

</head>


<body>


<div class="dashboard-layout">


<!-- =====================================================
     SIDEBAR
===================================================== -->

<aside
    class="sidebar"
    id="sidebar"
>

    <div class="brand">

        <div class="brand-mark">
            🌾
        </div>

        <div>

            <div class="brand-name">
                AniLink PH
            </div>

            <div class="brand-tag">
                Farmer-to-Buyer Marketplace
            </div>

        </div>

    </div>


    <nav class="navlist">


        <a
            href="/buyer/dashboard"
            class="navitem active"
        >

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

            <span>
                Dashboard
            </span>

        </a>


        <a
            href="/buyer/marketplace"
            class="navitem"
        >

            <svg
                viewBox="0 0 24 24"
                fill="none"
                stroke="currentColor"
                stroke-width="2"
            >

                <path d="M4 8h16l-1.5 11a2 2 0 0 1-2 1.8H7.5a2 2 0 0 1-2-1.8L4 8Z"/>

                <path d="M8 8V6a4 4 0 0 1 8 0v2"/>

            </svg>

            <span>
                Marketplace
            </span>

        </a>


        <a
            href="/buyer/my-orders"
            class="navitem"
        >

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

            <span>
                My Orders
            </span>

        </a>


        <a
            href="/buyer/favorites"
            class="navitem"
        >

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

            <span>
                Favorites
            </span>

        </a>


        <a
            href="/buyer/messages"
            class="navitem"
        >

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

            <span>
                Messages
            </span>

        </a>

    </nav>

</aside>


<!-- MOBILE OVERLAY -->

<div
    class="sidebar-overlay"
    id="sidebarOverlay"
></div>


<!-- =====================================================
     MAIN
===================================================== -->

<main class="main-content">


<header class="topbar">


<!-- HAMBURGER -->

<button
    class="menu-btn"
    id="menuBtn"
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


<!-- SEARCH -->

<div class="search-wrapper">

    <svg
        viewBox="0 0 24 24"
        fill="none"
        stroke="currentColor"
        stroke-width="2"
        stroke-linecap="round"
        stroke-linejoin="round"
    >

        <circle
            cx="11"
            cy="11"
            r="7"
        />

        <path d="m20 20-4-4"/>

    </svg>


    <input
        type="text"
        placeholder="Search for produce, farmers, or categories..."
    >

</div>


<div class="topbar-right">


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


<!-- =================================================
     PROFILE
================================================= -->

<div
    class="profile-wrapper"
    id="profileWrapper"
>


<button
    class="profile-chip"
    id="profileBtn"
    type="button"
>


<div class="profile-avatar">

    {{ strtoupper(substr(Auth::user()->first_name, 0, 1)) }}{{ strtoupper(substr(Auth::user()->last_name, 0, 1)) }}

</div>


<div class="profile-info">

    <strong>

        {{ Auth::user()->first_name }}
        {{ Auth::user()->last_name }}

    </strong>


    <span>

        {{ ucfirst(Auth::user()->role) }}

    </span>

</div>


<svg
    class="profile-arrow"
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


<div
    class="profile-dropdown"
    id="profileDropdown"
>


<div class="dropdown-user">


<div class="profile-avatar large">

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


<div class="dropdown-divider"></div>


<a
    href="{{ route('buyer.profile') }}"
    class="dropdown-item"
>

<svg
    viewBox="0 0 24 24"
    fill="none"
    stroke="currentColor"
    stroke-width="2"
>

    <path d="M20 21a8 8 0 0 0-16 0"/>

    <circle
        cx="12"
        cy="7"
        r="4"
    />

</svg>


<span>
    My Profile
</span>

</a>


<a
    href="/buyer/settings"
    class="dropdown-item"
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

    <path d="M19.4 15a1.7 1.7 0 0 0 .3 1.9l.1.1-1.8 1.8-.1-.1a1.7 1.7 0 0 0-1.9-.3 1.7 1.7 0 0 0-1 1.5V20h-2.6v-.1a1.7 1.7 0 0 0-1-1.5 1.7 1.7 0 0 0-1.9.3l-.1.1-1.8-1.8.1-.1A1.7 1.7 0 0 0 8 15a1.7 1.7 0 0 0-1.5-1H6v-2.6h.1a1.7 1.7 0 0 0 1.5-1 1.7 1.7 0 0 0-.3-1.9l-.1-.1L9 6.6l.1.1a1.7 1.7 0 0 0 1.9.3 1.7 1.7 0 0 0 1-1.5V5h2.6v.1a1.7 1.7 0 0 0 1 1.5 1.7 1.7 0 0 0 1.9-.3l.1-.1 1.8 1.8-.1.1a1.7 1.7 0 0 0-.3 1.9 1.7 1.7 0 0 0 1.5 1h.1V14h-.1a1.7 1.7 0 0 0-1.5 1z"/>

</svg>


<span>
    Settings
</span>

</a>


<div class="dropdown-divider"></div>


<form
    action="{{ route('logout') }}"
    method="POST"
    class="m-0"
>

    @csrf


    <button
        type="submit"
        class="dropdown-item logout-item"
    >

        <svg
            viewBox="0 0 24 24"
            fill="none"
            stroke="currentColor"
            stroke-width="2"
        >

            <path
                d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"
            />

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

</header>


<!-- =================================================
     PAGE
================================================= -->

<div class="page">


<!-- WELCOME -->

<section class="welcome-card">


<div class="welcome-text">

    <h1>
        Hello
    </h1>


    <h2>

        {{ Auth::user()->first_name }}! 🌱

    </h2>


    <p>

        Discover fresh products directly from local farmers
        and support your community.

    </p>

</div>


<img
    class="welcome-image"
    src="https://images.unsplash.com/photo-1542838132-92c53300491e?auto=format&fit=crop&w=700&q=80"
    alt="Fresh vegetables"
>


</section>


<!-- =================================================
     STATISTICS
================================================= -->

<div class="stats-grid">


<div class="stat-card">

    <div class="stat-icon">

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

            <path
                d="M8 7V5a4 4 0 0 1 8 0v2"
            />

        </svg>

    </div>


    <div>

        <div class="stat-number">
            3
        </div>

        <div class="stat-label">
            Active Orders
        </div>

    </div>

</div>


<div class="stat-card">

    <div class="stat-icon">

        <svg
            viewBox="0 0 24 24"
            fill="none"
            stroke="currentColor"
            stroke-width="2"
        >

            <path d="M12 21s-7.5-4.6-10-9.2C.3 8.1 2 4.5 5.5 4A5.4 5.4 0 0 1 12 7a5.4 5.4 0 0 1 6.5-3C22 4.5 23.7 8.1 22 11.8 19.5 16.4 12 21 12 21Z"/>

        </svg>

    </div>


    <div>

        <div class="stat-number">
            12
        </div>

        <div class="stat-label">
            Favorites
        </div>

    </div>

</div>


<div class="stat-card">

    <div class="stat-icon">

        <svg
            viewBox="0 0 24 24"
            fill="none"
            stroke="currentColor"
            stroke-width="2"
        >

            <path d="M3 7h11v10H3z"/>

            <path d="M14 10h4l3 3v4h-7z"/>

            <circle
                cx="7"
                cy="19"
                r="2"
            />

            <circle
                cx="18"
                cy="19"
                r="2"
            />

        </svg>

    </div>


    <div>

        <div class="stat-number">
            2
        </div>

        <div class="stat-label">
            Pending Deliveries
        </div>

    </div>

</div>


</div>


<!-- =================================================
     RECOMMENDED HARVESTS
================================================= -->

<div class="section-header">

    <h2>
        Recommended Harvests
    </h2>


    <a
        href="{{ route('buyer.marketplace') }}"
        class="view-all"
    >

        View Marketplace →

    </a>

</div>


<div class="products-grid">


@forelse($listings as $listing)


<div class="product-card">


@if($listing->image)


<img
    class="product-image"
    src="{{ asset('storage/' . $listing->image) }}"
    alt="{{ $listing->product_name }}"
>


@else


<div
    class="product-image"
    style="
        display:flex;
        align-items:center;
        justify-content:center;
        background:#e8f2df;
        font-size:50px;
    "
>

    🌾

</div>


@endif


<div class="product-body">


<div class="product-name">

    {{ $listing->product_name }}

</div>


<div class="product-location">

    📍
    {{ $listing->farmer->address ?? 'Location not provided' }}

</div>


<div class="product-bottom">


<span class="product-price">

    ₱{{ number_format($listing->price, 2) }}/{{ $listing->unit }}

</span>


<span class="product-rating">

    Available:
    {{ $listing->quantity }}
    {{ $listing->unit }}

</span>


</div>

</div>

</div>


@empty


<div
    style="
        grid-column:1 / -1;
        text-align:center;
        padding:40px;
    "
>

    <h3>
        No harvest listings available
    </h3>


    <p>
        Farmers haven't added any available harvests yet.
    </p>

</div>


@endforelse


</div>


<!-- =================================================
     RECENT ORDERS
================================================= -->

<div class="section-header">

    <h2>
        Recent Orders
    </h2>


    <a
        href="/buyer/my-orders"
        class="view-all"
    >

        View All →

    </a>

</div>


<div class="orders-card">


<div class="table-responsive">


<table class="orders-table">


<thead>

<tr>

    <th>
        Order
    </th>

    <th>
        Product
    </th>

    <th>
        Farmer
    </th>

    <th>
        Date
    </th>

    <th>
        Total
    </th>

    <th>
        Status
    </th>

</tr>

</thead>


<tbody>


<tr>

    <td class="order-id">
        #ANL-1001
    </td>

    <td class="order-product">
        Fresh Tomatoes
    </td>

    <td>
        Juan's Farm
    </td>

    <td>
        Sept 15, 2026
    </td>

    <td>
        ₱240
    </td>

    <td>

        <span class="status delivered">
            Delivered
        </span>

    </td>

</tr>


<tr>

    <td class="order-id">
        #ANL-1002
    </td>

    <td class="order-product">
        Premium White Rice
    </td>

    <td>
        Green Valley Farm
    </td>

    <td>
        Sept 16, 2026
    </td>

    <td>
        ₱550
    </td>

    <td>

        <span class="status pending">
            Pending
        </span>

    </td>

</tr>


<tr>

    <td class="order-id">
        #ANL-1003
    </td>

    <td class="order-product">
        Sweet Corn
    </td>

    <td>
        Sunrise Farm
    </td>

    <td>
        Sept 17, 2026
    </td>

    <td>
        ₱325
    </td>

    <td>

        <span class="status processing">
            Processing
        </span>

    </td>

</tr>


</tbody>

</table>

</div>

</div>


</div>

</main>

</div>


<!-- =====================================================
     JAVASCRIPT
===================================================== -->

<script>

document.addEventListener(
    "DOMContentLoaded",
    function () {


    /* =================================================
       SIDEBAR
    ================================================= */

    const menuBtn =
        document.getElementById(
            "menuBtn"
        );


    const sidebar =
        document.getElementById(
            "sidebar"
        );


    const sidebarOverlay =
        document.getElementById(
            "sidebarOverlay"
        );


    if (menuBtn) {

        menuBtn.addEventListener(
            "click",
            function () {

                sidebar.classList.toggle(
                    "open"
                );

                sidebarOverlay.classList.toggle(
                    "show"
                );

            }
        );

    }


    if (sidebarOverlay) {

        sidebarOverlay.addEventListener(
            "click",
            function () {

                sidebar.classList.remove(
                    "open"
                );

                sidebarOverlay.classList.remove(
                    "show"
                );

            }
        );

    }


    /* =================================================
       PROFILE
    ================================================= */

    const profileWrapper =
        document.getElementById(
            "profileWrapper"
        );


    const profileBtn =
        document.getElementById(
            "profileBtn"
        );


    const profileDropdown =
        document.getElementById(
            "profileDropdown"
        );


    /* =================================================
       NOTIFICATIONS
    ================================================= */

    const notificationWrapper =
        document.getElementById(
            "notificationWrapper"
        );


    const notificationBtn =
        document.getElementById(
            "notificationBtn"
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


    /* =================================================
       CSRF TOKEN
    ================================================= */

    const csrfToken =
        document
            .querySelector(
                'meta[name="csrf-token"]'
            )
            .getAttribute(
                "content"
            );


    /* =================================================
       UPDATE NOTIFICATION COUNT
    ================================================= */

    function updateNotificationCount(
        count = null
    ) {


        /*
        | If Laravel gives us a count,
        | use that.
        |
        | Otherwise count unread items
        | currently displayed.
        */

        if (count === null) {

            count =
                document
                    .querySelectorAll(
                        ".notification-item.unread"
                    )
                    .length;

        }


        /*
        | Update red badge
        */

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


        /*
        | Update summary text
        */

        updateNotificationSummary(
            count
        );

    }


    /* =================================================
       UPDATE SUMMARY
    ================================================= */

    function updateNotificationSummary(
        count
    ) {


        if (!notificationSummary) {
            return;
        }


        if (count <= 0) {

            notificationSummary.textContent =
                "You're all caught up";

        } else {

            notificationSummary.textContent =
                count +
                " unread" +
                (count === 1
                    ? ""
                    : "");

        }

    }


    /* =================================================
       OPEN NOTIFICATION DROPDOWN
    ================================================= */

    if (
        notificationBtn &&
        notificationDropdown
    ) {

        notificationBtn.addEventListener(
            "click",
            function (event) {

                event.stopPropagation();


                const willOpen =
                    !notificationDropdown
                        .classList
                        .contains("show");


                /*
                | Close profile
                */

                if (profileWrapper) {

                    profileWrapper.classList.remove(
                        "open"
                    );

                }


                /*
                | Open notification dropdown
                */

                notificationDropdown
                    .classList
                    .toggle(
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


    /* =================================================
       KEEP NOTIFICATION OPEN
    ================================================= */

    if (notificationDropdown) {

        notificationDropdown.addEventListener(
            "click",
            function (event) {

                event.stopPropagation();

            }
        );

    }


    /* =================================================
       MARK ONE NOTIFICATION AS READ
    ================================================= */

    document
        .querySelectorAll(
            ".notification-item.unread"
        )
        .forEach(
            function (item) {


            item.addEventListener(
                "click",
                function () {


                    const notificationItem =
                        this;


                    const notificationId =
                        notificationItem
                            .dataset
                            .notificationId;


                    /*
                    | Prevent duplicate request
                    */

                    if (
                        notificationItem.dataset
                            .processing === "true"
                    ) {

                        return;

                    }


                    notificationItem.dataset
                        .processing = "true";


                    /*
                    | Send request to Laravel
                    */

                    fetch(
                        `/buyer/notifications/${notificationId}/read`,
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


                    .then(
                        response => {

                            if (
                                !response.ok
                            ) {

                                throw new Error(
                                    "Request failed."
                                );

                            }

                            return response.json();

                        }
                    )


                    .then(
                        data => {


                            if (
                                data.success
                            ) {


                                /*
                                | Change UI
                                */

                                notificationItem
                                    .classList
                                    .remove(
                                        "unread"
                                    );


                                notificationItem
                                    .classList
                                    .add(
                                        "read"
                                    );


                                /*
                                | Remove green dot
                                */

                                const unreadDot =
                                    notificationItem
                                        .querySelector(
                                            ".unread-dot"
                                        );


                                if (
                                    unreadDot
                                ) {

                                    unreadDot.remove();

                                }


                                /*
                                | Update badge
                                */

                                updateNotificationCount(
                                    data.unreadCount
                                );

                            }

                        }
                    )


                    .catch(
                        error => {

                            console.error(
                                "Notification error:",
                                error
                            );

                        }
                    )


                    .finally(
                        () => {

                            notificationItem
                                .dataset
                                .processing = "false";

                        }
                    );

                }
            );

        });


    /* =================================================
       MARK ALL NOTIFICATIONS AS READ
    ================================================= */

    if (markAllRead) {

        markAllRead.addEventListener(
            "click",
            function (event) {


                event.stopPropagation();


                /*
                | Disable button while processing
                */

                markAllRead.disabled =
                    true;


                markAllRead.textContent =
                    "Updating...";


                /*
                | Send request to Laravel
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


                .then(
                    response => {

                        if (
                            !response.ok
                        ) {

                            throw new Error(
                                "Request failed."
                            );

                        }

                        return response.json();

                    }
                )


                .then(
                    data => {


                        if (
                            data.success
                        ) {


                            /*
                            | Change every unread
                            | notification to read
                            */

                            document
                                .querySelectorAll(
                                    ".notification-item.unread"
                                )
                                .forEach(
                                    function (
                                        item
                                    ) {


                                    item.classList
                                        .remove(
                                            "unread"
                                        );


                                    item.classList
                                        .add(
                                            "read"
                                        );


                                    /*
                                    | Remove green dot
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
                            | Update counter
                            */

                            updateNotificationCount(
                                0
                            );


                            /*
                            | Hide button
                            */

                            markAllRead.style.display =
                                "none";

                        }

                    }
                )


                .catch(
                    error => {

                        console.error(
                            "Mark all read error:",
                            error
                        );


                        /*
                        | Restore button
                        */

                        markAllRead.disabled =
                            false;

                        markAllRead.textContent =
                            "Mark all as read";

                    }
                );

            }
        );

    }


    /* =================================================
       PROFILE DROPDOWN
    ================================================= */

    if (
        profileBtn &&
        profileWrapper
    ) {

        profileBtn.addEventListener(
            "click",
            function (event) {

                event.stopPropagation();


                /*
                | Close notifications
                */

                if (
                    notificationDropdown
                ) {

                    notificationDropdown
                        .classList
                        .remove(
                            "show"
                        );

                }


                if (
                    notificationBtn
                ) {

                    notificationBtn.setAttribute(
                        "aria-expanded",
                        "false"
                    );

                }


                /*
                | Toggle profile
                */

                profileWrapper.classList.toggle(
                    "open"
                );

            }
        );

    }


    /* =================================================
       KEEP PROFILE OPEN
    ================================================= */

    if (profileDropdown) {

        profileDropdown.addEventListener(
            "click",
            function (event) {

                event.stopPropagation();

            }
        );

    }


    /* =================================================
       CLICK OUTSIDE
    ================================================= */

    document.addEventListener(
        "click",
        function () {


            /*
            | Close notifications
            */

            if (
                notificationDropdown
            ) {

                notificationDropdown
                    .classList
                    .remove(
                        "show"
                    );

            }


            if (
                notificationBtn
            ) {

                notificationBtn.setAttribute(
                    "aria-expanded",
                    "false"
                );

            }


            /*
            | Close profile
            */

            if (
                profileWrapper
            ) {

                profileWrapper.classList.remove(
                    "open"
                );

            }

        }
    );


    /* =================================================
       MOBILE NAVIGATION
    ================================================= */

    document
        .querySelectorAll(
            ".navitem"
        )
        .forEach(
            function (item) {

                item.addEventListener(
                    "click",
                    function () {


                        if (
                            window.innerWidth <= 860
                        ) {


                            sidebar.classList
                                .remove(
                                    "open"
                                );


                            sidebarOverlay.classList
                                .remove(
                                    "show"
                                );

                        }

                    }
                );

            }
        );


    /* =================================================
       INITIAL COUNT
    ================================================= */

    updateNotificationCount();


});

</script>


</body>

</html>
