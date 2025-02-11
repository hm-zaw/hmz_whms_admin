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
    #edit-card {
        z-index: 250;
    }
    #edit-image {
        width: 450px;
        height: 450px;
        object-fit: contain;
        border-radius: 8px;
        transition: filter 0.3s ease; /* Smooth transition for hover effect */
    }

</style>
@vite('resources/css/card-flip.css')

<div id="modal" class="fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center hidden">
    <div class="bg-white p-6 rounded-lg shadow-lg w-1/2 h-[500px] overflow-y-auto">
        <h2 class="font-semibold font-poppins text-gray-800"> Add A Product </h2>
        <p class="text-gray-500 text-xs mb-6">Fill in the details below to add a new product.</p>

        <form method="POST" action="{{ route('product.store') }}" enctype="multipart/form-data">
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
                    <select id="category" name="category" class="bg-gray-50 text-gray-900 text-sm rounded-lg block w-full p-2.5">
                        <option value="" disabled selected>Select a category</option>
                        <option value="Laptop">Laptop</option>
                        <option value="Phone">Desktop PC</option>
                        <option value="Gadget">Monitor</option>
                        <option value="Accessories">Accessories</option>
                        <option value="Storage Device">Storage Device</option>
                        <option value="Networking Device">Networking Device</option>
                        <option value="Printer">Printer</option>
                        <option value="Software">Software</option>
                        <option value="Graphic Card">Graphic Card</option>
                        <option value="Memory">Memory</option>
                        <option value="Power Supply">Power Supply</option>
                        <option value="PC Case">PC Case</option>
                    </select>
                </div>
            </div>

            <div class="col-span-full mt-4">
                <label for="about" class="block mb-2 text-sm font-medium text-gray-900">About</label>
                <div class="mt-2">
                    <textarea name="about" id="about" rows="3" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 placeholder:text-gray-400 sm:text-sm"></textarea>
                </div>
            </div>

            <div class="flex justify-end mt-7 gap-x-4">
                <button id="closeModalButton" type="button" class="text-sm bg-gray-300 text-white px-6 py-2 rounded-lg hover:bg-gray-400 transition duration-300 ease-in-out transform hover:scale-105 shadow-md hover:shadow-lg focus:outline-none focus:ring-2 focus:ring-gray-400 focus:ring-opacity-75">
                    Close
                </button>
                <button type="submit" class="text-sm bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition duration-300 ease-in-out transform hover:scale-105 shadow-md hover:shadow-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-75">
                    Submit
                </button>
            </div>
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

