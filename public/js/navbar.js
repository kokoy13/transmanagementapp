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

        // Navbar Scroll Effect
        let lastScrollTop = 0;
        const navbar = document.getElementById('navbar');

        window.addEventListener('scroll', () => {
            const scrollTop = window.pageYOffset || document.documentElement.scrollTop;

            if (scrollTop > 100) {
                navbar.classList.add('bg-gray-900/95');
                navbar.classList.remove('bg-gray-800/95');
            } else {
                navbar.classList.remove('bg-gray-900/95');
                navbar.classList.add('bg-gray-800/95');
            }

            lastScrollTop = scrollTop;
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

        function logout() {
            if (isLoggedIn) {
                toggleAuth();
            }
        }

        function changeNavbarColor() {
            const colors = ['bg-gray-800/95', 'bg-blue-800/95', 'bg-purple-800/95', 'bg-green-800/95'];
            const currentColor = navbar.className.match(/bg-\w+-\d+\/\d+/)[0];
            const currentIndex = colors.indexOf(currentColor);
            const nextIndex = (currentIndex + 1) % colors.length;

            navbar.classList.remove(currentColor);
            navbar.classList.add(colors[nextIndex]);
        }

        // Prevent scroll when mobile menu is open
        function preventScroll(e) {
            if (isMobileMenuOpen) {
                e.preventDefault();
            }
        }

        // Add touch event listeners for mobile
        document.addEventListener('touchmove', preventScroll, { passive: false });
