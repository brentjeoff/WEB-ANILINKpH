<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>AniLink PH - Reset Password</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        body {
            background-color: #f4f7ed;
        }

        .reset-card {
            border-top: 6px solid #3f7d20;
        }

        .green-text {
            color: #3f7d20;
        }

        .reset-btn {
            background-color: #3f7d20;
            border: none;
        }

        .reset-btn:hover {
            background-color: #326619;
        }
    </style>
</head>

<body>

<div class="container min-vh-100 d-flex justify-content-center align-items-center">

    <div
        class="card reset-card shadow-lg border-0 rounded-4 p-4"
        style="max-width: 430px; width: 100%;"
    >

        <div class="text-center mb-4">

            <div
                class="mx-auto bg-green-100 rounded-circle
                       d-flex justify-content-center align-items-center"
                style="width: 70px; height: 70px;"
            >
                <span class="text-4xl">🌾</span>
            </div>

            <h2 class="fw-bold green-text mt-3 mb-0">
                AniLink PH
            </h2>

        </div>

        <div class="text-center mb-4">

            <h4 class="fw-bold text-gray-800">
                🔐 Reset Password
            </h4>

            <p class="text-secondary small mt-2">
                Enter your new password below.
            </p>

        </div>
        @if ($errors->any())
    <div class="alert alert-danger">
        <strong>Something went wrong:</strong>
        <ul class="mb-0 mt-2">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
        <form method="POST" action="{{ route('password.update') }}">

            @csrf

            <input
                type="hidden"
                name="token"
                value="{{ $token }}"
            >

            <div class="mb-3">

                <label class="form-label fw-semibold">
                    Email Address
                </label>

                <input
                    type="email"
                    name="email"
                    value="{{ $email }}"
                    class="form-control rounded-3 py-2"
                    required
                >

            </div>

            <div class="mb-3">

                <label class="form-label fw-semibold">
                    New Password
                </label>

                <input
                    type="password"
                    name="password"
                    class="form-control rounded-3 py-2"
                    required
                >

            </div>

            <div class="mb-4">

                <label class="form-label fw-semibold">
                    Confirm New Password
                </label>

                <input
                    type="password"
                    name="password_confirmation"
                    class="form-control rounded-3 py-2"
                    required
                >

            </div>

            <div class="d-grid">

                <button
                    type="submit"
                    class="btn reset-btn text-white rounded-3 py-2 fw-bold"
                >
                    🌱 Reset Password
                </button>

            </div>

        </form>

    </div>

</div>

</body>
</html>