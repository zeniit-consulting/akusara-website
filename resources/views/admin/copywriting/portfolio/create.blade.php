<x-app-layout>

    @if (session('error'))
        <div class="bg-red-500 text-white px-5 py-3 rounded-lg shadow-sm mb-6">
            {{ session('error') }}
        </div>
    @endif

    <div class="p-6">
        <div class="mx-auto max-w-5xl space-y-6">
            <div class="rounded-[28px] border border-slate-200 bg-white p-6 shadow-sm">
                <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
                    <div>
                        <h1 class="text-3xl font-semibold text-slate-900">Create Portfolio</h1>
                        <p class="mt-2 text-sm text-slate-500">Tambahkan portfolio baru untuk menampilkan karya atau
                            proyek terbaru Anda.</p>
                    </div>
                    <a href="{{ route('admin.portfolio.index') }}"
                        class="inline-flex items-center justify-center gap-2 rounded-2xl border border-slate-200 bg-slate-50 px-4 py-2 text-sm font-medium text-slate-700 transition hover:bg-slate-100">
                        ← Back to Portfolio List
                    </a>
                </div>
            </div>

            <form method="POST" action="{{ route('admin.portfolio.store') }}" enctype="multipart/form-data"
                class="space-y-6 rounded-[28px] border border-slate-200 bg-white p-6 shadow-sm">
                @csrf

                <div class="grid gap-6 lg:grid-cols-[1.2fr_0.8fr]">
                    <div class="space-y-6">
                        <section class="space-y-5 rounded-3xl border border-slate-200 bg-slate-50 p-6">
                            <div>
                                <h2 class="text-lg font-semibold text-slate-900">Portfolio Content</h2>
                                <p class="mt-2 text-sm text-slate-500">Isi detail portfolio yang akan menampilkan karya
                                    Anda.</p>
                            </div>

                            <div>
                                <x-input-label for="portfolio_title" value="Portfolio Title" />
                                <x-text-input id="portfolio_title" name="portfolio_title" type="text"
                                    class="mt-1 block w-full rounded-2xl border-slate-300 bg-white px-4 py-3 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                    :value="old('portfolio_title')" placeholder="Enter portfolio title" />
                                <x-input-error :messages="$errors->get('portfolio_title')" class="mt-2" />
                            </div>

                            <div>
                                <x-input-label for="portfolio_description" value="Portfolio Description" />
                                <textarea id="portfolio_description" name="portfolio_description" rows="6"
                                    class="mt-1 block w-full rounded-2xl border-slate-300 bg-white px-4 py-3 text-slate-900 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                    placeholder="Write the portfolio description">{{ old('portfolio_description') }}</textarea>
                                <x-input-error :messages="$errors->get('portfolio_description')" class="mt-2" />
                            </div>

                            <div>
                                <x-input-label for="portfolio_category" value="Portfolio Category" />
                                <select id="portfolio_category" name="portfolio_category"
                                    class="mt-1 block w-full rounded-2xl border-slate-300 bg-white px-4 py-3 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                    <option value="">Select a category</option>
                                    @foreach (\App\PortfolioCategory::cases() as $category)
                                        <option value="{{ $category->value }}"
                                            {{ old('portfolio_category') == $category->value ? 'selected' : '' }}>
                                            {{ $category->label() }}
                                        </option>
                                    @endforeach
                                </select>
                                <x-input-error :messages="$errors->get('portfolio_category')" class="mt-2" />
                            </div>
                        </section>

                        <div class="flex flex-col gap-4 rounded-3xl border border-slate-200 bg-slate-50 p-6">
                            <div>
                                <h3 class="text-lg font-semibold text-slate-900">Submission</h3>
                                <p class="mt-1 text-sm text-slate-500">Simpan atau batalkan pembuatan portfolio kapan
                                    saja.</p>
                            </div>

                            <div class="flex flex-col gap-3 sm:flex-row sm:justify-end">
                                <a href="{{ route('admin.portfolio.index') }}"
                                    class="inline-flex items-center justify-center rounded-2xl border border-slate-300 bg-white px-5 py-3 text-sm font-medium text-slate-700 transition hover:bg-slate-50">
                                    Cancel
                                </a>
                                <x-primary-button
                                    class="inline-flex items-center justify-center rounded-2xl px-5 py-3 text-sm">
                                    Create Portfolio
                                </x-primary-button>
                            </div>
                        </div>
                    </div>

                    <aside class="space-y-6">
                        <div class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm">
                            <h3 class="text-lg font-semibold text-slate-900">Portfolio Image</h3>
                            <p class="mt-2 text-sm text-slate-500">Unggah gambar yang akan mewakili portfolio ini.</p>
                            <div class="mt-4">
                                <x-input-label for="portfolio_image" value="Upload Image" />
                                <input id="portfolio_image" name="portfolio_image" type="file" accept="image/*"
                                    class="mt-2 block w-full text-sm text-slate-600" />
                                <p class="mt-2 text-xs text-slate-500">PNG, JPG, atau GIF (max 2MB).</p>
                                <x-input-error :messages="$errors->get('portfolio_image')" class="mt-2" />
                            </div>

                            <div
                                class="image-preview hidden mt-6 rounded-3xl border border-slate-200 bg-slate-50 p-4 text-center">
                                <p class="text-sm font-medium text-slate-700">Preview Image</p>
                                <img id="portfolio_image-preview"
                                    class="mx-auto mt-4 h-60 w-full max-w-full rounded-3xl object-cover"
                                    alt="Portfolio image preview" />
                            </div>
                        </div>

                        
                    </aside>
                </div>
            </form>
        </div>
    </div>

    <script>
        const portfolioImageInput = document.getElementById('portfolio_image');
        if (portfolioImageInput) {
            portfolioImageInput.addEventListener('change', function(event) {
                const file = event.target.files[0];
                if (!file) return;

                const reader = new FileReader();
                reader.onload = function(e) {
                    const previewImg = document.getElementById('portfolio_image-preview');
                    const previewContainer = previewImg.closest('.image-preview');
                    if (previewImg && previewContainer) {
                        previewImg.src = e.target.result;
                        previewContainer.classList.remove('hidden');
                    }
                };
                reader.readAsDataURL(file);
            });
        }
    </script>
</x-app-layout>
