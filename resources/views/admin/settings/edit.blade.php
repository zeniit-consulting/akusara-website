<x-app-layout>
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900">

            <!-- HEADER -->
            <div class="flex items-center justify-between mb-6">
                <div>
                    <h1 class="text-2xl font-bold text-gray-800">Update Company Settings</h1>
                    <p class="text-sm text-gray-500 mt-1">Edit company information and settings</p>
                </div>
                <a href="{{ route('admin.settings.index') }}"
                    class="bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-600 transition">
                    ← Back
                </a>
            </div>

            <!-- UPDATE FORM -->
            <form method="POST" action="{{ route('admin.settings.update', $setting->id) }}" enctype="multipart/form-data"
                class="space-y-6">
                @csrf
                @method('PUT')

                <!-- Company Name -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Company Name <span class="text-red-500">*</span>
                    </label>
                    <input type="text" name="company_name"
                        value="{{ old('company_name', $setting->company_name) }}"
                        class="w-full px-3 py-2 border rounded-md focus:ring-indigo-500 focus:border-indigo-500 @error('company_name') border-red-500 @enderror">
                    @error('company_name')
                        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Email -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Email <span class="text-red-500">*</span>
                    </label>
                    <input type="email" name="email"
                        value="{{ old('email', $setting->email) }}"
                        class="w-full px-3 py-2 border rounded-md focus:ring-indigo-500 focus:border-indigo-500 @error('email') border-red-500 @enderror">
                    @error('email')
                        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Phone -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Phone <span class="text-red-500">*</span>
                    </label>
                    <input type="text" name="phone"
                        value="{{ old('phone', $setting->phone) }}"
                        class="w-full px-3 py-2 border rounded-md focus:ring-indigo-500 focus:border-indigo-500 @error('phone') border-red-500 @enderror">
                    @error('phone')
                        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Address -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Address <span class="text-red-500">*</span>
                    </label>
                    <textarea name="address" rows="4"
                        class="w-full px-3 py-2 border rounded-md focus:ring-indigo-500 focus:border-indigo-500 @error('address') border-red-500 @enderror">{{ old('address', $setting->address) }}</textarea>
                    @error('address')
                        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- LOGO -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Company Logo
                    </label>

                    <!-- CURRENT LOGO -->
                    @if ($setting->logo)
                        <div class="mb-4">
                            <p class="text-xs text-gray-500 mb-2">Current Logo:</p>
                            <img src="{{ asset('storage/' . $setting->logo) }}"
                                class="h-16 rounded-lg border">
                        </div>
                    @endif

                    <!-- UPLOAD -->
                    <input type="file" name="logo"
                        class="w-full px-3 py-2 border rounded-md">

                    @error('logo')
                        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- BUTTON -->
                <div class="flex justify-end gap-3 pt-6 border-t">
                    <a href="{{ route('admin.settings.index') }}"
                        class="px-6 py-2 bg-gray-300 rounded-md hover:bg-gray-400">
                        Cancel
                    </a>

                    <button type="submit"
                        class="inline-flex items-center px-6 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition">

                        <!-- ICON PENCIL -->
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" class="w-5 h-5 mr-2">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16.862 4.487a2.25 2.25 0 113.182 3.182L7.5 20.213 3 21l.787-4.5L16.862 4.487z"/>
                        </svg>

                        Update Settings
                    </button>
                </div>

            </form>
        </div>
    </div>
</x-app-layout>