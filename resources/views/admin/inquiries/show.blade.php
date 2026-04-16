<x-app-layout>
    <div class="p-6 max-w-6xl mx-auto space-y-6">

        <!-- HEADER -->
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
            <div>
                <h1 class="text-3xl font-bold text-slate-800">
                    Inquiry Detail
                </h1>
                <p class="text-slate-500 text-sm">
                    Received on {{ $inquiry->created_at->format('d M Y, H:i') }}
                </p>
            </div>

            <a href="{{ route('admin.inquiries.index') }}"
               class="px-5 py-2 rounded-xl bg-slate-100 hover:bg-slate-200 transition">
                ← Back to List
            </a>
        </div>

        <!-- MAIN GRID -->
        <div class="grid lg:grid-cols-3 gap-6">

            <!-- LEFT: USER INFO -->
            <div class="lg:col-span-1 space-y-6">

                <!-- Profile Card -->
                <div class="bg-white rounded-3xl shadow-lg p-6 text-center">
                    <div class="w-20 h-20 mx-auto rounded-full bg-[#1800AD]/10 flex items-center justify-center text-2xl font-bold text-[#1800AD]">
                        {{ strtoupper(substr($inquiry->name, 0, 1)) }}
                    </div>

                    <h2 class="mt-4 text-xl font-semibold text-slate-800">
                        {{ $inquiry->name }}
                    </h2>

                    <p class="text-sm text-slate-500">
                        {{ $inquiry->email }}
                    </p>

                    <!-- Status -->
                    <div class="mt-4">
                        @if($inquiry->is_read)
                            <span class="px-4 py-1 text-xs rounded-full bg-green-100 text-green-700">
                                Read
                            </span>
                        @else
                            <span class="px-4 py-1 text-xs rounded-full bg-red-100 text-red-600">
                                Unread
                            </span>
                        @endif
                    </div>
                </div>

                <!-- Info Card -->
                <div class="bg-white rounded-3xl shadow p-6 space-y-4">

                    <div>
                        <p class="text-xs text-slate-500">Phone</p>
                        <p class="font-medium text-slate-800">
                            {{ $inquiry->phone ?? '-' }}
                        </p>
                    </div>

                    <div>
                        <p class="text-xs text-slate-500">Event Type</p>
                        <p class="font-medium text-slate-800">
                            {{ $inquiry->event_type ?? '-' }}
                        </p>
                    </div>

                    <div>
                        <p class="text-xs text-slate-500">Budget</p>
                        <p class="font-medium text-slate-800">
                            {{ $inquiry->budget ?? '-' }}
                        </p>
                    </div>

                </div>

            </div>

            <!-- RIGHT: MESSAGE -->
            <div class="lg:col-span-2 space-y-6">

                <!-- Message Card -->
                <div class="bg-white rounded-3xl shadow-lg p-8">

                    <h2 class="text-lg font-semibold text-slate-800 mb-4">
                        Project Details
                    </h2>

                    <div class="bg-slate-50 rounded-2xl p-2 leading-relaxed text-slate-700 ">
                        {{ $inquiry->message }}
                    </div>

                </div>

                <!-- ACTION BAR -->
                <div class="bg-white rounded-3xl shadow p-6 flex flex-wrap gap-4 justify-between items-center">

                    <div class="flex gap-3">

                        <!-- Email -->
                        <a href="mailto:{{ $inquiry->email }}"
                           class="px-5 py-2 rounded-xl bg-[#1800AD] text-white hover:bg-[#120085] transition shadow">
                            📧 Email
                        </a>

                        <!-- WhatsApp -->
                        @if($inquiry->phone)
                        <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $inquiry->phone) }}"
                           target="_blank"
                           class="px-5 py-2 rounded-xl bg-green-500 text-white hover:bg-green-600 transition shadow">
                            💬 WhatsApp
                        </a>
                        @endif

                    </div>

                    <!-- Delete -->
                    <form action="{{ route('admin.inquiries.destroy', $inquiry->id) }}"
                          method="POST"
                          onsubmit="return confirm('Delete this inquiry?')">
                        @csrf
                        @method('DELETE')

                        <button
                            class="px-5 py-2 rounded-xl bg-red-500 text-white hover:bg-red-600 transition shadow">
                            🗑 Delete
                        </button>
                    </form>

                </div>

            </div>

        </div>

    </div>
</x-app-layout>