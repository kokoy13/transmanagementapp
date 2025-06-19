<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Availability Zone</title>
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
    />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 mx-auto my-8 ">
    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">
        <div
        x-data="{ show: true }"
        x-show="show"
        x-init="setTimeout(() => show = false, 3000)"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 transform translate-y-2"
        x-transition:enter-end="opacity-100 transform translate-y-0"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100 transform translate-y-0"
        x-transition:leave-end="opacity-0 transform translate-y-2"
        class="fixed top-4 left-1/2 transform -translate-x-1/2 z-50 max-w-md w-full mx-4"
    >
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg shadow-lg flex items-center justify-between">
                <div class="flex items-center">
                    <svg class="w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                    </svg>
                    <span>{{ session('success') }}</span>
                </div>
                <button @click="show = false" class="ml-4 text-green-400 hover:text-green-600">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
        @elseif(session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg shadow-lg flex items-center justify-between">
                <div class="flex items-center">
                    <svg class="w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path>
                    </svg>
                    <span>{{ session('error') }}</span>
                </div>
                <button @click="show = false" class="ml-4 text-red-400 hover:text-red-600">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
        @endif
    </div>
    <!-- Main Content -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <nav class="flex items-center space-x-2 text-black/50 mb-5">
                <a href="/" class="hover:text-black! transition-colors duration-200">
                    <i class="fas fa-home mr-1"></i>Home
                </a>
                <i class="fas fa-chevron-right"></i>
                <span class="text-black font-medium">Availability Zone</span>
            </nav>
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 h-[calc(100vh-200px)] mb-8">

            <!-- Left Side - Search Form -->
            <div class="bg-white rounded-lg shadow-md p-6">
                <div class="mb-6">
                    <h2 class="text-xl font-semibold text-gray-800 mb-2">Search Location</h2>
                    <p class="text-gray-600 text-sm">Pilih kelurahan dan kecamatan anda untuk menemukan ketersediaan lokasi</p>
                </div>

                <form class="space-y-6" method="POST" action="{{ route('zone.checkzone') }}">
                    @csrf
                    <!-- Kecamatan Select -->
                    <div>
                        <label for="kecamatan" class="block text-sm font-medium text-gray-700 mb-2">
                            Kecamatans
                        </label>
                        <select
                            id="kecamatan"
                            name="kecamatan"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors bg-white"
                            required
                        >
                            <option value="">Pilih Kecamatan</option>
                            @foreach ($kecamatan as $kec)
                                <option value="{{ $kec['nama'] }}">{{ $kec['nama'] }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Kelurahan Select -->
                    <div>
                        <label for="kelurahan" class="block text-sm font-medium text-gray-700 mb-2">
                            Kelurahan
                        </label>
                        <select
                            id="kelurahan"
                            name="kelurahan"
                            class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors bg-white"
                            required
                        >
                            <option value="">Pilih Kelurahan</option>
                        </select>
                    </div>


                    <!-- Search Button -->
                    <div>
                        <button
                            type="submit"
                            class="w-full bg-blue-600 hover:cursor-pointer hover:bg-blue-700 text-white font-medium py-3 px-6 rounded-lg transition-colors focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"
                        >
                            Search Availability Zone
                        </button>
                    </div>
                </form>

                <!-- Additional Info -->
                <div class="mt-8 p-4 bg-blue-50 rounded-lg">
                    <h3 class="text-sm font-medium text-blue-800 mb-2">Tips Pencarian</h3>
                    <ul class="text-sm text-blue-700 space-y-1">
                        <li>• Pilih kecamatan sebelum memilih keluarahan</li>
                        <li>• Pilih kelurahan yang tepat agar akurat</li>
                        <li>• Semua zona berbasis di kota Padang</li>
                    </ul>
                </div>
            </div>

            <!-- Right Side - Map Area -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <div class="px-6 py-4 flex justify-center">
                    <h2 class="text-xl font-semibold text-gray-800">Availability Zone</h2>
                </div>
                <div id="map" class="h-full"></div>
            </div>
        </div>
        @if(session('success'))
            <div class="flex justify-center">
                        <button
                            type="button"
                            class="w-max bg-blue-600 hover:cursor-pointer hover:bg-blue-700 text-white font-medium py-3 px-12 rounded-lg transition-colors focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 text-lg"
                            onclick="window.location.href='/packets'"
                        >
                            Pesan Segera
                        </button>
        </div>
        @endif
    </main>

    <script id="kecamatan-data" type="application/json">
    {!! json_encode($kecamatan) !!}
    </script>
    <script src="{{ asset('js/map.js') }}"></script>
    <script src="{{ asset('js/cekZone.js') }}"></script>
</body>
</html>
