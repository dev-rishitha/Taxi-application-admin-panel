<x-layout>
    <x-slot name="heading">
        <h1 class="text-2xl font-bold">📍 Location Map</h1>
    </x-slot>

    <div id="map" class="w-full h-[600px] rounded shadow"></div>

    <script
        src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"
        integrity="sha256-GZC1lZRYC52IOLYe0yoyS9MhUlCT3ocOIT0zj8H2ZgI="
        crossorigin=""
    ></script>
    <link
        rel="stylesheet"
        href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css"
        integrity="sha256-sA+z0kCWy63HgNbUsVTN4tbkwh28ykVZCENKz+LWjzM="
        crossorigin=""
    />

    <script>
        // Initialize map centered on India as default
        var map = L.map('map').setView([20.5937, 78.9629], 5);

        // Add OpenStreetMap tiles
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 18,
        }).addTo(map);

        // Locations data from Laravel backend
        var locations = @json($locations);

        // Loop through locations and add markers
        locations.forEach(location => {
            if (location.latitude && location.longitude) {
                L.marker([location.latitude, location.longitude])
                    .addTo(map)
                    .bindPopup(`<b>${location.name}</b><br>${location.city}<br>Fare: ₹${location.base_fare}`);
            }
        });
    </script>
</x-layout>
