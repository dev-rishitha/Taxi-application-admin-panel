<x-layout>
    <x-slot name="heading">
        <h1 class="text-2xl font-bold">Edit Driver Details</h1>
    </x-slot>

    {{-- Removed mx-auto and max-w-3xl to eliminate side spacing --}}
    <div class="bg-white rounded-2xl shadow p-8 w-full">
        <form action="{{ route('drivers.update', $driver->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 gap-6">

                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Driver Name</label>
                    <input type="text" name="name" id="name" value="{{ $driver->name }}"
                        class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                        required>
                </div>

                <div>
                    <label for="cab" class="block text-sm font-medium text-gray-700">Cab Model</label>
                    <input type="text" name="cab" id="cab" value="{{ $driver->cab }}"
                        class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                        required>
                </div>

                <div>
                    <label for="phone" class="block text-sm font-medium text-gray-700">Phone Number</label>
                    <input type="text" name="phone" id="phone" value="{{ $driver->phone }}"
                        class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                        required>
                </div>

                <div>
                    <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                    <select name="status" id="status"
                        class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                        required>
                        <option value="available" {{ $driver->status == 'available' ? 'selected' : '' }}>Available</option>
                        <option value="on_trip" {{ $driver->status == 'on_trip' ? 'selected' : '' }}>On Trip</option>
                        <option value="off_duty" {{ $driver->status == 'off_duty' ? 'selected' : '' }}>Off Duty</option>
                    </select>
                </div>

                <div>
                    <label for="image_url" class="block text-sm font-medium text-gray-700">Profile Image URL</label>
                    <input type="url" name="image_url" id="image_url" value="{{ $driver->image_url }}"
                        class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                </div>

                <div class="flex justify-between">
                    <a href="{{ route('drivers.index') }}"
                        class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition">
                        Cancel
                    </a>
                    <button type="submit"
                        class="px-6 py-2 bg-green-600 text-white rounded-lg font-semibold shadow hover:bg-green-700 transition">
                        Update Driver
                    </button>
                </div>

            </div>
        </form>
    </div>
</x-layout>
