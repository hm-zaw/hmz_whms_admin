<x-adm-dsh-nav>
    <div class="container mx-auto p-6">
        <!-- Welcome Message Section -->
        <div class="bg-gradient-to-r from-indigo-600 to-purple-600 p-6 rounded-lg shadow-md text-center text-black">
            <h1 class="text-2xl font-bold">WELCOME TO ADMIN DASHBOARD</h1>
            <p class="text-sm mt-2">Manage your models, customers, service centers, warehouse branches, and reports with ease.</p>
        </div>

        <!-- Cards Section -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mt-6">
            @foreach ([
                ['title' => 'Products', 'icon' => 'fas fa-cogs', 'count' => 'models-count', 'bg' => 'bg-blue-400'],
                ['title' => 'Customers', 'icon' => 'fas fa-users', 'count' => 'customers-count', 'bg' => 'bg-green-400'],
                ['title' => 'Service Centers', 'icon' => 'fas fa-tools', 'count' => 'service-centers-count', 'bg' => 'bg-yellow-400'],
                ['title' => 'Branches', 'icon' => 'fas fa-warehouse', 'count' => 'warehouse-branches-count', 'bg' => 'bg-indigo-400']
            ] as $card)
                <div class="p-6 rounded-lg shadow-md {{ $card['bg'] }} text-white text-center transform transition-transform duration-300 ease-in-out hover:scale-110 hover:rotate-6 hover:-rotate-6 hover:shadow-lg cursor-pointer">
                    <i class="{{ $card['icon'] }} text-4xl"></i>
                    <h3 class="text-xl font-bold mt-2">{{ $card['title'] }}</h3>
                    <p class="text-lg font-semibold mt-1" id="{{ $card['count'] }}">Loading...</p>
                </div>
            @endforeach
        </div>

        <!-- Monthly Data & Predictions -->
        <div class="bg-white shadow-lg rounded-lg p-8 mt-6">
            <div class="text-lg font-semibold text-left rtl:text-right text-gray-900">
                Monthly Data & Predictions
                <p class="my-1 text-xs font-normal text-gray-500 dark:text-gray-400">
                    This is the monthly data and predictions for the products.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 justify-center w-full mt-4">
                <!-- First Chart Container -->
                <div class="flex flex-col items-center bg-gray-100 p-6 rounded-lg shadow-md transform transition-transform duration-300 ease-in-out hover:scale-105 hover:shadow-lg cursor-pointer">
                    <h2 class="text-center text-xl font-semibold text-black mb-4 p-3 bg-gradient-to-r from-indigo-500 to-purple-500 rounded-md shadow">
                        Record vs Prediction
                    </h2>
                    <div class="chart-container w-full">
                        <canvas id="myChart" class="w-full h-[250px] md:h-[300px] lg:h-[350px]"></canvas>
                    </div>
                </div>

                <!-- Second Chart Container -->
                <div class="flex flex-col items-center bg-gray-100 p-6 rounded-lg shadow-md transform transition-transform duration-300 ease-in-out hover:scale-105 hover:shadow-lg cursor-pointer">
                    <h2 class="text-center text-xl font-semibold text-black mb-4 p-3 bg-gradient-to-r from-green-400 to-blue-500 rounded-md shadow">
                        Customer Shops
                    </h2>
                    <div class="chart-container w-full">
                        <canvas id="myChart2" class="w-full h-[250px] md:h-[300px] lg:h-[350px]"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <!-- Stock Report Download -->
        <div class="mt-8 bg-white p-6 rounded-lg shadow-md text-center">
            <h2 class="text-2xl font-semibold text-indigo-600">Stock Report</h2>
            <p class="text-gray-600">Download the latest stock report in CSV format.</p>
            <form action="{{ route('stock.downloadCSV') }}" method="get" class="mt-4">
                @csrf
                <div class="flex flex-col md:flex-row justify-center gap-4">
                    <input type="date" name="start_date" class="p-2 border rounded-md">
                    <input type="date" name="end_date" class="p-2 border rounded-md">
                </div>
                <button type="submit" class="mt-4 px-6 py-3 bg-indigo-600 text-white rounded-lg shadow hover:bg-indigo-700 transition">Download CSV</button>
            </form>
        </div>

        <!-- View Stock Report Analyzer -->
        <div class="mt-8 bg-white p-6 rounded-lg shadow-md text-center">
            <h2 class="text-2xl font-semibold text-indigo-600">Report Analyzer</h2>
            <p class="text-gray-600 mt-5">One Click Will Solve All the Reports 🔊</p>
                <!-- Button to open the modal -->
                <div class="text-center mt-6 mb-6">
                    <button id="openModalBtn" class="px-6 py-2 bg-blue-500 text-white rounded-lg shadow-md hover:bg-blue-600">
                        View Stock Analyzer
                    </button>
                </div>
        </div>

        <!-- Modal Structure -->
        <div id="modal" class="fixed inset-0 bg-gray-800 bg-opacity-50 hidden flex justify-center items-center z-[70]">
            <div class="bg-white rounded-lg w-full max-w-4xl p-6">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-xl font-semibold">Stock Analyzer</h2>
                    <button id="closeModalBtn" class="text-gray-500 hover:text-gray-700 text-lg">&times;</button>
                </div>
                <div class="w-full h-[600px] rounded-lg shadow-lg overflow-hidden">
                    <iframe src="https://myantech-stock-analyzer.streamlit.app/?embedded=true"
                            class="w-full h-full border-0 rounded-lg">
                    </iframe>
                </div>
            </div>
        </div>
    </div>
