<x-layout>
  <x-slot name="heading">
    <h1 class="text-2xl font-bold">Vehicle Manufacturers</h1>
  </x-slot>

  <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mt-6">


    @foreach ($manufacturers as $manufacturer)
    <!-- Manufacturer Card -->
    <div class="bg-white border border-gray-200 rounded-xl shadow-sm p-5 hover:shadow transition">
      <h3 class="text-xl font-semibold text-gray-800 mb-2">{{ $manufacturer->name }}</h3>
      <p class="text-sm text-gray-500">{{ $manufacturer->country }}</p>
      <p class="text-xs text-gray-400 mb-4">Added on: 
        <span class="font-medium text-gray-700">{{ $manufacturer->created_at->format('M d, Y') }}</span>
      </p>

      <div class="flex items-center justify-between text-sm mb-4">
        <div>
          <p class="text-gray-500">Fleet</p>
          <p class="font-medium text-gray-800">{{ $manufacturer->fleet_count }}</p>
        </div>

        @php
          $maxFleetCapacity = 5000; // or $manufacturer->fleet_capacity if you have it
          $usagePercentage = $manufacturer->fleet_count > 0 ? min(($manufacturer->fleet_count / $maxFleetCapacity) * 100, 100) : 0;
        @endphp
        <div>
          <p class="text-gray-500">Fleet Usage</p>
          <div class="w-24 bg-gray-200 rounded-full h-2.5 mt-1">
            <div class="bg-indigo-600 h-2.5 rounded-full" style="width: {{ $usagePercentage }}%"></div>
          </div>
          <p class="text-xs text-gray-400 mt-1">{{ round($usagePercentage) }}%</p>
        </div>

        <div>
          <p class="text-gray-500">Status</p>
          <span class="inline-block px-2 py-1 text-xs font-semibold rounded-full 
            {{ $manufacturer->status == 'Active' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
            {{ $manufacturer->status }}
          </span>
        </div>
      </div>

      <!-- Fleet Trend indicator -->
      <span class="{{ Str::startsWith($manufacturer->fleet_trend, '+') ? 'text-green-600' : 'text-red-600' }} text-xs font-medium block mb-4">
        {{ $manufacturer->fleet_trend }}
      </span>

      <div class="flex justify-between pt-3 border-t border-gray-100 text-sm">
        <a href="{{ route('manufacturers.show', $manufacturer->id) }}" class="text-indigo-600 font-medium hover:underline">View</a>
        <a href="{{ route('manufacturers.edit', $manufacturer->id) }}" class="text-gray-600 hover:underline">Edit</a>
        <form action="{{ route('manufacturers.disable', $manufacturer->id) }}" method="POST" onsubmit="return confirm('Disable this manufacturer?');">
          @csrf
          <button type="submit" class="text-red-600 hover:underline">Disable</button>
        </form>
      </div>
    </div>
    @endforeach

  </div>
</x-layout>
