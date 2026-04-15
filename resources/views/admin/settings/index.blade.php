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
            <a href="{{ route('admin.settings.create') }}"
                class="inline-flex items-center px-4 py-2 bg-indigo-600 transition-all duration-200 hover:bg-indigo-700 text-white text-sm font-medium rounded-lg hover:-translate-y-0.5 hover:shadow-md">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                    class="h-5 w-5 mr-2">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>

                Add New Settings
            </a>


        </div>

        <!-- TABLE CARD -->
        <div class="bg-white rounded-2xl border border-gray-200 shadow-sm overflow-hidden">

            <table class="w-full text-sm text-left text-gray-600">

                <!-- HEADER -->
                <thead class="bg-slate-900 text-xs uppercase tracking-wider text-white">
                    <tr>
                        <th class="px-6 py-4">No</th>
                        <th class="px-6 py-4">Company</th>
                        <th class="px-6 py-4">Contact</th>
                        <th class="px-6 py-4">Address</th>
                        <th class="px-6 py-4 text-right">Action</th>
                    </tr>
                </thead>

                <!-- BODY -->
                <tbody class="divide-y divide-gray-100">

                    @php $nomor = 1; @endphp

                    @foreach ($settings as $setting)
                        <tr class="hover:bg-gray-50 transition">


                            <td class="px-6 py-4 text-gray-400">
                                {{ $nomor++ }}
                            </td>


                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    @if ($setting->logo)
                                        <img src="{{ asset('storage/' . $setting->logo) }}"
                                            class="w-10 h-10 rounded-lg object-cover border">
                                    @else
                                        <div
                                            class="w-10 h-10 rounded-lg bg-gray-100 flex items-center justify-center text-gray-400 text-xs">
                                            N/A
                                        </div>
                                    @endif

                                    <div>
                                        <div class="font-semibold text-gray-800">
                                            {{ $setting->company_name }}
                                        </div>
                                        <div class="text-xs text-gray-400">
                                            {{ $setting->phone }}
                                        </div>
                                    </div>
                                </div>
                            </td>


                            <td class="px-6 py-4">
                                <span class="px-3 py-1 text-xs bg-gray-100 rounded-full text-gray-600">
                                    {{ $setting->email }}
                                </span>
                            </td>


                            <td class="px-6 py-4 text-gray-500 max-w-xs truncate">
                                {{ $setting->address }}
                            </td>


                            <td class="px-6 py-4">
                                <div class="flex justify-end gap-3">

                                    <a href="{{ route('admin.settings.edit', $setting) }}"
                                        class="inline-flex items-center px-4 py-2 bg-blue-600 transition-all duration-200 hover:bg-blue-700 text-white text-sm font-medium rounded-lg hover:-translate-y-0.5 hover:shadow-md">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor" class="h-5 w-5 mr-2">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M16.862 4.487a2.25 2.25 0 113.182 3.182L7.5 20.213 3 21l.787-4.5L16.862 4.487z" />
                                        </svg>

                                        Update
                                    </a>



                                    <form id="delete-form-{{ $setting->id }}"
                                        action="{{ route('admin.settings.destroy', $setting->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')


                                        <button type="button" onclick="confirmDelete({{ $setting->id }})"
                                            class="inline-flex items-center px-4 py-2 bg-red-600 transition ease-in-out delay-75 hover:bg-red-700 text-white text-sm font-medium rounded-md hover:-translate-y-1 hover:scale-110">
                                            <svg stroke="currentColor" viewBox="0 0 24 24" fill="none"
                                                class="h-5 w-5 mr-2" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"
                                                    stroke-width="2" stroke-linejoin="round" stroke-linecap="round">
                                                </path>
                                            </svg>

                                            Delete
                                        </button>



                                    </form>


                                </div>
                            </td>

                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>

    <script>
        function confirmDelete(id) {
            Swal.fire({
                title: 'Yakin hapus data?',
                text: "Data yang dihapus tidak bisa dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#dc2626', // merah
                cancelButtonColor: '#6b7280', // abu
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-form-' + id).submit();
                }
            });
        }
    </script>


</x-app-layout>
