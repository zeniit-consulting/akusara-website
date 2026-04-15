<section id="portfolio" class="scroll-mt-10 py-20 px-6 bg-[#ffffff] ">

    <!-- Title -->
    <div class="text-center mb-12">
        <h2 class="text-3xl font-bold text-slate-900">
            Our <span class="text-[#1800AD]">Portfolio</span>
        </h2>
    </div>

    <!-- Video Grid -->
    <div class="max-w-6xl mx-auto grid md:grid-cols-2 gap-6">

        <!-- Video 1 -->
        <div class="relative group cursor-pointer" onclick="openVideoModal('https://www.youtube.com/embed/1w4vmlKGe3I')">
            <img src="https://picsum.photos/800/450?random=1" alt="Corporate Event Video"
                class="rounded-2xl w-full object-cover h-64 transition-transform group-hover:scale-105">

            <!-- Play Button -->
            <div class="absolute inset-0 flex items-center justify-center">
                <div
                    class="bg-red-600/80 backdrop-blur p-4 rounded-full group-hover:scale-110 transition-all duration-300 shadow-lg">
                    <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M8 5v10l8-5-8-5z" />
                    </svg>
                </div>
            </div>

            <!-- Video Info Overlay -->
            <div
                class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/80 to-transparent p-4 rounded-b-2xl">
                <h3 class="text-white font-semibold">Corporate Event Launch</h3>
                <p class="text-gray-300 text-sm">Full event coverage & live streaming</p>
            </div>
        </div>

        <!-- Video 2 -->
        <div class="relative group cursor-pointer"
            onclick="openVideoModal('https://www.youtube.com/embed/dQw4w9WgXcQ')">
            <img src="https://picsum.photos/800/450?random=2" alt="Product Launch Video"
                class="rounded-2xl w-full object-cover h-64 transition-transform group-hover:scale-105">

            <div class="absolute inset-0 flex items-center justify-center">
                <div
                    class="bg-red-600/80 backdrop-blur p-4 rounded-full group-hover:scale-110 transition-all duration-300 shadow-lg">
                    <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M8 5v10l8-5-8-5z" />
                    </svg>
                </div>
            </div>

            <!-- Video Info Overlay -->
            <div
                class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/80 to-transparent p-4 rounded-b-2xl">
                <h3 class="text-white font-semibold">Product Launch Campaign</h3>
                <p class="text-gray-300 text-sm">Brand storytelling & visual effects</p>
            </div>
        </div>

        <!-- Video 3 -->
        <div class="relative group cursor-pointer"
            onclick="openVideoModal('https://www.youtube.com/embed/jNQXAC9IVRw')">
            <img src="https://picsum.photos/800/450?random=3" alt="Concert Event Video"
                class="rounded-2xl w-full object-cover h-64 transition-transform group-hover:scale-105">

            <div class="absolute inset-0 flex items-center justify-center">
                <div
                    class="bg-red-600/80 backdrop-blur p-4 rounded-full group-hover:scale-110 transition-all duration-300 shadow-lg">
                    <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M8 5v10l8-5-8-5z" />
                    </svg>
                </div>
            </div>

            <!-- Video Info Overlay -->
            <div
                class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/80 to-transparent p-4 rounded-b-2xl">
                <h3 class="text-white font-semibold">Music Concert Production</h3>
                <p class="text-gray-300 text-sm">Live performance & stage visuals</p>
            </div>
        </div>

        <!-- Video 4 -->
        <div class="relative group cursor-pointer"
            onclick="openVideoModal('https://www.youtube.com/embed/kJQP7kiw5Fk')">
            <img src="https://picsum.photos/800/450?random=4" alt="Wedding Video"
                class="rounded-2xl w-full object-cover h-64 transition-transform group-hover:scale-105">

            <div class="absolute inset-0 flex items-center justify-center">
                <div
                    class="bg-red-600/80 backdrop-blur p-4 rounded-full group-hover:scale-110 transition-all duration-300 shadow-lg">
                    <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M8 5v10l8-5-8-5z" />
                    </svg>
                </div>
            </div>

            <!-- Video Info Overlay -->
            <div
                class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/80 to-transparent p-4 rounded-b-2xl">
                <h3 class="text-white font-semibold">Wedding Celebration</h3>
                <p class="text-gray-300 text-sm">Emotional storytelling & cinematography</p>
            </div>
        </div>

    </div>

    <!-- Video Modal -->
    <div id="videoModal" class="fixed inset-0 bg-black/90 hidden z-50 flex items-center justify-center p-4">
        <div class="relative w-full max-w-4xl aspect-video bg-black rounded-lg overflow-hidden shadow-2xl">
            <button onclick="closeVideoModal()"
                class="absolute top-4 right-4 text-white bg-black/50 rounded-full p-2 hover:bg-black/70 transition z-10">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                    </path>
                </svg>
            </button>
            <iframe id="videoFrame" class="w-full h-full" src="" frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                allowfullscreen></iframe>
        </div>
    </div>

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
