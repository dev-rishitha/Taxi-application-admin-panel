<x-layout :title="'Add New Model'">
    <div class="px-4 py-8 sm:px-8 bg-gray-50 min-h-screen">
        <div class="bg-white rounded-lg shadow border border-gray-200 p-6 space-y-6 w-full">

            <h2 class="text-2xl font-semibold text-gray-800 border-b pb-3">Add New Vehicle Model</h2>

            <form action="{{ route('models.store') }}" method="POST" class="space-y-5 w-full">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Model Name</label>
                        <input type="text" name="name" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:outline-none">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Type</label>
                        <input type="text" name="type" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:outline-none">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Manufacturer</label>
                        <select name="manufacturer_id" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:outline-none">
                            @foreach ($manufacturers as $manufacturer)
                                <option value="{{ $manufacturer->id }}">{{ $manufacturer->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="flex justify-end gap-3 pt-4 border-t">
                    <a href="{{ route('models.index') }}"
                        class="px-4 py-2 text-sm text-gray-700 border border-gray-300 rounded-md hover:bg-gray-100 transition">Cancel</a>
                    <button type="submit"
                        class="px-5 py-2 text-sm text-white bg-green-600 rounded-md hover:bg-green-700 transition">Add Model</button>
                </div>

            </form>

        </div>
    </div>
</x-layout>
