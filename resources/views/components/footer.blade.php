<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Footer - TransNet Sumbar</title>
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
                        orange: '#ea580c',
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-gray-50 font-sans">

    <!-- Responsive Footer -->
    <footer class="bg-gray-900 text-white">
        <!-- Main Footer Content -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                
                <!-- Company Info -->
                <div class="lg:col-span-1">
                    <!-- Logo -->
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

                    <br>

                    <!-- Company Description -->
                    <p class="text-gray-300 text-sm leading-relaxed mb-6">
                        PT. Marawa Transmisi Media (Transnet) adalah perusahaan telekomunikasi dan IT terpercaya yang berkomitmen memberikan solusi inovatif untuk masa depan yang lebih terhubung.
                    </p>
                    
                    <!-- Social Media -->
                    <div class="flex space-x-4">
                        <a href="#" class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-blue-600 transition-colors duration-200">
                            <i class="fab fa-facebook-f text-sm"></i>
                        </a>
                        <a href="#" class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-blue-400 transition-colors duration-200">
                            <i class="fab fa-twitter text-sm"></i>
                        </a>
                        <a href="#" class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-blue-700 transition-colors duration-200">
                            <i class="fab fa-linkedin-in text-sm"></i>
                        </a>
                        <a href="#" class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-pink-600 transition-colors duration-200">
                            <i class="fab fa-instagram text-sm"></i>
                        </a>
                        <a href="#" class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-green-600 transition-colors duration-200">
                            <i class="fab fa-whatsapp text-sm"></i>
                        </a>
                    </div>
                </div>

                <!-- Quick Links -->
                <div class="lg:col-span-1">
                    <h3 class="text-lg font-semibold mb-6">Menu Utama</h3>
                    <ul class="space-y-3">
                        <li>
                            <a href="#" class="text-gray-300 hover:text-white transition-colors duration-200 text-sm flex items-center">
                                <i class="fas fa-chevron-right text-xs mr-2 text-blue-400"></i>
                                Tentang Kami
                            </a>
                        </li>
                        <li>
                            <a href="#" class="text-gray-300 hover:text-white transition-colors duration-200 text-sm flex items-center">
                                <i class="fas fa-chevron-right text-xs mr-2 text-blue-400"></i>
                                Layanan Kami
                            </a>
                        </li>
                        <li>
                            <a href="#" class="text-gray-300 hover:text-white transition-colors duration-200 text-sm flex items-center">
                                <i class="fas fa-chevron-right text-xs mr-2 text-blue-400"></i>
                                Organisasi Perusahaan
                            </a>
                        </li>
                        <li>
                            <a href="#" class="text-gray-300 hover:text-white transition-colors duration-200 text-sm flex items-center">
                                <i class="fas fa-chevron-right text-xs mr-2 text-blue-400"></i>
                                Referensi
                            </a>
                        </li>
                        <li>
                            <a href="#" class="text-gray-300 hover:text-white transition-colors duration-200 text-sm flex items-center">
                                <i class="fas fa-chevron-right text-xs mr-2 text-blue-400"></i>
                                Kontak
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- Services -->
                <div class="lg:col-span-1">
                    <h3 class="text-lg font-semibold mb-6">Layanan</h3>
                    <ul class="space-y-3">
                        <li>
                            <a href="#" class="text-gray-300 hover:text-white transition-colors duration-200 text-sm flex items-center">
                                <i class="fas fa-chevron-right text-xs mr-2 text-orange-400"></i>
                                Jaringan Telekomunikasi
                            </a>
                        </li>
                        <li>
                            <a href="#" class="text-gray-300 hover:text-white transition-colors duration-200 text-sm flex items-center">
                                <i class="fas fa-chevron-right text-xs mr-2 text-orange-400"></i>
                                Solusi IT
                            </a>
                        </li>
                        <li>
                            <a href="#" class="text-gray-300 hover:text-white transition-colors duration-200 text-sm flex items-center">
                                <i class="fas fa-chevron-right text-xs mr-2 text-orange-400"></i>
                                Konsultasi Teknologi
                            </a>
                        </li>
                        <li>
                            <a href="#" class="text-gray-300 hover:text-white transition-colors duration-200 text-sm flex items-center">
                                <i class="fas fa-chevron-right text-xs mr-2 text-orange-400"></i>
                                Maintenance & Support
                            </a>
                        </li>
                        <li>
                            <a href="#" class="text-gray-300 hover:text-white transition-colors duration-200 text-sm flex items-center">
                                <i class="fas fa-chevron-right text-xs mr-2 text-orange-400"></i>
                                Training & Development
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- Contact Info -->
                <div class="lg:col-span-1">
                    <h3 class="text-lg font-semibold mb-6">Hubungi Kami</h3>
                    <div class="space-y-4">
                        <!-- Address -->
                        <div class="flex items-start space-x-3">
                            <div class="w-8 h-8 bg-gray-800 rounded-lg flex items-center justify-center flex-shrink-0 mt-0.5">
                                <i class="fas fa-map-marker-alt text-red-400 text-sm"></i>
                            </div>
                            <div class="text-sm">
                                <p class="text-gray-300 leading-relaxed">
                                    Jl. Batang Anai 2A Komplek GOR Haji Agus Salim Padang, Sumatera Barat, Indonesia
                                </p>
                            </div>
                        </div>

                        <!-- Phone -->
                        <div class="flex items-center space-x-3">
                            <div class="w-8 h-8 bg-gray-800 rounded-lg flex items-center justify-center flex-shrink-0">
                                <a href="tel:0751-8959999" i class="fas fa-phone text-green-400 text-sm"></i></a>
                            </div>
                            <div class="text-sm">
                                <a href="tel:0751-8959999" class="text-gray-300 hover:text-white transition-colors duration-200">
                                    0751-8959999
                                </a>
                            </div>
                        </div>

                        <!-- WhatsApp -->
                        <div class="flex items-center space-x-3">
                            <div class="w-8 h-8 bg-gray-800 rounded-lg flex items-center justify-center flex-shrink-0">
                                <a href="https://wa.me/6282382541525" i class="fab fa-whatsapp text-green-400 text-sm"></i></a>
                            </div>
                            <div class="text-sm">
                                <a href="https://wa.me/6282382541525" class="text-gray-300 hover:text-white transition-colors duration-200">
                                    +62 823-8254-1525
                                </a>
                            </div>
                        </div>

                        <!-- Email -->
                        <div class="flex items-start space-x-3">
                            <div class="w-8 h-8 bg-gray-800 rounded-lg flex items-center justify-center flex-shrink-0 mt-0.5">
                                <a href="mailto:marawatransmisimedia@gmail.com" i class="fas fa-envelope text-blue-400 text-sm"></i></a>
                            </div>
                            <div class="text-sm">
                                <a href="mailto:admin@transnetsumbar.id" class="text-gray-300 hover:text-white transition-colors duration-200 block">
                                    admin@transnetsumbar.id
                                </a>
                                <a href="mailto:marawatransmisimedia@gmail.com" class="text-gray-400 hover:text-gray-300 transition-colors duration-200 block">
                                    marawatransmisimedia@gmail.com
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bottom Footer -->
        <div class="border-t border-gray-800">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
                <div class="flex flex-col md:flex-row justify-between items-center space-y-4 md:space-y-0">
                  
                <!-- Copyright -->
                    <div class="w-full flex justify-center">
                        <p class="text-center text-gray-400 text-sm">
                            © 2025 <span class="text-white font-medium">PT. Marawa Transmisi Media</span>. All rights reserved.
                        </p>
                    </div>

                    
                </div>
            </div>
        </div>

        <!-- Back to Top Button -->
        <button id="backToTop" class="fixed bottom-6 right-6 w-12 h-12 bg-blue-600 text-white rounded-full shadow-lg hover:bg-blue-700 transition-all duration-200 opacity-0 invisible">
            <i class="fas fa-chevron-up"></i>
        </button>
    </footer>

    <script>
        // Back to Top Button
        const backToTopBtn = document.getElementById('backToTop');
        
        window.addEventListener('scroll', () => {
            if (window.pageYOffset > 300) {
                backToTopBtn.classList.remove('opacity-0', 'invisible');
                backToTopBtn.classList.add('opacity-100', 'visible');
            } else {
                backToTopBtn.classList.add('opacity-0', 'invisible');
                backToTopBtn.classList.remove('opacity-100', 'visible');
            }
        });
        
        backToTopBtn.addEventListener('click', () => {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    </script>
</body>
</html>

</body>
</html>