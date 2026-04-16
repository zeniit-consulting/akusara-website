<section id="services" class="scroll-mt-10 py-24 bg-[#1800AD] px-6">

    <div class="max-w-6xl mx-auto text-center">
        <h1 class="text-6xl md:text-7xl font-extrabold tracking-tight text-white mb-6">
            {{ $setting->services_title }}
        </h1>
        @php
            $text = (ucfirst($setting->services_description ?? 'Your best partner to grow your business'));
            $words = explode(' ', $text);
            $last = array_pop($words);
        @endphp

        <p class="text-xl md:text-2xl text-slate-200 mb-12">
            <span>{{ implode(' ', $words) }}</span>
            <span class="font-semibold text-white"> {{ $last }}</span>
        </p>

        <div class="flex flex-wrap justify-center gap-4 md:gap-5 mb-6">
            <span
                class="inline-flex items-center gap-2 rounded-full border border-white/40 bg-white/10 px-5 py-3 text-sm md:text-base text-white transition duration-300 ease-out transform hover:-translate-y-1 hover:scale-105 hover:bg-white/20 hover:shadow-lg">
                <span
                    class="inline-flex h-9 w-9 items-center justify-center rounded-full bg-white/20 text-white shadow-lg">📱</span>
                Sosial Media Manajemen
            </span>
            <span
                class="inline-flex items-center gap-2 rounded-full border border-white/40 bg-white/10 px-5 py-3 text-sm md:text-base text-white transition duration-300 ease-out transform hover:-translate-y-1 hover:scale-105 hover:bg-white/20 hover:shadow-lg">
                <span
                    class="inline-flex h-9 w-9 items-center justify-center rounded-full bg-white/20 text-white shadow-lg">🎨</span>
                Creative Content
            </span>
            <span
                class="inline-flex items-center gap-2 rounded-full border border-white/40 bg-white/10 px-5 py-3 text-sm md:text-base text-white transition duration-300 ease-out transform hover:-translate-y-1 hover:scale-105 hover:bg-white/20 hover:shadow-lg">
                <span
                    class="inline-flex h-9 w-9 items-center justify-center rounded-full bg-white/20 text-white shadow-lg">💻</span>
                Website
            </span>
            <span
                class="inline-flex items-center gap-2 rounded-full border border-white/40 bg-white/10 px-5 py-3 text-sm md:text-base text-white transition duration-300 ease-out transform hover:-translate-y-1 hover:scale-105 hover:bg-white/20 hover:shadow-lg">
                <span
                    class="inline-flex h-9 w-9 items-center justify-center rounded-full bg-white/20 text-white shadow-lg">📣</span>
                Multi-platform digital campaigns
            </span>
        </div>

        <div class="flex flex-wrap justify-center gap-4 md:gap-5">
            <span
                class="inline-flex items-center gap-2 rounded-full border border-white/40 bg-white/10 px-5 py-3 text-sm md:text-base text-white transition duration-300 ease-out transform hover:-translate-y-1 hover:scale-105 hover:bg-white/20 hover:shadow-lg">
                <span
                    class="inline-flex h-9 w-9 items-center justify-center rounded-full bg-white/20 text-white shadow-lg">🧠</span>
                Strategi
            </span>
            <span
                class="inline-flex items-center gap-2 rounded-full border border-white/40 bg-white/10 px-5 py-3 text-sm md:text-base text-white transition duration-300 ease-out transform hover:-translate-y-1 hover:scale-105 hover:bg-white/20 hover:shadow-lg">
                <span
                    class="inline-flex h-9 w-9 items-center justify-center rounded-full bg-white/20 text-white shadow-lg">📈</span>
                Bisinis Optimization
            </span>
        </div>
    </div>

</section>
