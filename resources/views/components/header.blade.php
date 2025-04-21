
    <nav
        class="flex flex-wrap items-center justify-between px-2 py-6 fixed top-0 w-full transition-colors duration-800 ease-in-out z-50"
        x-data="{ scrolled: false }"
        x-init="window.addEventListener('scroll', () => { scrolled = window.scrollY > 10 })"
        :class="scrolled ? 'bg-gray-900 shadow-md' : 'bg-transparent'"
    >
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
                    class="cursor-pointer text-xl leading-none px-3 py-1 border border-solid border-transparent rounded bg-transparent block lg:hidden outline-none focus:outline-none"
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
                        <a href="" class="text-white font-bold text-xl">
                            Tentang Kami
                        </a>
                    </li>
                    <li data-aos="fade-down">
                        <a href="" class="text-white font-bold text-xl">
                            Layanan Kami
                        </a>
                    </li>
                    <li data-aos="fade-down">
                        <a href="" class="text-white font-bold text-xl">
                            Organisasi Perusahaan
                        </a>
                    </li>
                    <li data-aos="fade-down">
                        <a href="" class="text-white font-bold text-xl">
                            Referensi
                        </a>
                    </li>
                    <li data-aos="fade-down">
                        <a href="" class="text-white font-bold text-xl">
                            Kontak
                        </a>
                    </li>
                    <li data-aos="fade-down" class="flex items-center">
                        <button
                            class="bg-white text-gray-800 active:bg-gray-100 text-xs font-bold uppercase px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none lg:mr-1 lg:mb-0 ml-3 mb-3"
                            type="button"
                            style="transition: all 0.15s ease 0s;"
                        > Log in
                        </button>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

