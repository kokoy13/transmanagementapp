<x-layouts.order-layout :title="'Check Order'">
<div class="bg-gray-50 mt-20">
    <div class="min-h-screen">
        <!-- Header -->
        <header class="bg-white shadow-sm border-b border-gray-200">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between items-center py-6">
                    <div>
                        <h1 class="text-2xl font-bold text-gray-900">Order Management</h1>
                        <p class="text-sm text-gray-600">Lihat dan pantau semua order anda</p>
                    </div>
                    <button class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg font-medium transition-colors duration-200" onclick="window.location.href='/packets'">
                        <i class="fas fa-plus mr-2"></i>New Order
                    </button>
                </div>
            </div>
        </header>

        <!-- Filters and Search -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
            <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6 mb-6">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                    <!-- Search -->
                    <form action="{{ route('order.search') }}" method="post" class="md:col-span-2">
                        @csrf
                        <label class="block text-sm font-medium text-gray-700 mb-2">Search Orders</label>
                        <div class="relative">
                            <input
                                type="text"
                                name="keyword"
                                placeholder="Search by Order ID, Order Date, or Bandwidth..."
                                class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                            >
                            <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Orders Table -->
            <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
                <div class="px-6 py-4 border-b border-gray-200">
                    <div class="flex justify-between items-center">
                        <h2 class="text-lg font-semibold text-gray-900">
                            Orders (<span>{{ $orderCount }}</span>)
                        </h2>
                    </div>
                </div>

                <!-- Desktop Table -->
                <div class="hidden lg:block overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Order ID
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Order Date
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Status
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Installation Address
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Package
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Bandwidth
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                                @forelse ($orders as $order)
                                    <tr class="hover:bg-gray-50">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                            <span">{{ $order->id }}</span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            <span>{{ $order->order_date }}</span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span
                                                class="
                                                @if($order->status == 'pending') bg-amber-200 text-amber-500 border-amber-500
                                                @elseif($order->status == 'confirmed') bg-blue-200 text-blue-500 border-blue-500
                                                @elseif($order->status == 'installing') bg-indigo-200 text-indigo-500 border-indigo-500
                                                @elseif($order->status == 'completed') bg-green-200 text-green-500 border-green-500
                                                @else bg-red-200 text-red-500 border-red-500 @endif
                                                inline-flex px-3 py-2 text-xs font-semibold rounded border"
                                            >{{ Str::ucfirst($order->status) }}</span>
                                        </td>
                                        <td class="px-6 py-4 text-sm text-gray-500 max-w-xs truncate">
                                            <span>{{ $order->installation_address }}</span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            <span>{{ $order->packet->name }}</span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            <span>{{ $order->packet->bandwidth }} Mbps</span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                            {{-- View --}}
                                            <div class="flex space-x-2 gap-2">
                                                <div x-data="{modalIsOpen: false}">
                                                    <button x-on:click="modalIsOpen = true" type="button" class="whitespace-nowrap px-4 py-2 text-center text-sm font-medium tracking-wide transition hover:opacity-75 focus:outline-none active:opacity-100">
                                                        <i class="fas fa-eye"></i>
                                                    </button>
                                                    <div x-cloak x-show="modalIsOpen" x-transition.opacity.duration.200ms x-trap.inert.noscroll="modalIsOpen" x-on:keydown.esc.window="modalIsOpen = false" x-on:click.self="modalIsOpen = false" class="fixed inset-0 z-30 flex w-full items-center justify-center bg-black/20 p-4 pb-8 backdrop-blur-md lg:p-8" role="dialog" aria-modal="true" aria-labelledby="defaultModalTitle">
                                                        <!-- Modal Dialog -->
                                                        <div x-show="modalIsOpen" x-transition:enter="transition ease-out duration-200 delay-100 motion-reduce:transition-opacity" x-transition:enter-start="opacity-0 scale-50" x-transition:enter-end="opacity-100 scale-100" class="flex max-w-lg flex-col gap-4 overflow-hidden rounded-radius border border-outline bg-surface text-on-surface min-w-lg">
                                                            <!-- Dialog Header -->
                                                            <div class="flex items-center justify-between border-b border-outline bg-surface-alt/60 p-4">
                                                                <h3 id="defaultModalTitle" class="font-semibold tracking-wide text-on-surface-strong text-lg">Order Details</h3>
                                                                <button x-on:click="modalIsOpen = false" aria-label="close modal">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true" stroke="currentColor" fill="none" stroke-width="1.4" class="w-5 h-5">
                                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                                                                    </svg>
                                                                </button>
                                                            </div>
                                                            <!-- Dialog Body -->
                                                            <div class="px-4 py-8">
                                                                <ul class="flex flex-col gap-2 text-lg">
                                                                    <li>
                                                                        <span class="font-semibold">Order ID : </span>
                                                                        {{ $order->id }}
                                                                    </li>
                                                                    <li>
                                                                        <span class="font-semibold">Order Date : </span>
                                                                        {{ $order->order_date }}
                                                                    </li>
                                                                    <li>
                                                                        <span class="font-semibold">Status : </span>
                                                                        {{ $order->status }}
                                                                    </li>
                                                                    <li class="text-wrap">
                                                                        <span class="font-semibold">Installation Address : </span>
                                                                        {{ $order->installation_address }}
                                                                    </li>
                                                                    <li>
                                                                        <span class="font-semibold">Package : </span>
                                                                        {{ $order->packet->name }}
                                                                    </li>
                                                                    <li>
                                                                        <span class="font-semibold">Bandwidth : </span>
                                                                        {{ $order->packet->bandwidth }} Mbps
                                                                    </li>
                                                                    @if ($order->status == 'confirmed')
                                                                        <li class="flex justify-center mt-5">
                                                                            <a class="text-white bg-blue-500 px-3 py-1 rounded" href="{{ route('order.pay', $order->id) }}">Bayar</a>
                                                                        </li>
                                                                    @endif
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-5 text-center font-medium text-sm">
                                            @if($order->status == 'confirmed')
                                                <a href="{{ route('order.pay', $order->id) }}" class="text-blue-500">Bayar</a>
                                            @else
                                                -
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <str class="flex items-center justify-center h-full">
                                        <div class="text-center max-w-md p-6 rounded-2xl">
                                            <img src="{{ asset('assets/img/notfound.png') }}" alt="">
                                            <h2 class="text-2xl font-semibold text-gray-700">Orders tidak ditemukan</h2>
                                            @if($search == true)
                                                <p class="text-sm text-gray-500 mt-2">Tidak ada hasil untuk <span class="font-medium text-primary">"{{ $keyword }}"</span>. Coba gunakan kata kunci lain.</p>
                                            @endif
                                        </div>
                                    </tr>
                                @endforelse
                            </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</x-layouts.order-layout>
