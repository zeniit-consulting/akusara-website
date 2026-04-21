<x-app-layout>

    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: '{{ session('success') }}',
                timer: 2000,
                showConfirmButton: false
            });
        </script>
    @endif

    @if (session('error'))
        <div class="bg-red-500 text-white px-5 py-3 rounded-lg shadow-sm mb-6">
            {{ session('error') }}
        </div>
    @endif

    <div class="p-6 space-y-6">

        {{-- HEADER --}}
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
            <div>
                <h2 class="text-2xl font-semibold text-gray-800">Hero Section</h2>
                <p class="text-sm text-gray-500">Manage hero content for your website</p>
            </div>

            @if (!$heros)
                <a href="{{ route('admin.hero.create') }}"
                    class="inline-flex items-center px-4 py-2 bg-indigo-600 text-white text-sm font-medium rounded-lg shadow-sm hover:bg-indigo-700 transition">
                    + Create Hero
                </a>
            @endif
        </div>

        {{-- CONTENT --}}
        @if ($heros)

            <div class="bg-white rounded-2xl border border-gray-200 shadow-sm overflow-hidden">

                {{-- TITLE --}}
                <div class="px-6 py-4 border-b border-gray-200">
                    <h3 class="text-lg font-semibold text-gray-900">Current Hero Content</h3>
                </div>

                {{-- BODY --}}
                <div class="p-6 space-y-6">

                    <div class="grid md:grid-cols-2 gap-6">

                        {{-- TITLE CARD --}}
                        <div class="bg-gray-50 border rounded-xl p-4">
                            <p class="text-xs uppercase tracking-wide text-gray-500 mb-1">Title</p>
                            <p class="text-lg font-semibold text-gray-900">
                                {{ $heros->hero_title }}
                            </p>
                        </div>

                        {{-- DESCRIPTION CARD --}}
                        <div class="bg-gray-50 border rounded-xl p-4">
                            <p class="text-xs uppercase tracking-wide text-gray-500 mb-1">Description</p>
                            <p class="text-gray-700 leading-relaxed">
                                {{ Str::limit($heros->hero_description, 150) }}
                            </p>
                        </div>

                        {{-- IMAGE FULL WIDTH --}}
                        <div class="md:col-span-2 bg-gray-50 border rounded-xl p-4">

                            <p class="text-xs uppercase tracking-wide text-gray-500 mb-3">
                                Image
                            </p>

                            @if ($heros->hero_image)
                                <div class="flex justify-center">
                                    <img src="{{ asset('storage/' . $heros->hero_image) }}"
                                        class="w-full max-w-md h-48 object-cover rounded-xl shadow-sm border"
                                        alt="Hero image">
                                </div>
                            @else
                                <div class="flex flex-col items-center justify-center h-40 bg-white border rounded-xl">
                                    <p class="text-gray-400 italic">No image uploaded</p>
                                </div>
                            @endif

                        </div>

                    </div>

                    {{-- ACTION BUTTONS --}}
                    <div class="flex flex-wrap gap-3 pt-6 border-t border-gray-200">

                        <a href="{{ route('admin.hero.show', $heros->id) }}"
                            class="px-4 py-2 bg-gray-600 text-white text-sm rounded-lg hover:bg-gray-700 transition">
                            View
                        </a>

                        <a href="{{ route('admin.hero.edit', $heros->id) }}"
                            class="px-4 py-2 bg-blue-600 text-white text-sm rounded-lg hover:bg-blue-700 transition">
                            Edit
                        </a>

                        <form id="delete-form-hero{{ $heros->id }}"
                            action="{{ route('admin.hero.destroy', $heros->id) }}" method="POST">

                            @csrf
                            @method('DELETE')

                            <button type="button" onclick="confirmDelete({{ $heros->id }})"
                                class="px-4 py-2 bg-red-600 text-white text-sm rounded-lg hover:bg-red-700 transition">
                                Delete
                            </button>

                        </form>

                    </div>

                </div>
            </div>
        @else
            {{-- EMPTY STATE --}}
            <div class="bg-white rounded-2xl border shadow-sm p-12 text-center">

                <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                </div>

                <h3 class="text-lg font-semibold text-gray-900 mb-2">
                    No Hero Section
                </h3>

                <p class="text-gray-500 mb-6">
                    Create your first hero section to get started.
                </p>

                <a href="{{ route('admin.hero.create') }}"
                    class="px-6 py-3 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition">
                    Create Hero
                </a>

            </div>

        @endif

    </div>

    {{-- SWEETALERT DELETE --}}
    <script>
        function confirmDelete(id) {
            Swal.fire({
                title: 'Are you sure you want to delete this data?',
                text: "Deleted data cannot be restored!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#dc2626',
                cancelButtonColor: '#6b7280',
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'Batal',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-form-hero' + id).submit();
                }
            });
        }
    </script>

</x-app-layout>
