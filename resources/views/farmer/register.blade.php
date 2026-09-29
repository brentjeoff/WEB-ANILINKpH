<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>AniLink PH - Registration</title>

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

        .registration-card {
            border-top: 6px solid #3f7d20;
        }

        .green-text {
            color: #3f7d20;
        }

        .register-btn {
            background-color: #3f7d20;
            border: none;
        }

        .register-btn:hover {
            background-color: #326619;
        }

        .form-control:focus {
            border-color: #3f7d20;
            box-shadow: 0 0 0 0.2rem rgba(63, 125, 32, 0.15);
        }

        .login-link:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>

    <!-- Registration -->
    <div class="container min-vh-100 d-flex justify-content-center align-items-center">

        <div
            class="card registration-card shadow-lg border-0 rounded-4 p-4"
            style="max-width: 600px; width: 100%;"
        >

            <!-- Header -->
            <div class="text-center mb-4">

                <div
                    class="mx-auto bg-green-100 rounded-circle
                           d-flex justify-content-center align-items-center"
                    style="width: 75px; height: 75px;"
                >
                    <span class="text-4xl">
                        {{ $role === 'farmer' ? '👨‍🌾' : '🛒' }}
                    </span>
                </div>

                <h2 class="fw-bold green-text mt-3 mb-1">
                    {{ $role === 'farmer' ? 'FARMER REGISTRATION' : 'BUYER REGISTRATION' }}
                </h2>

                <p class="text-secondary mb-0">
                    Create your AniLink PH account
                </p>

            </div>


            <!-- Form -->
            <form action="{{ route('register.submit') }}" method="POST">
                @csrf

                <!-- Role carried over from account type selection -->
                <input type="hidden" name="role" value="{{ $role }}">

                <!-- First Name & Last Name -->
                <div class="row">

                    <div class="col-md-6 mb-3">

                        <label
                            for="firstName"
                            class="form-label fw-semibold"
                        >
                            First Name
                        </label>

                        <input
                            type="text"
                            id="firstName"
                            name="first_name"
                            class="form-control rounded-3 py-2"
                            placeholder="Enter first name"
                            value="{{ old('first_name') }}"
                            required
                        >

                    </div>


                    <div class="col-md-6 mb-3">

                        <label
                            for="lastName"
                            class="form-label fw-semibold"
                        >
                            Last Name
                        </label>

                        <input
                            type="text"
                            id="lastName"
                            name="last_name"
                            class="form-control rounded-3 py-2"
                            placeholder="Enter last name"
                            value="{{ old('last_name') }}"
                            required
                        >

                    </div>

                </div>


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
                        class="form-label fw-semibold"
                    >
                        Password
                    </label>

                    <input
                        type="password"
                        id="password"
                        name="password"
                        class="form-control rounded-3 py-2"
                        placeholder="Create a password"
                        required
                    >

                </div>


                <!-- Confirm Password -->
                <div class="mb-3">

                    <label
                        for="password_confirmation"
                        class="form-label fw-semibold"
                    >
                        Confirm Password
                    </label>

                    <input
                        type="password"
                        id="password_confirmation"
                        name="password_confirmation"
                        class="form-control rounded-3 py-2"
                        placeholder="Re-enter your password"
                        required
                    >

                </div>


                <!-- Contact Number -->
                <div class="mb-3">

                    <label
                        for="contact"
                        class="form-label fw-semibold"
                    >
                        Contact Number
                    </label>

                    <input
                        type="tel"
                        id="contact"
                        name="contact_no"
                        class="form-control rounded-3 py-2"
                        placeholder="09XXXXXXXXX"
                        value="{{ old('contact_no') }}"
                        required
                    >

                </div>


                <!-- Address -->
                <div class="mb-4">

                    <label
                        for="address"
                        class="form-label fw-semibold"
                    >
                        Address
                    </label>

                    <textarea
                        id="address"
                        name="address"
                        class="form-control rounded-3"
                        rows="3"
                        placeholder="Enter your complete address"
                        required
                    >{{ old('address') }}</textarea>

                </div>


                <!-- Register Button -->
                <div class="d-grid">

                    <button
                        type="submit"
                        class="btn register-btn text-white
                               rounded-3 py-2 fw-bold"
                    >
                        {{ $role === 'farmer' ? '🌱 Register Farmer' : '🛒 Register Buyer' }}
                    </button>

                </div>


                <!-- Login -->
                <div class="text-center mt-4">

                    <span class="text-secondary">
                        Already have an account?
                    </span>

                    <a
                        href="/login"
                        class="green-text fw-bold
                               text-decoration-none login-link"
                    >
                        Login
                    </a>

                </div>

            </form>

        </div>

    </div>

</body>
</html>