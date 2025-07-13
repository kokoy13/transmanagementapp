    @props(['orders','customers'])
    <div
            x-data="{ show: true }"
            x-show="show"
            x-init="setTimeout(() => show = false, 3000)"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 transform translate-y-2"
            x-transition:enter-end="opacity-100 transform translate-y-0"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100 transform translate-y-0"
            x-transition:leave-end="opacity-0 transform translate-y-2"
            class="fixed top-4 left-1/2 transform -translate-x-1/2 z-50 max-w-md w-full mx-4"
        >
            @if(session('error'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg shadow-lg flex items-center justify-between">
                    <div class="flex items-center">
                        <svg class="w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path>
                        </svg>
                        <span>{{ session('error') }}</span>
                    </div>
                    <button @click="show = false" class="ml-4 text-red-400 hover:text-red-600">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>
            @endif
        </div>
    <form
        action="{{ route('order.store') }}"
        method="POST"
        class="space-y-6"
        x-data="{
            selectedName: '',
            selectedAddress: '',
            selectedPacket: '',
            selectedBandwidth: '',
            status: '',
            

            isFormValid() {
                return this.selectedName &&
                        this.selectedAddress &&
                        this.selectedPacket &&
                        this.selectedBandwidth &&
                        this.status;
            },

            resetForm() {
                this.selectedName = '';
                this.selectedAddress = '';
                this.selectedPacket = '';
                this.selectedBandwidth = '';
                this.status = '';
            }
        }"
    >
        @csrf

        <!-- Customer Name Field -->
        <div>
            <label for="name" class="block text-sm font-medium text-gray-700 mb-2">
                ID Customer <span class="text-red-500">*</span>
            </label>
            <select
                id="name"
                name="name"
                x-model="selectedName"
                class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors @error('name') border-red-500 @enderror"
                required
            >
                <option value="" disable selected>Pilih ID Customer</option>
                @forelse ($customers as $customer)
                    <option value="{{ $customer->id }}">{{ $customer->id }} - {{ $customer->full_name ?? 'Tanpa Nama' }}</option>
                @empty
                    <option value="" disable>Tidak ada yang tersedia tersedia</option>
                @endforelse
            </select>
            @error('order_id')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- Instalation Address Field -->
        <div>
            <label for="address" class="block text-sm font-medium text-gray-700 mb-2">
                Alamat Instalasi <span class="text-red-500">*</span>
            </label>
            <textarea
                id="address"
                name="address"
                x-model="selectedAddress"
                rows="4"
                maxlength="500"
                class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors resize-none @error('description') border-red-500 @enderror"
                placeholder="Masukkan alamat instalasi..."
                required
            ></textarea>
            @error('address')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
            <div class="mt-1 flex justify-between text-sm text-gray-500">
                <span x-show="description.length > 0">
                    <span x-text="description.length"></span> karakter
                </span>
                <span :class="description.length > 500 ? 'text-red-500' : 'text-gray-500'">
                    Maksimal 500 karakter
                </span>
            </div>
        </div>

        <!-- Package Name Field -->
        <div>
            <label for="name" class="block text-sm font-medium text-gray-700 mb-2">
                Nama Paket <span class="text-red-500">*</span>
            </label>
            <select
                id="name"
                name="packetName"
                x-model="selectedPacket"
                class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors @error('name') border-red-500 @enderror"
                required
            >
                <option value="">Masukan type paket</option>
                <option value="Family">Family</option>
                <option value="Office">Office</option>
                <option value="Dedicated">Dedicated</option>
            </select>
            @error('name')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- Bandwidth Field -->
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-3">
                Bandwidth (Mbps) <span class="text-red-500">*</span>
            </label>
            <div class="grid grid-cols-2 md:grid-cols-5 gap-3">
                @foreach([10, 20, 30, 40, 50, 60, 70, 80, 90, 100] as $bandwidth)
                    <label class="relative flex items-center justify-center p-3 border rounded-lg cursor-pointer transition-all hover:bg-gray-50"
                        :class="selectedBandwidth == '{{ $bandwidth }}' ? 'border-blue-500 bg-blue-50 text-blue-700' : 'border-gray-300'">
                        <input
                            type="radio"
                            name="bandwidth"
                            value="{{ $bandwidth }}"
                            x-model="selectedBandwidth"
                            class="sr-only"
                            
                        >
                        <span class="text-sm font-medium">{{ $bandwidth }} Mbps</span>
                        <div class="absolute top-2 right-2 w-4 h-4 rounded-full border-2 transition-all"
                            :class="selectedBandwidth == '{{ $bandwidth }}' ? 'border-blue-500 bg-blue-500' : 'border-gray-300'">
                            <div class="w-2 h-2 bg-white rounded-full m-0.5"
                                x-show="selectedBandwidth == '{{ $bandwidth }}'"></div>
                        </div>
                    </label>
                @endforeach
            </div>
            @error('bandwidth')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- Status Field -->
        <div>
            <label for="status" class="block text-sm font-medium text-gray-700 mb-2">
                Status 
            </label>
            <select
                id="status"
                name="status"
                x-model="status"
                class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors @error('payment_status') border-red-500 @enderror"
                required
            >
                <option value="" disabled selected>Pilih status</option>
                <option value="pending" >Pending</option>
                <option value="success" >Success</option>
                <option value="failed" >Failed</option>
            </select>
            @error('status')
                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- Action Buttons -->
        <div class="flex justify-end space-x-3 pt-6 border-t border-gray-200">
            <button
                type="button"
                @click="resetForm()"
                class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors"
            >
                Reset
            </button>
            <button
                type="submit"
                class="px-4 py-2 text-sm font-medium text-white border border-transparent rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors"
                :class="isFormValid() ? 'bg-blue-600 hover:bg-blue-700' : 'bg-gray-400 cursor-not-allowed'"
                :disabled="!isFormValid()"
            >
                Create Order
            </button>
        </div>
    </form>
