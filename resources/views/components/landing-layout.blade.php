@props(['title' => config('app.name', 'Laravel')])

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title }}</title>
    <meta name="description"
        content="Look Creative landing page for event management, multimedia production, portfolio showcase, and contact inquiry.">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;500;700&family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.4/dist/aos.css" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body
    class="bg-[#09090f] font-['Poppins',sans-serif] text-white antialiased selection:bg-violet-500/30 selection:text-white">
    <div class="relative isolate overflow-hidden bg-[#09090f]">
        <div
            class="pointer-events-none absolute inset-x-0 top-0 -z-10 h-[42rem] bg-[radial-gradient(circle_at_top_right,_rgba(139,92,246,0.32),_transparent_38%),radial-gradient(circle_at_top_left,_rgba(76,29,149,0.25),_transparent_35%),linear-gradient(180deg,_rgba(11,11,19,0.96),_rgba(9,9,15,1))]">
        </div>
        <div
            class="pointer-events-none absolute inset-x-0 top-[24rem] -z-10 h-[48rem] bg-[radial-gradient(circle_at_center,_rgba(109,40,217,0.14),_transparent_44%)] blur-3xl">
        </div>
        {{ $slot }}
    </div>
    <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            if (window.AOS) {
                AOS.init({
                    once: true,
                    offset: 120,
                    easing: 'ease-out-cubic',
                    duration: 800,
                });
            }
        });
    </script>

    {{-- SweetAlert --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.onmouseenter = Swal.stopTimer
                toast.onmouseleave = Swal.resumeTimer
            }
        });
    </script>

    {{-- SUCCESS --}}
    @if (session('success'))
        <script>
            Toast.fire({
                icon: 'success',
                title: @json(session('success')),
                timer: 2500
            });
        </script>
    @endif

    {{-- ERROR --}}
    @if (session('error'))
        <script>
            Toast.fire({
                icon: 'error',
                title: @json(session('error')),
                timer: 3000
            });
        </script>
    @endif
</body>

</html>
