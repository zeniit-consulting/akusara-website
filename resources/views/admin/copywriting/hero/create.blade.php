<x-app-layout>
    

    @if (session('error'))
        <div class="bg-red-500 text-white px-5 py-3 rounded-lg shadow-sm mb-6">
            {{ session('error') }}
        </div>
    @endif

    <div class="bg-white shadow-sm rounded-2xl border border-gray-200 overflow-hidden">
        <div class="px-6 py-6 border-b border-gray-200">
            <div class="flex flex-col gap-3 md:flex-row md:items-center md:justify-between">
                <div>
                    <h1 class="text-2xl font-semibold text-gray-900">Create Hero Section</h1>
                    <p class="text-sm text-gray-500 mt-1">Add a new hero section to showcase your website's main content.
                    </p>
                </div>
                <a href="{{ route('admin.hero.index') }}"
                    class="inline-flex items-center justify-center rounded-lg bg-gray-100 px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-200 transition">
                    ← Back to Hero List
                </a>
            </div>
        </div>

        <form method="POST" action="{{ route('admin.hero.store') }}" enctype="multipart/form-data"
            class="space-y-6 px-6 py-6">
            @csrf

            <section class="space-y-4 rounded-2xl border border-gray-200 bg-slate-50 p-6">
                <h2 class="text-lg font-semibold text-slate-900">Hero Section Content</h2>

                <div>
                    <x-input-label for="hero_title" value="Hero Title" />
                    <x-text-input id="hero_title" name="hero_title" type="text" class="mt-1 block w-full"
                        :value="old('hero_title')" placeholder="Main headline for your hero section" />
                        <x-input-error :messages="$errors->get('hero_title')" class="mt-2" />
                  
                </div>

                <div>
                    <x-input-label for="hero_description" value="Hero Description" />
                    <textarea id="hero_description" name="hero_description" rows="5"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                        placeholder="Supporting description for the hero section">{{ old('hero_description') }}</textarea>
                    <x-input-error :messages="$errors->get('hero_description')" class="mt-2" />
                </div>

                <div>
                    <x-input-label for="hero_image" value="Hero Image" />
                    <input id="hero_image" name="hero_image" type="file" accept="image/*"
                        class="mt-1 block w-full text-sm text-gray-600" />
                    <p class="text-xs text-gray-500 mt-1">PNG, JPG, or GIF (max 2MB)</p>
                    <x-input-error :messages="$errors->get('hero_image')" class="mt-2" />

                    <div class="image-preview hidden mt-4">
                        <p class="text-sm font-medium text-gray-700 mb-2">Image Preview:</p>
                        <img id="hero_image-preview"
                            class="max-w-xs rounded-lg border border-gray-200 shadow-sm object-cover h-40"
                            alt="Hero image preview" />
                    </div>
                </div>
            </section>

            <div class="flex flex-col gap-3 pt-6 border-t border-gray-200 sm:flex-row sm:justify-end">
                <a href="{{ route('admin.hero.index') }}"
                    class="inline-flex items-center justify-center rounded-lg border border-gray-300 bg-white px-5 py-2 text-sm font-medium text-gray-700 transition hover:bg-gray-50">
                    Cancel
                </a>
                <x-primary-button class="w-full sm:w-auto">Create Hero Section</x-primary-button>
            </div>
        </form>
    </div>

    <script>
        const heroImageInput = document.getElementById('hero_image');
        if (heroImageInput) {
            heroImageInput.addEventListener('change', function(event) {
                const file = event.target.files[0];
                if (!file) return;

                const reader = new FileReader();
                reader.onload = function(e) {
                    const previewImg = document.getElementById('hero_image-preview');
                    if (previewImg) {
                        previewImg.src = e.target.result;
                        previewImg.closest('.image-preview')?.classList.remove('hidden');
                    }
                };
                reader.readAsDataURL(file);
            });
        }
    </script>
</x-app-layout>
