@props(['title' => 'Transnet Sumbar'])

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="theme-color" content="#000000" />
    <link rel="shortcut icon" href="./assets/img/favicon.ico" />
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
    />
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/gh/creativetimofficial/tailwind-starter-kit/compiled-tailwind.min.css"
    />
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
        .card-gradient {
            background: linear-gradient(135deg, #294a9c, #4465d1);
        }
        .section-header {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        .section-header::before {
            content: '';
            display: block;
            width: 24px;
            height: 24px;
            border-radius: 50%;
        }
        .near-protocol::before {
            background-color: #294a9c;
        }
        .scroll-container {
            scroll-behavior: smooth;
            -ms-overflow-style: none;  /* IE and Edge */
            scrollbar-width: none;  /* Firefox */
        }
        .scroll-container::-webkit-scrollbar {
            display: none; /* Chrome, Safari, Opera */
        }
        [x-cloak] {
            display: none !important;
        }
    </style>
    <title>{{ $title}}</title>
</head>
<body class="text-gray-800 antialiased">
    <x-header2/>
        {{ $slot }}
    <x-footer></x-footer>
    <script src="{{ asset('js/check-order.js') }}"></script>
</body>
</html>
