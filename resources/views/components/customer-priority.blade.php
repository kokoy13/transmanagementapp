<!-- Partnership Slider Section -->
<div id="customer-priority" class="py-16" style="font-family: 'Inter', sans-serif;">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h3 data-aos='fade-up' class="text-4xl font-bold text-gray-800 mb-4">Pelanggan Prioritas</h3>
            <p data-aos="fade-right" class="text-lg text-gray-600 max-w-2xl mx-auto">
                Bekerja sama dengan berbagai institusi dan perusahaan terkemuka untuk memberikan layanan terbaik
            </p>
        </div>

        <div class="bg-white/50 backdrop-blur-sm rounded-2xl p-8 shadow-lg border border-gray-200"
             style="overflow: hidden; position: relative;">
            <div style="display: flex; animation: continuousSlide 30s linear infinite; width: max-content;"
                 onmouseover="this.style.animationPlayState='paused'"
                 onmouseout="this.style.animationPlayState='running'">
                <!-- First set of partners -->
                @for($i = 0; $i < 2; $i++)
                    <div class="flex space-x-8">
                        <div class="bg-white max-w-[200px] rounded-xl p-6 shadow-md border border-gray-100 flex flex-col items-center"
                            style="min-width: 200px; transition: all 0.3s ease;"
                            onmouseover="this.style.transform='translateY(-5px)'"
                            onmouseout="this.style.transform='translateY(0)'">
                            <div class="w-16 h-16 bg-gradient-to-br from-red-500 to-red-600 rounded-xl flex items-center justify-center mb-4">
                                <i class="fas fa-university text-2xl text-white"></i>
                            </div>
                            <h4 class="font-bold text-gray-800 text-center text-wrap">Universitas Dharma Andalas</h4>
                            <p class="text-sm text-gray-600 text-center mt-2">Institusi Pendidikan</p>
                        </div>

                        <div class="bg-white rounded-xl p-6 shadow-md border border-gray-100 flex flex-col items-center"
                            style="min-width: 200px; transition: all 0.3s ease;"
                            onmouseover="this.style.transform='translateY(-5px)'"
                            onmouseout="this.style.transform='translateY(0)'">
                            <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl flex items-center justify-center mb-4">
                                <i class="fas fa-building text-2xl text-white"></i>
                            </div>
                            <h4 class="font-bold text-gray-800 text-center">Bank Mandiri</h4>
                            <p class="text-sm text-gray-600 text-center mt-2">Perbankan</p>
                        </div>

                        <div class="bg-white rounded-xl p-6 shadow-md border border-gray-100 flex flex-col items-center"
                            style="min-width: 200px; transition: all 0.3s ease;"
                            onmouseover="this.style.transform='translateY(-5px)'"
                            onmouseout="this.style.transform='translateY(0)'">
                            <div class="w-16 h-16 bg-gradient-to-br from-green-500 to-green-600 rounded-xl flex items-center justify-center mb-4">
                                <i class="fas fa-hospital text-2xl text-white"></i>
                            </div>
                            <h4 class="font-bold text-gray-800 text-center">RSUP M. Djamil</h4>
                            <p class="text-sm text-gray-600 text-center mt-2">Rumah Sakit</p>
                        </div>

                        <div class="bg-white rounded-xl p-6 shadow-md border border-gray-100 flex flex-col items-center"
                            style="min-width: 200px; transition: all 0.3s ease;"
                            onmouseover="this.style.transform='translateY(-5px)'"
                            onmouseout="this.style.transform='translateY(0)'">
                            <div class="w-16 h-16 bg-gradient-to-br from-purple-500 to-purple-600 rounded-xl flex items-center justify-center mb-4">
                                <i class="fas fa-landmark text-2xl text-white"></i>
                            </div>
                            <h4 class="font-bold text-gray-800 text-center">Dinas Perhubungan</h4>
                            <p class="text-sm text-gray-600 text-center mt-2">Pemerintahan</p>
                        </div>

                        <div class="bg-white rounded-xl p-6 shadow-md border border-gray-100 flex flex-col items-center"
                            style="min-width: 200px; transition: all 0.3s ease;"
                            onmouseover="this.style.transform='translateY(-5px)'"
                            onmouseout="this.style.transform='translateY(0)'">
                            <div class="w-16 h-16 bg-gradient-to-br from-yellow-500 to-yellow-600 rounded-xl flex items-center justify-center mb-4">
                                <i class="fas fa-shopping-cart text-2xl text-white"></i>
                            </div>
                            <h4 class="font-bold text-gray-800 text-center">Basko Mall</h4>
                            <p class="text-sm text-gray-600 text-center mt-2">Retail & Mall</p>
                        </div>

                        <div class="bg-white rounded-xl mr-8 p-6 shadow-md border border-gray-100 flex flex-col items-center"
                            style="min-width: 200px; transition: all 0.3s ease;"
                            onmouseover="this.style.transform='translateY(-5px)'"
                            onmouseout="this.style.transform='translateY(0)'">
                            <div class="w-16 h-16 bg-gradient-to-br from-indigo-500 to-indigo-600 rounded-xl flex items-center justify-center mb-4">
                                <i class="fas fa-hotel text-2xl text-white"></i>
                            </div>
                            <h4 class="font-bold text-gray-800 text-center">Hotel Daima</h4>
                            <p class="text-sm text-gray-600 text-center mt-2">Hospitality</p>
                        </div>
                    </div>
                @endfor
            </div>
        </div>
    </div>
</div>

<style>
@keyframes continuousSlide {
    0% {
        transform: translateX(0);
    }
    100% {
        transform: translateX(calc(-200px * 6 - 2rem * 6)); /* Width of each card + spacing */
    }
}
</style>
