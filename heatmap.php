<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peta Waktu Tunggu BRT Trans Semarang Koridor 1</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <style>
        #map { height: 600px; }
    </style>
</head>
<body>
    <h1>Peta Waktu Tunggu BRT Trans Semarang Koridor 1</h1>
    <div id="map"></div>
    <script>
        // Inisialisasi peta
        var map = L.map('map').setView([-6.966667, 110.416664], 13);

        // Tambahkan tile layer
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        // Ambil data dari API
        fetch('datakoordinat.php')
            .then(response => response.json())
            .then(data => {
                data.forEach(item => {
                    // Buat lingkaran untuk setiap halte
                    var circle = L.circleMarker([item.lat, item.lng], {
                        radius: item.waktu_tunggu / 2, // Sesuaikan radius dengan waktu tunggu
                        color: 'red',
                        fillColor: '#f03',
                        fillOpacity: 0.5
                    }).addTo(map);

                    // Tambahkan popup dengan informasi waktu tunggu
                    circle.bindPopup(`<b>${item.halte}</b><br>Waktu tunggu: ${item.waktu_tunggu} menit`);
                });
            })
            .catch(error => console.error('Error fetching data:', error));
    </script>
</body>
</html>
