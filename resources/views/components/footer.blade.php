<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modern Footer</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: {
                            50: '#eff6ff',
                            500: '#3b82f6',
                            600: '#2563eb',
                            700: '#1d4ed8',
                            900: '#1e3a8a'
                        },
                        gray: {
                            750: '#374151'
                        }
                    }
                }
            }
        }
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-gray-100">

    <!-- Footer -->
    <footer class="relative bg-gray-750 text-white overflow-hidden">
        <!-- Background Pattern -->
        <div class="absolute inset-0 bg-black/20"></div>
        <div class="absolute inset-0 bg-[url('data:image/svg+xml,%3Csvg width="60 height="60" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg"%3E%3Cg fill="none" fill-rule="evenodd"%3E%3Cg fill="%239C92AC" fill-opacity="0.05"%3E%3Ccircle cx="30" cy="30" r="2"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E')] opacity-40"></div>
        
        <div class="relative z-10">
            <!-- Main Footer Content -->
            <div class="container mx-auto px-6 pt-16 pb-8">
                <div class="grid gap-12 lg:grid-cols-12 mb-12">
                    <!-- Company Info -->
                    <div class="lg:col-span-4 flex flex-col justify-center">
                        <div class="mb-6">
                            <div class="flex items-center justify-center space-x-3 mb-4">
                                <a href="#">
                                    <img src="/assets/img/logo.png" class="w-48  " alt="">
                                </a>
                            </div>
                            <div class="space-y-4 text-gray-300 leading-relaxed">
                                 <p class="text-sm text-justify">
                                     PT. Marawa Transmisi Media (Transnet) didirikan pada Maret 2019 oleh para profesional berpengalaman di bidang Telekomunikasi dan Informatika, dengan tujuan memberikan solusi bagi sektor Telekomunikasi dan IT di Indonesia.
                                </p>
                            </div>
                        </div>
                        
                        <!-- Social Media -->
                        <div class="flex gap-5 justify-center">
                            <a href="https://wa.me/6282382541525" class="w-10 h-10 bg-white/10 backdrop-blur-sm rounded-full flex items-center justify-center hover:bg-green-500 transition-all duration-300 group">
                                <i class="fab fa-whatsapp text-lg text-white group-hover:scale-110 transition-transform"></i>
                            </a>
                            <a href="https://instagram.com/transnetofficial" class="w-10 h-10 bg-white/10 backdrop-blur-sm rounded-full flex items-center justify-center hover:bg-pink-500 transition-all duration-300 group">
                                <i class="fab fa-instagram text-sm group-hover:scale-110 transition-transform"></i>
                            </a>
                            <a href="https://www.facebook.com/transnetofficial" class="w-10 h-10 bg-white/10 backdrop-blur-sm rounded-full flex items-center justify-center hover:bg-blue-500 transition-all duration-300 group">
                                <i class="fab fa-facebook text-sm group-hover:scale-110 transition-transform"></i>
                            </a>
                        </div>
                    </div>

                    <!-- Links Grid -->
                    <div class="lg:col-span-8">
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                            <!-- About Us -->
                            <div class="space-y-4">
                                <h3 class="text-lg font-semibold text-white mb-4 relative">
                                    About Us
                                    <div class="absolute -bottom-2 left-0 w-12 h-0.5 bg-gradient-to-r from-blue-500 to-purple-500 rounded-full"></div>
                                </h3>
                                <ul class="space-y-3">
                                    <li><a class="text-gray-300 hover:text-white hover:translate-x-1 transition-all duration-200 flex items-center group">
                                        <i class="fas fa-chevron-right text-xs mr-2 group-hover:text-blue-400"></i>Tentang Kami
                                    </a></li>
                                    <li><a class="text-gray-300 hover:text-white hover:translate-x-1 transition-all duration-200 flex items-center group">
                                        <i class="fas fa-chevron-right text-xs mr-2 group-hover:text-blue-400"></i>Layanan kami
                                    </a></li>
                                    <li><a class="text-gray-300 hover:text-white hover:translate-x-1 transition-all duration-200 flex items-center group">
                                        <i class="fas fa-chevron-right text-xs mr-2 group-hover:text-blue-400"></i>Organisasi Perusahaan
                                    </a></li>
                                    <li><a class="text-gray-300 hover:text-white hover:translate-x-1 transition-all duration-200 flex items-center group">
                                        <i class="fas fa-chevron-right text-xs mr-2 group-hover:text-blue-400"></i>Referensi
                                    </a></li>
                                    <li><a class="text-gray-300 hover:text-white hover:translate-x-1 transition-all duration-200 flex items-center group">
                                        <i class="fas fa-chevron-right text-xs mr-2 group-hover:text-blue-400"></i>Kontak
                                    </a></li>
                                </ul>
                            </div>

                            <!-- Job Vacancy -->
                            <div class="space-y-4">
                                <h3 class="text-lg font-semibold text-white mb-4 relative">
                                    Job Vacancy
                                    <div class="absolute -bottom-2 left-0 w-12 h-0.5 bg-gradient-to-r from-blue-500 to-purple-500 rounded-full"></div>
                                </h3>
                                <ul class="space-y-3">
                                    <li><a class="text-gray-300 hover:text-white hover:translate-x-1 transition-all duration-200 flex items-center group">
                                        <i class="fas fa-chevron-right text-xs mr-2 group-hover:text-blue-400"></i>Programmer
                                    </a></li>
                                    <li><a class="text-gray-300 hover:text-white hover:translate-x-1 transition-all duration-200 flex items-center group">
                                        <i class="fas fa-chevron-right text-xs mr-2 group-hover:text-blue-400"></i>Admin
                                    </a></li>
                                    <li><a class="text-gray-300 hover:text-white hover:translate-x-1 transition-all duration-200 flex items-center group">
                                        <i class="fas fa-chevron-right text-xs mr-2 group-hover:text-blue-400"></i>SPG Reguler & Event
                                    </a></li>
                                    <li><a class="text-gray-300 hover:text-white hover:translate-x-1 transition-all duration-200 flex items-center group">
                                        <i class="fas fa-chevron-right text-xs mr-2 group-hover:text-blue-400"></i>Sekretaris
                                    </a></li>
                                    <li><a href="#" class="text-blue-400 hover:text-blue-300 hover:translate-x-1 transition-all duration-200 flex items-center group font-medium">
                                        <i class="fas fa-chevron-right text-xs mr-2"></i>View All
                                    </a></li>
                                </ul>
                            </div>

                            <!-- Contact -->
                            <div class="space-y-4">
                                <h3 class="text-lg font-semibold text-white mb-4 relative">
                                    Contact
                                    <div class="absolute -bottom-2 left-0 w-12 h-0.5 bg-gradient-to-r from-blue-500 to-purple-500 rounded-full"></div>
                                </h3>
                                <div class="space-y-4">
                                    <!-- Head Office -->
                                    <div class="space-y-2">
                                        <p class="text-white font-medium text-sm">Head Office:</p>
                                        <p class="text-gray-300 text-sm leading-relaxed">
                                            Batang Anai 2A Komplek GOR Haji Agus Salim<br>
                                            Padang, Sumatra Barat
                                        </p>
                                    </div>

                                    <!-- Contact Info -->
                                    <div class="space-y-3">
                                        <a href="tel:0751-8959999" class="flex items-center space-x-3 text-gray-300 hover:text-white transition-colors group">
                                            <div class="w-8 h-8 bg-green-500/20 rounded-lg flex items-center justify-center group-hover:bg-green-500/30 transition-colors">
                                                <i class="fas fa-phone text-green-400 text-sm"></i>
                                            </div>
                                            <span class="text-sm">0751-8959999</span>
                                        </a>

                                        <a href="https://wa.me/6282382541525" class="flex items-center space-x-3 text-gray-300 hover:text-white transition-colors group">
                                            <div class="w-8 h-8 bg-green-500/20 rounded-lg flex items-center justify-center group-hover:bg-green-500/30 transition-colors">
                                                <i class="fab fa-whatsapp text-green-400 text-sm"></i>
                                            </div>
                                            <span class="text-sm">+62 823-8254-1525</span>
                                        </a>

                                        <a href="mailto:admin@transnetsumbar.id" class="flex items-center space-x-3 text-gray-300 hover:text-white transition-colors group">
                                            <div class="w-8 h-8 bg-green-500/20 rounded-lg flex items-center justify-center group-hover:bg-green-500/30 transition-colors">
                                                <i class="fas fa-envelope text-green-400 text-sm"></i>
                                            </div>
                                            <span class="text-sm">admin@transnetsumbar.id</span>
                                        </a>
                                        <a  href="mailto:marawatransmisimedia@gmail.com" class="flex items-center space-x-3 text-gray-300 hover:text-white transition-colors group">
                                            <span class="text-sm">marawatransmisimedia@gmail.com</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Bottom Bar -->
                <div class="border-t border-white/10 pt-8">
                    <div class="text-center">
                        <div class="text-gray-400 text-sm mb-4">
                            © 2025 Transnet Sumbar. All rights reserved.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>