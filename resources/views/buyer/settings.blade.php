{{-- resources/views/buyer/settings.blade.php --}}

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>AniLink PH - Buyer Settings</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link
        href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Fraunces:opsz,wght@9..144,500;9..144,600&display=swap"
        rel="stylesheet">

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
            --danger: #b43d3d;
            --radius-lg: 20px;
            --shadow-card: 0 2px 10px rgba(23, 51, 33, 0.06);
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

        .dashboard-layout {
            display: flex;
            min-height: 100vh;
        }

        /* SIDEBAR */

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
            z-index: 100;
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
            text-decoration: none;
            transition: 0.2s;
        }

        .navitem svg {
            width: 20px;
            height: 20px;
            flex: 0 0 20px;
        }

        .navitem:hover {
            background: rgba(255,255,255,0.06);
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

        /* MAIN */

        .main-content {
            flex: 1;
            min-width: 0;
        }

        /* TOPBAR */

        .topbar {
            height: 76px;
            background: #ffffff;
            border-bottom: 1px solid var(--line);
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
            transform: translateY(-50%);
            width: 19px;
            height: 19px;
            color: #89958d;
        }

        .search-wrapper input {
            width: 100%;
            height: 44px;
            border: 1px solid var(--line);
            border-radius: 12px;
            background: #f8f8f4;
            padding: 0 16px 0 44px;
            font-family: inherit;
            font-size: 13px;
            outline: none;
        }

        .search-wrapper input:focus {
            border-color: var(--brand-green);
            background: #ffffff;
        }

        .topbar-right {
            margin-left: auto;
            display: flex;
            align-items: center;
            gap: 18px;
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


        /* NOTIFICATIONS */

        .notification-wrapper {
            position: relative;
        }

        .notification-btn {
            width: 40px;
            height: 40px;
            border: none;
            background: #f4f6f1;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            position: relative;
        }

        .notification-btn:hover {
            background: #e8f2df;
        }

        .notification-btn svg {
            width: 20px;
            height: 20px;
            color: #405047;
        }

        .notification-count {
            position: absolute;
            top: -2px;
            right: -2px;
            min-width: 18px;
            height: 18px;
            padding: 0 4px;
            background: #e55353;
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 9px;
            font-weight: 800;
            border: 2px solid white;
        }

        .notification-dropdown {
            position: absolute;
            top: 52px;
            right: 0;
            width: 370px;
            max-width: calc(100vw - 30px);
            background: #ffffff;
            border: 1px solid var(--line);
            border-radius: 16px;
            box-shadow: 0 12px 35px rgba(23, 51, 33, 0.15);
            overflow: hidden;
            z-index: 2000;
            opacity: 0;
            visibility: hidden;
            transform: translateY(-8px);
            transition: all 0.2s ease;
        }

        .notification-dropdown.show {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }

        .notification-header {
            padding: 16px 18px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-bottom: 1px solid var(--line);
            gap: 15px;
        }

        .notification-header h3 {
            font-size: 16px;
            font-weight: 800;
            color: #23382a;
        }

        .notification-header span {
            display: block;
            margin-top: 3px;
            font-size: 11px;
            color: #7a867e;
        }

        .mark-all-read {
            border: none;
            background: transparent;
            color: var(--brand-green);
            font-size: 11px;
            font-weight: 700;
            cursor: pointer;
        }

        .mark-all-read:hover {
            color: #3f7d20;
            text-decoration: underline;
        }

        .notification-list {
            max-height: 360px;
            overflow-y: auto;
        }

        .notification-item {
            position: relative;
            display: flex;
            gap: 12px;
            padding: 15px 18px;
            border-bottom: 1px solid #f0eee8;
        }

        .notification-item:hover {
            background: #f7f9f4;
        }

        .notification-item.unread {
            background: #f1f7ec;
        }

        .notification-item.read {
            background: #ffffff;
        }

        .notification-icon {
            width: 38px;
            height: 38px;
            min-width: 38px;
            border-radius: 50%;
            background: var(--brand-green-soft);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 17px;
        }

        .notification-content {
            flex: 1;
        }

        .notification-content strong {
            display: block;
            font-size: 12px;
            font-weight: 800;
            color: #293d2e;
            margin-bottom: 3px;
        }

        .notification-content p {
            margin: 0 0 4px;
            font-size: 11px;
            line-height: 1.5;
            color: #68756c;
        }

        .notification-content small {
            font-size: 10px;
            color: #9aa39d;
        }

        .unread-dot {
            width: 7px;
            height: 7px;
            border-radius: 50%;
            background: var(--brand-green);
            position: absolute;
            top: 20px;
            right: 14px;
        }

        .notification-footer {
            padding: 12px;
            text-align: center;
            border-top: 1px solid var(--line);
            background: #fafbf8;
        }

        .notification-footer span {
            font-size: 10px;
            color: #89958d;
        }

        .notification-empty {
            padding: 35px 20px;
            text-align: center;
        }

        .notification-empty-icon {
            font-size: 32px;
            margin-bottom: 10px;
        }

        .notification-empty strong {
            display: block;
            color: #293d2e;
            font-size: 13px;
            margin-bottom: 5px;
        }

        .notification-empty p {
            color: #89958d;
            font-size: 11px;
        }

        /* PROFILE */

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
        }

        .profile-chip:hover {
            background: rgba(95, 156, 63, 0.08);
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
            transition: transform 0.2s ease;
        }

        .profile-wrapper.open .profile-arrow {
            transform: rotate(180deg);
        }

        .profile-dropdown {
            position: absolute;
            top: calc(100% + 10px);
            right: 0;
            width: 270px;
            background: white;
            border: 1px solid #e7e3d8;
            border-radius: 16px;
            box-shadow: 0 12px 35px rgba(23, 51, 33, 0.15);
            padding: 10px;
            z-index: 1000;
            opacity: 0;
            visibility: hidden;
            transform: translateY(-8px);
            transition: all 0.2s ease;
        }

        .profile-wrapper.open .profile-dropdown {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
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
        }

        .dropdown-item:hover {
            background: #f1f6ed;
            color: #3f7d20;
        }

        .dropdown-item svg {
            width: 19px;
            height: 19px;
        }

        .logout-item {
            color: #b43d3d;
        }

        .logout-item:hover {
            background: #fff0f0;
            color: #b43d3d;
        }

        /* PAGE */

        .page {
            padding: 30px;
            max-width: 1200px;
            margin: auto;
        }

        .page-header {
            margin-bottom: 25px;
        }

        .page-header h1 {
            font-family: "Fraunces", serif;
            font-size: 32px;
            color: #23442b;
            margin-bottom: 7px;
        }

        .page-header p {
            color: var(--ink-soft);
            font-size: 13px;
            line-height: 1.6;
        }

        /* ALERTS */

        .alert-message {
            padding: 14px 18px;
            border-radius: 12px;
            margin-bottom: 20px;
            font-size: 13px;
            font-weight: 600;
        }

        .alert-success {
            background: #e5f3de;
            color: #3e782a;
            border: 1px solid #cce5bf;
        }

        .alert-error {
            background: #fff0f0;
            color: #a33b3b;
            border: 1px solid #f0caca;
        }

        /* SETTINGS */

        .settings-layout {
            display: grid;
            grid-template-columns: 230px 1fr;
            gap: 22px;
            align-items: start;
        }

        .settings-menu {
            background: white;
            border: 1px solid var(--line);
            border-radius: 18px;
            padding: 10px;
            box-shadow: var(--shadow-card);
            position: sticky;
            top: 100px;
        }

        .settings-menu-title {
            padding: 12px 12px 8px;
            font-size: 11px;
            text-transform: uppercase;
            letter-spacing: 0.6px;
            color: #89958d;
            font-weight: 800;
        }

        .settings-tab {
            width: 100%;
            border: none;
            background: transparent;
            padding: 12px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            gap: 10px;
            color: #536158;
            font-family: inherit;
            font-size: 12px;
            font-weight: 700;
            text-align: left;
            cursor: pointer;
        }

        .settings-tab svg {
            width: 18px;
            height: 18px;
        }

        .settings-tab:hover {
            background: #f1f6ed;
            color: #3f7d20;
        }

        .settings-tab.active {
            background: var(--brand-green-soft);
            color: #3f7d20;
        }

        .settings-section {
            display: none;
        }

        .settings-section.active {
            display: block;
        }

        .settings-card {
            background: white;
            border: 1px solid var(--line);
            border-radius: 18px;
            box-shadow: var(--shadow-card);
            overflow: hidden;
            margin-bottom: 20px;
        }

        .settings-card-header {
            padding: 22px 24px;
            border-bottom: 1px solid var(--line);
        }

        .settings-card-header h2 {
            font-family: "Fraunces", serif;
            color: #294731;
            font-size: 21px;
            margin-bottom: 5px;
        }

        .settings-card-header p {
            color: #7a867e;
            font-size: 12px;
            line-height: 1.6;
        }

        .settings-card-body {
            padding: 24px;
        }

        .setting-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
            padding: 17px 0;
            border-bottom: 1px solid #efede7;
        }

        .setting-row:first-child {
            padding-top: 0;
        }

        .setting-row:last-child {
            border-bottom: none;
            padding-bottom: 0;
        }

        .setting-info {
            flex: 1;
        }

        .setting-info strong {
            display: block;
            color: #293d2e;
            font-size: 13px;
            font-weight: 800;
            margin-bottom: 4px;
        }

        .setting-info span {
            display: block;
            color: #7a867e;
            font-size: 11px;
            line-height: 1.5;
        }

        /* TOGGLE */

        .toggle {
            position: relative;
            width: 46px;
            height: 25px;
            flex-shrink: 0;
        }

        .toggle input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .toggle-slider {
            position: absolute;
            inset: 0;
            cursor: pointer;
            background: #cfd6ce;
            border-radius: 30px;
            transition: 0.2s;
        }

        .toggle-slider::before {
            content: "";
            position: absolute;
            width: 19px;
            height: 19px;
            left: 3px;
            top: 3px;
            background: white;
            border-radius: 50%;
            transition: 0.2s;
            box-shadow: 0 1px 3px rgba(0,0,0,0.15);
        }

        .toggle input:checked + .toggle-slider {
            background: var(--brand-green);
        }

        .toggle input:checked + .toggle-slider::before {
            transform: translateX(21px);
        }

        /* FORM */

        .form-group {
            margin-bottom: 18px;
        }

        .form-label {
            display: block;
            color: #344238;
            font-size: 12px;
            font-weight: 800;
            margin-bottom: 7px;
        }

        .form-input,
        .form-select {
            width: 100%;
            height: 44px;
            border: 1px solid var(--line);
            border-radius: 10px;
            background: #fafbf8;
            padding: 0 13px;
            color: #344238;
            font-family: inherit;
            font-size: 12px;
            outline: none;
        }

        .form-input:focus,
        .form-select:focus {
            border-color: var(--brand-green);
            background: white;
            box-shadow: 0 0 0 3px rgba(95, 156, 63, 0.08);
        }

        .form-help {
            display: block;
            margin-top: 6px;
            font-size: 10px;
            color: #89958d;
        }

        .password-error {
            color: #b43d3d;
            font-size: 11px;
            margin-top: 5px;
        }

        /* BUTTON */

        .button-wrapper {
            display: flex;
            justify-content: flex-end;
            margin-top: 22px;
        }

        .save-button {
            border: none;
            background: var(--brand-green);
            color: white;
            padding: 11px 20px;
            border-radius: 10px;
            font-family: inherit;
            font-size: 12px;
            font-weight: 800;
            cursor: pointer;
            transition: 0.2s;
        }

        .save-button:hover {
            background: #3f7d20;
            transform: translateY(-1px);
        }

        /* SECURITY */

        .security-note {
            display: flex;
            gap: 12px;
            padding: 14px;
            background: #f4f8ef;
            border: 1px solid #dce9d3;
            border-radius: 11px;
            margin-bottom: 22px;
        }

        .security-note-icon {
            width: 32px;
            height: 32px;
            min-width: 32px;
            background: #e1efd8;
            color: #3f7d20;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .security-note-icon svg {
            width: 16px;
            height: 16px;
        }

        .security-note strong {
            display: block;
            color: #345039;
            font-size: 11px;
            margin-bottom: 3px;
        }

        .security-note span {
            display: block;
            color: #718076;
            font-size: 10px;
            line-height: 1.5;
        }

        /* RESPONSIVE */

        .sidebar-overlay {
            display: none;
        }

        @media (max-width: 900px) {
            .settings-layout {
                grid-template-columns: 1fr;
            }

            .settings-menu {
                position: static;
                display: flex;
                gap: 5px;
                overflow-x: auto;
            }

            .settings-menu-title {
                display: none;
            }

            .settings-tab {
                white-space: nowrap;
                width: auto;
            }
        }

        @media (max-width: 860px) {
            .sidebar {
                position: fixed;
                left: -280px;
                top: 0;
                transition: left 0.2s ease;
                z-index: 1000;
            }

            .sidebar.open {
                left: 0;
                box-shadow: 10px 0 30px rgba(0,0,0,0.25);
            }

            .sidebar-overlay {
                position: fixed;
                inset: 0;
                background: rgba(0,0,0,0.35);
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

            .profile-dropdown {
                width: 250px;
            }

            .page {
                padding: 15px;
            }

            .page-header h1 {
                font-size: 27px;
            }

            .settings-card-body {
                padding: 18px;
            }

            .settings-card-header {
                padding: 18px;
            }

            .setting-row {
                align-items: flex-start;
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

<div class="dashboard-layout">

    <!-- SIDEBAR -->

    <aside class="sidebar" id="sidebar">

        <div class="brand">
            <div class="brand-mark">🌾</div>

            <div>
                <div class="brand-name">AniLink PH</div>
                <div class="brand-tag">
                    Farmer-to-Buyer Marketplace
                </div>
            </div>
        </div>

        <nav class="navlist">

            <a href="/buyer/dashboard" class="navitem">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"
                     stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M3 10.5 12 3l9 7.5"/>
                    <path d="M5 9.5V21h14V9.5"/>
                </svg>
                <span>Dashboard</span>
            </a>

            <a href="/buyer/marketplace" class="navitem">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"
                     stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M4 8h16l-1.5 11a2 2 0 0 1-2 1.8H7.5a2 2 0 0 1-2-1.8L4 8Z"/>
                    <path d="M8 8V6a4 4 0 0 1 8 0v2"/>
                </svg>
                <span>Marketplace</span>
            </a>

            <a href="/buyer/my-orders" class="navitem">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"
                     stroke-width="2">
                    <rect x="3.5" y="7" width="17" height="13" rx="2"/>
                    <path d="M8 7V5a4 4 0 0 1 8 0v2"/>
                </svg>
                <span>My Orders</span>
            </a>

            <a href="/buyer/favorites" class="navitem">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"
                     stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M12 21s-7.5-4.6-10-9.2C.3 8.1 2 4.5 5.5 4A5.4 5.4 0 0 1 12 7a5.4 5.4 0 0 1 6.5-3C22 4.5 23.7 8.1 22 11.8 19.5 16.4 12 21 12 21Z"/>
                </svg>
                <span>Favorites</span>
            </a>

            <a href="/buyer/messages" class="navitem">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"
                     stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M21 15a2 2 0 0 1-2 2H8l-5 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2v10Z"/>
                </svg>

                <span>Messages</span>

                @if(isset($unreadMessagesCount) && $unreadMessagesCount > 0)
                    <span class="badge">
                        {{ $unreadMessagesCount }}
                    </span>
                @endif
            </a>

           
        </nav>

    </aside>

    <div class="sidebar-overlay" id="sidebarOverlay"></div>

    <!-- MAIN -->

    <main class="main-content">

        <!-- TOPBAR -->

        <header class="topbar">

            <button class="menu-btn" id="menuBtn" type="button">

                <svg viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="2"
                     stroke-linecap="round">

                    <path d="M4 6h16"/>
                    <path d="M4 12h16"/>
                    <path d="M4 18h16"/>

                </svg>

            </button>

            <div class="search-wrapper">

                <svg viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="2"
                     stroke-linecap="round"
                     stroke-linejoin="round">

                    <circle cx="11" cy="11" r="7"/>
                    <path d="m20 20-4-4"/>

                </svg>

                <input
                    type="text"
                    placeholder="Search for produce, farmers, or categories...">

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

                <!-- PROFILE -->

                <div class="profile-wrapper" id="profileWrapper">

                    <button
                        class="profile-chip"
                        id="profileBtn"
                        type="button">

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
                            stroke-width="2">

                            <path d="m6 9 6 6 6-6"/>

                        </svg>

                    </button>

                    <!-- PROFILE DROPDOWN -->

                    <div class="profile-dropdown" id="profileDropdown">

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
                            class="dropdown-item">

                            <svg viewBox="0 0 24 24" fill="none"
                                 stroke="currentColor" stroke-width="2">

                                <path d="M20 21a8 8 0 0 0-16 0"/>
                                <circle cx="12" cy="7" r="4"/>

                            </svg>

                            <span>My Profile</span>

                        </a>

                        <a
                            href="{{ route('buyer.settings') }}"
                            class="dropdown-item">

                            <svg viewBox="0 0 24 24" fill="none"
                                 stroke="currentColor" stroke-width="2">

                                <circle cx="12" cy="12" r="3"/>

                                <path d="M19.4 15a1.7 1.7 0 0 0 .3 1.9l.1.1-1.8 1.8-.1-.1a1.7 1.7 0 0 0-1.9-.3 1.7 1.7 0 0 0-1 1.5V20h-2.6v-.1a1.7 1.7 0 0 0-1-1.5 1.7 1.7 0 0 0-1.9.3l-.1.1-1.8-1.8.1-.1A1.7 1.7 0 0 0 8 15a1.7 1.7 0 0 0-1.5-1H6v-2.6h.1a1.7 1.7 0 0 0 1.5-1 1.7 1.7 0 0 0-.3-1.9l-.1-.1L9 6.6l.1.1a1.7 1.7 0 0 0 1.9.3l.1-.1 1.8 1.8-.1.1a1.7 1.7 0 0 0-.3 1.9 1.7 1.7 0 0 0 1.5 1h.1V14h-.1a1.7 1.7 0 0 0-1.5 1z"/>

                            </svg>

                            <span>Settings</span>

                        </a>

                        <div class="dropdown-divider"></div>

                        <form
                            action="{{ route('logout') }}"
                            method="POST">

                            @csrf

                            <button
                                type="submit"
                                class="dropdown-item logout-item">

                                <svg viewBox="0 0 24 24" fill="none"
                                     stroke="currentColor" stroke-width="2">

                                    <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/>
                                    <path d="M16 17l5-5-5-5"/>
                                    <path d="M21 12H9"/>

                                </svg>

                                <span>Logout</span>

                            </button>

                        </form>

                    </div>

                </div>

            </div>

        </header>

        <!-- PAGE -->

        <div class="page">

            <div class="page-header">

                <h1>Settings</h1>

                <p>
                    Manage your notification preferences, security,
                    and shopping preferences.
                </p>

            </div>

            <!-- SUCCESS -->

            @if(session('success'))

                <div class="alert-message alert-success">
                    {{ session('success') }}
                </div>

            @endif

            <!-- ERROR -->

            @if($errors->any())

                <div class="alert-message alert-error">

                    Please check the highlighted information
                    and try again.

                </div>

            @endif

            <div class="settings-layout">

                <!-- SETTINGS MENU -->

                <aside class="settings-menu">

                    <div class="settings-menu-title">
                        Settings
                    </div>

                    <button
                        class="settings-tab active"
                        data-tab="notifications"
                        type="button">

                        <svg viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2">

                            <path d="M18 8a6 6 0 0 0-12 0c0 7-3 7-3 9h18c0-2-3-2-3-9"/>
                            <path d="M13.73 21a2 2 0 0 1-3.46 0"/>

                        </svg>

                        Notifications

                    </button>

                    <button
                        class="settings-tab"
                        data-tab="security"
                        type="button">

                        <svg viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2">

                            <rect x="4" y="10" width="16" height="11" rx="2"/>
                            <path d="M8 10V7a4 4 0 0 1 8 0v3"/>

                        </svg>

                        Account Security

                    </button>

                    <button
                        class="settings-tab"
                        data-tab="shopping"
                        type="button">

                        <svg viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2">

                            <path d="M4 8h16l-1.5 11a2 2 0 0 1-2 1.8H7.5a2 2 0 0 1-2-1.8L4 8Z"/>
                            <path d="M8 8V6a4 4 0 0 1 8 0v2"/>

                        </svg>

                        Shopping Preferences

                    </button>

                </aside>

                <!-- SETTINGS CONTENT -->

                <div class="settings-content">

                    <!-- NOTIFICATIONS -->

                    <section
                        class="settings-section active"
                        id="notifications">

                        <div class="settings-card">

                            <div class="settings-card-header">

                                <h2>
                                    Notification Preferences
                                </h2>

                                <p>
                                    Choose which notifications you would
                                    like to receive from AniLink PH.
                                </p>

                            </div>

                            <div class="settings-card-body">

                                <form
                                    action="{{ route('buyer.settings.notifications') }}"
                                    method="POST">

                                    @csrf

                                    <div class="setting-row">

                                        <div class="setting-info">

                                            <strong>
                                                Order Updates
                                            </strong>

                                            <span>
                                                Receive notifications when
                                                your order status changes.
                                            </span>

                                        </div>

                                        <label class="toggle">

                                            <input
                                                type="hidden"
                                                name="order_updates"
                                                value="0">

                                            <input
                                                type="checkbox"
                                                name="order_updates"
                                                value="1"
                                                {{ $settings->order_updates ? 'checked' : '' }}>

                                            <span class="toggle-slider"></span>

                                        </label>

                                    </div>

                                    <div class="setting-row">

                                        <div class="setting-info">

                                            <strong>
                                                Messages
                                            </strong>

                                            <span>
                                                Get notified when farmers
                                                send you a message.
                                            </span>

                                        </div>

                                        <label class="toggle">

                                            <input
                                                type="hidden"
                                                name="messages"
                                                value="0">

                                            <input
                                                type="checkbox"
                                                name="messages"
                                                value="1"
                                                {{ $settings->messages ? 'checked' : '' }}>

                                            <span class="toggle-slider"></span>

                                        </label>

                                    </div>

                                    <div class="setting-row">

                                        <div class="setting-info">

                                            <strong>
                                                Marketplace Updates
                                            </strong>

                                            <span>
                                                Receive updates about new
                                                harvests and marketplace activity.
                                            </span>

                                        </div>

                                        <label class="toggle">

                                            <input
                                                type="hidden"
                                                name="marketplace_updates"
                                                value="0">

                                            <input
                                                type="checkbox"
                                                name="marketplace_updates"
                                                value="1"
                                                {{ $settings->marketplace_updates ? 'checked' : '' }}>

                                            <span class="toggle-slider"></span>

                                        </label>

                                    </div>

                                    <div class="button-wrapper">

                                        <button
                                            type="submit"
                                            class="save-button">

                                            Save Notification Settings

                                        </button>

                                    </div>

                                </form>

                            </div>

                        </div>

                    </section>

                    <!-- SECURITY -->

                    <section
                        class="settings-section"
                        id="security">

                        <div class="settings-card">

                            <div class="settings-card-header">

                                <h2>
                                    Account Security
                                </h2>

                                <p>
                                    Keep your AniLink account secure by
                                    regularly updating your password.
                                </p>

                            </div>

                            <div class="settings-card-body">

                                <div class="security-note">

                                    <div class="security-note-icon">

                                        <svg viewBox="0 0 24 24"
                                             fill="none"
                                             stroke="currentColor"
                                             stroke-width="2">

                                            <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10Z"/>

                                        </svg>

                                    </div>

                                    <div>

                                        <strong>
                                            Password Security
                                        </strong>

                                        <span>
                                            Use a strong password that you
                                            do not use on other websites.
                                        </span>

                                    </div>

                                </div>

                                <form
                                    action="{{ route('buyer.settings.password') }}"
                                    method="POST">

                                    @csrf

                                    <div class="form-group">

                                        <label
                                            class="form-label"
                                            for="current_password">

                                            Current Password

                                        </label>

                                        <input
                                            class="form-input"
                                            type="password"
                                            id="current_password"
                                            name="current_password"
                                            placeholder="Enter your current password"
                                            required>

                                        @error('current_password')

                                            <div class="password-error">
                                                {{ $message }}
                                            </div>

                                        @enderror

                                    </div>

                                    <div class="form-group">

                                        <label
                                            class="form-label"
                                            for="password">

                                            New Password

                                        </label>

                                        <input
                                            class="form-input"
                                            type="password"
                                            id="password"
                                            name="password"
                                            placeholder="Enter your new password"
                                            required>

                                        <span class="form-help">
                                            Password must contain at least
                                            8 characters.
                                        </span>

                                        @error('password')

                                            <div class="password-error">
                                                {{ $message }}
                                            </div>

                                        @enderror

                                    </div>

                                    <div class="form-group">

                                        <label
                                            class="form-label"
                                            for="password_confirmation">

                                            Confirm New Password

                                        </label>

                                        <input
                                            class="form-input"
                                            type="password"
                                            id="password_confirmation"
                                            name="password_confirmation"
                                            placeholder="Confirm your new password"
                                            required>

                                    </div>

                                    <div class="button-wrapper">

                                        <button
                                            type="submit"
                                            class="save-button">

                                            Update Password

                                        </button>

                                    </div>

                                </form>

                            </div>

                        </div>

                    </section>

                    <!-- SHOPPING -->

                    <section
                        class="settings-section"
                        id="shopping">

                        <div class="settings-card">

                            <div class="settings-card-header">

                                <h2>
                                    Shopping Preferences
                                </h2>

                                <p>
                                    Set your preferred way of receiving
                                    products from farmers.
                                </p>

                            </div>

                            <div class="settings-card-body">

                                <form
                                    action="{{ route('buyer.settings.preferences') }}"
                                    method="POST">

                                    @csrf

                                    <div class="form-group">

                                        <label
                                            class="form-label"
                                            for="default_fulfillment_method">

                                            Default Fulfillment Method

                                        </label>

                                        <select
                                            class="form-select"
                                            id="default_fulfillment_method"
                                            name="default_fulfillment_method">

                                            <option value="">
                                                Choose a default option
                                            </option>

                                            <option
                                                value="Farm Pickup"
                                                {{ $settings->default_fulfillment_method === 'Farm Pickup' ? 'selected' : '' }}>

                                                Farm Pickup

                                            </option>

                                            <option
                                                value="Local Delivery"
                                                {{ $settings->default_fulfillment_method === 'Local Delivery' ? 'selected' : '' }}>

                                                Local Delivery

                                            </option>

                                        </select>

                                        <span class="form-help">
                                            This preference can be used as
                                            your default option when placing
                                            an order.
                                        </span>

                                    </div>

                                    <div class="button-wrapper">

                                        <button
                                            type="submit"
                                            class="save-button">

                                            Save Shopping Preferences

                                        </button>

                                    </div>

                                </form>

                            </div>

                        </div>

                    </section>

                </div>

            </div>

        </div>

    </main>

</div>

<script>

document.addEventListener("DOMContentLoaded", function () {

    /* MOBILE SIDEBAR */

    const menuBtn = document.getElementById("menuBtn");
    const sidebar = document.getElementById("sidebar");
    const sidebarOverlay = document.getElementById("sidebarOverlay");

    if (menuBtn) {

        menuBtn.addEventListener("click", function () {

            sidebar.classList.toggle("open");
            sidebarOverlay.classList.toggle("show");

        });

    }

    if (sidebarOverlay) {

        sidebarOverlay.addEventListener("click", function () {

            sidebar.classList.remove("open");
            sidebarOverlay.classList.remove("show");

        });

    }


    /* NOTIFICATIONS */

    const notificationBtn =
        document.getElementById("notificationBtn");

    const notificationDropdown =
        document.getElementById("notificationDropdown");

    const notificationWrapper =
        document.getElementById("notificationWrapper");


    if (notificationBtn && notificationDropdown) {

        notificationBtn.addEventListener("click", function (event) {

            event.stopPropagation();

            notificationDropdown.classList.toggle("show");

            if (profileWrapper) {
                profileWrapper.classList.remove("open");
            }

            notificationBtn.setAttribute(
                "aria-expanded",
                notificationDropdown.classList.contains("show")
                    ? "true"
                    : "false"
            );

        });

    }


    /* PROFILE */

    const profileWrapper =
        document.getElementById("profileWrapper");

    const profileBtn =
        document.getElementById("profileBtn");

    const profileDropdown =
        document.getElementById("profileDropdown");


    if (profileBtn && profileWrapper) {

        profileBtn.addEventListener("click", function (event) {

            event.stopPropagation();

            profileWrapper.classList.toggle("open");

            if (notificationDropdown) {

                notificationDropdown.classList.remove("show");

            }

            if (notificationBtn) {

                notificationBtn.setAttribute(
                    "aria-expanded",
                    "false"
                );

            }

        });

    }


    if (notificationDropdown) {

        notificationDropdown.addEventListener("click", function (event) {

            event.stopPropagation();

        });

    }


    if (profileDropdown) {

        profileDropdown.addEventListener("click", function (event) {

            event.stopPropagation();

        });

    }


    /* CLICK OUTSIDE */

    document.addEventListener("click", function () {

        if (notificationDropdown) {

            notificationDropdown.classList.remove("show");

        }

        if (notificationBtn) {

            notificationBtn.setAttribute(
                "aria-expanded",
                "false"
            );

        }

        if (profileWrapper) {

            profileWrapper.classList.remove("open");

        }

    });


    /* SETTINGS TABS */

    const settingsTabs =
        document.querySelectorAll(".settings-tab");

    const settingsSections =
        document.querySelectorAll(".settings-section");


    settingsTabs.forEach(function (tab) {

        tab.addEventListener("click", function () {

            const target =
                this.getAttribute("data-tab");

            settingsTabs.forEach(function (item) {

                item.classList.remove("active");

            });

            settingsSections.forEach(function (section) {

                section.classList.remove("active");

            });

            this.classList.add("active");

            const selectedSection =
                document.getElementById(target);

            if (selectedSection) {

                selectedSection.classList.add("active");

            }

        });

    });


    /* CLOSE SIDEBAR */

    document
        .querySelectorAll(".navitem")
        .forEach(function (item) {

            item.addEventListener("click", function () {

                if (window.innerWidth <= 860) {

                    sidebar.classList.remove("open");

                    sidebarOverlay.classList.remove("show");

                }

            });

        });

});

</script>

</body>

</html>