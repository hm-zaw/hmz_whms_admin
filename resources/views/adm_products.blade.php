<style>
    .top_btns {
        color: gray; /* Default text color */
        position: relative;
        transition: color 0.3s; /* Smooth color transition */
        font-size: 14px;
    }

    .top_btns:hover {
        color: #304ffe;
    }

    .top_btns .hover-underline {
        position: absolute;
        left: 0;
        bottom: -6px;
        height: 3px;
        width: 0;
        background-color: #304ffe;
        transition: width 0.3s ease-in-out;
    }

    .top_btns:hover .hover-underline {
        width: 60%;
    }
    .hidden {
        display: none;
    }
    #modal {
        z-index: 150;
    }

</style>

<div id="modal" class="fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center hidden">
    <div class="bg-white p-6 rounded-lg shadow-lg w-1/2 h-[500px] overflow-y-auto">
        <h2 class="font-semibold font-poppins text-gray-800"> Add A Product </h2>
        <p class="text-gray-500 text-xs mb-6">Fill in the details below to add a new product.</p>

        <form method="POST" action="{{ route('product.store') }}">
            @csrf
            @method('post')
            <div class="col-span-full">
                <label for="cover-photo" class="block text-sm font-medium text-gray-900 font-poppins">Product photo</label>
                <div class="mt-2 flex justify-center rounded-lg border border-dashed border-gray-900/25 px-6 py-10">
                    <div class="text-center">
                        <!-- Image Preview Container -->
                        <div id="image-preview" class="hidden">
                            <img id="preview-image" src="#" alt="Preview" class="mx-auto size-24 object-cover rounded-lg" />
                        </div>
                        <!-- Default SVG Icon -->
                        <svg id="default-icon" class="mx-auto size-12 text-gray-300" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M1.5 6a2.25 2.25 0 0 1 2.25-2.25h16.5A2.25 2.25 0 0 1 22.5 6v12a2.25 2.25 0 0 1-2.25 2.25H3.75A2.25 2.25 0 0 1 1.5 18V6ZM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0 0 21 18v-1.94l-2.69-2.689a1.5 1.5 0 0 0-2.12 0l-.88.879.97.97a.75.75 0 1 1-1.06 1.06l-5.16-5.159a1.5 1.5 0 0 0-2.12 0L3 16.061Zm10.125-7.81a1.125 1.125 0 1 1 2.25 0 1.125 1.125 0 0 1-2.25 0Z" clip-rule="evenodd" />
                        </svg>
                        <!-- Upload Text -->
                        <div class="mt-4 flex text-sm/6 text-gray-600">
                            <label for="file_upload" class="relative cursor-pointer rounded-md bg-white hover:text-indigo-500">
                                <span class="text-sm">Upload a file or drag and drop</span>
                                <input id="file_upload" name="file_upload" type="file" class="sr-only" accept="image/*">
                            </label>
                        </div>
                        <p class="text-xs text-gray-600">PNG, JPG, GIF up to 10MB</p>
                    </div>
                </div>
            </div>

            <!-- Rest of the form -->
            <div class="mt-4 w-full flex flex-row gap-x-6">
                <div class="flex-1">
                    <label for="model" class="block mb-2 text-sm font-medium text-gray-900">Model name</label>
                    <input type="text" id="model" name="model" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" placeholder="John" required />
                </div>
                <div class="flex-1">
                    <label for="brand" class="block mb-2 text-sm font-medium text-gray-900">Brand name</label>
                    <input type="text" id="brand" name="brand" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" placeholder="John" required />
                </div>
                <div class="flex-1">
                    <label for="category" class="block mb-2 text-sm font-medium text-gray-900">Category</label>
                    <select id="category" class="bg-gray-50 text-gray-900 text-sm rounded-lg block w-full p-2.5">
                        <option value="" disabled selected>Select a category</option>
                        <option value="Laptop">Laptop</option>
                        <option value="Phone">Phone</option>
                        <option value="Gadget">Gadget</option>
                    </select>
                </div>
            </div>

            <div class="col-span-full mt-4">
                <label for="about" class="block mb-2 text-sm font-medium text-gray-900">About</label>
                <div class="mt-2">
                    <textarea name="about" id="about" rows="3" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 placeholder:text-gray-400 sm:text-sm"></textarea>
                </div>
            </div>

            <button id="closeModalButton" class="mt-4 bg-gray-300 text-white px-4 py-2 rounded-lg hover:bg-gray-400">Close</button>
            <button type="submit" class="mt-4 bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">Submit</button>
        </form>

        <script>
            document.getElementById('file_upload').addEventListener('change', function(event) {
                const file = event.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        // Hide the default icon
                        document.getElementById('default-icon').classList.add('hidden');
                        // Show the image preview
                        document.getElementById('image-preview').classList.remove('hidden');
                        document.getElementById('preview-image').setAttribute('src', e.target.result);
                    };
                    reader.readAsDataURL(file);
                }
            });
        </script>

    </div>
