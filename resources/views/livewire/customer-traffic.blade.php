@php
        function formatBits($bits) {
            $bits = (int) $bits;

            if ($bits >= 1000000000) {
                return round($bits / 1000000000, 2) . ' Gbps';
            } elseif ($bits >= 1000000) {
                return round($bits / 1000000, 2) . ' Mbps';
            } elseif ($bits >= 1000) {
                return round($bits / 1000, 2) . ' Kbps';
            } else {
                return $bits . ' bps';
            }
        }
    @endphp
<table wire:poll.1s class="table-auto w-full">
                <!-- Table header -->
                <thead class="text-xs font-semibold uppercase text-gray-400 dark:text-gray-500 bg-gray-50 dark:bg-gray-700/50">
                    <tr>
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
                            <div class="font-semibold text-center">Download</div>
                        </th>
                        <th class="p-2 whitespace-nowrap">
                            <div class="font-semibold text-center">Upload</div>
                        </th>
                        <th class="p-2 whitespace-nowrap">
                            <div class="font-semibold text-center">Last Logout</div>
                        </th>
                        <th></th>
                    </tr>
                </thead>
                <!-- Table body -->
                <tbody id="traffic-table" class="text-sm divide-y divide-gray-100 dark:divide-gray-700/60">
                    @forelse ($datas as $customer)
                                <tr
                                    @class([
                                        'cursor-pointer hover:bg-gray-100 transition' => $customer['disabled'] == 'false',
                                        'bg-gray-100 text-gray-300' => $customer['disabled'] == 'true',
                                    ])
                                    @if ($customer['disabled'] == 'false')
                                        onclick="window.location.href='{{ route('monitor.traffic', $customer['.id']) }}'"
                                    @endif
                                >
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

                                    @foreach ($usage as $use)
                                        @php $used = $use; @endphp
                                        @foreach ($used as $use)
                                            @if($use['name'] == '<pppoe-'.$customer['name'].'>')
                                                <td class="p-2 whitespace-nowrap">
                                                    <div class="text-center">{{ formatBits($use['tx-bits-per-second']) }}</div>
                                                </td>
                                                <td class="p-2 whitespace-nowrap">
                                                    <div class="text-center">{{ formatBits($use['rx-bits-per-second']) }}</div>
                                                </td>
                                            @else
                                                <td class="p-2 whitespace-nowrap">
                                                    <div class="text-center">0</div>
                                                </td>
                                                <td class="p-2 whitespace-nowrap">
                                                    <div class="text-center">0</div>
                                                </td>
                                            @endif
                                        @endforeach
                                    @endforeach

                                    <td class="p-2 whitespace-nowrap">
                                        <div class="text-center">{{ ucfirst($customer['last-logged-out']) }}</div>
                                    </td>
                                </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="p-2 text-center text-gray-500">No customers found</td>
                        </tr>
                    @endforelse

                </tbody>
            </table>
