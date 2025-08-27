<x-layout>
    <x-slot name="heading">
        <h1 class="text-2xl font-bold">💸 Fare Setup</h1>
    </x-slot>

    <!-- Add New Fare Button -->
    <div class="flex justify-end mb-6">
        <a href="#" class="px-5 py-2 text-sm font-semibold bg-indigo-600 text-white rounded hover:bg-indigo-700 transition">+ Add New Fare</a>
    </div>

    <!-- Fare Cards Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <!-- Fare Card -->
        <div class="p-5 border border-gray-200 rounded-xl shadow-sm hover:shadow-md transition bg-white">
            <div class="flex items-center justify-between mb-3">
                <h2 class="text-xl font-bold text-gray-800">🚕 Standard Cab</h2>
                <span class="inline-block px-2 py-1 text-xs font-medium bg-green-100 text-green-800 rounded-full">Active</span>
            </div>
            <div class="space-y-2 text-sm text-gray-700">
                <p><strong>Base Fare:</strong> ₹50</p>
                <p><strong>Per Km:</strong> ₹12</p>
                <p><strong>Per Minute:</strong> ₹2</p>
                <p><strong>Waiting Charges:</strong> ₹1/min</p>
            </div>
            <div class="mt-4 flex space-x-2">
                <a href="#" class="flex-1 text-center px-3 py-1 text-sm font-medium bg-indigo-600 text-white rounded hover:bg-indigo-700 transition">Edit</a>
                <a href="#" class="flex-1 text-center px-3 py-1 text-sm font-medium bg-red-100 text-red-600 rounded hover:bg-red-200 transition">Disable</a>
            </div>
        </div>

        <!-- Fare Card -->
        <div class="p-5 border border-gray-200 rounded-xl shadow-sm hover:shadow-md transition bg-white">
            <div class="flex items-center justify-between mb-3">
                <h2 class="text-xl font-bold text-gray-800">🚙 Premium SUV</h2>
                <span class="inline-block px-2 py-1 text-xs font-medium bg-yellow-100 text-yellow-800 rounded-full">Pending</span>
            </div>
            <div class="space-y-2 text-sm text-gray-700">
                <p><strong>Base Fare:</strong> ₹80</p>
                <p><strong>Per Km:</strong> ₹18</p>
                <p><strong>Per Minute:</strong> ₹3</p>
                <p><strong>Waiting Charges:</strong> ₹1.5/min</p>
            </div>
            <div class="mt-4 flex space-x-2">
                <a href="#" class="flex-1 text-center px-3 py-1 text-sm font-medium bg-indigo-600 text-white rounded hover:bg-indigo-700 transition">Edit</a>
                <a href="#" class="flex-1 text-center px-3 py-1 text-sm font-medium bg-red-100 text-red-600 rounded hover:bg-red-200 transition">Disable</a>
            </div>
        </div>

        <!-- Add more cards as needed -->
    </div>

</x-layout>
