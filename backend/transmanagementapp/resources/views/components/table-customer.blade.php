@props(['customers', 'state'])
<div class="col-span-full xl:col-span-6 bg-white dark:bg-gray-800 shadow-xs rounded-xl">
    <header class="px-5 py-4 border-b border-gray-100 dark:border-gray-700/60">
        <h2 class="font-semibold text-gray-800 dark:text-gray-100">Customers</h2>
    </header>
    <div class="p-3">

        <!-- Table -->
        <div class="overflow-x-auto">
            <table class="table-auto w-full">
                <!-- Table header -->
                <thead class="text-xs font-semibold uppercase text-gray-400 dark:text-gray-500 bg-gray-50 dark:bg-gray-700/50">
                    <tr>
                        <th></th>
                        <th class="p-2 whitespace-nowrap">
                            <div class="font-semibold text-left">ID</div>
                        </th>
                        <th class="p-2 whitespace-nowrap">
                            <div class="font-semibold text-left">Name</div>
                        </th>
                        <th class="p-2 whitespace-nowrap">
                            <div class="font-semibold text-left">Packet</div>
                        </th>
                        <th class="p-2 whitespace-nowrap">
                            <div class="font-semibold text-center">Bandwidth</div>
                        </th>
                        <th class="p-2 whitespace-nowrap">
                            <div class="font-semibold text-center">Last Logout</div>
                        </th>
                        <th class="p-2 whitespace-nowrap">
                            <div class="font-semibold text-center">State</div>
                        </th>
                    </tr>
                </thead>
                <!-- Table body -->
                <tbody class="text-sm divide-y divide-gray-100 dark:divide-gray-700/60">
                    @forelse ($customers as $customer)
                            <tr class="@if($customer['disabled'] == 'true') bg-gray-100 text-gray-300 @endif">
                                    <td>
                                        <input type="checkbox" class="ml-3" name="selected_ids[]" value="{{ $customer['.id'] }}">
                                    </td>
                                    <td class="p-2 whitespace-nowrap">
                                        <div class="text-left">{{ $customer['name'] }}</div>
                                    </td>
                                    <td class="p-2 whitespace-nowrap">
                                        <div class="text-left">{{ $customer['comment'] }}</div>
                                    </td>
                                    @php
                                        $explode = explode('-', $customer['profile']);
                                        $packet = $explode[0];
                                        $bandwidth = $explode[1];
                                    @endphp
                                    <td class="p-2 whitespace-nowrap">
                                        <div class="text-left">{{ $packet }}</div>
                                    </td>
                                    <td class="p-2 whitespace-nowrap">
                                        <div class="text-center">{{ $bandwidth }}</div>
                                    </td>
                                    <td class="p-2 whitespace-nowrap">
                                        <div class="text-center">{{ ucfirst($customer['last-logged-out'] )}}</div>
                                    </td>
                                    @foreach ($state as $stat)
                                        @if($customer['name'] == $stat['user'] && $stat['running'] == 'true')
                                            <td class="p-2 whitespace-nowrap">
                                                <div class="text-center bg-green-500/20 p-1 rounded-lg">
                                                    <span class="text-green-500 font-semibold">Up</span>
                                                </div>
                                            </td>
                                        @else
                                            <td class="p-2 whitespace-nowrap">
                                                <div class="text-center bg-red-500/20 p-1 rounded-lg">
                                                    <span class="text-red-500 font-semibold">Down</span>
                                                </div>
                                            </td>
                                        @endif
                                    @endforeach
                                </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="p-2 text-center text-gray-500">No customers found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

        </div>

    </div>
</div>
