<x-layout :title="'Model Details: ' . $model->name">
    <x-slot name="heading">
        <h1 class="text-3xl font-bold text-gray-800 mb-6">Model Details</h1>
    </x-slot>

    <div class="bg-white rounded-2xl shadow-lg p-8 space-y-8">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between space-y-4 md:space-y-0">
            <div>
                <h2 class="text-2xl font-semibold text-gray-900">{{ $model->name }}</h2>
                <p class="text-sm text-gray-500">Vehicle Model Profile</p>
            </div>
            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-blue-100 text-blue-800">
                {{ $model->type }}
            </span>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 text-gray-700">
            <div>
                <p class="text-sm font-semibold text-gray-500 uppercase mb-1">ID</p>
                <p class="text-lg font-medium">{{ $model->id }}</p>
            </div>
            <div>
                <p class="text-sm font-semibold text-gray-500 uppercase mb-1">Name</p>
                <p class="text-lg font-medium">{{ $model->name }}</p>
            </div>
            <div>
                <p class="text-sm font-semibold text-gray-500 uppercase mb-1">Type</p>
                <p class="text-lg font-medium">{{ $model->type }}</p>
            </div>
            <div>
                <p class="text-sm font-semibold text-gray-500 uppercase mb-1">Manufacturer</p>
                <p class="text-lg font-medium">{{ $model->manufacturer->name ?? 'N/A' }}</p>
            </div>
            <div>
                <p class="text-sm font-semibold text-gray-500 uppercase mb-1">Created At</p>
                <p class="text-lg font-medium">{{ $model->created_at->format('d M Y, h:i A') }}</p>
            </div>
            <div>
                <p class="text-sm font-semibold text-gray-500 uppercase mb-1">Last Updated</p>
                <p class="text-lg font-medium">{{ $model->updated_at->format('d M Y, h:i A') }}</p>
            </div>
        </div>

        <div class="flex flex-wrap gap-4 pt-4 border-t border-gray-200">
            <a href="{{ route('models.edit', $model->id) }}"
               class="inline-flex items-center px-4 py-2 bg-yellow-500 hover:bg-yellow-600 text-white font-semibold rounded-lg shadow transition">
                ✏️ Edit Model
            </a>

            <form action="{{ route('models.destroy', $model->id) }}" method="POST"
                  onsubmit="return confirm('Are you sure you want to delete this model?');">
                @csrf
                @method('DELETE')
                <button type="submit"
                        class="inline-flex items-center px-4 py-2 bg-red-500 hover:bg-red-600 text-white font-semibold rounded-lg shadow transition">
                    🗑️ Delete
                </button>
            </form>

            <a href="{{ route('models.index') }}"
               class="inline-flex items-center px-4 py-2 bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold rounded-lg shadow transition">
                ⬅️ Back to List
            </a>
        </div>
    </div>
</x-layout>
