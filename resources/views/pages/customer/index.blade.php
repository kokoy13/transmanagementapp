<x-app-layout>
    <form action="{{ route('customer.action') }}" method="post" class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">
        <div class="sm:flex sm:justify-between sm:items-center mb-8">
                @csrf
                <!-- Left: Title -->
                <div class="mb-4 sm:mb-0">
                    <h1 class="text-2xl md:text-3xl text-gray-800 dark:text-gray-100 font-bold">Customers</h1>
                </div>

                <!-- Right: Actions -->
                <div class="grid grid-flow-col sm:auto-cols-max justify-start sm:justify-end gap-5">
                    <!-- Add view button -->
                    <button type="submit" name="action" value="enable" class="btn bg-green-700 text-gray-100 hover:bg-green-800 border-0">
                        <span class="max-xs:sr-only">Enable</span>
                    </button>
                    <!-- Add view button -->
                    <button type="submit" name="action" value="disable" class="btn bg-red-700 text-gray-100 hover:bg-red-800 border-0">
                        <span class="max-xs:sr-only">Disable</span>
                    </button>
                    <x-dropdown-filter align="right" />


                    <!-- Filter button -->

                </div>

        </div>
        <x-table-customer :customers="$customers"></x-table-customer>
    </form>
</x-app-layout>
