
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Transnet Sumbar</title>
</head>
<body class="w-dvw h-dvh flex items-center relative">
    <div class="absolute top-5 left-5 z-20">
            <a href="/" class="px-3 py-1 flex items-center gap-1 bg-white rounded-full">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-left-fill" viewBox="0 0 16 16">
                    <path d="m3.86 8.753 5.482 4.796c.646.566 1.658.106 1.658-.753V3.204a1 1 0 0 0-1.659-.753l-5.48 4.796a1 1 0 0 0 0 1.506z"/>
                </svg>
                <span class="text-gray-900">Back to Home</span>
            </a>
        </div>
    <div class="flex w-full overflow-hidden bg-white rounded-lg shadow-lg h-full relative">
        @if (session('error'))
            <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 3000)" x-show="show" x-transition class="flex items-center p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg absolute z-[99] right-1/2 translate-x-1/2" role="alert">
                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11V7a1 1 0 10-2 0v2a1 1 0 001 1h1a1 1 0 100-2h-1zm0 4a1 1 0 10-2 0v2a1 1 0 002 0v-2z" clip-rule="evenodd"></path>
                </svg>
                <span class="sr-only">Error</span>
                <div>
                    {{ session('error') }}
                </div>
            </div>
        @endif
    <div class="hidden bg-cover lg:block lg:w-1/2" style="background-image: url('/assets/img/hero-s.png');"></div>

    <form method="post" action="/sign-in" class="w-full flex flex-col justify-center gap-5 px-20 py-8 lg:w-1/2">
        @csrf
        
        <div class="flex justify-center mx-auto">
            <img class="w-auto h-7 sm:h-8" src="/assets/img/logo.png" alt="">
        </div>

        <p class="mt-3 text-2xl text-center italic text-gray-600">
            "Connectivity for better future"
        </p>
        <div class="mt-4">
            <label class="block mb-2 text-sm font-medium text-gray-600" for="LoggingEmailAddress">Email Address</label>
            <input name="email" id="LoggingEmailAddress" class="block w-full px-4 py-2 text-gray-700 bg-white border rounded-lg focus:border-blue-400 focus:ring-opacity-40 focus:outline-none focus:ring focus:ring-blue-300" type="email" />
        </div>

        <div>
            <div class="flex justify-between">
                <label class="block mb-2 text-sm font-medium text-gray-600" for="loggingPassword">Password</label>
            </div>

            <input name="password" id="loggingPassword" class="block w-full px-4 py-2 text-gray-700 bg-white border rounded-lg focus:border-blue-400 focus:ring-opacity-40 focus:outline-none focus:ring focus:ring-blue-300" type="password" />
        </div>
        <a href="#" class="text-xs text-gray-500 hover:underline">Forget Password?</a>
        <div>
            <button class="w-full px-6 py-3 text-sm font-medium tracking-wide text-white capitalize transition-colors duration-300 transform bg-gray-800 rounded-lg hover:bg-gray-700 focus:outline-none focus:ring focus:ring-gray-300 focus:ring-opacity-50" type="submit" name="submit">
                Sign In
            </button>
        </div>

        <div class="flex items-center justify-between mt-4">
          <span class="w-full border-b"></span>

          <span class="text-xs text-nowrap px-5 text-center text-gray-500 uppercase">or login
              with</span>

          <span class="w-full border-b"></span>
        </div>

        <div class="flex justify-between gap-5">
            {{-- Google --}}
            <a href="{{route('auth.redirect','google' )}}" class="flex w-full  px-8 py-3 gap-2 items-center justify-center mt-4 text-gray-600 transition-colors duration-300 transform border rounded-lg hover:bg-gray-50">
                <div class="">
                    <svg class="w-6 h-6" viewBox="0 0 40 40">
                        <path d="M36.3425 16.7358H35V16.6667H20V23.3333H29.4192C28.045 27.2142 24.3525 30 20 30C14.4775 30 10 25.5225 10 20C10 14.4775 14.4775 9.99999 20 9.99999C22.5492 9.99999 24.8683 10.9617 26.6342 12.5325L31.3483 7.81833C28.3717 5.04416 24.39 3.33333 20 3.33333C10.7958 3.33333 3.33335 10.7958 3.33335 20C3.33335 29.2042 10.7958 36.6667 20 36.6667C29.2042 36.6667 36.6667 29.2042 36.6667 20C36.6667 18.8825 36.5517 17.7917 36.3425 16.7358Z" fill="#FFC107" />
                        <path d="M5.25497 12.2425L10.7308 16.2583C12.2125 12.59 15.8008 9.99999 20 9.99999C22.5491 9.99999 24.8683 10.9617 26.6341 12.5325L31.3483 7.81833C28.3716 5.04416 24.39 3.33333 20 3.33333C13.5983 3.33333 8.04663 6.94749 5.25497 12.2425Z" fill="#FF3D00" />
                        <path d="M20 36.6667C24.305 36.6667 28.2167 35.0192 31.1742 32.34L26.0159 27.975C24.3425 29.2425 22.2625 30 20 30C15.665 30 11.9842 27.2359 10.5975 23.3784L5.16254 27.5659C7.92087 32.9634 13.5225 36.6667 20 36.6667Z" fill="#4CAF50" />
                        <path d="M36.3425 16.7358H35V16.6667H20V23.3333H29.4192C28.7592 25.1975 27.56 26.805 26.0133 27.9758C26.0142 27.975 26.015 27.975 26.0158 27.9742L31.1742 32.3392C30.8092 32.6708 36.6667 28.3333 36.6667 20C36.6667 18.8825 36.5517 17.7917 36.3425 16.7358Z" fill="#1976D2" />
                    </svg>
                </div>
                <span class="font-bold text-center">Google</span>
            </a>

            {{-- facebook --}}
            <a href="{{route('auth.redirect', 'facebook')}}" class="flex w-full px-8 py-3 gap-2 items-center justify-center mt-4 text-gray-600 transition-colors duration-300 transform border rounded-lg hover:bg-gray-50  ">
                <div class="">
                    <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 48 48">
                        <linearGradient id="Ld6sqrtcxMyckEl6xeDdMa_uLWV5A9vXIPu_gr1" x1="9.993" x2="40.615" y1="9.993" y2="40.615" gradientUnits="userSpaceOnUse"><stop offset="0" stop-color="#2aa4f4"></stop><stop offset="1" stop-color="#007ad9"></stop></linearGradient><path fill="url(#Ld6sqrtcxMyckEl6xeDdMa_uLWV5A9vXIPu_gr1)" d="M24,4C12.954,4,4,12.954,4,24s8.954,20,20,20s20-8.954,20-20S35.046,4,24,4z"></path><path fill="#fff" d="M26.707,29.301h5.176l0.813-5.258h-5.989v-2.874c0-2.184,0.714-4.121,2.757-4.121h3.283V12.46 c-0.577-0.078-1.797-0.248-4.102-0.248c-4.814,0-7.636,2.542-7.636,8.334v3.498H16.06v5.258h4.948v14.452 C21.988,43.9,22.981,44,24,44c0.921,0,1.82-0.084,2.707-0.204V29.301z"></path>
                    </svg>
                </div>
                <span class="font-bold text-center">Facebook</span>
            </a>
        </div>

        <div class="flex justify-center mt-4">

            <a href="sign-up" class="text-sm text-gray-500">Don't have an account? <span class="underline">create account</span></a>

        </div>
    </form>
</div>
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.14.8/dist/cdn.min.js"></script>
</body>
</html>
