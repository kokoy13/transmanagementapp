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

L.Icon.Default.mergeOptions({
  iconRetinaUrl: require('leaflet/dist/images/marker-icon-2x.png'),
  iconUrl: require('leaflet/dist/images/marker-icon.png'),
  shadowUrl: require('leaflet/dist/images/marker-shadow.png'),
});
