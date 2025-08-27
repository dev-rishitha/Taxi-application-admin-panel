<x-layout>
    <x-slot name="heading">
        <h1 class="text-2xl font-bold mb-4">Send Notification to {{ $customer->name }}</h1>
    </x-slot>

    <form action="{{ route('customers.notify.send', $customer->id) }}" method="POST" class="bg-white shadow rounded-lg p-6">
        @csrf
        <div class="mb-4">
            <label for="subject" class="block text-gray-700 font-medium mb-2">Subject</label>
            <input type="text" id="subject" name="subject" class="w-full border rounded px-4 py-2" placeholder="Notification subject" required>
        </div>

        <div class="mb-4">
            <label for="message" class="block text-gray-700 font-medium mb-2">Message</label>
            <textarea id="message" name="message" rows="5" class="w-full border rounded px-4 py-2" placeholder="Write your message here..." required></textarea>
        </div>

        <div class="flex items-center">
            <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">Send Notification</button>
            <a href="{{ route('customers.index') }}" class="ml-4 text-gray-600 hover:underline">Cancel</a>
        </div>
    </form>
</x-layout>
