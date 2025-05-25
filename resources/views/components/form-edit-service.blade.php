@props(['packet'])
<form
    action="{{ route('service.update', $packet->id) }}"
    method="POST"
    class="space-y-6"
    x-data="{
        selectedName: '{{ old('name', $packet->name ?? '') }}',
        selectedBandwidth: '{{ old('bandwidth', $packet->bandwidth ?? '') }}',
        price: '{{ old('price', $packet->price ?? '') }}',
        description: '{{ old('description', $packet->desc ?? '') }}',
        selectedRasio: '{{ old('rasio', $packet->rasio ?? '') }}',

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
    @method('put')

    <!-- Package Name Field -->
    <div>
        <label for="name" class="block text-sm font-medium text-gray-700 mb-2">
            Nama Package <span class="text-red-500">*</span>
        </label>
        <select
            id="name"
            name="name"
            x-model="selectedName"
            class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors @error('name') border-red-500 @enderror"
            required
        >
            <option value="">Pilih nama package</option>
            <option value="basic">Basic Package</option>
            <option value="standard">Standard Package</option>
            <option value="premium">Premium Package</option>
            <option value="enterprise">Enterprise Package</option>
            <option value="unlimited">Unlimited Package</option>
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
                        {{ old('bandwidth', $packet->bandwidth ?? '') == $bandwidth ? 'checked' : '' }}
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
                value="{{ old('price', $packet->price ?? '') }}"
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
            Deskripsi Package <span class="text-red-500">*</span>
        </label>
        <textarea
            id="description"
            name="description"
            x-model="description"
            rows="4"
            maxlength="500"
            class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors resize-none @error('description') border-red-500 @enderror"
            placeholder="Masukkan deskripsi package..."
            required
        >{{ old('description', $packet->description ?? '') }}</textarea>
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
            <option value="1:1" {{ old('rasio', $packet->rasio ?? '') == '1:1' ? 'selected' : '' }}>1:1 (Symmetric)</option>
            <option value="1:2" {{ old('rasio', $packet->rasio ?? '') == '1:2' ? 'selected' : '' }}>1:2 (Upload 50% dari Download)</option>
            <option value="1:4" {{ old('rasio', $packet->rasio ?? '') == '1:4' ? 'selected' : '' }}>1:4 (Upload 25% dari Download)</option>
            <option value="1:8" {{ old('rasio', $packet->rasio ?? '') == '1:8' ? 'selected' : '' }}>1:8 (Upload 12.5% dari Download)</option>
            <option value="1:10" {{ old('rasio', $packet->rasio ?? '') == '1:10' ? 'selected' : '' }}>1:10 (Upload 10% dari Download)</option>
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
            Update Packet
        </button>
    </div>
</form>
