<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Grafik Tx/Rx Interface Mikrotik</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="font-sans bg-gradient-to-br from-blue-50 to-indigo-100 min-h-screen">
    <div class="container mx-auto px-4 py-8">
        <!-- Header Section -->
        <div class="text-center mb-8">
            <h1 class="text-4xl font-bold text-gray-800 mb-2">Mikrotik Network Monitor</h1>
            <p class="text-gray-600">Real-time Traffic Monitoring for {{ $data['name'] }} Interface</p>
        </div>

        <!-- Main Chart Container -->
        <div class="bg-white rounded-xl shadow-lg p-6 mb-6">
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-2xl font-semibold text-gray-800">Realtime Grafik Tx/Rx Mikrotik ({{ $data['name'] }})</h2>
                <div class="flex items-center space-x-2">
                    <div class="w-3 h-3 bg-green-500 rounded-full animate-pulse"></div>
                    <span class="text-sm text-gray-600">Live</span>
                </div>
            </div>

            <!-- Chart Canvas -->
            <div class="bg-gray-50 rounded-lg p-4">
                <canvas id="trafficChart" class="w-full h-80 bg-gray-50 rounded-lg" data-id="{{ $data['.id'] }}"></canvas>
            </div>
        </div>

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
            <div class="bg-white rounded-lg shadow-md p-6">
                <div class="flex items-center">
                    <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mr-4">
                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16l-4-4m0 0l4-4m-4 4h18"></path>
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm text-gray-600">Current Rx</p>
                        <p class="text-xl font-semibold text-gray-800" id="currentRx">0 bps</p>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow-md p-6">
                <div class="flex items-center">
                    <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center mr-4">
                        <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm text-gray-600">Current Tx</p>
                        <p class="text-xl font-semibold text-gray-800" id="currentTx">0 bps</p>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow-md p-6">
                <div class="flex items-center">
                    <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center mr-4">
                        <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm text-gray-600">Interface</p>
                        <p class="text-xl font-semibold text-gray-800">{{ $data['name'] }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <div class="text-center text-gray-500 text-sm">
            <p>Data updates every 2 seconds • Last updated: <span id="lastUpdate">-</span></p>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const canvas = document.getElementById('trafficChart');
            const interfaceId = canvas.dataset.id;
            const ctx = canvas.getContext('2d');

            const now = Date.now();
            const initialLabels = Array.from({ length: 60 }, (_, i) => {
                const time = new Date(now - (59 - i) * 1000);
                return time.toLocaleTimeString();
            });

            const rxData = Array(60).fill(0);
            const txData = Array(60).fill(0);

            const trafficChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: initialLabels,
                    datasets: [
                        {
                            label: 'Rx (bps)',
                            data: rxData,
                            borderColor: '#3B82F6',
                            backgroundColor: 'rgba(59, 130, 246, 0.1)',
                            fill: true,
                            tension: 0.2,
                            borderWidth: 2
                        },
                        {
                            label: 'Tx (bps)',
                            data: txData,
                            borderColor: '#10B981',
                            backgroundColor: 'rgba(16, 185, 129, 0.1)',
                            fill: true,
                            tension: 0.2,
                            borderWidth: 2
                        }
                    ]
                },
                options: {
                    animation: false,
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        x: {
                            type: 'category',
                            reverse: true,
                            ticks: {
                                maxTicksLimit: 10,
                                color: '#6B7280'
                            },
                            grid: {
                                color: '#E5E7EB'
                            }
                        },
                        y: {
                            beginAtZero: true,
                            ticks: {
                                color: '#6B7280',
                                callback: function (value) {
                                    if (value >= 1000000) return (value / 1000000).toFixed(1) + ' Mbps';
                                    else if (value >= 1000) return (value / 1000).toFixed(0) + ' kbps';
                                    return value + ' bps';
                                }
                            },
                            grid: {
                                color: '#E5E7EB'
                            }
                        }
                    },
                    plugins: {
                        legend: {
                            position: 'top',
                            labels: {
                                color: '#374151',
                                font: {
                                    size: 12,
                                    weight: '500'
                                }
                            }
                        },
                        title: {
                            display: true,
                            text: 'Traffic {{ $data["name"] }} (Tx/Rx)',
                            font: {
                                size: 16,
                                weight: '600'
                            },
                            color: '#1F2937'
                        }
                    }
                }
            });

            function formatBytes(bytes) {
                if (bytes >= 1000000) return (bytes / 1000000).toFixed(1) + ' Mbps';
                else if (bytes >= 1000) return (bytes / 1000).toFixed(0) + ' kbps';
                return bytes + ' bps';
            }

            function fetchData() {
                // Fixed: Proper URL construction with encodeURIComponent
                const url = `/interface-traffic/data/${encodeURIComponent(interfaceId)}`;

                fetch(url)
                    .then(res => {
                        if (!res.ok) {
                            throw new Error(`HTTP error! status: ${res.status}`);
                        }
                        return res.json();
                    })
                    .then(data => {
                        if (typeof data.rx !== 'number' || typeof data.tx !== 'number') {
                            throw new Error("Invalid data format");
                        }

                        const now = new Date();
                        const label = now.toLocaleTimeString();

                        trafficChart.data.labels.unshift(label);
                        trafficChart.data.datasets[0].data.unshift(data.rx);
                        trafficChart.data.datasets[1].data.unshift(data.tx);

                        if (trafficChart.data.labels.length > 60) {
                            trafficChart.data.labels.pop();
                            trafficChart.data.datasets[0].data.pop();
                            trafficChart.data.datasets[1].data.pop();
                        }

                        trafficChart.update();

                        document.getElementById('currentRx').textContent = formatBytes(data.rx);
                        document.getElementById('currentTx').textContent = formatBytes(data.tx);
                        document.getElementById('lastUpdate').textContent = label;
                    })
                    .catch(err => {
                        console.error('Fetch error:', err);
                        // Optional: Show error message to user
                        document.getElementById('lastUpdate').textContent = 'Error loading data';
                    });
            }

            fetchData(); // Initial fetch
            setInterval(fetchData, 2000); // Every 2 seconds
        });
    </script>
</body>
</html>
