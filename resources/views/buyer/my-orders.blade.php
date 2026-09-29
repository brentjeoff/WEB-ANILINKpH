<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>AniLink — My Orders</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link
        href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Fraunces:opsz,wght@9..144,500;9..144,600&display=swap"
        rel="stylesheet"
    >

    
@php
 
    /*
    | Use what the controller passes. If it passes nothing,
    | load the buyer's notifications here so the bell is
    | never empty by accident.
    |
    | ADJUST if needed: model name and the user column.
    */
 
    if (!isset($notifications)) {
 
        try {
 
            $notifications = \App\Models\Notification::where('user_id', Auth::id())
                ->latest()
                ->take(20)
                ->get();
 
        } catch (\Throwable $e) {
 
            // Shows the real reason in storage/logs/laravel.log
            report($e);
 
            $notifications = collect();
 
        }
 
    }
 
    $notificationCount = $notificationCount
        ?? collect($notifications)->whereNull('read_at')->count();
 
@endphp
 


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

            --yellow-bg: #fdecb0;
            --yellow-ink: #a9790b;

            --blue-bg: #cfe3fb;
            --blue-ink: #2461c2;

            --red: #d1483f;
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


        h1 {
            font-family: "Fraunces", serif;
        }


        a {
            color: inherit;
            text-decoration: none;
        }


        button {
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
        }


        .brand {
            display: flex;
            align-items: center;

            gap: 10px;

            padding: 4px 6px 22px;

            border-bottom:
                1px solid rgba(255, 255, 255, 0.12);

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
            flex: 0 0 20px;

            width: 20px;
            height: 20px;
        }


        .navitem:hover {
            background: rgba(255, 255, 255, 0.06);
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

            padding: 22px 32px 48px;
        }


        /* =========================================
           TOPBAR
        ========================================= */

        .topbar {
            display: flex;

            align-items: center;

            gap: 16px;

            margin-bottom: 22px;
        }


        .hamburger {
            width: 40px;
            height: 40px;

            border-radius: 10px;

            display: flex;

            align-items: center;
            justify-content: center;

            background: var(--card);

            border: 1px solid var(--line);

            cursor: pointer;

            flex: 0 0 auto;
        }


        .searchbar {
            flex: 1 1 auto;

            display: flex;

            align-items: center;

            background: var(--card);

            border: 1px solid var(--line);

            border-radius: 12px;

            padding: 4px;

            max-width: 720px;
        }


        .searchbar input {
            flex: 1;

            border: none;

            outline: none;

            background: transparent;

            padding: 10px 14px;

            font-size: 14.5px;

            color: var(--ink);
        }


        .searchbar button {
            background: var(--brand-green);

            color: white;

            border: none;

            border-radius: 9px;

            width: 40px;
            height: 40px;

            display: flex;

            align-items: center;
            justify-content: center;

            cursor: pointer;
        }


        .top-actions {
            display: flex;

            align-items: center;

            gap: 18px;

            flex: 0 0 auto;

            margin-left: auto;
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
                0 10px 30px rgba(0, 0, 0, 0.12);

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


        .mark-all-btn:disabled {
            opacity: 0.6;

            cursor: wait;

            text-decoration: none;
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

            padding-right: 10px;
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

            transition: 0.2s;
        }


        .user-chip:hover {
            background: rgba(95, 156, 63, 0.08);
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
            font-weight: 700;

            font-size: 14px;

            line-height: 1.2;

            text-align: left;
        }


        .user-role {
            font-size: 12px;

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


        /* =========================================
           PROFILE DROPDOWN
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

            box-shadow:
                0 12px 35px rgba(23, 51, 33, 0.15);

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
            margin: 0 0 4px;

            font-size: 26px;

            font-weight: 600;
        }


        .pagehead p {
            margin: 0;

            color: var(--ink-soft);

            font-size: 14px;
        }


        /* =========================================
           TABS
        ========================================= */

        .tab-row {
            display: flex;

            gap: 6px;

            background: var(--card);

            border: 1px solid var(--line);

            border-radius: 12px;

            padding: 5px;

            width: fit-content;

            margin-bottom: 20px;
        }


        .tab-btn {
            padding: 9px 18px;

            border-radius: 9px;

            border: none;

            background: transparent;

            font-weight: 700;

            font-size: 13px;

            color: var(--ink-soft);

            cursor: pointer;
        }


        .tab-btn.active {
            background: var(--brand-green);

            color: white;
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


        .order-card {
            padding: 20px 22px;

            margin-bottom: 14px;
        }


        .order-top {
            display: flex;

            align-items: flex-start;

            justify-content: space-between;

            flex-wrap: wrap;

            gap: 10px;
        }


        .order-id {
            font-weight: 800;

            font-size: 14.5px;
        }


        .order-date {
            font-size: 12px;

            color: var(--ink-soft);

            margin-top: 2px;
        }


        /* =========================================
           STATUS
        ========================================= */

        .status-badge {
            padding: 6px 12px;

            border-radius: 999px;

            font-size: 11.5px;

            font-weight: 800;
        }


        .status-shipped {
            background: var(--blue-bg);

            color: var(--blue-ink);
        }


        .status-confirmed {
            background: var(--yellow-bg);

            color: var(--yellow-ink);
        }


        .status-delivered {
            background: var(--brand-green-soft);

            color: var(--brand-green);
        }


        .status-cancelled {
            background: #f6d9d6;

            color: var(--red);
        }


        /* =========================================
           ITEMS
        ========================================= */

        .order-items {
            display: flex;

            gap: 10px;

            margin: 14px 0;

            flex-wrap: wrap;
        }


        .order-thumb {
            width: 46px;
            height: 46px;

            border-radius: 10px;

            display: flex;

            align-items: center;
            justify-content: center;

            font-size: 22px;

            background: var(--brand-green-soft);

            overflow: hidden;
        }


        .order-thumb img {
            width: 100%;
            height: 100%;

            object-fit: cover;

            border-radius: 10px;
        }


        /* =========================================
           PROGRESS
        ========================================= */

        .progress {
            display: flex;

            align-items: center;

            gap: 0;

            margin-top: 14px;
        }


        .progress-step {
            display: flex;

            flex-direction: column;

            align-items: center;

            flex: 1;

            position: relative;
        }


        .progress-dot {
            width: 11px;
            height: 11px;

            border-radius: 50%;

            background: var(--line);

            z-index: 1;
        }


        .progress-step.done .progress-dot {
            background: var(--brand-green);
        }


        .progress-line {
            position: absolute;

            top: 5px;

            left: 50%;

            width: 100%;

            height: 2px;

            background: var(--line);

            z-index: 0;
        }


        .progress-step.done .progress-line {
            background: var(--brand-green);
        }


        .progress-step:last-child .progress-line {
            display: none;
        }


        .progress-label {
            font-size: 10.5px;

            color: var(--ink-soft);

            margin-top: 6px;

            text-align: center;
        }


        .progress-step.done .progress-label {
            color: var(--ink);

            font-weight: 700;
        }


        /* =========================================
           ORDER BOTTOM
        ========================================= */

        .order-mid {
            display: flex;

            align-items: center;

            justify-content: space-between;

            flex-wrap: wrap;

            gap: 14px;

            padding-top: 12px;

            border-top: 1px solid var(--line);
        }


        .order-farmer {
            font-size: 13px;

            color: var(--ink-soft);
        }


        .order-farmer b {
            color: var(--ink);
        }


        .order-total {
            font-weight: 800;

            font-size: 15px;
        }


        .ghost-btn {
            background: transparent;

            color: var(--ink);

            border: 1px solid var(--line);

            padding: 9px 16px;

            border-radius: 10px;

            font-weight: 700;

            font-size: 13.5px;

            cursor: pointer;

            transition: 0.2s;
        }


        .ghost-btn:hover {
            border-color: var(--brand-green);

            color: var(--brand-green);
        }


        /* =========================================
           REVIEWS
        ========================================= */

        .review-btn {
            background: var(--brand-green);

            color: white;

            border: none;

            padding: 9px 16px;

            border-radius: 10px;

            font-weight: 700;

            font-size: 13.5px;

            cursor: pointer;

            transition: 0.2s;
        }


        .review-btn:hover {
            background: #4d8633;

            transform: translateY(-1px);
        }


        .reviewed-btn {
            background: var(--brand-green-soft);

            color: var(--brand-green);

            border: 1px solid #cfe4c2;

            padding: 9px 16px;

            border-radius: 10px;

            font-weight: 700;

            font-size: 13.5px;
        }


        .review-modal {
            position: fixed;

            inset: 0;

            background: rgba(23, 51, 33, 0.55);

            display: none;

            align-items: center;

            justify-content: center;

            padding: 20px;

            z-index: 99999;
        }


        .review-modal.show {
            display: flex;
        }


        .review-box {
            width: 100%;

            max-width: 480px;

            background: white;

            border-radius: 20px;

            padding: 26px;

            box-shadow:
                0 20px 60px rgba(0, 0, 0, 0.2);

            position: relative;
        }


        .review-header {
            display: flex;

            justify-content: space-between;

            align-items: center;

            margin-bottom: 8px;
        }


        .review-header h2 {
            margin: 0;

            font-family: "Fraunces", serif;

            font-size: 23px;
        }


        .review-close {
            width: 34px;
            height: 34px;

            border: none;

            background: #f1f3ee;

            border-radius: 50%;

            cursor: pointer;

            font-size: 20px;

            color: var(--ink-soft);
        }


        .review-product {
            color: var(--ink-soft);

            font-size: 13px;

            margin-bottom: 20px;
        }


        .star-rating {
            display: flex;

            gap: 6px;

            margin: 8px 0 20px;
        }


        .star-rating button {
            border: none;

            background: transparent;

            font-size: 34px;

            color: #d8d8d8;

            cursor: pointer;

            padding: 0;

            line-height: 1;

            transition: 0.15s;
        }


        .star-rating button.active,
        .star-rating button:hover {
            color: #e7ad28;
        }


        .review-label {
            display: block;

            font-size: 13px;

            font-weight: 700;

            margin-bottom: 7px;
        }


        .review-textarea {
            width: 100%;

            min-height: 110px;

            resize: vertical;

            border: 1px solid var(--line);

            border-radius: 12px;

            padding: 12px;

            font-family: inherit;

            font-size: 13.5px;

            outline: none;
        }


        .review-textarea:focus {
            border-color: var(--brand-green);
        }


        .review-submit {
            width: 100%;

            margin-top: 16px;

            padding: 12px;

            border: none;

            border-radius: 11px;

            background: var(--brand-green);

            color: white;

            font-family: inherit;

            font-weight: 800;

            cursor: pointer;
        }


        .review-submit:hover {
            background: #4d8633;
        }


        /* =========================================
           ALERTS
        ========================================= */

        .alert-message {
            padding: 12px 16px;

            border-radius: 12px;

            margin-bottom: 16px;

            font-size: 13px;

            font-weight: 600;
        }


        .alert-success {
            background: var(--brand-green-soft);

            color: #3f7d20;

            border: 1px solid #cfe4c2;
        }


        .alert-error {
            background: #fff0f0;

            color: #b43d3d;

            border: 1px solid #f1cccc;
        }


        /* =========================================
           RESPONSIVE
        ========================================= */

        @media (max-width: 860px) {

            .sidebar {
                position: fixed;

                left: -280px;

                z-index: 40;

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

            .user-name,
            .user-role {
                display: none;
            }


            .searchbar {
                max-width: none;
            }


            .topbar {
                gap: 8px;
            }


            .tab-row {
                width: 100%;

                overflow-x: auto;
            }


            .tab-btn {
                white-space: nowrap;
            }


            .user-dropdown {
                right: 0;

                width: 250px;
            }


            .notification-dropdown {
                width: min(370px, calc(100vw - 24px));

                right: -50px;
            }


            .logout-form {
                margin: 0;

                width: 100%;
            }


            .logout-button {
                width: 100%;

                color: #b43d3d;
            }


            .order-mid {
                align-items: flex-start;
            }

        }

    </style>

</head>


<body>

<div class="app">


    <!-- =========================================
         SIDEBAR
    ========================================= -->

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

            <a
                href="/buyer/dashboard"
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
                    <path d="M3 10.5 12 3l9 7.5"/>
                    <path d="M5 9.5V21h14V9.5"/>
                </svg>

                Dashboard

            </a>


            <!-- Marketplace -->

            <a
                href="/buyer/marketplace"
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
                    <path d="M4 8h16l-1.5 11a2 2 0 0 1-2 1.8H7.5a2 2 0 0 1-2-1.8L4 8Z"/>
                    <path d="M8 8V6a4 4 0 0 1 8 0v2"/>
                </svg>

                Marketplace

            </a>


            <!-- My Orders -->

            <a
                href="/buyer/my-orders"
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

                My Orders

            </a>


            <!-- Favorites -->

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

                    <path
                        d="M12 21s-7.5-4.6-10-9.2C.3 8.1 2 4.5 5.5 4A5.4 5.4 0 0 1 12 7a5.4 5.4 0 0 1 6.5-3C22 4.5 23.7 8.1 22 11.8 19.5 16.4 12 21 12 21Z"
                    />

                </svg>

                Favorites

            </a>


            <!-- Messages -->

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

                    <path
                        d="M21 15a2 2 0 0 1-2 2H8l-5 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2v10Z"
                    />

                </svg>

                Messages

            </a>

        </nav>

    </aside>


    <!-- =========================================
         MAIN
    ========================================= -->

    <main class="main">


        <!-- =========================================
             TOPBAR
        ========================================= -->

        <div class="topbar">


            <!-- Hamburger -->

            <button
                class="hamburger"
                id="hamburgerBtn"
                type="button"
                aria-label="Open menu"
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

                    <path d="M4 6h16M4 12h16M4 18h16"/>

                </svg>

            </button>


            <!-- Search -->

            <div class="searchbar">

                <input
                    type="text"
                    id="searchInput"
                    placeholder="Search for produce, farmers, or categories..."
                >

                <button
                    type="button"
                    id="searchButton"
                    aria-label="Search"
                >

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

                        <path
                            d="m21 21-4.3-4.3"
                        />

                    </svg>

                </button>

            </div>


            <!-- =========================================
                 TOP ACTIONS
            ========================================= -->

            <div class="top-actions">


                <!-- =================================================
                     WORKING NOTIFICATION BELL
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
                                    class="notification-item {{ is_null($notification->read_at) ? 'unread' : 'read' }}"
                                    data-notification-id="{{ $notification->id }}"
                                >

                                    <div class="notification-icon">

                                        @if($notification->icon === 'message-square')

                                            <svg
                                                viewBox="0 0 24 24"
                                                fill="none"
                                                stroke="currentColor"
                                                stroke-width="2"
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                            >

                                                <path
                                                    d="M21 15a2 2 0 0 1-2 2H8l-5 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2v10Z"
                                                />

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

                                                <circle
                                                    cx="12"
                                                    cy="12"
                                                    r="9"
                                                />

                                                <path
                                                    d="m9 12 2 2 4-4"
                                                />

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


                                        @elseif($notification->icon === 'package-check')

                                            <svg
                                                viewBox="0 0 24 24"
                                                fill="none"
                                                stroke="currentColor"
                                                stroke-width="2"
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                            >

                                                <path
                                                    d="m16.5 9.4-9-5.19"
                                                />

                                                <path
                                                    d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l2-1.14"
                                                />

                                                <polyline
                                                    points="3.29 7 12 12 20.71 7"
                                                />

                                                <line
                                                    x1="12"
                                                    y1="22"
                                                    x2="12"
                                                    y2="12"
                                                />

                                                <path
                                                    d="m16 19 2 2 4-4"
                                                />

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

                                                <path
                                                    d="M6 8h12l-1 12H7L6 8Z"
                                                />

                                                <path
                                                    d="M9 8V6a3 3 0 0 1 6 0v2"
                                                />

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

                                                <circle
                                                    cx="9"
                                                    cy="20"
                                                    r="1"
                                                />

                                                <circle
                                                    cx="18"
                                                    cy="20"
                                                    r="1"
                                                />

                                                <path
                                                    d="M3 4h2l2.4 11.4a2 2 0 0 0 2 1.6h7.8a2 2 0 0 0 2-1.6L21 8H6"
                                                />

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

                                                <path
                                                    d="m12 3 2.8 5.7 6.2.9-4.5 4.4 1.1 6.2L12 17.3 6.4 20.2l1.1-6.2L3 9.6l6.2-.9L12 3Z"
                                                />

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

                                                <path
                                                    d="M20 7H5a2 2 0 0 1 0-4h13a2 2 0 0 1 2 2v2"
                                                />

                                                <path
                                                    d="M5 7h15a1 1 0 0 1 1 1v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5"
                                                />

                                                <path
                                                    d="M16 13h.01"
                                                />

                                            </svg>


                                        @else

                                            <svg
                                                viewBox="0 0 24 24"
                                                fill="none"
                                                stroke="currentColor"
                                                stroke-width="2"
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                            >

                                                <path
                                                    d="M18 8A6 6 0 0 0 6 8c0 7-3 7-3 9h18c0-2-3-2-3-9"
                                                />

                                                <path
                                                    d="M13.73 21a2 2 0 0 1-3.46 0"
                                                />

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


                    <!-- =================================
                         USER DROPDOWN
                    ================================== -->

                    <div
                        class="user-dropdown"
                        id="userDropdown"
                    >

                        <div class="dropdown-profile">

                            <div class="avatar">

                                {{ strtoupper(substr(Auth::user()->first_name, 0, 1)) }}{{ strtoupper(substr(Auth::user()->last_name, 0, 1)) }}

                            </div>


                            <div>

                                <strong>

                                    {{ Auth::user()->first_name }}
                                    {{ Auth::user()->last_name }}

                                </strong>

                                <span>

                                    {{ ucfirst(Auth::user()->role) }}

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

                                <path
                                    d="M4 21c0-4 3.5-7 8-7s8 3 8 7"
                                />

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

                                <path
                                    d="M19.4 15a1.7 1.7 0 0 0 .3 1.9l.1.1-1.8 1.8-.1-.1a1.7 1.7 0 0 0-1.9-.3 1.7 1.7 0 0 0-1 1.6v.2h-2.6V20a1.7 1.7 0 0 0-1-1.6 1.7 1.7 0 0 0-1.9.3l-.1.1-1.8-1.8.1-.1A1.7 1.7 0 0 0 8 15a1.7 1.7 0 0 0-1.6-1H6v-2.6h.2A1.7 1.7 0 0 0 8 10a1.7 1.7 0 0 0-.3-1.9l-.1-.1 1.8-1.8.1.1a1.7 1.7 0 0 0 1.9.3 1.7 1.7 0 0 0 1-1.6v-.2H15V5a1.7 1.7 0 0 0 1 1.6 1.7 1.7 0 0 0 1.9-.3l.1-.1 1.8 1.8-.1.1a1.7 1.7 0 0 0-.3 1.9 1.7 1.7 0 0 0 1.6 1h.2v2.6H21a1.7 1.7 0 0 0-1.6 1Z"
                                />

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

                                    <path
                                        d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"
                                    />

                                    <path
                                        d="M16 17l5-5-5-5"
                                    />

                                    <path
                                        d="M21 12H9"
                                    />

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
        ========================================= -->

        <div class="pagehead">

            <div>

                <h1>
                    My Orders
                </h1>

                <p>
                    Track every harvest you've ordered,
                    from farm to doorstep.
                </p>

            </div>

        </div>


        <!-- =========================================
             ORDER COUNTS
        ========================================= -->

        @php

            $activeCount = $orders->whereIn('status', [
                'Pending',
                'Confirmed',
                'Shipped'
            ])->count();

            $completedCount = $orders->where(
                'status',
                'Delivered'
            )->count();

            $cancelledCount = $orders->where(
                'status',
                'Cancelled'
            )->count();

        @endphp


        <!-- ORDER TABS -->

        <div
            class="tab-row"
            id="orderTabs"
        >

            <button
                class="tab-btn active"
                data-tab="active"
                type="button"
            >

                Active ({{ $activeCount }})

            </button>


            <button
                class="tab-btn"
                data-tab="completed"
                type="button"
            >

                Completed ({{ $completedCount }})

            </button>


            <button
                class="tab-btn"
                data-tab="cancelled"
                type="button"
            >

                Cancelled ({{ $cancelledCount }})

            </button>

        </div>


        <!-- =========================================
             ALERTS
        ========================================= -->

        @if(session('success'))

            <div class="alert-message alert-success">

                {{ session('success') }}

            </div>

        @endif


        @if(session('error'))

            <div class="alert-message alert-error">

                {{ session('error') }}

            </div>

        @endif


        <!-- =========================================
             ORDERS
        ========================================= -->

        <div id="ordersList">

            @forelse($orders as $order)

                @php

                    $status = strtolower($order->status);

                    if ($order->status === 'Pending') {

                        $statusClass = 'status-confirmed';

                    } elseif ($order->status === 'Confirmed') {

                        $statusClass = 'status-confirmed';

                    } elseif ($order->status === 'Shipped') {

                        $statusClass = 'status-shipped';

                    } elseif ($order->status === 'Delivered') {

                        $statusClass = 'status-delivered';

                    } elseif ($order->status === 'Cancelled') {

                        $statusClass = 'status-cancelled';

                    } else {

                        $statusClass = 'status-confirmed';

                    }


                    if ($order->status === 'Pending') {

                        $currentStep = 0;

                    } elseif ($order->status === 'Confirmed') {

                        $currentStep = 1;

                    } elseif ($order->status === 'Shipped') {

                        $currentStep = 2;

                    } elseif ($order->status === 'Delivered') {

                        $currentStep = 3;

                    } else {

                        $currentStep = -1;

                    }

                @endphp


                <div
                    class="card order-card"

                    data-state="{{ $order->status === 'Delivered'
                        ? 'completed'
                        : ($order->status === 'Cancelled'
                            ? 'cancelled'
                            : 'active') }}"

                    data-order-id="{{ strtolower($order->order_number) }}"

                    data-farmer="{{ strtolower(
                        ($order->farmer->first_name ?? '') . ' ' .
                        ($order->farmer->last_name ?? '')
                    ) }}"

                    data-status="{{ strtolower($order->status) }}"
                >


                    <!-- ORDER TOP -->

                    <div class="order-top">

                        <div>

                            <div class="order-id">

                                Order #{{ $order->order_number }}

                            </div>


                            <div class="order-date">

                                Placed on
                                {{ $order->created_at->format('M d, Y') }}

                            </div>

                        </div>


                        <span class="status-badge {{ $statusClass }}">

                            {{ $order->status }}

                        </span>

                    </div>


                    <!-- PRODUCT -->

                    <div class="order-items">

                        <div class="order-thumb">

                            @if($order->harvestListing?->image)

                                <img
                                    src="{{ asset('storage/' . $order->harvestListing->image) }}"
                                    alt="{{ $order->harvestListing->product_name }}"
                                >

                            @else

                                🌾

                            @endif

                        </div>


                        <div
                            style="
                                display:flex;
                                flex-direction:column;
                                justify-content:center;
                            "
                        >

                            <strong>

                                {{ $order->harvestListing->product_name ?? 'Product' }}

                            </strong>


                            <small style="color:var(--ink-soft);">

                                {{ $order->quantity }}

                                {{ $order->harvestListing->unit ?? '' }}

                            </small>

                        </div>

                    </div>


                    <!-- PROGRESS -->

                    @if($order->status !== 'Cancelled')

                        <div class="progress">

                            @php

                                $steps = [
                                    'Placed',
                                    'Confirmed',
                                    'Shipped',
                                    'Delivered'
                                ];

                            @endphp


                            @foreach($steps as $index => $step)

                                <div
                                    class="progress-step
                                    {{ $index <= $currentStep ? 'done' : '' }}"
                                >

                                    <div class="progress-line"></div>

                                    <div class="progress-dot"></div>

                                    <div class="progress-label">

                                        {{ $step }}

                                    </div>

                                </div>

                            @endforeach

                        </div>

                    @endif


                    <!-- ORDER BOTTOM -->

                    <div class="order-mid">


                        <div class="order-farmer">

                            From

                            <b>

                                {{ $order->farmer->first_name ?? '' }}
                                {{ $order->farmer->last_name ?? '' }}

                            </b>


                            <div
                                style="
                                    margin-top:4px;
                                    font-size:12px;
                                "
                            >

                                {{ $order->fulfillment_method }}

                            </div>

                        </div>


                        <div class="order-total">

                            ₱{{ number_format($order->total_price, 2) }}

                        </div>


                        <!-- ACTION BUTTON -->

                        @if($order->status === 'Cancelled')

                            <button
                                class="ghost-btn"
                                type="button"
                                disabled
                                style="
                                    opacity:.6;
                                    cursor:not-allowed;
                                "
                            >

                                Cancelled

                            </button>


                        @elseif($order->status === 'Delivered')

                            @if($order->review)

                                <button
                                    class="reviewed-btn"
                                    type="button"
                                    disabled
                                >

                                    ✓ Reviewed

                                </button>

                            @else

                                <button
                                    class="review-btn"
                                    type="button"
                                    onclick="openReviewModal(
                                        {{ $order->id }},
                                        @js($order->harvestListing->product_name ?? 'Product')
                                    )"
                                >

                                    ⭐ Leave Review

                                </button>

                            @endif


                        @else

                            <button
                                class="ghost-btn"
                                type="button"
                                onclick="showOrderStatus(
                                    @js($order->order_number),
                                    @js($order->status)
                                )"
                            >

                                Track Order

                            </button>

                        @endif

                    </div>

                </div>

            @empty

                <div
                    class="card"
                    style="
                        padding:40px;
                        text-align:center;
                        color:var(--ink-soft);
                    "
                >

                    <div
                        style="
                            font-size:42px;
                            margin-bottom:10px;
                        "
                    >
                        📦
                    </div>


                    <h3
                        style="
                            margin:0 0 6px;
                            color:var(--ink);
                        "
                    >
                        No orders yet
                    </h3>


                    <p style="margin:0 0 18px;">

                        Start shopping from the marketplace.

                    </p>


                    <a
                        href="/buyer/marketplace"
                        class="ghost-btn"
                        style="display:inline-block;"
                    >

                        Browse Marketplace

                    </a>

                </div>

            @endforelse

        </div>

    </main>

