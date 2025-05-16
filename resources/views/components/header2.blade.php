
    <nav

        class="flex flex-wrap items-center justify-center px-2 py-6 fixed top-0 w-full transition-colors duration-800 ease-in-out z-50 bg-gray-800"
    >
        <div
            class="container w-full px-18 flex tems-center justify-between"
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
                        <a href="/packets" class="text-white font-bold md:text-xl lg:text-lg">
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
                    @if(Auth::check())
                        <div data-aos="fade-down" x-data="{ open: false }" class="relative">
                            <img @click="open = !open" src="{{ Auth::user()->avatar }}" alt="Avatar" class="rounded-full w-10 h-10 cursor-pointer">
                            <div x-show="open" @click.away="open = false" class="absolute right-0 mt-2 w-48 bg-white rounded shadow-lg z-10">
                                <a href="/dashboard" class="block px-4 py-2 hover:bg-gray-100">Dashboard</a>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="block w-full text-left px-4 py-2 hover:bg-gray-100">Logout</button>
                                </form>
                            </div>
                        </div>
                    @else
                        <li data-aos="fade-down" class="flex items-center">
                            <a href="/sign-in"
                                class="bg-white text-gray-800 active:bg-gray-100 text-xs font-bold uppercase px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none lg:mr-1 lg:mb-0 ml-3 mb-3"
                                type="button"
                                style="transition: all 0.15s ease 0s;"
                            > Log in
                            </a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

