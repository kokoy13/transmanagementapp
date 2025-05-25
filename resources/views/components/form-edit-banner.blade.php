@props(['banner']);
<form action="{{ route('banner.update', $banner->id) }}" method="post" class="space-y-6 max-w-6xl mx-auto" x-data="{
                bannerName: '{{ $banner->name }}',
                thumbnailPreview: null,
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
                        // Set file to input
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
                            this.thumbnailPreview = e.target.result;
                        };
                        reader.readAsDataURL(file);
                    }
                },
                
                removeThumbnail() {
                    this.thumbnailPreview = null;
                    this.$refs.fileInput.value = '';
                }
            }" x-init="thumbnailPreview = 'https://images.unsplash.com/photo-1557804506-669a67965ba0?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80'">
                
                <!-- Banner Name Field -->
                <div>
                    <label for="banner-name" class="block text-sm font-medium text-gray-700 mb-2">
                        Nama Banner
                    </label>
                    <input 
                        type="text" 
                        id="banner-name" 
                        name="banner-name"
                        x-model="bannerName"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors"
                        placeholder="Masukkan nama banner"
                        required
                    >
                    <p class="mt-1 text-sm text-gray-500" x-show="bannerName.length > 0">
                        <span x-text="bannerName.length"></span> karakter
                    </p>
                </div>

                <!-- Thumbnail Field -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Thumbnail Banner
                    </label>
                    
                    <!-- File Input (Hidden) -->
                    <input 
                        type="file" 
                        x-ref="fileInput"
                        @change="handleFileSelect($event)"
                        accept="image/*"
                        class="hidden"
                    >
                    
                    <!-- Upload Area -->
                    <div 
                        class="relative border-2 border-dashed rounded-lg transition-colors duration-200"
                        :class="isDragOver ? 'border-blue-400 bg-blue-50' : 'border-gray-300 hover:border-gray-400'"
                        @dragover.prevent="isDragOver = true"
                        @dragleave.prevent="isDragOver = false"
                        @drop.prevent="handleDrop($event)"
                    >
                        <!-- Preview Image -->
                        <div x-show="thumbnailPreview" class="relative">
                            <img 
                                :src="thumbnailPreview" 
                                alt="Preview thumbnail"
                                class="w-full h-96 object-cover rounded-lg"
                            >
                            <!-- Overlay with actions -->
                            <div class="absolute inset-0 bg-black opacity-0 hover:opacity-100 transition-opacity duration-200 rounded-lg flex items-center justify-center space-x-3">
                                <button 
                                    type="button"
                                    @click="$refs.fileInput.click()"
                                    class="bg-white text-gray-700 px-4 py-2 rounded-md hover:cursor-pointer text-sm font-medium hover:bg-gray-50 transition-colors"
                                >
                                    Ganti
                                </button>
                                <button 
                                    type="button"
                                    @click="removeThumbnail()"
                                    class="bg-red-600 text-white px-4 py-2 rounded-md text-sm hover:cursor-pointer font-medium hover:bg-red-700 transition-colors"
                                >
                                    Hapus
                                </button>
                            </div>
                        </div>
                        
                        <!-- Upload Placeholder -->
                        <div x-show="!thumbnailPreview" class="p-8 text-center">
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
                        
                        <!-- Drag Overlay -->
                        <div 
                            x-show="isDragOver" 
                            class="absolute inset-0 bg-blue-50 border-2 border-blue-400 rounded-lg flex items-center justify-center"
                            x-transition:enter="transition ease-out duration-200"
                            x-transition:enter-start="opacity-0"
                            x-transition:enter-end="opacity-100"
                        >
                            <div class="text-center">
                                <svg class="mx-auto h-12 w-12 text-blue-400 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                </svg>
                                <p class="text-blue-600 font-medium">Lepaskan file di sini</p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- File Info -->
                    <div x-show="thumbnailPreview" class="mt-2 text-sm text-gray-500">
                        <p>✓ Thumbnail berhasil dipilih</p>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="flex justify-end space-x-3 pt-6 border-t border-gray-200">
                    <a
                        href="{{ route('banners') }}"
                        class="px-4 py-2 text-sm font-medium text-gray-700 bg-white hover:cursor-pointer border border-gray-300 rounded-md hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors"
                    >
                        Batal
                    </a>
                    <button 
                        type="submit"
                        class="px-4 py-2 text-sm font-medium text-white bg-blue-600 hover:cursor-pointer border border-transparent rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors"
                        :disabled="!bannerName.trim() || !thumbnailPreview"
                        :class="(!bannerName.trim() || !thumbnailPreview) ? 'opacity-50 cursor-not-allowed' : ''"
                    >
                        Simpan Perubahan
                    </button>
                </div>
            </form>