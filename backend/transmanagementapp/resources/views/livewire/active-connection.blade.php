<!-- Table -->
        <div wire:poll.1s='loadData' class="overflow-x-auto">
            <table class="table-auto w-full">
                <!-- Table header -->
                <thead class="text-xs font-semibold uppercase text-gray-400 dark:text-gray-500 bg-gray-50 dark:bg-gray-700/50">
                    <tr>
                        <th class="p-2 whitespace-nowrap">
                            <div class="font-semibold text-left">Customer ID</div>
                        </th>
                        <th class="p-2 whitespace-nowrap">
                            <div class="font-semibold text-left">Name</div>
                        </th>
                        <th class="p-2 whitespace-nowrap">
                            <div class="font-semibold">Uptime</div>
                        </th>
                    </tr>
                </thead>
                <!-- Table body -->
                <tbody class="text-sm divide-y divide-gray-100 dark:divide-gray-700/60">
                    @forelse ($data as $customer)
                                <tr class="w-full">
                                    <td class="p-2 whitespace-nowrap">
                                        <div class="text-left">{{ $customer['name'] }}</div>
                                    </td>
                                    <td class="p-2 whitespace-nowrap">
                                        <div class="text-left">{{ $customer['user'] }}</div>
                                    </td>
                                    <td class="p-2 whitespace-nowrap w-1/3">
                                        <div class="text-center">{{ $customer['uptime'] }}</div>
                                    </td>
                                </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="p-2 text-center text-gray-500">No customers found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

        </div>
