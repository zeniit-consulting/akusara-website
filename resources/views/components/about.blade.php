<section id="about" class="scroll-mt-20 py-20 px-6 bg-white">
    <div class="max-w-6xl mx-auto grid md:grid-cols-2 gap-10 items-center">

        <!-- TEXT -->
        <div data-aos="fade-right" data-aos-duration="900" data-aos-delay="100">

            @php
                $text = ucwords(strtolower($about->about_title ?? 'About Us'));
                $words = explode(' ', $text);
                $last = array_pop($words);
            @endphp

            <h2 class="text-3xl md:text-4xl font-bold mb-4  text-gray-800" data-aos="fade-up" data-aos-duration="900"
                data-aos-delay="150">

                <span>{{ implode(' ', $words) }}</span>
                <span class="text-[#1800AD]"> {{ $last }}</span>

            </h2>

            <p class="text-slate-600 leading-relaxed" data-aos="fade-up" data-aos-duration="900" data-aos-delay="250">
                {{ ucfirst(strtolower($about->about_description ?? 'Default description goes here. You can update this content from the settings page.')) }}
            </p>
        </div>

        <!-- IMAGE / VISUAL -->
        <div class="rounded-2xl overflow-hidden shadow-xl" data-aos="fade-left" data-aos-duration="900"
            data-aos-delay="200">

            <img src="{{ !empty($about?->about_image) ? asset('storage/' . $about->about_image) : asset('images/about-img.png') }}"
                alt="About Look Creative" class="w-full h-64 md:h-80 object-cover">
        </div>
    </div>
</section>
