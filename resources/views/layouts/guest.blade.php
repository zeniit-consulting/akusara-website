<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>AkusaraLab</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">
</head>

<body class="bg-black text-white scroll-smooth font-sans">

    {{ $slot }}

    <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>

    <script>
        AOS.init({
            duration: 1000, // durasi animasi
            once: true // animasi hanya sekali
        });
    </script>
</body>

</html>
