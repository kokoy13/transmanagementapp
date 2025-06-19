<x-app-layout>
    <div class="px-4 sm:px-6 lg:px-8 py-8 w-full max-w-9xl mx-auto">

        <!-- Dashboard actions -->
        <div class="sm:flex sm:justify-between sm:items-center mb-8">

            <!-- Left: Title -->
            <div class="mb-4 sm:mb-0">
                <h1 class="text-2xl md:text-3xl text-gray-800 dark:text-gray-100 font-bold">Dashboard</h1>
            </div>

            <!-- Right: Actions -->
            <div class="grid grid-flow-col sm:auto-cols-max justify-start sm:justify-end gap-2">

                <!-- Date Now -->
                <span class="font-semibold">{{ \Carbon\Carbon::now()->translatedFormat('l, d F Y') }}</span>
            </div>

        </div>

        <!-- Cards -->
        <div class="grid grid-cols-12 gap-6">

            <x-dashboard.dashboard-card-01 :countOrder='$countOrder'/>

            <x-dashboard.dashboard-card-02 :countPayment='$countPayment' />

            <x-dashboard.dashboard-card-03 />

            {{-- <!-- Bar chart (Direct vs Indirect) -->
            <x-dashboard.dashboard-card-04 />

            <!-- Line chart (Real Time Value) -->
            <x-dashboard.dashboard-card-05 /> --}}

            <x-dashboard.dashboard-card-06 :banners='$banners'/>

            <!-- Line chart (Sales Over Time) -->
            <x-dashboard.dashboard-card-08 :notification="$notification"/>

            <x-dashboard.dashboard-card-07 :content="$content"/>


        </div>

    </div>
</x-app-layout>
