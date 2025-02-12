<x-Drv-dsh>
    <div class="flex items-center min-h-screen bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500">
        <!-- Main container with flex layout -->
        <div class="container mx-auto flex items-center justify-center space-x-12">
            <!-- Left Column (Login Form) -->
            <div class="max-w-md w-full p-8 bg-white rounded-xl shadow-xl transform transition-all duration-500 hover:scale-105 hover:shadow-2xl">
                <div class="text-center mb-6">
                    <h1 class="my-3 text-4xl font-semibold text-gray-800 dark:text-gray-200">Sign in</h1>
                    <p class="text-gray-500 dark:text-gray-400">Sign in to access your Driver account</p>
                </div>

                <!-- Right Column (Lottie Animation) -->
                <div class="w-90 flex items-center justify-center">
                    <dotlottie-player src="https://lottie.host/c724f0f2-8c31-41dd-9b03-4f9966d1c572/ItiWd8GgQZ.lottie" background="transparent" speed="1" style="width: 100%; height: 100%" loop autoplay></dotlottie-player>
                </div>

                <div class="m-7">
                    <form action="" class="space-y-6">
                        <!-- Driver Name -->
                        <div class="mb-6">
                            <label for="email" class="block mb-2 text-lg font-medium text-gray-600 dark:text-gray-400">Driver Name</label>
                            <div class="relative">
                                <input type="email" name="email" id="email" placeholder="Your Name" class="w-full px-4 py-3 rounded-md border-2 border-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-400 dark:bg-gray-700 dark:text-white dark:placeholder-gray-500 dark:border-gray-600 dark:focus:ring-indigo-500" />
                            </div>
                        </div>

                        <!-- Driver License -->
                        <div class="mb-6">
                            <div class="flex justify-between mb-2">
                                <label for="password" class="text-lg font-medium text-gray-600 dark:text-gray-400">Driver License</label>
                                <a href="#!" class="text-sm text-indigo-400 hover:text-indigo-500 dark:hover:text-indigo-300">Forgot password?</a>
                            </div>
                            <div class="relative">
                                <input type="password" name="password" id="password" placeholder="Driver License" class="w-full px-4 py-3 rounded-md border-2 border-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-400 dark:bg-gray-700 dark:text-white dark:placeholder-gray-500 dark:border-gray-600 dark:focus:ring-indigo-500" />
                            </div>
                        </div>

                        <!-- Sign in Button -->
                        <div class="mb-6">
                            <a href="javascript:void(0);" id="sign-in-btn">
                                <button type="button" class="w-full px-4 py-3 text-white bg-indigo-600 rounded-md focus:outline-none hover:bg-indigo-700 focus:ring-2 focus:ring-indigo-500 dark:bg-indigo-500 dark:hover:bg-indigo-600 transform transition-all duration-200 active:transform active:translate-x-4">
                                    <span id="btn-text">Sign in</span> <!-- Normal button text -->
                                </button>
                            </a>
                        </div>

                        <!-- Sign up Link -->
                        <p class="text-sm text-center text-gray-400">Don't have an account yet? <a href="#!" class="text-indigo-400 hover:text-indigo-500 dark:hover:text-indigo-300">Sign up</a>.</p>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Full-page loader -->
    <div id="full-page-loader" class="fixed inset-0 bg-gray-500 bg-opacity-25 flex justify-center items-center hidden">
        <div class="loader"></div>
    </div>

</x-Drv-dsh>

<style>
    /* Loader animation */
    .loader {
        display: inline-flex;
        gap: 5px;
    }
    .loader:before,
    .loader:after {
        content: "";
        width: 25px;
        aspect-ratio: 1;
        box-shadow: 0 0 0 3px inset #fff;
        animation: l5 1.5s infinite;
    }
    .loader:after {
        --s:-1;
    }
    @keyframes l5 {
        0%   {transform:scaleX(var(--s,1)) translate(0) scale(1)}
        33%  {transform:scaleX(var(--s,1)) translate(calc(50% + 2.5px)) scale(1)}
        66%  {transform:scaleX(var(--s,1)) translate(calc(50% + 2.5px)) scale(2)}
        100% {transform:scaleX(var(--s,1)) translate(0) scale(1)}
    }
</style>

<script>
    document.getElementById('sign-in-btn').addEventListener('click', function() {
        // Show the full-page loader
        document.getElementById('full-page-loader').classList.remove('hidden');

        // Simulate a delay for the sign-in process (e.g., 3 seconds)
        setTimeout(function() {
            // After the simulated sign-in process, hide the loader
            document.getElementById('full-page-loader').classList.add('hidden');
            // Optionally, you can redirect to another page
            window.location.href = '/driver_dashboard';  // Redirect after 3 seconds
        }, 3000); // Adjust the time as needed (in milliseconds)
    });
</script>
