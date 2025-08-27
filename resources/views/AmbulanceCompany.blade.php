<x-layout>
    <x-slot name="heading">
        <h1 class="text-2xl font-bold">🚑 Ambulance Companies</h1>
    </x-slot>

    <!-- Top Bar: Search + Filter + Add Company -->
        <div class="flex flex-wrap gap-3 mb-5">
            <!-- Search -->
            <input type="text"
                placeholder="Search Company..."
                class="flex-1 min-w-[200px] border border-gray-300 rounded-lg px-4 py-2 focus:ring-indigo-500 focus:border-indigo-500"
            />

            <!-- Filter -->
            <select
                class="border border-gray-300 rounded-lg px-3 py-2 text-sm focus:ring-indigo-500 focus:border-indigo-500"
            >
                <option>All</option>
                <option>Active</option>
                <option>Inactive</option>
            </select>

            <!-- Add Button -->
            <a href="#"
                class="flex items-center justify-center px-4 py-2 bg-indigo-600 text-white text-sm font-medium rounded-lg hover:bg-indigo-700 whitespace-nowrap"
            >
                + Add Company
            </a>
        </div>

    <!-- Styled Table -->
    <div class="overflow-x-auto bg-white shadow rounded-lg">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-indigo-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-bold text-gray-700 uppercase">Logo</th>
                    <th class="px-6 py-3 text-left text-xs font-bold text-gray-700 uppercase">Company Name</th>
                    <th class="px-6 py-3 text-left text-xs font-bold text-gray-700 uppercase">Phone</th>
                    <th class="px-6 py-3 text-left text-xs font-bold text-gray-700 uppercase">Ambulances</th>
                    <th class="px-6 py-3 text-left text-xs font-bold text-gray-700 uppercase">Status</th>
                    <th class="px-6 py-3 text-center text-xs font-bold text-gray-700 uppercase">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                <!-- Company Row -->
                <tr class="hover:bg-gray-50 transition">
                    <td class="px-6 py-4 whitespace-nowrap">
                        <img src="https://i.pravatar.cc/40?img=7" alt="Company Logo" class="w-10 h-10 rounded-full">
                    </td>
                    <td class="px-6 py-4 font-medium text-gray-800">LifeLine Ambulance</td>
                    <td class="px-6 py-4 text-gray-600">+1 234 567 890</td>
                    <td class="px-6 py-4 text-gray-600">5</td>
                    <td class="px-6 py-4">
                        <span class="inline-flex items-center px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">Active</span>
                    </td>
                    <td class="px-6 py-4 text-center">
                        <div class="relative inline-block text-left">
                            <button type="button" class="inline-flex justify-center w-8 h-8 text-gray-600 hover:text-indigo-600 focus:outline-none">
                                ⋮
                            </button>
                            <!-- Actions dropdown (can add JS later) -->
                            <div class="hidden absolute right-0 mt-2 w-28 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none">
                                <div class="py-1">
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-indigo-50">View</a>
                                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-indigo-50">Edit</a>
                                    <a href="#" class="block px-4 py-2 text-sm text-red-600 hover:bg-red-50">Remove</a>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>

                <!-- Duplicate rows as needed -->

            </tbody>
        </table>
    </div>
</x-layout>
