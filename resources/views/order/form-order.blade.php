<x-layouts.order-layout>
    <div class="mt-20">

        <main class="container mx-auto px-4 py-8 mb-8 max-w-6xl" x-data="{
            showModal: false,
            formData: {
                telp: '',
                installationAddress: ''
            },
            isValid() {
                return this.formData.telp &&
                    this.formData.installationAddress;
            }
        }">
            <nav class="flex items-center space-x-2 text-black/50">
                <a href="/" class="hover:text-black! transition-colors duration-200">
                    <i class="fas fa-home mr-1"></i>Home
                </a>
                <i class="fas fa-chevron-right"></i>
                <a href="/packets" class="hover:text-black! transition-colors duration-200">Packets</a>
                <i class="fas fa-chevron-right"></i>
                <span class="text-black font-medium">Order</span>
            </nav>
            <div class="bg-white rounded-xl p-8 mb-8">
                <h1 class="text-3xl font-bold mb-2 text-gray-800">Order Form</h1>
                <p class="text-gray-600 mb-8">Please fill in your details to complete your order</p>

                <form id="orderForm" class="max-w-5xl" @submit.prevent="showModal = true">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-6">
                        <!-- Left Column -->
                        <div class="space-y-6">
                            <div class="bg-gray-50 p-6 rounded-lg border border-gray-100">
                                <h2 class="text-lg font-semibold mb-4 text-gray-800">Personal Information</h2>

                                <div class="mb-4">
                                    <label for="fullname" class="block mb-2 font-medium text-gray-700">
                                        Full Name <span class="text-red-500">*</span>
                                    </label>
                                    <input
                                        readonly
                                        type="text"
                                        id="fullname"
                                        name="fullname"
                                        value="{{ $user->name }}"
                                        required
                                        class="w-full border border-gray-300 bg-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition"
                                    />
                                </div>

                                <div class="mb-4">
                                    <label for="email" class="block mb-2 font-medium text-gray-700">
                                        Email <span class="text-red-500">*</span>
                                    </label>
                                    <input
                                        readonly
                                        type="email"
                                        id="email"
                                        value="{{ $user->email }}"
                                        name="email"
                                        required
                                        class="w-full border border-gray-300 bg-gray-300 rounded-lg px-4 py-3"
                                    />
                                </div>

                                <div>
                                    <label for="telp" class="block mb-2 font-medium text-gray-700">
                                        Phone Number <span class="text-red-500">*</span>
                                    </label>
                                    <input
                                        type="tel"
                                        id="telp"
                                        name="telp"
                                        x-model="formData.telp"
                                        required
                                        class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition"
                                    />
                                </div>
                            </div>

                            <div class="bg-gray-50 p-6 rounded-lg border border-gray-100">
                                <h2 class="text-lg font-semibold mb-4 text-gray-800">Installation Address</h2>

                                <div>
                                    <label for="installationAddress" class="block mb-2 font-medium text-gray-700">
                                        Address Details <span class="text-red-500">*</span>
                                    </label>
                                    <textarea
                                        id="installationAddress"
                                        name="installationAddress"
                                        x-model="formData.installationAddress"
                                        required
                                        rows="5"
                                        class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition"
                                        placeholder="Enter your complete address..."
                                    ></textarea>
                                </div>
                            </div>
                        </div>

                        <!-- Right Column -->
                        <div class="space-y-6">
                            <div class="bg-gray-50 p-6 rounded-lg border border-gray-100">
                                <h2 class="text-lg font-semibold mb-4 text-gray-800">Package Details</h2>

                                <div class="mb-4">
                                    <label for="packetName" class="block mb-2 font-medium text-gray-700">
                                        Package Type <span class="text-red-500">*</span>
                                    </label>
                                    <select required name="packetName" id="" class="w-full border border-gray-300 rounded-lg px-4 py-3">
                                        <option @if($packet->name == 'Family') selected @endif value="Family">Family</option>
                                        <option @if($packet->name == 'Office') selected @endif value="Office">Office</option>
                                        <option @if($packet->name == 'Internet Kerja') selected @endif value="Internet Kerja">Internet Kerja</option>
                                    </select>
                                </div>

                                <div class="mb-6">
                                    <p class="block mb-3 font-medium text-gray-700">
                                        Bandwidth <span class="text-red-500">*</span>
                                    </p>
                                    <div class="grid grid-cols-2 sm:grid-cols-3 gap-3">
                                        @foreach($packets as $packet)
                                            <div class="relative">
                                                <input
                                                    type="radio"
                                                    name="bandwidth"
                                                    value="{{ $packet->bandwidth }}"
                                                    class="peer hidden"
                                                />
                                                <label
                                                    class="flex items-center justify-center p-3 border border-gray-300 rounded-lg cursor-pointer hover:bg-gray-100 peer-checked:bg-blue-50 peer-checked:border-blue-500 peer-checked:text-blue-600 transition-all"
                                                >
                                                    <span>{{ $packet->bandwidth }}</span>
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <label class="block mb-2 font-medium text-gray-700">
                                        Price
                                    </label>
                                    <input type="text" name="price" hidden value="{{ $packet->price }}" />
                                    <div class="text-4xl font-bold text-green-600">Rp {{ number_format($packet->price, 0, ',','.') }}</div>
                                </div>
                            </div>

                            <div class="bg-blue-50 p-6 rounded-lg border border-blue-100">
                                <h3 class="text-lg font-semibold mb-2 text-blue-800">Ready to complete your order?</h3>
                                <p class="text-blue-700 mb-4">Click the button below to review and confirm your order details.</p>

                                <button
                                    type="submit"
                                    class="w-full bg-blue-600 px-6 py-3 text-white font-medium rounded-lg hover:bg-blue-700 transition-colors duration-200 flex items-center justify-center"
                                    :class="{ 'opacity-70 cursor-not-allowed': !isValid() }"
                                    :disabled="!isValid()"
                                >
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                    </svg>
                                    Review & Confirm Order
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Confirmation Modal -->
            <form
                action="{{ route('order.set') }}"
                method="post"
                x-show="showModal"
                x-cloak
                class="absolute inset-0 z-50"
                x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100"
                x-transition:leave="transition ease-in duration-200"
                x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0"
            >
                @csrf
                <div class="flex items-center justify-center px-4 pt-4 pb-20 text-center sm:block sm:p-0">
                    <div
                        class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-75"
                        aria-hidden="true"
                        @click="showModal = false"
                    ></div>

                    <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

                    <div
                        class="inline-block overflow-hidden text-left align-bottom transition-all transform bg-white rounded-lg shadow-xl sm:my-8 sm:align-middle sm:max-w-lg sm:w-full"
                        x-transition:enter="transition ease-out duration-300"
                        x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                        x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                        x-transition:leave="transition ease-in duration-200"
                        x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                        x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                    >
                        <div class="px-4 pt-5 pb-4 bg-white sm:p-6 sm:pb-4">
                            <div class="sm:flex sm:items-start">
                                <div class="flex items-center justify-center flex-shrink-0 w-12 h-12 mx-auto bg-blue-100 rounded-full sm:mx-0 sm:h-10 sm:w-10">
                                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                                <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                    <h3 class="text-lg font-medium leading-6 text-gray-900">
                                        Confirm Your Order
                                    </h3>
                                    <div class="mt-4">
                                        <div class="space-y-3">
                                            <div class="border-b border-gray-200 pb-3">
                                                <p class="text-sm text-gray-500">Please review your order details:</p>
                                            </div>
                                            <input type="text" hidden name="fullname" value="{{ $user->name }}">
                                            <input type="text" hidden name="telp" x-model="formData.telp">
                                            <input type="text" hidden name="email" value="{{ $user->email }}">
                                            <input type="text" hidden name="packetName" value="{{ $packet->name }}">
                                            <input type="text" hidden name="bandwidth" value="{{ $packet->bandwidth }}">
                                            <input type="text" hidden name="installationAddress" x-model="formData.installationAddress">
                                            <input type="text" hidden name="price" value="{{ $packet->price }}">
                                            <div class="grid grid-cols-2 gap-2 text-sm">
                                                <p class="text-gray-600">Full Name:</p>
                                                <p class="font-medium">{{ $user->name }}</p>

                                                <p class="text-gray-600">Phone:</p>
                                                <p class="font-medium" x-text="formData.telp"></p>

                                                <p class="text-gray-600">Package:</p>
                                                <p class="font-medium">{{ $packet->name }}</p>

                                                <p class="text-gray-600">Bandwidth:</p>
                                                <p class="font-medium">{{ $packet->bandwidth }} Mbps</p>

                                                <p class="text-gray-600">Installation Address:</p>
                                                <p class="font-medium" x-text="formData.installationAddress"></p>

                                                <p class="text-gray-600 font-semibold">Total Price:</p>
                                                <p class="font-bold text-green-600">Rp <span>{{ number_format($packet->price, 0, ',','.') }}</span></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="px-4 py-3 bg-gray-50 gap-3 sm:px-6 sm:flex sm:flex-row-reverse">
                            <button
                                type="submit"
                                class="inline-flex justify-center w-full px-4 py-2 text-base font-medium text-white bg-blue-600 border border-transparent rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:ml-3 sm:w-auto sm:text-sm"
                            >
                                Confirm Order
                            </button>
                            <button
                                type="button"
                                class="inline-flex justify-center w-full px-4 py-2 mt-3 text-base font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm"
                                @click="showModal = false"
                            >
                                Cancel
                            </button>
                        </div>
                    </div>
                </div>
            </form>

            <style>
                [x-cloak] { display: none !important; }
            </style>
        </main>
    </div>
</x-layouts.order-layout>
