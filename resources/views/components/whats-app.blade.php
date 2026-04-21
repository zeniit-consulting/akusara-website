<!-- Floating WhatsApp Button -->
@if($setting->phone ?? false)
<a href="https://wa.me/{{ $setting->phone }}?text={{ urlencode('Hai Akusara, saya ingin mengetahui lebih lanjut tentang layanan Branding') }}" 
   target="_blank"
   class="fixed bottom-5 right-5 bg-green-500 hover:bg-green-600 text-white px-5 py-3 rounded-full shadow-lg z-50 flex items-center gap-2
          transition-all duration-300 hover:scale-110 animate-bounce shadow-green-400/50">

    <i class="fab fa-whatsapp text-xl"></i>
    <span class="font-medium">WhatsApp</span>
</a>
@endif