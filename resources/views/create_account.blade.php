```html
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>AniLink PH - Create Account</title>

    <!-- Bootstrap -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        body {
            background-color: #f4f7ed;
        }

        .account-card {
            border-top: 6px solid #3f7d20;
        }

        .green-text {
            color: #3f7d20;
        }

        .create-btn {
            background-color: #3f7d20;
            border: none;
        }

        .create-btn:hover {
            background-color: #326619;
        }

        .account-type {
            accent-color: #3f7d20;
        }
    </style>
</head>

<body>

<div class="container min-vh-100 d-flex justify-content-center align-items-center">

    <div class="card account-card shadow-lg border-0 rounded-4 p-4"
         style="max-width: 600px; width: 100%;">

        <!-- Header -->
        <div class="text-center mb-4">

            <div class="mx-auto bg-green-100 rounded-circle
                        d-flex justify-content-center align-items-center"
                 style="width: 70px; height: 70px;">

                <span class="text-4xl">🌾</span>

            </div>

            <h2 class="fw-bold green-text mt-3 mb-1">
                Create Your Account
            </h2>

            <p class="text-secondary mb-0">
                Join AniLink PH
            </p>

        </div>


        <!-- Validation Errors -->
        @if ($errors->any())

            <div class="alert alert-danger rounded-3">

                <ul class="mb-0 ps-3">

                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach

                </ul>

            </div>

        @endif


        <!-- Form -->
        <form action="{{ url('/user/register') }}" method="POST">

            @csrf


            <!-- Account Type -->
            <div class="mb-4">

                <label class="form-label fw-bold">
                    👤 Account Type
                </label>

                <div class="d-flex gap-4">

                    <!-- Farmer -->
                    <div class="form-check">

                        <input
                            class="form-check-input account-type"
                            type="radio"
                            name="role"
                            id="farmer"
                            value="farmer"
                            {{ old('role', 'farmer') == 'farmer' ? 'checked' : '' }}
                        >

                        <label class="form-check-label" for="farmer">
                            👨‍🌾 Farmer
                        </label>

                    </div>


                    <!-- Buyer -->
                    <div class="form-check">

                        <input
                            class="form-check-input account-type"
                            type="radio"
                            name="role"
                            id="buyer"
                            value="buyer"
                            {{ old('role') == 'buyer' ? 'checked' : '' }}
                        >

                        <label class="form-check-label" for="buyer">
                            🛒 Buyer
                        </label>

                    </div>

                </div>

            </div>


            <!-- First & Last Name -->
            <div class="row">

                <div class="col-md-6 mb-3">

                    <label class="form-label fw-semibold">
                        First Name
                    </label>

                    <input
                        type="text"
                        name="first_name"
                        class="form-control rounded-3 py-2"
                        placeholder="Enter your first name"
                        value="{{ old('first_name') }}"
                        required
                    >

                </div>


                <div class="col-md-6 mb-3">

                    <label class="form-label fw-semibold">
                        Last Name
                    </label>

                    <input
                        type="text"
                        name="last_name"
                        class="form-control rounded-3 py-2"
                        placeholder="Enter your last name"
                        value="{{ old('last_name') }}"
                        required
                    >

                </div>

            </div>


            <!-- Email -->
            <div class="mb-3">

                <label class="form-label fw-semibold">
                    Email Address
                </label>

                <input
                    type="email"
                    name="email"
                    class="form-control rounded-3 py-2"
                    placeholder="Enter your email"
                    value="{{ old('email') }}"
                    required
                >

            </div>


            <!-- Address -->
            <div class="mb-3">

                <label class="form-label fw-semibold">
                    Address
                </label>

                <input
                    type="text"
                    name="address"
                    class="form-control rounded-3 py-2"
                    placeholder="Enter your address"
                    value="{{ old('address') }}"
                    required
                >

            </div>


            <!-- Phone -->
            <div class="mb-3">

                <label class="form-label fw-semibold">
                    Phone Number
                </label>

                <input
                    type="text"
                    name="phone"
                    class="form-control rounded-3 py-2"
                    placeholder="09XXXXXXXXX"
                    value="{{ old('phone') }}"
                    maxlength="11"
                    required
                >

            </div>


            <!-- FARMER ONLY FIELDS -->
            <div id="farmerFields">

                <div class="row">

                    <!-- Farm Name -->
                    <div class="col-md-6 mb-3">

                        <label class="form-label fw-semibold">
                            Farm Name
                        </label>

                        <input
                            type="text"
                            name="farm_name"
                            id="farm_name"
                            class="form-control rounded-3 py-2"
                            placeholder="Enter farm name"
                            value="{{ old('farm_name') }}"
                        >

                    </div>


                    <!-- Farm Location -->
                    <div class="col-md-6 mb-3">

                        <label class="form-label fw-semibold">
                            Farm Location
                        </label>

                        <input
                            type="text"
                            name="farm_location"
                            id="farm_location"
                            class="form-control rounded-3 py-2"
                            placeholder="Enter farm location"
                            value="{{ old('farm_location') }}"
                        >

                    </div>

                </div>

            </div>


            <!-- Password -->
            <div class="row">

                <div class="col-md-6 mb-3">

                    <label class="form-label fw-semibold">
                        Password
                    </label>

                    <input
                        type="password"
                        name="password"
                        class="form-control rounded-3 py-2"
                        placeholder="Create a password"
                        required
                    >

                </div>


                <div class="col-md-6 mb-3">

                    <label class="form-label fw-semibold">
                        Confirm Password
                    </label>

                    <input
                        type="password"
                        name="password_confirmation"
                        class="form-control rounded-3 py-2"
                        placeholder="Re-enter your password"
                        required
                    >

                </div>

            </div>


            <!-- Register Button -->
            <div class="d-grid">

                <button
                    type="submit"
                    class="btn create-btn text-white rounded-3 py-2 fw-bold"
                >
                    🌱 Register
                </button>

            </div>


            <!-- Login -->
            <div class="text-center mt-4">

                <span class="text-secondary">
                    Already have an account?
                </span>

                <a
                    href="/login"
                    class="green-text fw-bold text-decoration-none"
                >
                    Login
                </a>

            </div>

        </form>

    </div>

</div>


<!-- Simple Farmer/Buyer JavaScript -->
<script>

    const farmer = document.getElementById('farmer');
    const buyer = document.getElementById('buyer');

    const farmerFields = document.getElementById('farmerFields');

    function showFarmerFields() {

        if (farmer.checked) {
            farmerFields.style.display = 'block';
        } else {
            farmerFields.style.display = 'none';

            document.getElementById('farm_name').value = '';
            document.getElementById('farm_location').value = '';
        }

    }

    farmer.addEventListener('change', showFarmerFields);
    buyer.addEventListener('change', showFarmerFields);

    // Check when page loads
    showFarmerFields();

</script>

</body>
</html>
