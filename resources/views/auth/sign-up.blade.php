<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="/css/app.css">
    <title>Transnet Sumbar - Sign Up</title>
</head>
<body class="bg-gray-50">
    <div class="min-h-screen flex items-center justify-center p-4 sm:p-6 lg:p-8">
        <!-- Back button -->
        <div class="fixed top-5 left-5 z-20">
            <a href="/" class="group px-4 py-2 flex items-center gap-2 bg-white rounded-full shadow-md transition-all hover:shadow-lg">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="text-gray-700 group-hover:text-blue-600 transition-colors" viewBox="0 0 16 16">
                    <path d="m3.86 8.753 5.482 4.796c.646.566 1.658.106 1.658-.753V3.204a1 1 0 0 0-1.659-.753l-5.48 4.796a1 1 0 0 0 0 1.506z"/>
                </svg>
                <span class="text-gray-700 group-hover:text-blue-600 font-medium transition-colors">Back to Home</span>
            </a>
        </div>

        <!-- Main container -->
        <div class="w-full max-w-6xl overflow-hidden bg-white rounded-2xl shadow-xl">
            <!-- Error message -->
            <div x-data="{ show: {{ session('error') ? 'true' : 'false' }} }" 
                 x-init="setTimeout(() => show = false, 3000)" 
                 x-show="show" 
                 x-transition:enter="transition ease-out duration-300"
                 x-transition:enter-start="opacity-0 transform -translate-y-4"
                 x-transition:enter-end="opacity-100 transform translate-y-0"
                 x-transition:leave="transition ease-in duration-300"
                 x-transition:leave-start="opacity-100 transform translate-y-0"
                 x-transition:leave-end="opacity-0 transform -translate-y-4"
                 class="fixed top-5 left-1/2 transform -translate-x-1/2 z-50 flex items-center p-4 text-sm text-red-700 bg-red-100 rounded-lg shadow-md" 
                 role="alert">
                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11V7a1 1 0 10-2 0v2a1 1 0 001 1h1a1 1 0 100-2h-1zm0 4a1 1 0 10-2 0v2a1 1 0 002 0v-2z" clip-rule="evenodd"></path>
                </svg>
                <span class="sr-only">Error</span>
                <div>
                    {{ session('error') }}
                </div>
            </div>

            <div class="flex flex-col md:flex-row">
                <!-- Left side - Image -->
                <div class="relative h-48 md:h-auto md:w-1/2 bg-gradient-to-br from-blue-500 to-indigo-600">
                    <div class="absolute inset-0 bg-cover bg-center opacity-80" style="background-image: url('/assets/img/hero4.jpeg');"></div>
                    <div class="relative h-full flex flex-col justify-center items-center p-8 text-white">
                        <div class="max-w-md text-center">
                            <h1 class="text-3xl font-bold mb-4">Join Our Network</h1>
                            <p class="text-lg opacity-90">Create an account to access all our services and connect with the future.</p>
                        </div>
                    </div>
                </div>

                <!-- Right side - Form -->
                <div class="w-full md:w-1/2 py-12 px-6 sm:px-10 lg:px-16">
                    <form method="post" action="/sign-up" class="space-y-6" x-data="{ 
                        name: '',
                        email: '',
                        password: '',
                        password2: '',
                        showPassword: false,
                        showPassword2: false,
                        passwordsMatch() { return this.password === this.password2 || this.password2 === '' }
                    }">
                        @csrf
                        
                        <div class="flex justify-center mb-6">
                            <img class="w-auto h-10" src="/assets/img/logo.png" alt="Transnet Sumbar Logo">
                        </div>

                        <h2 class="text-2xl font-bold text-center text-gray-800 mb-8">
                            Create Your Account
                        </h2>

                        <!-- Username input -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1" for="username">Username</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                </div>
                                <input name="name" id="username" type="text" placeholder="Enter your username" 
                                       x-model="name"
                                       class="pl-10 block w-full px-4 py-3 text-gray-700 bg-gray-50 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors" />
                            </div>
                        </div>

                        <!-- Email input -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1" for="email">Email Address</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                    </svg>
                                </div>
                                <input name="email" id="email" type="email" placeholder="your@email.com" 
                                       x-model="email"
                                       class="pl-10 block w-full px-4 py-3 text-gray-700 bg-gray-50 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors" />
                            </div>
                        </div>

                        <!-- Password input -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1" for="password">Password</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                    </svg>
                                </div>
                                <input name="password" id="password" 
                                       :type="showPassword ? 'text' : 'password'" 
                                       placeholder="••••••••" 
                                       x-model="password"
                                       class="pl-10 block w-full px-4 py-3 text-gray-700 bg-gray-50 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors" />
                                <div class="absolute inset-y-0 right-0 pr-3 flex items-center">
                                    <button type="button" @click="showPassword = !showPassword" class="text-gray-400 hover:text-gray-600 focus:outline-none">
                                        <svg x-show="!showPassword" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                        </svg>
                                        <svg x-show="showPassword" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                            <div class="mt-1">
                                <div class="flex gap-1">
                                    <div class="h-1 flex-1 rounded-full" :class="password.length > 0 ? 'bg-red-400' : 'bg-gray-200'"></div>
                                    <div class="h-1 flex-1 rounded-full" :class="password.length >= 6 ? 'bg-orange-400' : 'bg-gray-200'"></div>
                                    <div class="h-1 flex-1 rounded-full" :class="password.length >= 8 ? 'bg-yellow-400' : 'bg-gray-200'"></div>
                                    <div class="h-1 flex-1 rounded-full" :class="password.length >= 10 ? 'bg-green-400' : 'bg-gray-200'"></div>
                                </div>
                                <p class="text-xs text-gray-500 mt-1">Use at least 8 characters with a mix of letters, numbers & symbols</p>
                            </div>
                        </div>

                        <!-- Confirm Password input -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1" for="password2">Confirm Password</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                    </svg>
                                </div>
                                <input name="password2" id="password2" 
                                       :type="showPassword2 ? 'text' : 'password'" 
                                       placeholder="••••••••" 
                                       x-model="password2"
                                       :class="{ 'border-red-500 focus:border-red-500 focus:ring-red-500': !passwordsMatch() && password2 !== '' }"
                                       class="pl-10 block w-full px-4 py-3 text-gray-700 bg-gray-50 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors" />
                                <div class="absolute inset-y-0 right-0 pr-3 flex items-center">
                                    <button type="button" @click="showPassword2 = !showPassword2" class="text-gray-400 hover:text-gray-600 focus:outline-none">
                                        <svg x-show="!showPassword2" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                        </svg>
                                        <svg x-show="showPassword2" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                            <p x-show="!passwordsMatch() && password2 !== ''" class="text-xs text-red-500 mt-1">Passwords do not match</p>
                        </div>

                        <!-- Terms and conditions -->
                        <div class="flex items-start">
                            <div class="flex items-center h-5">
                                <input id="terms" name="terms" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                            </div>
                            <div class="ml-3 text-sm">
                                <label for="terms" class="text-gray-600">I agree to the <a href="#" class="text-blue-600 hover:underline">Terms of Service</a> and <a href="#" class="text-blue-600 hover:underline">Privacy Policy</a></label>
                            </div>
                        </div>

                        <!-- Sign up button -->
                        <div>
                            <button type="submit" name="submit" 
                                    class="w-full px-6 py-3 text-sm font-medium tracking-wide text-white capitalize transition-all duration-300 transform bg-blue-600 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 shadow-md hover:shadow-lg">
                                Create Account
                            </button>
                        </div>

                        <!-- Divider -->
                        <div class="flex items-center my-4">
                            <div class="flex-grow border-t border-gray-200"></div>
                        </div>

                        <!-- Sign in link -->
                        <div class="text-center">
                            <a href="sign-in" class="text-sm text-gray-600 hover:text-blue-600 transition-colors">
                                Already have an account? <span class="font-medium text-blue-600 hover:underline">Sign in</span>
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.14.8/dist/cdn.min.js"></script>
</body>
</html>