</x-adm-dsh-nav>

<!-- Script to handle modal behavior -->
<script>
    const openModalBtn = document.getElementById('openModalBtn');
    const closeModalBtn = document.getElementById('closeModalBtn');
    const modal = document.getElementById('modal');

    openModalBtn.addEventListener('click', () => {
        modal.classList.remove('hidden');
    });

    closeModalBtn.addEventListener('click', () => {
        modal.classList.add('hidden');
    });

    // Close the modal if clicked outside
    window.addEventListener('click', (event) => {
        if (event.target === modal) {
            modal.classList.add('hidden');
        }
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    window.onload = function() {
        // Get elements where data will be inserted
        const modelsCount = document.getElementById('models-count');
        const customersCount = document.getElementById('customers-count');
        const serviceCentersCount = document.getElementById('service-centers-count');
        const warehouseBranchesCount = document.getElementById('warehouse-branches-count');

        // Fetch real data from the backend
        fetch('/get-stock-data')  // Ensure this matches the route you defined in routes/web.php
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                // Set data and animate counter numbers
                animateCounter(modelsCount, 0, data.modelsCount, 3000);
                animateCounter(customersCount, 0, data.customersCount, 3000);
                animateCounter(serviceCentersCount, 0, data.serviceCentersCount, 3000);
                animateCounter(warehouseBranchesCount, 0, data.warehouseBranchesCount, 3000);
            })
            .catch(error => {
                console.error('Error fetching stock data:', error);
                modelsCount.textContent = 'Error loading data';
                customersCount.textContent = 'Error loading data';
                serviceCentersCount.textContent = 'Error loading data';
                warehouseBranchesCount.textContent = 'Error loading data';
            });
    };

    // Counter Animation for the numbers
    function animateCounter(element, start, end, duration) {
        let current = start;
        const stepTime = Math.abs(Math.floor(duration / (end - start)));
        const timer = setInterval(function () {
            current += 1;
            element.textContent = current;
            if (current == end) {
                clearInterval(timer);
            }
        }, stepTime);
    }
</script>

