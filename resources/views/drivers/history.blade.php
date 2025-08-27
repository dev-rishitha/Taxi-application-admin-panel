<x-layout>
    <x-slot name="heading">
        <h1 class="text-2xl font-bold text-gray-900">History for {{ $driver->name }}</h1>
    </x-slot>

    <div class="max-w-4xl mx-auto mt-8 bg-white rounded-lg shadow p-6 space-y-10">

        <!-- Ride History -->
        <section>
            <h2 class="text-xl font-semibold mb-4">Ride History</h2>
            @if($rides->isEmpty())
                <p class="text-gray-600 italic">No rides found for this driver.</p>
            @else
                <table class="w-full border-collapse table-auto">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="border border-gray-300 px-4 py-2 text-left">Ride ID</th>
                            <th class="border border-gray-300 px-4 py-2 text-left">Pickup Location</th>
                            <th class="border border-gray-300 px-4 py-2 text-left">Dropoff Location</th>
                            <th class="border border-gray-300 px-4 py-2 text-left">Date</th>
                            <th class="border border-gray-300 px-4 py-2 text-left">Fare</th>
                            <th class="border border-gray-300 px-4 py-2 text-left">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($rides as $ride)
                            <tr class="hover:bg-gray-50">
                                <td class="border border-gray-300 px-4 py-2">{{ $ride->id }}</td>
                                <td class="border border-gray-300 px-4 py-2">{{ $ride->pickup_location }}</td>
                                <td class="border border-gray-300 px-4 py-2">{{ $ride->dropoff_location }}</td>
                                <td class="border border-gray-300 px-4 py-2">{{ $ride->created_at->format('M d, Y') }}</td>
                                <td class="border border-gray-300 px-4 py-2">${{ number_format($ride->fare, 2) }}</td>
                                <td class="border border-gray-300 px-4 py-2 capitalize">{{ $ride->status }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </section>

        <!-- Cab Assignment History -->
        <section>
            <h2 class="text-xl font-semibold mb-4">Cab Assignment History</h2>
            @if($cabAssignments->isEmpty())
                <p class="text-gray-600 italic">No cab assignments found for this driver.</p>
            @else
                <table class="w-full border-collapse table-auto">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="border border-gray-300 px-4 py-2 text-left">Cab Number/Name</th>
                            <th class="border border-gray-300 px-4 py-2 text-left">Assigned On</th>
                            <th class="border border-gray-300 px-4 py-2 text-left">Released On</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cabAssignments as $record)
                            <tr class="hover:bg-gray-50">
                                <td class="border border-gray-300 px-4 py-2">{{ $record->cab }}</td>
                                <td class="border border-gray-300 px-4 py-2">{{ $record->assigned_at->format('M d, Y') }}</td>
                                <td class="border border-gray-300 px-4 py-2">
                                    {{ $record->released_at ? $record->released_at->format('M d, Y') : 'Present' }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </section>

    </div>
</x-layout>
