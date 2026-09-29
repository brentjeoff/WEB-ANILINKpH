<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        Edit User - AniLink PH
    </title>

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

    <style>

        :root {
            --dark: #173321;
            --dark-2: #1d3f29;
            --green: #5f9c3f;
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


        /* =========================
           TOPBAR
        ========================= */

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
           BACK BUTTON
        ========================= */

        .back {
            display: inline-block;
            margin-bottom: 20px;
            color: var(--green);
            text-decoration: none;
            font-size: 13px;
            font-weight: 800;
        }

        .back:hover {
            text-decoration: underline;
        }


        /* =========================
           FORM CARD
        ========================= */

        .form-card {
            max-width: 800px;
            background: white;
            border: 1px solid var(--line);
            border-radius: 18px;
            padding: 30px;
        }

        .form-header {
            padding-bottom: 20px;
            margin-bottom: 25px;
            border-bottom: 1px solid var(--line);
        }

        .form-header h2 {
            margin: 0;
            font-family: "Fraunces", serif;
            font-size: 24px;
        }

        .form-header p {
            margin: 7px 0 0;
            color: var(--soft);
            font-size: 13px;
        }


        /* =========================
           FORM
        ========================= */

        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
        }

        .form-group.full {
            grid-column: 1 / -1;
        }

        label {
            margin-bottom: 8px;
            font-size: 13px;
            font-weight: 800;
        }

        input,
        select,
        textarea {
            width: 100%;
            padding: 13px 14px;
            border: 1px solid var(--line);
            border-radius: 10px;
            background: white;
            color: var(--ink);
            font-family: inherit;
            font-size: 13px;
        }

        textarea {
            min-height: 100px;
            resize: vertical;
        }

        input:focus,
        select:focus,
        textarea:focus {
            outline: none;
            border-color: var(--green);
            box-shadow: 0 0 0 3px rgba(95, 156, 63, 0.12);
        }

        .error {
            margin-top: 6px;
            color: var(--danger);
            font-size: 11px;
            font-weight: 600;
        }


        /* =========================
           ROLE INFO
        ========================= */

        .role-warning {
            margin-top: 20px;
            padding: 14px;
            background: #fff8e8;
            border: 1px solid #f1dfaa;
            border-radius: 10px;
            color: #806421;
            font-size: 12px;
            line-height: 1.6;
        }


        /* =========================
           BUTTONS
        ========================= */

        .buttons {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
            margin-top: 25px;
            padding-top: 20px;
            border-top: 1px solid var(--line);
        }

        .cancel-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 12px 20px;
            border-radius: 10px;
            background: #f1f2ed;
            color: var(--soft);
            text-decoration: none;
            font-size: 13px;
            font-weight: 800;
        }

        .cancel-btn:hover {
            background: #e8e9e3;
        }

        .save-btn {
            border: none;
            padding: 12px 22px;
            border-radius: 10px;
            background: var(--green);
            color: white;
            font-family: inherit;
            font-size: 13px;
            font-weight: 800;
            cursor: pointer;
        }

        .save-btn:hover {
            background: #4f8933;
        }


        /* =========================
           RESPONSIVE
        ========================= */

        @media (max-width: 700px) {

            .sidebar {
                width: 190px;
            }

            .main {
                margin-left: 190px;
                width: calc(100% - 190px);
                padding: 20px;
            }

            .form-grid {
                grid-template-columns: 1fr;
            }

            .form-group.full {
                grid-column: auto;
            }

            .topbar {
                align-items: flex-start;
                flex-direction: column;
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


        <!-- USER MANAGEMENT -->

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
                    Edit User
                </h1>

                <p>
                    Update the user's account information.
                </p>

            </div>


            <div class="admin-user">

                👤

                {{ Auth::user()->first_name }}
                {{ Auth::user()->last_name }}

            </div>

        </div>


        <!-- BACK -->

        <a
            href="{{ route('admin.users') }}"
            class="back"
        >
            ← Back to User Management
        </a>


        <!-- ========================= -->
        <!-- FORM CARD -->
        <!-- ========================= -->

        <div class="form-card">


            <div class="form-header">

                <h2>
                    {{ $user->first_name }}
                    {{ $user->last_name }}
                </h2>

                <p>
                    Account ID: #{{ $user->id }}
                </p>

            </div>


            <!-- ========================= -->
            <!-- VALIDATION ERRORS -->
            <!-- ========================= -->

            @if($errors->any())

                <div
                    class="role-warning"
                    style="
                        background:#fff0f0;
                        border-color:#f0c4c4;
                        color:#a83232;
                        margin-bottom:20px;
                    "
                >

                    <strong>
                        Please fix the following:
                    </strong>

                    <ul
                        style="
                            margin:8px 0 0;
                            padding-left:20px;
                        "
                    >

                        @foreach($errors->all() as $error)

                            <li>
                                {{ $error }}
                            </li>

                        @endforeach

                    </ul>

                </div>

            @endif


            <!-- ========================= -->
            <!-- EDIT FORM -->
            <!-- ========================= -->

            <form
                method="POST"
                action="{{ route('admin.users.update', $user->id) }}"
            >

                @csrf

                @method('PUT')


                <div class="form-grid">


                    <!-- FIRST NAME -->

                    <div class="form-group">

                        <label for="first_name">
                            First Name
                        </label>

                        <input
                            type="text"
                            id="first_name"
                            name="first_name"
                            value="{{ old('first_name', $user->first_name) }}"
                            required
                        >

                        @error('first_name')

                            <div class="error">
                                {{ $message }}
                            </div>

                        @enderror

                    </div>


                    <!-- LAST NAME -->

                    <div class="form-group">

                        <label for="last_name">
                            Last Name
                        </label>

                        <input
                            type="text"
                            id="last_name"
                            name="last_name"
                            value="{{ old('last_name', $user->last_name) }}"
                            required
                        >

                        @error('last_name')

                            <div class="error">
                                {{ $message }}
                            </div>

                        @enderror

                    </div>


                    <!-- EMAIL -->

                    <div class="form-group">

                        <label for="email">
                            Email Address
                        </label>

                        <input
                            type="email"
                            id="email"
                            name="email"
                            value="{{ old('email', $user->email) }}"
                            required
                        >

                        @error('email')

                            <div class="error">
                                {{ $message }}
                            </div>

                        @enderror

                    </div>


                    <!-- PHONE -->

                    <div class="form-group">

                        <label for="phone">
                            Phone Number
                        </label>

                        <input
                            type="text"
                            id="phone"
                            name="phone"
                            value="{{ old('phone', $user->phone) }}"
                            maxlength="11"
                            required
                        >

                        @error('phone')

                            <div class="error">
                                {{ $message }}
                            </div>

                        @enderror

                    </div>


                    <!-- ROLE -->

                    <div class="form-group">

                        <label for="role">
                            User Role
                        </label>

                        <select
                            id="role"
                            name="role"
                            required
                        >

                            <option
                                value="buyer"
                                {{ old('role', $user->role) === 'buyer' ? 'selected' : '' }}
                            >
                                Buyer
                            </option>

                            <option
                                value="farmer"
                                {{ old('role', $user->role) === 'farmer' ? 'selected' : '' }}
                            >
                                Farmer
                            </option>

                            <option
                                value="admin"
                                {{ old('role', $user->role) === 'admin' ? 'selected' : '' }}
                            >
                                Admin
                            </option>

                        </select>

                        @error('role')

                            <div class="error">
                                {{ $message }}
                            </div>

                        @enderror

                    </div>


                    <!-- ADDRESS -->

                    <div class="form-group">

                        <label for="address">
                            Address
                        </label>

                        <input
                            type="text"
                            id="address"
                            name="address"
                            value="{{ old('address', $user->address) }}"
                            required
                        >

                        @error('address')

                            <div class="error">
                                {{ $message }}
                            </div>

                        @enderror

                    </div>


                    <!-- FARM NAME -->

                    @if($user->role === 'farmer')

                        <div class="form-group">

                            <label for="farm_name">
                                Farm Name
                            </label>

                            <input
                                type="text"
                                id="farm_name"
                                value="{{ $user->farm_name }}"
                                disabled
                            >

                        </div>


                        <!-- FARM LOCATION -->

                        <div class="form-group">

                            <label for="farm_location">
                                Farm Location
                            </label>

                            <input
                                type="text"
                                id="farm_location"
                                value="{{ $user->farm_location }}"
                                disabled
                            >

                        </div>

                    @endif


                </div>


                <!-- ROLE WARNING -->

                <div class="role-warning">

                    <strong>Important:</strong>

                    Changing a user's role changes which dashboard
                    they will access after logging in.

                    For example, changing a Buyer to Farmer will make
                    that account use the Farmer dashboard.

                </div>


                <!-- BUTTONS -->

                <div class="buttons">

                    <a
                        href="{{ route('admin.users') }}"
                        class="cancel-btn"
                    >
                        Cancel
                    </a>


                    <button
                        type="submit"
                        class="save-btn"
                    >
                        Save Changes
                    </button>

                </div>

            </form>

        </div>

    </main>

</div>

</body>

</html>