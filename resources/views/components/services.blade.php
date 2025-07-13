@props(['packets'])
{{-- Service1 --}}
<section class="pb-20 -mt-24">
    <div class="container mx-auto px-4">
        <x-packet :packets="$packets"/>
        <div class="flex flex-wrap items-center mt-32">
            <div class="w-full md:w-5/12 px-4 mr-auto ml-auto">
                <div
                    class="text-gray-600 p-3 text-center inline-flex items-center justify-center w-16 h-16 mb-6 shadow-lg rounded-full bg-gray-100"
                    data-aos="fade-right"
                >
                    <i class="fa-solid fa-screwdriver-wrench text-xl"></i>
                </div>
                <h3 class="text-3xl mb-2 font-semibold leading-normal" data-aos="fade-up">
                    Bekerja dengan Kami Adalah Pilihan Tepat
                </h3>
                <p
                    class="text-base lg:text-lg font-light leading-relaxed mt-4 mb-4 text-gray-700 indent-6"
                    data-aos="fade-up"
                >
                Kami menyediakan layanan manajemen jaringan yang andal untuk memastikan konektivitas dan performa jaringan Anda tetap optimal setiap saat.
                </p>
                <p
                    class="text-base lg:text-lg font-light leading-relaxed mt-0 mb-4 text-gray-700 indent-6"
                    data-aos="fade-up"
                >
                Layanan kami mencakup instalasi perangkat jaringan, konfigurasi switch dan router, hingga pengamanan jaringan dari ancaman siber.
                </p>
                <a
                    href="#customer-priority"
                    class="font-bold text-gray-800 mt-8 underline"
                    data-aos="fade-up"
                    >Lihat Pelanggan Manage Service Kami</a
                >
            </div>
            <div data-aos="fade-left" class="w-full md:w-4/12 px-4 mr-auto ml-auto">
                <div
                    class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-white"
                >
                    <img
                    alt="..."
                    src="{{ asset('assets/img/service4.jpeg') }}"
                    />
                    <blockquote class="relative p-8 mb-4">
                    <svg
                        preserveAspectRatio="none"
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 583 95"
                        class="absolute left-0 w-full block"
                        style="height: 95px; top: -94px;"
                    >
                        <polygon
                        points="-30,95 583,95 583,65"
                        class="text-white fill-current"
                        ></polygon>
                    </svg>
                    <h4 class="text-xl font-bold text-gray-700">
                        Manage Service Jaringan
                    </h4>
                    <p class="text-md font-light mt-2 text-gray-700">
                        Tim kami siap menangani pemantauan, pemeliharaan, serta troubleshooting secara proaktif. Dengan pengalaman dan tools terbaik, kami membantu Anda menjaga kestabilan dan keamanan infrastruktur TI Anda.
                    </p>
                    </blockquote>
                </div>
            </div>
        </div>
    </div>
