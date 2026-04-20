<x-app-layout>
     @if (session('error'))
        <div class="bg-red-500 text-white p-3 rounded mb-4">
            {{ session('error') }}
        </div>
    @endif
    <div class="p-6 max-w-6xl mx-auto space-y-6">

        <!-- HEADER -->
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <div class="flex items-center justify-between mb-6">
                    <div>
                        <h1 class="text-2xl font-bold text-gray-800">Update Company Settings</h1>
                        <p class="text-sm text-gray-500 mt-1">Update company information and settings</p>
                    </div>
                    <a href="{{ route('admin.settings.index') }}"
                        class="bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition-colors duration-200">
                        ← Back to Settings
                    </a>
                </div>
            </div>
        </div>

        <form method="POST" action="{{ route('admin.settings.update', $setting->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="bg-white rounded-2xl shadow p-6 space-y-5 mt-6">
                <h2 class="text-lg font-semibold text-gray-800">Company Information</h2>
                    <div>
                        <x-input-label for="company_name" :value="__('Company Name')" class="mb-1" />
                        <x-text-input id="company_name" class="block mt-1 w-full" type="text" name="company_name"
                            :value="old('company_name', $setting->company_name)"  autofocus autocomplete="organization" />
                        @error('company_name')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <x-input-label for="email" :value="__('Email Address')" class="mb-1" />
                        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                            :value="old('email', $setting->email)"  autocomplete="email" />
                        @error('email')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <x-input-label for="phone" :value="__('Phone')" class="mb-1" />
                        <x-text-input id="phone" class="block mt-1 w-full" type="text" name="phone"
                            :value="old('phone', $setting->phone)"  />
                        @error('phone')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>


                    <div class="mt-3">
                        <x-input-label for="address" value="Address" />

                        <textarea name="address" id="address"
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                            placeholder="Enter company address" >{{ old('address', $setting->address) }}</textarea>

                        <x-input-error :messages="$errors->get('address')" class="mt-2" />
                    </div>

                <div class="bg-white rounded-2xl shadow p-6 space-y-6 mt-4">

                    <!-- TITLE -->
                    <div>
                        <h2 class="text-lg font-semibold text-gray-800">Social Media</h2>
                        <p class="text-sm text-gray-400">Add your social media links</p>
                    </div>

                    <div class="grid md:grid-cols-2 gap-5">

                        <!-- INSTAGRAM -->
                        <div>
                            <label class="text-sm font-medium text-gray-700 mb-1 block">
                                Instagram
                            </label>

                            <div class="relative">
                                <span class="absolute inset-y-0 left-3 flex items-center text-pink-500">
                                    📸
                                </span>

                                <input type="text" name="instagram"
                                    value="{{ old('instagram', $setting->instagram ?? '') }}"
                                    placeholder="https://instagram.com/yourusername"
                                    class="w-full pl-10 pr-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 @error('instagram') border-red-500 @enderror">
                            </div>

                            @error('instagram')
                                <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- TIKTOK -->
                        <div>
                            <label class="text-sm font-medium text-gray-700 mb-1 block">
                                TikTok
                            </label>

                            <div class="relative">
                                <span class="absolute inset-y-0 left-3 flex items-center text-black">
                                    🎵
                                </span>

                                <input type="text" name="tiktok" value="{{ old('tiktok', $setting->tiktok ?? '') }}"
                                    placeholder="https://tiktok.com/@yourusername"
                                    class="w-full pl-10 pr-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 @error('tiktok') border-red-500 @enderror">
                            </div>

                            @error('tiktok')
                                <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- LINKEDIN -->
                        <div class="md:col-span-2">
                            <label class="text-sm font-medium text-gray-700 mb-1 block">
                                LinkedIn
                            </label>

                            <div class="relative">
                                <span class="absolute inset-y-0 left-3 flex items-center text-blue-600">
                                    💼
                                </span>

                                <input type="text" name="linkedin"
                                    value="{{ old('linkedin', $setting->linkedin ?? '') }}"
                                    placeholder="https://linkedin.com/company/yourcompany"
                                    class="w-full pl-10 pr-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 @error('linkedin') border-red-500 @enderror">
                            </div>

                            @error('linkedin')
                                <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                    </div>

                </div>

                <!-- LOGO -->
                <div>
                    <label class="block text-sm font-medium text-gray-600 mb-2">Logo</label>

                    @if ($setting->logo)
                        <img src="{{ asset('storage/' . $setting->logo) }}"
                            class="w-20 mb-3 rounded-lg border shadow-sm">
                    @endif

                    <input type="file" name="logo"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md bg-white shadow-sm file:mr-3 file:px-3 file:py-1 file:rounded-md file:border-0 file:bg-indigo-600 file:text-white hover:file:bg-indigo-700">
                </div>
            </div>

            <!-- BUTTON -->
            <div class="flex justify-end gap-3 mt-6">
                <a href="{{ route('admin.settings.index') }}"
                    class="px-6 py-3 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition">
                    Cancel
                </a>

                <button class="px-6 py-3 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 shadow-md transition">
                    💾 Save Changes
                </button>
            </div>

        </form>

    </div>
</x-app-layout>
