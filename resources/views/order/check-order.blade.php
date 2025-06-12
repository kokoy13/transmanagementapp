<x-layouts.order-layout>
<div class="bg-gray-50 mt-20">
    <div x-data="orderManager()" class="min-h-screen">
        <!-- Header -->
        <header class="bg-white shadow-sm border-b border-gray-200">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between items-center py-6">
                    <div>
                        <h1 class="text-2xl font-bold text-gray-900">Order Management</h1>
                        <p class="text-sm text-gray-600">Manage and track all customer orders</p>
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
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Search Orders</label>
                        <div class="relative">
                            <input
                                type="text"
                                x-model="searchTerm"
                                placeholder="Search by ID, Customer ID, or Address..."
                                class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                            >
                            <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
                        </div>
                    </div>

                    <!-- Status Filter -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                        <select
                            x-model="statusFilter"
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                        >
                            <option value="">All Status</option>
                            <option value="pending">Pending</option>
                            <option value="confirmed">Confirmed</option>
                            <option value="installing">Installing</option>
                            <option value="completed">Completed</option>
                            <option value="cancelled">Cancelled</option>
                        </select>
                    </div>

                    <!-- Date Filter -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Order Date</label>
                        <input
                            type="date"
                            x-model="dateFilter"
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                        >
                    </div>
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
                                    <button @click="sortBy('id')" class="flex items-center space-x-1 hover:text-gray-700">
                                        <span>Order ID</span>
                                        <i class="fas fa-sort text-xs"></i>
                                    </button>
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    User ID
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    <button @click="sortBy('order_date')" class="flex items-center space-x-1 hover:text-gray-700">
                                        <span>Order Date</span>
                                        <i class="fas fa-sort text-xs"></i>
                                    </button>
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
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <template x-for="order in paginatedOrders" :key="order.id">
                                @foreach ($orders as $order)
                                    <tr class="hover:bg-gray-50">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                            <span">{{ $order->id }}</span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            <span x-text="order.customer_id"></span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            <span x-text="formatDate(order.order_date)"></span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span
                                                :class="getStatusClass(order.status)"
                                                class="inline-flex px-2 py-1 text-xs font-semibold rounded-full"
                                                x-text="order.status"
                                            ></span>
                                        </td>
                                        <td class="px-6 py-4 text-sm text-gray-500 max-w-xs truncate">
                                            <span x-text="order.installation_address"></span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            <span x-text="getPackageName(order.packet_id)"></span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                            <div class="flex space-x-2 gap-2">
                                                <button
                                                    @click="viewOrder(order)"
                                                    class="text-indigo-600 hover:text-indigo-900"
                                                >
                                                    <i class="fas fa-eye"></i>
                                                </button>
                                                <button
                                                    @click="editOrder(order)"
                                                    class="text-green-600 hover:text-green-900"
                                                >
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                                <button
                                                    @click="deleteOrder(order.id)"
                                                    class="text-red-600 hover:text-red-900"
                                                >
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </template>
                        </tbody>
                    </table>
                </div>

                <!-- Mobile Cards -->
                <div class="lg:hidden">
                    <template x-for="order in paginatedOrders" :key="order.id">
                        <div class="border-b border-gray-200 p-4">
                            <div class="flex justify-between items-start mb-2">
                                <div>
                                    <p class="text-sm font-medium text-gray-900" x-text="'Order #' + order.id"></p>
                                    <p class="text-xs text-gray-500" x-text="formatDate(order.order_date)"></p>
                                </div>
                                <span
                                    :class="getStatusClass(order.status)"
                                    class="inline-flex px-2 py-1 text-xs font-semibold rounded-full"
                                    x-text="order.status"
                                ></span>
                            </div>
                            <div class="space-y-1 text-sm text-gray-600">
                                <p><span class="font-medium">Customer:</span> <span x-text="order.customer_id"></span></p>
                                <p><span class="font-medium">Package:</span> <span x-text="getPackageName(order.packet_id)"></span></p>
                                <p><span class="font-medium">Address:</span> <span x-text="order.installation_address"></span></p>
                            </div>
                            <div class="flex justify-end space-x-2 mt-3">
                                <button
                                    @click="viewOrder(order)"
                                    class="text-indigo-600 hover:text-indigo-900 p-1"
                                >
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button
                                    @click="editOrder(order)"
                                    class="text-green-600 hover:text-green-900 p-1"
                                >
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button
                                    @click="deleteOrder(order.id)"
                                    class="text-red-600 hover:text-red-900 p-1"
                                >
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </div>
                    </template>
                </div>

                <!-- Pagination -->
                <div class="bg-white px-4 py-3 border-t border-gray-200 sm:px-6">
                    <div class="flex items-center justify-between">
                        <div class="flex-1 flex justify-between sm:hidden">
                            <button
                                @click="previousPage()"
                                :disabled="currentPage === 1"
                                class="relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 disabled:opacity-50"
                            >
                                Previous
                            </button>
                            <button
                                @click="nextPage()"
                                :disabled="currentPage === totalPages"
                                class="ml-3 relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 disabled:opacity-50"
                            >
                                Next
                            </button>
                        </div>
                        <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
                            <div>
                                <p class="text-sm text-gray-700">
                                    Showing <span x-text="((currentPage - 1) * itemsPerPage) + 1"></span> to
                                    <span x-text="Math.min(currentPage * itemsPerPage, filteredOrders.length)"></span> of
                                    <span x-text="filteredOrders.length"></span> results
                                </p>
                            </div>
                            <div>
                                <nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px">
                                    <button
                                        @click="previousPage()"
                                        :disabled="currentPage === 1"
                                        class="relative inline-flex items-center px-2 py-2 rounded-l-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50 disabled:opacity-50"
                                    >
                                        <i class="fas fa-chevron-left"></i>
                                    </button>
                                    <template x-for="page in visiblePages" :key="page">
                                        <button
                                            @click="goToPage(page)"
                                            :class="page === currentPage ? 'bg-indigo-50 border-indigo-500 text-indigo-600' : 'bg-white border-gray-300 text-gray-500 hover:bg-gray-50'"
                                            class="relative inline-flex items-center px-4 py-2 border text-sm font-medium"
                                            x-text="page"
                                        ></button>
                                    </template>
                                    <button
                                        @click="nextPage()"
                                        :disabled="currentPage === totalPages"
                                        class="relative inline-flex items-center px-2 py-2 rounded-r-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50 disabled:opacity-50"
                                    >
                                        <i class="fas fa-chevron-right"></i>
                                    </button>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Order Detail Modal -->
        <div x-show="showModal" x-cloak class="fixed inset-0 z-50 overflow-y-auto">
            <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                <div x-show="showModal" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed inset-0 transition-opacity">
                    <div class="absolute inset-0 bg-gray-500 opacity-75" @click="closeModal()"></div>
                </div>

                <div x-show="showModal" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                    <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                        <div class="sm:flex sm:items-start">
                            <div class="mt-3 text-center sm:mt-0 sm:text-left w-full">
                                <h3 class="text-lg leading-6 font-medium text-gray-900 mb-4">Order Details</h3>
                                <div x-show="selectedOrder" class="space-y-3">
                                    <div class="grid grid-cols-2 gap-4">
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700">Order ID</label>
                                            <p class="text-sm text-gray-900" x-text="selectedOrder?.id"></p>
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700">Customer ID</label>
                                            <p class="text-sm text-gray-900" x-text="selectedOrder?.customer_id"></p>
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700">Order Date</label>
                                            <p class="text-sm text-gray-900" x-text="formatDate(selectedOrder?.order_date)"></p>
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700">Status</label>
                                            <span
                                                :class="getStatusClass(selectedOrder?.status)"
                                                class="inline-flex px-2 py-1 text-xs font-semibold rounded-full"
                                                x-text="selectedOrder?.status"
                                            ></span>
                                        </div>
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700">Installation Address</label>
                                        <p class="text-sm text-gray-900" x-text="selectedOrder?.installation_address"></p>
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700">Package</label>
                                        <p class="text-sm text-gray-900" x-text="getPackageName(selectedOrder?.packet_id)"></p>
                                    </div>
                                    <div class="grid grid-cols-2 gap-4">
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700">Created At</label>
                                            <p class="text-sm text-gray-900" x-text="formatDateTime(selectedOrder?.created_at)"></p>
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700">Updated At</label>
                                            <p class="text-sm text-gray-900" x-text="formatDateTime(selectedOrder?.updated_at)"></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                        <button @click="closeModal()" class="w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:ml-3 sm:w-auto sm:text-sm">
                            Close
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</x-layouts.order-layout>
