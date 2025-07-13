<x-layouts.order-layout :title="'Price List Packet'">
    <div class="w-full h-full mt-30">
        <!-- Breadcrumb -->
            <nav class="flex items-center ml-20 space-x-2 text-black/50 my-8">
                <a href="/" class="hover:text-black! transition-colors duration-200">
                    <i class="fas fa-home mr-1"></i>Home
                </a>
                <i class="fas fa-chevron-right"></i>
                <span class="text-black font-medium">Packets</span>
            </nav>
        <form method="POST" action="{{ route('packets.search') }}" class="relative max-w-md hover:w-full mx-auto mb-8">
            @csrf
            <div class="flex items-center bg-gray-100 rounded-full shadow-lg py-2 overflow-hidden px-2">
                <input type="text" name="keyword" placeholder="Search..." class="w-full border-none bg-gray-100 py-3 text-gray-800" />
                <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white p-3 rounded-full transition-colors duration-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                </svg>
                </button>
            </div>
        </form>

        <div class="w-full flex flex-col gap-5">
            @if($family || $office || $dedicated)
                <!-- Family Packets -->
                <x-packets-scroll :packets='$family' :title='$familyTitle'></x-packets-scroll>
                <!-- Office Packets -->
                <x-packets-scroll :packets='$office' :title='$officeTitle'></x-packets-scroll>
                <!-- Dedicated Packets -->
                <x-packets-scroll :packets='$dedicated' :title='$dedicatedTitle'></x-packets-scroll>
            @else
                <section class="flex items-center justify-center h-60">
                    <div class="text-center max-w-md p-6 rounded-2xl">
                        <svg class="mx-auto mb-4 w-16 h-16 text-gray-400" fill="none" stroke="currentColor" stroke-width="1.5"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15 17h5l-1.405-1.405M15 17a3.5 3.5 0 10-7 0 3.5 3.5 0 007 0zM10.5 10.5h.008v.008H10.5v-.008zM13.5 10.5h.008v.008H13.5v-.008z" />
                        </svg>
                        <h2 class="text-2xl font-semibold text-gray-700">Paket tidak ditemukan</h2>
                        <p class="text-sm text-gray-500 mt-2">Tidak ada hasil untuk keyword <span class="font-medium text-primary">"{{ $keyword }}"</span>. Coba gunakan kata kunci lain.</p>
                    </div>
                </section>
            @endif
        </div>
    </div>
</x-layouts.order-layout>
