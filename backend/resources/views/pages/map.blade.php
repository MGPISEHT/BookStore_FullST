<x-layout>
    <div class="container mt-5">
        <h2>Manage Map</h2>
        <div id="map" style="height: 500px;"></div>
    </div>

    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const map = L.map('map').setView([51.505, -0.09], 13);

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
            }).addTo(map);

            L.marker([51.505, -0.09]).addTo(map)
                .bindPopup('Default Location')
                .openPopup();
        });
    </script>
</x-layout>