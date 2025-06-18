<div class="flex flex-col col-span-full sm:col-span-6 xl:col-span-4 bg-white dark:bg-gray-800 shadow-xs rounded-xl">
    <div class="px-5 py-10 flex flex-col h-full justify-between gap-3">
        <header class="flex justify-between items-start mb-2">
            <h2 class="text-2xl font-extrabold text-gray-800 dark:text-gray-100">Payment</h2>
            <svg xmlns="http://www.w3.org/2000/svg" class="mr-5 hover:cursor-pointer hover:scale-125 transition-transform ease-out" width="20" height="20" fill="currentColor" class="bi bi-arrow-up-right" viewBox="0 0 16 16" onclick="window.location.href='{{ route('payments') }}'">
                <path fill-rule="evenodd" d="M14 2.5a.5.5 0 0 0-.5-.5h-6a.5.5 0 0 0 0 1h4.793L2.146 13.146a.5.5 0 0 0 .708.708L13 3.707V8.5a.5.5 0 0 0 1 0z"/>
            </svg>
        </header>
        <div class="flex items-start">
            <div class="text-3xl mb-5 font-medium text-red-700 px-[14px] bg-red-500/20 rounded-full">{{ $countPayment }}</div>
        </div>
        <div class="text-xs font-semibold text-gray-400 dark:text-gray-500 uppercase mb-1">All of the payments</div>
    </div>
</div>
