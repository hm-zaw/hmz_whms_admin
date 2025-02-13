@php
    use Carbon\Carbon;
    use Illuminate\Support\Facades\DB;
    use App\Models\StockRecord;
@endphp

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required Meta Tags Always Come First -->
    <meta charset="utf-8">
    <meta name="robots" content="max-snippet:-1, max-image-preview:large, max-video-preview:-1">
    <link rel="canonical" href="https://preline.co/">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Comprehensive overview with charts, tables, and a streamlined dashboard layout for easy data visualization and analysis.">

    <meta name="twitter:site" content="@preline">
    <meta name="twitter:creator" content="@preline">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Tailwind CSS Admin Template | Preline UI, crafted with Tailwind CSS">
    <meta name="twitter:description" content="Comprehensive overview with charts, tables, and a streamlined dashboard layout for easy data visualization and analysis.">
    <meta name="twitter:image" content="https://preline.co/assets/img/og-image.png">

    <meta property="og:url" content="https://preline.co/">
    <meta property="og:locale" content="en_US">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Preline">
    <meta property="og:title" content="Tailwind CSS Admin Template | Preline UI, crafted with Tailwind CSS">
    <meta property="og:description" content="Comprehensive overview with charts, tables, and a streamlined dashboard layout for easy data visualization and analysis.">
    <meta property="og:image" content="https://preline.co/assets/img/og-image.png">

    <!-- Title -->
    <title> Pouk Sa | Admin </title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link rel="shortcut icon" href="../../../public/favicon.ico">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.7.2/css/all.css">

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Theme Check and Update -->
    <script>
        const html = document.querySelector('html');
        const isLightOrAuto = localStorage.getItem('hs_theme') === 'light' || (localStorage.getItem('hs_theme') === 'auto' && !window.matchMedia('(prefers-color-scheme: dark)').matches);
        const isDarkOrAuto = localStorage.getItem('hs_theme') === 'dark' || (localStorage.getItem('hs_theme') === 'auto' && window.matchMedia('(prefers-color-scheme: dark)').matches);

        if (isLightOrAuto && html.classList.contains('dark')) html.classList.remove('dark');
        else if (isDarkOrAuto && html.classList.contains('light')) html.classList.remove('light');
        else if (isDarkOrAuto && !html.classList.contains('dark')) html.classList.add('dark');
        else if (isLightOrAuto && !html.classList.contains('light')) html.classList.add('light');
    </script>

    <link rel="stylesheet" href="https://preline.co/assets/css/main.min.css">
</head>
<body class="bg-gray-50">

