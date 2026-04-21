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
                        <h1 class="text-3xl font-semibold text-slate-900">Edit Portfolio</h1>
                       
                    </div>
                    <a href="{{ route('admin.portfolio.index') }}"
                        class="inline-flex items-center justify-center gap-2 rounded-2xl border border-slate-200 bg-slate-50 px-4 py-2 text-sm font-medium text-slate-700 transition hover:bg-slate-100">
                        ← Back to Portfolio List
                    </a>
                </div>
            </div>

            <form method="POST" action="{{ route('admin.portfolio.update', $portfolio->id) }}"
                enctype="multipart/form-data"
                class="space-y-6 rounded-[28px] border border-slate-200 bg-white p-6 shadow-sm">
                @csrf
                @method('PUT')

                <div class="grid gap-6 lg:grid-cols-[1.2fr_0.8fr]">
                    <div class="space-y-6">
                        <section class="space-y-5 rounded-3xl border border-slate-200 bg-slate-50 p-6">
                            <div>
                                <h2 class="text-lg font-semibold text-slate-900">Portfolio Content</h2>
                                
                            </div>

                            <div>
                                <x-input-label for="portfolio_title" value="Portfolio Title" />
                                <x-text-input id="portfolio_title" name="portfolio_title" type="text"
                                    class="mt-1 block w-full rounded-2xl border-slate-300 bg-white px-4 py-3 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                    :value="old('portfolio_title', $portfolio->portfolio_title)" placeholder="Enter portfolio title" />
                                <x-input-error :messages="$errors->get('portfolio_title')" class="mt-2" />
                            </div>

                            <div>
                                <x-input-label for="portfolio_description" value="Portfolio Description" />
                                <textarea id="portfolio_description" name="portfolio_description" rows="6"
                                    class="mt-1 block w-full rounded-2xl border-slate-300 bg-white px-4 py-3 text-slate-900 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                    placeholder="Write the portfolio description">{{ old('portfolio_description', $portfolio->portfolio_description) }}</textarea>
                                <x-input-error :messages="$errors->get('portfolio_description')" class="mt-2" />
                            </div>

                            <div>
                                <x-input-label for="portfolio_category" value="Portfolio Category" />

                                <select id="portfolio_category" name="portfolio_category"
                                    class="mt-1 block w-full rounded-2xl border-slate-300 bg-white px-4 py-3 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">

                                    <option value="">Select a category</option>

                                    @foreach (\App\PortfolioCategory::cases() as $category)
                                        <option value="{{ $category->value }}"
                                            {{ old('portfolio_category', $portfolio->portfolio_category?->value) === $category->value ? 'selected' : '' }}>
                                            {{ $category->label() }}
                                        </option>
                                    @endforeach

                                </select>

                                <x-input-error :messages="$errors->get('portfolio_category')" class="mt-2" />
                            </div>
                        </section>

                        <div class="flex flex-col gap-4 rounded-3xl border border-slate-200 bg-slate-50 p-4">
                           

                            <div class="flex flex-col gap-3 sm:flex-row sm:justify-start">
                                <a href="{{ route('admin.portfolio.index') }}"
                                    class="inline-flex items-center justify-center rounded-2xl border border-slate-300 bg-white px-5 py-3 text-sm font-medium text-slate-700 transition hover:bg-slate-50">
                                    Cancel
                                </a>
                                <x-primary-button
                                    class="inline-flex items-center justify-center rounded-2xl px-5 py-3 text-sm">
                                    Update Portfolio
                                </x-primary-button>
                            </div>
                        </div>
                    </div>

                    <aside class="space-y-6">
                        <div class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm">
                            <h3 class="text-lg font-semibold text-slate-900">Portfolio Image</h3>
                            
                            <div class="mt-4">
                                <x-input-label for="portfolio_image" value="Upload New Image" />
                                <input id="portfolio_image" name="portfolio_image" type="file" accept="image/*"
                                    class="mt-2 block w-full text-sm text-slate-600" />
                                <p class="mt-2 text-xs text-slate-500">PNG, JPG, atau GIF (max 2MB). </p>
                                <x-input-error :messages="$errors->get('portfolio_image')" class="mt-2" />
                            </div>

                            <div class="mt-6 space-y-4">
                                @if ($portfolio->portfolio_image)
                                    <div class="rounded-3xl border border-slate-200 bg-slate-50 p-4 text-center">
                                        <p class="text-sm font-medium text-slate-700 mb-3">Current Image</p>
                                        <img src="{{ asset('storage/' . $portfolio->portfolio_image) }}"
                                            class="mx-auto max-w-full h-auto rounded-3xl object-cover max-h-60"
                                            alt="Current portfolio image" />
                                    </div>
                                @endif

                                <div
                                    class="image-preview hidden rounded-3xl border border-slate-200 bg-slate-50 p-4 text-center">
                                    <p class="text-sm font-medium text-slate-700">New Image Preview</p>
                                    <img id="portfolio_image-preview"
                                        class="mx-auto mt-4 h-60 w-full max-w-full rounded-3xl object-cover"
                                        alt="Portfolio image preview" />
                                </div>
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
