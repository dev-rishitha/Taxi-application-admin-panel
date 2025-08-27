<table class="min-w-full text-sm text-left text-gray-700">
    <thead class="bg-gray-100 border-b text-gray-800 font-semibold">
        <tr>
            <th class="px-6 py-3">Driver</th>
            <th class="px-6 py-3">Cab</th>
            <th class="px-6 py-3">Rides</th>
            <th class="px-6 py-3">Rating</th>
            <th class="px-6 py-3">Earnings</th>
            <th class="px-6 py-3">Cancellations</th>
            <th class="px-6 py-3">Status</th>
            <th class="px-6 py-3">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($drivers as $driver)
        <tr class="border-b hover:bg-gray-50">
            <td class="px-6 py-4 font-medium">{{ $driver->name }}</td>
            <td class="px-6 py-4">{{ $driver->cab }}</td>
            <td class="px-6 py-4">{{ $driver->rides_count }}</td>
            <td class="px-6 py-4">⭐ {{ $driver->rating }}</td>
            <td class="px-6 py-4">₹{{ $driver->earnings }}</td>
            <td class="px-6 py-4">{{ $driver->cancellations }}</td>
            <td class="px-6 py-4">
                <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium
                    {{ $driver->status == 'available' ? 'bg-green-100 text-green-800' : 'bg-gray-200 text-gray-600' }}">
                    {{ ucfirst($driver->status) }}
                </span>
            </td>
            <td class="px-6 py-4 flex gap-2">
                <a href="{{ route('drivers.show', $driver->id) }}" class="px-3 py-1 text-xs font-semibold bg-indigo-600 text-white rounded hover:bg-indigo-700">View</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<div class="px-6 py-4">
    {{ $drivers->links() }}
</div>
