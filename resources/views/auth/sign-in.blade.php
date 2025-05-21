<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Transnet Sumbar</title>
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
                    <div class="absolute inset-0 bg-cover bg-center opacity-80" style="background-image: url('/assets/img/hero-s.png');"></div>
                    <div class="relative h-full flex flex-col justify-center items-center p-8 text-white">
                        <div class="max-w-md text-center">
                            <h1 class="text-3xl font-bold mb-4">Welcome Back</h1>
                            <p class="text-lg opacity-90">Sign in to access your account and connect with our services.</p>
                        </div>
                    </div>
                </div>

                <!-- Right side - Form -->
                <div class="w-full md:w-1/2 py-12 px-6 sm:px-10 lg:px-16">
                    <form method="post" action="/sign-in" class="space-y-6">
                        @csrf
                        
                        <div class="flex justify-center mb-6">
                            <img class="w-auto h-10" src="/assets/img/logo.png" alt="Transnet Sumbar Logo">
                        </div>

                        <p class="text-xl text-center italic text-gray-600 mb-8">
                            "Connectivity for better future"
                        </p>

                        <!-- Email input -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1" for="LoggingEmailAddress">Email Address</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                                    </svg>
                                </div>
                                <input name="email" id="LoggingEmailAddress" class="pl-10 block w-full px-4 py-3 text-gray-700 bg-gray-50 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors" type="email" placeholder="your@email.com" />
                            </div>
                        </div>

                        <!-- Password input -->
                        <div>
                            <div class="flex justify-between items-center mb-1">
                                <label class="block text-sm font-medium text-gray-700" for="loggingPassword">Password</label>
                                <a href="#" class="text-xs text-blue-600 hover:text-blue-800 hover:underline transition-colors">Forgot Password?</a>
                            </div>
                            <div class="relative" x-data="{ showPassword: false }">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                    </svg>
                                </div>
                                <input name="password" id="loggingPassword" 
                                       :type="showPassword ? 'text' : 'password'" 
                                       class="pl-10 block w-full px-4 py-3 text-gray-700 bg-gray-50 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors" 
                                       placeholder="••••••••" />
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
                        </div>

                        <!-- Sign in button -->
                        <div>
                            <button class="w-full px-6 py-3 text-sm font-medium tracking-wide text-white capitalize transition-all duration-300 transform bg-blue-600 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 shadow-md hover:shadow-lg" type="submit" name="submit">
                                Sign In
                            </button>
                        </div>

                        <!-- Divider -->
                        <div class="flex items-center my-6">
                            <div class="flex-grow border-t border-gray-200"></div>
                            <span class="flex-shrink mx-4 text-sm text-gray-500">or continue with</span>
                            <div class="flex-grow border-t border-gray-200"></div>
                        </div>

                        <!-- Social login buttons -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <!-- Google -->
                            <a href="{{route('auth.redirect','google' )}}" class="flex items-center justify-center px-4 py-3 space-x-2 transition-colors duration-300 border border-gray-300 rounded-lg hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-gray-400 focus:ring-opacity-50">
                                <svg class="w-5 h-5" viewBox="0 0 40 40">
                                    <path d="M36.3425 16.7358H35V16.6667H20V23.3333H29.4192C28.045 27.2142 24.3525 30 20 30C14.4775 30 10 25.5225 10 20C10 14.4775 14.4775 9.99999 20 9.99999C22.5492 9.99999 24.8683 10.9617 26.6342 12.5325L31.3483 7.81833C28.3717 5.04416 24.39 3.33333 20 3.33333C10.7958 3.33333 3.33335 10.7958 3.33335 20C3.33335 29.2042 10.7958 36.6667 20 36.6667C29.2042 36.6667 36.6667 29.2042 36.6667 20C36.6667 18.8825 36.5517 17.7917 36.3425 16.7358Z" fill="#FFC107" />
                                    <path d="M5.25497 12.2425L10.7308 16.2583C12.2125 12.59 15.8008 9.99999 20 9.99999C22.5491 9.99999 24.8683 10.9617 26.6341 12.5325L31.3483 7.81833C28.3716 5.04416 24.39 3.33333 20 3.33333C13.5983 3.33333 8.04663 6.94749 5.25497 12.2425Z" fill="#FF3D00" />
                                    <path d="M20 36.6667C24.305 36.6667 28.2167 35.0192 31.1742 32.34L26.0159 27.975C24.3425 29.2425 22.2625 30 20 30C15.665 30 11.9842 27.2359 10.5975 23.3784L5.16254 27.5659C7.92087 32.9634 13.5225 36.6667 20 36.6667Z" fill="#4CAF50" />
                                    <path d="M36.3425 16.7358H35V16.6667H20V23.3333H29.4192C28.7592 25.1975 27.56 26.805 26.0133 27.9758C26.0142 27.975 26.015 27.975 26.0158 27.9742L31.1742 32.3392C30.8092 32.6708 36.6667 28.3333 36.6667 20C36.6667 18.8825 36.5517 17.7917 36.3425 16.7358Z" fill="#1976D2" />
                                </svg>
                                <span class="font-medium">Google</span>
                            </a>

                            <!-- Facebook -->
                            <a href="{{route('auth.redirect', 'facebook')}}" class="flex items-center justify-center px-4 py-3 space-x-2 transition-colors duration-300 border border-gray-300 rounded-lg hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-gray-400 focus:ring-opacity-50">
                                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48">
                                    <linearGradient id="Ld6sqrtcxMyckEl6xeDdMa_uLWV5A9vXIPu_gr1" x1="9.993" x2="40.615" y1="9.993" y2="40.615" gradientUnits="userSpaceOnUse"><stop offset="0" stop-color="#2aa4f4"></stop><stop offset="1" stop-color="#007ad9"></stop></linearGradient><path fill="url(#Ld6sqrtcxMyckEl6xeDdMa_uLWV5A9vXIPu_gr1)" d="M24,4C12.954,4,4,12.954,4,24s8.954,20,20,20s20-8.954,20-20S35.046,4,24,4z"></path><path fill="#fff" d="M26.707,29.301h5.176l0.813-5.258h-5.989v-2.874c0-2.184,0.714-4.121,2.757-4.121h3.283V12.46 c-0.577-0.078-1.797-0.248-4.102-0.248c-4.814,0-7.636,2.542-7.636,8.334v3.498H16.06v5.258h4.948v14.452 C21.988,43.9,22.981,44,24,44c0.921,0,1.82-0.084,2.707-0.204V29.301z"></path>
                                </svg>
                                <span class="font-medium">Facebook</span>
                            </a>
                        </div>

                        <!-- Sign up link -->
                        <div class="text-center mt-8">
                            <a href="sign-up" class="text-sm text-gray-600 hover:text-blue-600 transition-colors">
                                Don't have an account? <span class="font-medium text-blue-600 hover:underline">Create account</span>
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