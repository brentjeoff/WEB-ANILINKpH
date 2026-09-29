<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>AniLink — Messages</title>

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

        h1 {
            font-family: "Fraunces", serif;
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
        ========================================== */

        .app {
            display: flex;
            min-height: 100vh;
            width: 100%;
        }

        /* =========================================
           SIDEBAR
        ========================================== */

        .sidebar {
            width: 264px;
            flex: 0 0 264px;
            min-height: 100vh;
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
            z-index: 1000;
            transition: left 0.2s ease;
        }

        /* =========================================
           BRAND
        ========================================== */

        .brand {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 4px 6px 22px;
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
            font-size: 11.5px;
            color: #c7d6c2;
            margin-top: 1px;
        }

        /* =========================================
           NAVIGATION
        ========================================== */

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
            color: #dfe9d9;
            font-weight: 600;
            font-size: 14.5px;
            cursor: pointer;
            background: transparent;
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
        ========================================== */

        .main {
            flex: 1 1 auto;
            min-width: 0;
            padding: 22px 32px 48px;
        }

        /* =========================================
           TOPBAR
        ========================================== */

        .topbar {
            display: flex;
            align-items: center;
            gap: 16px;
            margin-bottom: 22px;
            position: relative;
            z-index: 100;
        }

        /* =========================================
           HAMBURGER
        ========================================== */

        .hamburger {
            width: 40px;
            height: 40px;
            flex: 0 0 auto;
            display: flex;
            align-items: center;
            justify-content: center;
            background: var(--card);
            border: 1px solid var(--line);
            border-radius: 10px;
            cursor: pointer;
            color: var(--ink);
        }

        .hamburger:hover {
            background: var(--brand-green-soft);
            color: var(--brand-green);
        }

        /* =========================================
           SEARCH BAR
        ========================================== */

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
            font-size: 14.5px;
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
            background: var(--brand-green);
            color: white;
            border: none;
            border-radius: 9px;
            cursor: pointer;
        }

        .searchbar button:hover {
            background: #4f8934;
        }

        /* =========================================
           TOP ACTIONS
        ========================================== */

        .top-actions {
            display: flex;
            align-items: center;
            gap: 18px;
            flex: 0 0 auto;
            margin-left: auto;
        }

        /* =========================================
           NOTIFICATION
        ========================================== */

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

        /* =========================================
           NOTIFICATION DROPDOWN
        ========================================== */

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

        .notification-footer {
            border-top: 1px solid #edf0eb;
            padding: 12px 18px;
            text-align: center;
        }

        .notification-footer a {
            color: #5f9c3f;
            font-size: 12.5px;
            font-weight: 700;
        }

        .notification-footer a:hover {
            text-decoration: underline;
        }

        /* =========================================
           USER MENU
        ========================================== */

        .user-menu {
            position: relative;
        }

        .user-chip {
            border: none;
            background: transparent;
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 5px 8px;
            border-radius: 12px;
            cursor: pointer;
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

        /* =========================================
           AVATAR
        ========================================== */

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
            letter-spacing: 0.5px;
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
            margin-top: 2px;
            text-align: left;
        }

        /* =========================================
           USER DROPDOWN
        ========================================== */

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

        /* =========================================
           PAGE HEADER
        ========================================== */

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
           MESSAGES CONTAINER
        ========================================== */

        .messages-shell {
            display: flex;
            height: 560px;
            overflow: hidden;
            background: var(--card);
            border: 1px solid var(--line);
            border-radius: var(--radius-lg);
            box-shadow: var(--shadow-card);
        }

        /* =========================================
           CONVERSATION LIST
        ========================================== */

        .conv-list {
            width: 300px;
            flex: 0 0 300px;
            border-right: 1px solid var(--line);
            overflow-y: auto;
        }

        .conv-search {
            padding: 14px;
            border-bottom: 1px solid var(--line);
        }

        .conv-search input {
            width: 100%;
            padding: 9px 12px;
            border-radius: 9px;
            border: 1px solid var(--line);
            background: var(--cream);
            color: var(--ink);
            font-size: 13px;
            outline: none;
        }

        .conv-search input:focus {
            border-color: var(--brand-green);
        }

        /* =========================================
           CONVERSATION ITEM
        ========================================== */

        .conv-item {
            display: flex;
            gap: 11px;
            padding: 13px 14px;
            cursor: pointer;
            border-bottom: 1px solid var(--line);
            transition: background 0.2s ease;
        }

        .conv-item:hover {
            background: var(--brand-green-soft);
        }

        .conv-item.active {
            background: var(--brand-green-soft);
        }

        /* =========================================
           CONVERSATION AVATAR
        ========================================== */

        .conv-avatar {
            width: 42px;
            height: 42px;
            flex: 0 0 42px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            background:
                linear-gradient(
                    135deg,
                    #a8d18a,
                    #5f9c3f
                );
            color: white;
            font-size: 14px;
            font-weight: 700;
        }

        /* =========================================
           CONVERSATION INFORMATION
        ========================================== */

        .conv-info {
            min-width: 0;
            flex: 1;
        }

        .conv-name {
            display: flex;
            justify-content: space-between;
            gap: 6px;
            font-size: 13.5px;
            font-weight: 700;
        }

        .conv-time {
            flex: 0 0 auto;
            color: var(--ink-soft);
            font-size: 11px;
            font-weight: 500;
        }

        .conv-preview {
            margin-top: 2px;
            color: var(--ink-soft);
            font-size: 12.5px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .conv-unread {
            flex: 0 0 auto;
            height: fit-content;
            padding: 1px 7px;
            border-radius: 999px;
            background: var(--brand-green);
            color: white;
            font-size: 10.5px;
            font-weight: 800;
        }

        /* =========================================
           CHAT PANE
        ========================================== */

        .chat-pane {
            flex: 1;
            display: flex;
            flex-direction: column;
            min-width: 0;
        }

        /* =========================================
           CHAT HEADER
        ========================================== */

        .chat-head {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 14px 18px;
            border-bottom: 1px solid var(--line);
        }

        .chat-head .conv-name {
            font-size: 14.5px;
            justify-content: flex-start;
        }

        .chat-sub {
            font-size: 12px;
            color: var(--ink-soft);
            margin-top: 2px;
        }

        /* =========================================
           CHAT BODY
        ========================================== */

        .chat-body {
            flex: 1;
            display: flex;
            flex-direction: column;
            gap: 12px;
            padding: 20px;
            overflow-y: auto;
        }

        /* =========================================
           CHAT BUBBLES
        ========================================== */

        .bubble {
            max-width: 64%;
            padding: 10px 14px;
            border-radius: 14px;
            font-size: 13.5px;
            line-height: 1.45;
            word-break: break-word;
        }

        .bubble.them {
            align-self: flex-start;
            background: var(--cream);
            border: 1px solid var(--line);
            border-bottom-left-radius: 4px;
        }

        .bubble.me {
            align-self: flex-end;
            background: var(--brand-green);
            color: white;
            border-bottom-right-radius: 4px;
        }

        .bubble-time {
            margin-top: 4px;
            color: var(--ink-soft);
            font-size: 10.5px;
        }

        /* =========================================
           CHAT INPUT
        ========================================== */

        .chat-input {
            display: flex;
            gap: 10px;
            padding: 14px 18px;
            border-top: 1px solid var(--line);
        }

        .chat-input input {
            flex: 1;
            padding: 11px 14px;
            border-radius: 10px;
            border: 1px solid var(--line);
            background: var(--cream);
            color: var(--ink);
            font-size: 13.5px;
            outline: none;
        }

        .chat-input input:focus {
            border-color: var(--brand-green);
        }

        .chat-send {
            width: 42px;
            height: 42px;
            flex: 0 0 42px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: var(--brand-green);
            color: white;
            border: none;
            border-radius: 10px;
            cursor: pointer;
        }

        .chat-send:hover {
            background: #4f8934;
        }

        /* =========================================
           MOBILE
        ========================================== */

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
                    10px 0 30px
                    rgba(0, 0, 0, 0.25);
            }

            .main {
                padding: 16px;
            }

            .messages-shell {
                flex-direction: column;
                height: auto;
            }

            .conv-list {
                width: 100%;
                flex: none;
                max-height: 240px;
                border-right: none;
                border-bottom: 1px solid var(--line);
            }

            .chat-pane {
                min-height: 500px;
            }

            .notification-dropdown {
                right: -60px;
            }
        }

        @media (max-width: 600px) {

            .user-name,
            .user-role {
                display: none;
            }

            .searchbar {
                display: none;
            }

            .top-actions {
                margin-left: auto;
            }

            .bubble {
                max-width: 82%;
            }

            .user-dropdown {
                right: 0;
                width: 250px;
            }

            .notification-dropdown {
                position: fixed;
                top: 70px;
                right: 10px;
                left: 10px;
                width: auto;
                max-width: none;
            }

            .logout-form {
                margin: 0;
                width: 100%;
            }

            .logout-button {
                width: 100%;
                color: #b43d3d;
            }

            .logout-button:hover {
                background: #fff0f0;
                color: #b43d3d;
            }
        }
    </style>
