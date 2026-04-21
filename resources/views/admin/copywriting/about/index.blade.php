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
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <div class="space-y-2">
                <span
                    class="inline-flex items-center rounded-full bg-gradient-to-r from-cyan-600 to-sky-500 px-3 py-1 text-xs font-semibold text-white">
                    Copywriting · About
                </span>
                <h1 class="text-3xl font-semibold text-slate-900">About Section</h1>
                <p class="max-w-2xl text-sm text-slate-500">Manage the about content for your website</p>
            </div>

            <div class="flex flex-wrap gap-3">
                @if (!$abouts)
                    @if (Route::has('admin.about.create'))
                        <a href="{{ route('admin.about.create') }}"
                            class="inline-flex items-center gap-2 rounded-2xl bg-indigo-600 px-5 py-3 text-sm font-medium text-white shadow-sm transition duration-200 hover:bg-indigo-700">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                class="h-4 w-4">
                                <path fill-rule="evenodd"
                                    d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                    clip-rule="evenodd" />
                            </svg>
                            Create About Section
                        </a>
                    @endif
                @else
                    @if (Route::has('admin.about.edit'))
                        <a href="{{ route('admin.about.edit', $abouts->id) }}"
                            class="inline-flex items-center gap-2 rounded-2xl bg-blue-600 px-5 py-3 text-sm font-medium text-white shadow-sm transition duration-200 hover:bg-blue-700">
                            Edit About
                        </a>
                    @endif
                @endif
            </div>
        </div>

        @if ($abouts)
            <div class="grid gap-6 ">
                <div class="space-y-6">
                    <div class="rounded-[28px] border border-slate-200 bg-white shadow-sm overflow-hidden">
                        <div
                            class="flex flex-col gap-3 border-b border-slate-200 px-6 py-5 sm:flex-row sm:items-center sm:justify-between">
                            <div>
                                <h2 class="text-xl font-semibold text-slate-900">Current About Content</h2>
                                
                            </div>
                            <span
                                class="inline-flex items-center rounded-full bg-slate-100 px-3 py-1 text-xs font-medium text-slate-600">
                                Updated {{ $abouts->updated_at ? $abouts->updated_at->diffForHumans() : 'recently' }}
                            </span>
                        </div>
                        <div class="p-6 space-y-6">
                            <div class="grid gap-6 lg:grid-cols-2">
                                <div class="rounded-3xl bg-slate-50 p-6">
                                    <h3 class="text-sm font-medium text-slate-700 mb-3">Title</h3>
                                    <p class="text-xl font-semibold text-slate-900">{{ $abouts->about_title }}</p>
                                </div>
                                <div class="rounded-3xl bg-slate-50 p-6">
                                    <h3 class="text-sm font-medium text-slate-700 mb-3">Description</h3>
                                    <p class="text-slate-600 leading-7">{{ $abouts->about_description }}</p>
                                </div>
                            </div>

                            <div class="md:col-span-2 bg-gray-50 border rounded-xl p-4">

                                <p class="text-xs uppercase tracking-wide text-gray-500 mb-3">
                                    Image
                                </p>

                                @if ($abouts->about_image)
                                    <div class="flex justify-center">
                                        <img src="{{ asset('storage/' . $abouts->about_image) }}"
                                            class="w-full max-w-md h-48 object-cover rounded-xl shadow-sm border"
                                            alt="About image">
                                    </div>
                                @else
                                    <div
                                        class="flex flex-col items-center justify-center h-40 bg-white border rounded-xl">
                                        <p class="text-gray-400 italic">No image uploaded</p>
                                    </div>
                                @endif

                            </div>
                            <div class="flex flex-wrap gap-3 pt-6 border-t border-gray-200">

                                <a href="{{ route('admin.about.show', $abouts->id) }}"
                                    class="px-4 py-2 bg-gray-600 text-white text-sm rounded-lg hover:bg-gray-700 transition">
                                    View
                                </a>

                                <a href="{{ route('admin.about.edit', $abouts->id) }}"
                                    class="px-4 py-2 bg-blue-600 text-white text-sm rounded-lg hover:bg-blue-700 transition">
                                    Edit
                                </a>

                                <form id="delete-form-about{{ $abouts->id }}"
                                    action="{{ route('admin.about.destroy', $abouts->id) }}" method="POST">

                                    @csrf
                                    @method('DELETE')

                                    <button type="button" onclick="confirmDelete({{ $abouts->id }})"
                                        class="px-4 py-2 bg-red-600 text-white text-sm rounded-lg hover:bg-red-700 transition">
                                        Delete
                                    </button>

                                </form>

                            </div>
                        </div>

                        {{-- ACTION BUTTONS --}}
                    </div>


                </div>
            </div>
        @else
            <div class="rounded-[28px] border border-slate-200 bg-white shadow-sm p-12 text-center">
                <div class="max-w-md mx-auto space-y-6">
                    <div
                        class="mx-auto flex h-20 w-20 items-center justify-center rounded-full bg-slate-100 text-slate-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 9l3 3-3 3m5-6l3 3-3 3" />
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-2xl font-semibold text-slate-900">Belum ada About Section</h3>
                        <p class="mt-2 text-sm text-slate-500">Tambahkan halaman About agar pengunjung memahami visi,
                            misi, dan cerita perusahaan Anda.</p>
                    </div>
                    @if (Route::has('admin.about.create'))
                        <a href="{{ route('admin.about.create') }}"
                            class="inline-flex items-center justify-center gap-2 rounded-2xl bg-indigo-600 px-6 py-3 text-sm font-medium text-white shadow-sm transition duration-200 hover:bg-indigo-700">
                            Create About Section
                        </a>
                    @endif
                </div>
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
                cancelButtonText: 'Cancel',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-form-about' + id).submit();
                }
            });
        }
    </script>

</x-app-layout>
