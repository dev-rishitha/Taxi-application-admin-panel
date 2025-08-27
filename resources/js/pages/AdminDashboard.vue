<template>
  <div class="flex h-screen bg-gray-100">
    <!-- Sidebar -->
    <aside
      :class="[
        'fixed z-50 top-0 left-0 h-full bg-white shadow-md w-64 transform transition-transform duration-300 md:relative md:translate-x-0',
        isSidebarOpen ? 'translate-x-0' : '-translate-x-full'
      ]">
      <!-- <div class="p-4 flex items-center gap-1 text-xl font-bold text-yellow-500">
        <img src="/images/ux-removebg-preview.png" alt="logo" class="w-12 h-12" />
        UX<span class="text-orange-600">DriveDesk</span>
      </div> -->
      <!-- Close Button on Mobile -->
      <!-- <div class="flex justify-end md:hidden px-4 pt-2">
        <button @click="isSidebarOpen = false" class="text-gray-600 hover:text-gray-900">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
          </svg>
        </button>
      </div> -->
      <!-- Sidebar Header (Logo + Close Button in same row) -->
<div class="flex items-center justify-between px-4 pt-4 pb-3">
  <div class="flex items-center gap-2 text-xl font-bold text-yellow-500">
    <img src="/images/ux-removebg-preview.png" alt="logo" class="w-10 h-10" />
    UX<span class="text-orange-600">DriveDesk</span>
  </div>
  <button @click="isSidebarOpen = false" class="md:hidden text-gray-600 hover:text-gray-900">
    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
    </svg>
  </button>
</div>
      <nav class="mt-2 space-y-2">
        <button class="flex items-center px-6 py-2 text-gray-800 hover:bg-gray-200">Dashboard</button>
        <button class="flex items-center px-6 py-2 text-gray-800 hover:bg-gray-200">Server Monitoring</button>
        <div class="border-t my-2"></div>

        <div class="px-6 text-gray-400 text-xs uppercase">Members</div>
        <div class="flex flex-col space-y-1">
          <button class="flex items-center px-6 py-2 text-gray-800 hover:bg-gray-200">Admin</button>
          <button class="flex items-center px-6 py-2 text-gray-800 hover:bg-gray-200">Customers</button>
          <button class="flex items-center px-6 py-2 text-gray-800 hover:bg-gray-200">Drivers</button>
          <button class="flex items-center px-6 py-2 text-gray-800 hover:bg-gray-200">Ambulance Company</button>
        </div>
        <div class="border-t my-2"></div>
        <div class="px-6 text-gray-400 text-xs uppercase">Services</div>
        <button class="px-6 py-2 text-gray-800 hover:bg-gray-200">Manage Service Category</button>
        <div class="relative">
          <button 
            @click="toggleDropdown"
            class="flex items-center w-full px-6 py-2 text-gray-800 hover:bg-gray-200">
            Vehicle Type ▼
          </button>

          <div v-show="isDropdownOpen" class="absolute left-6 top-full mt-1 w-[calc(100%-1.5rem)] bg-white shadow rounded z-10">
            <button class="block w-full text-left px-4 py-2 text-gray-800 hover:bg-gray-100">Manufactures</button>
            <button class="block w-full text-left px-4 py-2 text-gray-800 hover:bg-gray-100">Models</button>
            <button class="block w-full text-left px-4 py-2 text-gray-800 hover:bg-gray-100">Types</button>
          </div>
        </div>
        <!-- More services -->
        <button class="px-6 py-2 text-gray-800 hover:bg-gray-200">Location Management</button>
        <button class="px-6 py-2 text-gray-800 hover:bg-gray-200">Fare Setup</button>
        <button class="px-6 py-2 text-gray-800 hover:bg-gray-200">Trip Statistics</button>
      </nav>
    </aside>

    <!-- Main Content -->
    <div class="flex-1 flex flex-col">
      <!-- Topbar -->
      <div class="flex justify-between items-center bg-white p-4 shadow">
        <button @click="isSidebarOpen = !isSidebarOpen" class="md:hidden">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-800" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
          </svg>
        </button>
        <div></div>
        <div class="flex items-center space-x-4">
          <span class="font-semibold text-gray-800">Olivia Smith</span>
          <span class="text-gray-500 text-sm">Super Administrator</span>
        </div>
      </div>
      <div class="col-span-2 bg-white p-4 shadow">
      <div class="flex flex-wrap gap-2 mb-4">
        <div v-for="(status, index) in statusButtons" :key="index"
          class="flex items-center gap-1 bg-gray-100 p-2 rounded text-sm">
          <span class="text-gray-800">{{ status.label }}</span>
          <span class="font-bold text-gray-800">({{ status.count }})</span>
        </div>
      </div>
      <div id="map" class="h-[300px] sm:h-[400px] md:h-[500px] rounded overflow-hidden shadow"></div>
    </div>
    <PieChart class="mt-4" />
    </div>
  </div>
</template>

<script setup lang="ts">

import { onMounted, ref } from 'vue';
import L from 'leaflet';
import type { LatLngTuple } from 'leaflet';
import 'leaflet/dist/leaflet.css';

onMounted(() => {
  const map = L.map('map').setView([17.4474, 78.5261], 13); // Default view: Malkajgiri, Hyderabad

  // Tile layer
  L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; OpenStreetMap contributors'
  }).addTo(map);

  // User icon
  const userIcon = L.icon({
    iconUrl: 'https://img.icons8.com/color/48/user-location.png',
    iconSize: [32, 32],
  });

  let userMarker: L.Marker | null = null;

  // 🔄 Live location tracking
  if (navigator.geolocation) {
    navigator.geolocation.watchPosition(
      (position) => {
        const lat = position.coords.latitude;
        const lng = position.coords.longitude;

        // Move map to user's position
        map.setView([lat, lng], 16);

        // Place or move the marker
        if (userMarker) {
          userMarker.setLatLng([lat, lng]);
        } else {
          userMarker = L.marker([lat, lng], { icon: userIcon }).addTo(map);
        }
      },
      (error) => {
        console.error("Geolocation error:", error.message);
        alert("Unable to get live location.");
      },
      {
        enableHighAccuracy: true,
        maximumAge: 1000,
        timeout: 10000,
      }
    );
  } else {
    alert("Geolocation not supported by your browser.");
  }

  // 🚕 Mock cab icons
  const cabIcon = L.icon({
    iconUrl: 'https://img.icons8.com/color/48/taxi.png',
    iconSize: [32, 32],
  });

  const cabCoords: LatLngTuple[] = [
    [17.448, 78.525],
    [17.446, 78.529],
    [17.449, 78.523],
  ];

  cabCoords.forEach(coord => {
    L.marker(coord, { icon: cabIcon }).addTo(map);
  });
});

const statusButtons = [
  { label: 'Available', count: 5 },
  { label: 'Not Available', count: 6 },
  { label: 'Way to Pickup', count: 0 },
  { label: 'Arrived/Reached', count: 0 },
  { label: 'Way to Dropoff', count: 0 },
];

const isSidebarOpen = ref(false);
const isDropdownOpen = ref(false);

function toggleDropdown() {
  isDropdownOpen.value = !isDropdownOpen.value;
}
</script>

<style scoped>

#map {
  z-index: 0;
  position: relative;
}
aside {
  z-index: 50;
}

</style>
