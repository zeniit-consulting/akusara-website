<section id="services" class="scroll-mt-10 py-24 bg-[#1800AD] px-6">

    <div class="max-w-6xl mx-auto text-center">
        <h1 class="text-6xl md:text-7xl font-extrabold tracking-tight text-white mb-6">
            {{ $copywiriting->services_title ?? 'Our Services' }}
        </h1>
        @php
            $text = ucfirst($copywiriting->services_description ?? 'Your best partner to grow your business');
            $words = explode(' ', $text);
            $last = array_pop($words);
        @endphp

        <p class="text-xl md:text-2xl text-slate-200 mb-12">
            <span>{{ implode(' ', $words) }}</span>
            <span class="font-semibold text-white"> {{ $last }}</span>
        </p>

        <div class="overflow-hidden mb-6 relative">
            <!-- gradient biar halus -->
            <div class="absolute left-0 top-0 w-20 h-full bg-gradient-to-r from-[#1800AD] to-transparent z-10"></div>
            <div class="absolute right-0 top-0 w-20 h-full bg-gradient-to-l from-[#1800AD] to-transparent z-10"></div>

            <div class="flex w-max gap-5 animate-marquee">

                <!-- set 1 -->
                <div class="flex gap-5">
                    <span
                        class="inline-flex items-center gap-2 rounded-full border border-white/40 bg-white/10 px-5 py-3 text-white whitespace-nowrap">

                        <span
                            class="inline-flex h-9 w-9 items-center justify-center rounded-full bg-white/20 text-white shadow-lg">📊</span>
                        Strategi Bisnis
                    </span>
                    <span
                        class="inline-flex items-center gap-2 rounded-full border border-white/40 bg-white/10 px-5 py-3 text-white whitespace-nowrap">

                        <span
                            class="inline-flex h-9 w-9 items-center justify-center rounded-full bg-white/20 text-white shadow-lg">📱</span>
                        Sosial Media Management
                    </span>
                    <span
                        class="inline-flex items-center gap-2 rounded-full border border-white/40 bg-white/10 px-5 py-3 text-white whitespace-nowrap">

                        <span
                            class="inline-flex h-9 w-9 items-center justify-center rounded-full bg-white/20 text-white shadow-lg">✍️</span>
                        Content Creation
                    </span>
                    <span
                        class="inline-flex items-center gap-2 rounded-full border border-white/40 bg-white/10 px-5 py-3 text-white whitespace-nowrap">

                        <span
                            class="inline-flex h-9 w-9 items-center justify-center rounded-full bg-white/20 text-white shadow-lg">📈</span>
                        Digital Marketing
                    </span>
                    <span
                        class="inline-flex items-center gap-2 rounded-full border border-white/40 bg-white/10 px-5 py-3 text-white whitespace-nowrap">

                        <span
                            class="inline-flex h-9 w-9 items-center justify-center rounded-full bg-white/20 text-white shadow-lg">⚡</span>
                        Business Optimization
                    </span>
                    <span
                        class="inline-flex items-center gap-2 rounded-full border border-white/40 bg-white/10 px-5 py-3 text-white whitespace-nowrap">

                        <span
                            class="inline-flex h-9 w-9 items-center justify-center rounded-full bg-white/20 text-white shadow-lg">🎓</span>
                        Training & Workshop
                    </span>

                </div>

                <!-- duplikat biar looping -->
                <div class="flex gap-5">
                    <span
                        class="inline-flex items-center gap-2 rounded-full border border-white/40 bg-white/10 px-5 py-3 text-white whitespace-nowrap">

                        <span
                            class="inline-flex h-9 w-9 items-center justify-center rounded-full bg-white/20 text-white shadow-lg">🧠</span>
                        Strategi Bisnis
                    </span>
                    <span
                        class="inline-flex items-center gap-2 rounded-full border border-white/40 bg-white/10 px-5 py-3 text-white whitespace-nowrap">

                        <span
                            class="inline-flex h-9 w-9 items-center justify-center rounded-full bg-white/20 text-white shadow-lg">🧠</span>
                        Sosial Media Management
                    </span>
                    <span
                        class="inline-flex items-center gap-2 rounded-full border border-white/40 bg-white/10 px-5 py-3 text-white whitespace-nowrap">

                        <span
                            class="inline-flex h-9 w-9 items-center justify-center rounded-full bg-white/20 text-white shadow-lg">🧠</span>
                        Content Creation
                    </span>
                    <span
                        class="inline-flex items-center gap-2 rounded-full border border-white/40 bg-white/10 px-5 py-3 text-white whitespace-nowrap">

                        <span
                            class="inline-flex h-9 w-9 items-center justify-center rounded-full bg-white/20 text-white shadow-lg">🧠</span>
                        Digital Marketing
                    </span>
                    <span
                        class="inline-flex items-center gap-2 rounded-full border border-white/40 bg-white/10 px-5 py-3 text-white whitespace-nowrap">

                        <span
                            class="inline-flex h-9 w-9 items-center justify-center rounded-full bg-white/20 text-white shadow-lg">🧠</span>
                        Business Optimization
                    </span>
                    <span
                        class="inline-flex items-center gap-2 rounded-full border border-white/40 bg-white/10 px-5 py-3 text-white whitespace-nowrap">

                        <span
                            class="inline-flex h-9 w-9 items-center justify-center rounded-full bg-white/20 text-white shadow-lg">🧠</span>
                        Training & Workshop
                    </span>
                </div>

            </div>
        </div>

        <div class="overflow-hidden flex justify-center max-w-xl mx-auto relative">
            <div class="absolute left-0 top-0 w-20 h-full bg-gradient-to-r from-[#1800AD] to-transparent z-10"></div>
            <div class="absolute right-0 top-0 w-20 h-full bg-gradient-to-l from-[#1800AD] to-transparent z-10"></div>

            <div class="flex w-max gap-5 animate-marqueeReverse">

                <div class="flex gap-5">
                    <span
                        class="inline-flex items-center gap-2 rounded-full border border-white/40 bg-white/10 px-5 py-3 text-white whitespace-nowrap">

                        <span
                            class="inline-flex h-9 w-9 items-center justify-center rounded-full bg-white/20 text-white shadow-lg">📊</span>
                        Strategi Bisnis
                    </span>
                    <span
                        class="inline-flex items-center gap-2 rounded-full border border-white/40 bg-white/10 px-5 py-3 text-white whitespace-nowrap">

                        <span
                            class="inline-flex h-9 w-9 items-center justify-center rounded-full bg-white/20 text-white shadow-lg">📱</span>
                        Sosial Media Management
                    </span>
                    <span
                        class="inline-flex items-center gap-2 rounded-full border border-white/40 bg-white/10 px-5 py-3 text-white whitespace-nowrap">

                        <span
                            class="inline-flex h-9 w-9 items-center justify-center rounded-full bg-white/20 text-white shadow-lg">✍️</span>
                        Content Creation
                    </span>
                    <span
                        class="inline-flex items-center gap-2 rounded-full border border-white/40 bg-white/10 px-5 py-3 text-white whitespace-nowrap">

                        <span
                            class="inline-flex h-9 w-9 items-center justify-center rounded-full bg-white/20 text-white shadow-lg">📈</span>
                        Digital Marketing
                    </span>
                    <span
                        class="inline-flex items-center gap-2 rounded-full border border-white/40 bg-white/10 px-5 py-3 text-white whitespace-nowrap">

                        <span
                            class="inline-flex h-9 w-9 items-center justify-center rounded-full bg-white/20 text-white shadow-lg">⚡</span>
                        Business Optimization
                    </span>
                    <span
                        class="inline-flex items-center gap-2 rounded-full border border-white/40 bg-white/10 px-5 py-3 text-white whitespace-nowrap">

                        <span
                            class="inline-flex h-9 w-9 items-center justify-center rounded-full bg-white/20 text-white shadow-lg">🎓</span>
                        Training & Workshop
                    </span>
                </div>

                <div class="flex gap-5">
                    <span
                        class="inline-flex items-center gap-2 rounded-full border border-white/40 bg-white/10 px-5 py-3 text-white whitespace-nowrap">

                        <span
                            class="inline-flex h-9 w-9 items-center justify-center rounded-full bg-white/20 text-white shadow-lg">📊</span>
                        Strategi Bisnis
                    </span>
                    <span
                        class="inline-flex items-center gap-2 rounded-full border border-white/40 bg-white/10 px-5 py-3 text-white whitespace-nowrap">

                        <span
                            class="inline-flex h-9 w-9 items-center justify-center rounded-full bg-white/20 text-white shadow-lg">📱</span>
                        Sosial Media Management
                    </span>
                    <span
                        class="inline-flex items-center gap-2 rounded-full border border-white/40 bg-white/10 px-5 py-3 text-white whitespace-nowrap">

                        <span
                            class="inline-flex h-9 w-9 items-center justify-center rounded-full bg-white/20 text-white shadow-lg">✍️</span>
                        Content Creation
                    </span>
                    <span
                        class="inline-flex items-center gap-2 rounded-full border border-white/40 bg-white/10 px-5 py-3 text-white whitespace-nowrap">

                        <span
                            class="inline-flex h-9 w-9 items-center justify-center rounded-full bg-white/20 text-white shadow-lg">📈</span>
                        Digital Marketing
                    </span>
                    <span
                        class="inline-flex items-center gap-2 rounded-full border border-white/40 bg-white/10 px-5 py-3 text-white whitespace-nowrap">

                        <span
                            class="inline-flex h-9 w-9 items-center justify-center rounded-full bg-white/20 text-white shadow-lg">⚡</span>
                        Business Optimization
                    </span>
                    <span
                        class="inline-flex items-center gap-2 rounded-full border border-white/40 bg-white/10 px-5 py-3 text-white whitespace-nowrap">

                        <span
                            class="inline-flex h-9 w-9 items-center justify-center rounded-full bg-white/20 text-white shadow-lg">🎓</span>
                        Training & Workshop
                    </span>
                </div>

            </div>
        </div>
    </div>

</section>
