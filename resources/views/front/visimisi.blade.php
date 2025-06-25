<x-layouts.main-layout>
    <!-- Hero Section -->
    <section class="overflow-hidden bg-cover bg-center pt-20" style="background-image: url('{{ asset('assets/img/visimisi.jpg') }}')">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
            <!-- Breadcrumb -->
            <nav class="flex items-center space-x-2 text-white/80 text-sm mb-8">
                <a href="/" class="hover:text-white transition-colors duration-200">
                    <i class="fas fa-home mr-1"></i>Home
                </a>
                <i class="fas fa-chevron-right text-xs"></i>
                <span class="text-white font-medium">Visi dan Misi</span>
            </nav>

            <!-- Hero Content -->
            <div class="max-w-4xl">
                <h1 class="text-5xl md:text-6xl font-bold text-white mb-6 leading-tight">
                    Visi dan Misi
                </h1>
                <div class="w-24 h-1 bg-white rounded-full"></div>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <div class="max-w-4xl mx-auto space-y-12">

            <!-- Vision Section -->
            <div class="bg-white rounded-lg shadow-sm border-blue-500! p-8" style="border-left-width: 6px">
                <div class="space-y-6">
                    <p class="text-gray-700 text-lg leading-relaxed italic">
                        Menjadi Perusahaan Telekomunikasi dan IT Terpercaya, memiliki Inovasi dan Integritas
                    </p>
                    <div>
                        <h2 class="text-xl font-bold text-gray-800">Visi</h2>
                    </div>
                </div>
            </div>

            <!-- Mission Section -->
            <div class="bg-white rounded-lg shadow-sm border-blue-500! p-8" style="border-left-width: 6px">
                <div class="space-y-6">
                    <div class="space-y-4 text-gray-700 leading-relaxed">
                        <div class="flex items-start space-x-3">
                            <span class="text-blue-500 mt-1">•</span>
                            <p>Menjalankan kegiatan bisnis sesuai keinginan mitra, secara profesional dan dengan tetap memperhatikan ketentuan yang berlaku.</p>
                        </div>
                        <div class="flex items-start space-x-3">
                            <span class="text-blue-500 mt-1">•</span>
                            <p>Mengutamakan pelayanan dan mutu terbaik, serta meningkatkan kepuasan tertinggi terhadap mitra.</p>
                        </div>
                        <div class="flex items-start space-x-3">
                            <span class="text-blue-500 mt-1">•</span>
                            <p>Membangun serta menciptakan citra terbaik perusahaan.</p>
                        </div>
                    </div>
                    <div>
                        <h2 class="text-xl font-bold text-gray-800">Misi</h2>
                    </div>
                </div>
            </div>

            <!-- Motto Section -->
            <div class="bg-white rounded-lg shadow-sm border-blue-500! p-8" style="border-left-width: 6px">
                <div class="space-y-6">
                    <p class="text-gray-700 text-lg leading-relaxed italic">
                        Connectivity For Better Future
                    </p>
                    <div>
                        <h2 class="text-xl font-bold text-gray-800">Motto</h2>
                    </div>
                </div>
            </div>

        </div>
    </main>

    <!-- Additional Content Section -->
    <section class="py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-4xl mx-auto">
                <div class="text-center mb-12">
                    <h2 data-aos='fade-up' class="text-3xl font-bold text-gray-800 mb-4">Komitmen Kami</h2>
                    <p data-aos='fade-right' class="text-gray-600 text-lg">Bersama membangun masa depan yang lebih terhubung</p>
                </div>

                <div class="grid md:grid-cols-3 gap-8">
                    <!-- Innovation -->
                    <div data-aos='fade-right' class="bg-white p-6 rounded-lg shadow-xl text-center">
                        <div class="w-16 h-16 bg-orange-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-lightbulb text-orange-500 text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-800 mb-2">Inovasi</h3>
                        <p class="text-gray-600">Menghadirkan solusi teknologi terdepan untuk kebutuhan telekomunikasi dan IT</p>
                    </div>

                    <!-- Integrity -->
                    <div data-aos='fade-up' class="bg-white p-6 rounded-lg shadow-xl text-center">
                        <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-handshake text-blue-500 text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-800 mb-2">Integritas</h3>
                        <p class="text-gray-600">Menjalankan bisnis dengan transparansi dan komitmen tinggi kepada mitra</p>
                    </div>

                    <!-- Trust -->
                    <div data-aos='fade-left' class="bg-white p-6 rounded-lg shadow-xl text-center">
                        <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-shield-alt text-green-500 text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-gray-800 mb-2">Kepercayaan</h3>
                        <p class="text-gray-600">Membangun hubungan jangka panjang berdasarkan kepercayaan dan kualitas</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layouts.main-layout>
