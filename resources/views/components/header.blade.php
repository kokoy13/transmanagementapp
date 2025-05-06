
    <nav

        class="flex flex-wrap items-center justify-between px-2 py-6 fixed top-0 w-full transition-colors duration-800 ease-in-out z-50"
        x-data="{ scrolled: false }"
        x-init="window.addEventListener('scroll', () => { scrolled = window.scrollY > 10 })"
        :class="scrolled ? 'bg-gray-800 shadow-md' : 'bg-transparent'"
    >
        @if (session('success'))
            <div class="flex items-center p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg absolute z-[99] right-1/2 translate-x-1/2" role="alert">
                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                  <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11V7a1 1 0 10-2 0v2a1 1 0 001 1h1a1 1 0 100-2h-1zm0 4a1 1 0 10-2 0v2a1 1 0 002 0v-2z" clip-rule="evenodd"></path>
                </svg>
                <span class="sr-only">Success</span>
                <div>
                    {{ session('success') }}
                </div> di tangah baa?
            </div>
        @endif
        <div
            class="container px-24 mx-auto flex flex-wrap items-center justify-between"
        >
            <div
            class="w-full relative flex justify-between lg:w-auto lg:static lg:block lg:justify-start"
            >
                <li data-aos="fade-down"
                    class="list-none"
                >
                    <a
                        href="/"
                    >
                        <img
                            src="/assets/img/logo.png"
                            alt=""
                            class="w-48"
                        >
                    </a>
                </li>
                <button
                    class="cursor-pointer md:text-xl lg:text-lg leading-none px-3 py-1 border border-solid border-transparent rounded bg-transparent block lg:hidden outline-none focus:outline-none"
                    type="button"
                    onclick="toggleNavbar('example-collapse-navbar')"
                >
                    <i class="text-white fas fa-bars"></i>
                </button>
            </div>
            <div
            class="lg:flex flex-grow items-center bg-white lg:bg-transparent lg:shadow-none hidden"
            id="example-collapse-navbar"
            >
                <ul class="flex flex-col lg:items-center gap-10 lg:flex-row list-none lg:ml-auto">
                    <li data-aos="fade-down">
                        <a href="" class="text-white font-bold md:text-xl lg:text-lg">
                            Tentang Kami
                        </a>
                    </li>
                    <li data-aos="fade-down">
                        <a href="" class="text-white font-bold md:text-xl lg:text-lg">
                            Layanan Kami
                        </a>
                    </li>
                    <li data-aos="fade-down">
                        <a href="" class="text-white font-bold md:text-xl lg:text-lg">
                            Organisasi Perusahaan
                        </a>
                    </li>
                    <li data-aos="fade-down">
                        <a href="" class="text-white font-bold md:text-xl lg:text-lg">
                            Referensi
                        </a>
                    </li>
                    <li data-aos="fade-down">
                        <a href="" class="text-white font-bold md:text-xl lg:text-lg">
                            Kontak
                        </a>
                    </li>
                    <li data-aos="fade-down" class="flex items-center">
                        <a href="/sign-in"
                            class="bg-white text-gray-800 active:bg-gray-100 text-xs font-bold uppercase px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none lg:mr-1 lg:mb-0 ml-3 mb-3"
                            type="button"
                            style="transition: all 0.15s ease 0s;"
                        > Log in
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

