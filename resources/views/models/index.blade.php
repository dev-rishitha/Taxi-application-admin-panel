<x-layout :title="'Vehicle Models'">
    <x-slot name="heading">
        <h1 class="text-2xl font-bold">Vehicle Models</h1>
    </x-slot>

    <div class="flex justify-end mb-6">
        <a href="{{ route('models.create') }}"
           class="bg-yellow-500 hover:bg-yellow-600 text-white font-semibold py-2 px-4 rounded-lg shadow">
            + Add New Model
        </a>
    </div>

    <div class="bg-white shadow rounded-lg divide-y divide-gray-200">
        @forelse ($models as $model)
            <div class="flex flex-col sm:flex-row sm:items-center justify-between p-4 hover:bg-gray-50 transition">
                <div>
                    <h3 class="text-lg font-semibold text-gray-800">{{ $model->name }}</h3>
                    <p class="text-sm text-gray-500 mt-1">Type: {{ $model->type }}</p>
                    <p class="text-sm text-gray-500">Manufacturer: {{ $model->manufacturer->name ?? 'N/A' }}</p>
                    <p class="text-xs text-gray-400 mt-1">ID: {{ $model->id }}</p>
                </div>

                <div class="flex mt-4 sm:mt-0 space-x-4">
                    <a href="{{ route('models.show', $model->id) }}"
                       class="text-green-600 font-medium hover:underline">View</a>

                    <a href="{{ route('models.edit', $model->id) }}"
                       class="text-indigo-600 font-medium hover:underline">Edit</a>

                    <form action="{{ route('models.destroy', $model->id) }}" method="POST"
                          onsubmit="return confirm('Are you sure you want to delete this model?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 font-medium hover:underline">Delete</button>
                    </form>
                </div>
            </div>
        @empty
            <div class="p-6 text-gray-500 text-center text-lg">No vehicle models found.</div>
        @endforelse
    </div>

    <div class="mt-8">
        {{ $models->links() }}
    </div>

</x-layout>
