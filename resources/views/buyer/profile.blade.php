<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>AniLink — My Profile</title>

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

        h1,
        h2 {
            font-family: "Fraunces", serif;
        }

        a {
            color: inherit;
            text-decoration: none;
        }

        button,
        input,
        textarea {
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

        /* =========================
           MAIN
        ========================= */

        .main {
            flex: 1;
            min-width: 0;
            padding: 22px 32px 48px;
        }

        /* =========================
           TOPBAR
        ========================= */

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
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: var(--card);
            border: 1px solid var(--line);
            cursor: pointer;
        }

        .hamburger:hover {
            background: var(--brand-green-soft);
        }

        .searchbar {
            flex: 1;
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
            margin-left: auto;
            flex: 0 0 auto;
        }

        /* =========================
           NOTIFICATION BELL
        ========================= */

        .bell-wrap {
            position: relative;
        }

        .bell-button {
            width: 40px;
            height: 40px;
            border: none;
            background: transparent;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            color: var(--ink);
            position: relative;
        }

        .bell-button:hover {
            background: rgba(95, 156, 63, 0.08);
        }

        .bell-button svg {
            width: 21px;
            height: 21px;
        }

        .bell-dot {
            position: absolute;
            top: 0;
            right: 0;
            min-width: 18px;
            height: 18px;
            padding: 0 4px;
            background: var(--brand-green);
            color: #102410;
            border-radius: 999px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 9px;
            font-weight: 800;
        }

        .bell-dropdown {
            position: absolute;
            top: calc(100% + 10px);
            right: -80px;
            width: 360px;
            background: white;
            border: 1px solid var(--line);
            border-radius: 16px;
            box-shadow: 0 15px 40px rgba(23, 51, 33, 0.16);
            overflow: hidden;
            z-index: 9999;

            opacity: 0;
            visibility: hidden;
            transform: translateY(-8px);
            transition: 0.2s;
        }

        .bell-wrap.open .bell-dropdown {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }

        .notification-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 15px 17px;
            border-bottom: 1px solid var(--line);
        }

        .notification-header strong {
            font-size: 14px;
        }

        .mark-all-btn {
            border: none;
            background: transparent;
            color: var(--brand-green);
            font-size: 11px;
            font-weight: 700;
            cursor: pointer;
        }

        .mark-all-btn:hover {
            text-decoration: underline;
        }

        .notification-list {
            max-height: 390px;
            overflow-y: auto;
        }

        .notification-item {
            display: flex;
            gap: 11px;
            padding: 13px 15px;
            border-bottom: 1px solid #f0eee8;
            transition: 0.2s;
        }

        .notification-item:hover {
            background: #fafbf8;
        }

        .notification-item.unread {
            background: #f4f8f0;
        }

        .notification-icon {
            width: 36px;
            height: 36px;
            flex: 0 0 36px;
            border-radius: 10px;
            background: var(--brand-green-soft);
            color: var(--brand-green);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .notification-icon svg {
            width: 18px;
            height: 18px;
        }

        .notification-content {
            min-width: 0;
            flex: 1;
        }

        .notification-title {
            font-size: 12px;
            font-weight: 800;
            margin-bottom: 3px;
        }

        .notification-message {
            color: var(--ink-soft);
            font-size: 11px;
            line-height: 1.5;
        }

        .notification-time {
            color: #89958c;
            font-size: 10px;
            margin-top: 5px;
        }

        .read-btn {
            border: none;
            background: transparent;
            color: var(--brand-green);
            font-size: 10px;
            font-weight: 700;
            cursor: pointer;
            margin-top: 5px;
            padding: 0;
        }

        .read-btn:hover {
            text-decoration: underline;
        }

        .notification-empty {
            padding: 35px 20px;
            text-align: center;
            color: var(--ink-soft);
            font-size: 12px;
        }

        .notification-footer {
            display: block;
            text-align: center;
            padding: 12px;
            border-top: 1px solid var(--line);
            color: var(--brand-green);
            font-size: 12px;
            font-weight: 700;
        }

        .notification-footer:hover {
            background: var(--brand-green-soft);
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
        }

        .user-chip:hover {
            background: rgba(95, 156, 63, 0.08);
        }

        .user-arrow {
            transition: 0.2s;
        }

        .user-menu.open .user-arrow {
            transform: rotate(180deg);
        }

        .avatar {
            width: 38px;
            height: 38px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            background: var(--brand-green);
            color: white;
            font-size: 13px;
            font-weight: 800;
        }

        .user-name {
            font-weight: 700;
            font-size: 14px;
        }

        .user-role {
            font-size: 12px;
            color: var(--ink-soft);
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
            box-shadow: 0 12px 35px rgba(23, 51, 33, 0.15);
            z-index: 9999;

            opacity: 0;
            visibility: hidden;
            transform: translateY(-8px);
            transition: 0.2s;
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
            cursor: pointer;
            text-align: left;
        }

        .dropdown-link:hover {
            background: #f1f6ed;
            color: #3f7d20;
        }

        .dropdown-link svg {
            width: 19px;
            height: 19px;
        }

        .logout-button {
            color: var(--red);
        }

        .logout-button:hover {
            background: #fff0f0;
            color: var(--red);
        }

        .logout-form {
            margin: 0;
        }

        /* =========================
           PAGE HEADER
        ========================= */

        .page-header {
            margin-bottom: 20px;
        }

        .page-header h1 {
            margin: 0 0 5px;
            font-size: 28px;
            font-weight: 600;
        }

        .page-header p {
            margin: 0;
            color: var(--ink-soft);
            font-size: 14px;
        }

        /* =========================
           PROFILE
        ========================= */

        .profile-layout {
            display: grid;
            grid-template-columns: 300px 1fr;
            gap: 20px;
            max-width: 1050px;
        }

        .profile-card {
            background: white;
            border: 1px solid var(--line);
            border-radius: var(--radius-lg);
            box-shadow: var(--shadow-card);
            padding: 28px;
            height: fit-content;
        }

        .profile-main {
            text-align: center;
        }

        .big-avatar {
            width: 105px;
            height: 105px;
            border-radius: 50%;
            margin: 0 auto 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: var(--brand-green);
            color: white;
            font-size: 30px;
            font-weight: 800;
        }

        .profile-main h2 {
            margin: 0 0 5px;
            font-size: 21px;
            font-weight: 600;
        }

        .profile-main .role {
            color: var(--brand-green);
            font-size: 13px;
            font-weight: 700;
            text-transform: capitalize;
        }

        .profile-main .email {
            margin-top: 7px;
            color: var(--ink-soft);
            font-size: 12px;
            word-break: break-word;
        }

        .profile-divider {
            height: 1px;
            background: var(--line);
            margin: 24px 0;
        }

        .profile-stat {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 10px 0;
        }

        .stat-icon {
            width: 38px;
            height: 38px;
            border-radius: 10px;
            background: var(--brand-green-soft);
            color: var(--brand-green);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .stat-text strong {
            display: block;
            font-size: 13px;
        }

        .stat-text span {
            display: block;
            font-size: 11px;
            color: var(--ink-soft);
            margin-top: 2px;
        }

        /* =========================
           INFORMATION CARD
        ========================= */

        .info-card {
            background: white;
            border: 1px solid var(--line);
            border-radius: var(--radius-lg);
            box-shadow: var(--shadow-card);
            padding: 28px;
        }

        .section-title {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 22px;
        }

        .section-title h2 {
            margin: 0;
            font-size: 21px;
            font-weight: 600;
        }

        .section-title p {
            margin: 4px 0 0;
            color: var(--ink-soft);
            font-size: 12px;
        }

        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 18px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 7px;
        }

        .form-group.full {
            grid-column: 1 / -1;
        }

        .form-group label {
            font-size: 12px;
            font-weight: 700;
            color: #3e4d43;
        }

        .form-group input,
        .form-group textarea {
            width: 100%;
            border: 1px solid var(--line);
            background: #fafbf8;
            border-radius: 10px;
            padding: 12px 13px;
            outline: none;
            font-size: 13px;
            color: var(--ink);
            transition: 0.2s;
        }

        .form-group textarea {
            min-height: 95px;
            resize: vertical;
        }

        .form-group input:focus,
        .form-group textarea:focus {
            border-color: var(--brand-green);
            background: white;
            box-shadow: 0 0 0 3px rgba(95, 156, 63, 0.08);
        }

        .save-area {
            display: flex;
            justify-content: flex-end;
            margin-top: 25px;
            padding-top: 20px;
            border-top: 1px solid var(--line);
        }

        .save-btn {
            border: none;
            background: var(--brand-green);
            color: white;
            padding: 11px 20px;
            border-radius: 10px;
            font-size: 13px;
            font-weight: 700;
            cursor: pointer;
            transition: 0.2s;
        }

        .save-btn:hover {
            background: #4f8a32;
        }

        /* =========================
           SUCCESS
        ========================= */

        .success-message {
            background: var(--brand-green-soft);
            border: 1px solid #cfe3bf;
            color: #356329;
            padding: 12px 15px;
            border-radius: 10px;
            font-size: 13px;
            margin-bottom: 18px;
        }

        /* =========================
           ERROR
        ========================= */

        .error-message {
            background: #fff0f0;
            border: 1px solid #f0c8c8;
            color: #a53636;
            padding: 12px 15px;
            border-radius: 10px;
            font-size: 13px;
            margin-bottom: 18px;
        }

        /* =========================
           RESPONSIVE
        ========================= */

        @media (max-width: 900px) {
            .profile-layout {
                grid-template-columns: 1fr;
            }

            .profile-card {
                max-width: none;
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
                box-shadow: 10px 0 30px rgba(0, 0, 0, 0.25);
            }

            .main {
                padding: 16px;
            }
        }

        @media (max-width: 650px) {
            .searchbar {
                display: none;
            }

            .user-name,
            .user-role,
            .user-arrow {
                display: none;
            }

            .topbar {
                gap: 10px;
            }

            .form-grid {
                grid-template-columns: 1fr;
            }

            .form-group.full {
                grid-column: auto;
            }

            .profile-card,
            .info-card {
                padding: 20px;
            }

            .bell-dropdown {
                position: fixed;
                top: 70px;
                right: 12px;
                left: 12px;
                width: auto;
            }
        }
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


/* Dropdown */

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

    border: 1px solid #e5e8e2;

    overflow: hidden;

    z-index: 9999;

    display: none;
}