<script>
    // Pass PHP data to JavaScript for Chart 1
    // Pass PHP data to JavaScript
    const labels = @json($labels);
    const salesData = @json($data);
    const predictionData = @json($predictions); // Now this will contain the Flask predictions

    console.log(labels, salesData, predictionData); // Debugging: Check if data is correct

    // Chart.js Integration
    const ctx1 = document.getElementById('myChart').getContext('2d');
    new Chart(ctx1, {
        type: 'line',
        data: {
            labels: labels,
            datasets: [
                {
                    label: 'Monthly Sales (MMK)',
                    data: salesData,
                    borderColor: 'rgba(54, 162, 235, 1)', // Blue color with transparency
                    borderWidth: 3,
                    fill: 'origin', // Add shading under the line
                    backgroundColor: 'rgba(54, 162, 235, 0.2)', // Light blue fill under the line
                    lineTension: 0.3, // Smooth curve for the sales line
                    pointRadius: 5, // Larger points for better visibility
                    pointBackgroundColor: 'rgba(54, 162, 235, 1)', // Points matching the line color
                    pointHoverBackgroundColor: 'rgba(54, 162, 235, 0.7)', // Hover effect
                    pointHoverRadius: 8, // Larger hover points
                    hoverBorderColor: 'rgba(54, 162, 235, 0.8)', // Hover border
                    hoverBorderWidth: 2 // Border width on hover
                },
                {
                    label: 'Predicted Sales (MMK)',
                    data: predictionData.map(item => item.prediction), // Map predictions to data points
                    borderColor: 'rgba(255, 99, 132, 1)', // Red color with transparency
                    borderWidth: 3,
                    fill: 'origin', // Add shading under the line
                    backgroundColor: 'rgba(255, 99, 132, 0.2)', // Light red fill under the line
                    borderDash: [5, 5], // Dashed line style
                    lineTension: 0.3, // Smooth curve for prediction line
                    pointRadius: 5, // Larger points for better visibility
                    pointBackgroundColor: 'rgba(255, 99, 132, 1)', // Points matching the prediction line color
                    pointHoverBackgroundColor: 'rgba(255, 99, 132, 0.7)', // Hover effect
                    pointHoverRadius: 8, // Larger hover points
                    hoverBorderColor: 'rgba(255, 99, 132, 0.8)', // Hover border
                    hoverBorderWidth: 2 // Border width on hover
                }
            ]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top', // Legend placed on top of the chart
                    labels: {
                        boxWidth: 20, // Smaller boxes for the legend
                        font: {
                            size: 14, // Increase font size for better visibility
                            weight: 'bold' // Make the font weight bold for emphasis
                        },
                    }
                },
                tooltip: {
                    backgroundColor: 'rgba(0, 0, 0, 0.7)', // Dark background for tooltips
                    titleFont: {
                        weight: 'bold',
                        size: 14
                    },
                    bodyFont: {
                        size: 12
                    },
                    callbacks: {
                        title: function(tooltipItem) {
                            return 'Month: ' + tooltipItem[0].label; // Customize tooltip title
                        },
                        label: function(tooltipItem) {
                            return tooltipItem.dataset.label + ': ' + tooltipItem.raw.toLocaleString(); // Format the number
                        }
                    }
                }
            },
            scales: {
                y: {
                    ticks: {
                        beginAtZero: true,
                        stepSize: 500, // Set step size for better spacing on the Y-axis
                        maxTicksLimit: 10, // Limit the number of ticks on Y-axis
                        font: {
                            size: 12 // Font size for ticks
                        },
                        callback: function(value) {
                            return value.toLocaleString(); // Add comma separator for large numbers
                        }
                    },
                    grid: {
                        color: 'rgba(200, 200, 200, 0.5)', // Light grid lines for better UI
                        lineWidth: 1,
                        display: false // Disable horizontal grid lines (Y-axis grid lines)
                    }
                },
                x: {
                    grid: {
                        color: 'rgba(200, 200, 200, 0.5)', // Light grid lines for better UI
                        lineWidth: 1
                    },
                    ticks: {
                        font: {
                            size: 12 // Font size for ticks on X-axis
                        }
                    }
                }
            },
            elements: {
                line: {
                    tension: 0.4, // Smooth lines
                },
                point: {
                    radius: 5, // Increase radius for points
                }
            }
        }
    });

    // Chart 2 - Shop-based Sales Chart
    const chartData2 = {
        labels: @json($shopLabels), // Shop names
        data: @json($shopData) // Quantities sold by each shop
    };

    const ctx2 = document.getElementById('myChart2').getContext('2d');
    new Chart(ctx2, {
        type: 'bar', // Bar chart for shop sales
        data: {
            labels: chartData2.labels, // Shop names
            datasets: [{
                label: 'Buying Count',
                data: chartData2.data, // Buying count per shop
                backgroundColor: 'rgba(75, 192, 192, 0.6)', // Custom bar color
                borderColor: 'rgba(75, 192, 192, 1)', // Border color for the bars
                borderWidth: 1, // Border width for the bars
            }]
        },
        options: {
            responsive: true, // Make the chart responsive to screen size
            maintainAspectRatio: false, // Allow the chart to stretch to container size
            scales: {
                x: {
                    ticks: {
                        font: { size: 14, weight: 'bold' }, // Customize font size for x-axis labels
                        maxRotation: 45, // Rotate x-axis labels if needed
                        minRotation: 30, // Adjust for better readability
                    },
                    grid: {
                        display: false // Hide gridlines for x-axis
                    }
                },
                y: {
                    beginAtZero: true, // Start y-axis at 0
                    ticks: {
                        font: { size: 14, weight: 'bold' }, // Customize font size for y-axis labels
                        stepSize: 10, // Control the interval between y-axis ticks
                    },
                    grid: {
                        display: true, // Display gridlines for y-axis
                        color: '#e0e0e0', // Light gridline color
                    }
                }
            },
            plugins: {
                legend: {
                    position: 'top', // Position the legend at the top
                    labels: {
                        font: { size: 14, weight: 'bold' }, // Customize legend font
                    }
                },
                tooltip: {
                    callbacks: {
                        title: (tooltipItem) => 'Shop: ' + tooltipItem[0].label, // Tooltip title
                        label: (tooltipItem) => 'Buying Count: ' + tooltipItem.raw, // Tooltip label with the value
                    }
                }
            },
            layout: {
                padding: {
                    left: 20, // Add padding for better spacing
                    right: 20,
                    top: 20,
                    bottom: 20
                }
            }
        }
    });