</div>


<x-adm-dsh-nav>
    <div class="w-full mt-6 flex flex-row items-center">
        <div class="w-3/4">
            <h2 class="font-poppins font-semibold text-lg">Products</h2>
            <p class="text-xs">Let's grow your business! Create your product and upload here</p>
        </div>
        <div class="ml-10">
            <button id="createItemButton" class="group relative inline-flex h-9 items-center justify-center overflow-hidden rounded-lg px-7 font-medium text-xs text-white bg-blue-600 gap-x-2 hover:bg-red-500">
                <i class="fa-solid fa-plus"></i>
                <span>Create item</span>
            </button>
        </div>
    </div>
    <hr class="mt-3">

    <div class="w-full flex flex-wrap justify-between mt-4 gap-x-4">
        <a href="#" class="flex-1 min-w-[150px] top_btns whitespace-nowrap flex items-center gap-x-3">
            <i class="fa-light fa-boxes-stacked"></i>
            <span class="hover:font-semibold">Published</span>
            <span class="hover-underline"></span>
        </a>

        <a href="#" class="flex-1 min-w-[150px] top_btns whitespace-nowrap flex items-center gap-x-3">
            <i class="fa-duotone fa-regular fa-pen-ruler"></i>
            <span>Draft</span>
            <span class="hover-underline"></span>
        </a>

        <a href="#" class="flex-1 min-w-[150px] top_btns whitespace-nowrap flex items-center gap-x-3">
            <i class="fa-regular fa-eye-slash"></i>
            <span>Hidden</span>
            <span class="hover-underline"></span>
        </a>

        <a href="#" class="flex-1 min-w-[150px] top_btns whitespace-nowrap flex items-center gap-x-3">
            <i class="fa-regular fa-fire"></i>
            <span>Hot Items</span>
            <span class="hover-underline"></span>
        </a>

        <a href="#" class="flex-1 min-w-[150px] top_btns whitespace-nowrap flex items-center gap-x-3">
            <i class="fa-solid fa-layer-minus"></i>
            <span>Out of Stock</span>
            <span class="hover-underline"></span>
        </a>
    </div>
    <hr class="mt-4">


    <div class="relative overflow-hidden sm:rounded-lg">
        <table class="w-full bg-gray-50 text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 table-fixed">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-3 py-4 text-xs w-2/5">Product Name</th>
                <th scope="col" class="px-3 py-4 text-xs w-1/10">Pricing</th>
                <th scope="col" class="px-3 py-4 text-xs w-1/10">Date</th>
                <th scope="col" class="px-3 py-4 text-xs w-1/10">Opening Stock</th>
                <th scope="col" class="px-3 py-4 text-xs w-1/10">Received</th>
                <th scope="col" class="px-3 py-4 text-xs w-1/10">Dispatched</th>
                <th scope="col" class="px-3 py-4 text-xs w-1/10">Closing Stock</th>
            </tr>
            </thead>
            <tbody>
            <tr class="bg-transparent border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                <td class="px-3 py-4">
                    <div class="flex items-center gap-x-4">
                        <img src="{{ asset('images/product1.png') }}" alt="Organic Landing Page" class="w-20 h-12">
                        <div class="flex flex-col justify-center">
                            <span class="font-semibold text-[13px]">Lenovo Laptop XV10</span>
                            <span class="text-xs">Laptop</span>
                        </div>
                    </div>
                </td>
                <td class="px-3 py-4">$20</td>
                <td class="px-3 py-4">5/2/25</td>
                <td class="px-3 py-4">4.9</td>
                <td class="px-3 py-4">4.9</td>
                <td class="px-3 py-4">4.9</td>
                <td class="px-3 py-4">4.9</td>
            </tr>
            </tbody>
        </table>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const createItemButton = document.getElementById('createItemButton');
            const closeModalButton = document.getElementById('closeModalButton');
            const modal = document.getElementById('modal');

            // Show modal when "Create item" button is clicked
            createItemButton.addEventListener('click', function() {
                modal.classList.remove('hidden');
            });

            // Hide modal when "Close" button is clicked
            closeModalButton.addEventListener('click', function() {
                modal.classList.add('hidden');
            });

            // Optional: Hide modal when clicking outside the modal
            modal.addEventListener('click', function(event) {
                if (event.target === modal) {
                    modal.classList.add('hidden');
                }
            });
        });
    </script>
</x-adm-dsh-nav>

