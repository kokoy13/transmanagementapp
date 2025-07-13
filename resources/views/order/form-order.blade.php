<x-layouts.order-layout :title="'Form Order'">
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
                                        Full Name
                                    </label>
                                    <input
                                        readonly
                                        type="text"
                                        id="fullname"
                                        name="fullname"
                                        value="{{ $user->name }}"
                                        class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition"
                                    />
                                </div>

                                <div class="mb-4">
                                    <label for="email" class="block mb-2 font-medium text-gray-700">
                                        Email
                                    </label>
                                    <input
                                        readonly
                                        type="email"
                                        id="email"
                                        value="{{ $user->email }}"
                                        name="email"
                                        class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition"
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
                                        Package Type
                                    </label>
                                    <input
                                        readonly
                                        type="text"
                                        id="packetName"
                                        value="{{ $packet->name }}"
                                        name="packetName"
                                        class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition"
                                    />
                                </div>

                                <div class="mb-4">
                                    <label for="bandwidth" class="block mb-2 font-medium text-gray-700">
                                        Bandwidth (Mbps)
                                    </label>
                                    <input
                                        readonly
                                        type="text"
                                        id="bandwidth"
                                        value="{{ $packet->bandwidth }}"
                                        name="bandwidth"
                                        class="w-max bg-transparent border-none text-2xl rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition"
                                    />
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
            <!-- Modal wrapper (ganti absolute dengan fixed dan atur flex centering) -->
            <div
                x-show="showModal"
                x-cloak
                class="fixed inset-0 z-50 flex items-center justify-center px-4 text-center bg-black bg-opacity-50"
                x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100"
                x-transition:leave="transition ease-in duration-200"
                x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0"
                @click.self="showModal = false"
            >
                <form
                    action="{{ route('order.set') }}"
                    method="post"
                    class="w-full max-w-lg p-6 bg-white rounded-lg shadow-xl text-left transform transition-all sm:my-8 sm:align-middle"
                    @click.stop
                >
                    @csrf

                    <!-- Konten modal -->
                    <div class="flex items-start gap-3">
                        <div class="flex items-center justify-center flex-shrink-0 w-12 h-12 bg-blue-100 rounded-full">
                            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-medium text-gray-900 mb-2">Confirm Your Order</h3>
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

                    <!-- Tombol -->
                    <div class="flex justify-end mt-6 space-x-3 gap-2">
                        <button type="button" @click="showModal = false" class="px-4 py-2 border border-gray-300 text-gray-700 rounded hover:bg-gray-50">
                            Cancel
                        </button>
                        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                            Confirm Order
                        </button>
                    </div>
                </form>
            </div>


            <style>
                [x-cloak] { display: none !important; }
            </style>
        </main>
    </div>
</x-layouts.order-layout>
