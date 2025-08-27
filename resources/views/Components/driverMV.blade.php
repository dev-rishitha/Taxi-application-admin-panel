 @props(['drivers'])
 {{-- Mobile cards for small screens --}}
            <div class="space-y-4 md:hidden">
                @foreach($drivers as $driver)
                    <div class="bg-white rounded-lg shadow p-4 border border-gray-200">
                        <div class="flex items-center gap-4">
                            <img src="{{ $driver->image_url }}" alt="Driver" class="w-16 h-16 rounded-full border">
                            <div>
                                <div class="font-semibold text-lg">{{ $driver->name }}</div>
                                <div class="text-gray-500 text-sm">⭐ 4.7</div>
                            </div>
                        </div>

                        <div class="mt-3 space-y-1 text-sm text-gray-700">
                            <div><strong>Phone:</strong> {{ $driver->phone }}</div>
                            <div><strong>Cab:</strong> {{ $driver->cab }}</div>
                            <div>
                                <strong>Status:</strong>
                                <span class="inline-flex items-center gap-1 text-xs font-semibold px-2 py-1 rounded-full
                                    {{ $driver->status === 'available' ? 'bg-green-100 text-green-800' : ($driver->status === 'on_trip' ? 'bg-yellow-100 text-yellow-800' : 'bg-gray-100 text-gray-600') }}">
                                    
                                    @if($driver->status === 'available')
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                        </svg>
                                    @elseif($driver->status === 'on_trip')
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3" />
                                        </svg>
                                    @elseif($driver->status === 'suspended')
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                        </svg>    
                                    @endif

                                    {{ ucfirst(str_replace('_', ' ', $driver->status)) }}
                                </span>
                            </div>
                        </div>
                        <div class="mt-4 flex flex-wrap gap-2">
                            <a href="{{ route('drivers.show', $driver->id) }}"
                               class="flex-1 text-center px-3 py-1 text-xs font-semibold uppercase tracking-wide text-blue-700 border border-blue-300 rounded-full bg-blue-50 hover:bg-blue-600 hover:text-white transition">
                               View
                            </a>

                            <form method="POST" action="{{ route('drivers.changeStatus', $driver->id) }}" class="flex-1" >
                                @csrf
                                <button type="submit"
                                    class="w-full px-3 py-1 text-xs font-semibold text-yellow-800 border border-yellow-400 rounded-full bg-yellow-100 hover:bg-yellow-500 hover:text-white transition">
                                    Toggle
                                </button>
                            </form>

                            <form method="POST" action="{{ route('drivers.suspend', $driver->id) }}" class="flex-1">
                                @csrf
                                <button type="submit"
                                    class="w-full px-3 py-1 text-xs font-bold text-red-800 border border-red-400 rounded-lg bg-red-100 hover:bg-red-500 hover:text-white transition">
                                    Suspend
                                </button>
                            </form>

                            <a href="{{ route('drivers.assignVehicle', $driver->id) }}"
                               class="flex-1 text-center px-3 py-1 text-xs font-semibold text-green-900 border border-green-400 rounded-full bg-green-100 hover:bg-green-500 hover:text-white transition">
                               Assign Cab
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>