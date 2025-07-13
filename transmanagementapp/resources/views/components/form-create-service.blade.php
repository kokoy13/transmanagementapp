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
    action="{{ route('service.store')}}"
    method="POST"
    class="space-y-6"
    x-data="{
        selectedName: '',
        selectedBandwidth: '',
        price: '',
        description: '',
        selectedRasio: '',

        isFormValid() {
            return this.selectedName &&
                this.selectedBandwidth &&
                this.price &&
                this.description.trim() &&
                this.selectedRasio;
        },

        resetForm() {
            this.selectedName = '';
            this.selectedBandwidth = '';
            this.price = '';
            this.description = '';
            this.selectedRasio = '';
        }
    }"
>
    @csrf

    <!-- Package Name Field -->
    <div>
        <label for="name" class="block text-sm font-medium text-gray-700 mb-2">
            Nama Paket <span class="text-red-500">*</span>
        </label>
        <select
            id="name"
            name="name"
            x-model="selectedName"
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
                {{-- 10 Mbps --}}
                <label class="relative flex items-center justify-center p-3 border rounded-lg cursor-pointer transition-all hover:bg-gray-50"
                    :class="selectedBandwidth == 10 ? 'border-blue-500 bg-blue-50 text-blue-700' : 'border-gray-300'">
                    <input
                        type="radio"
                        value=10
                        name="bandwidth"
                        x-model="selectedBandwidth"
                        class="sr-only"
                    >
                    <span class="text-sm font-medium">10 Mbps</span>
                    <div class="absolute top-2 right-2 w-4 h-4 rounded-full border-2 transition-all"
                        :class="selectedBandwidth == 10 ? 'border-blue-500 bg-blue-500' : 'border-gray-300'">
                        <div class="w-2 h-2 bg-white rounded-full m-0.5"
                            x-show="selectedBandwidth == 10"></div>
                    </div>
                </label>
                {{-- 20 Mbps --}}
                <label class="relative flex items-center justify-center p-3 border rounded-lg cursor-pointer transition-all hover:bg-gray-50"
                    :class="selectedBandwidth == 20 ? 'border-blue-500 bg-blue-50 text-blue-700' : 'border-gray-300'">
                    <input
                        type="radio"
                        value=20
                        name="bandwidth"
                        x-model="selectedBandwidth"
                        class="sr-only"
                    >
                    <span class="text-sm font-medium">20 Mbps</span>
                    <div class="absolute top-2 right-2 w-4 h-4 rounded-full border-2 transition-all"
                        :class="selectedBandwidth == 20 ? 'border-blue-500 bg-blue-500' : 'border-gray-300'">
                        <div class="w-2 h-2 bg-white rounded-full m-0.5"
                            x-show="selectedBandwidth == 20"></div>
                    </div>
                </label>
                {{-- 30 Mbps --}}
                <label class="relative flex items-center justify-center p-3 border rounded-lg cursor-pointer transition-all hover:bg-gray-50"
                    :class="selectedBandwidth == 30 ? 'border-blue-500 bg-blue-50 text-blue-700' : 'border-gray-300'">
                    <input
                        type="radio"
                        value=30
                        name="bandwidth"
                        x-model="selectedBandwidth"
                        class="sr-only"
                    >
                    <span class="text-sm font-medium">30 Mbps</span>
                    <div class="absolute top-2 right-2 w-4 h-4 rounded-full border-2 transition-all"
                        :class="selectedBandwidth == 30 ? 'border-blue-500 bg-blue-500' : 'border-gray-300'">
                        <div class="w-2 h-2 bg-white rounded-full m-0.5"
                            x-show="selectedBandwidth == 30"></div>
                    </div>
                </label>
                <label class="relative flex items-center justify-center p-3 border rounded-lg cursor-pointer transition-all hover:bg-gray-50"
                    :class="selectedBandwidth == 40 ? 'border-blue-500 bg-blue-50 text-blue-700' : 'border-gray-300'">
                    <input
                        type="radio"
                        value=40
                        name="bandwidth"
                        x-model="selectedBandwidth"
                        class="sr-only"
                    >
                    <span class="text-sm font-medium">40 Mbps</span>
                    <div class="absolute top-2 right-2 w-4 h-4 rounded-full border-2 transition-all"
                        :class="selectedBandwidth == 40 ? 'border-blue-500 bg-blue-500' : 'border-gray-300'">
                        <div class="w-2 h-2 bg-white rounded-full m-0.5"
                            x-show="selectedBandwidth == 40"></div>
                    </div>
                </label>
                <label class="relative flex items-center justify-center p-3 border rounded-lg cursor-pointer transition-all hover:bg-gray-50"
                    :class="selectedBandwidth == 50 ? 'border-blue-500 bg-blue-50 text-blue-700' : 'border-gray-300'">
                    <input
                        type="radio"
                        value=50
                        name="bandwidth"
                        x-model="selectedBandwidth"
                        class="sr-only"
                    >
                    <span class="text-sm font-medium">50 Mbps</span>
                    <div class="absolute top-2 right-2 w-4 h-4 rounded-full border-2 transition-all"
                        :class="selectedBandwidth == 50 ? 'border-blue-500 bg-blue-500' : 'border-gray-300'">
                        <div class="w-2 h-2 bg-white rounded-full m-0.5"
                            x-show="selectedBandwidth == 50"></div>
                    </div>
                </label>
                <label class="relative flex items-center justify-center p-3 border rounded-lg cursor-pointer transition-all hover:bg-gray-50"
                    :class="selectedBandwidth == 60 ? 'border-blue-500 bg-blue-50 text-blue-700' : 'border-gray-300'">
                    <input
                        type="radio"
                        value=60
                        name="bandwidth"
                        x-model="selectedBandwidth"
                        class="sr-only"
                    >
                    <span class="text-sm font-medium">60 Mbps</span>
                    <div class="absolute top-2 right-2 w-4 h-4 rounded-full border-2 transition-all"
                        :class="selectedBandwidth == 60 ? 'border-blue-500 bg-blue-500' : 'border-gray-300'">
                        <div class="w-2 h-2 bg-white rounded-full m-0.5"
                            x-show="selectedBandwidth == 60"></div>
                    </div>
                </label>
                <label class="relative flex items-center justify-center p-3 border rounded-lg cursor-pointer transition-all hover:bg-gray-50"
                    :class="selectedBandwidth == 70 ? 'border-blue-500 bg-blue-50 text-blue-700' : 'border-gray-300'">
                    <input
                        type="radio"
                        value=70
                        name="bandwidth"
                        x-model="selectedBandwidth"
                        class="sr-only"
                    >
                    <span class="text-sm font-medium">70 Mbps</span>
                    <div class="absolute top-2 right-2 w-4 h-4 rounded-full border-2 transition-all"
                        :class="selectedBandwidth == 70 ? 'border-blue-500 bg-blue-500' : 'border-gray-300'">
                        <div class="w-2 h-2 bg-white rounded-full m-0.5"
                            x-show="selectedBandwidth == 70"></div>
                    </div>
                </label>
                <label class="relative flex items-center justify-center p-3 border rounded-lg cursor-pointer transition-all hover:bg-gray-50"
                    :class="selectedBandwidth == 80 ? 'border-blue-500 bg-blue-50 text-blue-700' : 'border-gray-300'">
                    <input
                        type="radio"
                        value=80
                        name="bandwidth"
                        x-model="selectedBandwidth"
                        class="sr-only"
                    >
                    <span class="text-sm font-medium">80 Mbps</span>
                    <div class="absolute top-2 right-2 w-4 h-4 rounded-full border-2 transition-all"
                        :class="selectedBandwidth == 80 ? 'border-blue-500 bg-blue-500' : 'border-gray-300'">
                        <div class="w-2 h-2 bg-white rounded-full m-0.5"
                            x-show="selectedBandwidth == 80"></div>
                    </div>
                </label>
                <label class="relative flex items-center justify-center p-3 border rounded-lg cursor-pointer transition-all hover:bg-gray-50"
                    :class="selectedBandwidth == 90 ? 'border-blue-500 bg-blue-50 text-blue-700' : 'border-gray-300'">
                    <input
                        type="radio"
                        value=90
                        name="bandwidth"
                        x-model="selectedBandwidth"
                        class="sr-only"
                    >
                    <span class="text-sm font-medium">90 Mbps</span>
                    <div class="absolute top-2 right-2 w-4 h-4 rounded-full border-2 transition-all"
                        :class="selectedBandwidth == 90 ? 'border-blue-500 bg-blue-500' : 'border-gray-300'">
                        <div class="w-2 h-2 bg-white rounded-full m-0.5"
                            x-show="selectedBandwidth == 90"></div>
                    </div>
                </label>
                <label class="relative flex items-center justify-center p-3 border rounded-lg cursor-pointer transition-all hover:bg-gray-50"
                       :class="selectedBandwidth == 100 ? 'border-blue-500 bg-blue-50 text-blue-700' : 'border-gray-300'">
                    <input
                        type="radio"
                        value=100
                        name="bandwidth"
                        x-model="selectedBandwidth"
                        class="sr-only"
                    >
                    <span class="text-sm font-medium">100 Mbps</span>
                    <div class="absolute top-2 right-2 w-4 h-4 rounded-full border-2 transition-all"
                         :class="selectedBandwidth == 100 ? 'border-blue-500 bg-blue-500' : 'border-gray-300'">
                        <div class="w-2 h-2 bg-white rounded-full m-0.5"
                             x-show="selectedBandwidth == 100"></div>
                    </div>
                </label>
        </div>
        @error('bandwidth')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <!-- Price Field -->
    <div>
        <label for="price" class="block text-sm font-medium text-gray-700 mb-2">
            Harga (Rupiah) <span class="text-red-500">*</span>
        </label>
        <div class="relative">
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <span class="text-gray-500 sm:text-sm">Rp</span>
            </div>
            <input
                type="number"
                id="price"
                name="price"
                x-model="price"
                min="0"
                step="1000"
                class="w-full pl-12 pr-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors @error('price') border-red-500 @enderror"
                placeholder="0"
                required
            >
        </div>
        @error('price')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <!-- Description Field -->
    <div>
        <label for="description" class="block text-sm font-medium text-gray-700 mb-2">
            Deskripsi Paket <span class="text-red-500">*</span>
        </label>
        <textarea
            id="description"
            name="desc"
            x-model="description"
            rows="4"
            maxlength="500"
            class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors resize-none @error('description') border-red-500 @enderror"
            placeholder="Masukkan deskripsi paket..."
            required
        ></textarea>
        @error('description')
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

    <!-- Rasio Field -->
    <div>
        <label for="rasio" class="block text-sm font-medium text-gray-700 mb-2">
            Rasio Upload/Download <span class="text-red-500">*</span>
        </label>
        <select
            id="rasio"
            name="rasio"
            x-model="selectedRasio"
            class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors @error('rasio') border-red-500 @enderror"
            required
        >
            <option value="">Pilih rasio</option>
            <option value="1:1">1:1 (Symmetric)</option>
            <option value="1:2">1:2 (Upload 50% dari Download)</option>
            <option value="1:4">1:4 (Upload 25% dari Download)</option>
            <option value="1:8">1:8 (Upload 12.5% dari Download)</option>
            <option value="1:10">1:10 (Upload 10% dari Download)</option>
        </select>
        @error('rasio')
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
            Tambah Packet
        </button>
    </div>
</form>
