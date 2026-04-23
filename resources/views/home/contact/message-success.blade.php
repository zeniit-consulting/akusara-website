
<x-landing-layout>
		<div class="min-h-screen bg-gradient-to-br from-slate-50 via-white to-blue-50 text-gray-900 px-6 py-16">
    <!-- Container -->
    <div class="max-w-4xl mx-auto">

        <!-- Success Animation Container -->
        <div class="mb-12 flex justify-center">
            <div class="relative w-24 h-24 bg-gradient-to-br from-[#1800AD] to-purple-600 rounded-full flex items-center justify-center shadow-2xl animate-bounce">
                <svg class="w-12 h-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path>
                </svg>
            </div>
        </div>

        <!-- Header -->
        <div class="mb-12 text-center">
            <h1 class="text-5xl md:text-6xl font-bold leading-tight text-transparent bg-clip-text bg-gradient-to-r from-[#1800AD] via-purple-600 to-pink-600 mb-4">
                Message Sent Successfully!
            </h1>
            <p class="text-gray-600 text-lg">
                Terima kasih telah menghubungi kami. Kami akan segera membalas pesan Anda.
            </p>
        </div>

        <!-- Success Details Card -->
        <div class="bg-white rounded-3xl shadow-xl border-2 border-[#1800AD]/20 p-8 md:p-12 mb-8">
            
            <!-- Message Details -->
            <div class="space-y-6 mb-8">
                
                <!-- Name Section -->
                <div class="pb-6 border-b-2 border-[#1800AD]/10">
                    <p class="text-sm font-semibold text-[#1800AD] uppercase tracking-wide mb-2">Nama Anda</p>
                    <p class="text-xl text-gray-800 font-medium">{{ $inquiries->name }}</p>
                </div>

                <!-- Email Section -->
                <div class="pb-6 border-b-2 border-[#1800AD]/10">
                    <p class="text-sm font-semibold text-[#1800AD] uppercase tracking-wide mb-2">Email</p>
                    <div class="flex items-center gap-2">
                        <svg class="w-5 h-5 text-[#1800AD]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                        <p class="text-lg text-gray-700">{{ $inquiries->email }}</p>
                    </div>
                </div>

                <!-- Phone Section (jika ada) -->
                @if($inquiries->phone ?? null)
                <div class="pb-6 border-b-2 border-[#1800AD]/10">
                    <p class="text-sm font-semibold text-[#1800AD] uppercase tracking-wide mb-2">Nomor Telepon</p>
                    <div class="flex items-center gap-2">
                        <svg class="w-5 h-5 text-[#1800AD]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                        </svg>
                        <p class="text-lg text-gray-700">{{ $inquiries->phone }}</p>
                    </div>
                </div>
                @endif

                <!-- Message Section -->
                <div>
                    <p class="text-sm font-semibold text-[#1800AD] uppercase tracking-wide mb-3">Pesan Anda</p>
                    <div class="bg-gradient-to-br from-[#1800AD]/5 to-purple-50 rounded-xl p-6 border-l-4 border-[#1800AD]">
                        <p class="text-gray-700 leading-relaxed">{{ $inquiries->message }}</p>
                    </div>
                </div>

            </div>

            <!-- Info Box -->
            <div class="bg-gradient-to-r from-[#1800AD]/10 to-purple-50 rounded-2xl p-6 mb-8">
                <div class="flex gap-4">
                    <div class="flex-shrink-0">
                        <svg class="w-6 h-6 text-[#1800AD]" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zm-11-1a1 1 0 11-2 0 1 1 0 012 0z" clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <div>
                        <h3 class="font-semibold text-gray-900 mb-1">Apa Selanjutnya?</h3>
                        <p class="text-gray-600 text-sm">Kami telah menerima pesan Anda dan akan meresponnya dalam waktu 24 jam. Cek email Anda secara berkala untuk update dari kami.</p>
                    </div>
                </div>
            </div>

        </div>

        <!-- Action Buttons -->
        <div class="flex flex-col sm:flex-row gap-4 justify-center mb-8">
            
            <!-- Back to Home Button -->
            <a href="{{ route('home') }}"
                class="inline-flex items-center justify-center gap-2 px-8 py-4 rounded-full bg-white text-[#1800AD] font-semibold shadow-lg border-2 border-[#1800AD] hover:bg-[#1800AD] hover:text-white hover:shadow-2xl transition duration-300">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12a9 9 0 0118 0m0 0a9 9 0 01-18 0m0 0a8.964 8.964 0 0113.476-7.477M9 12a4 4 0 118 0m-1 7H9m10 0h-4"></path>
                </svg>
                Back to Home
            </a>

            

        </div>

        <!-- Footer Info -->
        <div class="text-center">
            <p class="text-gray-500 text-sm">
                ID Pesan: <span class="font-mono font-semibold text-gray-700">#{{ $inquiries->id ?? 'N/A' }}</span>
            </p>
            <p class="text-gray-500 text-sm mt-2">
                Tanggal: <span class="font-semibold text-gray-700">{{ $inquiries->created_at->format('d M Y H:i') ?? 'N/A' }}</span>
            </p>
        </div>

    </div>

</div>

<!-- Custom Animation CSS -->
<style>
    @keyframes bounce {
        0%, 100% {
            transform: translateY(0);
        }
        50% {
            transform: translateY(-1rem);
        }
    }

    .animate-bounce {
        animation: bounce 2s infinite;
    }
</style>
<x-footer />
</x-landing-layout>