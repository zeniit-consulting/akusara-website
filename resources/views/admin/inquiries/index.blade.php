<x-app-layout>
    <div class="p-6">

        <!-- Header -->
        <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-6">
            <h1 class="text-2xl font-bold text-slate-800">
                Inquiry Messages
            </h1>

            <!-- Search -->
            <form method="GET" class="mt-4 md:mt-0">
                <input type="text" name="search" value="{{ request('search') }}"
                    placeholder="Search name or email..."
                    class="w-full md:w-64 rounded-xl border border-slate-300 px-4 py-2 text-sm focus:border-[#1800AD] focus:ring-2 focus:ring-[#1800AD]/30">
            </form>
        </div>

        <!-- Success Message -->
        @if(session('success'))
            <div class="mb-4 p-4 rounded-xl bg-green-100 text-green-700">
                {{ session('success') }}
            </div>
        @endif

        <!-- Table -->
        <div class="bg-white rounded-2xl shadow overflow-hidden">
            <table class="w-full text-sm text-left">
                <thead class="bg-slate-900 text-white uppercase text-xs">
                    <tr>
                        <th class="px-6 py-4">Name</th>
                        <th class="px-6 py-4">Email</th>
                        <th class="px-6 py-4">Event</th>
                        <th class="px-6 py-4">Budget</th>
                        <th class="px-6 py-4">Status</th>
                        <th class="px-6 py-4">Date</th>
                        <th class="px-6 py-4 text-right">Action</th>
                    </tr>
                </thead>

                <tbody class="divide-y">

                    @forelse($inquiries as $item)
                        <tr class="transition
                            {{ !$item->is_read ? 'bg-blue-50 font-semibold' : 'hover:bg-slate-50' }}">

                            <!-- Name -->
                            <td class="px-6 py-4">
                                {{ $item->name }}
                            </td>

                            <!-- Email -->
                            <td class="px-6 py-4 text-slate-600">
                                {{ $item->email }}
                            </td>

                            <!-- Event -->
                            <td class="px-6 py-4">
                                {{ $item->event_type ?? '-' }}
                            </td>

                            <!-- Budget -->
                            <td class="px-6 py-4">
                                {{ $item->budget ?? '-' }}
                            </td>

                            <!-- Status -->
                            <td class="px-6 py-4">
                                @if($item->is_read)
                                    <span class="px-3 py-1 text-xs rounded-full bg-green-100 text-green-700">
                                        Read
                                    </span>
                                @else
                                    <span class="px-3 py-1 text-xs rounded-full bg-red-100 text-red-600">
                                        Unread
                                    </span>
                                @endif
                            </td>

                            <!-- Date -->
                            <td class="px-6 py-4 text-slate-500">
                                {{ $item->created_at->format('d M Y') }}
                            </td>

                            <!-- Action -->
                            <td class="px-6 py-4 text-right space-x-2">

                                <!-- View -->
                                <a href="{{ route('admin.inquiries.show', $item->id) }}"
                                   class="px-3 py-1 text-sm rounded-lg bg-[#1800AD] text-white hover:bg-[#120085] transition">
                                    View
                                </a>

                                <!-- Delete -->
                                <form action="{{ route('admin.inquiries.destroy', $item->id) }}"
                                      method="POST" class="inline"
                                      onsubmit="return confirm('Delete this inquiry?')">
                                    @csrf
                                    @method('DELETE')

                                    <button
                                        class="px-3 py-1 text-sm rounded-lg bg-red-500 text-white hover:bg-red-600 transition">
                                        Delete
                                    </button>
                                </form>

                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center py-10 text-slate-500">
                                No inquiries found
                            </td>
                        </tr>
                    @endforelse

                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="mt-6">
            {{ $inquiries->links() }}
        </div>

    </div>
</x-app-layout>