<x-layout>
    <x-slot name="heading">
        <h1 class="text-2xl font-bold">🛠️ Manage Services</h1>
    </x-slot>

    <div class="grid gap-6 grid-cols-1 sm:grid-cols-2 lg:grid-cols-3">
        <!-- Service Card -->
        <div class="bg-white rounded-2xl shadow-lg p-6 border border-gray-200 hover:shadow-xl transition">
            <div class="flex items-center mb-4">
                <div class="w-12 h-12 bg-indigo-100 rounded-full flex items-center justify-center text-indigo-600 text-2xl">
                    🚖
                </div>
                <div class="ml-4">
                    <h3 class="text-lg font-bold text-gray-800">Standard Taxi</h3>
                    <span class="inline-block mt-1 text-xs font-semibold px-2 py-1 bg-green-100 text-green-800 rounded-full">Active</span>
                </div>
            </div>
            <div class="text-sm text-gray-600 mb-4">Base Fare: $5 | Per Km: $1.5</div>
            <div class="flex space-x-2">
                <a href="#" class="flex-1 inline-flex items-center justify-center px-3 py-2 text-sm font-medium bg-indigo-600 text-white rounded-lg hover:bg-indigo-700">
                    Edit
                </a>
                <a href="#" class="flex-1 inline-flex items-center justify-center px-3 py-2 text-sm font-medium bg-red-100 text-red-600 rounded-lg hover:bg-red-200">
                    Disable
                </a>
            </div>
        </div>

        <!-- Another Service -->
        <div class="bg-white rounded-2xl shadow-lg p-6 border border-gray-200 hover:shadow-xl transition">
            <div class="flex items-center mb-4">
                <div class="w-12 h-12 bg-yellow-100 rounded-full flex items-center justify-center text-yellow-600 text-2xl">
                    🏍️
                </div>
                <div class="ml-4">
                    <h3 class="text-lg font-bold text-gray-800">Bike Taxi</h3>
                    <span class="inline-block mt-1 text-xs font-semibold px-2 py-1 bg-green-100 text-green-800 rounded-full">Active</span>
                </div>
            </div>
            <div class="text-sm text-gray-600 mb-4">Base Fare: $2 | Per Km: $0.8</div>
            <div class="flex space-x-2">
                <a href="#" class="flex-1 inline-flex items-center justify-center px-3 py-2 text-sm font-medium bg-indigo-600 text-white rounded-lg hover:bg-indigo-700">
                    Edit
                </a>
                <a href="#" class="flex-1 inline-flex items-center justify-center px-3 py-2 text-sm font-medium bg-red-100 text-red-600 rounded-lg hover:bg-red-200">
                    Disable
                </a>
            </div>
        </div>

        <!-- Another Service -->
        <div class="bg-white rounded-2xl shadow-lg p-6 border border-gray-200 hover:shadow-xl transition">
            <div class="flex items-center mb-4">
                <div class="w-12 h-12 bg-pink-100 rounded-full flex items-center justify-center text-pink-600 text-2xl">
                    🚑
                </div>
                <div class="ml-4">
                    <h3 class="text-lg font-bold text-gray-800">Ambulance Service</h3>
                    <span class="inline-block mt-1 text-xs font-semibold px-2 py-1 bg-red-100 text-red-600 rounded-full">Inactive</span>
                </div>
            </div>
            <div class="text-sm text-gray-600 mb-4">Base Fare: $10 | Per Km: $3</div>
            <div class="flex space-x-2">
                <a href="#" class="flex-1 inline-flex items-center justify-center px-3 py-2 text-sm font-medium bg-indigo-600 text-white rounded-lg hover:bg-indigo-700">
                    Edit
                </a>
                <a href="#" class="flex-1 inline-flex items-center justify-center px-3 py-2 text-sm font-medium bg-red-100 text-red-600 rounded-lg hover:bg-red-200">
                    Disable
                </a>
            </div>
        </div>
    </div>
</x-layout>
