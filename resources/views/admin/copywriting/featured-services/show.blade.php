<x-app-layout>

    <div class="p-6">
        <div class="mx-auto max-w-5xl space-y-6">
            <div class="rounded-[28px] border border-slate-200 bg-white p-6 shadow-sm">
                <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
                    <div>
                        <h1 class="text-3xl font-semibold text-slate-900">{{ $featuredService->featured_services_title }}
                        </h1>
                    </div>
                    <div class="flex gap-3">
                        <a href="{{ route('admin.featured-services.edit', $featuredService->id) }}"
                            class="inline-flex items-center gap-2 rounded-2xl border border-slate-200 bg-blue-50 px-4 py-2 text-sm font-medium text-blue-700 transition hover:bg-blue-100">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                class="h-4 w-4">
                                <path
                                    d="M2.695 14.762a1 1 0 00-1.457 1.457l5.093 5.092a1 1 0 001.414 0l10.201-10.201a1 1 0 00-1.414-1.414L7.764 18.94 2.695 14.762z" />
                            </svg>
                            Edit
                        </a>
                        <a href="{{ route('admin.featured-services.index') }}"
                            class="inline-flex items-center justify-center gap-2 rounded-2xl border border-slate-200 bg-slate-50 px-4 py-2 text-sm font-medium text-slate-700 transition hover:bg-slate-100">
                            ← Back to Featured Services
                        </a>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-[28px] border border-slate-200 shadow-sm overflow-hidden">
                <div class="px-6 py-8 space-y-6">
                    <div>
                        <h2 class="text-lg font-semibold text-slate-900 mb-3">Title</h2>
                        <p class="text-slate-700 text-base">{{ $featuredService->featured_services_title }}</p>
                    </div>

                    <div class="border-t border-slate-200 pt-6">
                        <h2 class="text-lg font-semibold text-slate-900 mb-3">Description</h2>
                        <div class="text-slate-700 text-base whitespace-pre-wrap">
                            {{ $featuredService->featured_services_description }}</div>
                    </div>

                    <div class="border-t border-slate-200 pt-6">
                        <h2 class="text-lg font-semibold text-slate-900 mb-3">Metadata</h2>
                        <div class="grid grid-cols-2 gap-4 text-sm">
                            <div>
                                <p class="text-slate-500">Created At</p>
                                <p class="text-slate-900 font-medium">
                                    {{ $featuredService->created_at->format('d M Y, H:i') }}</p>
                            </div>
                            <div>
                                <p class="text-slate-500">Last Updated</p>
                                <p class="text-slate-900 font-medium">
                                    {{ $featuredService->updated_at->format('d M Y, H:i') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
