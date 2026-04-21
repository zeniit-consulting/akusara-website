<div class="hidden lg:flex">
    <aside class="w-64 bg-slate-900 text-slate-300 min-h-screen flex flex-col border-r border-slate-800">

        <!-- Logo -->
        <div class="h-16 flex items-center px-6 border-b border-slate-800">
            <h1 class="text-lg font-semibold text-white tracking-wide">
                🚀 AdminPanel
            </h1>
        </div>

        <!-- Menu -->
        <nav class="flex-1 p-4 space-y-1 text-sm">

            <!-- Dashboard -->
            <a href="{{ route('admin.dashboard') }}"
                class="flex items-center gap-3 px-4 py-2.5 rounded-lg transition-all duration-200 group
               {{ request()->routeIs('admin.dashboard') ? 'bg-slate-800 text-white' : 'hover:bg-slate-800/70 hover:text-white' }}">

                <!-- Icon -->
                <svg class="w-5 h-5 opacity-80 group-hover:opacity-100" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 10l9-7 9 7v11a1 1 0 01-1 1h-5v-6H9v6H4a1 1 0 01-1-1V10z" />
                </svg>

                <span>Dashboard</span>
            </a>

            <!-- Settings -->
            <a href="{{ route('admin.settings.index') }}"
                class="flex items-center gap-3 px-4 py-2.5 rounded-lg transition-all duration-200 group
               {{ request()->routeIs('admin.settings') ? 'bg-slate-800 text-white' : 'hover:bg-slate-800/70 hover:text-white' }}">

                <svg class="w-5 h-5 opacity-80 group-hover:opacity-100" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066
                        c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572
                        c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573
                        c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065
                        c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066
                        c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572
                        c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573
                        c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>

                <span>Settings</span>
            </a>

            <!-- Inquiries -->
            <a href="{{ route('admin.inquiries.index') }}"
                class="flex items-center justify-between px-4 py-2.5 rounded-lg transition-all duration-200 group
               {{ request()->is('admin.inquiries*') ? 'bg-slate-800 text-white' : 'hover:bg-slate-800/70 hover:text-white' }}">

                <div class="flex items-center gap-3">
                    <svg class="w-5 h-5 opacity-80 group-hover:opacity-100" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>

                    <span>Inquiries</span>
                </div>

                <!-- Badge -->
                <span class="text-xs bg-red-500 text-white px-2 py-0.5 rounded-full">
                    3
                </span>
            </a>

            <!-- Copywriting -->
            <div x-data="{ open: {{ request()->is('admin/copywriting*') ? 'true' : 'false' }} }">

                {{-- PARENT MENU --}}
                <button @click="open = !open"
                    class="flex items-center justify-between w-full gap-3 px-4 py-2.5 rounded-lg transition-all duration-200
        {{ request()->is('admin/copywriting*') ? 'bg-slate-800 text-white' : 'hover:bg-slate-800/70 hover:text-white' }}">

                    <div class="flex items-center gap-3">
                        <svg class="w-5 h-5 opacity-80" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z" />
                        </svg>

                        <span>Copywriting</span>
                    </div>

                    <svg class="w-4 h-4 transition-transform duration-200" :class="open ? 'rotate-180' : ''"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>

                {{-- CHILD MENU --}}
                <div x-show="open" x-transition class="ml-6 mt-2 space-y-1">

                    {{-- HERO --}}
                    <a href="{{ route('admin.hero.index') }}"
                        class="block px-4 py-2 rounded-lg text-sm transition
            {{ request()->is('admin/copywriting/hero*') ? 'bg-slate-700 text-white' : 'hover:bg-slate-700/60' }}">
                        Hero
                    </a>

                    {{-- ABOUT --}}
                    <a href="{{ route('admin.about.index') }}"
                        class="block px-4 py-2 rounded-lg text-sm transition
            {{ request()->is('admin/copywriting/about*') ? 'bg-slate-700 text-white' : 'hover:bg-slate-700/60' }}">
                        About
                    </a>

                    {{-- PORTFOLIO --}}
                    <a href="{{ route('admin.portfolio.index') }}"
                        class="block px-4 py-2 rounded-lg text-sm transition
            {{ request()->is('admin/copywriting/portfolio*') ? 'bg-slate-700 text-white' : 'hover:bg-slate-700/60' }}">
                        Portfolio
                    </a>

                    {{-- COMPANY PROFILE --}}
                    <a href="{{ route('admin.company-profile.index') }}"
                        class="block px-4 py-2 rounded-lg text-sm transition
            {{ request()->is('admin/copywriting/company-profile*') ? 'bg-slate-700 text-white' : 'hover:bg-slate-700/60' }}">
                        Company Profile
                    </a>

                    {{-- Featured Services --}}
                    <a href="{{ route('admin.featured-services.index') }}"
                        class="block px-4 py-2 rounded-lg text-sm transition
            {{ request()->is('admin/copywriting/featured-services*') ? 'bg-slate-700 text-white' : 'hover:bg-slate-700/60' }}">
                        Featured Services
                    </a>

                </div>
            </div>

        </nav>


    </aside>
</div>
