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
    <div class="p-6">

        <!-- HEADER SECTION -->
        <div class="flex items-center justify-between mb-6">
            <div>
                <h2 class="text-xl font-semibold text-gray-800">Company Settings</h2>
                <p class="text-sm text-gray-500">Manage your company information</p>
            </div>
            @if (!$settings)
                <a href="{{ route('admin.settings.create') }}"
                    class="inline-flex items-center px-4 py-2 bg-indigo-600 transition-all duration-200 hover:bg-indigo-700 text-white text-sm font-medium rounded-lg hover:-translate-y-0.5 hover:shadow-md">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        class="h-5 w-5 mr-2">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>

                    Add New Settings
                </a>
            @endif


        </div>

        <!-- TABLE CARD -->
        <div class="bg-white rounded-2xl border border-gray-200 shadow-sm overflow-hidden">


            <table class="w-full text-sm">

                <thead class="bg-slate-900 text-white text-xs uppercase">
                    <tr>
                        <th class="px-6 py-4">#</th>
                        <th class="px-6 py-4">Company</th>
                        <th class="px-6 py-4">Contact</th>
                        <th class="px-6 py-4 text-right">Action</th>
                    </tr>
                </thead>

                <tbody class="divide-y">
                    @if ($settings)
                        <tr class="hover:bg-gray-50">

                            <!-- NO -->
                            <td class="px-6 py-4 text-gray-400">
                                1
                            </td>

                            <!-- COMPANY -->
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">

                                    @if ($settings->logo)
                                        <img src="{{ asset('storage/' . $settings->logo) }}"
                                            class="w-10 h-10 rounded-lg object-cover">
                                    @endif

                                    <div>
                                        <p class="font-semibold">{{ $settings->company_name }}</p>
                                        <p class="text-xs text-gray-400 truncate max-w-[200px]">
                                            {{ $settings->address }}
                                        </p>
                                    </div>
                                </div>
                            </td>

                            <!-- CONTACT -->
                            <td class="px-6 py-4 text-sm">
                                <p>{{ $settings->email }}</p>
                                <p class="text-gray-400 text-xs">{{ $settings->phone }}</p>
                            </td>

                            <!-- ACTION -->
                            <td class="px-6 py-4 flex justify-end gap-3">

                                <a href="{{ route('admin.settings.show', $settings->id) }}"
                                    class="inline-flex items-center px-4 py-2 bg-sky-500 hover:bg-sky-600 text-white text-sm font-medium rounded-md transition">
                                    View
                                </a>

                                <a href="{{ route('admin.settings.edit', $settings->id) }}"
                                    class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium rounded-md transition">
                                    Edit
                                </a>

                                <form id="delete-form-{{ $settings->id }}"
                                    action="{{ route('admin.settings.destroy', $settings->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <button type="button" onclick="confirmDelete({{ $settings->id }})"
                                        class="inline-flex items-center px-4 py-2 bg-red-600 hover:bg-red-700 text-white text-sm font-medium rounded-md transition">
                                        Delete
                                    </button>
                                </form>

                            </td>

                        </tr>
                    @else
                        <tr>
                            <td colspan="4" class="px-6 py-4 text-center text-gray-400">
                                No settings found. Please add your company settings.
                            </td>
                        </tr>
                    @endif
                </tbody>

            </table>
        </div>
    </div>

    <script>
        function confirmDelete(id) {
            Swal.fire({
                title: 'Are you sure you want to delete this data?',
                text: "Deleted data cannot be restored!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#dc2626', // merah
                cancelButtonColor: '#6b7280', // abu
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'Cancel',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-form-' + id).submit();
                }
            });
        }
    </script>


</x-app-layout>