</section>
{{-- Service2 --}}
<section class="relative py-20">
    <div
    class="bottom-auto top-0 left-0 right-0 w-full absolute pointer-events-none overflow-hidden -mt-20"
    style="height: 80px;"
    >
    <svg
        class="absolute bottom-0 overflow-hidden"
        xmlns="http://www.w3.org/2000/svg"
        preserveAspectRatio="none"
        version="1.1"
        viewBox="0 0 2560 100"
        x="0"
        y="0"
    >
        <polygon
        class="text-white fill-current"
        points="2560 0 2560 100 0 100"
        ></polygon>
    </svg>
    </div>
    <div class="container mx-auto px-4">
    <div class="items-center flex flex-wrap">
        <div class="w-full md:w-4/12 ml-auto mr-auto px-4">
        <img
            alt="..."
            data-aos="fade-right"
            class="max-w-full rounded-lg shadow-lg"
            src="{{ asset('assets/img/service2.jpg') }}"
        />
        </div>
        <div class="w-full md:w-5/12 ml-auto mr-auto px-4">
        <div class="md:pr-12" >
            <div
            class="text-gray-600 p-3 text-center inline-flex items-center justify-center w-16 h-16 mb-6 shadow-lg rounded-full bg-gray-100"
            data-aos="fade-left"
            >
                <i class="fa-solid fa-cloud"></i>
            </div>
            <h3 class="text-3xl font-semibold" data-aos="fade-left">Infrastruktur Cloud</h3>
            <p class="mt-4 text-lg leading-relaxed text-gray-600" data-aos="fade-left">
                Kami menyediakan layanan infrastruktur cloud handal untuk kebutuhan server, storage, dan jaringan yang aman, fleksibel, dan siap mendukung transformasi digital bisnis Anda.
            </p>
            <ul class="list-none mt-6">
            <li class="py-2" data-aos="fade-left">
                <div class="flex items-center">
                <div>
                    <span
                    class="text-xs font-semibold inline-block py-1 px-2 uppercase rounded-full text-gray-600 bg-gray-100 mr-3"
                    ><i class="fas fa-fingerprint"></i
                    ></span>
                </div>
                <div>
                    <h4 class="text-gray-600">
                    Cloud Management
                    </h4>
                </div>
                </div>
            </li>
            <li class="py-2" data-aos="fade-left">
                <div class="flex items-center">
                <div>
                    <span
                    class="text-xs font-semibold inline-block py-1 px-2 uppercase rounded-full text-gray-600 bg-gray-100 mr-3"
                    >
                        <i class="fa-solid fa-wifi"></i>
                    </span>
                </div>
                <div>
                    <h4 class="text-gray-600">Integrasi Jaringan</h4>
                </div>
                </div>
            </li>
            <li class="py-2" data-aos="fade-left">
                <div class="flex items-center">
                <div>
                    <span
                    class="text-xs font-semibold inline-block py-1 px-2 uppercase rounded-full text-gray-600 bg-gray-100 mr-3"
                    ><i class="far fa-paper-plane"></i
                    ></span>
                </div>
                <div>
                    <h4 class="text-gray-600">Fleksibilitas</h4>
                </div>
                </div>
            </li>
            </ul>
        </div>
        </div>
    </div>
    </div>
</section>
{{-- Service3 --}}
<section class="pb-20 -mt-24">
    <div class="container mx-auto px-4">
        <div class="flex flex-wrap items-center mt-32">
            <div class="w-full md:w-5/12 px-4 mr-auto ml-auto">
                <div
                    class="text-gray-600 p-3 text-center inline-flex items-center justify-center w-16 h-16 mb-6 shadow-lg rounded-full bg-gray-100"
                    data-aos="fade-right"
                >
                    <i class="fas fa-user-friends text-xl"></i>
                </div>
                <h3 class="text-3xl mb-2 font-semibold leading-normal" data-aos="fade-up">
                    Streaming Bola Lebih Lancar Bersama Kami
                </h3>
                <p
                    class="text-lg font-light leading-relaxed mt-4 mb-4 text-gray-800 indent-6"
                    data-aos="fade-up"
                >
                    Kami menyediakan koneksi internet berkualitas tinggi untuk mendukung kebutuhan live streaming pertandingan bola.
                </p>
                <p
                    class="text-lg font-light leading-relaxed mt-0 mb-4 text-gray-800 indent-6"
                    data-aos="fade-up"
                >
                    Layanan kami telah dipercaya oleh penyedia platform streaming bola untuk memastikan tayangan langsung tersaji tanpa gangguan.
                </p>
                <p
                    class="font-bold text-gray-800 mt-8"
                    data-aos="fade-up"
                    >Coba layanan kami sekarang dan rasakan bedanya!
                </p>
            </div>
            <div data-aos="fade-left" class="w-full md:w-4/12 px-4 mr-auto ml-auto">
                <div
                    class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-gray-100"
                >
                    <img
                    alt="..."
                    src="{{ asset('assets/img/service3.jpg')}}"
                    />
                    <blockquote class="relative p-8 mb-4">
                    <svg
                        preserveAspectRatio="none"
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 583 95"
                        class="absolute left-0 w-full block"
                        style="height: 95px; top: -94px;"
                    >
                        <polygon
                        points="-30,95 583,95 583,65"
                        class="text-gray-100 fill-current"
                        ></polygon>
                    </svg>
                    <h4 class="text-xl font-bold text-gray-800">
                        <Section>Streaming Bola</Section>
                    </h4>
                    <p class="text-md font-light mt-2 text-gray-800">
                        Koneksi cepat dan stabil adalah kunci sukses siaran langsung dan kami hadir untuk itu.
                    </p>
                    </blockquote>
                </div>
            </div>
        </div>
    </div>
</section>