<!-- ========== HEADER ========== -->
<header class="sticky top-0 inset-x-0 flex flex-wrap md:justify-start md:flex-nowrap z-[48] w-full bg-white border-b text-sm py-2.5 lg:ps-[260px]">
    <nav class="px-4 sm:px-6 flex basis-full items-center w-full mx-auto">
        <div class="me-4 lg:me-0 lg:hidden">
            <a class="flex-none rounded-md text-xl flex flex-row items-center font-semibold focus:outline-none focus:opacity-80" href="#">
                🛍️
            </a>
        </div>
        <div class="w-full flex items-center justify-end ms-auto md:justify-between gap-x-1 md:gap-x-3">
            <div class="hidden md:block">
                <!-- Search Input -->
                <div class="relative">
                    <div class="absolute inset-y-0 start-0 flex items-center pointer-events-none z-20 ps-3.5">
                        <svg class="shrink-0 size-4 text-gray-400" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="11" cy="11" r="8" />
                            <path d="m21 21-4.3-4.3" />
                        </svg>
                    </div>
                    <input type="text" class="py-2 ps-10 pe-16 block w-full bg-white border-gray-200 rounded-lg text-sm focus:outline-none focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none" placeholder="Search">
                    <div class="hidden absolute inset-y-0 end-0 flex items-center pointer-events-none z-20 pe-1">
                        <button type="button" class="inline-flex shrink-0 justify-center items-center size-6 rounded-full text-gray-500 hover:text-blue-600 focus:outline-none focus:text-blue-600 " aria-label="Close">
                            <span class="sr-only">Close</span>
                            <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="12" cy="12" r="10" />
                                <path d="m15 9-6 6" />
                                <path d="m9 9 6 6" />
                            </svg>
                        </button>
                    </div>
                    <div class="absolute inset-y-0 end-0 flex items-center pointer-events-none z-20 pe-3 text-gray-400">
                        <svg class="shrink-0 size-3 text-gray-400" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M15 6v12a3 3 0 1 0 3-3H6a3 3 0 1 0 3 3V6a3 3 0 1 0-3 3h12a3 3 0 1 0-3-3" />
                        </svg>
                        <span class="mx-1">
                            <svg class="shrink-0 size-3 text-gray-400" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                              <path d="M5 12h14" />
                              <path d="M12 5v14" />
                            </svg>
                        </span>
                        <span class="text-xs">/</span>
                    </div>
                </div>
            </div>

            <div class="flex flex-row items-center justify-end gap-6">
                <button type="button" class="md:hidden size-[38px] relative inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none">
                    <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="11" cy="11" r="8" />
                        <path d="m21 21-4.3-4.3" />
                    </svg>
                    <span class="sr-only">Search</span>
                </button>

                <div class="hs-dropdown relative inline-flex">
                    <button id="notification-dropdown" type="button" class="relative inline-flex items-center text-gray-600 hover:text-gray-700 p-2">
                        <i class="fa-regular fa-bell text-xl"></i>
                        @php
                            $currentDate = '2024-12-31';
                            $lowStockCount = DB::table('stock_records as sr1')
                                ->whereNotExists(function($query) {
                                    $query->from('stock_records as sr2')
                                        ->whereRaw('sr1.product_id = sr2.product_id')
                                        ->whereRaw('sr1.record_date < sr2.record_date');
                                })
                                ->where('sr1.record_date', '<=', $currentDate)
                                ->where('sr1.closing_balance', '<', 2)
                                ->count();
                        @endphp
                        @if($lowStockCount > 0)
                            <span class="absolute top-0 right-0 inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-red-100 transform translate-x-1/2 -translate-y-1/2 bg-red-600 rounded-full">
                                {{ $lowStockCount }}
                            </span>
                        @endif
                    </button>

                    <div class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden min-w-[350px] bg-white shadow-md rounded-lg mt-2" aria-labelledby="notification-dropdown">
                        <div class="p-4 border-b border-gray-200">
                            <h3 class="font-semibold text-gray-800">Notifications</h3>
                        </div>
                        
                        <div class="max-h-[350px] overflow-y-auto">
                            @php
                                $lowStockItems = StockRecord::with('product')
                                    ->select('stock_records.*')
                                    ->join(DB::raw('(
                                        SELECT product_id, MAX(record_date) as latest_date
                                        FROM stock_records
                                        WHERE record_date <= ?
                                        GROUP BY product_id
                                    ) latest_records'), function($join) {
                                        $join->on('stock_records.product_id', '=', 'latest_records.product_id')
                                         ->on('stock_records.record_date', '=', 'latest_records.latest_date');
                                    })
                                    ->where('closing_balance', '<', 2)
                                    ->setBindings([$currentDate])
                                    ->get();
                            @endphp

                            @forelse($lowStockItems as $item)
                                <div class="p-4 border-b border-gray-200">
                                    <div class="flex items-start gap-x-3">
                                        <i class="fa-regular fa-triangle-exclamation text-red-500 mt-1"></i>
                                        <div class="flex-1">
                                            <h4 class="text-sm font-semibold text-red-700">Low Stock Alert</h4>
                                            <p class="text-sm text-gray-600 mt-1">
                                                Item "{{ $item->product->name }}" is running low ({{ $item->closing_balance }} remaining)
                                            </p>
                                            <a href="{{ route('inventory.show') }}" 
                                               class="mt-2 inline-flex items-center gap-x-1 text-sm font-semibold text-red-600 hover:text-red-700">
                                                Manage Stock
                                                <i class="fa-regular fa-arrow-right text-sm"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="p-4 text-center text-gray-500">
                                    No new notifications
                                </div>
                            @endforelse
                        </div>

                        @if($lowStockCount > 0)
                            <div class="p-4 border-t border-gray-200">
                                <a href="{{ route('system.notification') }}" class="text-sm text-blue-600 hover:text-blue-700 font-medium">
                                    View All Notifications
                                </a>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="flex flex-col items-end mr-40">
                    <span class="text-sm font-medium text-gray-800">Hey, Kevin!</span>
                    <span class="text-xs text-gray-500">

                        @php date_default_timezone_set('Asia/Yangon');
                             $today = date('l, F j, Y');
                        @endphp
                        {{ $today }}
                    </span>
                </div>

                <div class="hs-dropdown [--placement:bottom-right] relative inline-flex">
                    <button id="hs-dropdown-account" type="button" class="size-[48px] mr-5 inline-flex justify-center items-center gap-x-3 text-sm font-semibold rounded-full border border-transparent text-gray-800 focus:outline-none disabled:opacity-50 disabled:pointer-events-none" aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">
                        <div class="flex items-center">
                            <img id="profile_avatar" src="{{ asset('images/profile.jpeg') }}" alt="Profile Picture" class="rounded-full border-2 border-gray-400 w-9 h-9">
                        </div>
                    </button>

                    <div class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden min-w-60 bg-white shadow-md rounded-lg mt-2 after:h-4 after:absolute after:-bottom-4 after:start-0 after:w-full before:h-4 before:absolute before:-top-4 before:start-0 before:w-full" role="menu" aria-orientation="vertical" aria-labelledby="hs-dropdown-account">
                        <div class="py-3 px-5 bg-gray-100 rounded-t-lg">
                            <p class="text-sm text-gray-500">Signed in as</p>
                            <p class="text-xs font-medium text-gray-800"> hmz@gmail.com </p>
                        </div>
                        <div class="p-1.5 space-y-0.5">
                            <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-xs text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100" href="#">
                                <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2" />
                                    <circle cx="9" cy="7" r="4" />
                                    <path d="M22 21v-2a4 4 0 0 0-3-3.87" />
                                    <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                                </svg>
                                My Profile
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</header>
<!-- ========== MAIN CONTENT ========== -->
<div class="sticky top-0 inset-x-0 z-20 bg-white border-y px-4 sm:px-6 lg:px-8 lg:hidden">
    <div class="flex items-center py-2">
        <!-- Navigation Toggle -->
        <button type="button" class="size-8 flex justify-center items-center gap-x-2 border border-gray-200 text-gray-800 hover:text-gray-500 rounded-lg focus:outline-none focus:text-gray-500 disabled:opacity-50 disabled:pointer-events-none" aria-haspopup="dialog" aria-expanded="false" aria-controls="hs-application-sidebar" aria-label="Toggle navigation" data-hs-overlay="#hs-application-sidebar">
            <span class="sr-only">Toggle Navigation</span>
            <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <rect width="18" height="18" x="3" y="3" rx="2" />
                <path d="M15 3v18" />
                <path d="m8 9 3 3-3 3" />
            </svg>
        </button>

        <!-- Breadcrumb -->
        <ol class="ms-3 flex items-center whitespace-nowrap">
            <li class="flex items-center text-sm text-gray-800">
                Application Layout
                <svg class="shrink-0 mx-3 overflow-visible size-2.5 text-gray-400" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M5 1L10.6869 7.16086C10.8637 7.35239 10.8637 7.64761 10.6869 7.83914L5 14" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                </svg>
            </li>
            <li class="text-sm font-semibold text-gray-800 truncate" aria-current="page">
                Dashboard
            </li>
        </ol>
    </div>
