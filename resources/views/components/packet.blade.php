@props(['packets'])
<div class="flex flex-wrap justify-center gap-10 relative z-40">
    {{-- Card --}}
    @foreach ($packets as $packet)
    <div data-aos='fade-up' class="w-full md:w-4/12 px-4 text-center max-w-sm">
        <div
            class="relative flex flex-col min-w-0 break-words bg-white w-full mb-8 shadow-lg rounded-lg"
        >
            <div class="px-4 py-5 flex flex-col items-center">
                <div
                    class="bg-blue-600 absolute -top-4 text-white font-semibold w-max px-12 py-1 text-2xl rounded-xl  border-white uppercase" style="border-width: 2px">
                    {{ $packet->name }}
                </div>
                <div class="bg-blue-600 flex flex-col text-white py-4 px-7 mt-8 mb-5 rounded-full">
                    <h1 class="font-bold text-6xl">{{ $packet->bandwidth }}</h1>
                    <span class="font-bold text-lg">Mbps</span>
                </div>
                <h1 class="text-4xl font-semibold text-blue-600"><sup class="text-2xl">Rp</sup> {{ number_format($packet->price, 0, '.', '.') }}</h1>
                <p class="mt-4 mb-6 text-gray-600 text-sm px-5">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere, quam!
                </p>
                <div class="flex flex-col gap-5 text-sm items-start mb-10">
                    <div class="flex gap-2 items-center">
                        <i class="fa-regular fa-circle-check"></i>
                        <p>Biaya Instalasi 150.000</p>
                    </div>
                    <div class="flex gap-2 items-center">
                        <i class="fa-regular fa-circle-check"></i>
                        <p>Rasio {{ $packet->rasio }}</p>
                    </div>
                    <div class="flex gap-2 items-center">
                        <i class="fa-regular fa-circle-check"></i>
                        <p>Jaringan Fiber Optic</p>
                    </div>
                    <div class="flex gap-2 items-center">
                        <i class="fa-regular fa-circle-check"></i>
                        <p>Layanan 24/7</p>
                    </div>
                </div>
                <a
                    href=""
                    class="bg-blue-600 absolute -bottom-4 text-white font-semibold w-max px-12 py-1 rounded-xl border border-white py-2">
                    <span class="uppercase">
                        Pesan Sekarang
                    </span>
                </a>
            </div>
        </div>
    </div>
    @endforeach
</div>
