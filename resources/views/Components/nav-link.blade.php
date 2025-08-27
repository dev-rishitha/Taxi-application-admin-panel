@props(['href' => '#'])

<a href="{{ $href }}" {{ $attributes->merge(['class' => 'flex items-center px-6 py-2 text-gray-800 hover:bg-gray-200']) }}>
    {{ $slot }}
</a>
