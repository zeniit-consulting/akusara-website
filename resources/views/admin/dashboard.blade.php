<x-app-layout>
    <style>
        @keyframes dashboardFadeUp {
            from {
                opacity: 0;
                transform: translateY(16px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .dashboard-rise {
            animation: dashboardFadeUp 0.55s ease-out both;
        }

        .dashboard-rise-delay-1 {
            animation-delay: 0.08s;
        }

        .dashboard-rise-delay-2 {
            animation-delay: 0.16s;
        }

        .dashboard-rise-delay-3 {
            animation-delay: 0.24s;
        }
    </style>

    <div class="space-y-6">
        <section class="dashboard-rise relative overflow-hidden rounded-3xl bg-slate-950 p-6 text-white shadow-xl sm:p-8">
            <div class="pointer-events-none absolute -left-16 top-0 h-56 w-56 rounded-full bg-cyan-400/30 blur-3xl"></div>
            <div class="pointer-events-none absolute -right-12 bottom-0 h-72 w-72 rounded-full bg-amber-300/20 blur-3xl"></div>

            <div class="relative flex flex-col gap-8 xl:flex-row xl:items-end xl:justify-between">
                <div class="max-w-2xl">
                    <p class="text-xs font-semibold uppercase tracking-[0.25em] text-cyan-200">Admin Control Center</p>
                    <h1 class="mt-3 text-3xl font-bold leading-tight sm:text-4xl">
                        Dashboard monitoring Akusara Lab
                    </h1>
                    <p class="mt-3 max-w-xl text-sm text-slate-200 sm:text-base">
                        Pantau inquiry terbaru, pesan belum dibaca, dan performa tindak lanjut dalam satu tampilan.
                    </p>

                    <div class="mt-6 flex flex-wrap gap-3">
                        <a href="{{ route('admin.inquiries.index') }}"
                            class="inline-flex items-center rounded-full bg-cyan-400 px-5 py-2 text-sm font-semibold text-slate-950 transition hover:bg-cyan-300">
                            Buka inbox inquiry
                        </a>
                        <a href="{{ route('admin.settings.index') }}"
                            class="inline-flex items-center rounded-full border border-white/30 px-5 py-2 text-sm font-semibold text-white transition hover:bg-white/10">
                            Kelola settings
                        </a>
                    </div>
                </div>

                <div class="w-full max-w-md rounded-2xl border border-white/20 bg-white/10 p-5 backdrop-blur">
                    <p class="text-xs uppercase tracking-[0.2em] text-cyan-200">Waktu sekarang</p>
                    <p id="dashboard-clock" class="mt-3 text-4xl font-semibold leading-none tracking-tight">--:--:--</p>
                    <p id="dashboard-date" class="mt-2 text-sm text-slate-200">Memuat tanggal...</p>
                    <p class="mt-1 text-xs text-slate-300">
                        Timezone:
                        <span id="dashboard-timezone">Local</span>
                    </p>
                </div>
            </div>
        </section>

        <section class="dashboard-rise dashboard-rise-delay-1 grid gap-4 sm:grid-cols-2 xl:grid-cols-4">
            <article class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
                <p class="text-xs uppercase tracking-[0.14em] text-slate-500">Total Inquiry</p>
                <p class="mt-3 text-3xl font-bold text-slate-900">{{ number_format($totalInquiries) }}</p>
                <p class="mt-2 text-sm text-slate-500">Semua pesan yang masuk sejak awal.</p>
            </article>

            <article class="rounded-2xl border border-red-100 bg-red-50 p-5 shadow-sm">
                <p class="text-xs uppercase tracking-[0.14em] text-red-500">Belum Dibaca</p>
                <p class="mt-3 text-3xl font-bold text-red-700">{{ number_format($unreadInquiries) }}</p>
                <p class="mt-2 text-sm text-red-600">Prioritas follow-up paling cepat.</p>
            </article>

            <article class="rounded-2xl border border-emerald-100 bg-emerald-50 p-5 shadow-sm">
                <p class="text-xs uppercase tracking-[0.14em] text-emerald-500">Sudah Dibaca</p>
                <p class="mt-3 text-3xl font-bold text-emerald-700">{{ number_format($readInquiries) }}</p>
                <p class="mt-2 text-sm text-emerald-600">Pesan yang sudah diproses.</p>
            </article>

            <article class="rounded-2xl border border-cyan-100 bg-cyan-50 p-5 shadow-sm">
                <p class="text-xs uppercase tracking-[0.14em] text-cyan-600">Masuk Hari Ini</p>
                <p class="mt-3 text-3xl font-bold text-cyan-700">{{ number_format($todayInquiries) }}</p>
                <p class="mt-2 text-sm text-cyan-700">Inquiry baru tanggal hari ini.</p>
            </article>
        </section>

        <section class="dashboard-rise dashboard-rise-delay-2 grid gap-6 xl:grid-cols-5">
            <article class="xl:col-span-3 rounded-2xl border border-slate-200 bg-white p-5 shadow-sm sm:p-6">
                <div class="flex items-center justify-between gap-3">
                    <div>
                        <h2 class="text-lg font-bold text-slate-900">Inquiry terbaru</h2>
                        <p class="text-sm text-slate-500">Pesan terakhir yang masuk dari calon klien.</p>
                    </div>
                    <a href="{{ route('admin.inquiries.index') }}"
                        class="rounded-full border border-slate-300 px-4 py-1.5 text-xs font-semibold text-slate-700 transition hover:border-slate-500 hover:text-slate-900">
                        Lihat semua
                    </a>
                </div>

                <ul class="mt-5 space-y-3">
                    @forelse ($recentInquiries as $inquiry)
                        <li class="rounded-xl border border-slate-200 p-4 transition hover:border-cyan-200 hover:bg-cyan-50/40">
                            <div class="flex flex-wrap items-start justify-between gap-3">
                                <div>
                                    <p class="font-semibold text-slate-900">{{ $inquiry->name }}</p>
                                    <p class="text-sm text-slate-500">{{ $inquiry->email }}</p>
                                    <p class="mt-1 text-xs text-slate-500">
                                        {{ $inquiry->event_type ?: 'General inquiry' }}
                                    </p>
                                </div>
                                <div class="text-right">
                                    <span
                                        class="inline-flex rounded-full px-3 py-1 text-xs font-semibold {{ $inquiry->is_read ? 'bg-emerald-100 text-emerald-700' : 'bg-red-100 text-red-700' }}">
                                        {{ $inquiry->is_read ? 'Read' : 'Unread' }}
                                    </span>
                                    <p class="mt-2 text-xs text-slate-500">{{ $inquiry->created_at->format('d M Y H:i') }}</p>
                                </div>
                            </div>
                        </li>
                    @empty
                        <li class="rounded-xl border border-dashed border-slate-300 p-8 text-center text-sm text-slate-500">
                            Belum ada inquiry masuk.
                        </li>
                    @endforelse
                </ul>
            </article>

            <article class="xl:col-span-2 rounded-2xl border border-slate-200 bg-white p-5 shadow-sm sm:p-6">
                <h2 class="text-lg font-bold text-slate-900">Kalender bulan ini</h2>
                <p class="mt-1 text-sm text-slate-500">Gunakan untuk cek tanggal dan planning follow-up.</p>

                <div class="mt-4 rounded-xl bg-slate-50 p-4">
                    <div class="mb-4 flex items-center justify-between">
                        <p id="calendar-title" class="text-sm font-semibold text-slate-700">Memuat kalender...</p>
                    </div>
                    <div id="calendar-grid" class="grid grid-cols-7 gap-1 text-center text-xs"></div>
                </div>

                <div class="mt-5 rounded-xl border border-cyan-100 bg-cyan-50 p-4">
                    <p class="text-xs uppercase tracking-[0.14em] text-cyan-700">Aktivitas Minggu Ini</p>
                    <p class="mt-2 text-2xl font-bold text-cyan-900">{{ number_format($weeklyInquiries) }} inquiry</p>
                    <p class="mt-1 text-sm text-cyan-800">Masuk dari awal minggu sampai hari ini.</p>
                </div>
            </article>
        </section>

        <section class="dashboard-rise dashboard-rise-delay-3 grid gap-6 lg:grid-cols-3">
            <article class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm lg:col-span-2">
                <div class="flex items-center justify-between gap-3">
                    <div>
                        <h2 class="text-lg font-bold text-slate-900">Progress penanganan pesan</h2>
                        <p class="text-sm text-slate-500">Persentase pesan yang sudah ditandai sebagai read.</p>
                    </div>
                    <p class="text-2xl font-bold text-slate-900">{{ $readRate }}%</p>
                </div>

                <div class="mt-4 h-3 w-full overflow-hidden rounded-full bg-slate-200">
                    <div class="h-full rounded-full bg-gradient-to-r from-cyan-500 to-emerald-500"
                        style="width: {{ $readRate }}%"></div>
                </div>

                <div class="mt-4 flex flex-wrap gap-4 text-sm text-slate-600">
                    <p>Total: <span class="font-semibold text-slate-900">{{ number_format($totalInquiries) }}</span></p>
                    <p>Unread: <span class="font-semibold text-red-700">{{ number_format($unreadInquiries) }}</span></p>
                    <p>Read: <span class="font-semibold text-emerald-700">{{ number_format($readInquiries) }}</span></p>
                </div>
            </article>

            <article class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
                <h2 class="text-lg font-bold text-slate-900">Agenda cepat</h2>
                <ul class="mt-4 space-y-2 text-sm text-slate-600">
                    <li class="rounded-lg bg-slate-50 px-3 py-2">
                        Cek inbox untuk pesan baru yang belum dibaca.
                    </li>
                    <li class="rounded-lg bg-slate-50 px-3 py-2">
                        Prioritaskan inquiry yang masuk hari ini.
                    </li>
                    <li class="rounded-lg bg-slate-50 px-3 py-2">
                        Review halaman settings bila ada update konten.
                    </li>
                </ul>
            </article>
        </section>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const clockElement = document.getElementById('dashboard-clock');
            const dateElement = document.getElementById('dashboard-date');
            const timezoneElement = document.getElementById('dashboard-timezone');
            const calendarTitle = document.getElementById('calendar-title');
            const calendarGrid = document.getElementById('calendar-grid');

            const dayLabels = ['Min', 'Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab'];

            function updateClock() {
                const now = new Date();
                const timeText = new Intl.DateTimeFormat('id-ID', {
                    hour: '2-digit',
                    minute: '2-digit',
                    second: '2-digit',
                    hour12: false
                }).format(now);

                const dateText = new Intl.DateTimeFormat('id-ID', {
                    weekday: 'long',
                    day: 'numeric',
                    month: 'long',
                    year: 'numeric'
                }).format(now);

                if (clockElement) {
                    clockElement.textContent = timeText;
                }

                if (dateElement) {
                    dateElement.textContent = dateText;
                }

                if (timezoneElement) {
                    timezoneElement.textContent = Intl.DateTimeFormat().resolvedOptions().timeZone || 'Local';
                }
            }

            function renderCalendar(referenceDate) {
                if (!calendarTitle || !calendarGrid) {
                    return;
                }

                calendarGrid.innerHTML = '';
                const year = referenceDate.getFullYear();
                const month = referenceDate.getMonth();

                calendarTitle.textContent = new Intl.DateTimeFormat('id-ID', {
                    month: 'long',
                    year: 'numeric'
                }).format(referenceDate);

                dayLabels.forEach(function(label) {
                    const labelItem = document.createElement('div');
                    labelItem.className = 'pb-2 text-[11px] font-semibold uppercase tracking-wide text-slate-500';
                    labelItem.textContent = label;
                    calendarGrid.appendChild(labelItem);
                });

                const firstDayIndex = new Date(year, month, 1).getDay();
                const totalDays = new Date(year, month + 1, 0).getDate();
                const totalPrevMonthDays = new Date(year, month, 0).getDate();
                const today = new Date();

                for (let i = 0; i < firstDayIndex; i++) {
                    const dayItem = document.createElement('div');
                    dayItem.className = 'rounded-lg py-2 text-slate-300';
                    dayItem.textContent = totalPrevMonthDays - firstDayIndex + i + 1;
                    calendarGrid.appendChild(dayItem);
                }

                for (let day = 1; day <= totalDays; day++) {
                    const dayItem = document.createElement('div');
                    const isToday = day === today.getDate() &&
                        month === today.getMonth() &&
                        year === today.getFullYear();

                    dayItem.className = isToday ?
                        'rounded-lg bg-cyan-500 py-2 font-semibold text-white shadow-sm' :
                        'rounded-lg bg-white py-2 text-slate-700';

                    dayItem.textContent = day;
                    calendarGrid.appendChild(dayItem);
                }

                const remainder = calendarGrid.children.length % 7;
                if (remainder > 0) {
                    const trailingItems = 7 - remainder;
                    for (let day = 1; day <= trailingItems; day++) {
                        const dayItem = document.createElement('div');
                        dayItem.className = 'rounded-lg py-2 text-slate-300';
                        dayItem.textContent = day;
                        calendarGrid.appendChild(dayItem);
                    }
                }
            }

            updateClock();
            setInterval(updateClock, 1000);
            renderCalendar(new Date());
        });
    </script>
</x-app-layout>