.notification-dropdown.show {
    display: block;
}


/* Header */

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


/* Notification list */

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


/* Icon */

.notification-icon {
    width: 38px;
    height: 38px;

    flex-shrink: 0;

    display: flex;
    align-items: center;
    justify-content: center;

    background: #e8f1e2;

    border-radius: 50%;

    font-size: 18px;
}


/* Content */

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


/* Unread indicator */

.unread-dot {
    width: 8px;
    height: 8px;

    background: #5f9c3f;

    border-radius: 50%;

    position: absolute;

    right: 15px;
    top: 20px;
}


/* Empty */

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
    </style>
</head>

<body>

<div class="app">

    <!-- =========================
         SIDEBAR
    ========================== -->

    <aside class="sidebar" id="sidebar">

        <div class="brand">
            <span class="brand-mark">🌾</span>

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

                <svg viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2"
                    stroke-linecap="round"
                    stroke-linejoin="round">

                    <path d="M3 10.5 12 3l9 7.5"/>
                    <path d="M5 9.5V21h14V9.5"/>

                </svg>

                Dashboard
            </a>


            <!-- Marketplace -->
            <a href="/buyer/marketplace" class="navitem">

                <svg viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2"
                    stroke-linecap="round"
                    stroke-linejoin="round">

                    <path d="M4 8h16l-1.5 11a2 2 0 0 1-2 1.8H7.5a2 2 0 0 1-2-1.8L4 8Z"/>
                    <path d="M8 8V6a4 4 0 0 1 8 0v2"/>

                </svg>

                Marketplace
            </a>


            <!-- My Orders -->
            <a href="/buyer/my-orders" class="navitem">

                <svg viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2"
                    stroke-linecap="round"
                    stroke-linejoin="round">

                    <rect x="3.5" y="7" width="17" height="13" rx="2"/>
                    <path d="M8 7V5a4 4 0 0 1 8 0v2"/>

                </svg>

                My Orders
            </a>


            <!-- Favorites -->
            <a href="/buyer/favorites" class="navitem">

                <svg viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2"
                    stroke-linecap="round"
                    stroke-linejoin="round">

                    <path d="M12 21s-7.5-4.6-10-9.2C.3 8.1 2 4.5 5.5 4A5.4 5.4 0 0 1 12 7a5.4 5.4 0 0 1 6.5-3C22 4.5 23.7 8.1 22 11.8 19.5 16.4 12 21 12 21Z"/>

                </svg>

                Favorites
            </a>


            <!-- Messages -->
            <a href="/buyer/messages" class="navitem">

                <svg viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2"
                    stroke-linecap="round"
                    stroke-linejoin="round">

                    <path d="M21 15a2 2 0 0 1-2 2H8l-5 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2v10Z"/>

                </svg>

                Messages

                @if(isset($unreadMessagesCount) && $unreadMessagesCount > 0)
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
                    <path d="M4 6h16M4 12h16M4 18h16"/>
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

                        <circle cx="11" cy="11" r="7"/>
                        <path d="m21 21-4.3-4.3"/>

                    </svg>

                </button>

            </div>


            <!-- TOP ACTIONS -->

            <div class="top-actions">

                <!-- =========================
                     FUNCTIONAL NOTIFICATION BELL
                ========================== -->

                <div class="bell-wrap" id="bellWrap">

                    <button
                        type="button"
                        class="bell-button"
                        id="bellButton"
                        aria-label="Notifications"
                    >

                        <svg
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


                        @if(isset($notificationCount) && $notificationCount > 0)

                            <span class="bell-dot">

                                {{ $notificationCount > 99 ? '99+' : $notificationCount }}

                            </span>

                        @endif

                    </button>


                    <!-- NOTIFICATION DROPDOWN -->

                    <div
                        class="bell-dropdown"
                        id="bellDropdown"
                    >

                        <div class="notification-header">

                            <strong>
                                Notifications
                            </strong>

                            @if(isset($notificationCount) && $notificationCount > 0)

                                <form
                                    action="{{ route('notifications.readAll') }}"
                                    method="POST"
                                >

                                    @csrf

                                    <button
                                        type="submit"
                                        class="mark-all-btn"
                                    >
                                        Mark all as read
                                    </button>

                                </form>

                            @endif

                        </div>


                        <div class="notification-list">

                            @forelse($notifications ?? [] as $notification)

                                <div
                                    class="notification-item {{ is_null($notification->read_at) ? 'unread' : '' }}"
                                >

                                    <!-- ICON -->

                                    <div class="notification-icon">

                                        @if($notification->icon === 'check-circle')

                                            <svg viewBox="0 0 24 24" fill="none"
                                                stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round"
                                                stroke-linejoin="round">

                                                <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/>
                                                <path d="m9 11 3 3L22 4"/>

                                            </svg>

                                        @elseif($notification->icon === 'truck')

                                            <svg viewBox="0 0 24 24" fill="none"
                                                stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round"
                                                stroke-linejoin="round">

                                                <path d="M3 7h11v10H3z"/>
                                                <path d="M14 10h4l3 3v4h-7z"/>
                                                <circle cx="7" cy="19" r="2"/>
                                                <circle cx="17" cy="19" r="2"/>

                                            </svg>

                                        @elseif($notification->icon === 'package-check')

                                            <svg viewBox="0 0 24 24" fill="none"
                                                stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round"
                                                stroke-linejoin="round">

                                                <path d="m16.5 9.4-9-5.19"/>
                                                <path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16Z"/>
                                                <path d="m9 12 2 2 4-4"/>

                                            </svg>

                                        @elseif($notification->icon === 'shopping-bag')

                                            <svg viewBox="0 0 24 24" fill="none"
                                                stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round"
                                                stroke-linejoin="round">

                                                <path d="M6 8h12l1 12H5L6 8Z"/>
                                                <path d="M9 8V6a3 3 0 0 1 6 0v2"/>

                                            </svg>

                                        @elseif($notification->icon === 'shopping-cart')

                                            <svg viewBox="0 0 24 24" fill="none"
                                                stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round"
                                                stroke-linejoin="round">

                                                <circle cx="9" cy="20" r="1"/>
                                                <circle cx="18" cy="20" r="1"/>
                                                <path d="M3 4h2l2.5 11h10l2-8H6"/>

                                            </svg>

                                        @elseif($notification->icon === 'star')

                                            <svg viewBox="0 0 24 24" fill="none"
                                                stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round"
                                                stroke-linejoin="round">

                                                <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/>

                                            </svg>

                                        @elseif($notification->icon === 'wallet')

                                            <svg viewBox="0 0 24 24" fill="none"
                                                stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round"
                                                stroke-linejoin="round">

                                                <path d="M20 7V6a2 2 0 0 0-2-2H5a3 3 0 0 0 0 6h15v9a2 2 0 0 1-2 2H5a3 3 0 0 1-3-3V7"/>
                                                <path d="M16 14h.01"/>

                                            </svg>

                                        @elseif($notification->icon === 'message-square')

                                            <svg viewBox="0 0 24 24" fill="none"
                                                stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round"
                                                stroke-linejoin="round">

                                                <path d="M21 15a2 2 0 0 1-2 2H8l-5 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2v10Z"/>

                                            </svg>

                                        @else

                                            <svg viewBox="0 0 24 24" fill="none"
                                                stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round"
                                                stroke-linejoin="round">

                                                <path d="M18 8a6 6 0 1 0-12 0c0 7-3 9-3 9h18s-3-2-3-9"/>
                                                <path d="M13.7 21a2 2 0 0 1-3.4 0"/>

                                            </svg>

                                        @endif

                                    </div>


                                    <!-- CONTENT -->

                                    <div class="notification-content">

                                        <div class="notification-title">

                                            {{ $notification->title }}

                                        </div>

                                        <div class="notification-message">

                                            {{ $notification->message }}

                                        </div>

                                        <div class="notification-time">

                                            {{ $notification->created_at->diffForHumans() }}

                                        </div>


                                        @if(is_null($notification->read_at))

                                            <form
                                                action="{{ route('notifications.read', $notification->id) }}"
                                                method="POST"
                                            >

                                                @csrf

                                                <button
                                                    type="submit"
                                                    class="read-btn"
                                                >
                                                    Mark as read
                                                </button>

                                            </form>

                                        @endif

                                    </div>

                                </div>

                            @empty

                                <div class="notification-empty">

                                    🔔

                                    <br><br>

                                    You're all caught up!

                                </div>

                            @endforelse

                        </div>


                    </div>

                </div>


                <!-- =========================
                     USER
                ========================== -->

                @auth

                <div class="user-menu" id="userMenu">

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

                            <div class="avatar">

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
                            href="{{ route('buyer.profile') }}"
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

                                <circle cx="12" cy="8" r="4"/>
                                <path d="M4 21a8 8 0 0 1 16 0"/>

                            </svg>

                            My Profile

                        </a>


                        <!-- Settings -->

                        <a
                            href="{{ route('buyer.settings') }}"
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

                                <circle cx="12" cy="12" r="3"/>

                                <path d="M19.4 15a1.7 1.7 0 0 0 .3 1.9l.1.1-1.5 1.5-.1-.1a1.7 1.7 0 0 0-1.9-.3 1.7 1.7 0 0 0-1 1.6V20h-2.1v-.2a1.7 1.7 0 0 0-1-1.6 1.7 1.7 0 0 0-1.9.3l-.1.1-1.5-1.5.1-.1a1.7 1.7 0 0 0 .3-1.9 1.7 1.7 0 0 0-1.6-1H5v-2.1h.2a1.7 1.7 0 0 0 1.6-1 1.7 1.7 0 0 0-.3-1.9l-.1-.1 1.5-1.5.1.1a1.7 1.7 0 0 0 1.9.3 1.7 1.7 0 0 0 1.9-0.3l.1-.1 1.5 1.5-.1.1a1.7 1.7 0 0 0-.3 1.9 1.7 1.7 0 0 0 1.6 1h.2v2.1h-.2a1.7 1.7 0 0 0-1.6 1z"/>

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

                @endauth

            </div>

        </div>


        <!-- =========================
             PAGE HEADER
        ========================== -->

        <div class="page-header">

            <h1>
                My Profile
            </h1>

            <p>
                Manage your personal information and account details.
            </p>

        </div>


        <!-- SUCCESS -->

        @if(session('success'))

            <div class="success-message">

                {{ session('success') }}

            </div>

        @endif


        <!-- ERRORS -->

        @if($errors->any())

            <div class="error-message">

                <strong>
                    Please check the following:
                </strong>

                <ul style="margin: 7px 0 0 18px; padding: 0;">

                    @foreach($errors->all() as $error)

                        <li>
                            {{ $error }}
                        </li>

                    @endforeach

                </ul>

            </div>

        @endif


        <!-- =========================
             PROFILE CONTENT
        ========================== -->

        <div class="profile-layout">


            <!-- LEFT PROFILE CARD -->

            <div class="profile-card">

                <div class="profile-main">

                    <div class="big-avatar">

                        {{ strtoupper(substr(Auth::user()->first_name, 0, 1)) }}{{ strtoupper(substr(Auth::user()->last_name, 0, 1)) }}

                    </div>


                    <h2>

                        {{ Auth::user()->first_name }}
                        {{ Auth::user()->last_name }}

                    </h2>


                    <div class="role">

                        {{ Auth::user()->role }}

                    </div>


                    <div class="email">

                        {{ Auth::user()->email }}

                    </div>

                </div>


                <div class="profile-divider"></div>


                <!-- Account -->

                <div class="profile-stat">

                    <div class="stat-icon">

                        <svg
                            width="19"
                            height="19"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                        >

                            <circle cx="12" cy="8" r="4"/>
                            <path d="M4 21a8 8 0 0 1 16 0"/>

                        </svg>

                    </div>


                    <div class="stat-text">

                        <strong>
                            Account Type
                        </strong>

                        <span>
                            {{ ucfirst(Auth::user()->role) }} Account
                        </span>

                    </div>

                </div>


                <!-- Email -->

                <div class="profile-stat">

                    <div class="stat-icon">

                        <svg
                            width="19"
                            height="19"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                        >

                            <rect
                                x="3"
                                y="5"
                                width="18"
                                height="14"
                                rx="2"
                            />

                            <path d="m3 7 9 6 9-6"/>

                        </svg>

                    </div>


                    <div class="stat-text">

                        <strong>
                            Email
                        </strong>

                        <span>
                            {{ Auth::user()->email }}
                        </span>

                    </div>

                </div>


                <!-- Location -->

                <div class="profile-stat">

                    <div class="stat-icon">

                        <svg
                            width="19"
                            height="19"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="currentColor"
                            stroke-width="2"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                        >

                            <path d="M20 10c0 5-8 11-8 11S4 15 4 10a8 8 0 1 1 16 0Z"/>

                            <circle
                                cx="12"
                                cy="10"
                                r="2.5"
                            />

                        </svg>

                    </div>


                    <div class="stat-text">

                        <strong>
                            Location
                        </strong>

                        <span>
                            {{ Auth::user()->address ?? 'No address added' }}
                        </span>

                    </div>

                </div>

            </div>


            <!-- =========================
                 RIGHT INFORMATION CARD
            ========================== -->

            <div class="info-card">

                <div class="section-title">

                    <div>

                        <h2>
                            Personal Information
                        </h2>

                        <p>
                            Update the information connected to your AniLink account.
                        </p>

                    </div>

                </div>


                <!-- PROFILE FORM -->

                <form
                    action="{{ route('buyer.profile.update') }}"
                    method="POST"
                >

                    @csrf
                    @method('PUT')


                    <div class="form-grid">


                        <!-- First Name -->

                        <div class="form-group">

                            <label for="first_name">
                                First Name
                            </label>

                            <input
                                type="text"
                                id="first_name"
                                name="first_name"
                                value="{{ old('first_name', Auth::user()->first_name) }}"
                                required
                            >

                        </div>


                        <!-- Last Name -->

                        <div class="form-group">

                            <label for="last_name">
                                Last Name
                            </label>

                            <input
                                type="text"
                                id="last_name"
                                name="last_name"
                                value="{{ old('last_name', Auth::user()->last_name) }}"
                                required
                            >

                        </div>


                        <!-- Email -->

                        <div class="form-group">

                            <label for="email">
                                Email Address
                            </label>

                            <input
                                type="email"
                                id="email"
                                name="email"
                                value="{{ old('email', Auth::user()->email) }}"
                                required
                            >

                        </div>


                        <!-- Phone -->

                        <div class="form-group">

                            <label for="phone">
                                Contact Number
                            </label>

                            <input
                                type="text"
                                id="phone"
                                name="phone"
                                value="{{ old('phone', Auth::user()->phone ?? '') }}"
                                placeholder="Enter your contact number"
                                required
                            >

                        </div>


                        <!-- Address -->

                        <div class="form-group full">

                            <label for="address">
                                Address / Location
                            </label>

                            <textarea
                                id="address"
                                name="address"
                                placeholder="Enter your address or location"
                            >{{ old('address', Auth::user()->address ?? '') }}</textarea>

                        </div>


                        <!-- Role -->

                        <div class="form-group">

                            <label for="role">
                                Account Role
                            </label>

                            <input
                                type="text"
                                id="role"
                                value="{{ ucfirst(Auth::user()->role) }}"
                                disabled
                            >

                        </div>


                        <!-- Account ID -->

                        <div class="form-group">

                            <label for="account_id">
                                Account ID
                            </label>

                            <input
                                type="text"
                                id="account_id"
                                value="{{ Auth::user()->id }}"
                                disabled
                            >

                        </div>

                    </div>


                    <!-- SAVE -->

                    <div class="save-area">

                        <button
                            type="submit"
                            class="save-btn"
                        >
                            Save Changes
                        </button>

                    </div>

                </form>

            </div>

        </div>

    </main>

