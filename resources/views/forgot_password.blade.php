<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>AniLink PH - Forgot Password</title>

    <!-- Bootstrap -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        body {
            background-color: #f4f7ed;
        }

        .forgot-card {
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

        .form-control:focus {
            border-color: #3f7d20;
            box-shadow: 0 0 0 0.2rem rgba(63, 125, 32, 0.15);
        }

        .back-link:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>

    <!-- Forgot Password -->
    <div class="container min-vh-100 d-flex justify-content-center align-items-center">

        <div
            class="card forgot-card shadow-lg border-0 rounded-4 p-4"
            style="max-width: 430px; width: 100%;"
        >

            <!-- AniLink PH -->
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


            <!-- Title -->
            <div class="text-center mb-4">

                <h4 class="fw-bold text-gray-800">
                    🔐 Forgot Password
                </h4>

                <p class="text-secondary small mt-2">
                    Enter your email address and we'll help you
                    reset your password.
                </p>

            </div>

            <!-- Form -->
             @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if ($errors->any())
    <div class="alert alert-danger">
        {{ $errors->first() }}
    </div>
@endif
            <form method="POST" action="{{ route('password.email') }}">
    @csrf

    <div class="mb-4">
        <label for="email" class="form-label fw-semibold">
            Email Address
        </label>

        <input
            type="email"
            id="email"
            name="email"
            value="{{ old('email') }}"
            class="form-control rounded-3 py-2"
            placeholder="example@email.com"
            required
        >
    </div>

    <div class="d-grid">
        <button
            type="submit"
            class="btn reset-btn text-white rounded-3 py-2 fw-bold"
        >
            🌱 Send Reset Link
        </button>
    </div>

    <div class="text-center mt-4">
        <a
            href="{{ url('/login') }}"
            class="green-text fw-semibold text-decoration-none back-link"
        >
            ← Back to Login
        </a>
    </div>
</form>

        </div>

    </div>

</body>
</html>