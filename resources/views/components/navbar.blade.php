<nav id="siteNavbar" x-data="{ open: false }"
    class="fixed top-0 w-full z-50 bg-[#1800AD] border border-[#1800AD] backdrop-blur-lg h-20 transition-all duration-300 ease-out">
    <div class="max-w-7xl mx-auto flex items-center justify-between h-full px-4 relative">

        <!-- Logo -->
        <a href="#home" class="inline-flex items-center gap-3">
            <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-8 md:h-10 lg:h-12 w-auto object-contain">
        </a>

        <!-- Desktop Menu -->
        <div class="hidden md:flex items-center text-sm md:text-base gap-10">
            <a href="#home" class="text-white hover:text-blue-100 transition font-medium nav-link">Home</a>
            <a href="#about" class="text-white hover:text-blue-100 transition font-medium nav-link">About</a>
            <a href="#services" class="text-white hover:text-blue-100 transition font-medium nav-link">Services</a>
            <a href="#portfolio" class="text-white hover:text-blue-100 transition font-medium nav-link">Portfolio</a>
            <a href="#company-profile" class="text-white hover:text-blue-100 transition font-medium nav-link">Company
                Profile</a>
            <a href="#contact" class="text-white hover:text-blue-100 transition font-medium nav-link">Contact</a>
        </div>

        <!-- Mobile Toggle -->
        <button @click="open = !open" type="button"
            class="md:hidden inline-flex items-center justify-center p-2 rounded-full border border-white/20 bg-white/10 text-white hover:bg-white/15 focus:outline-none focus:ring-2 focus:ring-white/50 transition">
            <span class="sr-only">Toggle navigation</span>
            <svg x-show="!open" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
            <svg x-show="open" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>

        <!-- Mobile Menu -->
        <div x-show="open" @click.outside="open = false"
            class="md:hidden absolute inset-x-4 top-full mt-3 rounded-3xl bg-[#1800AD]/95 border border-white/15 backdrop-blur-xl p-4 shadow-2xl transition-all duration-300"
            x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0 transform -translate-y-2"
            x-transition:enter-end="opacity-100 transform translate-y-0"
            x-transition:leave="transition ease-in duration-150"
            x-transition:leave-start="opacity-100 transform translate-y-0"
            x-transition:leave-end="opacity-0 transform -translate-y-2">
            <div class="flex flex-col gap-3">
                <a href="#home"
                    class="block rounded-2xl px-4 py-3 text-white hover:bg-white/10 transition font-medium nav-link">Home</a>
                <a href="#about"
                    class="block rounded-2xl px-4 py-3 text-white hover:bg-white/10 transition font-medium nav-link">About</a>
                <a href="#services"
                    class="block rounded-2xl px-4 py-3 text-white hover:bg-white/10 transition font-medium nav-link">Services</a>
                <a href="#portfolio"
                    class="block rounded-2xl px-4 py-3 text-white hover:bg-white/10 transition font-medium nav-link">Portfolio</a>
                <a href="#company-profile"
                    class="block rounded-2xl px-4 py-3 text-white hover:bg-white/10 transition font-medium nav-link">Company
                    Profile</a>
                <a href="#contact"
                    class="block rounded-2xl px-4 py-3 text-white hover:bg-white/10 transition font-medium nav-link">Contact</a>
            </div>
        </div>

    </div>
</nav>
