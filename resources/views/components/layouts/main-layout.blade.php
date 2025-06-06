@props(['title' => 'Transnet Sumbar'])

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="theme-color" content="#000000" />
    <link rel="icon" href="{{ asset('assets/img/favicon.ico') }}" />

    {{-- Fonts and Styles --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="..." crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/creativetimofficial/tailwind-starter-kit/compiled-tailwind.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    {{-- Vite --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            font-family: 'Inter', sans-serif;
        }

        .pricing-card:hover .speed-badge {
            transform: scale(1.05);
        }

        .speed-badge {
            transition: transform 0.3s ease;
        }

        .gradient-bg {
            background: linear-gradient(135deg, #4338ca, #3b82f6);
        }
        [x-cloak] {
            display: none !important;
        }
    </style>

    <title>{{ $title }}</title>
</head>
<body class="text-gray-800 antialiased">

    {{-- Header --}}
    <x-header />

    {{-- Content --}}
    {{ $slot }}

    {{-- Footer --}}
    <x-footer />

    {{-- Scripts --}}
    <script defer src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>

    @stack('scripts')
</body>
</html>
