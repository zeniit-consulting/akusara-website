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
                    class="inline-flex items-center rounded-full bg-gradient-to-r from-purple-600 to-pink-500 px-3 py-1 text-xs font-semibold text-white">
                    Copywriting · Portfolio
                </span>
                <h1 class="text-3xl font-semibold text-slate-900">Portfolio Management</h1>
            </div>

            <div class="flex flex-wrap gap-3">
                <a href="{{ route('admin.portfolio.create') }}"
                    class="inline-flex items-center gap-2 px-5 py-3 bg-indigo-600 text-white text-sm font-medium rounded-2xl shadow-sm transition duration-200 hover:bg-indigo-700">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="h-4 w-4">
                        <path fill-rule="evenodd"
                            d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                            clip-rule="evenodd" />
                    </svg>
                    Create Portfolio
                </a>
            </div>
        </div>

        @if ($portfolios && count($portfolios) > 0)
            <div class="bg-white rounded-[28px] border border-slate-200 shadow-sm overflow-hidden">
                <div class="px-6 py-4 border-b border-slate-200">
                    <h3 class="text-lg font-semibold text-slate-900">Portfolio List</h3>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left">
                        <thead class="bg-slate-50 border-b border-slate-200">
                            <tr>
                                <th class="px-6 py-4 font-semibold text-slate-900">#</th>
                                <th class="px-6 py-4 font-semibold text-slate-900">Title</th>
                                <th class="px-6 py-4 font-semibold text-slate-900">Description</th>
                                <th class="px-6 py-4 font-semibold text-slate-900">Category</th>
                                <th class="px-6 py-4 font-semibold text-slate-900 text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-200">
                            @foreach ($portfolios as $i => $portfolio)
                                <tr class="hover:bg-slate-50 transition">
                                    <td class="px-6 py-4 text-slate-600">{{ $i + 1 }}</td>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center gap-3">
                                            @if ($portfolio->portfolio_image)
                                                <img src="{{ Storage::url($portfolio->portfolio_image) }}"
                                                    alt="{{ $portfolio->portfolio_title }}"
                                                    class="w-10 h-10 rounded-lg object-cover">
                                            @else
                                                <div
                                                    class="w-10 h-10 rounded-lg bg-slate-200 flex items-center justify-center">
                                                    <svg class="w-5 h-5 text-slate-400" fill="none"
                                                        stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                    </svg>
                                                </div>
                                            @endif
                                            <div>
                                                <p class="font-semibold text-slate-900">
                                                    {{ $portfolio->portfolio_title }}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 text-slate-600 max-w-xs">
                                        {{ Str::limit($portfolio->portfolio_description, 60) }}
                                    </td>
                                    <td class="px-6 py-4">
                                        <span
                                            class="inline-flex items-center rounded-full bg-blue-100 px-3 py-1 text-xs font-medium text-blue-700">
                                            {{ $portfolio->portfolio_category->label() }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 text-right">
                                        <div class="flex justify-end gap-2">
                                            <a href="{{ route('admin.portfolio.edit', $portfolio->id) }}"
                                                class="inline-flex items-center px-3 py-2 bg-blue-600 text-white text-xs font-medium rounded-lg transition hover:bg-blue-700">
                                                Edit
                                            </a>
                                            <button type="button" onclick="confirmDelete({{ $portfolio->id }})"
                                                class="inline-flex items-center px-3 py-2 bg-red-600 text-white text-xs font-medium rounded-lg transition hover:bg-red-700">
                                                Delete
                                            </button>
                                            <form id="delete-form-portfolio{{ $portfolio->id }}"
                                                action="{{ route('admin.portfolio.destroy', $portfolio->id) }}"
                                                method="POST" class="hidden">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @else
            <div class="bg-white rounded-[28px] border border-slate-200 shadow-sm p-12 text-center">
                <div class="max-w-md mx-auto space-y-5">
                    <div
                        class="mx-auto flex h-20 w-20 items-center justify-center rounded-full bg-slate-100 text-slate-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-2xl font-semibold text-slate-900">Belum ada Portfolio</h3>
                        <p class="mt-2 text-sm text-slate-500">Mulai tambahkan portfolio, karya, atau proyek terbaru
                            Anda sekarang.</p>
                    </div>
                    <a href="{{ route('admin.portfolio.create') }}"
                        class="inline-flex items-center justify-center gap-2 rounded-2xl bg-indigo-600 px-6 py-3 text-sm font-medium text-white shadow-sm transition duration-200 hover:bg-indigo-700">
                        Create First Portfolio
                    </a>
                </div>
            </div>
        @endif
    </div>

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
                    document.getElementById('delete-form-portfolio' + id).submit();
                }
            });
        }
    </script>
</x-app-layout>
