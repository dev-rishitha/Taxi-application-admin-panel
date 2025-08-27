<x-layout>
    <x-slot name="heading">
        <h1 class="text-2xl font-bold mb-4">Ride History for {{ $customer->name }}</h1>
    </x-slot>

    <div class="bg-white shadow rounded-lg p-6 overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Ride ID</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Date</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Pickup</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Drop</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Fare</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach($rides as $ride)
                    <tr>
                        <td class="px-6 py-2">{{ $ride->id }}</td>
                        <td class="px-6 py-2">{{ $ride->date }}</td>
                        <td class="px-6 py-2">{{ $ride->pickup_location }}</td>
                        <td class="px-6 py-2">{{ $ride->drop_location }}</td>
                        <td class="px-6 py-2">₹{{ $ride->fare }}</td>
                        <td class="px-6 py-2">
                            <span class="text-green-600 font-semibold">{{ $ride->status }}</span>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <a href="{{ route('customers.index') }}" class="inline-block mt-6 text-blue-600 hover:underline">← Back to Customers</a>
</x-layout>
