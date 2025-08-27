<x-layout>
  <x-slot name="heading">
    <h1 class="text-2xl font-bold">Edit Manufacturer</h1>
  </x-slot>

  <div class="bg-white p-6 rounded-xl shadow mt-6 max-w-xl">
    <form action="{{ route('manufacturers.update', $manufacturer->id) }}" method="POST">
      @csrf
      @method('PUT')

      <div class="mb-4">
        <label class="block text-gray-700 font-medium mb-1">Name</label>
        <input type="text" name="name" value="{{ $manufacturer->name }}" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
      </div>

      <div class="mb-4">
        <label class="block text-gray-700 font-medium mb-1">Country</label>
        <input type="text" name="country" value="{{ $manufacturer->country }}" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
      </div>

      <div class="mb-4">
        <label class="block text-gray-700 font-medium mb-1">Status</label>
        <select name="status" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
          <option value="Active" @if($manufacturer->status == 'Active') selected @endif>Active</option>
          <option value="Pending" @if($manufacturer->status == 'Pending') selected @endif>Pending</option>
          <option value="Disabled" @if($manufacturer->status == 'Disabled') selected @endif>Disabled</option>
        </select>
      </div>

      <div class="flex gap-4 mt-6">
        <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700">Save</button>
        <a href="{{ route('manufacturers.index') }}" class="px-4 py-2 bg-gray-200 text-gray-800 rounded hover:bg-gray-300">Cancel</a>
      </div>
    </form>
  </div>
</x-layout>
