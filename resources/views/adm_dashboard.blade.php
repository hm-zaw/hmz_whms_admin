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
        <div class="container mx-auto p-4">

            <div class="grid grid-cols-1 gap-6">
                <div class="flex flex-wrap bg-white p-4 rounded-lg shadow-md transition-transform transform hover:scale-105">
                    <!-- First Chart Container (Record vs Prediction) -->
                    <div class="w-full md:w-1/2 p-2">
                        <div class="chart-container w-full mt-10">
                            <div id="container" class="w-full h-[350px] rounded-lg shadow-inner bg-gray-100"></div>
                        </div>
                    </div>

                    <!-- Second Chart Container (Customer Shops) -->
                    <div class="w-full md:w-1/2 p-2">
                        <div class="chart-container w-full mt-10">
                            <div id="myChart2" class="w-full h-[350px] rounded-lg shadow-inner bg-gray-100"></div>
                        </div>
                    </div>
                </div>

                <!-- Hourly Chart -->
                <div class="bg-white p-4 rounded-lg shadow-md transition-transform transform hover:scale-105">
                    <div id="salesContainer" class="w-full h-[400px] mt-4 rounded-lg shadow-inner bg-gray-100"></div>
                </div>

                <!-- Your Monthly Sales Chart -->
                <div class="bg-white p-4 rounded-lg shadow-md transition-transform transform hover:scale-105">
                    <div id="monthSalesContainer" class="w-full h-[400px] mt-4 rounded-lg shadow-inner bg-gray-100"></div>
                </div>

                <!-- Daily Sales Line Chart -->
                <div class="bg-white p-4 rounded-lg shadow-md transition-transform transform hover:scale-105">
                    <div id="dailySalesContainer" class="w-full h-[400px] mt-4 rounded-lg shadow-inner bg-gray-100"></div>
                </div>
            </div>
        </div>

        <div class="mt-8 bg-white p-6 rounded-lg shadow-md">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <!-- Stock Report Download -->
                <div class="text-center">
                    <h2 class="text-2xl font-semibold text-indigo-600 mb-2">Stock Report</h2>
                    <p class="text-gray-600 mb-4">Download the latest stock report in CSV format.</p>
                    <form action="{{ route('stock.downloadCSV') }}" method="get">
                        @csrf
                        <div class="flex flex-col md:flex-row justify-center gap-4 mb-4">
                            <input type="date" name="start_date" class="p-2 border border-gray-300 rounded-md">
                            <input type="date" name="end_date" class="p-2 border border-gray-300 rounded-md">
                        </div>
                        <button type="submit" class="px-6 py-3 bg-indigo-600 text-white rounded-lg shadow hover:bg-indigo-700 transition-transform transform hover:scale-105">Download CSV</button>
                    </form>
                </div>

                <!-- View Stock Report Analyzer -->
                <div class="text-center">
                    <h2 class="text-2xl font-semibold text-indigo-600 mb-2">Report Analyzer</h2>
                    <p class="text-gray-600 mb-4">One Click Will Solve All the Reports 🔊</p>
                    <p class="text-gray-600 mb-4">Just One Click to Analyze All The Stocks & View Your Stocks</p>
                    <button type="submit" id="openModalBtn" class="px-6 py-3 mt-5 bg-indigo-600 text-white rounded-lg shadow hover:bg-indigo-700 transition-transform transform hover:scale-105">View Stock Analyzer</button>
                </div>
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

<!-- Highcharts Script -->
<script src="https://code.highcharts.com/highcharts.js"></script>