</div>


<script>

    /* =========================
       MOBILE SIDEBAR
    ========================= */

    const hamburgerBtn =
        document.getElementById("hamburgerBtn");

    const sidebar =
        document.getElementById("sidebar");

    if (hamburgerBtn && sidebar) {

        hamburgerBtn.addEventListener("click", function (event) {

            event.stopPropagation();

            sidebar.classList.toggle("open");

        });

    }


    /* =========================
       USER DROPDOWN
    ========================= */

    const userMenu =
        document.getElementById("userMenu");

    const userChip =
        document.getElementById("userChip");

    const userDropdown =
        document.getElementById("userDropdown");


    if (userChip) {

        userChip.addEventListener("click", function (event) {

            event.stopPropagation();

            /* Close notification dropdown */

            if (bellWrap) {
                bellWrap.classList.remove("open");
            }

            userMenu.classList.toggle("open");

        });

    }


    if (userDropdown) {

        userDropdown.addEventListener("click", function (event) {

            event.stopPropagation();

        });

    }


    /* =========================
       NOTIFICATION DROPDOWN
    ========================= */

    const bellWrap =
        document.getElementById("bellWrap");

    const bellButton =
        document.getElementById("bellButton");

    const bellDropdown =
        document.getElementById("bellDropdown");


    if (bellButton) {

        bellButton.addEventListener("click", function (event) {

            event.stopPropagation();

            /* Close user dropdown */

            if (userMenu) {
                userMenu.classList.remove("open");
            }

            bellWrap.classList.toggle("open");

        });

    }


    if (bellDropdown) {

        bellDropdown.addEventListener("click", function (event) {

            event.stopPropagation();

        });

    }


    /* =========================
       CLOSE MENUS
    ========================= */

    document.addEventListener("click", function () {

        if (userMenu) {

            userMenu.classList.remove("open");

        }

        if (bellWrap) {

            bellWrap.classList.remove("open");

        }

    });

</script>

</body>

</html>