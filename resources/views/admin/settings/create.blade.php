<x-app-layout>
    @if (session('error'))
        <div class="bg-red-500 text-white p-3 rounded mb-4">
            {{ session('error') }}
        </div>
    @endif
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
        <!-- Contact Section -->
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-6 p-6">
            <!-- Company Name -->
            <h5 class="text-lg font-bold text-gray-800">Contact Information</h5>
            <div>
                <x-input-label for="company_name" :value="__('Company Name')" class="mt-4" />
                <x-text-input id="company_name" class="block mt-1 w-full" type="text" name="company_name"
                    :value="old('company_name')"  autofocus autocomplete="organization" />
                @error('company_name')
                    <p class="texd-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Email -->
            <div>
                <x-input-label for="email" :value="__('Email Address')" class="mt-4" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                     autocomplete="email" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Phone -->
            <div>
                <x-input-label for="phone" :value="__('Phone Number')" class="mt-4" />
                <x-text-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('phone')"
                     autocomplete="tel" />
                <x-input-error :messages="$errors->get('phone')" class="mt-2" />
            </div>

            <!-- Address -->
            <div class="mt-3">
                <x-input-label for="address" value="Address" />
                <textarea name="address" id="address"
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                    placeholder="Enter company address" >{{ old('address') }}</textarea>
                <x-input-error :messages="$errors->get('address')" class="mt-2" />
            </div>

            <!-- Social Media Links -->
            <div class="bg-white rounded-2xl shadow p-6 space-y-4 mt-4">
                <h2 class="text-lg font-semibold text-gray-800">Social Media</h2>

                <div class="grid md:grid-cols-2 gap-4">

                    <!-- Instagram -->
                    <div>
                        <x-input-label for="instagram" :value="__('Instagram')" class="mt-4" />
                        <x-text-input id="instagram" class="block mt-1 w-full" type="text" name="instagram"
                            :value="old('instagram', $setting->instagram ?? '')" placeholder="https://instagram.com/yourusername" />
                        <x-input-error :messages="$errors->get('instagram')" class="mt-2" />
                    </div>


                    <!-- TikTok -->
                    <div>
                        <x-input-label for="tiktok" :value="__('TikTok')" class="mt-4" />
                        <x-text-input id="tiktok" class="block mt-1 w-full" type="text" name="tiktok"
                            :value="old('tiktok', $setting->tiktok ?? '')" placeholder="https://tiktok.com/@yourusername" />
                        <x-input-error :messages="$errors->get('tiktok')" class="mt-2" />
                    </div>

                    <!-- LinkedIn -->
                    <div>
                        <x-input-label for="linkedin" :value="__('LinkedIn')" class="mt-4" />
                        <x-text-input id="linkedin" class="block mt-1 w-full" type="text" name="linkedin"
                            :value="old('linkedin', $setting->linkedin ?? '')" placeholder="https://linkedin.com/in/yourusername" />
                        <x-input-error :messages="$errors->get('linkedin')" class="mt-2" />
                    </div>

                </div>
            </div>

            <!-- Logo Upload -->
            <div>
                <x-input-label for="logo" :value="__('Company Logo')" class="mt-4" />
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
                                <input id="logo" name="logo" type="file" accept="image/*" class="sr-only">
                            </label>
                            <p class="pl-1">or drag and drop</p>
                        </div>
                        <p class="text-xs text-gray-500">
                            PNG, JPG, GIF up to 2MB
                        </p>
                    </div>
                </div>
                <x-input-error :messages="$errors->get('logo')" class="mt-2" />
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
