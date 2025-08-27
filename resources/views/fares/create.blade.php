<x-layout>
    <x-slot name="heading">
        <h1 class="text-2xl font-bold">➕ Add New Fare</h1>
    </x-slot>

    <form action="{{ route('fares.store') }}" method="POST" class="space-y-6">
        @csrf

        <div>
            <label class="block font-medium">Vehicle Type</label>
            <input type="text" name="vehicle_type" class="w-full border rounded p-2" required>
        </div>

        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block font-medium">Base Fare (₹)</label>
                <input type="number" name="base_fare" class="w-full border rounded p-2" required>
            </div>
            <div>
                <label class="block font-medium">Per Km (₹)</label>
                <input type="number" name="per_km" class="w-full border rounded p-2" required>
            </div>
            <div>
                <label class="block font-medium">Per Minute (₹)</label>
                <input type="number" name="per_minute" class="w-full border rounded p-2" required>
            </div>
            <div>
                <label class="block font-medium">Waiting Charges (₹)</label>
                <input type="number" name="waiting_charges" class="w-full border rounded p-2" required>
            </div>
        </div>

        <div>
            <label class="block font-medium">Status</label>
            <select name="status" class="w-full border rounded p-2" required>
                <option value="Active">Active</option>
                <option value="Pending">Pending</option>
            </select>
        </div>

        <button type="submit" class="px-5 py-2 bg-indigo-600 text-white font-medium rounded hover:bg-indigo-700 transition">Save Fare</button>
    </form>
</x-layout>
