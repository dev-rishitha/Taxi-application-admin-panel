<tr>
    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $customer->id }}</td>
    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $customer->name }}</td>
    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $customer->email }}</td>
    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $customer->phone }}</td>
    <td class="px-6 py-4 whitespace-nowrap text-sm">
        @if ($customer->status === 'active')
            <span class="text-green-600 font-semibold">Active</span>
        @else
            <span class="text-red-600 font-semibold">Blocked</span>
        @endif
    </td>
    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium flex flex-wrap gap-2">

    <a href="{{ route('customers.history', $customer->id) }}"
       class="px-3 py-1 bg-gray-100 text-gray-800 rounded-full hover:bg-gray-200 transition text-xs min-w-[80px] text-center">
        History
    </a>

    <a href="{{ route('customers.notify', $customer->id) }}"
       class="px-3 py-1 bg-blue-100 text-blue-800 rounded-full hover:bg-blue-200 transition text-xs min-w-[80px] text-center">
        Notify
    </a>

    @if ($customer->status === 'active')
        <form action="{{ route('customers.block', $customer->id) }}" method="POST" class="inline-block"
              onsubmit="return confirm('Block this customer?')">
            @csrf
            <button type="submit"
                    class="px-3 py-1 bg-red-100 text-red-700 rounded-full hover:bg-red-200 transition text-xs min-w-[80px] text-center">
                Block
            </button>
        </form>
    @else
        <form action="{{ route('customers.unblock', $customer->id) }}" method="POST" class="inline-block"
              onsubmit="return confirm('Unblock this customer?')">
            @csrf
            <button type="submit"
                    class="px-3 py-1 bg-green-100 text-green-800 rounded-full hover:bg-green-200 transition text-xs min-w-[80px] text-center">
                Unblock
            </button>
        </form>
    @endif

</td>
</tr>
