<section id="portfolio" class="scroll-mt-10 py-20 px-6 bg-white">

    <!-- Title -->
    <div class="text-center mb-12">
        <h2 class="text-3xl font-bold text-slate-900">
            Our Portfolio
        </h2>
    </div>

    <div class="max-w-7xl mx-auto">
        @if ($portfolios->count() > 0)

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">

                @foreach ($portfolios as $item)
                    <div class="group bg-white rounded-2xl overflow-hidden border border-slate-100 shadow-sm hover:shadow-md transition-shadow duration-300
                     {{ $loop->index % 2 == 0 ? 'animate-floatUp' : 'animate-floatDown' }}"
                        style="animation-delay: {{ $loop->index * 0.3 }}s">

                        <!-- Image -->
                        <div class="relative overflow-hidden">
                            <img src="{{ $item->portfolio_image
                                ? (Str::startsWith($item->portfolio_image, ['http://', 'https://'])
                                    ? $item->portfolio_image
                                    : asset('storage/' . $item->portfolio_image))
                                : 'https://images.unsplash.com/photo-1498050108023-c5249f4df085?auto=format&fit=crop&w=800&q=80' }}"
                                class="w-full h-44 object-cover">
                        </div>

                        <!-- Content -->
                        <div class="p-5 flex flex-col gap-3">

                            <div class="flex items-center justify-between">
                                <h3 class="font-semibold text-slate-900 text-lg">
                                    {{ Str::limit($item->portfolio_title, 50) }}
                                </h3>

                                <a href="{{ route('portfolio.show', $item->slug) }}"
                                    class="text-sm text-green-600 font-medium flex items-center gap-1 group-hover:gap-2 transition-all">
                                    View
                                    <span class="transition-transform group-hover:translate-x-1">→</span>
                                </a>
                            </div>

                            <p class="text-sm text-slate-700">
                                {{ Str::limit($item->portfolio_description, 100) }}
                            </p>


                        </div>

                    </div>
                @endforeach
            @else
                <p class="text-center text-slate-500">No portfolio items found.</p>
        @endif
    </div>


    </div>
</section>