</head>

<body>

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

            <a href="/buyer/favorites" class="navitem">

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

            <a href="/buyer/messages" class="navitem active">

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

                @php
                    $unreadMessages = \App\Models\Message::where('receiver_id', Auth::id())
                        ->where('is_read', false)
                        ->count();
                @endphp

                @if($unreadMessages > 0)

                    <span class="badge">
                        {{ $unreadMessages }}
                    </span>

                @endif

            </a>

        </nav>

    </aside>


    <!-- =========================================
         MAIN
    ========================================== -->

    <main class="main">

        <!-- TOPBAR -->

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


            <!-- TOP ACTIONS -->

            <div class="top-actions">


                <!-- =====================================
                     NOTIFICATION BELL
                ====================================== -->

                @php
                    $notifications = $notifications ?? collect();

                    $notificationCount = $notificationCount
                        ?? collect($notifications)->whereNull('read_at')->count();
                @endphp

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


                        <span
                            class="dot"
                            id="notificationCount"
                            @if($notificationCount <= 0)
                                style="display:none;"
                            @endif
                        >
                            {{ $notificationCount }}
                        </span>

                    </button>


                    <!-- NOTIFICATION DROPDOWN -->

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
                                @if($notificationCount <= 0)
                                    style="display:none;"
                                @endif
                            >
                                Mark all as read
                            </button>

                        </div>


                        <div class="notification-list">

                            @forelse($notifications as $notification)

                                @php
                                    $isUnread = is_null($notification->read_at);
                                @endphp

                                <div
                                    class="notification-item {{ $isUnread ? 'unread' : 'read' }}"
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


                                    @if($isUnread)

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
                                        You're all caught up.
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

                                <path d="M19.4 15a1.7 1.7 0 0 0 .3 1.9l.1.1-1.5 1.5-.1-.1a1.7 1.7 0 0 0-1.9-.3 1.7 1.7 0 0 0-1 1.6V20h-2.1v-.2a1.7 1.7 0 0 0-1-1.6 1.7 1.7 0 0 0-1.9.3l-.1.1-1.5-1.5.1-.1a1.7 1.7 0 0 0 .3-1.9 1.7 1.7 0 0 0-1.6-1H5v-2.1h.2a1.7 1.7 0 0 0 1.6-1 1.7 1.7 0 0 0-.3-1.9l-.1-.1 1.5-1.5.1.1a1.7 1.7 0 0 0 1.9.3 1.7 1.7 0 0 0 1-1.6V4h2.1v.2a1.7 1.7 0 0 0 1 1.6 1.7 1.7 0 0 0 1.9-.3l.1-.1 1.5 1.5-.1.1a1.7 1.7 0 0 0-.3 1.9 1.7 1.7 0 0 0-1.6 1z"/>
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
                    Messages
                </h1>

                <p>
                    Chat directly with the farmers behind your harvests.
                </p>

            </div>

        </div>


        <!-- =========================================
             MESSAGES
        ========================================== -->

        <div class="messages-shell">


            <!-- CONVERSATION LIST -->

            <div
                class="conv-list"
                id="convList"
            >

                <div class="conv-search">

                    <input
                        type="text"
                        id="conversationSearch"
                        placeholder="Search conversations..."
                    >

                </div>


                <div id="convItems">

                    @forelse($conversations as $conversation)

                        @php

                            $lastMessage = \App\Models\Message::where(function ($query) use ($conversation) {

                                    $query->where('sender_id', Auth::id())
                                        ->where('receiver_id', $conversation->id);

                                })

                                ->orWhere(function ($query) use ($conversation) {

                                    $query->where('sender_id', $conversation->id)
                                        ->where('receiver_id', Auth::id());

                                })

                                ->latest()
                                ->first();


                            $unreadCount = \App\Models\Message::where('sender_id', $conversation->id)
                                ->where('receiver_id', Auth::id())
                                ->where('is_read', false)
                                ->count();

                        @endphp


                        <a
                            href="{{ route('buyer.messages', ['user' => $conversation->id]) }}"
                            class="conv-item {{ $selectedUser && $selectedUser->id == $conversation->id ? 'active' : '' }}"
                            data-name="{{ strtolower($conversation->first_name . ' ' . $conversation->last_name) }}"
                        >

                            <!-- Avatar -->

                            <div class="conv-avatar">

                                {{ strtoupper(substr($conversation->first_name ?? 'U', 0, 1)) }}{{ strtoupper(substr($conversation->last_name ?? '', 0, 1)) }}

                            </div>


                            <!-- Information -->

                            <div class="conv-info">

                                <div class="conv-name">

                                    <span>

                                        {{ $conversation->first_name }}
                                        {{ $conversation->last_name }}

                                    </span>


                                    @if($lastMessage)

                                        <span class="conv-time">

                                            {{ $lastMessage->created_at->format('g:i A') }}

                                        </span>

                                    @endif

                                </div>


                                <div class="conv-preview">

                                    @if($lastMessage)

                                        {{ $lastMessage->message }}

                                    @else

                                        No messages yet.

                                    @endif

                                </div>

                            </div>


                            <!-- Unread -->

                            @if($unreadCount > 0)

                                <span class="conv-unread">

                                    {{ $unreadCount }}

                                </span>

                            @endif

                        </a>

                    @empty

                        <div
                            style="
                                padding: 40px 20px;
                                text-align: center;
                                color: var(--ink-soft);
                                font-size: 13px;
                            "
                        >

                            No conversations yet.

                        </div>

                    @endforelse

                </div>

            </div>


            <!-- CHAT -->

            <div class="chat-pane">


                <!-- CHAT HEADER -->

                <div class="chat-head">

                    @if($selectedUser)

                        <div class="conv-avatar">

                            {{ strtoupper(substr($selectedUser->first_name ?? 'U', 0, 1)) }}{{ strtoupper(substr($selectedUser->last_name ?? '', 0, 1)) }}

                        </div>


                        <div>

                            <div class="conv-name">

                                {{ $selectedUser->first_name }}
                                {{ $selectedUser->last_name }}

                            </div>


                            <div class="chat-sub">

                                Farmer

                            </div>

                        </div>

                    @else

                        <div class="conv-avatar">
                            ?
                        </div>

                        <div>

                            <div class="conv-name">

                                No conversation selected

                            </div>

                            <div class="chat-sub">

                                Select a farmer to start messaging.

                            </div>

                        </div>

                    @endif

                </div>


                <!-- CHAT BODY -->

                <div
                    class="chat-body"
                    id="chatBody"
                >

                    @if($selectedUser)

                        @forelse($messages as $message)

                            <div
                                style="
                                    display: flex;
                                    flex-direction: column;
                                    align-items: {{ $message->sender_id == Auth::id() ? 'flex-end' : 'flex-start' }};
                                "
                            >

                                <div
                                    class="bubble {{ $message->sender_id == Auth::id() ? 'me' : 'them' }}"
                                >

                                    {{ $message->message }}

                                </div>


                                <div class="bubble-time">

                                    {{ $message->created_at->format('g:i A') }}

                                </div>

                            </div>

                        @empty

                            <div
                                style="
                                    margin: auto;
                                    text-align: center;
                                    color: var(--ink-soft);
                                    font-size: 13px;
                                "
                            >

                                No messages yet.
                                <br>

                                Send a message to start the conversation.

                            </div>

                        @endforelse

                    @else

                        <div
                            style="
                                margin: auto;
                                text-align: center;
                                color: var(--ink-soft);
                                font-size: 13px;
                            "
                        >

                            Select a conversation to view messages.

                        </div>

                    @endif

                </div>


                <!-- CHAT INPUT -->

                @if($selectedUser)

                    <form
                        action="{{ route('buyer.messages.send') }}"
                        method="POST"
                        class="chat-input"
                    >

                        @csrf

                        <input
                            type="hidden"
                            name="receiver_id"
                            value="{{ $selectedUser->id }}"
                        >

                        <input
                            type="text"
                            name="message"
                            placeholder="Write a message..."
                            autocomplete="off"
                            required
                        >

                        <button
                            class="chat-send"
                            type="submit"
                        >

                            <svg
                                width="18"
                                height="18"
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="white"
                                stroke-width="2"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                            >
                                <path d="m3 20 18-8L3 4l0 7 12 1-12 1z"/>
                            </svg>

                        </button>

                    </form>

                @endif

            </div>

        </div>

    </main>

