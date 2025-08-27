<x-layout :showStatuses="true">
    <x-slot name="heading">
        <h1 class="text-2xl font-bold">Admin Dashboard</h1>
    </x-slot>
    <!-- Map
    <div id="map" class="h-[300px] sm:h-[400px] md:h-[450px] rounded overflow-hidden shadow relative z-0"></div> -->

<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4 mt-8">
    <div class="bg-white rounded shadow p-4 text-center">
        <h3 class="text-sm font-semibold text-gray-600">Active Drivers</h3>
        <p class="text-2xl font-bold text-green-600">32</p>
    </div>
    <div class="bg-white rounded shadow p-4 text-center">
        <h3 class="text-sm font-semibold text-gray-600">Ongoing Rides</h3>
        <p class="text-2xl font-bold text-blue-600">9</p>
    </div>
    <div class="bg-white rounded shadow p-4 text-center">
        <h3 class="text-sm font-semibold text-gray-600">Vehicles Available</h3>
        <p class="text-2xl font-bold text-yellow-600">20</p>
    </div>
    <div class="bg-white rounded shadow p-4 text-center">
        <h3 class="text-sm font-semibold text-gray-600">Total Earnings Today</h3>
        <p class="text-2xl font-bold text-purple-600">₹14,500</p>
    </div>
</div>

    <div class="mt-8 bg-white rounded-lg shadow p-4 border border-blue-100">
  <h2 class="text-lg font-semibold text-blue-800 mb-3">Booking Trends (7 days)</h2>
  <canvas id="bookingTrendsChart" height="100"></canvas>
</div>

@push('scripts')
<script>
const trendCtx = document.getElementById('bookingTrendsChart').getContext('2d');
new Chart(trendCtx, {
  type: 'line',
  data: {
    labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
    datasets: [{
      label: 'Bookings',
      data: [50, 70, 65, 80, 90, 100, 60],
      borderColor: '#2563eb',
      backgroundColor: 'rgba(37, 99, 235, 0.15)',
      pointBackgroundColor: '#2563eb',
      tension: 0.4,
      fill: true
    }]
  },
  options: {
    plugins: {
      legend: {
        display: false
      }
    },
    scales: {
      y: {
        ticks: {
          display: false
        },
        grid: {
          display: false
        }
      },
      x: {
        ticks: {
          color: '#2563eb',
          font: {
            weight: '500'
          }
        },
        grid: {
          display: false
        }
      }
    },
    elements: {
      point: {
        radius: 3
      }
    }
  }
});
</script>
@endpush

</div>
<!-- 
    <div class="mt-8">
        <x-TripStatistics/>
    </div> -->
</x-layout>
