<x-layout :title="'Edit Vehicle Type'">
    <div class="px-4 py-8 sm:px-8 bg-gray-50 min-h-screen">
        <div class="bg-white rounded-lg shadow border border-gray-200 p-6 max-w-lg mx-auto">

            <div class="flex justify-between items-center border-b pb-3 mb-6">
                <h2 class="text-2xl font-semibold text-gray-800">Edit Vehicle Type</h2>
                <a href="{{ route('vehicle-types.index') }}"
                   class="px-4 py-2 text-sm text-white bg-blue-600 rounded-md hover:bg-blue-700 transition">
                    Back to List
                </a>
            </div>

            @if ($errors->any())
                <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
                    <ul class="list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('vehicle-types.update', $type->id) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')

                <div>
                    <label for="name" class="block mb-1 font-medium text-gray-700">Name</label>
                    <input type="text" name="name" id="name" 
                           value="{{ old('name', $type->name) }}" 
                           class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-500"
                           required>
                </div>

                <div>
                    <label for="max_passengers" class="block mb-1 font-medium text-gray-700">Max Passengers</label>
                    <input type="number" name="max_passengers" id="max_passengers" min="1" 
                           value="{{ old('max_passengers', $type->max_passengers) }}"
                           placeholder="Enter max passengers or leave empty for random"
                           class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring focus:border-blue-500">
                </div>

                <div>
                    <label for="status" class="inline-flex items-center space-x-2">
                        <input type="checkbox" name="status" id="status" value="1"
                               {{ old('status', $type->status) ? 'checked' : '' }}
                               class="form-checkbox h-5 w-5 text-blue-600">
                        <span class="font-medium text-gray-700">Active</span>
                    </label>
                </div>

                <div class="flex justify-end space-x-4">
                    <a href="{{ route('vehicle-types.index') }}" 
                       class="px-4 py-2 text-gray-700 border border-gray-300 rounded hover:bg-gray-100 transition">
                        Cancel
                    </a>
                    <button type="submit" 
                            class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">
                        Update
                    </button>
                </div>

            </form>
        </div>
    </div>
</x-layout>
