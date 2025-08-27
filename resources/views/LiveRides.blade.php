<x-layout>
  <x-slot name="heading">
    <h1 class="text-2xl font-bold ">Live Rides</h1>
  </x-slot>

  {{-- Filter buttons --}}
  <div class="flex flex-wrap justify-center gap-3 mb-6 select-none">
    <button class="px-4 py-2 rounded-full bg-gray-800 text-white font-semibold hover:bg-gray-900 transition">All Active</button>
    <button class="px-4 py-2 rounded-full border border-gray-800 text-gray-800 hover:bg-gray-100 transition">Near Me</button>
    <button class="px-4 py-2 rounded-full border border-gray-800 text-gray-800 hover:bg-gray-100 transition">High Progress</button>
  </div>

  {{-- Scrollable Live Rides container --}}
  <div class="max-w-7xl mx-auto px-4 py-2 overflow-x-hidden">
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 auto-rows-fr">
      {{-- Ride Card --}}
      @for ($i = 0; $i < 16; $i++)
        <div class="bg-white/80 backdrop-blur-sm rounded-xl shadow-md p-4 flex flex-col justify-between hover:shadow-lg transition">
          <div class="flex items-center justify-between mb-2">
            <div class="flex items-center gap-3">
              <img src="https://i.pravatar.cc/40?u=driver{{$i}}" alt="Driver {{$i}}" class="rounded-full border-2 border-gray-800" />
              <div>
                <h3 class="text-gray-900 font-semibold">Driver {{$i}}</h3>
                <p class="text-gray-700 text-xs">Customer: User{{$i}}</p>
              </div>
            </div>
            <div class="flex items-center gap-1">
              <div class="w-3 h-3 rounded-full bg-red-500 animate-pulse" title="Live"></div>
              <span class="text-xs text-gray-600">RID{{$i}}</span>
            </div>
          </div>

          <div class="mb-3 text-gray-700 text-xs">
            <p><strong>Pickup:</strong> City A</p>
            <p><strong>Drop:</strong> City B</p>
          </div>

          {{-- Progress Circle --}}
          <div class="flex items-center justify-between mt-auto">
            <div class="relative w-12 h-12">
              <svg class="transform -rotate-90" viewBox="0 0 36 36">
                <path
                  class="text-gray-300"
                  stroke-width="4"
                  stroke="currentColor"
                  fill="none"
                  d="M18 2.0845
                     a 15.9155 15.9155 0 0 1 0 31.831
                     a 15.9155 15.9155 0 0 1 0 -31.831"
                />
                <path
                  class="text-gray-800"
                  stroke-width="4"
                  stroke-linecap="round"
                  fill="none"
                  stroke-dasharray="{{ rand(20,90) }}, 100"
                  d="M18 2.0845
                     a 15.9155 15.9155 0 0 1 0 31.831
                     a 15.9155 15.9155 0 0 1 0 -31.831"
                />
              </svg>
              <div class="absolute inset-0 flex items-center justify-center text-xs font-semibold text-gray-900">
                {{ rand(20,90) }}%
              </div>
            </div>

            <button class="text-xs px-3 py-1 rounded bg-gray-800 text-white hover:bg-gray-900 transition">Track</button>
          </div>
        </div>
      @endfor
    </div>
  </div>

  <footer class="mt-12 text-center text-gray-500 italic select-none">
    Showing {{ $i }} active rides
  </footer>
</x-layout>
