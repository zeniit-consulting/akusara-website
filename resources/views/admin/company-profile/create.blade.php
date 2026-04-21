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
                        <h1 class="text-3xl font-semibold text-slate-900">Create Company Profile</h1>
                        <p class="mt-2 text-sm text-slate-500">Tambahkan profil perusahaan baru.</p>
                    </div>
                    <a href="{{ route('admin.company-profile.index') }}"
                        class="inline-flex items-center justify-center gap-2 rounded-2xl border border-slate-200 bg-slate-50 px-4 py-2 text-sm font-medium text-slate-700 transition hover:bg-slate-100">
                        ← Back to Company Profile List
                    </a>
                </div>
            </div>

            <form method="POST" action="{{ route('admin.company-profile.store') }}"
                class="space-y-6 rounded-[28px] border border-slate-200 bg-white p-6 shadow-sm">
                @csrf

                <div class="space-y-6">
                    <section class="space-y-5 rounded-3xl border border-slate-200 bg-slate-50 p-6">
                        <div>
                            <h2 class="text-lg font-semibold text-slate-900">Company Profile Content</h2>
                            <p class="mt-2 text-sm text-slate-500">Isi detail profil perusahaan Anda.</p>
                        </div>

                        <div>
                            <x-input-label for="company_profile_title" value="Company Title" />
                            <x-text-input id="company_profile_title" name="company_profile_title" type="text"
                                class="mt-1 block w-full rounded-2xl border-slate-300 bg-white px-4 py-3 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                :value="old('company_profile_title')" placeholder="Enter company title" />
                            <x-input-error :messages="$errors->get('company_profile_title')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="company_profile_description" value="Company Description" />
                            <textarea id="company_profile_description" name="company_profile_description" rows="6"
                                class="mt-1 block w-full rounded-2xl border-slate-300 bg-white px-4 py-3 text-slate-900 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                placeholder="Write the company description">{{ old('company_profile_description') }}</textarea>
                            <x-input-error :messages="$errors->get('company_profile_description')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="company_profile_vision" value="Company Vision" />
                            <x-text-input id="company_profile_vision" name="company_profile_vision" type="text"
                                class="mt-1 block w-full rounded-2xl border-slate-300 bg-white px-4 py-3 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                :value="old('company_profile_vision')" placeholder="Enter company vision" />
                            <x-input-error :messages="$errors->get('company_profile_vision')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="company_profile_mission" value="Company Mission" />
                            <x-text-input id="company_profile_mission" name="company_profile_mission" type="text"
                                class="mt-1 block w-full rounded-2xl border-slate-300 bg-white px-4 py-3 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                :value="old('company_profile_mission')" placeholder="Enter company mission" />
                            <x-input-error :messages="$errors->get('company_profile_mission')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="company_profile_values" value="Company Values" />
                            <x-text-input id="company_profile_values" name="company_profile_values" type="text"
                                class="mt-1 block w-full rounded-2xl border-slate-300 bg-white px-4 py-3 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                :value="old('company_profile_values')" placeholder="Enter company values" />
                            <x-input-error :messages="$errors->get('company_profile_values')" class="mt-2" />
                        </div>
                    </section>

                    <div class="flex flex-col gap-4 rounded-3xl border border-slate-200 bg-slate-50 p-6">
                        <div>
                            <h3 class="text-lg font-semibold text-slate-900">Submission</h3>
                            <p class="mt-1 text-sm text-slate-500">Simpan atau batalkan pembuatan profil perusahaan
                                kapan saja.</p>
                        </div>

                        <div class="flex flex-col gap-3 sm:flex-row sm:justify-end">
                            <a href="{{ route('admin.company-profile.index') }}"
                                class="inline-flex items-center justify-center rounded-2xl border border-slate-300 bg-white px-5 py-3 text-sm font-medium text-slate-700 transition hover:bg-slate-50">
                                Cancel
                            </a>
                            <x-primary-button
                                class="inline-flex items-center justify-center rounded-2xl px-5 py-3 text-sm">
                                Create Company Profile
                            </x-primary-button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

</x-app-layout>
