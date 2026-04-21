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
                    Admin · Company Profile
                </span>
                <h1 class="text-3xl font-semibold text-slate-900">Company Profile Management</h1>
                <p class="max-w-2xl text-sm text-slate-500">Kelola profil perusahaan Anda dengan mudah.</p>
            </div>
            @if (!$companyProfiles)
                <div class="flex flex-wrap gap-3">
                    <a href="{{ route('admin.company-profile.create') }}"
                        class="inline-flex items-center gap-2 px-5 py-3 bg-indigo-600 text-white text-sm font-medium rounded-2xl shadow-sm transition duration-200 hover:bg-indigo-700">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="h-4 w-4">
                            <path fill-rule="evenodd"
                                d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                clip-rule="evenodd" />
                        </svg>
                        Create Company Profile
                    </a>
                </div>
            @endif
        </div>

        @if ($companyProfiles)
            <div class="bg-white rounded-[28px] border border-slate-200 shadow-sm overflow-hidden">
                <div class="px-6 py-4 border-b border-slate-200">
                    <h3 class="text-lg font-semibold text-slate-900">Company Profile List</h3>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-slate-50">
                            <tr>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">
                                    Title</th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">
                                    Description</th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">
                                    Vision</th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">
                                    Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-slate-200">

                            <tr class="hover:bg-slate-50">
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-slate-900">
                                    {{ $companyProfiles->company_profile_title }}
                                </td>
                                <td class="px-6 py-4 text-sm text-slate-500 max-w-xs truncate">
                                    {{ Str::limit($companyProfiles->company_profile_description, 50) }}
                                </td>
                                <td class="px-6 py-4 text-sm text-slate-500 max-w-xs truncate">
                                    {{ Str::limit($companyProfiles->company_profile_vision, 30) }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <div class="flex items-center gap-2">

                                        <!-- EDIT -->
                                        <a href="{{ route('admin.company-profile.edit', $companyProfiles->id) }}"
                                            class="px-4 py-2 bg-blue-600 text-white text-sm rounded-lg hover:bg-blue-700 transition">
                                            Edit
                                        </a>

                                        <!-- DELETE -->
                                        <form
                                            action="{{ route('admin.company-profile.destroy', $companyProfiles->id) }}"
                                            method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                class="px-4 py-2 bg-red-600 text-white text-sm rounded-lg hover:bg-red-700 transition delete-btn"
                                                data-name="{{ $companyProfiles->company_profile_title }}">
                                                Delete
                                            </button>
                                        </form>

                                    </div>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        @else
            <div class="bg-white rounded-[28px] border border-slate-200 shadow-sm p-12 text-center">
                <svg class="mx-auto h-12 w-12 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                </svg>
                <h3 class="mt-2 text-sm font-medium text-slate-900">No company profiles</h3>
                <p class="mt-1 text-sm text-slate-500">Get started by creating a new company profile.</p>
                <div class="mt-6">
                    <a href="{{ route('admin.company-profile.create') }}"
                        class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700">
                        <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                clip-rule="evenodd" />
                        </svg>
                        Create Company Profile
                    </a>
                </div>
            </div>
        @endif
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.delete-btn').forEach(button => {
                button.addEventListener('click', function(e) {
                    e.preventDefault();
                    const form = this.closest('form');
                    const name = this.getAttribute('data-name');

                    Swal.fire({
                        title: 'Are you sure you want to delete this data?',
                        text: "Deleted data cannot be restored!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#d33',
                        cancelButtonColor: '#3085d6',
                        confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit();
                        }
                    });
                });
            });
        });
    </script>

</x-app-layout>
