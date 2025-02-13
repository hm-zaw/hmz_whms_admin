    <x-adm-dsh-nav>
        <!-- Add Leaflet CSS -->
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
              integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
              crossorigin=""/>

        <div class="flex flex-col lg:flex-row gap-4">
            <!-- Left side: Map -->
            <div class="lg:w-2/3">
                <!-- Title Card -->
                <div class="w-full bg-white shadow-md rounded-lg p-6 mb-4">
                    <h1 class="text-2xl font-bold text-gray-800">Track Deliveries</h1>
                </div>

                <!-- React Map Container -->
                <div id="react-map" class="w-full h-[calc(100vh-16rem)]"></div>
            </div>

            <!-- Right side: Delivery Information -->
            <div class="lg:w-1/3 bg-white shadow-md rounded-lg p-6 h-[calc(100vh-8rem)] overflow-y-auto">
                <h2 class="text-xl font-bold mb-4">Delivery Routes Information</h2>
                <div id="delivery-info">
                    <!-- This div will be populated by React -->
                </div>
            </div>
        </div>

        @viteReactRefresh
        @vite(['resources/css/app.css', 'resources/js/react/main.tsx'])
    </x-adm-dsh-nav>

