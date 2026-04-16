<section id="home"
    class="relative h-screen overflow-hidden flex flex-col justify-center items-center text-center px-6 text-white"
    style="background-image: linear-gradient(180deg, rgba(24,0,173,0.85) 0%, rgba(18,0,133,0.85) 50%, rgba(5,1,34,0.7) 100%), url('{{ asset('storage/' . $setting->hero_image) }}'); background-size: cover; background-position: center;">
    <div class="absolute inset-0 bg-[radial-gradient(circle_at_top,_rgba(255,255,255,0.16),_transparent_28%)]"></div>
    <div class="absolute inset-0 bg-slate-950/40"></div>

    <div class="relative z-10 max-w-3xl px-4 py-10 text-center">
        <h1 class="text-5xl md:text-6xl font-extrabold mb-4 text-white" data-aos="fade-up" data-aos-duration="900">
            {{ $setting->hero_title ?? 'Unforgettable Experiences' }}
        </h1>

        <p class="text-slate-200 max-w-xl mx-auto mb-8 text-lg md:text-xl leading-relaxed" data-aos="fade-up"
            data-aos-duration="900" data-aos-delay="150">
            {{ $setting->hero_description ?? 'Discover the best experiences with our expert guidance.' }}
        </p>

        <a href="#contact"
            class="inline-flex items-center justify-center rounded-full bg-white px-8 py-3 text-[#1800AD] font-semibold shadow-xl shadow-sky-500/20 transition hover:bg-slate-100 hover:text-[#120085]"
            data-aos="fade-up" data-aos-duration="900" data-aos-delay="300">
            Konsultasi Gratis
        </a>
    </div>
</section>
