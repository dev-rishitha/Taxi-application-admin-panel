<x-layout>
    <x-slot name="heading">
        <h1 class="text-2xl font-bold">📍 Location Management</h1>
    </x-slot>

    <!-- Summary Cards -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
        <div class="p-4 bg-indigo-50 border border-indigo-200 rounded-xl text-center">
            <h2 class="text-lg font-semibold text-indigo-800">✔️ Active Zones</h2>
            <p class="text-2xl font-bold mt-2">{{ $activeCount }}</p>
        </div>
        <div class="p-4 bg-red-50 border border-red-200 rounded-xl text-center">
            <h2 class="text-lg font-semibold text-red-800">❌ Disabled Zones</h2>
            <p class="text-2xl font-bold mt-2">{{ $disabledCount }}</p>
        </div>
        <div class="p-4 bg-yellow-50 border border-yellow-200 rounded-xl text-center">
            <h2 class="text-lg font-semibold text-yellow-800">⚡ High-Demand Zones</h2>
            <p class="text-2xl font-bold mt-2">{{ $highDemandCount }}</p>
        </div>
    </div>

    <!-- Add New Location Button -->
    <div class="flex justify-end mb-4">
        <a href="{{ route('locations.create') }}" class="px-5 py-2 text-sm font-medium bg-indigo-600 text-white rounded hover:bg-indigo-700 transition">
            + Add New Location
        </a>
    </div>

    <!-- Table -->
    <div class="overflow-x-auto rounded-xl border border-gray-200 shadow-sm">
        <table class="min-w-full text-sm text-gray-800">
            <thead class="bg-indigo-50">
                <tr>
                    <th class="px-4 py-3 text-left font-semibold">Location Name</th>
                    <th class="px-4 py-3 text-left font-semibold">City</th>
                    <th class="px-4 py-3 text-left font-semibold">Distance (km)</th>
                    <th class="px-4 py-3 text-left font-semibold">Base Fare (₹)</th>
                    <th class="px-4 py-3 text-left font-semibold">Active Hours</th>
                    <th class="px-4 py-3 text-left font-semibold">Status</th>
                    <th class="px-4 py-3 text-left font-semibold">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse ($locations as $location)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-4 py-4 font-medium">{{ $location->name }}</td>
                        <td class="px-4 py-4">{{ $location->city }}</td>
                        <td class="px-4 py-4">{{ $location->distance_range }}</td>
                        <td class="px-4 py-4">₹{{ $location->base_fare }}</td>
                        <td class="px-4 py-4">{{ $location->active_hours }}</td>
                        <td class="px-4 py-4">
                            @php
                                $statusClasses = [
                                    'Active' => 'bg-green-100 text-green-800',
                                    'Disabled' => 'bg-red-100 text-red-600',
                                    'High Demand' => 'bg-yellow-100 text-yellow-800'
                                ];
                            @endphp
                            <span class="inline-block px-2 py-1 text-xs font-medium rounded-full {{ $statusClasses[$location->status] ?? 'bg-gray-100 text-gray-800' }}">
                                {{ $location->status }}
                            </span>
                        </td>
                        <td class="px-4 py-4 flex flex-wrap gap-2">
                            <a href="{{ route('locations.edit', $location) }}" class="px-3 py-1 text-xs font-medium bg-indigo-600 text-white rounded hover:bg-indigo-700 transition">Edit</a>
                            <a href="{{ route('locations.map', $location) }}" class="px-3 py-1 text-xs font-medium bg-gray-200 text-gray-800 rounded hover:bg-gray-300 transition">Map</a>
                            <form action="{{ route('locations.disable', $location) }}" method="POST" onsubmit="return confirm('Are you sure you want to disable this location?');">
                                @csrf
                                <button type="submit" class="px-3 py-1 text-xs font-medium bg-red-100 text-red-600 rounded hover:bg-red-200 transition">Disable</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="px-4 py-4 text-center text-gray-500">No locations found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-layout>