</div>
<!-- The above codes are for mobile responsive -->

<!-- Sidebar -->
<div id="hs-application-sidebar" class="hs-overlay [--auto-close:lg] hs-overlay-open:translate-x-0 -translate-x-full transition-all duration-300 transform w-[250px] h-full hidden fixed inset-y-0 start-0 z-[60] bg-white border-e border-gray-200 lg:block lg:translate-x-0 lg:end-auto lg:bottom-0" role="dialog" tabindex="-1" aria-label="Sidebar">
    <div class="relative flex flex-col h-full max-h-full">
        <!-- Logo -->
        <div class="px-1 pt-2 flex flex-row items-center">
            <a class="rounded-xl mt-4 text-xl flex flex-row items-center font-semibold focus:outline-none focus:opacity-80" href="#">
                <img src="{{ asset('images/logo3.png') }}" class="w-[55px] mx-1" alt="logo">
            </a>
        </div>

        <!-- Buttons -->
        <div class="h-full overflow-y-auto [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300">
            <nav class="hs-accordion-group p-3 w-full flex flex-col flex-wrap" data-hs-accordion-always-open>
                <ul class="flex flex-col space-y-1">
                    <li>
                        <a href="/adm-dsh"
                           class="{{ request() -> is("adm-dsh") ? "bg-blue-50 text-blue-700 focus:outline-none focus:bg-customTeal font-semibold" :  "text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-customTeal"}} hs-accordion-toggle w-full text-start flex items-center gap-x-4 py-2 px-2.5 text-sm rounded-lg" aria-expanded="true" aria-controls="users-accordion-child">
                            <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="m3 9 9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z" />
                                <polyline points="9 22 9 12 15 12 15 22" />
                            </svg> <span class="-ml-1"> Dashboard </span>
                        </a>
                    </li>

                    <li class="hs-accordion" id="users-accordion">
                        <button type="button" class="hs-accordion-toggle w-full text-start flex items-center gap-x-4 py-2 px-2.5 text-sm text-gray-800 rounded-lg hover:bg-gray-100 focus:outline-none focus:bg-customTeal" aria-expanded="true" aria-controls="users-accordion-child">
                            <i class="fa-duotone fa-regular fa-bag-shopping text-lg"></i> <span> Customers </span>

                            <svg class="hs-accordion-active:block ms-auto hidden size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="m18 15-6-6-6 6" />
                            </svg>

                            <svg class="hs-accordion-active:hidden ms-auto block size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="m6 9 6 6 6-6" />
                            </svg>
                        </button>

                        <div id="users-accordion-child" class="hs-accordion-content w-full overflow-hidden transition-[height] duration-300 hidden" role="region" aria-labelledby="users-accordion">
                            <ul class="hs-accordion-group ps-8 pt-1 space-y-1" data-hs-accordion-always-open>
                                <li class="hs-accordion" id="users-accordion-sub-1">
                                    <a href="/customers" class="{{ request() -> is("customers") ? "bg-blue-50 text-blue-700 focus:outline-none focus:bg-customTeal font-semibold" :  "text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-customTeal"}} hs-accordion-toggle w-full text-start flex items-center gap-x-4 py-2 px-2.5 text-sm rounded-lg" aria-expanded="true" aria-controls="users-accordion-child">
                                        Partner Shops
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li>
                        <a href="/products" class="{{ request() -> is("products") ? "bg-blue-50 text-blue-700 focus:outline-none focus:bg-customTeal font-semibold" :  "text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-customTeal"}} hs-accordion-toggle w-full text-start flex items-center gap-x-4 py-2 px-2.5 text-sm rounded-lg" aria-expanded="true" aria-controls="users-accordion-child">
                            <i class="fa-regular fa-tags text-lg"></i> Products
                        </a>
                    </li>

                    <li class="hs-accordion" id="account-accordion">
                        <a href="/inventory" class="{{ request() -> is("inventory") ? "bg-blue-50 text-blue-700 focus:outline-none focus:bg-customTeal font-semibold" :  "text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-customTeal"}} hs-accordion-toggle w-full text-start flex items-center gap-x-4 py-2 px-2.5 text-sm rounded-lg" aria-expanded="true" aria-controls="users-accordion-child">
                            <i class="fa-regular fa-warehouse"></i> Inventory
                        </a>
                    </li>

                    <li class="hs-accordion" id="account-accordion">
                        <a href="/orders" class="{{ request() -> is("orders") ? "bg-blue-50 text-blue-700 focus:outline-none focus:bg-customTeal font-semibold" :  "text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-customTeal"}} hs-accordion-toggle w-full text-start flex items-center gap-x-4 py-2 px-2.5 text-sm rounded-lg" aria-expanded="true" aria-controls="users-accordion-child">
                            <i class="fa-regular fa-rectangle-history-circle-user"></i> Orders
                        </a>
                    </li>

                    <li class="hs-accordion" id="account-accordion">
                        <a href="/sales" class="{{ request() -> is("sales") ? "bg-blue-50 text-blue-700 focus:outline-none focus:bg-customTeal font-semibold" :  "text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-customTeal"}} hs-accordion-toggle w-full text-start flex items-center gap-x-4 py-2 px-2.5 text-sm rounded-lg" aria-expanded="true" aria-controls="users-accordion-child">
                            <i class="fa-regular fa-file-invoice"></i> Sales
                        </a>
                    </li>

                    <li class="hs-accordion" id="account-accordion">
                        <a href="/system_notification" class="{{ request() -> is("system_notification") ? "bg-blue-50 text-blue-700 focus:outline-none focus:bg-customTeal font-semibold" :  "text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-customTeal"}} hs-accordion-toggle w-full text-start flex items-center gap-x-4 py-2 px-2.5 text-sm rounded-lg" aria-expanded="true" aria-controls="users-accordion-child">
                            <i class="fa-regular fa-bell"></i> System Notification
                        </a>
                    </li>

                    <li class="hs-accordion" id="account-accordion">
                        <a href="/track_deliveries" class="{{ request() -> is("track_deliveries") ? "bg-blue-50 text-blue-700 focus:outline-none focus:bg-customTeal font-semibold" :  "text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-customTeal"}} hs-accordion-toggle w-full text-start flex items-center gap-x-4 py-2 px-2.5 text-sm rounded-lg" aria-expanded="true" aria-controls="users-accordion-child">
                            <i class="fa-regular fa-truck"></i> Track Deliveries
                        </a>
                    </li>

                    <li class="absolute bottom-3">
                        <a href="/logout" type="submit" class="hs-accordion-toggle w-full text-start flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-800 rounded-lg hover:bg-gray-100 focus:outline-none focus:bg-gray-100" aria-expanded="true" aria-controls="projects-accordion-child">
                            <i class="fa-solid fa-chevron-left"></i> <span class="ml-1 text-red-500">Logout </span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div>

<!-- Main content container -->
<div class="min-w-screen mt-4 ms-4 lg:ps-[260px] pe-4">
    {{ $slot }}
</div>
<!-- JS PLUGINS -->
<!-- Required plugins -->
<script src="https://cdn.jsdelivr.net/npm/preline/dist/preline.min.js"></script>

</body>
</html>
