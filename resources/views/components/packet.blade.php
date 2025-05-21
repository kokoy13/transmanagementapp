@props(['packets'])

<div class="max-w-7xl mx-auto">
    <div class="text-center mb-16 pt-20">
        <h1 data-aos="fade-left" class="text-4xl font-extrabold text-gray-900 sm:text-5xl sm:tracking-tight lg:text-6xl">Choose Your <span class="text-indigo-600">Internet Plan</span></h1>
        <p data-aos="fade-right" class="mt-5 max-w-xl mx-auto text-xl text-gray-900">Internet fiber optik berkecepatan tinggi untuk kebutuhan rumah dan bisnis Anda.</p>
    </div>
    <div class="grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-3 relative z-40">
        @foreach ($packets as $packet)
        <div data-aos='fade-up' class="pricing-card bg-white rounded-2xl shadow-xl overflow-hidden transition-all duration-300 hover:shadow-2xl hover:-translate-y-1 border border-gray-100">
            <div class="gradient-bg px-6 py-8 text-white relative">
                <div class="absolute top-0 right-0 mt-4 mr-4">
                    @if ($packet->name == 'Family' && $packet->bandwidth == 10)
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-white text-indigo-800">
                            Most Popular
                        </span>
                    @endif
                </div>
                <h3 class="text-xl font-semibold uppercase">{{ $packet->name }}</h3>
                <div class="mt-4 flex items-baseline">
                    <div class="speed-badge flex items-center justify-center bg-white text-indigo-700 rounded-full h-24 w-24 p-2 shadow-lg">
                        <div class="text-center">
                            <span class="text-3xl font-bold">{{ $packet->bandwidth }}</span>
                            <p class="text-xs font-medium">Mbps</p>
                        </div>
                    </div>
                </div>
                <div class="mt-6">
                    <span class="text-sm">Rp</span>
                    <span class="text-4xl font-bold">{{ number_format($packet->price, 0, ',', '.') }}</span>
                    <span class="text-sm font-medium">/month</span>
                </div>
            </div>

            <div class="p-6">
                <p class="text-sm text-gray-500 mb-6">
                    {{ $packet->desc }}
                </p>
                <ul class="space-y-3">
                    <li class="flex items-start">
                        <svg class="h-5 w-5 text-green-500 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                        </svg>
                        <span class="text-gray-600">Biaya Instalasi Rp150.000</span>
                    </li>
                    <li class="flex items-start">
                        <svg class="h-5 w-5 text-green-500 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                        </svg>
                        <span class="text-gray-600">Unlimited Quota</span>
                    </li>
                    <li class="flex items-start">
                        <svg class="h-5 w-5 text-green-500 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                        </svg>
                        <span class="text-gray-600">Jaringan Fiber Optic</span>
                    </li>
                    <li class="flex items-start">
                        <svg class="h-5 w-5 text-green-500 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                        </svg>
                        <span class="text-gray-600">Layanan 24/7</span>
                    </li>
                </ul>
            </div>

            <div class="px-6 pb-6">
                <a @if(Auth::check()) href="{{ route('order.form', $packet->id) }}" @else href="/sign-in" @endif class="w-full py-3 px-4 bg-indigo-600 hover:bg-indigo-700 text-white font-medium rounded-lg transition-colors duration-200 flex items-center justify-center">
                    PESAN SEKARANG
                    <svg class="ml-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </a>
            </div>
        </div>
        @endforeach
    </div>

    <div class='mt-15 flex justify-center'>
        <div class="px-6 pb-6">
                <a href="/packets" class="w-full py-3 px-4 bg-indigo-600 hover:bg-indigo-700 text-white font-medium rounded-lg transition-colors duration-200 flex items-center justify-center">
                    LIHAT SELENGKAPNYA
                    <svg class="ml-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </a>
            </div>
    </div>
</div>