</div>


<!-- =========================================
     REVIEW MODAL
========================================= -->

<div
    class="review-modal"
    id="reviewModal"
>

    <div class="review-box">

        <div class="review-header">

            <h2>
                Leave a Review
            </h2>


            <button
                type="button"
                class="review-close"
                onclick="closeReviewModal()"
            >
                ×
            </button>

        </div>


        <div
            class="review-product"
            id="reviewProduct"
        >
            Product
        </div>


        <form
            id="reviewForm"
            method="POST"
        >

            @csrf


            <label class="review-label">

                How would you rate this product?

            </label>


            <div
                class="star-rating"
                id="starRating"
            >

                <button
                    type="button"
                    data-rating="1"
                >
                    ★
                </button>

                <button
                    type="button"
                    data-rating="2"
                >
                    ★
                </button>

                <button
                    type="button"
                    data-rating="3"
                >
                    ★
                </button>

                <button
                    type="button"
                    data-rating="4"
                >
                    ★
                </button>

                <button
                    type="button"
                    data-rating="5"
                >
                    ★
                </button>

            </div>


            <input
                type="hidden"
                name="rating"
                id="ratingInput"
                value=""
            >


            <label
                class="review-label"
                for="reviewComment"
            >

                Your review

            </label>


            <textarea
                class="review-textarea"
                id="reviewComment"
                name="comment"
                placeholder="Tell us about your experience with this product..."
            ></textarea>


            <button
                type="submit"
                class="review-submit"
            >

                Submit Review

            </button>

        </form>

    </div>

