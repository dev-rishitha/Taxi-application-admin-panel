<x-layout>
    <x-slot name="heading">
        <h1 class="text-2xl font-bold">✏️ Edit Location</h1>
    </x-slot>

    <form action="{{ route('locations.update', $location) }}" method="POST" class="space-y-4 max-w-lg">
        @csrf
        @method('PUT')

        <div>
            <label class="block font-semibold">Name</label>
            <input type="text" name="name" value="{{ $location->name }}" class="w-full border rounded p-2" required>
        </div>

        <div>
            <label class="block font-semibold">City</label>
            <input type="text" name="city" value="{{ $location->city }}" class="w-full border rounded p-2" required>
        </div>

        <div class="flex gap-4">
            <div class="flex-1">
                <label class="block font-semibold">Distance Range (km)</label>
                <input type="number" name="distance_range" value="{{ $location->distance_range }}" class="w-full border rounded p-2" required>
            </div>
        </div>

        <div>
            <label class="block font-semibold">Base Fare (₹)</label>
            <input type="number" name="base_fare" value="{{ $location->base_fare }}" class="w-full border rounded p-2" required>
        </div>

        <div>
            <label class="block font-semibold">Active Hours</label>
            <input type="text" name="active_hours" value="{{ $location->active_hours }}" class="w-full border rounded p-2" required>
        </div>

        <div>
            <label class="block font-semibold">Status</label>
            <select name="status" class="w-full border rounded p-2" required>
                <option value="Active" {{ $location->status === 'Active' ? 'selected' : '' }}>Active</option>
                <option value="Disabled" {{ $location->status === 'Disabled' ? 'selected' : '' }}>Disabled</option>
                <option value="High Demand" {{ $location->status === 'High Demand' ? 'selected' : '' }}>High Demand</option>
            </select>
        </div>

        <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">Update</button>
        <a href="{{ route('locations.index') }}" class="ml-2 text-gray-600">Cancel</a>
    </form>
</x-layout>
