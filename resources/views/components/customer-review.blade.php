
<div class="">
    <!-- Header -->
    <header class="bg-white">
        <div class="max-w-6xl mx-auto px-4 py-6">
            <h1 data-aos="fade-up" class="text-4xl font-bold text-gray-900 text-center">Ulasan Pelanggan</h1>
            <p data-aos="fade-right" class="text-gray-600 mt-2 text-lg text-center">Lihat apa yang pelanggan kami katakan tentang kami</p>
        </div>
    </header>

    <main class="max-w-6xl mx-auto px-4 py-8">
        <!-- Stats Overview -->
        <div class="bg-white rounded-lg shadow-sm p-6 mb-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                <div class="text-center">
                    <div class="text-3xl font-bold text-blue-500">4.9</div>
                    <div class="flex justify-center mt-1 mb-2">
                        <div class="flex text-yellow-400">
                            <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20">
                                <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                            </svg>
                            <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20">
                                <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                            </svg>
                            <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20">
                                <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                            </svg>
                            <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20">
                                <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                            </svg>
                            <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20">
                                <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                            </svg>
                        </div>
                    </div>
                    <div class="text-sm text-gray-600">Overall Rating</div>
                </div>
                <div class="text-center">
                    <div class="text-3xl font-bold text-gray-900">8</div>
                    <div class="text-sm text-gray-600 mt-2">Total Reviews</div>
                </div>
                <div class="text-center">
                    <div class="text-3xl font-bold text-green-600">96%</div>
                    <div class="text-sm text-gray-600 mt-2">Satisfied Customers</div>
                </div>
                <div class="text-center">
                    <div class="text-3xl font-bold text-blue-600">4.2</div>
                    <div class="text-sm text-gray-600 mt-2">Avg Response Time (hrs)</div>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
            <!-- Reviews List -->
            <div class="lg:col-span-3">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-2xl font-semibold text-gray-900">Recent Reviews</h2>
                </div>

                <!-- Review Cards -->
                <div class="space-y-6">
                    <!-- Review 1 -->
                    <div class="bg-white rounded-lg shadow-sm p-6 border">
                        <div class="flex items-start justify-between mb-4">
                            <div class="flex items-center">
                                <img style="background-image: url('{{ asset('assets/img/customer-review1.png') }}')" class="w-12 h-12 bg-center bg-cover rounded-full"/>
                                <div class="ml-4">
                                    <h3 class="font-semibold text-gray-900">Helmi Todi</h3>
                                    <p class="text-sm text-gray-600">Local Guide · 505 Ulasan</p>
                                </div>
                            </div>
                            <div class="text-right">
                                <div class="flex text-yellow-400 mb-1">
                                    @for($i = 0; $i < 5; $i++)
                                    <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                        <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                                    </svg>
                                    @endfor
                                </div>
                                <p class="text-sm text-gray-500">{{ date('Y') - 2023 }} years ago</p>
                            </div>
                        </div>
                        <p class="text-gray-700 mb-4">salah satu ISP terbaik..</p>
                        <p class="text-gray-700 mb-4">tarifnyapun bersaing</p>
                        <div class="flex items-center justify-between text-sm">
                            <div class="flex items-center space-x-4">
                                <div class="flex items-center text-gray-500 hover:text-blue-600">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L9 6v4m-5 8h2.5a2 2 0 002-2V8a2 2 0 00-2-2H6a2 2 0 00-2 2v8a2 2 0 002 2z"/>
                                    </svg>
                                    3
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Review 2 -->
                    <div class="bg-white rounded-lg shadow-sm p-6 border">
                        <div class="flex items-start justify-between mb-4">
                            <div class="flex items-center">
                                <img style="background-image: url('{{ asset('assets/img/customer-review2.png') }}')" class="w-12 h-12 rounded-full bg-cover bg-center"/>
                                <div class="ml-4">
                                    <h3 class="font-semibold text-gray-900">rere hahan</h3>
                                    <p class="text-sm text-gray-600">1 Ulasan</p>
                                </div>
                            </div>
                            <div class="text-right">
                                <div class="flex text-yellow-400 mb-1">
                                    @for($i = 0; $i < 5; $i++)
                                    <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                        <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                                    </svg>
                                    @endfor
                                </div>
                                <p class="text-sm text-gray-500">{{ date('Y') - 2022 }} years ago</p>
                            </div>
                        </div>
                        <p class="text-gray-700 mb-4">akses internetnya lebih cepat dibanding provider pelat merah</p>
                        <div class="flex items-center justify-between text-sm">
                            <div class="flex items-center space-x-4">
                                <button class="flex items-center text-gray-500 hover:text-blue-600">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L9 6v4m-5 8h2.5a2 2 0 002-2V8a2 2 0 00-2-2H6a2 2 0 00-2 2v8a2 2 0 002 2z"/>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Review 3 -->
                    <div class="bg-white rounded-lg shadow-sm p-6 border">
                        <div class="flex items-start justify-between mb-4">
                            <div class="flex items-center">
                                <div class="w-12 h-12 bg-gray-700 rounded-full flex items-center justify-center text-white font-semibold">
                                    N
                                </div>
                                <div class="ml-4">
                                    <h3 class="font-semibold text-gray-900">Nur Imansyah Tara</h3>
                                    <p class="text-sm text-gray-600">Local Guide · 17 Ulasan</p>
                                </div>
                            </div>
                            <div class="text-right">
                                <div class="flex text-yellow-400 mb-1">
                                    @for($i = 0; $i < 5; $i++)
                                    <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                        <path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/>
                                    </svg>
                                    @endfor
                                </div>
                                <p class="text-sm text-gray-500">{{ date('Y') - 2022 }} years ago</p>
                            </div>
                        </div>
                        <p class="text-gray-700 mb-4">Oke</p>
                        <div class="flex items-center justify-between text-sm">
                            <div class="flex items-center space-x-4">
                                <button class="flex items-center text-gray-500 hover:text-blue-600">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L9 6v4m-5 8h2.5a2 2 0 002-2V8a2 2 0 00-2-2H6a2 2 0 00-2 2v8a2 2 0 002 2z"/>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Rating Breakdown Sidebar -->
            <div class="lg:col-span-1">
                <!-- Rating Breakdown -->
                <div class="bg-white rounded-lg shadow-sm p-6 border mt-14">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Rating Breakdown</h3>
                    <div class="space-y-3">
                        <div class="flex items-center">
                            <span class="text-sm w-8">5★</span>
                            <div class="flex-1 mx-3 bg-gray-200 rounded-full h-2">
                                <div class="bg-yellow-400 h-2 rounded-full" style="width: 100%"></div>
                            </div>
                            <span class="text-sm text-gray-600 w-12">100%</span>
                        </div>
                        <div class="flex items-center">
                            <span class="text-sm w-8">4★</span>
                            <div class="flex-1 mx-3 bg-gray-200 rounded-full h-2">
                                <div class="bg-yellow-400 h-2 rounded-full" style="width: 15%"></div>
                            </div>
                            <span class="text-sm text-gray-600 w-12">15%</span>
                        </div>
                        <div class="flex items-center">
                            <span class="text-sm w-8">3★</span>
                            <div class="flex-1 mx-3 bg-gray-200 rounded-full h-2">
                                <div class="bg-yellow-400 h-2 rounded-full" style="width: 6%"></div>
                            </div>
                            <span class="text-sm text-gray-600 w-12">6%</span>
                        </div>
                        <div class="flex items-center">
                            <span class="text-sm w-8">2★</span>
                            <div class="flex-1 mx-3 bg-gray-200 rounded-full h-2">
                                <div class="bg-yellow-400 h-2 rounded-full" style="width: 3%"></div>
                            </div>
                            <span class="text-sm text-gray-600 w-12">3%</span>
                        </div>
                        <div class="flex items-center">
                            <span class="text-sm w-8">1★</span>
                            <div class="flex-1 mx-3 bg-gray-200 rounded-full h-2">
                                <div class="bg-yellow-400 h-2 rounded-full" style="width: 1%"></div>
                            </div>
                            <span class="text-sm text-gray-600 w-12">1%</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