<div id="edit-card" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden">
    <div class="bg-white p-6 rounded-lg shadow-lg w-3/4 max-h-[90vh] overflow-y-auto">
        <h2 class="font-semibold font-poppins text-gray-800"> Edit your product </h2>
        <p class="text-gray-500 text-xs mb-6">Update the fields below to modify your product details.</p>

        <form id="form" method="POST" action="{{ route('products.update') }}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <input type="hidden" name="product_id" id="edit-id">

            <div class="flex flex-row gap-x-6 w-full">
                <div class="w-1/3">
                    <div class="ml-10">
                        <div>
                            <div>
                                <img id="edit-image" alt="product-photo" class="w-full h-auto"/>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-2/3 ">
                    <div class="mt-2 w-full flex flex-row gap-x-6">
                        <div class="flex-1">
                            <label for="edit-name" class="block mb-2 text-sm font-medium text-gray-900">Model name</label>
                            <input type="text" id="edit-name" name="model" class="bg-gray-50 border border-gray-300 text-gray-900 text-[13px] rounded-lg block w-full p-2.5" placeholder="John" required />
                        </div>
                        <div class="flex-1">
                            <label for="edit-brand" class="block mb-2 text-sm font-medium text-gray-900">Brand name</label>
                            <input type="text" id="edit-brand" name="brand" class="bg-gray-50 border border-gray-300 text-gray-900 text-[13px] rounded-lg block w-full p-2.5" placeholder="John" required />
                        </div>
                        <div class="flex-1">
                            <label for="edit-category" class="block mb-2 text-sm font-medium text-gray-900">Category</label>
                            <select id="edit-category" name="category" class="bg-gray-50 text-gray-900 text-sm rounded-lg block w-full p-2.5">
                                <option value="" disabled selected>Select a category</option>
                                <option value="Laptop">Laptop</option>
                                <option value="Phone">Desktop PC</option>
                                <option value="Gadget">Monitor</option>
                                <option value="Accessories">Accessories</option>
                                <option value="Storage Device">Storage Device</option>
                                <option value="Networking Device">Networking Device</option>
                                <option value="Printer">Printer</option>
                                <option value="Software">Software</option>
                                <option value="Graphic Card">Graphic Card</option>
                                <option value="Memory">Memory</option>
                                <option value="Power Supply">Power Supply</option>
                                <option value="PC Case">PC Case</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-span-full">
                        <label for="about" class="block mb-2 text-sm font-medium text-gray-900 mt-4">About</label>
                        <div class="mt-2">
                            <textarea name="about" id="edit-segment" rows="6" class="bg-gray-50 border border-gray-300 text-gray-900 text-[13px] rounded-lg block w-full p-4 placeholder:text-gray-400"></textarea>
                        </div>
                    </div>

                    <label class="flex cursor-pointer appearance-none justify-center mt-4 rounded-md border border-dashed border-gray-300 bg-white px-3 py-6 text-sm transition hover:border-gray-400 focus:border-solid focus:border-blue-600 focus:outline-none focus:ring-1 focus:ring-blue-600 disabled:cursor-not-allowed disabled:bg-gray-200 disabled:opacity-75" tabindex="0">
                <span for="photo-dropbox" class="flex items-center space-x-2">
                    <svg class="h-6 w-6 stroke-gray-400" viewBox="0 0 256 256">
                      <path d="M96,208H72A56,56,0,0,1,72,96a57.5,57.5,0,0,1,13.9,1.7" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="24"></path>
                      <path d="M80,128a80,80,0,1,1,144,48" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="24"></path>
                      <polyline points="118.1 161.9 152 128 185.9 161.9" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="24"></polyline>
                      <line x1="152" y1="208" x2="152" y2="128" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="24"></line>
                    </svg>
                    <span class="text-xs font-medium text-gray-600">
                      Drop Photos to Edit, or
                      <span class="text-blue-600 underline">browse</span>
                    </span>
                  </span>
                        <input id="photo-dropbox" type="file" name="file_upload" class="sr-only" accept="image/*" />
                    </label>

                    <div class="flex justify-end mt-7 gap-x-4">
                        <button id="closeModalButton2" type="button" class="text-sm bg-gray-300 text-white px-6 py-2 rounded-lg hover:bg-gray-400 transition duration-300 ease-in-out transform hover:scale-105 shadow-md hover:shadow-lg focus:outline-none focus:ring-2 focus:ring-gray-400 focus:ring-opacity-75">
                            Close
                        </button>
                        <button type="submit" class="text-sm bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition duration-300 ease-in-out transform hover:scale-105 shadow-md hover:shadow-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-75">
                            Submit
                        </button>
                    </div>
                </div>
            </div>
        </form>

        <script>
            document.getElementById('photo-dropbox').addEventListener('change', function(event) {
                const file = event.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        document.getElementById('edit-image').src = e.target.result;
                    };
                    reader.readAsDataURL(file);
                }
            });
        </script>
    </div>
</div>

