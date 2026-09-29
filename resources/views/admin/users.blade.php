<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>AniLink PH - User Management</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link
        href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Fraunces:opsz,wght@9..144,500;9..144,600&display=swap"
        rel="stylesheet"
    >

    <style>

        :root {
            --dark: #173321;
            --dark-2: #1d3f29;
            --green: #5f9c3f;
            --green-light: #8bc34a;
            --cream: #f5f3ec;
            --white: #ffffff;
            --ink: #1f2a22;
            --soft: #5b6b5f;
            --line: #e7e3d8;
            --danger: #c94b4b;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: "Plus Jakarta Sans", sans-serif;
            background: var(--cream);
            color: var(--ink);
        }

        /* =========================
           LAYOUT
        ========================= */

        .layout {
            display: flex;
            min-height: 100vh;
        }

        /* =========================
           SIDEBAR
        ========================= */

        .sidebar {
            width: 240px;
            background: var(--dark);
            color: white;
            padding: 25px 18px;
            position: fixed;
            left: 0;
            top: 0;
            bottom: 0;
        }

        .logo {
            font-family: "Fraunces", serif;
            font-size: 25px;
            font-weight: 600;
            margin-bottom: 5px;
        }

        .subtitle {
            color: #a9b9ad;
            font-size: 11px;
            margin-bottom: 35px;
        }

        .nav-title {
            color: #8fa497;
            font-size: 10px;
            font-weight: 800;
            text-transform: uppercase;
            margin: 20px 12px 10px;
        }

        .nav-link {
            display: block;
            color: #dce7df;
            text-decoration: none;
            padding: 12px 13px;
            border-radius: 10px;
            font-size: 13px;
            font-weight: 600;
            margin-bottom: 4px;
        }

        .nav-link:hover,
        .nav-link.active {
            background: var(--dark-2);
            color: white;
        }

        .logout {
            position: absolute;
            bottom: 25px;
            left: 18px;
            right: 18px;
        }

        /* =========================
           MAIN
        ========================= */

        .main {
            margin-left: 240px;
            width: calc(100% - 240px);
            padding: 35px;
        }

        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
            gap: 20px;
        }

        .page-title h1 {
            margin: 0;
            font-family: "Fraunces", serif;
            font-size: 34px;
        }

        .page-title p {
            margin: 7px 0 0;
            color: var(--soft);
            font-size: 13px;
        }

        .admin-user {
            background: white;
            padding: 10px 15px;
            border-radius: 12px;
            border: 1px solid var(--line);
            font-size: 13px;
            font-weight: 700;
            white-space: nowrap;
        }

        /* =========================
           ALERTS
        ========================= */

        .alert {
            padding: 14px 16px;
            border-radius: 10px;
            margin-bottom: 20px;
            font-size: 13px;
            font-weight: 600;
        }

        .alert-success {
            background: #e8f2df;
            color: #356d1c;
        }

        .alert-error {
            background: #fff0f0;
            color: #a83232;
        }

        /* =========================
           FILTER BOX
        ========================= */

        .filter-box {
            background: white;
            border: 1px solid var(--line);
            border-radius: 16px;
            padding: 20px;
            margin-bottom: 20px;
        }

        .filter-form {
            display: grid;
            grid-template-columns: 1fr 200px auto;
            gap: 12px;
        }

        .input,
        .select {
            width: 100%;
            padding: 12px 14px;
            border: 1px solid var(--line);
            border-radius: 10px;
            font-family: inherit;
            font-size: 13px;
            background: white;
        }

        .input:focus,
        .select:focus {
            outline: none;
            border-color: var(--green);
            box-shadow: 0 0 0 3px rgba(95, 156, 63, 0.12);
        }

        .filter-btn {
            border: none;
            background: var(--green);
            color: white;
            padding: 12px 20px;
            border-radius: 10px;
            font-family: inherit;
            font-weight: 800;
            cursor: pointer;
        }

        .filter-btn:hover {
            background: #4f8933;
        }

        .clear-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 12px 18px;
            border-radius: 10px;
            text-decoration: none;
            color: var(--soft);
            background: #f1f2ed;
            font-size: 13px;
            font-weight: 700;
        }

        /* =========================
           TABLE
        ========================= */

        .table-card {
            background: white;
            border: 1px solid var(--line);
            border-radius: 16px;
            overflow: hidden;
        }

        .table-header {
            padding: 20px;
            border-bottom: 1px solid var(--line);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .table-header h2 {
            margin: 0;
            font-family: "Fraunces", serif;
            font-size: 22px;
        }

        .user-count {
            color: var(--soft);
            font-size: 12px;
            font-weight: 700;
        }

        .table-wrapper {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            text-align: left;
            padding: 14px 18px;
            background: #f7f7f2;
            color: var(--soft);
            font-size: 11px;
            font-weight: 800;
            text-transform: uppercase;
            white-space: nowrap;
        }

        td {
            padding: 16px 18px;
            border-top: 1px solid var(--line);
            font-size: 13px;
            vertical-align: middle;
        }

        tbody tr:hover {
            background: #fafbf8;
        }

        .user-name {
            font-weight: 800;
        }

        .user-email {
            color: var(--soft);
            font-size: 12px;
            margin-top: 3px;
        }

        /* =========================
           ROLE BADGES
        ========================= */

        .role {
            display: inline-block;
            padding: 6px 10px;
            border-radius: 999px;
            font-size: 11px;
            font-weight: 800;
            text-transform: capitalize;
        }

        .role-farmer {
            background: #e8f2df;
            color: #3f7d20;
        }

        .role-buyer {
            background: #e9f0f8;
            color: #35648f;
        }

        .role-admin {
            background: #eee8f7;
            color: #69458f;
        }

        /* =========================
           ACTIONS
        ========================= */

        .actions {
            display: flex;
            gap: 8px;
            align-items: center;
        }

        .edit-btn {
            display: inline-block;
            padding: 8px 12px;
            background: #eef5e9;
            color: #3f7d20;
            border-radius: 8px;
            text-decoration: none;
            font-size: 11px;
            font-weight: 800;
        }

        .edit-btn:hover {
            background: #dfeeda;
        }

        .delete-btn {
            border: none;
            padding: 8px 12px;
            background: #fff0f0;
            color: var(--danger);
            border-radius: 8px;
            font-family: inherit;
            font-size: 11px;
            font-weight: 800;
            cursor: pointer;
        }

        .delete-btn:hover {
            background: #ffe2e2;
        }

        /* =========================
           EMPTY STATE
        ========================= */

        .empty {
            text-align: center;
            padding: 60px 20px;
            color: var(--soft);
        }

        .empty-icon {
            font-size: 45px;
            margin-bottom: 10px;
        }

        .empty h3 {
            margin: 0 0 6px;
            color: var(--ink);
        }

        .empty p {
            margin: 0;
            font-size: 13px;
        }

        /* =========================
           PAGINATION
        ========================= */

        .pagination {
            padding: 20px;
            border-top: 1px solid var(--line);
        }

        .pagination nav {
            display: flex;
            justify-content: center;
        }

        .pagination svg {
            width: 18px;
        }

        .pagination a,
        .pagination span {
            margin: 0 3px;
        }

        /* =========================
           RESPONSIVE
        ========================= */

        @media (max-width: 900px) {

            .filter-form {
                grid-template-columns: 1fr;
            }

            .topbar {
                align-items: flex-start;
                flex-direction: column;
            }

        }

        @media (max-width: 650px) {

            .sidebar {
                width: 190px;
            }

            .main {
                margin-left: 190px;
                width: calc(100% - 190px);
                padding: 20px;
            }

            .sidebar .logo {
                font-size: 20px;
            }

            .subtitle {
                margin-bottom: 20px;
            }

        }

    </style>

</head>

<body>

<div class="layout">


    <!-- ========================= -->
    <!-- SIDEBAR -->
    <!-- ========================= -->

    <aside class="sidebar">

        <div class="logo">
            AniLink PH
        </div>

        <div class="subtitle">
            Admin Panel
        </div>


        <div class="nav-title">
            Management
        </div>


        <!-- DASHBOARD -->

        <a
            href="{{ route('admin.dashboard') }}"
            class="nav-link"
        >
            📊 Dashboard
        </a>


        <!-- USERS -->

        <a
            href="{{ route('admin.users') }}"
            class="nav-link active"
        >
            👥 User Management
        </a>


        <!-- LOGOUT -->

        <div class="logout">

            <form
                method="POST"
                action="{{ route('logout') }}"
            >

                @csrf

                <button
                    type="submit"
                    class="nav-link"
                    style="
                        width: 100%;
                        border: none;
                        background: transparent;
                        text-align: left;
                        cursor: pointer;
                    "
                >
                    🚪 Logout
                </button>

            </form>

        </div>

    </aside>


    <!-- ========================= -->
    <!-- MAIN -->
    <!-- ========================= -->

    <main class="main">


        <!-- TOPBAR -->

        <div class="topbar">

            <div class="page-title">

                <h1>
                    User Management
                </h1>

                <p>
                    Manage all registered AniLink PH accounts.
                </p>

            </div>


            <div class="admin-user">

                👤

                {{ Auth::user()->first_name }}
                {{ Auth::user()->last_name }}

            </div>

        </div>


        <!-- ========================= -->
        <!-- ALERTS -->
        <!-- ========================= -->

        @if(session('success'))

            <div class="alert alert-success">
                {{ session('success') }}
            </div>

        @endif


        @if(session('error'))

            <div class="alert alert-error">
                {{ session('error') }}
            </div>

        @endif


        <!-- ========================= -->
        <!-- SEARCH + FILTER -->
        <!-- ========================= -->

        <div class="filter-box">

            <form
                method="GET"
                action="{{ route('admin.users') }}"
                class="filter-form"
            >

                <!-- SEARCH -->

                <input
                    type="text"
                    name="search"
                    class="input"
                    placeholder="Search name, email, or phone..."
                    value="{{ request('search') }}"
                >


                <!-- ROLE -->

                <select
                    name="role"
                    class="select"
                >

                    <option value="">
                        All Roles
                    </option>

                    <option
                        value="buyer"
                        {{ request('role') === 'buyer' ? 'selected' : '' }}
                    >
                        Buyers
                    </option>

                    <option
                        value="farmer"
                        {{ request('role') === 'farmer' ? 'selected' : '' }}
                    >
                        Farmers
                    </option>

                    <option
                        value="admin"
                        {{ request('role') === 'admin' ? 'selected' : '' }}
                    >
                        Admins
                    </option>

                </select>


                <!-- BUTTON -->

                <div style="display:flex; gap:8px;">

                    <button
                        type="submit"
                        class="filter-btn"
                    >
                        Search
                    </button>

                    <a
                        href="{{ route('admin.users') }}"
                        class="clear-btn"
                    >
                        Clear
                    </a>

                </div>

            </form>

        </div>


        <!-- ========================= -->
        <!-- USERS TABLE -->
        <!-- ========================= -->

        <div class="table-card">


            <div class="table-header">

                <h2>
                    All Users
                </h2>

                <div class="user-count">

                    {{ $users->total() }} users

                </div>

            </div>


            <div class="table-wrapper">

                @if($users->count() > 0)

                    <table>

                        <thead>

                            <tr>

                                <th>
                                    User
                                </th>

                                <th>
                                    Phone
                                </th>

                                <th>
                                    Role
                                </th>

                                <th>
                                    Address
                                </th>

                                <th>
                                    Registered
                                </th>

                                <th>
                                    Actions
                                </th>

                            </tr>

                        </thead>


                        <tbody>

                            @foreach($users as $user)

                                <tr>


                                    <!-- USER -->

                                    <td>

                                        <div class="user-name">

                                            {{ $user->first_name }}
                                            {{ $user->last_name }}

                                        </div>

                                        <div class="user-email">

                                            {{ $user->email }}

                                        </div>

                                    </td>


                                    <!-- PHONE -->

                                    <td>

                                        {{ $user->phone }}

                                    </td>


                                    <!-- ROLE -->

                                    <td>

                                        <span
                                            class="role role-{{ $user->role }}"
                                        >

                                            {{ $user->role }}

                                        </span>

                                    </td>


                                    <!-- ADDRESS -->

                                    <td>

                                        {{ $user->address ?: '—' }}

                                    </td>


                                    <!-- REGISTERED -->

                                    <td>

                                        {{ $user->created_at->format('M d, Y') }}

                                    </td>


                                    <!-- ACTIONS -->

                                    <td>

                                        <div class="actions">


                                            <!-- EDIT -->

                                            <a
                                                href="{{ route('admin.users.edit', $user->id) }}"
                                                class="edit-btn"
                                            >
                                                Edit
                                            </a>


                                            <!-- DELETE -->

                                            @if($user->id !== Auth::id())

                                                <form
                                                    method="POST"
                                                    action="{{ route('admin.users.delete', $user->id) }}"
                                                    onsubmit="return confirm('Are you sure you want to delete this user?');"
                                                >

                                                    @csrf

                                                    @method('DELETE')

                                                    <button
                                                        type="submit"
                                                        class="delete-btn"
                                                    >
                                                        Delete
                                                    </button>

                                                </form>

                                            @endif

                                        </div>

                                    </td>

                                </tr>

                            @endforeach

                        </tbody>

                    </table>

                @else

                    <div class="empty">

                        <div class="empty-icon">
                            👥
                        </div>

                        <h3>
                            No users found
                        </h3>

                        <p>
                            There are no users matching your search or filter.
                        </p>

                    </div>

                @endif

            </div>


            <!-- PAGINATION -->

            @if($users->hasPages())

                <div class="pagination">

                    {{ $users->links() }}

                </div>

            @endif


        </div>

    </main>

</div>

</body>

</html>