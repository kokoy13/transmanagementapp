<!DOCTYPE html>
<html lang="en" x-data="{ sidebarOpen: false }">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        dark: {
                            100: '#1a1a1a',
                            200: '#2a2a2a',
                            300: '#3a3a3a',
                            400: '#4a4a4a'
                        }
                    }
                }
            }
        }
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-gray-900 text-white font-sans">
    <x-header2></x-header2>
    <div class="mt-20 flex min-h-screen">

        <!-- Main Content -->
        <div class="flex-1 bg-white">

            <!-- Profile Content -->
            <div class="p-6">
                <div class="mb-6">
                    <h1 class="text-2xl font-bold text-gray-900">Profile</h1>
                    <p class="text-gray-700 text-sm">Lihat Semua Detail Profile Anda di Sini.</p>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                    <!-- Profile Card -->
                    <div class="bg-gray-300 rounded-lg p-6">
                        <div class="text-center">
                            <div class="relative inline-block mb-4">
                                <img 
                                    src="{{$profile->user->avatar}}" 
                                    alt="Maria Fernanda" 
                                    class="w-32 h-32 rounded-full mx-auto border-4 border-gray-600"
                                >
                                <div class="absolute top-0 right-0 w-4 h-4 bg-green-500 rounded-full border-2 border-dark-200"></div>
                            </div>
                            <h2 class="text-xl font-bold text-gray-900">{{ucwords($profile->user->name)}}</h2>
                            <p class="text-green-400 text-sm">User Customer</p>
                        </div>
                    </div>

                    <!-- Bio & Details -->
                    <div class="bg-gray-300 rounded-lg p-6">
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="text-lg font-semibold text-gray-900">Bio & Detail Lainnya</h3>
                            <div class="w-2 h-2 bg-green-500 rounded-full"></div>
                        </div>

                        <div class="space-y-4">
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <p class="text-gray-600 text-sm">Nama Lengkap</p>
                                        <div class="flex items-center gap-5">
                                            <p class="text-gray-800">{{ucwords($profile->user->name)}}</p>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="text-gray-800 bi bi-pen" viewBox="0 0 16 16">
                                            <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001m-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708z"/>
                                            </svg> 
                                        </div>
                                </div>
                                <div>
                                    <p class="text-gray-600 text-sm">Email</p>
                                        <div class="flex items-center gap-5">
                                            <p class="text-gray-800">{{($profile->user->email)}}</p>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="text-gray-800 bi bi-pen" viewBox="0 0 16 16">
                                            <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001m-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708z"/>
                                            </svg> 
                                        </div>
                                </div>
                            </div>

                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <p class="text-gray-600 text-sm">Nomor HP</p>
                                        <div class="flex items-center gap-5">
                                            <p class="text-gray-800">{{($profile->phone_number)}}</p>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="text-gray-800 bi bi-pen" viewBox="0 0 16 16">
                                            <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001m-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708z"/>
                                            </svg> 
                                        </div>
                                </div>
                                <div>
                                    <p class="text-gray-600 text-sm">Alamat</p>
                                        <div class="flex items-center gap-5">
                                            <p class="text-gray-800">{{($profile->address)}}</p>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="text-gray-800 bi bi-pen" viewBox="0 0 16 16">
                                            <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001m-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708z"/>
                                            </svg> 
                                        </div>
                                </div>
                            </div>

                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <p class="text-gray-600 text-sm">Dibuat Pada:</p>
                                        <div class="flex items-center gap-5">
                                            <p class="text-gray-800">{{ \Carbon\Carbon::parse($profile->user->created_at)->translatedFormat('l, d F Y') }}</p>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="text-gray-800 bi bi-pen" viewBox="0 0 16 16">
                                            <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001m-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708z"/>
                                            </svg> 
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Edit Profile Button -->
                <div class="mt-6 flex justify-end">
                    <button 
                        @click="$dispatch('edit-profile')"
                        class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg transition-colors duration-200"
                    >
                        Edit Profile
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Profile Modal (Alpine.js) -->
    <div x-data="{ showModal: false }" @edit-profile.window="showModal = true">
        <div x-show="showModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50" x-transition>
            <div class="bg-dark-200 rounded-lg p-6 w-96 max-w-md mx-4">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-semibold text-white">Edit Profile</h3>
                    <button @click="showModal = false" class="text-gray-400 hover:text-white">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                <p class="text-gray-400 mb-4">Profile editing functionality would be implemented here.</p>
                <div class="flex justify-end space-x-2">
                    <button @click="showModal = false" class="bg-gray-600 hover:bg-gray-700 text-white px-4 py-2 rounded">
                        Cancel
                    </button>
                    <button @click="showModal = false" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
                        Save Changes
                    </button>
                </div>
            </div>
        </div>
    </div>
</body>
</html>