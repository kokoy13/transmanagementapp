<x-layouts.order-layout>
    <section class="bg-gray-50 min-h-screen py-8 mt-20">
        <div class="max-w-2xl mx-auto px-4">
            <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                <!-- Header -->
                <div class="bg-gradient-to-r from-blue-600 to-blue-400 px-6 py-4">
                    <h1 class="text-2xl font-bold text-white">Payment Information</h1>
                    <p class="text-blue-100 mt-1">Selesaikan pembayaran anda dengan aman</p>
                </div>

                <!-- Form -->
                <form action="{{ route('payment.set')}}" method="POST" class="p-6 space-y-6" enctype="multipart/form-data">
                    @csrf

                    <!-- Order Summary -->
                    <div class="bg-gray-50 rounded-lg p-4">
                        <h2 class="text-lg font-semibold text-gray-900 mb-3">Order Summary</h2>
                        <div class="space-y-2">
                            <div class="flex justify-between">
                                <span class="text-gray-600">Subtotal</span>
                                <span class="font-medium">Rp {{ number_format($payment->packet->price, 0, '.',',') }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Pajak</span>
                                <span class="font-medium">
                                    @if($payment->packet->name == 'Family')
                                        @php
                                            $tax = 0;
                                        @endphp
                                        Rp {{ number_format(0, 0, '.',',') }}
                                    @else
                                        @php
                                            $dpp = (11/12)*$payment->packet->price;
                                            $tax = 12/100 * $dpp;
                                        @endphp
                                        Rp {{ number_format($tax, 0, '.',',') }}
                                    @endif
                                </span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Installation</span>
                                <span class="font-medium">Rp 150,000</span>
                            </div>
                            <hr class="my-2">
                            <div class="flex justify-between text-lg font-bold">
                                <span>Total</span>
                                @php
                                    $total = $tax + $payment->packet->price + 150000;
                                @endphp
                                <input type="number" name="amount" hidden value="{{ $total }}">
                                <span class="text-blue-600">Rp {{ number_format($total, 0, '.',',') }}</span>
                            </div>
                        </div>
                    </div>

                    <!-- Personal Information -->
                    <div class="space-y-4">
                        <h2 class="text-lg font-semibold text-gray-900">Personal Information</h2>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label for="first_name" class="block text-sm font-medium text-gray-700 mb-1">
                                    Fullname
                                </label>
                                <span class="font-semibold">{{ $payment->user->name}}</span>
                                <input type="text" name="order_id" hidden value="{{ $payment->id }}">
                            </div>
                        </div>

                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-1">
                                Email Address
                            </label>
                            <span class="font-semibold">{{ $payment->user->email }}</span>
                        </div>

                        <div>
                            <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">
                                Phone Number
                            </label>
                            <span class="font-semibold">{{ $payment->user->phone_number }}</span>
                        </div>
                    </div>

                    {{-- Bank Transfer Information --}}
                    <div class="space-y-4">
                        <h2 class="text-lg font-semibold text-gray-900">Bank Transfer Information</h2>

                        <!-- Bank Details -->
                        <div class="bg-blue-50 border border-blue-200 rounded-lg p-4">
                            <div class="flex gap-4">
                                <img class="w-24 bg-white" src="{{ asset('assets/img/mandiri.png') }}" alt="">
                                <div class="flex flex-col gap-2">
                                    <h1 class="font-semibold">Mandiri PT Marawa Transmisi Media</h1>
                                    <span>2311081004</span>
                                </div>
                            </div>
                        </div>

                        <!-- Payment Confirmation -->
                        <div class="space-y-4">
                            <h3 class="text-md font-semibold text-gray-900">Payment Confirmation</h3>
                            <div>
                                <label for="transaction_reference" class="block text-sm font-medium text-gray-700 mb-1">
                                    Upload Bukti Transaksi <span class="text-red-500">*</span>
                                </label>
                                <input type="file"
                                    id="transaction_reference"
                                    name="transaction_reference"
                                    accept="image/*,.pdf"
                                    required
                                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-medium file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 @error('transaction_reference') border-red-500 @enderror">
                                <p class="mt-1 text-xs text-gray-500">Upload bukti transaksi atau screenshot (JPG, PNG, PDF - Max 2MB)</p>
                                @error('transaction_reference')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Additional Options -->
                    <div class="space-y-4">
                        <div class="flex items-center">
                            <input type="checkbox"
                                    id="terms"
                                    required
                                    class="h-4 w-4 hover:cursor-pointer text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                            <label for="terms" class="ml-2 text-sm text-gray-700 hover:cursor-pointer">
                                I agree to the <span class="text-blue-600 hover:underline">Terms of Service</span> and
                                <span class="text-blue-600 hover:underline">Privacy Policy</span> <span class="text-red-500">*</span>
                            </label>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="pt-4">
                        <button type="submit"
                                class="w-full bg-blue-500 px-3 py-4 text-white font-semibold text-lg rounded hover:bg-blue-800">
                            Confirm Payment - Rp{{ number_format($total, 0, ',', '.') }}
                        </button>
                    </div>

                    <!-- Security Notice -->
                    <div class="bg-green-50 border border-green-200 rounded-md p-4">
                        <div class="flex items-center">
                            <svg class="h-5 w-5 text-green-400 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd"></path>
                            </svg>
                            <p class="text-sm text-green-800">
                                Your information is secure. We will verify your bank transfer and process your order within 1-2 business days.
                            </p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</x-layouts.order-layout>
