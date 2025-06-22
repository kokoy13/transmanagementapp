    <!-- Navigation Header -->
    <nav id="navbar" class="fixed top-0 w-full z-[999999999] py-3 h-22 bg-gray-800">
        <!-- Floating Alert for Session Messages -->
        <div class="fixed top-24 right-1/2 translate-x-1/2 z-[9999999999] space-y-2">

            {{-- Success Alert --}}
            @if(session('success'))
                <div
                    x-data="{ show: true }"
                    x-init="setTimeout(() => show = false, 5000)"
                    x-show="show"
                    x-transition
                    class="bg-green-500 text-white px-6 py-4 rounded-lg shadow-lg transition-all ease-in-out duration-300"
                >
                    <strong>Sukses!</strong> {{ session('success') }}
                </div>
            @endif

            {{-- Error Alert --}}
            @if(session('error'))
                <div
                    x-data="{ show: true }"
                    x-init="setTimeout(() => show = false, 5000)"
                    x-show="show"
                    x-transition
                    class="bg-red-500 text-white px-6 py-4 rounded-lg shadow-lg transition-all ease-in-out duration-300"
                >
                    <strong>Gagal!</strong> {{ session('error') }}
                </div>
            @endif

        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16 lg:h-20">

                <!-- Logo Section -->
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

                <!-- Desktop Navigation -->
                <div class="hidden lg:flex items-center space-x-8">
                    <!-- Tentang Kami Dropdown -->
                    <div class="relative" x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false">
                        <button class="flex items-center space-x-1 text-white hover:text-blue-400 transition-colors duration-200 font-medium py-2">
                            <span>Tentang Kami</span>
                            <i class="fas fa-chevron-down text-xs transition-transform duration-200" :class="{ 'rotate-180': open }"></i>
                        </button>
                        <div x-cloak class="absolute top-full left-0 mt-2 w-48 bg-white rounded-lg shadow-xl transition-all duration-200 transform"
                             :class="open ? 'opacity-100 visible translate-y-0' : 'opacity-0 invisible translate-y-2'">
                            <div class="py-2">
                                {{-- Sejarah Perusahan --}}
                                <a href="{{ route('sejarah-perusahaan') }}" class="block px-4 py-2 text-gray-700 hover:bg-blue-50 hover:text-blue-500! transition-colors duration-200">Sejarah Perusahaan</a>
                                {{-- Visi Misi --}}
                                <a href="{{ route('visimisi') }}" class="block px-4 py-2 text-gray-700 hover:bg-blue-50 hover:text-blue-500! transition-colors duration-200">Visi dan Misi</a>
                                {{-- Budaya Perusahan --}}
                                <a href="{{ route('budaya-perusahaan') }}" class="block px-4 py-2 text-gray-700 hover:bg-blue-50 hover:text-blue-500! transition-colors duration-200">Budaya Perusahaan</a>
                            </div>
                        </div>
                    </div>

                    <a href="/packets" class="@if(request()->is('packets') || request()->is('packet-search')) text-blue-500! @else text-white hover:text-blue-500! transition-colors duration-200 @endif font-medium">Layanan Kami</a>
                    <a href="{{ route('news') }}" class="@if(Route::is('news') || Route::is('search.news')) text-blue-500 @else text-white hover:text-blue-500! transition-colors duration-200 @endif font-medium">Berita Terbaru</a>
                    <a href="{{ route('contact') }}" class="text-white hover:text-blue-500! transition-colors duration-200 font-medium">Contact</a>

                    <!-- User Profile / Login -->
                    <div class="flex items-center space-x-4">
                        <!-- User Profile Dropdown (when logged in) -->
                        @if(Auth::check())
                            <!-- User Profile Dropdown (when logged in) -->
                            <div x-data="{ isOpen: false, openedWithKeyboard: false }" x-on:keydown.esc.window="isOpen = false, openedWithKeyboard = false" class="relative w-fit">
                                <!-- Toggle Button -->
                                <button type="button" x-on:click="isOpen = ! isOpen" x-on:keydown.space.prevent="openedWithKeyboard = true" x-on:keydown.enter.prevent="openedWithKeyboard = true" x-on:keydown.down.prevent="openedWithKeyboard = true" class="inline-flex items-center relative gap-2 whitespace-nowrap px-4 py-2 text-sm font-medium tracking-wide transition hover:opacity-75" x-bind:aria-expanded="isOpen || openedWithKeyboard" aria-haspopup="true">
                                    {{-- <div class="p-2 bg-blue-500 rounded-full absolute top-1 left-10"></div> --}}
                                    <img class="w-8 h-8 rounded-full" src="{{ Auth::user()->avatar }}" alt="">
                                    <svg aria-hidden="true" fill="none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="size-4 rotate-0 text-white">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5"/>
                                    </svg>
                                </button>
                                <!-- Dropdown Menu -->
                                <div x-cloak x-show="isOpen || openedWithKeyboard" x-transition x-trap="openedWithKeyboard" x-on:click.outside="isOpen = false, openedWithKeyboard = false" x-on:keydown.down.prevent="$focus.wrap().next()" x-on:keydown.up.prevent="$focus.wrap().previous()" class="absolute top-12 right-0 flex w-fit min-w-48 flex-col divide-y divide-outline overflow-hidden rounded-radius border border-outline bg-surface-alt" role="menu">
                                    <!-- Dropdown Section -->
                                    <div class="flex flex-col py-1.5">
                                        <a href="{{ route('profile') }}" class="flex items-center gap-2 bg-surface-alt px-4 py-2 text-sm text-gray-800 hover:bg-surface-dark-alt/5 hover:text-on-surface-strong focus-visible:bg-surface-dark-alt/10 focus-visible:text-on-surface-strong focus-visible:outline-hidden " role="menuitem">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true" fill="currentColor"  class="size-4">
                                                <path fill-rule="evenodd" d="M7.5 6a4.5 4.5 0 119 0 4.5 4.5 0 01-9 0zM3.751 20.105a8.25 8.25 0 0116.498 0 .75.75 0 01-.437.695A18.683 18.683 0 0112 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 01-.437-.695z" clip-rule="evenodd"/>
                                            </svg>
                                            Profile
                                        </a>
                                        <a href="{{ route('order.check') }}" class="flex items-center gap-2 bg-surface-alt px-4 py-2 text-sm text-on-surface hover:bg-surface-dark-alt/5 hover:text-on-surface-strong focus-visible:bg-surface-dark-alt/10 focus-visible:text-on-surface-strong focus-visible:outline-hidden " role="menuitem">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bag-fill" viewBox="0 0 16 16">
                                                <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1m3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4z"/>
                                            </svg>
                                            My Orders
                                        </a>
                                        <a href="{{ route('notifications') }}" class="flex items-center gap-2 bg-surface-alt px-4 py-2 text-sm text-on-surface hover:bg-surface-dark-alt/5 hover:text-on-surface-strong focus-visible:bg-surface-dark-alt/10 focus-visible:text-on-surface-strong focus-visible:outline-hidden " role="menuitem">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bell-fill" viewBox="0 0 16 16">
                                                <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2m.995-14.901a1 1 0 1 0-1.99 0A5 5 0 0 0 3 6c0 1.098-.5 6-2 7h14c-1.5-1-2-5.902-2-7 0-2.42-1.72-4.44-4.005-4.901"/>
                                            </svg>
                                            <div class="flex justify-between items-center w-full">
                                                <h1>Notifications</h1>
                                            </div>
                                        </a>
                                        <a href="{{ route('requests') }}" class="flex items-center gap-2 bg-surface-alt px-4 py-2 text-sm text-on-surface hover:bg-surface-dark-alt/5 hover:text-on-surface-strong focus-visible:bg-surface-dark-alt/10 focus-visible:text-on-surface-strong focus-visible:outline-hidden " role="menuitem">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-fill" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd" d="M15.528 2.973a.75.75 0 0 1 .472.696v8.662a.75.75 0 0 1-.472.696l-7.25 2.9a.75.75 0 0 1-.557 0l-7.25-2.9A.75.75 0 0 1 0 12.331V3.669a.75.75 0 0 1 .471-.696L7.443.184l.004-.001.274-.11a.75.75 0 0 1 .558 0l.274.11.004.001zm-1.374.527L8 5.962 1.846 3.5 1 3.839v.4l6.5 2.6v7.922l.5.2.5-.2V6.84l6.5-2.6v-.4l-.846-.339Z"/>
                                            </svg>
                                            <div class="flex justify-between items-center w-full">
                                                <h1>Request</h1>
                                            </div>
                                        </a>
                                    </div>
                                    <!-- Dropdown Section -->
                                    <div class="flex flex-col py-1.5">
                                        <a href="{{ route('logout') }}" class="flex items-center gap-2 bg-surface-alt px-4 py-2 text-sm text-on-surface hover:bg-surface-dark-alt/5 hover:text-on-surface-strong focus-visible:bg-surface-dark-alt/10 focus-visible:text-on-surface-strong focus-visible:outline-hidden " role="menuitem">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true" fill="currentColor"  class="size-4">
                                                <path fill-rule="evenodd" d="M7.5 6a4.5 4.5 0 119 0 4.5 4.5 0 01-9 0zM3.751 20.105a8.25 8.25 0 0116.498 0 .75.75 0 01-.437.695A18.683 18.683 0 0112 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 01-.437-.695z" clip-rule="evenodd"/>
                                            </svg>
                                            Log out
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @else
                            <!-- Login Button (when not logged in) -->
                            <div id="loginButton">
                                <a href="/sign-in" class="bg-blue-600 text-white px-6 py-2 rounded-full hover:bg-blue-700 hover:shadow-lg hover:scale-105 transition-all duration-200 font-medium">
                                    <i class="fas fa-sign-in-alt mr-2"></i>Login
                                </a>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Mobile Menu Button -->
                <div class="lg:hidden">
                    <button id="mobileMenuBtn" class="text-white hover:text-blue-400 focus:outline-none transition-colors duration-200 p-2">
                        <i id="menuIcon" class="fas fa-bars text-xl"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Navigation Menu -->
        <div id="mobileMenu" class="lg:hidden bg-gray-800/95 backdrop-blur-md border-t border-gray-700/50 transform -translate-y-full opacity-0 transition-all duration-300 ease-in-out overflow-hidden">
            <div class="px-4 py-6 space-y-4 max-h-screen overflow-y-auto">

                <!-- Mobile Tentang Kami Dropdown -->
                <div>
                    <button id="tentangKamiBtn" class="flex items-center justify-between w-full text-white font-medium py-3 border-b border-gray-700/50">
                        <span>Tentang Kami</span>
                        <i id="tentangKamiIcon" class="fas fa-chevron-down text-sm transition-transform duration-200"></i>
                    </button>
                    <div id="tentangKamiDropdown" class="hidden pl-4 mt-2 space-y-2 pb-2">
                        <a href="/aboutus" class="block text-gray-300 hover:text-white py-2 transition-colors duration-200">
                            <i class="fas fa-history mr-2 text-blue-400"></i>Sejarah Perusahaan



                        </a>
                        <a href="/visimisi" class="block text-gray-300 hover:text-white py-2 transition-colors duration-200">
                            <i class="fas fa-eye mr-2 text-blue-400"></i>Visi dan Misi


                        </a>
                        <a href="/companyculture" class="block text-gray-300 hover:text-white py-2 transition-colors duration-200">
                            <i class="fas fa-users mr-2 text-blue-400"></i>Budaya Perusahaan


                        </a>
                    </div>
                </div>

                <!-- Mobile Navigation Links -->
                <a href="/layanan" class="block text-white font-medium py-3 border-b border-gray-700/50 hover:text-blue-400 transition-colors duration-200">
                    <i class="fas fa-cogs mr-2 text-blue-400"></i>Layanan Kami
                </a>
                <a href="/organisasi" class="block text-white font-medium py-3 border-b border-gray-700/50 hover:text-blue-400 transition-colors duration-200">
                    <i class="fas fa-sitemap mr-2 text-blue-400"></i>Organisasi Perusahaan
                </a>
                <a href="/referensi" class="block text-white font-medium py-3 border-b border-gray-700/50 hover:text-blue-400 transition-colors duration-200">
                    <i class="fas fa-star mr-2 text-blue-400"></i>Referensi
                </a>
                <a href="/kontak" class="block text-white font-medium py-3 border-b border-gray-700/50 hover:text-blue-400 transition-colors duration-200">
                    <i class="fas fa-phone mr-2 text-blue-400"></i>Kontak
                </a>

                <!-- Mobile User Section -->
                <div class="pt-4 border-t border-gray-700">
                    <!-- Mobile User Profile (when logged in) -->
                    <div class="hidden" id="mobileUserProfile">
                        <div class="flex items-center space-x-3 mb-4 p-3 bg-gray-700/50 rounded-lg">
                            <img src="/placeholder.svg?height=40&width=40" alt="Avatar" class="w-10 h-10 rounded-full border-2 border-gray-600">
                            <div>
                                <p class="text-white font-medium">John Doe</p>
                                <p class="text-gray-400 text-sm">john@example.com</p>
                            </div>
                        </div>
                        <div class="space-y-2">
                            <a href="/profile" class="block text-gray-300 hover:text-white py-2 transition-colors duration-200">
                                <i class="fas fa-user mr-2 text-blue-400"></i>Profile




                            </a>
                            <a href="/orders" class="block text-gray-300 hover:text-white py-2 transition-colors duration-200">
                                <i class="fas fa-shopping-bag mr-2 text-blue-400"></i>My Orders
                            </a>
                            <a href="/notifications" class="block text-gray-300 hover:text-white py-2 transition-colors duration-200">
                                <i class="fas fa-bell mr-2 text-blue-400"></i>Notifications
                            </a>
                            <button onclick="logout()" class="block text-red-400 hover:text-red-300 py-2 transition-colors duration-200">
                                <i class="fas fa-sign-out-alt mr-2"></i>Logout
                            </button>
                        </div>
                    </div>

                    <!-- Mobile Login Button (when not logged in) -->
                    <div id="mobileLoginButton">
                        <a href="/login" class="block w-full bg-gradient-to-r from-blue-500 to-blue-600 text-white text-center py-3 rounded-lg font-medium hover:shadow-lg transition-all duration-200">
                            <i class="fas fa-sign-in-alt mr-2"></i>Login
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <script>
        // Mobile Menu Toggle
        const mobileMenuBtn = document.getElementById('mobileMenuBtn');
        const mobileMenu = document.getElementById('mobileMenu');
        const menuIcon = document.getElementById('menuIcon');
        let isMobileMenuOpen = false;

        mobileMenuBtn.addEventListener('click', () => {
            isMobileMenuOpen = !isMobileMenuOpen;

            if (isMobileMenuOpen) {
                mobileMenu.classList.remove('-translate-y-full', 'opacity-0');
                mobileMenu.classList.add('translate-y-0', 'opacity-100');
                menuIcon.classList.remove('fa-bars');
                menuIcon.classList.add('fa-times');
                document.body.style.overflow = 'hidden'; // Prevent body scroll
            } else {
                mobileMenu.classList.remove('translate-y-0', 'opacity-100');
                mobileMenu.classList.add('-translate-y-full', 'opacity-0');
                menuIcon.classList.remove('fa-times');
                menuIcon.classList.add('fa-bars');
                document.body.style.overflow = 'auto'; // Restore body scroll
            }
        });

        // Mobile Dropdown Toggle
        const tentangKamiBtn = document.getElementById('tentangKamiBtn');
        const tentangKamiDropdown = document.getElementById('tentangKamiDropdown');
        const tentangKamiIcon = document.getElementById('tentangKamiIcon');

        tentangKamiBtn.addEventListener('click', () => {
            tentangKamiDropdown.classList.toggle('hidden');
            tentangKamiIcon.classList.toggle('rotate-180');
        });

        // Close mobile menu when clicking outside
        document.addEventListener('click', (e) => {
            if (!mobileMenuBtn.contains(e.target) && !mobileMenu.contains(e.target) && isMobileMenuOpen) {
                mobileMenuBtn.click();
            }
        });

        // Close mobile menu when window is resized to desktop
        window.addEventListener('resize', () => {
            if (window.innerWidth >= 1024 && isMobileMenuOpen) {
                mobileMenuBtn.click();
            }
        });

        // Demo Functions
        let isLoggedIn = false;

        function toggleAuth() {
            isLoggedIn = !isLoggedIn;
            const userProfile = document.getElementById('userProfile');
            const loginButton = document.getElementById('loginButton');
            const mobileUserProfile = document.getElementById('mobileUserProfile');
            const mobileLoginButton = document.getElementById('mobileLoginButton');

            if (isLoggedIn) {
                userProfile.classList.remove('hidden');
                loginButton.classList.add('hidden');
                mobileUserProfile.classList.remove('hidden');
                mobileLoginButton.classList.add('hidden');
            } else {
                userProfile.classList.add('hidden');
                loginButton.classList.remove('hidden');
                mobileUserProfile.classList.add('hidden');
                mobileLoginButton.classList.remove('hidden');
            }
        }

        // Prevent scroll when mobile menu is open
        function preventScroll(e) {
            if (isMobileMenuOpen) {
                e.preventDefault();
            }
        }

        // Add touch event listeners for mobile
        document.addEventListener('touchmove', preventScroll, { passive: false });
    </script>


