<x-layout :title="'Vehicle Types'">
        <div class="bg-white rounded-lg shadow border border-gray-200 p-6 space-y-6 w-full">

            <div class="flex justify-between items-center border-b pb-3">
                <h2 class="text-2xl font-semibold text-gray-800">Vehicle Types</h2>
                <a href="{{ route('vehicle-types.create') }}"
                   class="px-4 py-2 text-sm text-white bg-blue-600 rounded-md hover:bg-blue-700 transition">Add Vehicle Type</a>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left border border-gray-200 rounded-lg">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-4 py-2 border">Name</th>
                            <th class="px-4 py-2 border">Max Passengers</th>
                            <th class="px-4 py-2 border">Status</th>
                            <th class="px-4 py-2 border">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($types as $type)
                            <tr class="border-t">
                                <td class="px-4 py-2">{{ $type->name }}</td>
                                <td class="px-4 py-2">{{ $type->max_passengers ?? 'N/A' }}</td>
                                <td class="px-4 py-2">
                                    <span class="inline-block px-2 py-1 text-xs font-semibold rounded 
                                        {{ $type->status ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                                        {{ $type->status ? 'Active' : 'Inactive' }}
                                    </span>
                                </td>
                                <td class="px-4 py-2 flex gap-2">
                                    <a href="{{ route('vehicle-types.edit', $type->id) }}"
                                       class="px-3 py-1 text-xs text-white bg-yellow-500 rounded hover:bg-yellow-600 transition">Edit</a>
                                    <form action="{{ route('vehicle-types.destroy', $type->id) }}" method="POST"
                                          onsubmit="return confirm('Are you sure?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="px-3 py-1 text-xs text-white bg-red-600 rounded hover:bg-red-700 transition">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div>
                {{ $types->links() }}
            </div>

        </div>
</x-layout>

