@props(['payment', 'orders'])
<!-- Success Message -->
@if(session('success'))
<div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">
    {{ session('success') }}
</div>
@endif

<!-- Error Message -->
@if(session('error'))
<div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
    {{ session('error') }}
</div>
@endif

<form
    action="{{ route('payment.update', $payment->id) }}"
    method="POST"
    enctype="multipart/form-data"
    class="space-y-6"
    x-data="{
       orderId: '{{ old('order_id', $payment->order_id) }}',
        paymentDate: '{{ old('payment_date', $payment->payment_date) }}',
        amount: '{{ old('amount', $payment->amount) }}',
        paymentStatus: '{{ old('payment_status', $payment->payment_status) }}',
        transactionReferencePreview: @if($payment->transcation_reference) '{{ Storage::url('public/payments/' . $payment->transcation_reference) }}' @else null @endif,
        isDragOver: false,

        handleFileSelect(event) {
            const file = event.target.files[0];
            this.previewFile(file);
        },

        handleDrop(event) {
            event.preventDefault();
            this.isDragOver = false;
            const file = event.dataTransfer.files[0];
            if (file && file.type.startsWith('image/')) {
                this.previewFile(file);
                const input = this.$refs.fileInput;
                const dt = new DataTransfer();
                dt.items.add(file);
                input.files = dt.files;
            }
        },

        previewFile(file) {
            if (file && file.type.startsWith('image/')) {
                const reader = new FileReader();
                reader.onload = (e) => {
                    this.transactionReferencePreview = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        },

        removeTransactionReference() {
            this.transactionReferencePreview = null;
            this.$refs.fileInput.value = '';
        }
    }"
>
    @csrf
    @method('PUT')

    <!-- Order ID Field -->
    <div>
        <label for="order_id" class="block text-sm font-medium text-gray-700 mb-2">
            ID Pesanan
        </label>
        <select
            id="order_id"
            name="order_id"
            x-model="orderId"
            class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors @error('order_id') border-red-500 @enderror"
            required
        >
            <option value="" disabled selected>Pilih ID pesanan</option>
            @forelse ($orders as $order)
                <option value="{{ $order->id }}" {{ $order->id }} - {{ old('order_id, $payment->order_id' ==  $order->id ? 'select' : '')}}>
                    {{ $order->id }} - {{ $order->customer->full_name ?? 'Tanpa Nama' }}
                </option>
            @empty
                <option value="" disabled>Tidak ada pesanan tersedia</option>
            @endforelse
        </select>
        @error('order_id')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>
    <!-- Payment Date Field -->
    <div>
        <label for="payment_date" class="block text-sm font-medium text-gray-700 mb-2">
            Tanggal Pembayaran
        </label>
        <input
            type="date"
            id="payment_date"
            name="payment_date"
            x-model="paymentDate"
            value="{{ old('payment_date', $payment->payment_date) }}"
            class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors @error('payment_date') border-red-500 @enderror"
            required
        >
        @error('payment_date')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <!-- Amount Field -->
    <div>
        <label for="amount" class="block text-sm font-medium text-gray-700 mb-2">
            Jumlah
        </label>
        <input
            type="number"
            id="amount"
            name="amount"
            x-model="amount"
            step="0.01"
            value="{{ old('amount', $payment->amount) }}"
            class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors @error('amount') border-red-500 @enderror"
            placeholder="Masukkan jumlah"
            required
        >
        @error('amount')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <!-- Payment Status Field -->
    <div>
        <label for="payment_status" class="block text-sm font-medium text-gray-700 mb-2">
            Status Pembayaran
        </label>
        <select
            id="payment_status"
            name="payment_status"
            x-model="paymentStatus"
            class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors @error('payment_status') border-red-500 @enderror"
            required
        >
            <option value="" disabled selected>Pilih status pembayaran</option>
            <option value="pending" {{ old('payment_status', $payment->payment_status) == 'pending' ? 'selected' : '' }}>Pending</option>
            <option value="success" {{ old('payment_status', $payment->payment_status) == 'success' ? 'selected' : '' }}>Success</option>
            <option value="failed" {{ old('payment_status', $payment->payment_status) == 'failed' ? 'selected' : '' }}>Failed</option>
        </select>
        @error('payment_status')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <!-- Transaction Reference Field (Image Upload) -->
    <div>
        <label class="block text-sm font-medium text-gray-700 mb-2">
            Bukti Pembayaran
        </label>

        <!-- File Input (Hidden) -->
        <input
            type="file"
            name="transaction_reference"
            x-ref="fileInput"
            @change="handleFileSelect($event)"
            accept="image/*"
            class="hidden"
        >

        <!-- Upload Area -->
        <div
            class="relative border-2 border-dashed rounded-lg transition-colors duration-200 @error('transaction_reference') border-red-500 @else border-gray-300 hover:border-gray-400 @enderror"
            :class="isDragOver ? 'border-blue-400 bg-blue-50' : ''"
            @dragover.prevent="isDragOver = true"
            @dragleave.prevent="isDragOver = false"
            @drop.prevent="handleDrop($event)"
        >
            <!-- Preview Image -->
            <div x-show="transactionReferencePreview" class="relative">
                <img
                    :src="transactionReferencePreview"
                    alt="Preview bukti pembayaran"
                    class="w-full h-96 object-cover rounded-lg"
                >
                <!-- Overlay with actions -->
                <div class="absolute inset-0 bg-black/40 opacity-0 hover:opacity-100 transition-opacity duration-200 rounded-lg flex items-center justify-center space-x-3">
                    <button
                        type="button"
                        @click="$refs.fileInput.click()"
                        class="bg-white text-gray-700 px-4 py-2 hover:cursor-pointer rounded-md text-sm font-medium hover:bg-gray-50 transition-colors"
                    >
                        Ganti
                    </button>
                    <button
                        type="button"
                        @click="removeTransactionReference()"
                        class="bg-red-600 text-white px-4 py-2 hover:cursor-pointer rounded-md text-sm font-medium hover:bg-red-700 transition-colors"
                    >
                        Hapus
                    </button>
                </div>
            </div>

            <!-- Upload Placeholder -->
            <div x-show="!transactionReferencePreview" class="p-8 text-center">
                <svg class="mx-auto h-12 w-12 text-gray-400 mb-4" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                    <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                <p class="text-gray-600 mb-2">
                    <span class="font-medium">Klik untuk upload</span> atau drag & drop
                </p>
                <p class="text-sm text-gray-500">PNG, JPG, GIF hingga 10MB</p>
                <button
                    type="button"
                    @click="$refs.fileInput.click()"
                    class="mt-4 bg-blue-600 text-white px-4 py-2 rounded-md text-sm font-medium hover:bg-blue-700 transition-colors"
                >
                    Pilih File
                </button>
            </div>
        </div>

        @error('transaction_reference')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <!-- Action Buttons -->
    <div class="flex justify-end space-x-3 pt-6 border-t border-gray-200">
        <a
            href="{{ route('payments') }}"
            class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors"
        >
            Batal
        </a>
        <button
            type="submit"
            class="px-4 py-2 text-sm font-medium text-white bg-blue-600 border border-transparent rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors"
        >
            Edit
        </button>
    </div>
</form>
