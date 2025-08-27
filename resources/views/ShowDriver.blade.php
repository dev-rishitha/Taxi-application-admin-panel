<x-layout>
    <x-slot name="heading">
        <h1 class="text-3xl font-bold text-gray-900">Driver Profile</h1>
    </x-slot>

    <div class="bg-gray-50 overflow-hidden">
        <div class="max-w-6xl mx-auto bg-white rounded-2xl shadow-lg text-gray-900">
            {{-- Driver Info Section --}}
            <div class="flex flex-col md:flex-row items-start md:items-center gap-6 p-6">

                <div class="flex flex-col items-center md:items-start">
                    <img src="{{ $driver->image_url }}" alt="Driver Image"
                        class="w-36 h-36 rounded-full border-4 border-indigo-600 mb-4 shadow-md">
                    <span class="text-xl font-semibold">{{ $driver->name }}</span>
                    <span class="text-sm text-gray-600">📞 {{ $driver->phone }}</span>
                    <span class="text-sm text-gray-600">Cab: {{ $driver->cab }}</span>

                    <span class="inline-flex mt-3 items-center px-4 py-1 text-xs font-medium rounded-full
                        @if($driver->status == 'available') bg-green-500 text-white
                        @elseif($driver->status == 'on_trip') bg-yellow-500 text-gray-900
                        @else bg-gray-400 text-white @endif">
                        {{ ucfirst(str_replace('_', ' ', $driver->status)) }}
                    </span>

                    <div class="mt-5 flex gap-3">
                        <a href="{{ route('drivers.edit', $driver->id) }}"
                            class="px-4 py-2 bg-indigo-600 hover:bg-indigo-700 rounded-lg text-white text-sm shadow">
                            Edit
                        </a>
                        <a href="{{ route('drivers.history', $driver->id) }}"
                            class="px-4 py-2 bg-blue-600 hover:bg-blue-700 rounded-lg text-white text-sm shadow">
                            View History
                        </a>
                    </div>
                </div>

                <div class="flex-1 w-full">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        {{-- Basic Details --}}
                        <div class="bg-gray-100 rounded-xl p-4 shadow-inner">
                            <h3 class="text-lg font-semibold mb-2">Driver Details</h3>
                            <p class="text-sm text-gray-600">Cab Type: <span class="text-gray-900">{{ $driver->cab }}</span></p>
                            <p class="text-sm text-gray-600">Experience: <span class="text-gray-900">5+ years</span></p>
                            <p class="text-sm text-yellow-500">⭐ 4.7</p>
                        </div>

                        {{-- Current Trip --}}
                        <div class="bg-gray-100 rounded-xl p-4 shadow-inner">
                            <h3 class="text-lg font-semibold mb-2">Current Trip</h3>
                            <p class="text-sm text-gray-600">Status:
                                @if($driver->status == 'on_trip')
                                    <span class="text-yellow-500">On Trip 🚖</span>
                                @elseif($driver->status == 'available')
                                    <span class="text-green-500">Available ✅</span>
                                @else
                                    <span class="text-gray-500">Offline</span>
                                @endif
                            </p>
                            <p class="text-sm text-gray-600">Trip Time: <span class="text-gray-900">1h 20m</span></p>
                            <p class="text-sm text-gray-600">Fuel Usage: <span class="text-gray-900">10L</span></p>
                            <p class="text-sm text-gray-600">Passengers: <span class="text-gray-900">3</span></p>
                        </div>

                        {{-- Driver Documents --}}
                        <div class="bg-gray-100 rounded-xl p-4 shadow-inner col-span-2">
                            <h3 class="text-lg font-semibold mb-4">Documents</h3>
                            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                                <div class="text-center">
                                    <h4 class="text-sm font-medium mb-1">Driving License</h4>
                                    <img src="{{ $driver->license_url }}" alt="Driving License"
                                        class="w-full h-40 object-cover rounded-lg border shadow">
                                </div>
                                <div class="text-center">
                                    <h4 class="text-sm font-medium mb-1">Aadhar Card</h4>
                                    <img src="{{ $driver->aadhar_url }}" alt="Aadhar Card"
                                        class="w-full h-40 object-cover rounded-lg border shadow">
                                </div>
                                <div class="text-center">
                                    <h4 class="text-sm font-medium mb-1">Vehicle Photo</h4>
                                    <img src="{{ $driver->vehicle_photo_url }}" alt="Vehicle"
                                        class="w-full h-40 object-cover rounded-lg border shadow">
                                </div>
                            </div>
                        </div>

                        {{-- Trip Route Map --}}
                        <div class="bg-gray-100 rounded-xl p-4 mt-4 shadow-inner col-span-2">
                            <h3 class="text-lg font-semibold mb-2">Trip Route</h3>
                            <div class="h-64 bg-gray-200 rounded-lg flex items-center justify-center text-gray-500 text-sm">
                                Map Preview Here (Leaflet or Mapbox)
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-layout>
