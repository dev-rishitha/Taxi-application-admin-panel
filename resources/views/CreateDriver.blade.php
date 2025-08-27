<x-layout>
    <x-slot name="heading">
        <h1 class="text-2xl font-bold">Add New Driver</h1>
    </x-slot>

    <div class="max-w-3xl mx-auto bg-white rounded-2xl shadow p-8 mt-6">
        <form action="{{ route('drivers.store') }}" method="POST">
            @csrf

            <div class="grid grid-cols-1 gap-6">

                <!-- Driver Name -->
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Driver Name</label>
                    <input type="text" name="name" id="name"
                        class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                        required>
                </div>

                <!-- Cab Name -->
                <div>
                    <label for="cab" class="block text-sm font-medium text-gray-700">Cab Model</label>
                    <input type="text" name="cab" id="cab"
                        class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                        required>
                </div>

                <!-- Phone Number -->
                <div>
                    <label for="phone" class="block text-sm font-medium text-gray-700">Phone Number</label>
                    <input type="text" name="phone" id="phone"
                        class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                        required>
                </div>

                <!-- Status Dropdown -->
                <div>
                    <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                    <select name="status" id="status"
                        class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                        required>
                        <option value="available">Available</option>
                        <option value="on_trip">On Trip</option>
                        <option value="off_duty">Off Duty</option>
                    </select>
                </div>

                <!-- Image URL -->
                <div>
                    <label for="image_url" class="block text-sm font-medium text-gray-700">Profile Image URL (optional)</label>
                    <input type="url" name="image_url" id="image_url"
                        class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                </div>

                <!-- Submit Button -->
                <div class="flex justify-end">
                    <button type="submit"
                        class="px-6 py-2 bg-indigo-600 text-white rounded-lg font-semibold shadow hover:bg-indigo-700 transition">
                        Save Driver
                    </button>
                </div>

            </div>
        </form>
    </div>
</x-layout>
