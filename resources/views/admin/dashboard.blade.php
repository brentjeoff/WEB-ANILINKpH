<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>AniLink PH - Admin Dashboard</title>

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

        .layout {
            display: flex;
            min-height: 100vh;
        }

        /* SIDEBAR */

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

        /* MAIN */

        .main {
            margin-left: 240px;
            width: calc(100% - 240px);
            padding: 35px;
        }

        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 35px;
        }

        .welcome h1 {
            margin: 0;
            font-family: "Fraunces", serif;
            font-size: 34px;
        }

        .welcome p {
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
        }

        /* CARDS */

        .cards {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 18px;
        }

        .card {
            background: white;
            border: 1px solid var(--line);
            border-radius: 16px;
            padding: 22px;
        }

        .card-label {
            color: var(--soft);
            font-size: 12px;
            font-weight: 700;
        }

        .card-number {
            margin-top: 8px;
            font-size: 30px;
            font-weight: 800;
        }

        .card-link {
            display: inline-block;
            margin-top: 15px;
            color: var(--green);
            text-decoration: none;
            font-size: 12px;
            font-weight: 800;
        }

        .section {
            margin-top: 25px;
            background: white;
            border: 1px solid var(--line);
            border-radius: 16px;
            padding: 25px;
        }

        .section h2 {
            margin: 0;
            font-family: "Fraunces", serif;
            font-size: 22px;
        }

        .section p {
            color: var(--soft);
            font-size: 13px;
            line-height: 1.6;
        }

        @media (max-width: 900px) {

            .cards {
                grid-template-columns: repeat(2, 1fr);
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

            .cards {
                grid-template-columns: 1fr;
            }

        }

    </style>

</head>

<body>

<div class="layout">

    <!-- SIDEBAR -->

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

        <a
            href="{{ route('admin.dashboard') }}"
            class="nav-link active"
        >
            📊 Dashboard
        </a>

        <a
            href="{{ route('admin.users') }}"
            class="nav-link"
        >
            👥 User Management
        </a>


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


    <!-- MAIN CONTENT -->

    <main class="main">

        <div class="topbar">

            <div class="welcome">

                <h1>
                    Admin Dashboard
                </h1>

                <p>
                    Manage your AniLink PH users and platform.
                </p>

            </div>


            <div class="admin-user">

                👤

                {{ Auth::user()->first_name }}
                {{ Auth::user()->last_name }}

            </div>

        </div>


        <!-- STATISTICS -->

        <div class="cards">

            <div class="card">

                <div class="card-label">
                    Total Users
                </div>

                <div class="card-number">
                    {{ $totalUsers }}
                </div>

                <a
                    href="{{ route('admin.users') }}"
                    class="card-link"
                >
                    Manage Users →
                </a>

            </div>


            <div class="card">

                <div class="card-label">
                    Farmers
                </div>

                <div class="card-number">
                    {{ $totalFarmers }}
                </div>

                <a
                    href="{{ route('admin.users', ['role' => 'farmer']) }}"
                    class="card-link"
                >
                    View Farmers →
                </a>

            </div>


            <div class="card">

                <div class="card-label">
                    Buyers
                </div>

                <div class="card-number">
                    {{ $totalBuyers }}
                </div>

                <a
                    href="{{ route('admin.users', ['role' => 'buyer']) }}"
                    class="card-link"
                >
                    View Buyers →
                </a>

            </div>


            <div class="card">

                <div class="card-label">
                    Admins
                </div>

                <div class="card-number">
                    {{ $totalAdmins }}
                </div>

                <a
                    href="{{ route('admin.users', ['role' => 'admin']) }}"
                    class="card-link"
                >
                    View Admins →
                </a>

            </div>

        </div>


        <!-- INFORMATION -->

        <div class="section">

            <h2>
                User Management
            </h2>

            <p>
                From the User Management section, you can view,
                search, edit, change roles, and delete AniLink PH
                accounts.
            </p>

            <a
                href="{{ route('admin.users') }}"
                class="card-link"
            >
                Open User Management →
            </a>

        </div>

    </main>

</div>

</body>

</html>