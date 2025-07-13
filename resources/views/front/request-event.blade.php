<x-layouts.order-layout :title="'Request Bandwidth Event'">
    <div class="mt-20 font-sans">
        <div class="w-full mx-auto">
            <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                <div class="p-6">
                    @if ($payments->isNotEmpty())
                        <div class="bg-white my-20 rounded-lg p-8 max-w-4xl mx-auto space-y-6">
                            <!-- Header -->
                            <div class="text-center mb-8">
                                <div class="inline-block p-3 bg-blue-100 rounded-full mb-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="h-12 w-12 text-blue-800" viewBox="0 0 24 24">
                                        <path d="M11.644 1.59a.75.75 0 0 1 .712 0l9.75 5.25a.75.75 0 0 1 0 1.32l-9.75 5.25a.75.75 0 0 1-.712 0l-9.75-5.25a.75.75 0 0 1 0-1.32l9.75-5.25Z" />
                                        <path d="m3.265 10.602 7.668 4.129a2.25 2.25 0 0 0 2.134 0l7.668-4.13 1.37.739a.75.75 0 0 1 0 1.32l-9.75 5.25a.75.75 0 0 1-.71 0l-9.75-5.25a.75.75 0 0 1 0-1.32l1.37-.738Z" />
                                        <path d="m10.933 19.231-7.668-4.13-1.37.739a.75.75 0 0 0 0 1.32l9.75 5.25c.221.12.489.12.71 0l9.75-5.25a.75.75 0 0 0 0-1.32l-1.37-.738-7.668 4.13a2.25 2.25 0 0 1-2.134-.001Z" />
                                    </svg>
                                </div>
                                <h1 class="text-3xl font-bold text-gray-900 mb-4">Request Bandwidth Event</h1>
                                <p class="text-gray-600 text-sm">
                                    Lakukan request upgrade atau downgrade bandwidth sesuai kebutuhan. Untuk event tertentu, hanya dapat melakukan upgrade selama masa event berlangsung sesuai persetujuan ISP.
                                </p>
                            </div>

                            <!-- Form -->
                            <form action="{{ route('requests.bandwidthevent') }}" method="POST" class="space-y-6">
                                @csrf
                                <!-- Pilih Langganan -->
                                <div>
                                    <label for="current" class="block text-sm font-medium text-gray-700 mb-1">Pilih Langganan Aktif</label>
                                    <select name="current" required id="current" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                        @foreach ($payments as $payment)
                                                <option value="{{ $payment->id }}">
                                                    {{ $payment->order->packet->name }} - {{ $payment->order->packet->bandwidth }} Mbps
                                                </option>
                                                <input type="text" name="bandwidthAwal" value="{{ $payment->order->packet->name }} - {{ $payment->order->packet->bandwidth }}" hidden>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Pilih Bandwidth Tujuan -->
                                <div>
                                    <label for="bandwidth" class="block text-sm font-medium text-gray-700 mb-1">Pilih Bandwidth yang Diinginkan</label>
                                    <select name="bandwidth" required id="bandwidth" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                        <option selected value="">Pilih bandwidth</option>
                                        @foreach ($packets as $packet)
                                            @foreach ($payments as $payment)
                                                    @if ($packet->bandwidth > $payment->order->packet->bandwidth)
                                                        <option value="{{ $packet->bandwidth }}">
                                                            {{ $packet->bandwidth }} Mbps
                                                        </option>
                                                    @endif
                                            @endforeach
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Catatan -->
                                <div>
                                    <label for="note" class="block text-sm font-medium text-gray-700 mb-1">Catatan Tambahan</label>
                                    <textarea name="note" id="note" rows="4" placeholder="Tambahkan catatan jika diperlukan..." class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500"></textarea>
                                </div>

                                <!-- Submit -->
                                <div class="flex justify-end">
                                    <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                        Kirim Request
                                    </button>
                                </div>
                            </form>
                        </div>
                    @else
                        <!-- Jika tidak ada paket -->
                        <section class="flex items-center justify-center h-full">
                            <div class="text-center max-w-md p-6 rounded-2xl">
                                <img src="{{ asset('assets/img/notfound.png') }}" alt="Not Found" class="mx-auto mb-4">
                                <h2 class="text-2xl font-semibold text-gray-700">Request Tidak Valid</h2>
                                <p class="text-sm text-gray-500 mt-2">Paket langganan tidak sesuai atau Anda belum pernah melakukan order.</p>
                                <div class="mt-6">
                                    <a href="/packets" class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-3 px-6 rounded-lg transition-colors">
                                        Pesan Sekarang
                                    </a>
                                </div>
                            </div>
                        </section>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-layouts.order-layout>
