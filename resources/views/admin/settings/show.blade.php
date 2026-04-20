<x-app-layout>
    <div class="p-6 max-w-6xl mx-auto space-y-6">

        <!-- HEADER -->
        <div class="flex justify-between items-center">
            <div>
                <h1 class="text-2xl font-bold text-gray-800">
                    Company Settings Detail
                </h1>
                <p class="text-sm text-gray-500">
                    View your company profile information
                </p>
            </div>

            <a href="{{ route('admin.settings.index') }}"
                class="px-4 py-2 bg-gray-100 rounded-lg hover:bg-gray-200 text-sm">
                ← Back
            </a>
        </div>

        <!-- COMPANY INFO -->
        <div class="bg-white rounded-2xl shadow p-6 space-y-4">
            <h2 class="text-lg font-semibold text-gray-800">Company Info</h2>

            <div class="grid md:grid-cols-2 gap-4">

                <div>
                    <label class="block text-sm text-gray-500 mb-1">Company Name</label>
                    <input type="text" value="{{ $setting->company_name }}"
                        class="w-full rounded-lg border border-gray-200 bg-gray-50 px-3 py-2 text-gray-700" disabled>
                </div>

                <div>
                    <label class="block text-sm text-gray-500 mb-1">Email</label>
                    <input type="email" value="{{ $setting->email }}"
                        class="w-full rounded-lg border border-gray-200 bg-gray-50 px-3 py-2 text-gray-700" disabled>
                </div>

                <div>
                    <label class="block text-sm text-gray-500 mb-1">Phone</label>
                    <input type="text" value="{{ $setting->phone }}"
                        class="w-full rounded-lg border border-gray-200 bg-gray-50 px-3 py-2 text-gray-700" disabled>
                </div>

                <div>
                    <label class="block text-sm text-gray-500 mb-1">Address</label>
                    <input type="text" value="{{ $setting->address }}"
                        class="w-full rounded-lg border border-gray-200 bg-gray-50 px-3 py-2 text-gray-700" disabled>
                </div>

            </div>

            @if ($setting->logo)
                <div>
                    <label class="block text-sm text-gray-500 mb-2">Logo</label>
                    <img src="{{ asset('storage/' . $setting->logo) }}" class="w-24 rounded-xl border">
                </div>
            @endif
        </div>
        <!--Social Media -->
        <div class="bg-white rounded-2xl shadow p-6 space-y-4">
            <h2 class="text-lg font-semibold text-gray-800">Social Media</h2>

            <div class="grid md:grid-cols-3 gap-4 mt-6">


                @if ($setting?->instagram)
                    <a href="{{ $setting->instagram }}" target="_blank"
                        class="flex items-center gap-3 p-4 rounded-2xl bg-white/5 border border-white/10 hover:bg-white/10 transition">

                        <!-- ICON -->
                        <div
                            class="w-10 h-10 flex items-center justify-center rounded-xl bg-white text-pink-500 shadow-sm">
                            <!-- Instagram SVG -->
                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24"
                                class="w-5 h-5">
                                <path
                                    d="M7.75 2C4.574 2 2 4.574 2 7.75v8.5C2 19.426 4.574 22 7.75 22h8.5C19.426 22 22 19.426 22 16.25v-8.5C22 4.574 19.426 2 16.25 2h-8.5zM12 7a5 5 0 110 10 5 5 0 010-10zm6.5-.25a1.25 1.25 0 11-2.5 0 1.25 1.25 0 012.5 0z" />
                            </svg>
                        </div>

                        <!-- TEXT -->
                        <div>
                            <p class="text-sm text-slate-400">Instagram</p>
                            <p class="text-white font-semibold">Visit Profile</p>
                        </div>

                    </a>
                @endif

                @if ($setting?->tiktok)
                    <a href="{{ $setting->tiktok }}" target="_blank"
                        class="flex items-center gap-3 p-4 rounded-2xl bg-white/5 border border-white/10 hover:bg-white/10 transition">

                        <!-- ICON -->
                        <div
                            class="w-10 h-10 flex items-center justify-center rounded-xl bg-white text-black shadow-sm">
                            <!-- TikTok SVG -->
                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24"
                                class="w-5 h-5">
                                <path
                                    d="M12.75 2h2.5a4.75 4.75 0 004.75 4.75v2.5a7.25 7.25 0 01-4.75-1.75v7.75a6.25 6.25 0 11-6.25-6.25h.5v2.5h-.5a3.75 3.75 0 103.75 3.75V2z" />
                            </svg>
                        </div>

                        <!-- TEXT -->
                        <div>
                            <p class="text-sm text-slate-400">TikTok</p>
                            <p class="text-white font-semibold">Watch Content</p>
                        </div>

                    </a>
                @endif

                @if ($setting?->linkedin)
                    <a href="{{ $setting->linkedin }}" target="_blank"
                        class="flex items-center gap-3 p-4 rounded-2xl bg-white/5 border border-white/10 hover:bg-white/10 transition">

                        <!-- ICON -->
                        <div
                            class="w-10 h-10 flex items-center justify-center rounded-xl bg-white text-[#0A66C2] shadow-sm">
                            <!-- LinkedIn SVG -->
                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24"
                                class="w-5 h-5">
                                <path
                                    d="M20.447 20.452h-3.554v-5.569c0-1.327-.027-3.036-1.849-3.036-1.849 0-2.132 1.445-2.132 2.939v5.666H9.358V9h3.414v1.561h.049c.476-.9 1.637-1.849 3.37-1.849 3.604 0 4.269 2.372 4.269 5.456v6.284zM5.337 7.433a2.062 2.062 0 1 1 0-4.124 2.062 2.062 0 0 1 0 4.124zM6.99 20.452H3.684V9h3.306v11.452z" />
                            </svg>
                        </div>

                        <!-- TEXT -->
                        <div>
                            <p class="text-sm text-slate-400">LinkedIn</p>
                            <p class="text-white font-semibold">
                                Visit Profile
                            </p>
                        </div>

                    </a>
                @endif

            </div>
        </div>
    </div>
</x-app-layout>
