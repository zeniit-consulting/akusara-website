<x-app-layout>
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900">
            <div class="flex items-center justify-between mb-6">
                <div>
                    <h1 class="text-2xl font-bold text-gray-800">Add Company Settings</h1>
                    <p class="text-sm text-gray-500 mt-1">Create new company information and settings</p>
                </div>
                <a href="{{ route('admin.settings.index') }}"
                    class="bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition-colors duration-200">
                    ← Back to Settings
                </a>
            </div>
        </div>
    </div>
    <!-- Create Form -->
    <form method="POST" action="{{ route('admin.settings.store') }}" enctype="multipart/form-data" class="space-y-6">
        @csrf
        <!-- Hero Section -->
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-6 p-6">

            <h5 class="text-lg font-bold text-gray-800">Settings Hero</h5>

            <!-- HERO TITLE -->
            <div class="mt-3">
                <label for="hero_title" class="block text-sm font-medium text-gray-700 mb-2">
                    Hero Title <span class="text-red-500"></span>
                </label>

                <input type="text" name="hero_title" id="hero_title" value="{{ old('hero_title') }}"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 @error('hero_title') border-red-500 @enderror"
                    placeholder="Enter hero title">

                @error('hero_title')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- HERO DESCRIPTION -->
            <div class="mt-4">
                <label for="hero_description" class="block text-sm font-medium text-gray-700 mb-2">
                    Hero Description <span class="text-red-500"></span>
                </label>

                <textarea name="hero_description" id="hero_description" rows="4"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 @error('hero_description') border-red-500 @enderror"
                    placeholder="Enter hero description">{{ old('hero_description') }}</textarea>

                @error('hero_description')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- HERO IMAGE -->
            <div class="mt-4">
                <label for="hero_image" class="block text-sm font-medium text-gray-700 mb-2">
                    Hero Image
                </label>

                <input type="file" name="hero_image" id="hero_image" accept="image/*"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md bg-white shadow-sm file:mr-3 file:px-3 file:py-1 file:rounded-md file:border-0 file:bg-indigo-600 file:text-white hover:file:bg-indigo-700">

                @error('hero_image')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror

                <!-- Preview (optional) -->
                <div class="mt-3">
                    @if (!empty($setting->hero_image))
                        <img src="{{ asset('storage/' . $setting->hero_image) }}" class="w-40 rounded-lg shadow">
                    @endif
                </div>
            </div>

        </div>


        <!-- About Section -->
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-6 p-6">

            <h5 class="text-lg font-bold text-gray-800">Settings About</h5>

            <!-- ABOUT TITLE -->
            <div class="mt-3">
                <label for="about_title" class="block text-sm font-medium text-gray-700 mb-2">
                    About Title
                </label>

                <input type="text" name="about_title" id="about_title"
                    value="{{ old('about_title', $setting->about_title ?? '') }}"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 @error('about_title') border-red-500 @enderror"
                    placeholder="Enter about title">

                @error('about_title')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- ABOUT DESCRIPTION -->
            <div class="mt-4">
                <label for="about_description" class="block text-sm font-medium text-gray-700 mb-2">
                    About Description
                </label>

                <textarea name="about_description" id="about_description" rows="5"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 @error('about_description') border-red-500 @enderror"
                    placeholder="Enter about description">{{ old('about_description', $setting->about_description ?? '') }}</textarea>

                @error('about_description')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- ABOUT IMAGE -->
            <div class="mt-4">
                <label for="about_image" class="block text-sm font-medium text-gray-700 mb-2">
                    About Image
                </label>

                <input type="file" name="about_image" id="about_image" accept="image/*"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md bg-white shadow-sm file:mr-3 file:px-3 file:py-1 file:rounded-md file:border-0 file:bg-indigo-600 file:text-white hover:file:bg-indigo-700">

                @error('about_image')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror

                <!-- Preview -->
                @if (!empty($setting->about_image))
                    <div class="mt-4">
                        <img src="{{ asset('storage/' . $setting->about_image) }}" class="w-48 rounded-lg shadow">
                    </div>
                @endif
            </div>

        </div>

        <!-- Service  Section -->
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-6 p-6">

            <h5 class="text-lg font-bold text-gray-800">Settings Services</h5>

            <!-- SERVICES TITLE -->
            <div class="mt-3">
                <label for="services_title" class="block text-sm font-medium text-gray-700 mb-2">
                    Services Title
                </label>

                <input type="text" name="services_title" id="services_title"
                    value="{{ old('services_title', $setting->services_title ?? '') }}"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 @error('services_title') border-red-500 @enderror"
                    placeholder="Enter services title">

                @error('services_title')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- SERVICES DESCRIPTION -->
            <div class="mt-4">
                <label for="services_description" class="block text-sm font-medium text-gray-700 mb-2">
                    Services Description
                </label>

                <textarea name="services_description" id="services_description" rows="5"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 @error('services_description') border-red-500 @enderror"
                    placeholder="Enter services description">{{ old('services_description', $setting->services_description ?? '') }}</textarea>

                @error('services_description')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

        </div>

        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-6 p-6">

            <h5 class="text-lg font-bold text-gray-800">Company Profile</h5>

            <!-- TITLE -->
            <div class="mt-4">
                <label class="block text-sm font-medium text-gray-700 mb-2">
                    Title
                </label>

                <input type="text" name="company_profile_title"
                    value="{{ old('company_profile_title', $setting->company_profile_title ?? '') }}"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 @error('company_profile_title') border-red-500 @enderror"
                    placeholder="Enter company profile title">

                @error('company_profile_title')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- DESCRIPTION -->
            <div class="mt-4">
                <label class="block text-sm font-medium text-gray-700 mb-2">
                    Description
                </label>

                <textarea name="company_profile_description" rows="4"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 @error('company_profile_description') border-red-500 @enderror"
                    placeholder="Enter company description">{{ old('company_profile_description', $setting->company_profile_description ?? '') }}</textarea>

                @error('company_profile_description')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- GRID: VISION & MISSION -->
            <div class="grid md:grid-cols-2 gap-6 mt-6">

                <!-- VISION -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Vision
                    </label>

                    <textarea name="company_profile_vision" rows="4"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 @error('company_profile_vision') border-red-500 @enderror"
                        placeholder="Enter company vision">{{ old('company_profile_vision', $setting->company_profile_vision ?? '') }}</textarea>

                    @error('company_profile_vision')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- MISSION -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Mission
                    </label>

                    <textarea name="company_profile_mission" rows="4"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 @error('company_profile_mission') border-red-500 @enderror"
                        placeholder="Enter company mission">{{ old('company_profile_mission', $setting->company_profile_mission ?? '') }}</textarea>

                    @error('company_profile_mission')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

            </div>

            <!-- VALUES -->
            <div class="mt-6">
                <label class="block text-sm font-medium text-gray-700 mb-2">
                    Values
                </label>

                <textarea name="company_profile_values" rows="4"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 @error('company_profile_values') border-red-500 @enderror"
                    placeholder="Enter company values (separate with commas or line breaks)">{{ old('company_profile_values', $setting->company_profile_values ?? '') }}</textarea>

                @error('company_profile_values')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

        </div>


        <!-- Contact Section -->
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-6 p-6">
            <!-- Company Name -->
            <h5 class="text-lg font-bold text-gray-800">Contact Information</h5>
            <div>
                <label for="company_name" class="block text-sm font-medium text-gray-700 mb-3 mt-4">
                    Company Name
                </label>
                <input type="text" name="company_name" id="company_name" value="{{ old('company_name') }}"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 @error('company_name') border-red-500 @enderror"
                    placeholder="Enter company name">
                @error('company_name')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Email -->
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 mb-3 mt-4">
                    Email Address
                </label>
                <input type="email" name="email" id="email" value="{{ old('email') }}"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 @error('email') border-red-500 @enderror"
                    placeholder="company@example.com">
                @error('email')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Phone -->
            <div>
                <label for="phone" class="block text-sm font-medium text-gray-700 mb-3 mt-4">
                    Phone Number
                </label>
                <input type="tel" name="phone" id="phone" value="{{ old('phone') }}"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 @error('phone') border-red-500 @enderror"
                    placeholder="+62 812-3456-7890">
                @error('phone')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Address -->
            <div>
                <label for="address" class="block text-sm font-medium text-gray-700 mb-3 mt-4">
                    Address
                </label>
                <textarea name="address" id="address" rows="4"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 @error('address') border-red-500 @enderror"
                    placeholder="Enter complete company address">{{ old('address') }}</textarea>
                @error('address')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
            <!-- Social Media Links -->
            <div class="bg-white rounded-2xl shadow p-6 space-y-4 mt-4">
                <h2 class="text-lg font-semibold text-gray-800">Social Media</h2>

                <div class="grid md:grid-cols-2 gap-4">

                    <!-- Instagram -->
                    <div>
                        <label class="text-sm text-gray-500 mb-1 block">Instagram</label>
                        <input type="text" name="instagram"
                            value="{{ old('instagram', $setting->instagram ?? '') }}"
                            placeholder="https://instagram.com/yourusername"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                    </div>

                    <!-- TikTok -->
                    <div>
                        <label class="text-sm text-gray-500 mb-1 block">TikTok</label>
                        <input type="text" name="tiktok" value="{{ old('tiktok', $setting->tiktok ?? '') }}"
                            placeholder="https://tiktok.com/@yourusername"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                    </div>

                    <!-- LinkedIn -->
                    <div>
                        <label class="text-sm text-gray-500 mb-1 block">LinkedIn</label>
                        <input type="text" name="linkedin"
                            value="{{ old('linkedin', $setting->linkedin ?? '') }}"
                            placeholder="https://linkedin.com/company/yourcompany"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                    </div>

                </div>
            </div>

            <!-- Logo Upload -->
            <div>
                <label for="logo" class="block text-sm font-medium text-gray-700 mb-3 mt-4">
                    Company Logo
                </label>
                <div
                    class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md hover:border-gray-400 transition-colors duration-200">
                    <div class="space-y-1 text-center">
                        <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none"
                            viewBox="0 0 48 48" aria-hidden="true">
                            <path
                                d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <div class="flex text-sm text-gray-600">
                            <label for="logo"
                                class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                <span>Upload a file</span>
                                <input id="logo" name="logo" type="file" accept="image/*"
                                    class="sr-only">
                            </label>
                            <p class="pl-1">or drag and drop</p>
                        </div>
                        <p class="text-xs text-gray-500">
                            PNG, JPG, GIF up to 2MB
                        </p>
                    </div>
                </div>
                @error('logo')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror

                <!-- Preview area for selected image -->
                <div id="logo-preview" class="mt-4 hidden">
                    <img id="logo-image" class="max-w-xs max-h-32 object-contain border border-gray-200 rounded-md"
                        alt="Logo preview">
                </div>
            </div>

            <!-- Submit Buttons -->
            <div class="flex justify-end space-x-3 pt-6 border-t">
                <a href="{{ route('admin.settings.index') }}"
                    class="bg-gray-300 text-gray-700 px-6 py-2 rounded-md hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition-colors duration-200">
                    Cancel
                </a>
                <button type="submit"
                    class="bg-indigo-600 text-white px-6 py-2 rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition-colors duration-200">
                    Create Settings
                </button>
            </div>
        </div>
    </form>


    <!-- JavaScript for logo preview -->
    <script>
        document.getElementById('logo').addEventListener('change', function(e) {
            const file = e.target.files[0];
            const preview = document.getElementById('logo-preview');
            const image = document.getElementById('logo-image');

            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    image.src = e.target.result;
                    preview.classList.remove('hidden');
                };
                reader.readAsDataURL(file);
            } else {
                preview.classList.add('hidden');
            }
        });
    </script>
</x-app-layout>
