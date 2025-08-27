<x-layout>
    <x-slot name="heading">
        <div class="flex flex-col md:flex-row justify-between items-center gap-3">
            <h1 class="text-2xl font-bold">Drivers Management</h1>
        </div>
    </x-slot>

    <!-- <div class="bg-gray-100 min-h-screen px-4 pt-6 pb-12"> -->

    @if($drivers->isNotEmpty())
        <div class="flex flex-wrap md:flex-nowrap items-center gap-3 mb-8">
            <!-- Search form -->
            <form action="{{ route('drivers.index') }}" method="GET"
                class="flex flex-grow flex-wrap sm:flex-nowrap items-center gap-2">
                <input type="search" name="search" placeholder="Search drivers..."
                    class="flex-grow min-w-[150px] px-4 py-2 text-sm border border-gray-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500 shadow transition"
                    value="{{ request('search') }}">
                <button type="submit"
                    class="px-4 py-2 text-sm font-semibold bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 focus:ring-2 focus:ring-indigo-500 transition">
                    Search
                </button>
            </form>

            <!-- Add Driver button -->
            <a href="{{ route('drivers.create') }}"
                class="px-4 py-2 text-sm font-semibold bg-green-600 text-white rounded-lg hover:bg-green-700 focus:ring-2 focus:ring-green-500 transition whitespace-nowrap">
                + Add Driver
            </a>
        </div>
    @endif

        {{-- Drivers Grid --}}
        @if($drivers->isEmpty())
            <div class="text-center py-24 text-gray-500 text-xl select-none">No drivers found 🚘</div>
        @else
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                @foreach($drivers as $driver)
                    <div class="relative bg-white rounded-2xl border border-gray-200 shadow-md hover:shadow-lg transition flex flex-col h-full">

                        {{-- Status Dot --}}
                        <div class="absolute top-4 left-4">
                            <span
                                class="block w-4 h-4 rounded-full shadow-md
                                    {{ $driver->status === 'available' ? 'bg-green-500' : '' }}
                                    {{ $driver->status === 'on_trip' ? 'bg-yellow-400' : '' }}
                                    {{ $driver->status === 'suspended' ? 'bg-red-500' : 'bg-gray-400' }}"
                                title="{{ ucfirst(str_replace('_', ' ', $driver->status)) }}">
                            </span>
                        </div>

                        {{-- Image & Info --}}
                        <div class="flex flex-col items-center p-5">
                            <img src="{{ $driver->image_url }}" alt="{{ $driver->name }}"
                                class="w-24 h-24 rounded-full object-cover border-2 border-gray-300 shadow mb-3" />
                            <h2 class="text-lg font-semibold text-gray-800 text-center truncate">{{ $driver->name }}</h2>
                            <p class="text-sm text-gray-500">📞 {{ $driver->phone }}</p>
                            <p class="text-sm text-gray-600 mt-1">Cab: <strong>{{ $driver->cab }}</strong></p>
                        </div>

                        {{-- Footer Buttons --}}
                        <div class="mt-auto border-t border-gray-200 flex flex-wrap gap-2 p-3 bg-gray-50">
                            <a href="{{ route('drivers.show', $driver->id) }}"
                                class="w-full sm:flex-1 text-center px-3 py-2 text-xs font-medium text-blue-700 border border-blue-400 rounded hover:bg-blue-600 hover:text-white transition">
                                View</a>

                            <form method="POST" action="{{ route('drivers.changeStatus', $driver->id) }}" class="w-full sm:flex-1">@csrf
                                <button type="submit"
                                    class="w-full px-3 py-2 text-xs font-medium text-yellow-800 border border-yellow-500 rounded hover:bg-yellow-500 hover:text-white transition">
                                    Status</button>
                            </form>

                            <form method="POST" action="{{ route('drivers.suspend', $driver->id) }}" class="w-full sm:flex-1">@csrf
                                <button type="submit"
                                    class="w-full px-3 py-2 text-xs font-medium text-red-800 border border-red-500 rounded hover:bg-red-500 hover:text-white transition">
                                    Suspend</button>
                            </form>

                            <a href="{{ route('drivers.assignVehicle', $driver->id) }}"
                                class="w-full sm:flex-1 text-center px-3 py-2 text-xs font-medium text-green-900 border border-green-500 rounded hover:bg-green-600 hover:text-white transition">
                                Assign</a>
                        </div>

                    </div>
                @endforeach
            </div>
            {{-- Pagination links --}}
            <div class="mt-6">
                {{ $drivers->links() }}
            </div>
        @endif

    <!-- </div> -->
</x-layout>
