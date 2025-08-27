<x-layout :title="'Fare Setup'">
    <x-slot name="heading">
        <h1 class="text-4xl font-extrabold text-gray-900 tracking-tight">Fare Setup</h1>
    </x-slot>

    <div class="flex justify-end mb-10">
        <a href="{{ route('fares.create') }}"
           class="px-6 py-2 text-sm font-medium bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700 transition">
            Add New Fare
        </a>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @forelse($fares as $fare)
        <div class="p-6 border border-gray-200 rounded-2xl bg-white shadow hover:shadow-md transition"
             x-data="{ confirmDelete: false }">

            <div class="mb-4">
                <h2 class="text-2xl font-bold text-gray-800">{{ $fare->vehicle_type }}</h2>
                <span class="inline-block mt-2 text-xs font-medium px-3 py-1 rounded-full 
                    {{ $fare->status == 'Active' ? 'bg-green-50 text-green-600' : 'bg-yellow-50 text-yellow-600' }}">
                    {{ $fare->status }}
                </span>
            </div>

            <div class="space-y-3 text-gray-600 text-base">
                <div class="flex justify-between">
                    <span>Base Fare</span>
                    <span class="font-semibold text-gray-900">₹{{ $fare->base_fare }}</span>
                </div>
                <div class="flex justify-between">
                    <span>Per Km</span>
                    <span class="font-semibold text-gray-900">₹{{ $fare->per_km }}</span>
                </div>
                <div class="flex justify-between">
                    <span>Per Minute</span>
                    <span class="font-semibold text-gray-900">₹{{ $fare->per_minute }}</span>
                </div>
                <div class="flex justify-between">
                    <span>Waiting Charges</span>
                    <span class="font-semibold text-gray-900">₹{{ $fare->waiting_charges }}/min</span>
                </div>
            </div>

            <div class="flex space-x-2 mt-6 pt-4 border-t border-gray-100">
                <a href="{{ route('fares.edit', $fare->id) }}"
                   class="flex-1 text-center px-4 py-2 text-sm font-medium bg-blue-50 text-blue-700 rounded-lg hover:bg-blue-100 transition">
                    Edit
                </a>
                <button 
                    @click="confirmDelete = true"
                    class="flex-1 text-center px-4 py-2 text-sm font-medium bg-red-50 text-red-700 rounded-lg hover:bg-red-100 transition">
                    Delete
                </button>
            </div>

            <!-- Confirmation Modal -->
            <div
                x-show="confirmDelete"
                class="fixed inset-0 bg-black bg-opacity-30 flex items-center justify-center z-50"
                style="display: none;">
                <div class="bg-white rounded-xl p-6 w-80 border border-gray-200 shadow-xl">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4">Confirm Deletion</h3>
                    <p class="text-gray-600 mb-5">Are you sure you want to delete <strong class="text-gray-900">{{ $fare->vehicle_type }}</strong>?</p>
                    <div class="flex justify-end space-x-3">
                        <button
                            @click="confirmDelete = false"
                            class="px-4 py-2 bg-gray-100 text-gray-700 rounded hover:bg-gray-200">
                            Cancel
                        </button>
                        <form method="POST" action="{{ route('fares.destroy', $fare->id) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700">
                                Delete
                            </button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
        @empty
        <div class="col-span-3 text-center text-gray-500 py-20">
            <p class="text-lg">No fares available yet. Click <span class="text-blue-600 font-semibold">Add New Fare</span> to get started.</p>
        </div>
        @endforelse
    </div>
</x-layout>
