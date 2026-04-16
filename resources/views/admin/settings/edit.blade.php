<x-app-layout>
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



            <!-- ================= HERO ================= -->
            <div class="bg-white rounded-2xl shadow p-6 space-y-5 mt-6">
                <h2 class="text-lg font-semibold text-gray-800">Hero Section</h2>

                <input type="text" name="hero_title" value="{{ old('hero_title', $setting->hero_title) }}"
                    placeholder="Hero Title"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm bg-white text-gray-700 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500/30 focus:border-indigo-500 transition">

                <textarea name="hero_description" rows="3" placeholder="Hero Description"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm bg-white text-gray-700 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500/30 focus:border-indigo-500 transition">{{ old('hero_description', $setting->hero_description) }}</textarea>

                @if ($setting->hero_image)
                    <img src="{{ asset('storage/' . $setting->hero_image) }}" class="w-40 rounded-lg border shadow-sm">
                @endif

                <input type="file" name="hero_image"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md bg-white shadow-sm file:mr-3 file:px-3 file:py-1 file:rounded-md file:border-0 file:bg-indigo-600 file:text-white hover:file:bg-indigo-700">
            </div>

            <!-- ================= ABOUT ================= -->
            <div class="bg-white rounded-2xl shadow p-6 space-y-5 mt-6">
                <h2 class="text-lg font-semibold text-gray-800">About</h2>

                <input type="text" name="about_title" value="{{ old('about_title', $setting->about_title) }}"
                    placeholder="About Title"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm bg-white text-gray-700 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500/30 focus:border-indigo-500 transition">

                <textarea name="about_description" rows="3" placeholder="About Description"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm bg-white text-gray-700 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500/30 focus:border-indigo-500 transition">{{ old('about_description', $setting->about_description) }}</textarea>

                @if ($setting->about_image)
                    <img src="{{ asset('storage/' . $setting->about_image) }}" class="w-40 rounded-lg border shadow-sm">
                @endif

                <input type="file" name="about_image"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md bg-white shadow-sm file:mr-3 file:px-3 file:py-1 file:rounded-md file:border-0 file:bg-indigo-600 file:text-white hover:file:bg-indigo-700">
            </div>

            <!-- ================= SERVICES ================= -->
            <div class="bg-white rounded-2xl shadow p-6 space-y-5 mt-6">
                <h2 class="text-lg font-semibold text-gray-800">Services</h2>

                <input type="text" name="services_title"
                    value="{{ old('services_title', $setting->services_title) }}" placeholder="Services Title"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm bg-white text-gray-700 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500/30 focus:border-indigo-500 transition">

                <textarea name="services_description" rows="3" placeholder="Services Description"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm bg-white text-gray-700 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500/30 focus:border-indigo-500 transition">{{ old('services_description', $setting->services_description) }}</textarea>
            </div>

            <!-- ================= COMPANY PROFILE ================= -->
            <div class="bg-white rounded-2xl shadow p-6 space-y-5 mt-6">
                <h2 class="text-lg font-semibold text-gray-800">Company Profile</h2>

                <input type="text" name="company_profile_title"
                    value="{{ old('company_profile_title', $setting->company_profile_title) }}"
                    placeholder="Profile Title"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm bg-white text-gray-700 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500/30 focus:border-indigo-500 transition">

                <textarea name="company_profile_description" rows="3" placeholder="Description"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm bg-white text-gray-700 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500/30 focus:border-indigo-500 transition">{{ old('company_profile_description', $setting->company_profile_description) }}</textarea>

                <div class="grid md:grid-cols-2 gap-5">
                    <textarea name="company_profile_vision" rows="3" placeholder="Vision"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm bg-white text-gray-700 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500/30 focus:border-indigo-500 transition">{{ old('company_profile_vision', $setting->company_profile_vision) }}</textarea>

                    <textarea name="company_profile_mission" rows="3" placeholder="Mission"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm bg-white text-gray-700 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500/30 focus:border-indigo-500 transition">{{ old('company_profile_mission', $setting->company_profile_mission) }}</textarea>
                </div>

                <textarea name="company_profile_values" rows="3" placeholder="Values (one per line)"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm bg-white text-gray-700 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500/30 focus:border-indigo-500 transition">{{ old('company_profile_values', $setting->company_profile_values) }}</textarea>
            </div>

            <!-- ================= COMPANY INFO ================= -->
            <div class="bg-white rounded-2xl shadow p-6 space-y-5 mt-6">
                <h2 class="text-lg font-semibold text-gray-800">Company Information</h2>

                <div class="grid md:grid-cols-2 gap-5">

                    <div>
                        <label class="block text-sm font-medium text-gray-600 mb-1">Company Name</label>
                        <input type="text" name="company_name"
                            value="{{ old('company_name', $setting->company_name) }}" placeholder="Enter company name"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm bg-white text-gray-700 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500/30 focus:border-indigo-500 transition">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-600 mb-1">Email</label>
                        <input type="email" name="email" value="{{ old('email', $setting->email) }}"
                            placeholder="example@email.com"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm bg-white text-gray-700 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500/30 focus:border-indigo-500 transition">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-600 mb-1">Phone</label>
                        <input type="text" name="phone" value="{{ old('phone', $setting->phone) }}"
                            placeholder="+62 xxx xxx xxx"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm bg-white text-gray-700 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500/30 focus:border-indigo-500 transition">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-600 mb-1">Address</label>
                        <input type="text" name="address" value="{{ old('address', $setting->address) }}"
                            placeholder="Enter address"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm bg-white text-gray-700 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500/30 focus:border-indigo-500 transition">
                    </div>


                    
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

                                <input type="text" name="tiktok"
                                    value="{{ old('tiktok', $setting->tiktok ?? '') }}"
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
