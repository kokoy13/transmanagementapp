<x-layouts.main-layout :title="'Sejarah Perusahaan'">
<!-- Hero Section -->
    <section class="overflow-hidden bg-cover relative bg-center pt-20" style="background-image: url('{{ asset('assets/img/sejarah-perusahaan.jpg') }}')">
        <div class="absolute top-0 bottom-0 left-0 right-0 bg-black z-20 opacity-30"></div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 relative z-30">
            <!-- Breadcrumb -->
            <nav class="flex items-center space-x-2 text-white/80 text-sm mb-8">
                <a href="/" class="hover:text-white transition-colors duration-200">
                    <i class="fas fa-home mr-1"></i>Home
                </a>
                <i class="fas fa-chevron-right text-xs"></i>
                <span class="text-white font-medium">Sejarah Perusahaan</span>
            </nav>

            <!-- Hero Content -->
            <div class="max-w-4xl">
                <h1 class="text-5xl md:text-6xl font-bold text-white mb-6 leading-tight">
                    Sejarah Perusahaan
                </h1>
                <div class="w-24 h-1 bg-white rounded-full"></div>
            </div>
        </div>
    </section>
<section class="bg-white py-16 px-4">
  <div class="w-full px-0 lg:px-25">
    <!-- Header with decorative element -->
    <div class="flex items-center mb-12">
      <div class="w-12 h-1 bg-blue-500 mr-4"></div>
      <h2 class="text-2xl font-bold text-gray-900">Tentang Kami</h2>
    </div>

    <!-- Main content with enhanced styling -->
    <div class="grid md:grid-cols-5 gap-12">
      <!-- Left decorative column -->
      <div class="hidden md:block md:col-span-1">
        <div class="flex flex-col items-center space-y-8">
          <div class="w-16 h-16 rounded-full bg-blue-100 flex items-center justify-center">
            <svg class="w-8 h-8 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
            </svg>
          </div>

          <div class="h-full w-px bg-gray-200"></div>

          <div class="w-16 h-16 rounded-full bg-blue-100 flex items-center justify-center">
            <svg class="w-8 h-8 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
          </div>

          <div class="h-full w-px bg-gray-200"></div>

          <div class="w-16 h-16 rounded-full bg-blue-100 flex items-center justify-center">
            <svg class="w-8 h-8 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
            </svg>
          </div>
        </div>
      </div>

      <!-- Main content column -->
      <div class="md:col-span-4 space-y-10">
        <!-- Introduction paragraph -->
        <div class="bg-white rounded-xl shadow-sm p-8 border border-gray-100 hover:shadow-md transition-shadow">
          <p class="text-lg leading-relaxed text-gray-700">
            <span class="font-bold text-gray-900">PT. Marawa Transmisi Media (Transnet)</span> terbentuk pada tanggal Maret 2019, diprakarsai oleh para personil yang berpengalaman di bidang Telekomunikasi dan Informatika, dan didirikan untuk memberikan solusi kepada dunia Telekomunikasi dan IT di Indonesia.
          </p>
        </div>

        <!-- Mission statement -->
        <div class="relative">
          <div class="absolute -left-2 -top-2 w-8 h-8 bg-blue-100 rounded-full"></div>
          <blockquote class="relative z-10 bg-gradient-to-r from-blue-500 to-blue-600 rounded-xl p-8 text-white shadow-lg">
            <div class="absolute top-4 right-4 opacity-20">
              <svg class="w-12 h-12 text-white" fill="currentColor" viewBox="0 0 24 24">
                <path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h4v10h-10z"/>
              </svg>
            </div>
            <p class="text-lg mb-4">
              PT. Marawa Transmisi Media hadir di antara keduanya dengan misi:
            </p>
            <p class="text-2xl font-bold">
              "Menjadikan Sumatera Barat sebagai pusat IT di Indonesia"
            </p>
          </blockquote>
        </div>

        <!-- Values paragraph -->
        <div class="bg-white rounded-xl shadow-sm p-8 border border-gray-100 hover:shadow-md transition-shadow">
          <p class="text-lg leading-relaxed text-gray-700">
            Dalam menjalankan aktivitas usahanya, PT. Marawa Transmisi Media sangat menghargai kepercayaan klien dan mitra usaha, dengan bertekad memberikan <span class="font-semibold text-blue-600">pelayanan yang terbaik</span> kepada klien sebagai prioritas utamanya.
          </p>
        </div>

      </div>
    </div>
  </div>
</section>
</x-layouts.main-layout>
