<x-layouts.order-layout :title="'Menu Request'">
        <div class="w-full mx-auto">
            <!-- Browser-like container -->
            <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                <!-- Website content -->
                <div class="p-6">
                    <!-- Form Container -->
                    <div class="bg-white my-20 rounded-lg p-8 max-w-4xl mx-auto" x-data="bloodRequestForm()">
                        <!-- Form Header -->
                        <div class="text-center mb-8">
                            <div class="inline-block p-3 bg-blue-100 rounded-full mb-4">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-12 w-12 text-blue-800">
                                    <path d="M11.644 1.59a.75.75 0 0 1 .712 0l9.75 5.25a.75.75 0 0 1 0 1.32l-9.75 5.25a.75.75 0 0 1-.712 0l-9.75-5.25a.75.75 0 0 1 0-1.32l9.75-5.25Z" />
                                    <path d="m3.265 10.602 7.668 4.129a2.25 2.25 0 0 0 2.134 0l7.668-4.13 1.37.739a.75.75 0 0 1 0 1.32l-9.75 5.25a.75.75 0 0 1-.71 0l-9.75-5.25a.75.75 0 0 1 0-1.32l1.37-.738Z" />
                                    <path d="m10.933 19.231-7.668-4.13-1.37.739a.75.75 0 0 0 0 1.32l9.75 5.25c.221.12.489.12.71 0l9.75-5.25a.75.75 0 0 0 0-1.32l-1.37-.738-7.668 4.13a2.25 2.25 0 0 1-2.134-.001Z" />
                                </svg>

                            </div>
                            <h1 class="text-3xl font-bold text-gray-900 mb-5">Request Bandwidth</h1>
                            <p class="text-gray-600 mt-2">
                                Lakukan request upgrade atau downgrade bandwidth sesuai dengan permintaan. anda juga dapat melakukan request upgrade bandwidth untuk event tertentu selama beberapa hari sesuai persetujuan ISP
                            </p>
                        </div>
                        <div class="flex items-center flex-col gap-5">
                            <a href="{{ route('requests.bandwidth') }}" class="bg-gray-800 hover:scale-105 transition-transform duration-400 ease-out font-semibold text-center text-lg px-20 w-max py-3 text-white">
                                Request Bandwidth
                            </a>
                            <a href="{{ route('requests.bandwidthevent') }}" class="bg-gray-800 hover:scale-105 transition-transform duration-400 ease-out font-semibold text-center text-lg px-20 w-max py-3 text-white">
                                Request Bandwidth(Event)
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts.order-layout>
