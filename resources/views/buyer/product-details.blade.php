<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $listing->product_name }} - AniLink PH</title>

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
            --cream: #f5f3ec;
            --ink: #1f2a22;
            --ink-soft: #5b6b5f;
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

        .page {
            max-width: 1100px;
            margin: 0 auto;
            padding: 35px 25px;
        }

        /* BACK BUTTON */
        .back {
            display: inline-block;
            margin-bottom: 25px;
            color: #3f7d20;
            font-weight: 700;
            text-decoration: none;
        }

        .back:hover {
            text-decoration: underline;
        }

        /* PRODUCT CARD */
        .product-card {
            background: white;
            border: 1px solid var(--line);
            border-radius: 22px;
            overflow: hidden;
            display: grid;
            grid-template-columns: 1fr 1fr;
            box-shadow: 0 5px 20px rgba(23, 51, 33, 0.08);
        }

        /* PRODUCT IMAGE */
        .product-image {
            min-height: 450px;
            background: #f0f4ec;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .product-image img {
            width: 100%;
            height: 100%;
            min-height: 450px;
            object-fit: cover;
        }

        .placeholder {
            font-size: 120px;
        }

        /* DETAILS */
        .details {
            padding: 40px;
        }

        .category {
            display: inline-block;
            background: #e8f2df;
            color: #3f7d20;
            padding: 7px 12px;
            border-radius: 999px;
            font-size: 12px;
            font-weight: 800;
            text-transform: uppercase;
        }

        h1 {
            font-family: "Fraunces", serif;
            font-size: 42px;
            margin: 15px 0 8px;
        }

        .farmer {
            color: var(--ink-soft);
            margin-bottom: 25px;
            line-height: 1.6;
        }

        .farmer strong {
            color: var(--ink);
        }

        .price {
            font-size: 28px;
            font-weight: 800;
            color: #3f7d20;
        }

        .price span {
            font-size: 14px;
            color: var(--ink-soft);
        }

        .stock {
            margin-top: 8px;
            color: var(--ink-soft);
            font-size: 14px;
        }

        .description {
            margin: 25px 0;
            line-height: 1.7;
            color: var(--ink-soft);
        }

        /* FORM */
        .form-group {
            margin-top: 20px;
        }

        label {
            display: block;
            font-weight: 800;
            font-size: 14px;
            margin-bottom: 8px;
        }

        input,
        select {
            width: 100%;
            padding: 13px;
            border: 1px solid var(--line);
            border-radius: 10px;
            font-family: inherit;
            font-size: 14px;
            background: white;
        }

        input:focus,
        select:focus {
            outline: none;
            border-color: var(--brand-green);
            box-shadow: 0 0 0 3px rgba(95, 156, 63, 0.12);
        }

        /* TOTAL */
        .total {
            margin-top: 20px;
            padding: 15px;
            background: #f0f4ec;
            border-radius: 12px;
            display: flex;
            justify-content: space-between;
            font-weight: 800;
        }

        /* PLACE ORDER BUTTON */
        .order-btn {
            width: 100%;
            margin-top: 18px;
            border: none;
            background: var(--brand-green);
            color: white;
            padding: 15px;
            border-radius: 12px;
            font-size: 15px;
            font-weight: 800;
            cursor: pointer;
            transition: 0.2s ease;
        }

        .order-btn:hover {
            background: #4f8933;
        }

        /* MESSAGE FARMER BUTTON */
        .message-farmer-btn {
            display: block;
            width: 100%;
            margin-top: 12px;
            padding: 14px;
            background: #eef5e9;
            color: #3f7d20;
            border: 1px solid #cfe2c3;
            border-radius: 12px;
            text-align: center;
            text-decoration: none;
            font-size: 15px;
            font-weight: 800;
            transition: 0.2s ease;
        }

        .message-farmer-btn:hover {
            background: #dfeeda;
            color: #2f6418;
        }

        /* ALERTS */
        .alert {
            padding: 14px;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        .alert-success {
            background: #e8f2df;
            color: #356d1c;
        }

        .alert-error {
            background: #fff0f0;
            color: #b43d3d;
        }

        .alert ul {
            margin: 0;
            padding-left: 20px;
        }

        /* RESPONSIVE */
        @media (max-width: 750px) {

            .product-card {
                grid-template-columns: 1fr;
            }

            .product-image,
            .product-image img {
                min-height: 300px;
            }

            .details {
                padding: 25px;
            }

            h1 {
                font-size: 32px;
            }

            .page {
                padding: 25px 15px;
            }
        }
    </style>
</head>

<body>

<div class="page">

    <!-- BACK TO MARKETPLACE -->
    <a
        href="{{ route('buyer.marketplace') }}"
        class="back"
    >
        ← Back to Marketplace
    </a>


    <!-- SUCCESS MESSAGE -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif


    <!-- ERROR MESSAGE -->
    @if(session('error'))
        <div class="alert alert-error">
            {{ session('error') }}
        </div>
    @endif


    <!-- VALIDATION ERRORS -->
    @if($errors->any())
        <div class="alert alert-error">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <!-- PRODUCT CARD -->
    <div class="product-card">


        <!-- ========================= -->
        <!-- PRODUCT IMAGE -->
        <!-- ========================= -->

        <div class="product-image">

            @if($listing->image)

                <img
                    src="{{ asset('storage/' . $listing->image) }}"
                    alt="{{ $listing->product_name }}"
                >

            @else

                <div class="placeholder">
                    🌾
                </div>

            @endif

        </div>


        <!-- ========================= -->
        <!-- PRODUCT DETAILS -->
        <!-- ========================= -->

        <div class="details">

            <!-- CATEGORY -->
            <span class="category">
                {{ $listing->category }}
            </span>


            <!-- PRODUCT NAME -->
            <h1>
                {{ $listing->product_name }}
            </h1>


            <!-- FARMER -->
            <div class="farmer">

                Farmer:

                <strong>
                    {{ $listing->farmer->first_name }}
                    {{ $listing->farmer->last_name }}
                </strong>

                <br>

                📍
                {{ $listing->farmer->farm_location ?? $listing->farmer->address }}

            </div>


            <!-- PRICE -->
            <div class="price">

                ₱{{ number_format($listing->price, 2) }}

                <span>
                    /{{ $listing->unit }}
                </span>

            </div>


            <!-- STOCK -->
            <div class="stock">

                {{ $listing->quantity }}
                {{ $listing->unit }}
                available

            </div>


            <!-- DESCRIPTION -->
            @if($listing->description)

                <div class="description">
                    {{ $listing->description }}
                </div>

            @endif


            <!-- ========================= -->
            <!-- ORDER FORM -->
            <!-- ========================= -->

            <form
                method="POST"
                action="{{ route('buyer.order.store', $listing->id) }}"
            >

                @csrf


                <!-- QUANTITY -->
                <div class="form-group">

                    <label for="quantity">
                        Quantity
                    </label>

                    <input
                        type="number"
                        id="quantity"
                        name="quantity"
                        value="1"
                        min="1"
                        max="{{ $listing->quantity }}"
                        required
                    >

                </div>


                <!-- FULFILLMENT -->
                <div class="form-group">

                    <label for="fulfillment_method">
                        Fulfillment Method
                    </label>

                    <select
                        name="fulfillment_method"
                        id="fulfillment_method"
                        required
                    >

                        <option value="">
                            Select fulfillment method
                        </option>

                        @if($listing->farm_pickup)

                            <option value="Farm Pickup">
                                Farm Pickup
                            </option>

                        @endif

                        @if($listing->local_delivery)

                            <option value="Local Delivery">
                                Local Delivery
                            </option>

                        @endif

                    </select>

                </div>


                <!-- TOTAL -->
                <div class="total">

                    <span>
                        Total
                    </span>

                    <span id="totalPrice">
                        ₱{{ number_format($listing->price, 2) }}
                    </span>

                </div>


                <!-- PLACE ORDER -->
                <button
                    type="submit"
                    class="order-btn"
                >
                    Place Order
                </button>

            </form>


            <!-- ========================= -->
            <!-- MESSAGE FARMER -->
            <!-- ========================= -->

            <a
                href="{{ route('buyer.messages', ['user' => $listing->farmer->id]) }}"
                class="message-farmer-btn"
            >
                💬 Message Farmer
            </a>

        </div>

    </div>

</div>


<!-- ========================= -->
<!-- JAVASCRIPT -->
<!-- ========================= -->

<script>

    const quantityInput =
        document.getElementById('quantity');

    const totalPrice =
        document.getElementById('totalPrice');

    const unitPrice =
        {{ $listing->price }};


    function updateTotal() {

        let quantity =
            parseInt(quantityInput.value) || 1;

        if (quantity < 1) {
            quantity = 1;
        }

        const total =
            unitPrice * quantity;

        totalPrice.textContent =
            '₱' +
            total.toLocaleString('en-PH', {
                minimumFractionDigits: 2,
                maximumFractionDigits: 2
            });

    }


    quantityInput.addEventListener(
        'input',
        updateTotal
    );

</script>

</body>

</html>