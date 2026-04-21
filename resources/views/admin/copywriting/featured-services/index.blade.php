<x-app-layout>

    

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
                    Copywriting · Featured Services
                </span>
                <h1 class="text-3xl font-semibold text-slate-900">Featured Services Management</h1>
            </div>

            <div class="flex flex-wrap gap-3">
                <a href="{{ route('admin.featured-services.create') }}"
                    class="inline-flex items-center gap-2 px-5 py-3 bg-indigo-600 text-white text-sm font-medium rounded-2xl shadow-sm transition duration-200 hover:bg-indigo-700">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="h-4 w-4">
                        <path fill-rule="evenodd"
                            d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                            clip-rule="evenodd" />
                    </svg>
                    Create Featured Service
                </a>
            </div>
        </div>

        @if ($featuredServices && count($featuredServices) > 0)
            <div class="bg-white rounded-[28px] border border-slate-200 shadow-sm overflow-hidden">
                <div class="px-6 py-4 border-b border-slate-200">
                    <h3 class="text-lg font-semibold text-slate-900">Featured Services List</h3>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left">
                        <thead class="bg-slate-50 border-b border-slate-200">
                            <tr>
                                <th class="px-6 py-4 font-semibold text-slate-900">#</th>
                                <th class="px-6 py-4 font-semibold text-slate-900">Title</th>
                                <th class="px-6 py-4 font-semibold text-slate-900">Description</th>
                                <th class="px-6 py-4 font-semibold text-slate-900 text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-200">
                            @foreach ($featuredServices as $i => $service)
                                <tr class="hover:bg-slate-50 transition">
                                    <td class="px-6 py-4 text-slate-600">{{ $i + 1 }}</td>
                                    <td class="px-6 py-4">
                                        <p class="font-semibold text-slate-900">
                                            {{ $service->featured_services_title }}</p>
                                    </td>
                                    <td class="px-6 py-4 text-slate-600 max-w-xs">
                                        {{ Str::limit($service->featured_services_description, 60) }}
                                    </td>
                                    <td class="px-6 py-4 text-right">
                                        <div class="flex justify-end gap-2">
                                            {{-- ACTION BUTTONS --}}
                                            

                                                <a href="{{ route('admin.featured-services.show', $service->id) }}"
                                                    class="px-4 py-2 bg-gray-600 text-white text-sm rounded-lg hover:bg-gray-700 transition">
                                                    View
                                                </a>

                                                <a href="{{ route('admin.featured-services.edit', $service->id) }}"
                                                    class="px-4 py-2 bg-blue-600 text-white text-sm rounded-lg hover:bg-blue-700 transition">
                                                    Edit
                                                </a>

                                                <form id="delete-form-featured-service{{ $service->id }}"
                                                    action="{{ route('admin.featured-services.destroy', $service->id) }}"
                                                    method="POST">

                                                    @csrf
                                                    @method('DELETE')

                                                    <button type="button" onclick="confirmDelete({{ $service->id }})"
                                                        class="px-4 py-2 bg-red-600 text-white text-sm rounded-lg hover:bg-red-700 transition">
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
        @else
            <div class="bg-white rounded-[28px] border border-slate-200 shadow-sm p-12 text-center">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-12 h-12 text-slate-300 mx-auto mb-4">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0013.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                </svg>
                <p class="text-slate-500 font-medium">No featured services found</p>
                <p class="text-slate-400 text-sm mt-2">Get started by creating your first featured service.</p>
                <a href="{{ route('admin.featured-services.create') }}"
                    class="mt-4 inline-flex items-center gap-2 px-5 py-2 bg-indigo-600 text-white text-sm font-medium rounded-lg hover:bg-indigo-700 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="h-4 w-4">
                        <path fill-rule="evenodd"
                            d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                            clip-rule="evenodd" />
                    </svg>
                    Create Featured Service
                </a>
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
                    document.getElementById('delete-form-featured-service' + id).submit();
                }
            });
        }
    </script>

</x-app-layout>
