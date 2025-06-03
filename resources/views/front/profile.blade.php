<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        slate: {
                            50: '#f8fafc',
                            100: '#f1f5f9',
                            200: '#e2e8f0',
                            300: '#cbd5e1',
                            400: '#94a3b8',
                            500: '#64748b',
                            600: '#475569',
                            700: '#334155',
                            800: '#1e293b',
                            900: '#0f172a',
                            950: '#020617'
                        }
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-gradient-to-br from-slate-50 to-slate-100 min-h-screen" x-data="{
    showModal: false,
    profile: {
        name: '{{ ucwords($profile->name) }}',
        email: '{{ $profile->email }}',
        phone_number: '{{ $profile->phone_number ?? '-' }}',
        address: '{{ $profile->address ?? '-' }}',
        avatar: '{{ $profile->avatar }}',
        created_at: '{{ \Carbon\Carbon::parse($profile->created_at)->translatedFormat('l, d F Y') }}',
        status: 'online'
    },
    editForm: {
        name: '',
        email: '',
        phone_number: '',
        address: ''
    },
    initEditForm() {
        this.editForm = {
            name: this.profile.name,
            email: this.profile.email,
            phone_number: this.profile.phone_number,
            address: this.profile.address
        }
    },
}" x-init="initEditForm()">

    <!-- Header -->
    <header class="bg-white shadow-sm border-b">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-3xl font-bold text-slate-900">Profile</h1>
                    <p class="text-slate-600 mt-1">Manage your account settings and preferences</p>
                </div>
                <button
                    @click="showModal = true; initEditForm()"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md flex items-center transition-colors duration-200">
                    <i class="fas fa-edit mr-2 text-sm"></i>
                    Edit Profile
                </button>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Profile Card -->
            <div class="lg:col-span-1">
                <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                    <div class="p-6">
                        <div class="text-center">
                            <div class="relative inline-block mb-4">
                                <img
                                    :src="profile.avatar"
                                    :alt="profile.name"
                                    class="w-32 h-32 rounded-full mx-auto border-4 border-white shadow-lg object-cover"
                                >
                                <div class="absolute -bottom-2 -right-2">
                                    <div class="w-6 h-6 rounded-full border-4 border-white bg-green-500"></div>
                                </div>
                            </div>
                            <h2 class="text-2xl font-bold text-slate-900 mb-2" x-text="profile.name"></h2>
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-slate-100 text-slate-800 mb-4">
                                <i class="fas fa-user text-xs mr-1"></i>
                                Customer
                            </span>
                            <div class="flex items-center justify-center text-sm text-slate-600">
                                <div class="w-2 h-2 rounded-full mr-2 bg-green-500"></div>
                                Online
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Profile Details -->
            <div class="lg:col-span-2">
                <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                    <div class="px-6 py-4 border-b border-slate-100">
                        <div class="flex items-center justify-between">
                            <h3 class="text-lg font-semibold text-slate-900">Profile Information</h3>
                            <div class="w-3 h-3 bg-green-500 rounded-full"></div>
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="space-y-4">
                                <div class="flex items-start space-x-3 p-4 rounded-lg bg-slate-50">
                                    <i class="fas fa-user text-slate-600 mt-1"></i>
                                    <div class="flex-1">
                                        <p class="text-sm font-medium text-slate-600">Full Name</p>
                                        <p class="text-slate-900 font-medium" x-text="profile.name"></p>
                                    </div>
                                </div>

                                <div class="flex items-start space-x-3 p-4 rounded-lg bg-slate-50">
                                    <i class="fas fa-envelope text-slate-600 mt-1"></i>
                                    <div class="flex-1">
                                        <p class="text-sm font-medium text-slate-600">Email Address</p>
                                        <p class="text-slate-900 font-medium" x-text="profile.email"></p>
                                    </div>
                                </div>

                                <div class="flex items-start space-x-3 p-4 rounded-lg bg-slate-50">
                                    <i class="fas fa-phone text-slate-600 mt-1"></i>
                                    <div class="flex-1">
                                        <p class="text-sm font-medium text-slate-600">Phone Number</p>
                                        <p class="text-slate-900 font-medium" x-text="profile.phone_number"></p>
                                    </div>
                                </div>
                            </div>

                            <div class="space-y-4">
                                <div class="flex items-start space-x-3 p-4 rounded-lg bg-slate-50">
                                    <i class="fas fa-map-marker-alt text-slate-600 mt-1"></i>
                                    <div class="flex-1">
                                        <p class="text-sm font-medium text-slate-600">Address</p>
                                        <p class="text-slate-900 font-medium" x-text="profile.address"></p>
                                    </div>
                                </div>

                                <div class="flex items-start space-x-3 p-4 rounded-lg bg-slate-50">
                                    <i class="fas fa-calendar text-slate-600 mt-1"></i>
                                    <div class="flex-1">
                                        <p class="text-sm font-medium text-slate-600">Member Since</p>
                                        <p class="text-slate-900 font-medium" x-text="profile.created_at"></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Edit Profile Modal -->
    <form action="{{ route('profile.edit') }}" method="post" x-show="showModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50" x-transition>
        @csrf
        @method('put')
        <div class="bg-white rounded-lg shadow-xl p-6 w-full max-w-md mx-4" @click.away="showModal = false">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-lg font-semibold text-slate-900">Edit Profile</h3>
                <button @click="showModal = false" class="text-slate-400 hover:text-slate-600 transition-colors">
                    <i class="fas fa-times"></i>
                </button>
            </div>

            <div class="space-y-4 py-4">
                <div class="space-y-2">
                    <label for="name" class="block text-sm font-medium text-slate-700">Full Name</label>
                    <input
                        id="name"
                        name="name"
                        type="text"
                        x-model="editForm.name"
                        class="w-full px-3 py-2 border border-slate-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    />
                </div>

                <div class="space-y-2">
                    <label for="email" class="block text-sm font-medium text-slate-700">Email</label>
                    <input
                        id="email"
                        type="email"
                        name="email"
                        x-model="editForm.email"
                        class="w-full px-3 py-2 border border-slate-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    />
                </div>

                <div class="space-y-2">
                    <label for="phone" class="block text-sm font-medium text-slate-700">Phone Number</label>
                    <input
                        id="phone"
                        name="phone_number"
                        type="text"
                        x-model="editForm.phone_number"
                        class="w-full px-3 py-2 border border-slate-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    />
                </div>

                <div class="space-y-2">
                    <label for="address" class="block text-sm font-medium text-slate-700">Address</label>
                    <textarea
                        id="address"
                        name="address"
                        x-model="editForm.address"
                        rows="3"
                        class="w-full px-3 py-2 border border-slate-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    ></textarea>
                </div>
            </div>

            <div class="flex justify-end space-x-2 mt-4">
                <button
                    @click="showModal = false"
                    class="px-4 py-2 border border-slate-300 rounded-md text-slate-700 bg-white hover:bg-slate-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    Cancel
                </button>
                <button
                    type="submit"
                    class="px-4 py-2 bg-blue-600 border border-transparent rounded-md font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    Save Changes
                </button>
            </div>
        </div>
    </form>
</body>
</html>
