@props(['user'])
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
    action="{{ route('user.update', $user->id)}}"
    method="POST"
    enctype="multipart/form-data"
    class="space-y-6"
    x-data="{
        name: '{{ $user->name }}',
        email: '{{ $user->email }}',
        password: '{{ $user->password }}',
        password2: '{{ $user->password }}',
        role: '{{ $user->role }}',
        avatar: '{{ $user->avatar }}',
        avatarPreview: '{{ Str::startsWith($user->avatar, 'https')
            ? $user->avatar
            : Storage::url('public/avatars/' . $user->avatar) }}',

        isFormValid() {
            return this.name &&
                this.email &&
                this.password &&
                this.password2 &&
                this.role &&
                this.password === this.password2;
        },

        resetForm() {
            this.name = '';
            this.email = '';
            this.password = '';
            this.password2 = '';
            this.role = '';
            this.avatar = null;
            this.avatarPreview = null;
            // Reset file input
            this.$refs.avatarInput.value = '';
        },

        handleAvatarChange(event) {
            const file = event.target.files[0];
            if (file) {
                this.avatar = file;
                // Create preview URL
                const reader = new FileReader();
                reader.onload = (e) => {
                    this.avatarPreview = e.target.result;
                };
                reader.readAsDataURL(file);
            } else {
                this.avatar = null;
                this.avatarPreview = null;
            }
        },

        removeAvatar() {
            this.avatar = null;
            this.avatarPreview = null;
            this.$refs.avatarInput.value = '';
        }
    }"
>
    @csrf
    @method('put')

    <!-- Avatar -->
    <div>
        <label class="block text-sm font-medium text-gray-700 mb-2">
            Avatar
        </label>
        <div class="flex items-center space-x-4">
            <!-- Avatar Preview -->
            <div class="relative">
                <div class="w-20 h-20 rounded-full border-2 border-gray-300 overflow-hidden bg-gray-100 flex items-center justify-center">
                    <template x-if="avatarPreview">
                        <img :src="avatarPreview" alt="Avatar Preview" class="w-full h-full object-cover">
                    </template>
                    <template x-if="!avatarPreview">
                        <svg class="w-8 h-8 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path>
                        </svg>
                    </template>
                </div>
                <!-- Remove button -->
                <button
                    x-show="avatarPreview"
                    @click="removeAvatar()"
                    type="button"
                    class="absolute -top-2 -right-2 w-6 h-6 bg-red-500 text-white rounded-full flex items-center justify-center hover:bg-red-600 transition-colors"
                >
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>

            <!-- File Input -->
            <div class="flex-1">
                <input
                    type="file"
                    id="avatar"
                    name="avatar"
                    x-ref="avatarInput"
                    @change="handleAvatarChange($event)"
                    accept="image/*"
                    class="hidden"
                >
                <label
                    for="avatar"
                    class="cursor-pointer inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors"
                >
                    <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" clip-rule="evenodd"></path>
                    </svg>
                    Pilih Avatar
                </label>
                <p class="mt-1 text-xs text-gray-500">PNG, JPG, GIF hingga 2MB</p>
            </div>
        </div>
        @error('avatar')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <!-- Name -->
    <div>
        <label for="name" class="block text-sm font-medium text-gray-700 mb-2">
            Nama User <span class="text-red-500">*</span>
        </label>
        <div class="relative">
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <svg class="w-5 h-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path>
                </svg>
            </div>
            <input
                type="text"
                id="name"
                name="name"
                x-model="name"
                class="w-full pl-12 pr-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors @error('name') border-red-500 @enderror"
                placeholder="Masukkan nama user"
                required
            >
        </div>
        @error('name')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <!-- Email -->
    <div>
        <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
            Email <span class="text-red-500">*</span>
        </label>
        <div class="relative">
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <svg class="w-5 h-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path>
                    <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path>
                </svg>
            </div>
            <input
                type="email"
                id="email"
                name="email"
                x-model="email"
                class="w-full pl-12 pr-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors @error('email') border-red-500 @enderror"
                placeholder="Masukkan email"
                required
            >
        </div>
        @error('email')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <!-- Password -->
    <div>
        <label for="password" class="block text-sm font-medium text-gray-700 mb-2">
            Password <span class="text-red-500">*</span>
        </label>
        <div class="relative">
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <svg class="w-5 h-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd"></path>
                </svg>
            </div>
            <input
                type="password"
                id="password"
                name="password"
                x-model="password"
                class="w-full pl-12 pr-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors @error('password') border-red-500 @enderror"
                placeholder="Masukkan password"
                required
            >
        </div>
        @error('password')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <!-- Password Confirmation -->
    <div>
        <label for="password2" class="block text-sm font-medium text-gray-700 mb-2">
            Konfirmasi Password <span class="text-red-500">*</span>
        </label>
        <div class="relative">
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <svg class="w-5 h-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd"></path>
                </svg>
            </div>
            <input
                type="password"
                id="password2"
                name="password_confirmation"
                x-model="password2"
                class="w-full pl-12 pr-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors @error('password_confirmation') border-red-500 @enderror"
                placeholder="Konfirmasi password"
                required
            >
        </div>
        <!-- Password match validation -->
        <div x-show="password2 && password !== password2" class="mt-1 text-sm text-red-600">
            Password tidak cocok
        </div>
        @error('password_confirmation')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <!-- Role -->
    <div>
        <label for="role" class="block text-sm font-medium text-gray-700 mb-2">
            Role User <span class="text-red-500">*</span>
        </label>
        <select
            id="role"
            name="role"
            x-model="role"
            class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors @error('role') border-red-500 @enderror"
            required
        >
            <option value="">Pilih Role</option>
            <option value="admin">Admin</option>
            <option value="marketing">Marketing</option>
        </select>
        @error('role')
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
            Edit User
        </button>
    </div>
</form>
