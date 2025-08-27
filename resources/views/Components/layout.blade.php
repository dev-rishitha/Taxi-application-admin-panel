<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>{{ $title ?? 'UX DriveDesk' }}</title>
  <link rel="stylesheet" href="{{ asset('css/app.css') }}" />
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
  <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
  <script src="https://cdn.tailwindcss.com"></script>
 <script src="//unpkg.com/alpinejs" defer></script>
  <style>#map { width: 100%; z-index: 0; }</style>
</head>
<body class="bg-gray-100">
  <!-- Sidebar -->
  <aside id="sidebar" class="fixed z-50 top-0 left-0 h-full bg-white shadow-md w-64 transform -translate-x-full md:translate-x-0 transition-transform duration-200 ease-in-out">
    <div class="flex items-center justify-between px-4 pt-4 pb-3">
      <div class="flex items-center gap-2 text-xl font-bold text-yellow-500">
        <img src="/images/ux-removebg-preview.png" alt="logo" class="w-10 h-10" />
        UX<span class="text-orange-600">DriveDesk</span>
      </div>
      <button id="sidebarClose" class="md:hidden text-gray-700 text-xl focus:outline-none">✕</button>
    </div>
    <nav class="mt-2 space-y-2">
      <x-nav-link href="/">Dashboard</x-nav-link>
      <x-nav-link href="/live-rides">Live Rides</x-nav-link>
        <div class="border-t my-2"></div>
        <div class="px-6 text-gray-400 text-xs uppercase">Members</div>
        <div class="flex flex-col space-y-1">
          <x-nav-link href="/customers">Customers</x-nav-link>
          <x-nav-link href="/drivers">Drivers</x-nav-link>
          <x-nav-link href="/ambulance-company">Ambulance Company</x-nav-link>
        </div>
        <div class="border-t my-2"></div>
        <div class="px-6 text-gray-400 text-xs uppercase">Services</div>
          <x-nav-link href="/manage-service-category">Manage Service Category</x-nav-link>
        <div class="relative">
            <button id="vehicleTypeBtn" class="flex items-center w-full px-6 py-2 text-gray-800 hover:bg-gray-200">
            Vehicle Type ▼
            </button>
            <div id="vehicleDropdown" class="hidden absolute left-6 top-full mt-1 w-[calc(100%-1.5rem)] bg-white shadow rounded z-10">
              <x-nav-link href="/manufactures">Manufactures</x-nav-link>
              <x-nav-link href="/models">Models</x-nav-link>
              <x-nav-link href="/vehicle-types">Types</x-nav-link>
            </div>
        </div>
      <x-nav-link href="/locations">Location Management</x-nav-link>
      <x-nav-link href="/fares">Fare Setup</x-nav-link>
      <x-nav-link href="/drivers-performance">Drivers Performance</x-nav-link>
    </nav>
  </aside>
  <!-- Main Content -->
  <div class="relative z-0 md:ml-64 min-h-screen bg-gray-50 transition-all duration-200">
    <!-- Topbar -->
    <div class="flex justify-between items-center bg-white p-4 shadow sticky top-0 z-40">
      <div class="flex items-center space-x-4">
        <!-- Hamburger for mobile -->
        <button id="sidebarToggle" class="md:hidden text-2xl text-gray-700 focus:outline-none">☰</button>
        <!-- Page Heading -->
        <span class="hidden md:inline">{{ $heading ?? '' }}</span>
      </div>
      <div class="flex items-center space-x-4 text-right">
        <span class="font-semibold text-gray-800">{{ session('admin_username', 'Admin') }}</span>
        <span class="text-gray-500 text-sm">Super Administrator</span>
        <a href="{{ route('admin.logout') }}" class="text-sm text-red-500 font-semibold hover:underline">Logout</a>
      </div>
    </div>

    <main class="p-6">
     @isset($showStatuses)   
      @php
        $statuses = [
          ['label' => 'Available', 'count' => 5],
          ['label' => 'Not Available', 'count' => 6],
          ['label' => 'Way to Pickup', 'count' => 0],
          ['label' => 'Arrived/Reached', 'count' => 0],
          ['label' => 'Way to Dropoff', 'count' => 0],
        ];
      @endphp

      <div class="flex flex-wrap gap-2 mb-4">
        @foreach ($statuses as $status)
          <div class="flex items-center gap-1 bg-gray-100 p-2 rounded text-sm">
            <span class="text-gray-800">{{ $status['label'] }}</span>
            <span class="font-bold text-gray-800">({{ $status['count'] }})</span>
          </div>
        @endforeach
      </div>
      @endisset
      {{ $slot }}
    </main>
  </div>
  <script src="//unpkg.com/alpinejs" defer></script>
  <script src="{{ asset('js/sidebar.js') }}"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  @stack('scripts')
  @if (session('success') && request()->is('customers'))
    <div id="toast" class="fixed bottom-5 right-5 bg-green-600 text-white px-4 py-3 rounded shadow-lg z-50 animate-fade-in">
        {{ session('success') }}
    </div>

    <script>
        setTimeout(() => {
            document.getElementById('toast')?.remove();
        }, 3000);
    </script>

    <style>
        @keyframes fade-in {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .animate-fade-in {
            animation: fade-in 0.4s ease-out;
        }
    </style>
@endif
</body>
</html>

