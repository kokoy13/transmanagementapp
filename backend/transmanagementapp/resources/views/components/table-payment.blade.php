@props(['payments'])
<div class="col-span-full xl:col-span-6 bg-white dark:bg-gray-800 shadow-xs rounded-xl">
    <header class="px-5 py-4 border-b border-gray-100 dark:border-gray-700/60">
        <h2 class="font-semibold text-gray-800 dark:text-gray-100">Payment</h2>
    </header>
    <div class="p-3">

        <!-- Table -->
        <div class="overflow-x-auto">
            <table class="table-auto w-full">
                <!-- Table header -->
                <thead class="text-xs font-semibold uppercase text-gray-400 dark:text-gray-500 bg-gray-50 dark:bg-gray-700/50">
                    <tr>
                        <th class="p-2 whitespace-nowrap">
                            <div class="font-semibold text-left">Order ID</div>
                        </th>
                        <th class="p-2 whitespace-nowrap">
                            <div class="font-semibold text-left">Nama</div>
                        </th>
                        <th class="p-2 whitespace-nowrap">
                            <div class="font-semibold text-center">Tanggal Payment</div>
                        </th>
                        <th class="p-2 whitespace-nowrap">
                            <div class="font-semibold text-center"> Jumlah</div>
                        </th>
                        <th class="p-2 whitespace-nowrap">
                            <div class="font-semibold text-left">Status</div>
                        </th>
                        <th class="p-2 whitespace-nowrap">
                            <div class="font-semibold text-left">Bukti Pembayaran</div>
                        </th>
                        <th class="p-2 whitespace-nowrap">
                            <div class="font-semibold text-center">Dibuat Pada</div>
                        </th>
                        <th class="p-2 whitespace-nowrap">
                            <div class="font-semibold text-center"></div>
                        </th>
                    </tr>
                </thead>
                <!-- Table body -->
               <tbody class="text-sm divide-y divide-gray-100 dark:divide-gray-700/60">
                    @forelse ($payments as $payment)
                        <tr>
                            <td class="p-2 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="text-gray-800 dark:text-gray-200">
                                        <span class="text-sm opacity-50">{{ $payment->order_id }}</span>
                                    </div>
                                </div>
                            </td>
                            <td class="p-2 whitespace-nowrap">
                                <div class="text-left text-wrap">{{ $payment->order->customer->full_name ?? 'N/A' }}</div>
                            </td>
                            <td class="p-2 whitespace-nowrap">
                                <div class="text-center text-wrap ">{{ $payment->payment_date ? \Carbon\Carbon::parse($payment->payment_date)->format('d/m/Y') : 'N/A' }}</div>
                            </td>
                            <td class="p-2 whitespace-nowrap">
                                <div class="text-left font-medium text-green-500">Rp {{ number_format($payment->amount, 2, ',', '.') }}</div>
                            </td>
                            <td class="p-2 whitespace-nowrap">
                                <div class="text-leaf">{{ ucwords($payment->payment_status) ?? 'N/A' }}</div>
                            </td>
                            <td class="p-2 whitespace-nowrap">
                                <a href="{{ Storage::url('payments/'.$payment->transcation_reference) }}" target="_blank" class="text-left underline text-blue-500 hover:no-underline">Bukti Pembayaran</a>
                            </td>
                            <td class="p-2 whitespace-nowrap">
                                <div class="text-left">{{ $payment->created_at ? \Carbon\Carbon::parse($payment->created_at)->format('d/m/Y H:i') : 'N/A' }}</div>
                            </td>
                            <td class="flex gap-2">
                                                <a href="{{ route('payment.edit',   $payment->id) }}" class="p-2 transition-all ease-in duration-300 rounded-full hover:bg-gray-800 border-gray-100 hover:text-white">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen" viewBox="0 0 16 16">
                                                        <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001m-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708z"/>
                                                    </svg>
                                                </a>
                                                <a href="{{ route('payment.delete', $payment->id) }}" class="p-2 transition-all ease-in duration-300 rounded-full hover:bg-gray-800 border-gray-100 hover:text-white">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                                                        <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                                                    </svg>
                                                </a>
                                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="9" class="p-2 text-center text-gray-500 dark:text-gray-400">Tidak ada data pembayaran.</td>
                        </tr>
                    @endforelse

                </tbody>
            </table>

        </div>

    </div>
</div>
