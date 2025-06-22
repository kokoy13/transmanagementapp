<x-app-layout>
    <form action="{{ route('customer.action') }}" method="post" class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">
        <div class="sm:flex sm:justify-between sm:items-center mb-8">
                @csrf
                <!-- Left: Title -->
                <div class="mb-4 sm:mb-0">
                    <h1 class="text-2xl md:text-3xl text-gray-800 dark:text-gray-100 font-bold">Customers Traffic</h1>
                </div>

                <!-- Right: Actions -->
                <div class="grid grid-flow-col sm:auto-cols-max justify-start sm:justify-end gap-5">
                    <!-- Filter button -->
                    <x-dropdown-filter align="right" />

                </div>

        </div>
        <x-table-txrx></x-table-txrx>
    </form>
</x-app-layout>