</div>


<!-- =========================================
     JAVASCRIPT
========================================== -->

<script>

document.addEventListener('DOMContentLoaded', function () {

    /* =========================================
       ELEMENTS
    ========================================== */

    const csrfToken =
        document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');

    const sidebar =
        document.getElementById('sidebar');

    const hamburgerBtn =
        document.getElementById('hamburgerBtn');

    const userMenu =
        document.getElementById('userMenu');

    const userChip =
        document.getElementById('userChip');

    const notificationWrapper =
        document.getElementById('notificationWrapper');

    const bellBtn =
        document.getElementById('bellBtn');

    const notificationDropdown =
        document.getElementById('notificationDropdown');

    const notificationCount =
        document.getElementById('notificationCount');

    const notificationSummary =
        document.getElementById('notificationSummary');

    const markAllRead =
        document.getElementById('markAllRead');

    const sidebarNotificationBadge =
        document.getElementById('sidebarNotificationBadge');


    /* =========================================
       HAMBURGER / SIDEBAR
    ========================================== */

    if (hamburgerBtn && sidebar) {

        hamburgerBtn.addEventListener('click', function (event) {

            event.stopPropagation();

            sidebar.classList.toggle('open');

        });

    }


    /* =========================================
       NOTIFICATION COUNT
    ========================================== */

    function updateNotificationCount(count = null) {

        if (count === null) {

            count =
                document.querySelectorAll(
                    '.notification-item.unread'
                ).length;

        }

        count = Number(count) || 0;


        /* Top notification badge */

        if (notificationCount) {

            notificationCount.textContent = count;

            notificationCount.style.display =
                count > 0 ? 'flex' : 'none';

        }


        /* Sidebar notification badge */

        if (sidebarNotificationBadge) {

            sidebarNotificationBadge.textContent = count;

            sidebarNotificationBadge.style.display =
                count > 0 ? 'inline-block' : 'none';

        }


        /* Summary */

        if (notificationSummary) {

            notificationSummary.textContent =
                count > 0
                    ? `${count} unread`
                    : `You're all caught up`;

        }


        /* Mark all button */

        if (markAllRead) {

            markAllRead.style.display =
                count > 0 ? 'block' : 'none';

        }

    }


    /* =========================================
       OPEN / CLOSE NOTIFICATION DROPDOWN
    ========================================== */

    if (bellBtn && notificationDropdown) {

        bellBtn.addEventListener('click', function (event) {

            event.stopPropagation();


            /* Close user dropdown */

            if (userMenu) {

                userMenu.classList.remove('open');

            }


            const isOpen =
                notificationDropdown.classList.toggle('show');


            bellBtn.setAttribute(
                'aria-expanded',
                isOpen ? 'true' : 'false'
            );

        });

    }


    /* =========================================
       PREVENT DROPDOWN CLICK FROM CLOSING
    ========================================== */

    if (notificationDropdown) {

        notificationDropdown.addEventListener(
            'click',
            function (event) {

                event.stopPropagation();

            }
        );

    }


    /* =========================================
       MARK SINGLE NOTIFICATION AS READ
    ========================================== */

    document
        .querySelectorAll('.notification-item.unread')
        .forEach(function (item) {

            item.addEventListener('click', function () {

                const notificationId =
                    this.dataset.notificationId;


                if (!notificationId) {
                    return;
                }


                /* Prevent double click */

                if (this.dataset.reading === 'true') {
                    return;
                }

                this.dataset.reading = 'true';


                fetch(
                    `/buyer/notifications/${notificationId}/read`,
                    {
                        method: 'POST',

                        headers: {
                            'X-CSRF-TOKEN': csrfToken,
                            'Accept': 'application/json',
                            'Content-Type': 'application/json'
                        },

                        body: JSON.stringify({})
                    }
                )
                .then(function (response) {

                    if (!response.ok) {
                        throw new Error(
                            'Failed to mark notification as read.'
                        );
                    }

                    return response.json();

                })
                .then(function (data) {

                    item.classList.remove('unread');

                    item.classList.add('read');


                    const unreadDot =
                        item.querySelector('.unread-dot');

                    if (unreadDot) {

                        unreadDot.remove();

                    }


                    updateNotificationCount(
                        data.unreadCount ?? null
                    );

                })
                .catch(function (error) {

                    console.error(
                        'Notification error:',
                        error
                    );

                    item.dataset.reading = 'false';

                });

            });

        });


    /* =========================================
       MARK ALL NOTIFICATIONS AS READ
    ========================================== */

    if (markAllRead) {

        markAllRead.addEventListener(
            'click',
            function (event) {

                event.stopPropagation();


                markAllRead.disabled = true;


                fetch(
                    '/buyer/notifications/mark-all-read',
                    {
                        method: 'POST',

                        headers: {
                            'X-CSRF-TOKEN': csrfToken,
                            'Accept': 'application/json',
                            'Content-Type': 'application/json'
                        },

                        body: JSON.stringify({})
                    }
                )
                .then(function (response) {

                    if (!response.ok) {

                        throw new Error(
                            'Failed to mark all notifications as read.'
                        );

                    }

                    return response.json();

                })
                .then(function (data) {

                    document
                        .querySelectorAll(
                            '.notification-item.unread'
                        )
                        .forEach(function (item) {

                            item.classList.remove('unread');

                            item.classList.add('read');


                            const unreadDot =
                                item.querySelector('.unread-dot');

                            if (unreadDot) {

                                unreadDot.remove();

                            }

                        });


                    updateNotificationCount(0);

                    markAllRead.disabled = false;

                })
                .catch(function (error) {

                    console.error(
                        'Mark all notification error:',
                        error
                    );

                    markAllRead.disabled = false;

                });

            }
        );

    }


    /* =========================================
       USER DROPDOWN
    ========================================== */

    if (userMenu && userChip) {

        userChip.addEventListener(
            'click',
            function (event) {

                event.stopPropagation();


                /* Close notification dropdown */

                if (notificationDropdown) {

                    notificationDropdown.classList.remove('show');

                }

                if (bellBtn) {

                    bellBtn.setAttribute(
                        'aria-expanded',
                        'false'
                    );

                }


                userMenu.classList.toggle('open');

            }
        );

    }


    /* =========================================
       CLOSE MENUS WHEN CLICKING OUTSIDE
    ========================================== */

    document.addEventListener(
        'click',
        function (event) {


            /* Close notification */

            if (
                notificationWrapper &&
                !notificationWrapper.contains(event.target)
            ) {

                if (notificationDropdown) {

                    notificationDropdown.classList.remove('show');

                }

                if (bellBtn) {

                    bellBtn.setAttribute(
                        'aria-expanded',
                        'false'
                    );

                }

            }


            /* Close user menu */

            if (
                userMenu &&
                !userMenu.contains(event.target)
            ) {

                userMenu.classList.remove('open');

            }


            /* Close sidebar on mobile */

            if (
                sidebar &&
                hamburgerBtn &&
                !sidebar.contains(event.target) &&
                !hamburgerBtn.contains(event.target)
            ) {

                sidebar.classList.remove('open');

            }

        }
    );


    /* =========================================
       CONVERSATION SEARCH
    ========================================== */

    const conversationSearch =
        document.getElementById('conversationSearch');

    const conversationItems =
        document.querySelectorAll('.conv-item');


    if (conversationSearch) {

        conversationSearch.addEventListener(
            'input',
            function () {

                const searchValue =
                    this.value.toLowerCase().trim();


                conversationItems.forEach(
                    function (item) {

                        const name =
                            item.dataset.name || '';

                        const text =
                            item.textContent.toLowerCase();


                        if (
                            name.includes(searchValue) ||
                            text.includes(searchValue)
                        ) {

                            item.style.display = 'flex';

                        } else {

                            item.style.display = 'none';

                        }

                    }
                );

            }
        );

    }


    /* =========================================
       SCROLL CHAT TO BOTTOM
    ========================================== */

    const chatBody =
        document.getElementById('chatBody');

    if (chatBody) {

        chatBody.scrollTop =
            chatBody.scrollHeight;

    }


    /* =========================================
       INITIAL NOTIFICATION COUNT
    ========================================== */

    updateNotificationCount();

});

</script>

</body>
</html>
