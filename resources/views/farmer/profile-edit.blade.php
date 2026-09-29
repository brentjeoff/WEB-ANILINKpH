<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>AniLink PH - Edit Profile</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Lucide Icons -->
    <script src="https://unpkg.com/lucide@latest"></script>

    <style>
        body {
            background-color: #E2DFD8;
            font-family: system-ui, -apple-system, BlinkMacSystemFont,
                'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
        }
    </style>
</head>

<body class="p-4 md:p-8 min-h-screen">

    <div class="bg-[#F6F5F2] w-full max-w-5xl mx-auto rounded-2xl shadow-xl overflow-hidden border border-stone-300">

        <!-- Header -->
        <div class="bg-[#1C5B32] text-white p-6">

            <div class="flex items-center gap-3">
                <div class="w-11 h-11 rounded-full bg-white/20 flex items-center justify-center">
                    <i data-lucide="user-pen" class="w-6 h-6"></i>
                </div>

                <div>
                    <h1 class="text-2xl font-bold">
                        Edit Profile
                    </h1>

                    <p class="text-emerald-100 text-sm">
                        Update your personal and farm information.
                    </p>
                </div>
            </div>

        </div>


        <!-- Form -->
        <div class="p-6 md:p-8">

            {{-- Success Message --}}
            @if(session('success'))
                <div class="mb-5 bg-emerald-100 text-emerald-800 px-4 py-3 rounded-lg">
                    {{ session('success') }}
                </div>
            @endif


            {{-- Validation Errors --}}
            @if ($errors->any())

                <div class="mb-5 bg-red-100 text-red-700 px-4 py-3 rounded-lg">

                    <div class="font-bold mb-1">
                        Please fix the following:
                    </div>

                    <ul class="list-disc ml-5 text-sm">

                        @foreach ($errors->all() as $error)

                            <li>{{ $error }}</li>

                        @endforeach

                    </ul>

                </div>

            @endif


            <form action="{{ route('farmer.profile.update') }}" method="POST">

                @csrf
                @method('PUT')


                <!-- Personal Information -->
                <div class="mb-8">

                    <h2 class="text-lg font-bold text-stone-800 mb-4 flex items-center gap-2">

                        <i data-lucide="user"
                           class="w-5 h-5 text-[#1C5B32]"></i>

                        Personal Information

                    </h2>


                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">


                        <!-- First Name -->
                        <div>

                            <label class="block text-sm font-semibold text-stone-700 mb-2">
                                First Name
                            </label>

                            <input
                                type="text"
                                name="first_name"
                                value="{{ old('first_name', $user->first_name) }}"
                                required
                                class="w-full px-4 py-3 bg-white border border-stone-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-emerald-700">

                        </div>


                        <!-- Last Name -->
                        <div>

                            <label class="block text-sm font-semibold text-stone-700 mb-2">
                                Last Name
                            </label>

                            <input
                                type="text"
                                name="last_name"
                                value="{{ old('last_name', $user->last_name) }}"
                                required
                                class="w-full px-4 py-3 bg-white border border-stone-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-emerald-700">

                        </div>


                        <!-- Email -->
                        <div>

                            <label class="block text-sm font-semibold text-stone-700 mb-2">
                                Email Address
                            </label>

                            <input
                                type="email"
                                name="email"
                                value="{{ old('email', $user->email) }}"
                                readonly
                                class="w-full px-4 py-3 bg-stone-100 border border-stone-300 rounded-xl text-stone-500 cursor-not-allowed">

                            <p class="text-xs text-stone-500 mt-1">
                                Email cannot be changed here.
                            </p>

                        </div>


                        <!-- Phone -->
                        <div>

                            <label class="block text-sm font-semibold text-stone-700 mb-2">
                                Phone Number
                            </label>

                            <input
                                type="text"
                                name="phone"
                                value="{{ old('phone', $user->phone) }}"
                                required
                                class="w-full px-4 py-3 bg-white border border-stone-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-emerald-700">

                        </div>


                        <!-- Address -->
                        <div class="md:col-span-2">

                            <label class="block text-sm font-semibold text-stone-700 mb-2">
                                Address
                            </label>

                            <textarea
                                name="address"
                                rows="3"
                                required
                                class="w-full px-4 py-3 bg-white border border-stone-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-emerald-700">{{ old('address', $user->address) }}</textarea>

                        </div>

                    </div>

                </div>


                <!-- Farm Information -->
                <div class="mb-8">

                    <h2 class="text-lg font-bold text-stone-800 mb-4 flex items-center gap-2">

                        <i data-lucide="tree-deciduous"
                           class="w-5 h-5 text-[#1C5B32]"></i>

                        Farm Information

                    </h2>


                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">


                        <!-- Farm Name -->
                        <div>

                            <label class="block text-sm font-semibold text-stone-700 mb-2">
                                Farm Name
                            </label>

                            <input
                                type="text"
                                name="farm_name"
                                value="{{ old('farm_name', $user->farm_name) }}"
                                class="w-full px-4 py-3 bg-white border border-stone-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-emerald-700">

                        </div>


                        <!-- Farm Location -->
                        <div>

                            <label class="block text-sm font-semibold text-stone-700 mb-2">
                                Farm Location
                            </label>

                            <input
                                type="text"
                                name="farm_location"
                                value="{{ old('farm_location', $user->farm_location) }}"
                                class="w-full px-4 py-3 bg-white border border-stone-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-emerald-700">

                        </div>

                    </div>

                </div>


                <!-- Buttons -->
                <div class="flex flex-col sm:flex-row gap-3 pt-5 border-t border-stone-200">


                    <!-- Save -->
                    <button
                        type="submit"
                        class="bg-[#1C5B32] hover:bg-emerald-900 text-white font-semibold px-6 py-3 rounded-xl flex items-center justify-center gap-2 transition">

                        <i data-lucide="save" class="w-5 h-5"></i>

                        Save Changes

                    </button>


                    <!-- Cancel -->
                    <a
                        href="/farmer/profile"
                        class="bg-stone-200 hover:bg-stone-300 text-stone-700 font-semibold px-6 py-3 rounded-xl flex items-center justify-center gap-2 transition">

                        <i data-lucide="x" class="w-5 h-5"></i>

                        Cancel

                    </a>

                </div>

            </form>

        </div>


        <!-- Footer -->
        <div class="p-4 text-center text-xs text-stone-500 border-t border-stone-200">
            © 2026 AniLink PH
        </div>

    </div>


    <script>
        lucide.createIcons();
    </script>

</body>

</html>