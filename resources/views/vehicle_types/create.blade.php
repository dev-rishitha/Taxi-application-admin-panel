<x-layout :title="'Add Vehicle Type'">
    <div class="px-4 py-8 sm:px-8 bg-gray-50 min-h-screen">
        <div class="bg-white rounded-lg shadow border border-gray-200 p-6 w-full max-w-md mx-auto">

            <h2 class="text-2xl font-semibold mb-6">Add Vehicle Type</h2>

            <form action="{{ route('vehicle-types.store') }}" method="POST" class="space-y-4">
                @csrf

                <div>
                    <label for="name" class="block font-medium text-gray-700">Name</label>
                    <input type="text" name="name" id="name" value="{{ old('name') }}"
                           class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
                    @error('name')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="max_passengers" class="block font-medium text-gray-700">Max Passengers</label>
                    <input type="number" name="max_passengers" id="max_passengers" value="{{ old('max_passengers') }}"
                           class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" min="1">
                    @error('max_passengers')
                        <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="inline-flex items-center">
                        <input type="checkbox" name="status" class="form-checkbox" {{ old('status') ? 'checked' : '' }}>
                        <span class="ml-2">Active</span>
                    </label>
                </div>

                <div>
                    <button type="submit"
                            class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">
                        Save
                    </button>
                    <a href="{{ route('vehicle-types.index') }}"
                       class="ml-4 text-gray-600 hover:underline">Cancel</a>
                </div>
            </form>

        </div>
    </div>
</x-layout>
