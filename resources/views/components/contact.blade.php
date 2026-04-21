<section id="contact" class="scroll-mt-20 py-20 bg-[#1800AD] px-6">

    <div class="max-w-6xl mx-auto text-center mb-16">
        <h2 class="text-5xl font-bold text-white mb-4">Let's Create Together</h2>
        <p class="text-xl text-slate-200 max-w-2xl mx-auto">Ready to bring your vision to life? Let's collaborate and
            create something amazing together.</p>
    </div>

    <div class="max-w-6xl mx-auto grid md:grid-cols-2 gap-10">

        <!-- LEFT INFO -->
        <div>
            <div class="space-y-2 text-slate-300">
                <div class="grid gap-3">
                    <div
                        class="flex items-start gap-4 p-4 rounded-2xl bg-white/5 border border-white/10 backdrop-blur-sm">

                        <!-- ICON -->
                        <div
                            class="flex-shrink-0 flex items-center justify-center w-12 h-12 rounded-xl bg-white text-[#1800AD] shadow-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                            </svg>

                        </div>

                        <!-- TEXT -->
                        <div class="flex-1">
                            <h3 class="text-base font-semibold text-white leading-tight">
                                Bali Office
                            </h3>

                            <p class="text-sm text-slate-300 leading-relaxed mt-1">
                                {{ $setting->address ?? '-' }}
                            </p>
                        </div>

                    </div>




                    <div class="space-y-4">

                        <!-- PHONE -->
                        <div
                            class="flex items-start gap-4 p-4 rounded-2xl bg-white/5 border border-white/10 backdrop-blur-sm hover:bg-white/10 transition">
                            <div
                                class="flex-shrink-0 flex items-center justify-center w-12 h-12 rounded-xl bg-white text-[#1800AD] shadow-sm">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 0 1-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.970c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 0 0-1.091-.852H4.5A2.25 2.25 0 0 0 2.25 4.5v2.25Z" />
                                </svg>
                            </div>

                            <div class="flex-1">
                                <h3 class="text-base font-semibold text-white leading-tight">
                                    Phone
                                </h3>

                                <p class="text-sm text-slate-300 leading-relaxed mt-1">
                                    {{ $setting->phone ?? '-' }}
                                </p>
                            </div>
                        </div>



                        <!-- EMAIL -->
                        <div
                            class="flex items-start gap-4 p-4 rounded-2xl bg-white/5 border border-white/10 backdrop-blur-sm hover:bg-white/10 transition">
                            <div
                                class="flex-shrink-0 flex items-center justify-center w-12 h-12 rounded-xl bg-white text-[#1800AD] shadow-sm">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
                                </svg>

                            </div>

                            <div class="flex-1">
                                <h3 class="text-base font-semibold text-white leading-tight">
                                    Email
                                </h3>

                                <p class="text-sm text-slate-300 leading-relaxed mt-1">
                                    {{ $setting->email ?? '-' }}
                                </p>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="pt-6">
                    <h3 class="text-lg font-semibold text-white mb-4">Follow Us</h3>
                    <div class="flex flex-wrap gap-3">

    @if ($setting->tiktok ?? false)
        <a href="{{ $setting->tiktok }}" target="_blank" rel="noopener noreferrer"
            aria-label="TikTok"
            class="inline-flex items-center justify-center w-12 h-12 rounded-2xl 
                   bg-white border border-slate-200 text-[#1800AD]
                   transition-all duration-300 
                   hover:bg-[#1800AD] hover:text-white hover:scale-105 hover:shadow-lg">

            <svg viewBox="0 0 24 24" class="w-5 h-5 fill-current">
                <path d="M12.75 2h2.25c.36 2.02 1.74 3.66 3.75 4.13v2.31a7.74 7.74 0 01-3.75-1.06v6.83a5.5 5.5 0 11-5.5-5.5c.29 0 .57.02.84.07v2.27a3.25 3.25 0 102.41 3.16V2z"/>
            </svg>
        </a>
    @endif

    @if ($setting->instagram ?? false)
        <a href="{{ $setting->instagram }}" target="_blank" rel="noopener noreferrer"
            aria-label="Instagram"
            class="inline-flex items-center justify-center w-12 h-12 rounded-2xl 
                   bg-white border border-slate-200 text-[#1800AD]
                   transition-all duration-300 
                   hover:bg-[#1800AD] hover:text-white hover:scale-105 hover:shadow-lg">

            <svg viewBox="0 0 24 24" class="w-5 h-5 fill-current">
                <path d="M7.75 2C4.57 2 2 4.57 2 7.75v8.5C2 19.43 4.57 22 7.75 22h8.5C19.43 22 22 19.43 22 16.25v-8.5C22 4.57 19.43 2 16.25 2h-8.5zm0 2h8.5C18.55 4 20 5.45 20 7.75v8.5C20 18.55 18.55 20 16.25 20h-8.5C5.45 20 4 18.55 4 16.25v-8.5C4 5.45 5.45 4 7.75 4zm8.75 1.5a1.25 1.25 0 110 2.5 1.25 1.25 0 010-2.5zM12 7a5 5 0 100 10 5 5 0 000-10zm0 2a3 3 0 110 6 3 3 0 010-6z"/>
            </svg>
        </a>
    @endif

    @if ($setting->linkedin ?? false)
        <a href="{{ $setting->linkedin }}" target="_blank" rel="noopener noreferrer"
            aria-label="LinkedIn"
            class="inline-flex items-center justify-center w-12 h-12 rounded-2xl 
                   bg-white border border-slate-200 text-[#1800AD]
                   transition-all duration-300 
                   hover:bg-[#1800AD] hover:text-white hover:scale-105 hover:shadow-lg">

            <svg viewBox="0 0 24 24" class="w-5 h-5 fill-current">
                <path d="M20.45 20.45h-3.24v-5.57c0-1.33-.02-3.03-1.85-3.03-1.85 0-2.13 1.44-2.13 2.94v5.66H9.09V9h3.11v1.56h.04c.43-.82 1.49-1.69 3.07-1.69 3.29 0 3.9 2.17 3.9 4.98v6.6zM5.34 7.43a1.8 1.8 0 110-3.6 1.8 1.8 0 010 3.6zM6.88 20.45H3.8V9h3.08v11.45z"/>
            </svg>
        </a>
    @endif

</div>
                </div>

            </div>
        </div>

        <!-- RIGHT FORM -->
        <div class="rounded-[40px] bg-white border border-slate-200 p-8 shadow-xl">
            <h3 class="text-3xl font-bold text-slate-900 mb-8">Start Your Project</h3>



            <form action="{{ route('contact.store') }}" method="POST" class="space-y-6">
                @csrf

                <div class="grid gap-4 md:grid-cols-1">
                    {{-- Full Name --}}
                    <label class="block text-sm text-slate-700">
                        Full Name
                        <input type="text" name="name" value="{{ old('name') }}" placeholder="Your name"
                            required
                            class="mt-2 w-full rounded-3xl border border-slate-300 px-4 py-3 text-slate-900 outline-none transition focus:border-[#1800AD] focus:ring-2 focus:ring-[#1800AD]/30" />
                        @error('name')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </label>

                </div>

                <div class="grid gap-4 md:grid-cols-1">
                    {{-- Email --}}
                    <label class="block text-sm text-slate-700">
                        Email
                        <input type="email" name="email" value="{{ old('email') }}" placeholder="your@email.com"
                            required
                            class="mt-2 w-full rounded-3xl border border-slate-300 px-4 py-3 text-slate-900 outline-none transition focus:border-[#1800AD] focus:ring-2 focus:ring-[#1800AD]/30" />
                        @error('email')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </label>

                </div>


                <div class="grid gap-4 md:grid-cols-1">
                    {{-- Phone --}}
                    <label class="block text-sm text-slate-700">
                        Phone
                        <input type="text" name="phone" value="{{ old('phone') }}" required
                            placeholder="+62 xxx xxx xxx"
                            class="mt-2 w-full rounded-3xl border border-slate-300 px-4 py-3 text-slate-900 outline-none transition focus:border-[#1800AD] focus:ring-2 focus:ring-[#1800AD]/30" />
                    </label>

                </div>




                {{-- Message --}}
                <label class="block text-sm text-slate-700">
                    Project Details
                    <textarea name="message" rows="5" placeholder="Tell us about your event vision, goals, and requirements..."
                        required
                        class="mt-2 w-full rounded-3xl border border-slate-300 px-4 py-4 text-slate-900 outline-none transition focus:border-[#1800AD] focus:ring-2 focus:ring-[#1800AD]/30 resize-none">{{ old('message') }}</textarea>
                    @error('message')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </label>

                {{-- Submit --}}
                <button type="submit"
                    class="w-full rounded-3xl bg-[#1800AD] text-white py-4 font-semibold shadow-lg hover:bg-[#120085] transition">
                    Send Message
                </button>
            </form>
        </div>

    </div>

</section>
