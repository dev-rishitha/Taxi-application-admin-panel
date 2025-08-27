<x-layout>
  <x-slot name="heading">
    <h1 class="text-2xl font-bold">Manufacturer Details</h1>
  </x-slot>

  <div class="bg-white p-6 rounded-xl shadow mt-6">
    <h2 class="text-xl font-semibold mb-4">{{ $manufacturer->name }}</h2>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-gray-700">
      <div>
        <p class="font-medium">Country:</p>
        <p>{{ $manufacturer->country }}</p>
      </div>

      <div>
        <p class="font-medium">Status:</p>
        <p>
          <span class="px-2 py-1 rounded-full text-xs font-semibold 
            @if($manufacturer->status == 'Active') bg-green-100 text-green-800 
            @elseif($manufacturer->status == 'Pending') bg-yellow-100 text-yellow-800 
            @else bg-red-100 text-red-800 @endif">
            {{ $manufacturer->status }}
          </span>
        </p>
      </div>

      <div>
        <p class="font-medium">Fleet Count:</p>
        <p>{{ $manufacturer->fleet_count }}</p>
      </div>

      <div>
        <p class="font-medium">Added On:</p>
        <p>{{ $manufacturer->created_at->format('F j, Y') }}</p>
      </div>
    </div>

    <div class="mt-6 flex gap-4">
      <a href="{{ route('manufacturers.edit', $manufacturer->id) }}" class="px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700">Edit</a>
      <a href="{{ route('manufacturers.index') }}" class="px-4 py-2 bg-gray-200 text-gray-800 rounded hover:bg-gray-300">Back</a>
    </div>
  </div>
</x-layout>
