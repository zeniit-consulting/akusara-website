<footer class="bg-slate-900 text-white py-16 px-6">
    <div class="max-w-6xl mx-auto">

        <!-- MAIN FOOTER CONTENT -->
        <div class="grid md:grid-cols-4 gap-8 mb-8">

            <!-- BRAND & DESCRIPTION -->
            <div class="md:col-span-1">
                <div class="mb-4">
                    <img src="{{ asset('images/logo.png') }}" alt="Look Creative Logo" class="h-8 w-auto mb-2">
                </div>
                <p class="text-slate-300 text-sm leading-relaxed">
                    Dibawah naungan CV. Multimedia Anak Bangsa memposisikan diri aktif dalam industri Event & MICE
                    (Meetings, Incentives, Conventions and Exhibitions).
                </p>
            </div>

            <!-- SERVICES -->
            <div>
                <h4 class="text-lg font-semibold text-white mb-4">Services</h4>
                <ul class="space-y-2 text-slate-300 text-sm">
                    <li><a href="#" class="hover:text-sky-400 transition">Live Event Production</a></li>
                    <li><a href="#" class="hover:text-sky-400 transition">Virtual & Hybrid Events</a></li>
                    <li><a href="#" class="hover:text-sky-400 transition">MICE Solutions</a></li>
                    <li><a href="#" class="hover:text-sky-400 transition">Creative Design</a></li>
                    <li><a href="#" class="hover:text-sky-400 transition">Digital Solutions</a></li>
                </ul>
            </div>

            <!-- COMPANY -->
            <div>
                <h4 class="text-lg font-semibold text-white mb-4">Company</h4>
                <ul class="space-y-2 text-slate-300 text-sm">
                    <li><a href="#about" class="hover:text-sky-400 transition">About Us</a></li>
                    <li><a href="#portfolio" class="hover:text-sky-400 transition">Portfolio</a></li>
                    <li><a href="#company-profile" class="hover:text-sky-400 transition">Company Profile</a></li>
                    <li><a href="#contact" class="hover:text-sky-400 transition">Contact</a></li>
                </ul>
            </div>

            <!-- CONTACT INFO -->
            <div>
                <h4 class="text-lg font-semibold text-white mb-4">Contact Info</h4>
                <div class="text-slate-300 text-sm space-y-2">
                    <p>{{ $setting->address }}</p>
                    <p class="text-sky-400 font-medium">{{ $setting->phone }}</p>
                    
                </div>
            </div>

        </div>

        <!-- BOTTOM BAR -->
        <div class="border-t border-slate-700 pt-8">
            <div class="flex flex-col md:flex-row justify-between items-center gap-4">
                <p class="text-slate-400 text-sm">
                    © 2026 Look Creative 
                </p>
                <p class="text-sky-400 text-sm font-medium">
                    Professional Event Organizer & MICE Solutions Surakarta
                </p>
            </div>
        </div>

    </div>
</footer>