<x-adm-dsh-nav>
    <div class="w-full mt-6 flex items-center justify-between">
        <div>
            <h2 class="font-poppins font-semibold text-lg">Products</h2>
            <p class="text-xs">Let's grow your business! Create your product and upload here</p>
        </div>
        <button id="createItemButton" class="group relative inline-flex h-9 items-center justify-center overflow-hidden rounded-lg px-7 font-medium text-xs text-white bg-blue-600 gap-x-2 hover:bg-red-500 ml-4">
            <i class="fa-solid fa-plus"></i>
            <span>Create item</span>
        </button>
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

    <div class="relative overflow-x-auto sm:rounded-lg">
        <table class="w-full bg-gray-50 text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 table-auto">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr class="text-center">
                <th scope="col" class="px-4 py-3 min-w-[200px] text-left">Product Name</th>
                <th scope="col" class="px-4 py-3 min-w-[100px]">Brand</th>
                <th scope="col" class="px-4 py-3 min-w-[120px]">Entry Date</th>
                <th scope="col" class="px-4 py-3 min-w-[150px]">Serial Number</th>
                <th scope="col" class="px-4 py-3 min-w-[80px] text-center">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($products as $product)
                <tr class="bg-transparent border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200 text-center">
                    <td class="px-4 py-4 whitespace-nowrap text-left">
                        <div class="flex items-center gap-x-4">
                            <img src="{{ asset('storage/' . $product->product_image_url) }}" alt="{{ $product->item_name }}" class="w-32 h-20 object-cover">

                            <div>
                                <span class="font-semibold text-[13px] block truncate">{{ $product->item_name }}</span>
                                <span class="text-xs text-gray-600 dark:text-gray-300">{{ $product->category }}</span>
                            </div>
                        </div>
                    </td>
                    <td class="px-4 py-4 whitespace-nowrap">{{ $product->brand }}</td>
                    <td class="px-4 py-4 whitespace-nowrap">{{ $product->created_at->format('Y-m-d') }}</td>

                    <td class="px-4 py-4 whitespace-nowrap">{{ $product->product_serial_number }}</td>
                    <td class="px-4 py-4 whitespace-nowrap">
                        <div class="flex justify-center items-center space-x-2">
                            <!-- Edit Button -->
                            <button class="edit-btn text-blue-600 text-[13px] hover:underline"
                                    data-id="{{ $product->id }}"
                                    data-name="{{ $product->item_name }}"
                                    data-category="{{ $product->category }}"
                                    data-brand="{{ $product->brand }}"
                                    data-segment="{{ $product->product_segment }}"
                                    data-image="{{ asset('storage/' . $product->product_image_url) }}">
                                Edit
                            </button>

                            <!-- Separator -->
                            <span class="text-gray-400">|</span>

                            <!-- Delete Form -->
                            <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button id="delete-btn" class="delete-btn text-red-500 mt-4 text-[13px] hover:underline">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
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

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const editButtons = document.querySelectorAll('.edit-btn');
            const closeModalButton = document.getElementById('closeModalButton2');
            const editModal = document.getElementById('edit-card');

            console.log(editModal);

            editButtons.forEach(button => {
                button.addEventListener('click', function() {
                    console.log("Edit button clicked!");
                    editModal.classList.remove('hidden');

                    const productId = this.getAttribute('data-id');
                    const productName = this.getAttribute('data-name');
                    const productCategory = this.getAttribute('data-category');
                    const productBrand = this.getAttribute('data-brand');
                    const productSegment = this.getAttribute('data-segment');
                    const productImage = this.getAttribute('data-image');

                    document.getElementById('edit-id').value = productId;
                    document.getElementById('edit-name').value = productName;
                    document.getElementById('edit-category').value = productCategory;
                    document.getElementById('edit-brand').value = productBrand;
                    document.getElementById('edit-segment').value = productSegment;
                    document.getElementById('edit-image').src = productImage;

                    console.log(document.getElementById('edit-name'));
                    console.log(document.getElementById('edit-category'));
                    console.log(document.getElementById('edit-brand'));
                    console.log(document.getElementById('edit-segment'));
                    console.log(document.getElementById('edit-image'));

                    console.log("Modal class list:", editModal.classList);
                });
            });


            // Close modal
            closeModalButton.addEventListener('click', function() {
                editModal.classList.add('hidden');
            });

            // Optional: Hide modal when clicking outside the modal
            editModal.addEventListener('click', function(event) {
                if (event.target === editModal) {
                    editModal.classList.add('hidden');
                }
            });
        });
    </script>
</x-adm-dsh-nav>

