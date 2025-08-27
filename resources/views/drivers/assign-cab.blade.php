<x-layout>
    <x-slot name="heading">
        <h1 class="text-2xl font-bold text-gray-900">Assign Cab to {{ $driver->name }}</h1>
    </x-slot>

    <div class="max-w-lg mx-auto mt-8 bg-white rounded-lg shadow p-6">
        <form method="POST" action="{{ route('drivers.assignVehicle', $driver->id) }}">
            @csrf

            <div class="mb-4">
                <label class="block font-semibold text-gray-700">Cab Number/Name</label>
                <input type="text" name="cab" value="{{ old('cab', $driver->cab) }}"
                       class="w-full border border-gray-300 rounded px-3 py-2 mt-1 focus:ring focus:ring-blue-200"
                       required>
            </div>

            <div class="flex justify-end">
                <button type="submit"
                        class="px-4 py-2 bg-blue-600 text-white font-semibold rounded hover:bg-blue-700">
                    Assign Cab
                </button>
            </div>
        </form>
    </div>
</x-layout>
