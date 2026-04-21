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
                        <h1 class="text-3xl font-semibold text-slate-900">Create Featured Service</h1>
                        <p class="mt-2 text-sm text-slate-500">Tambahkan layanan unggulan baru untuk ditampilkan di
                            halaman depan.</p>
                    </div>
                    <a href="{{ route('admin.featured-services.index') }}"
                        class="inline-flex items-center justify-center gap-2 rounded-2xl border border-slate-200 bg-slate-50 px-4 py-2 text-sm font-medium text-slate-700 transition hover:bg-slate-100">
                        ← Back to Featured Services
                    </a>
                </div>
            </div>

            <form method="POST" action="{{ route('admin.featured-services.store') }}"
                class="space-y-6 rounded-[28px] border border-slate-200 bg-white p-6 shadow-sm">
                @csrf

                <div class="space-y-6">
                    <section class="space-y-5 rounded-3xl border border-slate-200 bg-slate-50 p-6">
                        <div>
                            <h2 class="text-lg font-semibold text-slate-900">Featured Service Content</h2>
                            <p class="mt-2 text-sm text-slate-500">Isi detail layanan unggulan yang akan ditampilkan.
                            </p>
                        </div>

                        <div>
                            <x-input-label for="featured_services_title" value="Featured Service Title" />
                            <x-text-input id="featured_services_title" name="featured_services_title" type="text"
                                class="mt-1 block w-full rounded-2xl border-slate-300 bg-white px-4 py-3 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                :value="old('featured_services_title')" placeholder="Enter featured service title" />
                            <x-input-error :messages="$errors->get('featured_services_title')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="featured_services_description" value="Featured Service Description" />
                            <textarea id="featured_services_description" name="featured_services_description" rows="8"
                                class="mt-1 block w-full rounded-2xl border-slate-300 bg-white px-4 py-3 text-slate-900 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                placeholder="Write the featured service description">{{ old('featured_services_description') }}</textarea>
                            <x-input-error :messages="$errors->get('featured_services_description')" class="mt-2" />
                        </div>
                    </section>

                    <div class="flex flex-col gap-4 rounded-3xl border border-slate-200 bg-slate-50 p-6">
                        <div>
                            <h3 class="text-lg font-semibold text-slate-900">Submission</h3>
                            <p class="mt-1 text-sm text-slate-500">Simpan atau batalkan pembuatan featured service kapan
                                saja.</p>
                        </div>

                        <div class="flex flex-col gap-3 sm:flex-row sm:justify-end">
                            <a href="{{ route('admin.featured-services.index') }}"
                                class="inline-flex items-center justify-center rounded-2xl border border-slate-300 bg-white px-5 py-3 text-sm font-medium text-slate-700 transition hover:bg-slate-50">
                                Cancel
                            </a>
                            <x-primary-button
                                class="inline-flex items-center justify-center rounded-2xl px-5 py-3 text-sm">
                                Create Featured Service
                            </x-primary-button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

</x-app-layout>
