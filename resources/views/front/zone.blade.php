<!DOCTYPE html>
<html>
<head>
  <title>ISP Zone Checker</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
  @vite('resources/css/app.css')
</head>
<body class="h-screen">
  <div id="map" class="w-full h-screen"></div>
  <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
  <script src="https://unpkg.com/@turf/turf/turf.min.js"></script>
  <script>
    const map = L.map('map').setView([-0.9335071306709825, 100.36164919390865], 13);
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(map);

    fetch('/zones')
      .then(res => res.json())
      .then(zones => {
        zones.forEach(zone => {
          const geojson = JSON.parse(zone.geojson);
          const polygon = turf.polygon(geojson.coordinates);
          L.geoJSON(geojson, {
            onEachFeature: function (feature, layer) {
              layer.bindPopup(`<strong>${zone.name}</strong><br>
              Status: ${zone.status}<br>
              Layanan: ${zone.services_available}`);
            }
          }).addTo(map);
        });
      });
  </script>
</body>
</html>
