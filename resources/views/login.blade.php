<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>AniLink PH - Farmer Login</title>

    <!-- Bootstrap -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        body {
            background: #f4f7ed;
        }

        .farmer-card {
            background: #ffffff;
            border-top: 6px solid #3f7d20;
        }

        .farmer-btn {
            background-color: #3f7d20;
            border: none;
        }

        .farmer-btn:hover {
            background-color: #326619;
        }

        .green-text {
            color: #3f7d20;
        }
    </style>
</head>

<body>

<div class="container min-vh-100 d-flex justify-content-center align-items-center">

    <div
        class="card farmer-card shadow-lg border-0 rounded-4 p-4"
        style="max-width: 420px; width: 100%;"
    >

        <!-- Logo -->
        <div class="text-center mb-3">

            <div
                class="mx-auto bg-green-100 rounded-circle d-flex justify-content-center align-items-center"
                style="width: 75px; height: 75px;"
            >
                <span class="text-4xl">🌾</span>
            </div>

            <h2 class="fw-bold green-text mt-3 mb-1">
                AniLink PH
            </h2>

            <p class="text-secondary">
                Connecting Farmers to Buyers
            </p>

        </div>


        <!-- Success Message -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif


        <!-- Error Messages -->
        @if($errors->any())
            <div class="alert alert-danger">

                <ul class="mb-0">

                  @if (session('success'))
    <div>
        {{ session('success') }}
    </div>
@endif

                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach

                </ul>

            </div>
        @endif


        <!-- Login Form -->
        <form action="{{ url('/login') }}" method="POST">

            @csrf

            <!-- Email -->
            <div class="mb-3">

                <label
                    for="email"
                    class="form-label fw-semibold"
                >
                    Email Address
                </label>

                <input
                    type="email"
                    id="email"
                    name="email"
                    class="form-control rounded-3 py-2"
                    placeholder="Enter your email"
                    value="{{ old('email') }}"
                    required
                >

            </div>


            <!-- Password -->
            <div class="mb-3">

                <label
                    for="password"
                    class="form-label fw-semibold text-gray-700"
                >
                    Password
                </label>

                <input
                    type="password"
                    id="password"
                    name="password"
                    class="form-control rounded-3 py-2"
                    placeholder="Enter your password"
                    required
                >

            </div>


            <!-- Remember Me -->
            <div class="d-flex justify-content-between align-items-center mb-4">

                <div class="form-check">

                    <input
                        type="checkbox"
                        name="remember"
                        class="form-check-input"
                        id="remember"
                    >

                    <label
                        class="form-check-label text-secondary"
                        for="remember"
                    >
                        Remember me
                    </label>

                </div>


                <a
                    href="/forgotPassword"
                    class="text-decoration-none green-text fw-semibold"
                >
                    Forgot Password?
                </a>

            </div>


            <!-- Login Button -->
            <div class="d-grid">

                <button
                    type="submit"
                    class="btn farmer-btn text-white rounded-3 py-2 fw-bold"
                >
                
                    🌱 LOGIN
                </button>

            </div>


            <!-- Registration -->
            <div class="text-center mt-4">

                <p class="text-secondary mb-1">
                    Don't have an account?
                </p>

                <a
                    href="/create-account"
                    class="text-decoration-none green-text fw-bold hover:underline"
                >
                    Create Account
                </a>    

            </div>

        </form>


        <!-- Footer -->
        <div class="text-center mt-4">

            <small class="text-secondary">
                🌱 Supporting Filipino Farmers
            </small>

        </div>

    </div>

</div>

</body>
</html>
```
