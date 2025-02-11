
<x-adm-dsh-nav>
    <div class="relative overflow-x-auto sm:rounded-lg">
        <table id="resizable-table" class="w-full my-4 text-sm text-left rtl:text-right text-gray-500 border-collapse">
            <div class="flex justify-between items-center p-5 bg-white">
                <div class="text-lg font-semibold text-left rtl:text-right text-gray-900">
                    POUT SA  |  Inventory
                    <p class="mt-1 text-xs font-normal text-gray-500 dark:text-gray-400">
                        Discover our online shop's inventory at POUT SA. Trusted by many.
                    </p>
                </div>
                <input type="date" id="date-picker" class="rounded-lg border-gray-300 text-gray-700 px-3 py-2 text-sm focus:ring focus:ring-blue-300">

                <script>
                    document.addEventListener("DOMContentLoaded", function () {
                        const datePicker = document.getElementById("date-picker");
                        const buttonsGp = document.getElementById("buttons-gp");

                        const today = new Date().toISOString().split("T")[0];
                        datePicker.value = today;
                        datePicker.max = today;

                        function toggleButtons() {
                            if (datePicker.value === today) {
                                buttonsGp.style.display = "inline-flex";
                            } else {
                                buttonsGp.style.display = "none";
                            }
                        }

                        toggleButtons();

                        datePicker.addEventListener("change", toggleButtons);
                    });
                </script>

            </div>

            <div id="buttons-gp" class="inline-flex rounded-lg border border-gray-100 bg-gray-100 p-1">
                <button id="stocks-btn" class="tab-button inline-flex items-center gap-2 rounded-md bg-white px-4 py-1 text-sm text-blue-500 shadow-xs focus:relative" data-type="stocks">
                    <i class="fa-light fa-boxes-stacked"></i>
                    <span class="text-[13px]"> Stocks </span>
                </button>

                <button id="hot-items-btn" class="tab-button inline-flex items-center gap-2 rounded-md px-4 py-1 text-sm text-gray-500 hover:text-gray-700 focus:relative" data-type="hotItems">
                    <i class="fa-regular fa-fire"></i>
                    <span class="text-[13px]"> Hot items </span>
                </button>

                <button id="empty-stocks-btn" class="tab-button inline-flex items-center gap-2 rounded-md px-4 py-1 text-sm text-gray-500 hover:text-gray-700 focus:relative" data-type="emptyStocks">
                    <i class="fa-duotone fa-solid fa-person-dolly-empty"></i>
                    <span class="text-[13px]"> Empty stocks </span>
                </button>
            </div>

            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr id="resizable-header-row">
                <th class="resizable px-6 py-3">Item name</th>
                <th class="resizable px-6 py-3">Address</th>
                <th class="resizable px-6 py-3">Township</th>
                <th class="resizable px-6 py-3">Region</th>
                <th class="resizable px-6 py-3">Contact</th>
                <th class="px-6 py-3"><span class="sr-only">Edit</span></th>
            </tr>
            </thead>
            <tbody id="resizable-body">
{{--            @foreach($shops as $shop)--}}
                <tr class="resizable-row bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200" data-id="">
                    <td class="resizable px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white" data-field="partner_shops_name">
                        ABC
                    </td>
                    <td class="resizable px-6 py-4" data-field="partner_shops_address">ABC</td>
                    <td class="resizable px-6 py-4" data-field="partner_shops_township">hdosf</td>
                    <td class="resizable px-6 py-4" data-field="partner_shops_region">isffe</td>
                    <td class="resizable px-6 py-4" data-field="contact_primary">ef99vf</td>
                    <td class="px-6 py-4 text-right flex flex-col gap-y-1">
                        <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline edit-btn"
                           data-id=""
                           data-shop-name=""
                           data-shop-address=""
                           data-shop-township=""
                           data-shop-region=""
                           data-shop-contact=""
                        >Edit</a>

                        <form action="" method="POST">
                            @csrf
                            @method('DELETE')
                            <button id="delete-btn" class="delete-btn font-medium text-red-500 dark:text-blue-500 hover:underline">Delete</button>
                        </form>
                    </td>
                </tr>
{{--            @endforeach--}}
            </tbody>
        </table>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const buttons = document.querySelectorAll('.tab-button');
            const tableBody = document.getElementById('resizable-body');

            // Example data (replace with your actual data fetching logic)
            const data = {
                stocks: [
                    { name: 'Shop A', address: '123 Main St', township: 'Town A', region: 'Region A', contact: '123-456-7890', stock: 10 },
                    { name: 'Shop B', address: '456 Elm St', township: 'Town B', region: 'Region B', contact: '987-654-3210', stock: 5 }
                ],
                hotItems: [
                    { name: 'Shop C', address: '789 Oak St', township: 'Town C', region: 'Region C', contact: '555-555-5555', stock: 20 }
                ],
                emptyStocks: [
                    { name: 'Shop D', address: '101 Pine St', township: 'Town D', region: 'Region D', contact: '111-222-3333', stock: 0 }
                ]
            };

            function renderTable(items) {
                tableBody.innerHTML = ''; // Clear existing rows
                items.forEach(item => {
                    const row = `
                    <tr class="resizable-row bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                        <td class="resizable px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">${item.name}</td>
                        <td class="resizable px-6 py-4">${item.address}</td>
                        <td class="resizable px-6 py-4">${item.township}</td>
                        <td class="resizable px-6 py-4">${item.region}</td>
                        <td class="resizable px-6 py-4">${item.contact}</td>
                        <td class="px-6 py-4 text-right flex flex-col gap-y-1">
                            <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline edit-btn">Edit</a>
                            <form action="" method="POST">
                                @csrf
                    @method('DELETE')
                    <button class="delete-btn font-medium text-red-500 dark:text-blue-500 hover:underline">Delete</button>
                </form>
            </td>
        </tr>
`;
                    tableBody.insertAdjacentHTML('beforeend', row);
                });
            }

            // Handle button clicks and update active styles
            buttons.forEach(button => {
                button.addEventListener('click', function() {
                    buttons.forEach(btn => btn.className = 'inline-flex items-center gap-2 rounded-md px-4 py-1 text-sm text-gray-500 hover:text-gray-700 focus:relative');
                    this.className = 'inline-flex items-center gap-2 rounded-md bg-white px-4 py-1 text-sm text-blue-500 shadow-xs focus:relative';

                    // Render corresponding data
                    const type = this.getAttribute('data-type');
                    renderTable(data[type]);
                });
            });

            // Set default active tab
            document.getElementById('stocks-btn').click();
        });
    </script>
</x-adm-dsh-nav>
