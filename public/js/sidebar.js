document.addEventListener("DOMContentLoaded", function () {
  const mapElement = document.getElementById("map");
  if (mapElement) {
  const map = L.map("map").setView([17.4474, 78.5261], 13);
  L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
    attribution: "&copy; OpenStreetMap contributors",
  }).addTo(map);

  const userIcon = L.icon({
    iconUrl: "https://img.icons8.com/color/48/user-location.png",
    iconSize: [32, 32],
  });

  let userMarker = null;

  // Prompt for permission immediately on load
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(
      () => {
        console.log("User granted location access ✅");
        getLiveLocation();  // start watching
      },
      (error) => {
        console.warn("User denied or dismissed location access ❌", error.message);
      }
    );
  } else {
    console.warn("Geolocation not supported.");
  }

  // Permissions API check for monitoring state
  if (navigator.permissions) {
    navigator.permissions.query({ name: "geolocation" }).then(function (result) {
      if (result.state === "granted") {
        getLiveLocation();
      } else if (result.state === "prompt") {
        console.log("Location permission is prompt — user needs to allow.");
      } else {
        console.log("Location permission denied — cannot get live location.");
      }
    });
  } else {
    // Fallback if Permissions API not supported
    getLiveLocation();
  }

  function getLiveLocation() {
    if (navigator.geolocation) {
      navigator.geolocation.watchPosition(
        (position) => {
          const lat = position.coords.latitude;
          const lng = position.coords.longitude;
          map.setView([lat, lng], 16);
          if (userMarker) {
            userMarker.setLatLng([lat, lng]);
          } else {
            userMarker = L.marker([lat, lng], { icon: userIcon }).addTo(map);
          }
        },
        (error) => {
          console.error("Geolocation error:", error.message);
        },
        { enableHighAccuracy: true, maximumAge: 1000, timeout: 10000 }
      );
    } else {
      console.warn("Geolocation not supported.");
    }
  }
    const cabIcon = L.icon({
      iconUrl: "https://img.icons8.com/color/48/taxi.png",
      iconSize: [32, 32],
    });

    const cabCoords = [
      [17.448, 78.525],
      [17.446, 78.529],
      [17.449, 78.523],
    ];

    cabCoords.forEach((coord) => {
      L.marker(coord, { icon: cabIcon }).addTo(map);
    });
  }

// Sidebar toggle
  const toggle = document.getElementById("sidebarToggle");
  const close = document.getElementById("sidebarClose");
  const sidebar = document.getElementById("sidebar");

  if (toggle) {
    toggle.addEventListener("click", () => {
      sidebar.classList.toggle("-translate-x-full");
    });
  }

  if (close) {
    close.addEventListener("click", () => {
      sidebar.classList.add("-translate-x-full");
    });
  }

  // Dropdown toggle
  const vehicleBtn = document.getElementById("vehicleTypeBtn");
  const vehicleDropdown = document.getElementById("vehicleDropdown");

  if (vehicleBtn && vehicleDropdown) {
    vehicleBtn.addEventListener("click", function (e) {
      e.stopPropagation();
      vehicleDropdown.classList.toggle("hidden");
    });

    document.addEventListener("click", function (e) {
      if (
        !vehicleDropdown.contains(e.target) &&
        !vehicleBtn.contains(e.target)
      ) {
        vehicleDropdown.classList.add("hidden");
      }
    });
  }
});

