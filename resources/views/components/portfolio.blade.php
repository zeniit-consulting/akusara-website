<section id="portfolio" class="scroll-mt-10 py-20 px-6 bg-[#ffffff] ">

    <!-- Title -->
    <div class="text-center mb-12">
        <h2 class="text-3xl font-bold text-slate-900">
            Our <span class="text-[#1800AD]">Portfolio</span>
        </h2>
    </div>


  
    <div class="max-w-7xl mx-auto px-6">

        

        <!-- Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">

            <!-- CARD 1 -->
            <div class="group bg-white rounded-2xl overflow-hidden shadow-sm border border-slate-100">
                <div class="relative overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1498050108023-c5249f4df085?auto=format&fit=crop&w=800&q=80"
                         class="w-full h-44 object-cover group-hover:scale-105 transition duration-500">

                    <span class="absolute top-3 left-3 bg-black/70 text-white text-xs px-3 py-1 rounded-full">
                        Web Design
                    </span>
                </div>

                <div class="p-5">
                    <h3 class="font-semibold text-slate-900 text-lg">Project One</h3>
                    <p class="text-slate-500 text-sm mt-2">
                        Modern landing page with clean UI and conversion focus.
                    </p>

                    <div class="mt-4 flex items-center justify-between">
                        <span class="text-xs text-slate-400">2026</span>
                        <span class="text-sm text-green-600 font-medium">View →</span>
                    </div>
                </div>
            </div>

            <!-- CARD 2 -->
            <div class="group bg-white rounded-2xl overflow-hidden shadow-sm border border-slate-100">
                <div class="relative overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1521737604893-d14cc237f11d?auto=format&fit=crop&w=800&q=80"
                         class="w-full h-44 object-cover group-hover:scale-105 transition duration-500">

                    <span class="absolute top-3 left-3 bg-black/70 text-white text-xs px-3 py-1 rounded-full">
                        Company
                    </span>
                </div>

                <div class="p-5">
                    <h3 class="font-semibold text-slate-900 text-lg">Project Two</h3>
                    <p class="text-slate-500 text-sm mt-2">
                        Corporate website with modern branding system.
                    </p>

                    <div class="mt-4 flex items-center justify-between">
                        <span class="text-xs text-slate-400">2026</span>
                        <span class="text-sm text-green-600 font-medium">View →</span>
                    </div>
                </div>
            </div>

            <!-- CARD 3 -->
            <div class="group bg-white rounded-2xl overflow-hidden shadow-sm border border-slate-100">
                <div class="relative overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1551288049-bebda4e38f71?auto=format&fit=crop&w=800&q=80"
                         class="w-full h-44 object-cover group-hover:scale-105 transition duration-500">

                    <span class="absolute top-3 left-3 bg-black/70 text-white text-xs px-3 py-1 rounded-full">
                        Dashboard
                    </span>
                </div>

                <div class="p-5">
                    <h3 class="font-semibold text-slate-900 text-lg">Project Three</h3>
                    <p class="text-slate-500 text-sm mt-2">
                        Admin dashboard UI with analytics system.
                    </p>

                    <div class="mt-4 flex items-center justify-between">
                        <span class="text-xs text-slate-400">2026</span>
                        <span class="text-sm text-green-600 font-medium">View →</span>
                    </div>
                </div>
            </div>

            <!-- CARD 4 -->
            <div class="group bg-white rounded-2xl overflow-hidden shadow-sm border border-slate-100">
                <div class="relative overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1523275335684-37898b6baf30?auto=format&fit=crop&w=800&q=80"
                         class="w-full h-44 object-cover group-hover:scale-105 transition duration-500">

                    <span class="absolute top-3 left-3 bg-black/70 text-white text-xs px-3 py-1 rounded-full">
                        E-Commerce
                    </span>
                </div>

                <div class="p-5">
                    <h3 class="font-semibold text-slate-900 text-lg">Project Four</h3>
                    <p class="text-slate-500 text-sm mt-2">
                        Full e-commerce website with payment integration.
                    </p>

                    <div class="mt-4 flex items-center justify-between">
                        <span class="text-xs text-slate-400">2026</span>
                        <span class="text-sm text-green-600 font-medium">View →</span>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>




    <script>
        function openVideoModal(videoUrl) {
            document.getElementById('videoFrame').src = videoUrl + '?autoplay=1';
            document.getElementById('videoModal').classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }

        function closeVideoModal() {
            document.getElementById('videoModal').classList.add('hidden');
            document.getElementById('videoFrame').src = '';
            document.body.style.overflow = 'auto';
        }

        // Close modal when clicking outside
        document.getElementById('videoModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeVideoModal();
            }
        });

        // Close modal with ESC key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closeVideoModal();
            }
        });
    </script>

</section>