</div>


<script>

document.addEventListener(
    "DOMContentLoaded",
    function () {


    /* =====================================================
       SIDEBAR
    ===================================================== */

    const hamburgerBtn =
        document.getElementById(
            "hamburgerBtn"
        );

    const sidebar =
        document.getElementById(
            "sidebar"
        );


    if (hamburgerBtn && sidebar) {

        hamburgerBtn.addEventListener(
            "click",
            function (event) {

                event.stopPropagation();

                sidebar.classList.toggle(
                    "open"
                );

            }
        );

    }


    /* =====================================================
       PROFILE
    ===================================================== */

    const userMenu =
        document.getElementById(
            "userMenu"
        );

    const userChip =
        document.getElementById(
            "userChip"
        );

    const userDropdown =
        document.getElementById(
            "userDropdown"
        );


    /* =====================================================
       NOTIFICATION ELEMENTS
    ===================================================== */

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

    let notificationCount =
        document.getElementById(
            "notificationCount"
        );

    const notificationSummary =
        document.getElementById(
            "notificationSummary"
        );

    let markAllRead =
        document.getElementById(
            "markAllRead"
        );


    /* =====================================================
       CSRF
    ===================================================== */

    const csrfMeta =
        document.querySelector(
            'meta[name="csrf-token"]'
        );

    const csrfToken =
        csrfMeta
            ? csrfMeta.getAttribute("content")
            : "";


    /* =====================================================
       UPDATE NOTIFICATION SUMMARY
    ===================================================== */

    function updateNotificationSummary(
        count
    ) {

        if (!notificationSummary) {

            return;

        }


        count =
            Number(count) || 0;


        if (count <= 0) {

            notificationSummary.textContent =
                "You're all caught up";

        } else {

            notificationSummary.textContent =
                count + " unread";

        }

    }


    /* =====================================================
       CREATE NOTIFICATION BADGE
       This also handles the case where the page
       initially has zero unread notifications.
    ===================================================== */

    function ensureNotificationBadge() {

        if (
            notificationCount ||
            !notificationBtn
        ) {

            return;

        }


        notificationCount =
            document.createElement(
                "span"
            );


        notificationCount.className =
            "dot";


        notificationCount.id =
            "notificationCount";


        notificationBtn.appendChild(
            notificationCount
        );

    }


    /* =====================================================
       CREATE MARK ALL BUTTON
       This handles the case where the page initially
       has zero unread notifications.
    ===================================================== */

    function ensureMarkAllButton() {

        if (
            markAllRead ||
            !notificationDropdown
        ) {

            return;

        }


        const header =
            notificationDropdown.querySelector(
                ".notification-header"
            );


        if (!header) {

            return;

        }


        markAllRead =
            document.createElement(
                "button"
            );


        markAllRead.type =
            "button";


        markAllRead.id =
            "markAllRead";


        markAllRead.className =
            "mark-all-btn";


        markAllRead.textContent =
            "Mark all as read";


        header.appendChild(
            markAllRead
        );


        attachMarkAllReadEvent();

    }


    /* =====================================================
       UPDATE NOTIFICATION COUNT
       Same behavior as working reference
    ===================================================== */

    function updateNotificationCount(
        count = null
    ) {

        if (count === null) {

            count =
                document.querySelectorAll(
                    ".notification-item.unread"
                ).length;

        }


        count =
            Number(count) || 0;


        /* ---------------------------------------------
           UPDATE BELL BADGE
        --------------------------------------------- */

        if (count > 0) {

            ensureNotificationBadge();


            if (notificationCount) {

                notificationCount.style.display =
                    "flex";


                notificationCount.textContent =
                    count > 99
                        ? "99+"
                        : count;

            }

        } else {

            if (notificationCount) {

                notificationCount.style.display =
                    "none";

            }

        }


        /* ---------------------------------------------
           UPDATE SUMMARY
        --------------------------------------------- */

        updateNotificationSummary(
            count
        );


        /* ---------------------------------------------
           UPDATE MARK ALL BUTTON
        --------------------------------------------- */

        if (count > 0) {

            ensureMarkAllButton();

            if (markAllRead) {

                markAllRead.style.display =
                    "inline-block";

            }

        } else {

            if (markAllRead) {

                markAllRead.style.display =
                    "none";

            }

        }

    }


    /* =====================================================
       OPEN / CLOSE NOTIFICATIONS
    ===================================================== */

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


                /* Close profile */

                if (userMenu) {

                    userMenu.classList.remove(
                        "open"
                    );

                }


                /* Toggle notification */

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


    /* =====================================================
       KEEP NOTIFICATION DROPDOWN OPEN
    ===================================================== */

    if (notificationDropdown) {

        notificationDropdown.addEventListener(
            "click",
            function (event) {

                event.stopPropagation();

            }
        );

    }


    /* =====================================================
       MARK ONE NOTIFICATION AS READ
    ===================================================== */

    document
        .querySelectorAll(
            ".notification-item.unread"
        )
        .forEach(
            function (notificationItem) {

                notificationItem.addEventListener(
                    "click",
                    function () {

                        const item =
                            this;


                        const notificationId =
                            item.dataset.notificationId;


                        if (!notificationId) {

                            return;

                        }


                        /* Prevent duplicate requests */

                        if (
                            item.dataset.processing ===
                            "true"
                        ) {

                            return;

                        }


                        item.dataset.processing =
                            "true";


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

                                    /* --------------------------------
                                       CHANGE ITEM TO READ
                                    -------------------------------- */

                                    item.classList.remove(
                                        "unread"
                                    );


                                    item.classList.add(
                                        "read"
                                    );


                                    /* --------------------------------
                                       REMOVE UNREAD DOT
                                    -------------------------------- */

                                    const unreadDot =
                                        item.querySelector(
                                            ".unread-dot"
                                        );


                                    if (unreadDot) {

                                        unreadDot.remove();

                                    }


                                    /* --------------------------------
                                       UPDATE COUNT
                                    -------------------------------- */

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

                                item.dataset.processing =
                                    "false";

                            }
                        );

                    }
                );

            }
        );


    /* =====================================================
       MARK ALL NOTIFICATIONS AS READ
    ===================================================== */

    function attachMarkAllReadEvent() {

        if (!markAllRead) {

            return;

        }


        /* Prevent attaching twice */

        if (
            markAllRead.dataset.listenerAttached ===
            "true"
        ) {

            return;

        }


        markAllRead.dataset.listenerAttached =
            "true";


        markAllRead.addEventListener(
            "click",
            function (event) {

                event.stopPropagation();


                markAllRead.disabled =
                    true;


                markAllRead.textContent =
                    "Updating...";


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

                            /* --------------------------------
                               CHANGE ALL ITEMS TO READ
                            -------------------------------- */

                            document
                                .querySelectorAll(
                                    ".notification-item.unread"
                                )
                                .forEach(
                                    function (item) {

                                        item.classList.remove(
                                            "unread"
                                        );


                                        item.classList.add(
                                            "read"
                                        );


                                        const dot =
                                            item.querySelector(
                                                ".unread-dot"
                                            );


                                        if (dot) {

                                            dot.remove();

                                        }

                                    }
                                );


                            /* --------------------------------
                               UPDATE COUNT
                            -------------------------------- */

                            updateNotificationCount(
                                0
                            );


                            /* --------------------------------
                               HIDE BUTTON
                            -------------------------------- */

                            markAllRead.style.display =
                                "none";


                            markAllRead.disabled =
                                false;


                            markAllRead.textContent =
                                "Mark all as read";

                        }

                    }
                )

                .catch(
                    error => {

                        console.error(
                            "Mark all read error:",
                            error
                        );


                        markAllRead.disabled =
                            false;


                        markAllRead.textContent =
                            "Mark all as read";

                    }
                );

            }
        );

    }


    /* Attach initial button if it exists */

    attachMarkAllReadEvent();


    /* =====================================================
       PROFILE DROPDOWN
    ===================================================== */

    if (
        userChip &&
        userMenu
    ) {

        userChip.addEventListener(
            "click",
            function (event) {

                event.stopPropagation();


                /* Close notifications */

                if (notificationDropdown) {

                    notificationDropdown
                        .classList
                        .remove(
                            "show"
                        );

                }


                if (notificationBtn) {

                    notificationBtn.setAttribute(
                        "aria-expanded",
                        "false"
                    );

                }


                /* Toggle profile */

                userMenu.classList.toggle(
                    "open"
                );

            }
        );

    }


    /* =====================================================
       KEEP PROFILE OPEN
    ===================================================== */

    if (userDropdown) {

        userDropdown.addEventListener(
            "click",
            function (event) {

                event.stopPropagation();

            }
        );

    }


    /* =====================================================
       CLICK OUTSIDE
    ===================================================== */

    document.addEventListener(
        "click",
        function () {

            /* Close notification */

            if (notificationDropdown) {

                notificationDropdown
                    .classList
                    .remove(
                        "show"
                    );

            }


            if (notificationBtn) {

                notificationBtn.setAttribute(
                    "aria-expanded",
                    "false"
                );

            }


            /* Close profile */

            if (userMenu) {

                userMenu.classList.remove(
                    "open"
                );

            }


            /* Close mobile sidebar */

            if (
                window.innerWidth <= 860 &&
                sidebar &&
                sidebar.classList.contains(
                    "open"
                )
            ) {

                sidebar.classList.remove(
                    "open"
                );

            }

        }
    );


    /* =====================================================
       REVIEW SYSTEM
    ===================================================== */

    const reviewModal =
        document.getElementById(
            "reviewModal"
        );

    const reviewForm =
        document.getElementById(
            "reviewForm"
        );

    const reviewProduct =
        document.getElementById(
            "reviewProduct"
        );

    const ratingInput =
        document.getElementById(
            "ratingInput"
        );

    const starButtons =
        document.querySelectorAll(
            "#starRating button"
        );


    /* =====================================================
       OPEN REVIEW MODAL
    ===================================================== */

    window.openReviewModal =
        function (
            orderId,
            productName
        ) {

            if (
                !reviewModal ||
                !reviewForm ||
                !reviewProduct ||
                !ratingInput
            ) {

                return;

            }


            reviewProduct.textContent =
                "Reviewing: " +
                productName;


            reviewForm.action =
                "/buyer/orders/" +
                orderId +
                "/review";


            ratingInput.value =
                "";


            document
                .querySelectorAll(
                    "#starRating button"
                )
                .forEach(
                    function (button) {

                        button.classList.remove(
                            "active"
                        );

                    }
                );


            const reviewComment =
                document.getElementById(
                    "reviewComment"
                );


            if (reviewComment) {

                reviewComment.value =
                    "";

            }


            reviewModal.classList.add(
                "show"
            );

        };


    /* =====================================================
       CLOSE REVIEW MODAL
    ===================================================== */

    window.closeReviewModal =
        function () {

            if (reviewModal) {

                reviewModal.classList.remove(
                    "show"
                );

            }

        };


    /* =====================================================
       STAR SELECTION
    ===================================================== */

    starButtons.forEach(
        function (button) {

            button.addEventListener(
                "click",
                function () {

                    const rating =
                        parseInt(
                            button.dataset.rating
                        );


                    ratingInput.value =
                        rating;


                    starButtons.forEach(
                        function (star) {

                            const starRating =
                                parseInt(
                                    star.dataset.rating
                                );


                            star.classList.toggle(
                                "active",
                                starRating <= rating
                            );

                        }
                    );

                }
            );

        }
    );


    /* =====================================================
       CLOSE REVIEW MODAL OUTSIDE
    ===================================================== */

    if (reviewModal) {

        reviewModal.addEventListener(
            "click",
            function (event) {

                if (
                    event.target ===
                    reviewModal
                ) {

                    closeReviewModal();

                }

            }
        );

    }


    /* =====================================================
       ESC KEY
    ===================================================== */

    document.addEventListener(
        "keydown",
        function (event) {

            if (
                event.key === "Escape" &&
                reviewModal &&
                reviewModal.classList.contains(
                    "show"
                )
            ) {

                closeReviewModal();

            }

        }
    );


    /* =====================================================
       REQUIRE RATING
    ===================================================== */

    if (reviewForm) {

        reviewForm.addEventListener(
            "submit",
            function (event) {

                if (
                    !ratingInput.value
                ) {

                    event.preventDefault();

                    alert(
                        "Please select a star rating first."
                    );

                }

            }
        );

    }


    /* =====================================================
       ORDER TABS
    ===================================================== */

    let activeOrderTab =
        "active";


    const orderTabs =
        document.querySelectorAll(
            "#orderTabs .tab-btn"
        );


    const orderCards =
        document.querySelectorAll(
            "#ordersList .order-card"
        );


    /* =====================================================
       FILTER ORDERS
    ===================================================== */

    function filterOrders() {

        orderCards.forEach(
            function (card) {

                const state =
                    card.dataset.state;


                if (
                    state ===
                    activeOrderTab
                ) {

                    card.style.display =
                        "";

                } else {

                    card.style.display =
                        "none";

                }

            }
        );


        orderTabs.forEach(
            function (button) {

                button.classList.toggle(
                    "active",
                    button.dataset.tab ===
                    activeOrderTab
                );

            }
        );


        updateEmptyMessage();

    }


    /* =====================================================
       EMPTY TAB MESSAGE
    ===================================================== */

    function updateEmptyMessage() {

        const visibleCards =
            Array.from(orderCards)
                .filter(
                    function (card) {

                        return (
                            card.style.display !==
                            "none"
                        );

                    }
                );


        const existingMessage =
            document.getElementById(
                "tabEmptyMessage"
            );


        if (existingMessage) {

            existingMessage.remove();

        }


        if (
            visibleCards.length ===
            0
        ) {

            const message =
                document.createElement(
                    "div"
                );


            message.id =
                "tabEmptyMessage";


            message.className =
                "card";


            message.style.cssText =
                `
                    padding:30px;
                    text-align:center;
                    color:var(--ink-soft);
                `;


            message.innerHTML =
                `
                    <div
                        style="
                            font-size:38px;
                            margin-bottom:8px;
                        "
                    >
                        📦
                    </div>

                    <strong
                        style="
                            color:var(--ink);
                        "
                    >
                        No orders here yet.
                    </strong>

                    <div
                        style="
                            margin-top:6px;
                        "
                    >
                        Your orders will appear here.
                    </div>
                `;


            document
                .getElementById(
                    "ordersList"
                )
                .appendChild(
                    message
                );

        }

    }


    /* =====================================================
       ORDER TAB CLICK
    ===================================================== */

    orderTabs.forEach(
        function (button) {

            button.addEventListener(
                "click",
                function () {

                    activeOrderTab =
                        button.dataset.tab;


                    filterOrders();

                }
            );

        }
    );


    /* =====================================================
       SEARCH ORDERS
    ===================================================== */

    const searchInput =
        document.getElementById(
            "searchInput"
        );


    const searchButton =
        document.getElementById(
            "searchButton"
        );


    function searchOrders() {

        const keyword =
            searchInput.value
                .trim()
                .toLowerCase();


        let visibleCount =
            0;


        orderCards.forEach(
            function (card) {

                const orderId =
                    card.dataset.orderId ||
                    "";


                const farmer =
                    card.dataset.farmer ||
                    "";


                const status =
                    card.dataset.status ||
                    "";


                const product =
                    card
                        .querySelector(
                            ".order-items strong"
                        )
                        ?.textContent
                        .toLowerCase() ||
                    "";


                const matchesSearch =
                    !keyword ||
                    orderId.includes(
                        keyword
                    ) ||
                    farmer.includes(
                        keyword
                    ) ||
                    status.includes(
                        keyword
                    ) ||
                    product.includes(
                        keyword
                    );


                const matchesTab =
                    card.dataset.state ===
                    activeOrderTab;


                if (
                    matchesSearch &&
                    matchesTab
                ) {

                    card.style.display =
                        "";

                    visibleCount++;

                } else {

                    card.style.display =
                        "none";

                }

            }
        );


        const existingMessage =
            document.getElementById(
                "tabEmptyMessage"
            );


        if (existingMessage) {

            existingMessage.remove();

        }


        if (
            visibleCount ===
            0
        ) {

            const message =
                document.createElement(
                    "div"
                );


            message.id =
                "tabEmptyMessage";


            message.className =
                "card";


            message.style.cssText =
                `
                    padding:30px;
                    text-align:center;
                    color:var(--ink-soft);
                `;


            message.innerHTML =
                `
                    <div
                        style="
                            font-size:38px;
                            margin-bottom:8px;
                        "
                    >
                        🔎
                    </div>

                    <strong
                        style="
                            color:var(--ink);
                        "
                    >
                        No matching orders found.
                    </strong>

                    <div
                        style="
                            margin-top:6px;
                        "
                    >
                        Try another order number,
                        farmer, product, or status.
                    </div>
                `;


            document
                .getElementById(
                    "ordersList"
                )
                .appendChild(
                    message
                );

        }

    }


    /* =====================================================
       SEARCH BUTTON
    ===================================================== */

    if (searchButton) {

        searchButton.addEventListener(
            "click",
            searchOrders
        );

    }


    /* =====================================================
       SEARCH ENTER
    ===================================================== */

    if (searchInput) {

        searchInput.addEventListener(
            "keyup",
            function (event) {

                if (
                    event.key ===
                    "Enter"
                ) {

                    searchOrders();

                }

            }
        );

    }


    /* =====================================================
       TRACK ORDER
    ===================================================== */

    window.showOrderStatus =
        function (
            orderNumber,
            status
        ) {

            let message =
                "";


            if (
                status ===
                "Pending"
            ) {

                message =
                    "Your order has been placed and is waiting for the farmer to confirm it.";

            } else if (
                status ===
                "Confirmed"
            ) {

                message =
                    "Your order has been confirmed by the farmer and is being prepared.";

            } else if (
                status ===
                "Shipped"
            ) {

                message =
                    "Your order has been shipped and is on its way.";

            } else if (
                status ===
                "Delivered"
            ) {

                message =
                    "Your order has been delivered successfully.";

            } else if (
                status ===
                "Cancelled"
            ) {

                message =
                    "This order has been cancelled.";

            } else {

                message =
                    "Your order status is currently being processed.";

            }


            alert(
                "Order #" +
                orderNumber +
                "\n\n" +
                message
            );

        };


    /* =====================================================
       INITIAL NOTIFICATION COUNT
    ===================================================== */

    updateNotificationCount();


    /* =====================================================
       INITIAL ORDER FILTER
    ===================================================== */

    filterOrders();

});

</script>

</body>

</html>

updateNotificationCount