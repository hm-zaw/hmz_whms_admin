<!-- Apexcharts -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/apexcharts/dist/apexcharts.min.css">
<style>
    .apexcharts-tooltip.apexcharts-theme-light
    {
        background-color: transparent !important;
        border: none !important;
        box-shadow: none !important;
    }
    .transition-colors {
        transition: color 0.2s, border-bottom-color 0.2s;
    }
</style>

<x-adm-dsh-nav>
    <div id="dashboard-section" class="w-full lg:ps-64 transition-all duration-300">
        <div class="p-4 sm:p-6 space-y-4 sm:space-y-6">
            <!-- Grid -->
            <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6">
                <!-- Card 1 -->
                <div class="flex flex-col bg-white border shadow-sm rounded-xl">
                    <div class="p-4 md:p-5">
                        <div class="flex items-center gap-x-2">
                            <p class="text-xs uppercase tracking-wide text-gray-500"> Total users </p>
                            <div class="hs-tooltip">
                                <!-- toggle -->
                                <div class="hs-tooltip-toggle">
                                    <svg class="shrink-0 size-4 text-gray-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <circle cx="12" cy="12" r="10" />
                                        <path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3" />
                                        <path d="M12 17h.01" />
                                    </svg>
                                    <span class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 transition-opacity inline-block absolute invisible z-10 py-1 px-2 bg-gray-900 text-xs font-medium text-white rounded shadow-sm" role="tooltip"> The number of daily users </span>
                                </div>
                            </div>
                        </div>

                        <div class="mt-1 flex items-center gap-x-2">
                            <h3 class="text-xl sm:text-2xl font-medium text-gray-800">
                                100
                            </h3>
                            <span class="flex items-center gap-x-1 text-green-600">
                    <svg class="inline-block size-4 self-center" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                      <polyline points="22 7 13.5 15.5 8.5 10.5 2 17" />
                      <polyline points="16 7 22 7 22 13" />
                    </svg>
                    <span class="inline-block text-sm">
                      80%
                    </span>
                </span>
                        </div>
                    </div>
                </div>

                <!-- Card 2 -->
                <div class="flex flex-col bg-white border shadow-sm rounded-xl">
                    <div class="p-4 md:p-5">
                        <div class="flex items-center gap-x-2">
                            <p class="text-xs uppercase tracking-wide text-gray-500">
                                MedAI Bot Users
                            </p>
                        </div>

                        <div class="mt-1 flex items-center gap-x-2">
                            <h3 class="text-xl sm:text-2xl font-medium text-gray-800">
                                12423
                            </h3>
                        </div>
                    </div>
                </div>

                <!-- Card 3 -->
                <div class="sm:col-span-2 lg:col-span-2 w-full flex justify-center items-center">
                    <div class="relative cursor-pointer dark:text-white">
                        <span class="absolute top-0 left-0 w-full h-full mt-0.5 ml-0.5 bg-signatureGreen rounded-lg"></span>
                        <div class="relative py-3.5 px-[82px] bg-white border-2 border-signatureGreen rounded-lg hover:scale-[1.025] transition duration-500">
                            <div class="flex items-center align-center">
                                <h3 class="mb-2 mt-1 ml-3 text-sm font-bold text-gray-800">Welcome Back, S Paw</h3>
                                <span class="text-xl -mt-2 pl-2">👋</span>
                            </div>
                            <p class="text-gray-600 text-xs text-center">
                                Your dashboard is waiting. Ready to help!
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid lg:grid-cols-2 gap-4 sm:gap-6">
                <div class="p-4 md:p-5 min-h-[410px] flex flex-col bg-white border shadow-sm rounded-xl ">
                    <div class="flex justify-between items-center">
                        <div>
                            <h2 class="text-sm text-gray-500 ">Income</h2>
{{--                            @php--}}
{{--                                // Calculate total income for all records--}}
{{--                                $totalRecordsAllDay = \App\Models\Medical_record::all()->count();--}}
{{--                                $real_income_allDay = $totalRecordsAllDay * 30000;--}}

{{--                                // Calculate total income for today's records--}}
{{--                                $totalRecordsToday = \App\Models\Medical_record::whereDate('created_at', today())->count();--}}
{{--                                $real_income_today = $totalRecordsToday * 30000;--}}
{{--                            @endphp--}}
{{--                            @php--}}
{{--                                $today = date('Y-m-d');--}}
{{--                                $startDateThisWeek = date('Y-m-d', strtotime($today . ' -6 days'));--}}
{{--                                $endDateThisWeek = $today;--}}

{{--                                $thisWeekArray = [];--}}
{{--                                $currentDate = $startDateThisWeek;--}}

{{--                                // Use query builder to get the total patients per day--}}
{{--                                while($currentDate <= $endDateThisWeek){--}}
{{--                                    $countByDayThis = $patientCount -> where('date', $currentDate)->sum('total_patients');--}}
{{--                                    $incomeByDayThis = $countByDayThis * 30000;--}}
{{--                                    $thisWeekArray[] = $incomeByDayThis;--}}
{{--                                    $currentDate = date('Y-m-d', strtotime($currentDate . ' +1 day'));--}}
{{--                                }--}}

{{--                                $thisWeekArrayJson = json_encode($thisWeekArray);--}}

{{--                                $startDateLastWeek = date('Y-m-d', strtotime($today . ' -13 days'));--}}
{{--                                $endDateLastWeek = date('Y-m-d', strtotime($today . ' -7 days'));--}}

{{--                                $lastWeekArray = [];--}}
{{--                                $currentDate = $startDateLastWeek;--}}

{{--                                // Use query builder to get the total patients per day--}}
{{--                                while($currentDate <= $endDateLastWeek){--}}
{{--                                    $countByDayLast = $patientCount -> where('date', $currentDate)->sum('total_patients');--}}
{{--                                    $incomeByDayLast = $countByDayLast * 30000;--}}
{{--                                    $lastWeekArray[] = $incomeByDayLast;--}}
{{--                                    $currentDate = date('Y-m-d', strtotime($currentDate . ' +1 day'));--}}
{{--                                }--}}

{{--                                $lastWeekArrayJson = json_encode($lastWeekArray);--}}
{{--                            @endphp--}}


                            <p class="text-xl sm:text-2xl font-medium text-gray-800">154300</p>
                        </div>

                        <div>
                      <span class="py-[5px] px-1.5 inline-flex items-center gap-x-1 text-xs font-medium rounded-md bg-teal-100 text-teal-800">
                        <svg class="inline-block size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                          <path d="M12 5v14" />
                          <path d="m19 12-7 7-7-7" />
                        </svg>
{{--                          @php--}}
{{--                              $todayIncomeRate = ($real_income_today/$real_income_allDay) * 100;--}}
{{--                          @endphp--}}
{{--                          {{ number_format($todayIncomeRate, 1) }}%--}}
                      </span>
                        </div>
                    </div>
                    <div id="hs-line-chart"></div>
                </div>

                <!-- Card Visitor-->
                <div class="p-4 md:p-5 min-h-[410px] flex flex-col bg-white border shadow-sm rounded-xl">
                    <!-- Header -->
                    <div class="flex justify-between items-center">
                        <div>
                            <h2 class="text-sm text-gray-500">
                                Visitors
                            </h2>
                            <p class="text-xl sm:text-2xl font-medium text-gray-800">
                                13632
                            </p>
                        </div>

                        <div>
                      <span class="py-[5px] px-1.5 inline-flex items-center gap-x-1 text-xs font-medium rounded-md bg-red-100 text-red-800">
                        <svg class="inline-block size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                          <path d="M12 5v14" />
                          <path d="m19 12-7 7-7-7" />
                        </svg>
{{--                          @php--}}
{{--                              $totalAppointments = \App\Models\Appointment::count();--}}
{{--                              $todayAppointments = \App\Models\Appointment::where('date', today())->count();--}}
{{--                              $todayAppointmentRate = $totalAppointments > 0 ? ($todayAppointments / $totalAppointments) * 100 : 0;--}}
{{--                          @endphp--}}
{{--                          @php--}}
{{--                              $today = date('Y-m-d');--}}
{{--                              $lastDays = date('Y-m-d', strtotime($today . '-6 days'));--}}
{{--                              $dataArray = array();--}}

{{--                              while ($lastDays <= $today){--}}
{{--                                  $userCounting = \App\Models\Appointment::where('date', $lastDays)->count();--}}
{{--                                  $dataArray[] = $userCounting;--}}
{{--                                  $lastDays = date('Y-m-d', strtotime($lastDays . '+1 days'));--}}
{{--                              }--}}

{{--                              $dataArrayJson = json_encode($dataArray);--}}
{{--                          @endphp--}}
                          48%
                      </span>
                        </div>
                    </div>

                    <div id="hs-single-area-chart"></div>
                </div>
            </div>
        </div>
    </div>
</x-adm-dsh-nav>

<!-- Apexcharts -->
<script src="https://cdn.jsdelivr.net/npm/lodash@4.17.21/lodash.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script src="https://preline.co/assets/js/hs-apexcharts-helpers.js"></script>

<!-- Give data input here -->
{{--<script>--}}
{{--    window.addEventListener("load", () => {--}}
{{--        (function () {--}}
{{--            buildChart(--}}
{{--                "#hs-multiple-bar-charts",--}}
{{--                (mode) => ({--}}
{{--                    chart: {--}}
{{--                        type: "bar",--}}
{{--                        height: 300,--}}
{{--                        toolbar: {--}}
{{--                            show: false,--}}
{{--                        },--}}
{{--                        zoom: {--}}
{{--                            enabled: false,--}}
{{--                        },--}}
{{--                    },--}}
{{--                    series: [--}}
{{--                        {--}}
{{--                            name: "Chosen Period",--}}
{{--                            data: [--}}
{{--                                200000, 750000, 580000, 1100000, 890000, 780000, 1500000--}}
{{--                            ],--}}
{{--                        },--}}
{{--                        {--}}
{{--                            name: "Last Period",--}}
{{--                            data: [--}}
{{--                                170000, 760000, 850000, 1010000, 980000, 870000, 1050000,--}}
{{--                            ],--}}
{{--                        },--}}
{{--                    ],--}}
{{--                    plotOptions: {--}}
{{--                        bar: {--}}
{{--                            horizontal: false,--}}
{{--                            columnWidth: "22px",--}}
{{--                            borderRadius: 0,--}}
{{--                        },--}}
{{--                    },--}}
{{--                    legend: {--}}
{{--                        show: false,--}}
{{--                    },--}}
{{--                    dataLabels: {--}}
{{--                        enabled: false,--}}
{{--                    },--}}
{{--                    stroke: {--}}
{{--                        show: true,--}}
{{--                        width: 8,--}}
{{--                        colors: ["transparent"],--}}
{{--                    },--}}
{{--                    xaxis: {--}}
{{--                        categories: [--}}
{{--                            "Sun",--}}
{{--                            "Mon",--}}
{{--                            "Tues",--}}
{{--                            "Wed",--}}
{{--                            "Thurs",--}}
{{--                            "Fri",--}}
{{--                            "Sat",--}}
{{--                        ],--}}
{{--                        axisBorder: {--}}
{{--                            show: false,--}}
{{--                        },--}}
{{--                        axisTicks: {--}}
{{--                            show: false,--}}
{{--                        },--}}
{{--                        crosshairs: {--}}
{{--                            show: false,--}}
{{--                        },--}}
{{--                        labels: {--}}
{{--                            style: {--}}
{{--                                colors: "#9ca3af",--}}
{{--                                fontSize: "13px",--}}
{{--                                fontFamily: "Inter, ui-sans-serif",--}}
{{--                                fontWeight: 400,--}}
{{--                            },--}}
{{--                            offsetX: -2,--}}
{{--                            formatter: (title) => title.slice(0, 3),--}}
{{--                        },--}}
{{--                    },--}}
{{--                    yaxis: {--}}
{{--                        labels: {--}}
{{--                            align: "left",--}}
{{--                            style: {--}}
{{--                                colors: "#9ca3af",--}}
{{--                                fontSize: "13px",--}}
{{--                                fontFamily: "Inter, ui-sans-serif",--}}
{{--                                fontWeight: 400,--}}
{{--                            },--}}
{{--                            formatter: (value) => {--}}
{{--                                if (value >= 100000) {--}}
{{--                                    return `${(value / 100000)} lakh`;--}}
{{--                                } else if (value >= 1000) {--}}
{{--                                    return `${(value / 1000)}k`;--}}
{{--                                }--}}
{{--                                return value;--}}
{{--                            },--}}
{{--                        },--}}
{{--                        tickAmount: 5,--}}
{{--                        min: 0,--}}
{{--                        max: 1000000,--}}
{{--                    },--}}
{{--                    states: {--}}
{{--                        hover: {--}}
{{--                            filter: {--}}
{{--                                type: "darken",--}}
{{--                                value: 0.9,--}}
{{--                            },--}}
{{--                        },--}}
{{--                    },--}}
{{--                    tooltip: {--}}
{{--                        y: {--}}
{{--                            formatter: (value) => {--}}
{{--                                if (value >= 100000) {--}}
{{--                                    return `${(value / 100000).toFixed(1)} lakh`;--}}
{{--                                } else if (value >= 1000) {--}}
{{--                                    return `${(value / 1000).toFixed(1)}k`;--}}
{{--                                }--}}
{{--                                return `${value}`;--}}
{{--                            },--}}
{{--                        },--}}
{{--                        custom: function (props) {--}}
{{--                            const { categories } = props.ctx.opts.xaxis;--}}
{{--                            const { dataPointIndex } = props;--}}
{{--                            const title = categories[dataPointIndex];--}}
{{--                            const newTitle = `${title}`;--}}

{{--                            return buildTooltip(props, {--}}
{{--                                title: newTitle,--}}
{{--                                mode,--}}
{{--                                hasTextLabel: true,--}}
{{--                                wrapperExtClasses: "min-w-28",--}}
{{--                                labelDivider: ":",--}}
{{--                                labelExtClasses: "ms-2",--}}
{{--                            });--}}
{{--                        },--}}
{{--                    },--}}


{{--                    responsive: [--}}
{{--                        {--}}
{{--                            breakpoint: 568,--}}
{{--                            options: {--}}
{{--                                chart: {--}}
{{--                                    height: 300,--}}
{{--                                },--}}
{{--                                plotOptions: {--}}
{{--                                    bar: {--}}
{{--                                        columnWidth: "14px",--}}
{{--                                    },--}}
{{--                                },--}}
{{--                                stroke: {--}}
{{--                                    width: 8,--}}
{{--                                },--}}
{{--                                labels: {--}}
{{--                                    style: {--}}
{{--                                        colors: "#9ca3af",--}}
{{--                                        fontSize: "11px",--}}
{{--                                        fontFamily: "Inter, ui-sans-serif",--}}
{{--                                        fontWeight: 400,--}}
{{--                                    },--}}
{{--                                    offsetX: -2,--}}
{{--                                    formatter: (title) => title.slice(0, 3),--}}
{{--                                },--}}
{{--                                yaxis: {--}}
{{--                                    labels: {--}}
{{--                                        align: "left",--}}
{{--                                        minWidth: 0,--}}
{{--                                        maxWidth: 140,--}}
{{--                                        style: {--}}
{{--                                            colors: "#9ca3af",--}}
{{--                                            fontSize: "11px",--}}
{{--                                            fontFamily: "Inter, ui-sans-serif",--}}
{{--                                            fontWeight: 400,--}}
{{--                                        },--}}
{{--                                        formatter: (value) => {--}}
{{--                                            if (value >= 100000) { return `${value / 100000} lakh`; }--}}
{{--                                            return value;--}}
{{--                                        },--}}
{{--                                    },--}}
{{--                                },--}}
{{--                            },--}}
{{--                        },--}}
{{--                    ],--}}
{{--                }),--}}
{{--                {--}}
{{--                    colors: ["#309b7d", "#d1d5db"],--}}
{{--                    grid: { borderColor: "#e5e7eb" },--}}
{{--                },--}}
{{--                {--}}
{{--                    colors: ["#6b7280", "#309b7d"],--}}
{{--                    grid: { borderColor: "#404040" },--}}
{{--                }--}}
{{--            );--}}
{{--        })();--}}
{{--    });--}}
{{--</script>--}}
{{--<script>--}}
{{--    window.addEventListener("load", () => {--}}
{{--        const thisWeekArray = @json($thisWeekArray);--}}
{{--        const lastWeekArray = @json($lastWeekArray);--}}
{{--        // const thisWeekArray = [120000, 750000, 580000, 1100000, 890000, 780000, 1500000];--}}
{{--        // const lastWeekArray = [130000, 760000, 850000, 1010000, 980000, 870000, 1050000];--}}

{{--        (function () {--}}
{{--            function getDateRange(startDate, endDate) {--}}
{{--                const dates = [];--}}
{{--                let currentDate = new Date(startDate);--}}

{{--                while (currentDate <= endDate) {--}}
{{--                    // Format date to 'Month' and 'Day'--}}
{{--                    const month = currentDate.toLocaleDateString('en-GB', { month: 'short' });--}}
{{--                    const day = currentDate.toLocaleDateString('en-GB', { day: '2-digit' });--}}
{{--                    dates.push(`${month} ${day}`);--}}
{{--                    currentDate.setDate(currentDate.getDate() + 1);--}}
{{--                }--}}

{{--                return dates;--}}
{{--            }--}}

{{--            const today = new Date();--}}
{{--            today.setHours(0, 0, 0, 0);--}}

{{--            // Set the start date to 6 days before today--}}
{{--            const startDate = new Date(today);--}}
{{--            startDate.setDate(today.getDate() - 6);--}}

{{--            const dateRange = getDateRange(startDate, today);--}}
{{--            buildChart(--}}
{{--                "#hs-line-chart",--}}
{{--                (mode) => ({--}}
{{--                    chart: {--}}
{{--                        type: "line",--}}
{{--                        height: 300,--}}
{{--                        toolbar: {--}}
{{--                            show: false,--}}
{{--                        },--}}
{{--                        zoom: {--}}
{{--                            enabled: false,--}}
{{--                        },--}}
{{--                    },--}}
{{--                    series: [--}}
{{--                        {--}}
{{--                            name: "Chosen Period",--}}
{{--                            data: thisWeekArray,--}}
{{--                        },--}}
{{--                        {--}}
{{--                            name: "Last Period",--}}
{{--                            data: lastWeekArray,--}}
{{--                        },--}}
{{--                    ],--}}
{{--                    stroke: {--}}
{{--                        curve: 'smooth',--}}
{{--                        width: 3--}}
{{--                    },--}}
{{--                    xaxis: {--}}
{{--                        categories: dateRange--}}
{{--                    },--}}
{{--                    yaxis: {--}}
{{--                        min: 0,--}}
{{--                        max: Math.max(...thisWeekArray, ...lastWeekArray),--}}
{{--                    },--}}
{{--                    tooltip: {--}}
{{--                        enabled: true,--}}
{{--                        theme: "light", // Ensures tooltip background is light--}}
{{--                        style: {--}}
{{--                            fontSize: '12px',--}}
{{--                            fontFamily: 'Helvetica, Arial, sans-serif',--}}
{{--                        },--}}
{{--                        onDatasetHover: {--}}
{{--                            highlightDataSeries: true,--}}
{{--                        },--}}
{{--                        x: {--}}
{{--                            show: true,--}}
{{--                        },--}}
{{--                        y: {--}}
{{--                            formatter: (value) => value.toFixed(2), // Customize value format if needed--}}
{{--                        },--}}
{{--                        marker: {--}}
{{--                            show: true, // Display marker on the tooltip--}}
{{--                        },--}}
{{--                        background: '#ffffff', // White background for the tooltip--}}
{{--                        borderColor: '#e5e7eb', // Optional: add border color--}}
{{--                        borderWidth: 1, // Optional: add border width--}}
{{--                    },--}}
{{--                }),--}}
{{--                {--}}
{{--                    colors: ["#2563eb", "#d1d5db"],--}}
{{--                    grid: { borderColor: "#e5e7eb" },--}}
{{--                },--}}
{{--                {--}}
{{--                    colors: ["#6b7280", "#2563eb"],--}}
{{--                    grid: { borderColor: "#404040" },--}}
{{--                }--}}
{{--            );--}}
{{--        })();--}}
{{--    });--}}
{{--</script>--}}

{{--<script>--}}
{{--    window.addEventListener("load", () => {--}}
{{--        (function () {--}}
{{--            function getDateRange(startDate, endDate) {--}}
{{--                const dates = [];--}}
{{--                let currentDate = new Date(startDate);--}}

{{--                while (currentDate <= endDate) {--}}
{{--                    // Format date to 'Month' and 'Day'--}}
{{--                    const month = currentDate.toLocaleDateString('en-GB', { month: 'short' });--}}
{{--                    const day = currentDate.toLocaleDateString('en-GB', { day: '2-digit' });--}}
{{--                    dates.push(`${month} ${day}`);--}}
{{--                    currentDate.setDate(currentDate.getDate() + 1);--}}
{{--                }--}}

{{--                return dates;--}}
{{--            }--}}

{{--            const today = new Date();--}}
{{--            today.setHours(0, 0, 0, 0);--}}

{{--            // Set the start date to 6 days before today--}}
{{--            const startDate = new Date(today);--}}
{{--            startDate.setDate(today.getDate() - 6);--}}

{{--            const dateRange = getDateRange(startDate, today);--}}
{{--            const dataArray = @json($dataArray);--}}
{{--            buildChart(--}}
{{--                "#hs-single-area-chart",--}}
{{--                (mode) => ({--}}
{{--                    chart: {--}}
{{--                        height: 300,--}}
{{--                        type: "area",--}}
{{--                        toolbar: {--}}
{{--                            show: false,--}}
{{--                        },--}}
{{--                        zoom: {--}}
{{--                            enabled: false,--}}
{{--                        },--}}
{{--                    },--}}
{{--                    series: [--}}
{{--                        {--}}
{{--                            name: "Visitors",--}}
{{--                            data: dataArray,--}}
{{--                        },--}}
{{--                    ],--}}
{{--                    legend: {--}}
{{--                        show: false,--}}
{{--                    },--}}
{{--                    dataLabels: {--}}
{{--                        enabled: false,--}}
{{--                    },--}}
{{--                    stroke: {--}}
{{--                        curve: "straight",--}}
{{--                        width: 2,--}}
{{--                    },--}}
{{--                    grid: {--}}
{{--                        strokeDashArray: 2,--}}
{{--                    },--}}
{{--                    fill: {--}}
{{--                        type: "gradient",--}}
{{--                        gradient: {--}}
{{--                            type: "vertical",--}}
{{--                            shadeIntensity: 1,--}}
{{--                            opacityFrom: 0.1,--}}
{{--                            opacityTo: 0.8,--}}
{{--                        },--}}
{{--                    },--}}
{{--                    xaxis: {--}}
{{--                        type: "category",--}}
{{--                        tickPlacement: "on",--}}
{{--                        categories: dateRange,--}}
{{--                        axisBorder: {--}}
{{--                            show: false,--}}
{{--                        },--}}
{{--                        axisTicks: {--}}
{{--                            show: false,--}}
{{--                        },--}}
{{--                        crosshairs: {--}}
{{--                            stroke: {--}}
{{--                                dashArray: 0,--}}
{{--                            },--}}
{{--                            dropShadow: {--}}
{{--                                show: false,--}}
{{--                            },--}}
{{--                        },--}}
{{--                        tooltip: {--}}
{{--                            enabled: false,--}}
{{--                        },--}}
{{--                        labels: {--}}
{{--                            style: {--}}
{{--                                colors: "#9ca3af",--}}
{{--                                fontSize: "11px",--}}
{{--                                fontFamily: "Inter, ui-sans-serif",--}}
{{--                                fontWeight: 400,--}}
{{--                            },--}}
{{--                            formatter: (title) => {--}}
{{--                                let t = title;--}}

{{--                                if (t) {--}}
{{--                                    const newT = t.split(" ");--}}
{{--                                    t = `${newT[0]} ${newT[1].slice(0, 3)}`;--}}
{{--                                }--}}

{{--                                return t;--}}
{{--                            },--}}
{{--                        },--}}
{{--                    },--}}
{{--                    yaxis: {--}}
{{--                        labels: {--}}
{{--                            align: "left",--}}
{{--                            minWidth: 0,--}}
{{--                            maxWidth: 140,--}}
{{--                            style: {--}}
{{--                                colors: "#9ca3af",--}}
{{--                                fontSize: "13px",--}}
{{--                                fontFamily: "Inter, ui-sans-serif",--}}
{{--                                fontWeight: 400,--}}
{{--                            },--}}
{{--                            formatter: (value) => {--}}
{{--                                if (value >= 100000) {--}}
{{--                                    return `${value / 100000} lakh`;--}}
{{--                                }--}}
{{--                                return value;--}}
{{--                            },--}}
{{--                        },--}}
{{--                    },--}}

{{--                    tooltip: {--}}
{{--                        x: {--}}
{{--                            format: "MMMM yyyy",--}}
{{--                        },--}}
{{--                        y: {--}}
{{--                            formatter: (value) =>--}}
{{--                                `${value >= 1000 ? `${value / 1000}k` : value}`,--}}
{{--                        },--}}
{{--                        custom: function (props) {--}}
{{--                            const { categories } = props.ctx.opts.xaxis;--}}
{{--                            const { dataPointIndex } = props;--}}
{{--                            const title = categories[dataPointIndex].split(" ");--}}
{{--                            const newTitle = `${title[0]} ${title[1]}`;--}}

{{--                            return buildTooltip(props, {--}}
{{--                                title: newTitle,--}}
{{--                                mode,--}}
{{--                                valuePrefix: "",--}}
{{--                                hasTextLabel: true,--}}
{{--                                markerExtClasses: "!rounded-sm",--}}
{{--                                wrapperExtClasses: "min-w-28",--}}
{{--                            });--}}
{{--                        },--}}
{{--                    },--}}
{{--                    responsive: [--}}
{{--                        {--}}
{{--                            breakpoint: 568,--}}
{{--                            options: {--}}
{{--                                chart: {--}}
{{--                                    height: 300,--}}
{{--                                },--}}
{{--                                labels: {--}}
{{--                                    style: {--}}
{{--                                        colors: "#9ca3af",--}}
{{--                                        fontSize: "11px",--}}
{{--                                        fontFamily: "Inter, ui-sans-serif",--}}
{{--                                        fontWeight: 400,--}}
{{--                                    },--}}
{{--                                    offsetX: -2,--}}
{{--                                    formatter: (title) => title.slice(0, 3),--}}
{{--                                },--}}
{{--                                yaxis: {--}}
{{--                                    labels: {--}}
{{--                                        align: "left",--}}
{{--                                        minWidth: 0,--}}
{{--                                        maxWidth: 140,--}}
{{--                                        style: {--}}
{{--                                            colors: "#9ca3af",--}}
{{--                                            fontSize: "11px",--}}
{{--                                            fontFamily: "Inter, ui-sans-serif",--}}
{{--                                            fontWeight: 400,--}}
{{--                                        },--}}
{{--                                        formatter: (value) =>--}}
{{--                                            value >= 1000 ? `${value / 1000}k` : value,--}}
{{--                                    },--}}
{{--                                },--}}
{{--                            },--}}
{{--                        },--}}
{{--                    ],--}}
{{--                }),--}}
{{--                {--}}
{{--                    colors: ["#2563eb", "#9333ea"],--}}
{{--                    fill: {--}}
{{--                        gradient: {--}}
{{--                            stops: [0, 90, 100],--}}
{{--                        },--}}
{{--                    },--}}
{{--                    grid: {--}}
{{--                        borderColor: "#e5e7eb",--}}
{{--                    },--}}
{{--                },--}}
{{--                {--}}
{{--                    colors: ["#3b82f6", "#a855f7"],--}}
{{--                    fill: {--}}
{{--                        gradient: {--}}
{{--                            stops: [100, 90, 0],--}}
{{--                        },--}}
{{--                    },--}}
{{--                    grid: {--}}
{{--                        borderColor: "#404040",--}}
{{--                    },--}}
{{--                }--}}
{{--            );--}}
{{--        })();--}}
{{--    });--}}
{{--</script>--}}
