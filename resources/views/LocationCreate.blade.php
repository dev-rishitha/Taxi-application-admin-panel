<x-layout>
    <x-slot name="heading">
        <h1 class="text-2xl font-bold">➕ Add New Location</h1>
    </x-slot>

    <form action="{{ route('locations.store') }}" method="POST" class="max-w-lg mx-auto mt-6 space-y-4">
        @csrf

        <div>
            <label class="block mb-1 font-medium">Location Name</label>
            <input type="text" name="name" required class="w-full border p-2 rounded" />
        </div>

        <div>
            <label class="block mb-1 font-medium">City</label>
            <input type="text" name="city" required class="w-full border p-2 rounded" />
        </div>

        <div>
            <label class="block mb-1 font-medium">Distance Range (km)</label>
            <input type="number" step="0.01" name="distance_range" required class="w-full border p-2 rounded" />
        </div>

        <div>
            <label class="block mb-1 font-medium">Base Fare (₹)</label>
            <input type="number" step="0.01" name="base_fare" required class="w-full border p-2 rounded" />
        </div>

        <div>
            <label class="block mb-1 font-medium">Active Hours</label>
            <input type="text" name="active_hours" required class="w-full border p-2 rounded" />
        </div>

        <div>
            <label class="block mb-1 font-medium">Status</label>
            <select name="status" class="w-full border p-2 rounded">
                <option value="Active">Active</option>
                <option value="Disabled">Disabled</option>
                <option value="High Demand">High Demand</option>
            </select>
        </div>

        <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded">Save Location</button>
    </form>
</x-layout>
