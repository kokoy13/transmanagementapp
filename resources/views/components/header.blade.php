<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Header - TransNet Sumbar</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#4338ca',
                        secondary: '#8b5cf6',
                        accent: '#f59e0b',
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-gray-100 min-h-screen">
    <!-- Navigation Header -->
    <nav id="navbar" class="fixed top-0 w-full z-50 transition-all duration-300 ease-in-out bg-gray-800/95 backdrop-blur-md border-b border-gray-700/50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16 lg:h-20">
                
                <!-- Logo Section -->
                    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16 lg:h-20">
                      <div
            class="container w-full px-18 flex items-center justify-between"
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


                <!-- Desktop Navigation -->
                <div class="hidden lg:flex items-center space-x-8">
                    <!-- Tentang Kami Dropdown -->
                    <div class="relative group">
                        <button class="flex items-center space-x-1 text-white hover:text-blue-400 transition-colors duration-200 font-medium py-2">
                            <span>Tentang Kami</span>
                            <i class="fas fa-chevron-down text-xs transition-transform duration-200 group-hover:rotate-180"></i>
                        </button>
                        <div class="absolute top-full left-0 mt-2 w-48 bg-white rounded-lg shadow-xl opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 transform translate-y-2 group-hover:translate-y-0">
                            <div class="py-2">
                                <a href="/aboutus" class="block px-4 py-2 text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-colors duration-200">Sejarah Perusahaan</a>
                                <a href="/visimisi" class="block px-4 py-2 text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-colors duration-200">Visi dan Misi</a>
                                <a href="/companyculture" class="block px-4 py-2 text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-colors duration-200">Budaya Perusahaan</a>
                            </div>
                        </div>
                    </div>

                    <a href="/layanan" class="text-white hover:text-blue-400 transition-colors duration-200 font-medium">Layanan Kami</a>
                    <a href="/organisasi" class="text-white hover:text-blue-400 transition-colors duration-200 font-medium">Organisasi Perusahaan</a>
                    <a href="/referensi" class="text-white hover:text-blue-400 transition-colors duration-200 font-medium">Referensi</a>
                    <a href="/kontak" class="text-white hover:text-blue-400 transition-colors duration-200 font-medium">Kontak</a>

                    <!-- User Profile / Login -->
                    <div class="flex items-center space-x-4">
                        <!-- User Profile Dropdown (when logged in) -->
                        <div class="relative group hidden" id="userProfile">
                            <button class="flex items-center space-x-2 text-white hover:text-blue-400 transition-colors duration-200">
                                <img src="/placeholder.svg?height=32&width=32" alt="Avatar" class="w-8 h-8 rounded-full border-2 border-gray-600">
                                <i class="fas fa-chevron-down text-xs"></i>
                            </button>
                            <div class="absolute top-full right-0 mt-2 w-48 bg-white rounded-lg shadow-xl opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200">
                                <div class="py-2">
                                    <a href="/profile" class="block px-4 py-2 text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-colors duration-200">
                                        <i class="fas fa-user mr-2"></i>Profile
                                    </a>
                                    <a href="/orders" class="block px-4 py-2 text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-colors duration-200">
                                        <i class="fas fa-shopping-bag mr-2"></i>My Orders
                                    </a>
                                    <a href="/notifications" class="block px-4 py-2 text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-colors duration-200">
                                        <i class="fas fa-bell mr-2"></i>Notifications
                                    </a>
                                    <hr class="my-2">
                                    <button onclick="logout()" class="block w-full text-left px-4 py-2 text-red-600 hover:bg-red-50 transition-colors duration-200">
                                        <i class="fas fa-sign-out-alt mr-2"></i>Logout
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Login Button (when not logged in) -->
                        <div id="loginButton">
                            <a href="/login" class="bg-blue-600 text-white px-6 py-2 rounded-full hover:bg-blue-700 hover:shadow-lg hover:scale-105 transition-all duration-200 font-medium">
                                <i class="fas fa-sign-in-alt mr-2"></i>Login
                            </a>
                        </div>
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

</body>
</html>