</script>

<script>
    window.onload = function() {
        // Get elements where data will be inserted
        const modelsCount = document.getElementById('models-count');
        const customersCount = document.getElementById('customers-count');
        const serviceCentersCount = document.getElementById('service-centers-count');
        const warehouseBranchesCount = document.getElementById('warehouse-branches-count');

        // Fetch real data from the backend
        fetch('/get-stock-data')  // Ensure this matches the route you defined in routes/web.php
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                // Set data and animate counter numbers
                animateCounter(modelsCount, 0, data.modelsCount, 3000);
                animateCounter(customersCount, 0, data.customersCount, 3000);
                animateCounter(serviceCentersCount, 0, data.serviceCentersCount, 3000);
                animateCounter(warehouseBranchesCount, 0, data.warehouseBranchesCount, 3000);
            })
            .catch(error => {
                console.error('Error fetching stock data:', error);
                modelsCount.textContent = 'Error loading data';
                customersCount.textContent = 'Error loading data';
                serviceCentersCount.textContent = 'Error loading data';
                warehouseBranchesCount.textContent = 'Error loading data';
            });
    };

    // Counter Animation for the numbers
    function animateCounter(element, start, end, duration) {
        let current = start;
        const stepTime = Math.abs(Math.floor(duration / (end - start)));
        const timer = setInterval(function () {
            current += 1;
            element.textContent = current;
            if (current == end) {
                clearInterval(timer);
            }
        }, stepTime);
    }
</script>

