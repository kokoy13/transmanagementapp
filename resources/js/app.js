import './bootstrap';
import AOS from 'aos';
import 'aos/dist/aos.css';
import Alpine from 'alpinejs'
import 'leaflet/dist/leaflet.js';
import 'leaflet/dist/leaflet.css';

// (Optional fix for marker icon path if needed)
import L from 'leaflet';
delete L.Icon.Default.prototype._getIconUrl;

AOS.init({
    duration: 800, // opsional
});

window.Alpine = Alpine
Alpine.start()


