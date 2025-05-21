<section class="bg-gray-50 px-20 mx-5 rounded-xl py-5" x-data="{ scroll: 0 }">
            <div class="flex justify-between items-center mb-6">
                <h2 class="section-header near-protocol text-2xl font-bold text-gray-700">{{ $title }}</h2>
                <div class="flex gap-2">
                    <button 
                        class="p-1 rounded-full bg-white hover:bg-gray-700 transition-colors"
                        @click="$refs.nearScroll.scrollBy({ left: -300, behavior: 'smooth' })"
                        :class="{ 'opacity-50 cursor-not-allowed': scroll <= 0 }"
                        :disabled="scroll <= 0"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                        </svg>
                    </button>
                    <button 
                        class="p-1 rounded-full bg-white hover:bg-gray-700 transition-colors"
                        @click="$refs.nearScroll.scrollBy({ left: 300, behavior: 'smooth' })"
                        :class="{ 'opacity-50 cursor-not-allowed': scroll >= $refs.nearScroll.scrollWidth - $refs.nearScroll.clientWidth }"
                        :disabled="scroll >= $refs.nearScroll.scrollWidth - $refs.nearScroll.clientWidth"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </button>
                </div>
            </div>
            <div 
                class="flex overflow-x-auto gap-4 scroll-container pb-4" 
                x-ref="nearScroll"
                @scroll="scroll = $event.target.scrollLeft"
            >
                <!-- Card 1 -->
                @foreach ($packets as $packet)
                <div class="gradient-bg w-1/3 flex flex-col justify-center items-center gap-5 px-6 py-8 text-white flex-shrink-0 relative min-w-[280px] sm:min-w-[320px] rounded-xl">
                    <div class="absolute top-4 left-4">
                        @if ($packet->name == 'Family' && $packet->bandwidth == 10)
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-sm font-medium bg-white text-indigo-800">
                                Most Popular
                            </span>
                        @endif
                    </div>
                    <h3 class="text-xl font-semibold uppercase">{{ $packet->name }}</h3>
                    <div class="flex items-baseline">
                        <div class="speed-badge flex items-center justify-center bg-white text-indigo-700 rounded-full h-26 w-26 p-2 shadow-lg">
                            <div class="text-center">
                                <span class="text-4xl font-bold">{{ $packet->bandwidth }}</span>
                                <p class="text-sm font-medium">Mbps</p>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <span class="text-sm">Rp</span>
                        <span class="text-4xl font-bold">{{ number_format($packet->price, 0, ',', '.') }}</span>
                        <span class="text-sm font-medium">/month</span>
                    </div>
                    <div class="px-12 text-white">
                        <p class="text-sm mb-6 text-wrap">
                            {{ $packet->desc }}
                        </p>
                        <ul class="space-y-3">
                            <li class="flex items-start">
                                <svg class="h-5 w-5 text-green-500 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                </svg>
                                <span class="">Biaya Instalasi Rp150.000</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="h-5 w-5 text-green-500 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                </svg>
                                <span class="">Unlimited Quota</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="h-5 w-5 text-green-500 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                </svg>
                                <span class="">Jaringan Fiber Optic</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="h-5 w-5 text-green-500 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                </svg>
                                <span class="">Layanan 24/7</span>
                            </li>
                        </ul>
                    </div>
                    <div class="px-6 relative -bottom-2">
                        <a @if(Auth::check()) href="{{ route('order.form', $packet->id) }}" @else href="/sign-in" @endif class="w-full py-3 px-4 bg-white hover:gray-100 font-medium rounded-lg transition-colors duration-200 flex items-center justify-center text-indigo-800 text-sm">
                            PESAN SEKARANG
                        </a>
                    </div>
                </div>
                    
                @endforeach
            </div>
        </section>