<x-layout>
    <x-slot name="heading">
        <h1 class="text-2xl font-bold mb-4">Customers Management</h1>
    </x-slot>

    {{-- Search and Filters --}}
<div class="flex flex-wrap items-center gap-2 mb-4">
    <form action="{{ route('customers.index') }}" method="GET" class="flex items-center space-x-2">
        
        <div x-data="customerSearch()" class="relative flex-grow min-w-[250px] max-w-[350px]">
            <input 
                type="text" 
                name="search"
                x-model="search" 
                @input.debounce.300ms="getSuggestions" 
                placeholder="Search customers..."
                value="{{ request('search') }}"
                class="w-full md:w-64 px-3 py-2 text-sm border border-gray-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500 transition"
                autocomplete="off">

            <div x-show="suggestions.length" class="absolute z-10 bg-white border rounded mt-1 w-full max-h-48 overflow-y-auto">
                <template x-for="name in suggestions" :key="name">
                    <div 
                        @click="selectSuggestion(name)"
                        class="px-4 py-2 hover:bg-gray-100 cursor-pointer"
                        x-text="name"
                    ></div>
                </template>
            </div>
        </div>

        <select name="status" class="border p-2 rounded" onchange="this.form.submit()">
            <option value="all" {{ request('status') == 'all' ? 'selected' : '' }}>Status: All</option>
            <option value="active" {{ request('status') == 'active' ? 'selected' : '' }}>Active</option>
            <option value="blocked" {{ request('status') == 'blocked' ? 'selected' : '' }}>Blocked</option>
        </select>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Search</button>
        <button 
            type="button" 
            onclick="resetSearch()" 
            class="bg-gray-500 text-white px-4 py-2 rounded">
            Reset
        </button>
    </form>
</div>

    <div class="bg-white shadow rounded-lg p-6 overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">ID</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Name</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Email</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Phone</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach($customers as $customer)
                    <x-customer-row :customer="$customer" />
                @endforeach
            </tbody>
        </table>
        <div class="mt-4">
            {{ $customers->links('vendor.pagination.tailwind') }}
        </div>
    </div>
</x-layout>


<script>
function resetSearch() {
    window.location.href = @json(route('customers.index'));
}

function customerSearch() {
    return {
        search: @json(request('search') ?? ''),
        suggestions: [],

        getSuggestions() {
            if (this.search.length < 1) {
                this.suggestions = [];
                return;
            }

            fetch(`/customers-suggestions?query=${encodeURIComponent(this.search)}`)
                .then(response => response.json())
                .then(data => {
                    this.suggestions = data;
                });
        },

        selectSuggestion(name) {
            this.search = name;
            this.suggestions = [];
            this.$el.closest('form').submit();
        }
    }
}

</script>


