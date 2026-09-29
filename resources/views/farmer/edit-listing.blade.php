<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>AniLink - Edit Harvest</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
</head>

<body class="p-4 md:p-8 bg-[#E2DFD8] min-h-screen">

<div class="max-w-5xl mx-auto bg-[#F6F5F2] rounded-2xl shadow-xl overflow-hidden">

    <div class="p-6 border-b border-stone-200">
        <a href="{{ route('farmer.my-listings') }}"
           class="inline-flex items-center gap-2 text-stone-600 hover:text-stone-900 text-sm">
            <i data-lucide="arrow-left" class="w-4 h-4"></i>
            Back to My Listings
        </a>

        <h1 class="text-2xl font-bold text-stone-800 mt-4">
            Edit Harvest Listing
        </h1>

        <p class="text-sm text-stone-500">
            Update the details of your harvest listing.
        </p>
    </div>

    @if($errors->any())
        <div class="mx-6 mt-6 p-4 bg-red-100 border border-red-300 text-red-800 rounded-xl">
            <ul class="list-disc pl-5 text-sm">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form
        action="{{ route('farmer.listing.update', $listing->id) }}"
        method="POST"
        enctype="multipart/form-data"
        class="p-6 space-y-6"
    >

        @csrf
        @method('PUT')

        <!-- Product Name -->
        <div>
            <label class="block text-xs font-bold text-stone-700 uppercase mb-1">
                Produce / Crop Name
            </label>

            <input
                type="text"
                name="product_name"
                value="{{ old('product_name', $listing->product_name) }}"
                required
                class="w-full px-4 py-2.5 bg-stone-50 border border-stone-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-emerald-700"
            >
        </div>

        <!-- Category + Farming Method -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

            <div>
                <label class="block text-xs font-bold text-stone-700 uppercase mb-1">
                    Category
                </label>

                <select
                    name="category"
                    required
                    class="w-full px-4 py-2.5 bg-stone-50 border border-stone-200 rounded-xl text-sm"
                >
                    <option value="vegetables"
                        {{ old('category', $listing->category) == 'vegetables' ? 'selected' : '' }}>
                        Vegetables
                    </option>

                    <option value="fruits"
                        {{ old('category', $listing->category) == 'fruits' ? 'selected' : '' }}>
                        Fruits
                    </option>

                    <option value="grains"
                        {{ old('category', $listing->category) == 'grains' ? 'selected' : '' }}>
                        Grains & Rice
                    </option>

                    <option value="root"
                        {{ old('category', $listing->category) == 'root' ? 'selected' : '' }}>
                        Root Crops
                    </option>
                </select>
            </div>

            <div>
                <label class="block text-xs font-bold text-stone-700 uppercase mb-1">
                    Farming Method
                </label>

                <select
                    name="farming_method"
                    required
                    class="w-full px-4 py-2.5 bg-stone-50 border border-stone-200 rounded-xl text-sm"
                >
                    <option value="organic"
                        {{ old('farming_method', $listing->farming_method) == 'organic' ? 'selected' : '' }}>
                        Organic
                    </option>

                    <option value="conventional"
                        {{ old('farming_method', $listing->farming_method) == 'conventional' ? 'selected' : '' }}>
                        Conventional
                    </option>

                    <option value="hydroponic"
                        {{ old('farming_method', $listing->farming_method) == 'hydroponic' ? 'selected' : '' }}>
                        Hydroponic
                    </option>
                </select>
            </div>

        </div>

        <!-- Description -->
        <div>
            <label class="block text-xs font-bold text-stone-700 uppercase mb-1">
                Description
            </label>

            <textarea
                name="description"
                rows="4"
                class="w-full px-4 py-2.5 bg-stone-50 border border-stone-200 rounded-xl text-sm"
            >{{ old('description', $listing->description) }}</textarea>
        </div>

        <!-- Price / Quantity / Unit -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">

            <div>
                <label class="block text-xs font-bold text-stone-700 uppercase mb-1">
                    Price (₱)
                </label>

                <input
                    type="number"
                    name="price"
                    step="0.01"
                    min="0"
                    value="{{ old('price', $listing->price) }}"
                    required
                    class="w-full px-4 py-2.5 bg-stone-50 border border-stone-200 rounded-xl text-sm"
                >
            </div>

            <div>
                <label class="block text-xs font-bold text-stone-700 uppercase mb-1">
                    Quantity
                </label>

                <input
                    type="number"
                    name="quantity"
                    step="0.01"
                    min="0"
                    value="{{ old('quantity', $listing->quantity) }}"
                    required
                    class="w-full px-4 py-2.5 bg-stone-50 border border-stone-200 rounded-xl text-sm"
                >
            </div>

            <div>
                <label class="block text-xs font-bold text-stone-700 uppercase mb-1">
                    Unit
                </label>

                <select
                    name="unit"
                    required
                    class="w-full px-4 py-2.5 bg-stone-50 border border-stone-200 rounded-xl text-sm"
                >
                    <option value="kg" {{ $listing->unit == 'kg' ? 'selected' : '' }}>
                        Kilogram (kg)
                    </option>

                    <option value="sack" {{ $listing->unit == 'sack' ? 'selected' : '' }}>
                        Sack (50kg)
                    </option>

                    <option value="box" {{ $listing->unit == 'box' ? 'selected' : '' }}>
                        Box/Crate
                    </option>

                    <option value="piece" {{ $listing->unit == 'piece' ? 'selected' : '' }}>
                        Piece
                    </option>
                </select>
            </div>

        </div>

        <!-- Current Image -->
        <div>

            <label class="block text-xs font-bold text-stone-700 uppercase mb-2">
                Product Photo
            </label>

            @if($listing->image)

                <img
                    src="{{ asset('storage/' . $listing->image) }}"
                    class="w-48 h-48 object-cover rounded-xl border border-stone-200 mb-3"
                >

            @else

                <p class="text-sm text-stone-500 mb-3">
                    No photo uploaded.
                </p>

            @endif

            <input
                type="file"
                name="image"
                accept=".jpg,.jpeg,.png,.webp"
                class="w-full bg-stone-50 border border-stone-200 rounded-xl p-3 text-sm"
            >

            <p class="text-xs text-stone-400 mt-1">
                Leave empty if you don't want to change the current photo.
            </p>

        </div>

        <!-- Fulfillment -->
        <div class="space-y-3">

            <label class="flex items-center gap-3">
                <input
                    type="checkbox"
                    name="farm_pickup"
                    value="1"
                    {{ $listing->farm_pickup ? 'checked' : '' }}
                    class="w-4 h-4 text-emerald-700"
                >

                <span class="text-sm text-stone-700">
                    Farm Pickup Available
                </span>
            </label>

            <label class="flex items-center gap-3">
                <input
                    type="checkbox"
                    name="local_delivery"
                    value="1"
                    {{ $listing->local_delivery ? 'checked' : '' }}
                    class="w-4 h-4 text-emerald-700"
                >

                <span class="text-sm text-stone-700">
                    Local Delivery Offered
                </span>
            </label>

        </div>

        <!-- Buttons -->
        <div class="flex gap-3 pt-4">

            <a
                href="{{ route('farmer.my-listings') }}"
                class="flex-1 text-center bg-stone-200 hover:bg-stone-300 text-stone-700 font-semibold py-3 rounded-xl"
            >
                Cancel
            </a>

            <button
                type="submit"
                class="flex-1 bg-[#1C5B32] hover:bg-emerald-900 text-white font-bold py-3 rounded-xl"
            >
                Update Listing
            </button>

        </div>

    </form>

</div>

<script>
    lucide.createIcons();
</script>

</body>
</html> 