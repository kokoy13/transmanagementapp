document.addEventListener('DOMContentLoaded', function () {
        const map = L.map('map').setView([-0.9335071306709825, 100.36164919390865], 13);
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(map);

        const polygonCoords = [
            [-0.9014396915394911, 100.35072286718808],
            [-0.9657901377779751, 100.35414031217988],
            [-0.9479015337884592, 100.37713047995359],
            [-0.8969057457528835, 100.36307470794728]
        ];
        // Tambahkan polygon ke peta
        const polygon = L.polygon(polygonCoords, {
            color: 'green',
            fillColor: '#22c55e',
            fillOpacity: 0.3
        }).addTo(map);

        polygon.bindPopup(`
            <strong>Zona Manual</strong><br>
            Status: Aktif<br>
            Layanan: Fiber Optic
        `);
    });
