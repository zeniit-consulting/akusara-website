<x-app-layout>

    @if (session('error'))
        <div class="bg-red-500 text-white px-5 py-3 rounded-lg shadow-sm mb-6">
            {{ session('error') }}
        </div>
    @endif

    <diV class="p-6">

        <div class="rounded-[28px] border border-slate-200 bg-white p-6 shadow-sm">
            <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
                <div>
                    <h1 class="text-3xl font-semibold text-slate-900">Create About Section</h1>
                </div>
                <a href="{{ route('admin.about.index') }}"
                    class="inline-flex items-center justify-center gap-2 rounded-2xl border border-slate-200 bg-slate-50 px-4 py-2 text-sm font-medium text-slate-700 transition hover:bg-slate-100">
                    ← Back to About List
                </a>
            </div>
        </div>

        <form method="POST" action="{{ route('admin.about.store') }}" enctype="multipart/form-data"
            class="space-y-6 mt-5 rounded-[28px] border border-slate-200 bg-white p-6 shadow-sm">
            @csrf


            <section class="space-y-5 rounded-3xl border border-slate-200 bg-slate-50 p-6">
                <div>
                    <h2 class="text-lg font-semibold text-slate-900">About Content</h2>
                    <p class="mt-2 text-sm text-slate-500">Tentukan judul dan deskripsi yang akan
                        menjelaskan perusahaan Anda secara ringkas namun kuat.</p>
                </div>

                <div>
                    <x-input-label for="about_title" value="About Title" />
                    <x-text-input id="about_title" name="about_title" type="text"
                        class="mt-1 block w-full rounded-2xl border-slate-300 bg-white px-4 py-3 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                        :value="old('about_title')" placeholder="Enter about section title" />
                    <x-input-error :messages="$errors->get('about_title')" class="mt-2" />
                </div>

                <div>
                    <x-input-label for="about_description" value="About Description" />
                    <textarea id="about_description" name="about_description" rows="6"
                        class="mt-1 block w-full rounded-2xl border-slate-300 bg-white px-4 py-3 text-slate-900 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                        placeholder="Write the about section description">{{ old('about_description') }}</textarea>
                    <x-input-error :messages="$errors->get('about_description')" class="mt-2" />
                </div>

                <div>
                    <x-input-label for="about_image" value="About Image" />
                    <input id="about_image" name="about_image" type="file" accept="image/*"
                        class="mt-1 block w-full text-sm text-gray-600" />
                    <p class="text-xs text-gray-500 mt-1">PNG, JPG, or GIF (max 2MB)</p>
                    <x-input-error :messages="$errors->get('about_image')" class="mt-2" />

                    <div class="image-preview hidden mt-4">
                        <p class="text-sm font-medium text-gray-700 mb-2">Image Preview:</p>
                        <img id="about_image-preview"
                            class="max-w-xs rounded-lg border border-gray-200 shadow-sm object-cover h-40"
                            alt="about image preview" />
                    </div>
                </div>
            </section>

            <div class="flex flex-col gap-3 pt-6 border-t border-gray-200 sm:flex-row sm:justify-end">
                <a href="{{ route('admin.about.index') }}"
                    class="inline-flex items-center justify-center rounded-lg border border-gray-300 bg-white px-5 py-2 text-sm font-medium text-gray-700 transition hover:bg-gray-50">
                    Cancel
                </a>
                <x-primary-button class="w-full sm:w-auto">Create About Section</x-primary-button>
            </div>

        </form>

    </div>

    {{-- IMAGE PREVIEW --}}
    <script>
        const aboutImageInput = document.getElementById('about_image');
        if (aboutImageInput) {
            aboutImageInput.addEventListener('change', function(event) {
                const file = event.target.files[0];
                if (!file) return;

                const reader = new FileReader();
                reader.onload = function(e) {
                    const previewImg = document.getElementById('about_image-preview');
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
