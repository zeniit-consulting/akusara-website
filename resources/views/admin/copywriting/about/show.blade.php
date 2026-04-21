<x-app-layout>

    @if (session('error'))
        <div class="bg-red-500 text-white px-5 py-3 rounded-lg shadow-sm mb-6">
            {{ session('error') }}
        </div>
    @endif

    <div class="bg-white shadow-sm rounded-2xl border border-gray-200 overflow-hidden">

        {{-- HEADER --}}
        <div class="px-6 py-6 border-b border-gray-200">
            <div class="flex flex-col gap-3 md:flex-row md:items-center md:justify-between">

                <div>
                    <h1 class="text-2xl font-semibold text-gray-900">
                        About Section Details
                    </h1>
                    <p class="text-sm text-gray-500 mt-1">
                        View the complete about section content.
                    </p>
                </div>

                <div class="flex gap-3">
                    <a href="{{ route('admin.about.index') }}"
                        class="inline-flex items-center justify-center rounded-lg bg-gray-100 px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-200 transition">
                        ← Back to List
                    </a>
                </div>

            </div>
        </div>

        {{-- CONTENT --}}
        <div class="p-6 space-y-6">

            <div class="grid gap-6 md:grid-cols-2">

                {{-- LEFT --}}
                <div class="space-y-4">

                    <div>
                        <h3 class="text-sm font-medium text-gray-700 mb-2">About Title</h3>
                        <div class="bg-gray-50 rounded-lg p-4 border">
                            <h2 class="text-xl font-semibold text-gray-900">
                                {{ $about->about_title }}
                            </h2>
                        </div>
                    </div>

                    <div>
                        <h3 class="text-sm font-medium text-gray-700 mb-2">About Description</h3>
                        <div class="bg-gray-50 rounded-lg p-4 border">
                            <p class="text-gray-700 leading-relaxed">
                                {{ $about->about_description }}
                            </p>
                        </div>
                    </div>

                </div>

                {{-- RIGHT --}}
                <div class="space-y-4">

                    <div>
                        <h3 class="text-sm font-medium text-gray-700 mb-2">About Image</h3>

                        <div class="bg-gray-50 rounded-lg p-4 border">

                            @if ($about->about_image)
                                <img src="{{ asset('storage/' . $about->about_image) }}"
                                    class="w-full max-w-md rounded-lg border border-gray-200 shadow-sm object-cover"
                                    alt="About image" />
                            @else
                                <div class="flex items-center justify-center h-32 bg-gray-200 rounded-lg">
                                    <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                </div>
                                <p class="text-center text-gray-500 mt-2">No image uploaded</p>
                            @endif

                        </div>
                    </div>

                    <div>
                        <h3 class="text-sm font-medium text-gray-700 mb-2">Created At</h3>
                        <div class="bg-gray-50 rounded-lg p-4 border">
                            <p class="text-gray-700">
                                {{ $about->created_at->format('F j, Y \a\t g:i A') }}
                            </p>
                        </div>
                    </div>

                    <div>
                        <h3 class="text-sm font-medium text-gray-700 mb-2">Last Updated</h3>
                        <div class="bg-gray-50 rounded-lg p-4 border">
                            <p class="text-gray-700">
                                {{ $about->updated_at->format('F j, Y \a\t g:i A') }}
                            </p>
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </div>

</x-app-layout>