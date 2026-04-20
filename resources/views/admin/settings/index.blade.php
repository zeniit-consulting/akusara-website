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

                    @foreach ($settings as $i => $setting)
                        <tr class="hover:bg-gray-50">

                            <!-- NO -->
                            <td class="px-6 py-4 text-gray-400">
                                {{ $i + 1 }}
                            </td>

                            <!-- COMPANY -->
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">

                                    @if ($setting->logo)
                                        <img src="{{ asset('storage/' . $setting->logo) }}"
                                            class="w-10 h-10 rounded-lg object-cover">
                                    @endif

                                    <div>
                                        <p class="font-semibold">{{ $setting->company_name }}</p>
                                        <p class="text-xs text-gray-400 truncate max-w-[200px]">
                                            {{ $setting->address }}
                                        </p>
                                    </div>
                                </div>
                            </td>

                            <!-- CONTACT -->
                            <td class="px-6 py-4 text-sm">
                                <p>{{ $setting->email }}</p>
                                <p class="text-gray-400 text-xs">{{ $setting->phone }}</p>
                            </td>

                           

                            <!-- ACTION -->
                            <td class="px-6 py-4 flex justify-end gap-3">

                                <a href="{{ route('admin.settings.show', $setting->id) }}"
                                    class="inline-flex items-center px-4 py-2 bg-sky-500 transition ease-in-out delay-75 hover:bg-sky-600 text-white text-sm font-medium rounded-md hover:-translate-y-1 hover:scale-110 gap-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                        class="size-5">
                                        <path d="M10 12.5a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z" />
                                        <path fill-rule="evenodd"
                                            d="M.664 10.59a1.651 1.651 0 0 1 0-1.186A10.004 10.004 0 0 1 10 3c4.257 0 7.893 2.66 9.336 6.41.147.381.146.804 0 1.186A10.004 10.004 0 0 1 10 17c-4.257 0-7.893-2.66-9.336-6.41ZM14 10a4 4 0 1 1-8 0 4 4 0 0 1 8 0Z"
                                            clip-rule="evenodd" />
                                    </svg>

                                    View
                                </a>

                                <a href="{{ route('admin.settings.edit', $setting) }}"
                                    class="inline-flex items-center px-4 py-2 bg-blue-600 transition ease-in-out delay-75 hover:bg-blue-700 text-white text-sm font-medium rounded-md hover:-translate-y-1 hover:scale-110 gap-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                        class="size-5">
                                        <path
                                            d="m2.695 14.762-1.262 3.155a.5.5 0 0 0 .65.65l3.155-1.262a4 4 0 0 0 1.343-.886L17.5 5.501a2.121 2.121 0 0 0-3-3L3.58 13.419a4 4 0 0 0-.885 1.343Z" />
                                    </svg>

                                    Edit
                                </a>
                                <form id="delete-form-{{ $setting->id }}"
                                    action="{{ route('admin.settings.destroy', $setting->id) }}" method="POST"> @csrf
                                    @method('DELETE') <button type="button"
                                        onclick="confirmDelete({{ $setting->id }})"
                                        class="inline-flex items-center px-4 py-2 bg-red-600 transition ease-in-out delay-75 hover:bg-red-700 text-white text-sm font-medium rounded-md hover:-translate-y-1 hover:scale-110">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                            class="size-5">
                                            <path fill-rule="evenodd"
                                                d="M8.75 1A2.75 2.75 0 0 0 6 3.75v.443c-.795.077-1.584.176-2.365.298a.75.75 0 1 0 .23 1.482l.149-.022.841 10.518A2.75 2.75 0 0 0 7.596 19h4.807a2.75 2.75 0 0 0 2.742-2.53l.841-10.52.149.023a.75.75 0 0 0 .23-1.482A41.03 41.03 0 0 0 14 4.193V3.75A2.75 2.75 0 0 0 11.25 1h-2.5ZM10 4c.84 0 1.673.025 2.5.075V3.75c0-.69-.56-1.25-1.25-1.25h-2.5c-.69 0-1.25.56-1.25 1.25v.325C8.327 4.025 9.16 4 10 4ZM8.58 7.72a.75.75 0 0 0-1.5.06l.3 7.5a.75.75 0 1 0 1.5-.06l-.3-7.5Zm4.34.06a.75.75 0 1 0-1.5-.06l-.3 7.5a.75.75 0 1 0 1.5.06l.3-7.5Z"
                                                clip-rule="evenodd" />
                                        </svg>


                                        Delete </button> </form>

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
