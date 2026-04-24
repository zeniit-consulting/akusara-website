<x-landing-layout>
    <x-navbar />
    <div class="min-h-screen bg-gradient-to-br from-slate-50 via-white to-blue-50 text-gray-900 px-6 py-32">
        <!-- Container -->
        <div class="max-w-6xl mx-auto">



            <!-- Header -->
            <div class="mb-12">
                <h1
                    class="
        text-s
        break-words
        text-3xl md:text-4xl
        font-bold
        leading-tight
        text-transparent
        bg-clip-text
        bg-gradient-to-r
        from-[#1800AD]
        via-purple-600
        to-pink-600
    ">
                    {{ $portfolio->portfolio_title }}
                </h1>
                <p class="text-[#1800AD] mt-4 text-lg font-semibold">
                    {{ $portfolio->portfolio_category ?? 'Uncategorized' }}
                </p>
            </div>

            <!-- Thumbnail Hero -->
            <div class="relative rounded-3xl overflow-hidden border-2 border-[#1800AD] shadow-2xl mb-12">
                <img src="{{ $portfolio->portfolio_image
                    ? (Str::startsWith($portfolio->portfolio_image, ['http://', 'https://'])
                        ? $portfolio->portfolio_image
                        : asset('storage/' . $portfolio->portfolio_image))
                    : 'https://images.unsplash.com/photo-1498050108023-c5249f4df085?auto=format&fit=crop&w=800&q=80' }}"
                    class="w-full h-96 object-cover">

                <div class="absolute inset-0 bg-gradient-to-t from-black/30 via-transparent to-transparent"></div>
            </div>

            <!-- Content Grid -->
            <div class="grid md:grid-cols-3 gap-8">

                <!-- LEFT CONTENT -->
                <div class="md:col-span-2 space-y-8">

                    <!-- Description Card -->
                    <div
                        class="p-8 rounded-2xl bg-white shadow-lg border-2 border-[#1800AD]/20 hover:shadow-xl hover:border-[#1800AD]/50 transition duration-300">
                        <h2 class="text-2xl font-bold mb-4 text-[#1800AD]">Project Overview</h2>
                        <p class="text-gray-600 leading-relaxed text-lg">
                            {{ $portfolio->portfolio_description }}
                        </p>
                    </div>

                    <!-- Gallery -->
                    {{-- <div>
                    <h3 class="text-2xl font-bold mb-6 text-[#1800AD]">Project Gallery</h3>
                    <div class="grid grid-cols-2 gap-6">
                        @foreach ($portfolio->images ?? [] as $image)
                            <div class="group cursor-pointer">
                                <img src="{{ asset($image) }}"
                                    class="rounded-2xl border-2 border-[#1800AD]/20 object-cover w-full h-64 hover:shadow-lg hover:scale-105 hover:border-[#1800AD] transition duration-300">
                            </div>
                        @endforeach
                    </div>
                </div> --}}

                    <!-- Back Button -->
                    <div class="mb-8 ">
                        <a href="{{ route('home') }}"
                            class="inline-flex items-center gap-2 px-6 py-3 rounded-full bg-white text-[#1800AD] font-semibold shadow-md border-2 border-[#1800AD] hover:bg-[#1800AD] hover:text-white transition duration-300">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 19l-7-7 7-7"></path>
                            </svg>
                            Back
                        </a>
                    </div>

                </div>

                <!-- RIGHT SIDEBAR -->
                <div class="space-y-6">

                    <!-- Info Card -->
                    <div
                        class="p-8 rounded-2xl bg-gradient-to-br from-[#1800AD]/5 to-purple-50 shadow-lg border-2 border-[#1800AD]/20">
                        <h3 class="text-xl font-bold mb-6 text-[#1800AD]">Project Information</h3>

                        <div class="space-y-5">
                            <div class="pb-4 border-b-2 border-[#1800AD]/20">
                                <span class="text-[#1800AD] font-semibold text-sm uppercase tracking-wide">Client</span>
                                <p class="text-gray-800 mt-2 font-medium">{{ $portfolio->client ?? 'N/A' }}</p>
                            </div>

                            <div class="pb-4 border-b-2 border-[#1800AD]/20">
                                <span class="text-[#1800AD] font-semibold text-sm uppercase tracking-wide">Year</span>
                                <p class="text-gray-800 mt-2 font-medium">{{ $portfolio->year ?? 'N/A' }}</p>
                            </div>

                            <div>
                                <span
                                    class="text-[#1800AD] font-semibold text-sm uppercase tracking-wide">Category</span>
                                <p class="text-gray-800 mt-2 font-medium">{{ $portfolio->portfolio_category ?? '-' }}
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- CTA Card -->
                    <div
                        class="p-8 rounded-2xl bg-gradient-to-br from-[#1800AD] to-purple-700 shadow-2xl border-2 border-[#1800AD]/50">
                        <h3 class="text-xl font-bold mb-3 text-white">Interested?</h3>
                        <p class="text-white/90 text-sm mb-6 leading-relaxed">
                            Mari kita ciptakan sesuatu yang luar biasa bersama-sama.
                        </p>

                        <!-- WhatsApp Button -->
                        <div class="mb-4">
                            <x-whats-app :phone="'081234567890'" :message="'Halo, saya tertarik dengan project portfolio Anda!'"
                                class="w-full inline-flex items-center justify-center gap-2 px-5 py-3 rounded-xl bg-white/20 text-white font-semibold hover:bg-white/30 transition duration-300 border-2 border-white/50">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.272-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.67-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.076 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421-7.403h-.004a9.87 9.87 0 00-4.781 1.158l-.338-.534c-1.468-2.868-2.124-6.01-1.642-9.151.548-3.68 3.043-6.881 6.556-7.529 4.677-.932 9.156 1.285 11.003 5.454 1.846 4.169.913 9.141-2.122 12.25-2.55 2.726-6.477 3.824-10.226 2.817z" />
                                </svg>
                                WhatsApp
                            </x-whats-app>
                        </div>

                        <!-- Contact Button -->
                        <a href="{{ route('home') }}"
                            class="inline-flex items-center justify-center w-full gap-2 px-5 py-3 rounded-xl bg-white text-[#1800AD] font-semibold hover:shadow-lg hover:scale-105 transition duration-300">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                </path>
                            </svg>
                            Get In Touch
                        </a>
                    </div>

                    <!-- Stats Card -->
                    <div class="p-6 rounded-2xl bg-white shadow-lg border-2 border-[#1800AD]/20">
                        <div class="grid grid-cols-2 gap-4 text-center">
                            <div class="p-3 rounded-xl bg-[#1800AD]/5">
                                <p class="text-3xl font-bold text-[#1800AD]">100%</p>
                                <p class="text-gray-600 text-xs mt-2 font-medium">Satisfaction</p>
                            </div>
                            <div class="p-3 rounded-xl bg-[#1800AD]/5">
                                <p class="text-3xl font-bold text-[#1800AD]">✓</p>
                                <p class="text-gray-600 text-xs mt-2 font-medium">Completed</p>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>

    </div>
    <x-footer />
</x-landing-layout>
