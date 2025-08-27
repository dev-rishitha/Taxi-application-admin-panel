<x-layout>
    <x-slot name="heading">
        <h1 class="text-2xl font-bold">🚖 Driver Performance Dashboard</h1>
        <p class="text-gray-500">Track driver metrics, earnings, and availability in real-time.</p>
    </x-slot>

    <!-- Chart Section -->
    <div class="bg-white p-6 rounded-lg shadow mb-10 border border-gray-200">
        <h2 class="text-xl font-semibold text-gray-900 mb-4">📊 Performance Overview</h2>
        <div class="h-80 bg-gray-50 rounded-lg overflow-hidden p-4 border border-gray-300">
            <canvas id="performanceChart" class="w-full h-full"></canvas>
        </div>
    </div>

    <!-- Driver List Table -->
    <div class="bg-white rounded-lg shadow border border-gray-200">
        <h2 class="text-xl font-semibold text-gray-900 px-6 py-4 border-b">Driver List</h2>
        <div id="driversTable">
            @include('partials.drivers-table', ['drivers' => $drivers])
        </div>
    </div>

    @push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        let chartInstance = null;

        function renderChart(drivers) {
            const ctx = document.getElementById('performanceChart').getContext('2d');
            const labels = drivers.map(d => d.name);
            const ridesData = drivers.map(d => d.rides_count ?? 0);
            const earningsData = drivers.map(d => d.earnings ?? 0);

            if (chartInstance) {
                chartInstance.destroy();
            }

            chartInstance = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [
                        {
                            label: 'Rides Completed',
                            data: ridesData,
                            backgroundColor: '#6366F1'
                        },
                        {
                            label: 'Earnings (₹)',
                            data: earningsData,
                            backgroundColor: '#F59E0B'
                        }
                    ]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: { y: { beginAtZero: true } },
                    plugins: { legend: { labels: { font: { size: 13 } } } }
                }
            });
        }

        // Initial chart render
        document.addEventListener('DOMContentLoaded', () => {
            const initialDrivers = @json($drivers->items());
            renderChart(initialDrivers);
        });

        // AJAX Pagination handling
        document.addEventListener('click', function (e) {
            if (e.target.closest('.pagination a')) {
                e.preventDefault();
                const url = e.target.closest('a').href;

                fetch(url, {
                    headers: { 'X-Requested-With': 'XMLHttpRequest' }
                })
                .then(response => response.json())
                .then(data => {
                    document.getElementById('driversTable').innerHTML = data.table;
                    renderChart(data.drivers);
                })
                .catch(console.error);
            }
        });
    </script>
    @endpush
</x-layout>
