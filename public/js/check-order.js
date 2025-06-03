
        function orderManager() {
            return {
                orders: [
                    {
                        id: 'ORD-001',
                        customer_id: 'CUST-001',
                        order_date: '2024-01-15',
                        status: 'pending',
                        installation_address: 'Jl. Sudirman No. 123, Jakarta Pusat',
                        packet_id: 1,
                        created_at: '2024-01-15T10:30:00Z',
                        updated_at: '2024-01-15T10:30:00Z'
                    },
                    {
                        id: 'ORD-002',
                        customer_id: 'CUST-002',
                        order_date: '2024-01-16',
                        status: 'confirmed',
                        installation_address: 'Jl. Thamrin No. 456, Jakarta Pusat',
                        packet_id: 2,
                        created_at: '2024-01-16T09:15:00Z',
                        updated_at: '2024-01-16T14:20:00Z'
                    },
                    {
                        id: 'ORD-003',
                        customer_id: 'CUST-003',
                        order_date: '2024-01-17',
                        status: 'installing',
                        installation_address: 'Jl. Gatot Subroto No. 789, Jakarta Selatan',
                        packet_id: 3,
                        created_at: '2024-01-17T11:45:00Z',
                        updated_at: '2024-01-18T08:30:00Z'
                    },
                    {
                        id: 'ORD-004',
                        customer_id: 'CUST-004',
                        order_date: '2024-01-18',
                        status: 'completed',
                        installation_address: 'Jl. Kuningan No. 321, Jakarta Selatan',
                        packet_id: 1,
                        created_at: '2024-01-18T13:20:00Z',
                        updated_at: '2024-01-20T16:45:00Z'
                    },
                    {
                        id: 'ORD-005',
                        customer_id: 'CUST-005',
                        order_date: '2024-01-19',
                        status: 'cancelled',
                        installation_address: 'Jl. Senayan No. 654, Jakarta Pusat',
                        packet_id: 2,
                        created_at: '2024-01-19T15:10:00Z',
                        updated_at: '2024-01-19T17:30:00Z'
                    }
                ],
                packages: {
                    1: 'Basic Plan - 10 Mbps',
                    2: 'Family Plan - 25 Mbps',
                    3: 'Business Plan - 50 Mbps'
                },
                searchTerm: '',
                statusFilter: '',
                dateFilter: '',
                sortField: '',
                sortDirection: 'asc',
                currentPage: 1,
                itemsPerPage: 10,
                showModal: false,
                selectedOrder: null,

                get filteredOrders() {
                    let filtered = this.orders;

                    // Search filter
                    if (this.searchTerm) {
                        const term = this.searchTerm.toLowerCase();
                        filtered = filtered.filter(order =>
                            order.id.toLowerCase().includes(term) ||
                            order.customer_id.toLowerCase().includes(term) ||
                            order.installation_address.toLowerCase().includes(term)
                        );
                    }

                    // Status filter
                    if (this.statusFilter) {
                        filtered = filtered.filter(order => order.status === this.statusFilter);
                    }

                    // Date filter
                    if (this.dateFilter) {
                        filtered = filtered.filter(order => order.order_date === this.dateFilter);
                    }

                    // Sort
                    if (this.sortField) {
                        filtered.sort((a, b) => {
                            let aVal = a[this.sortField];
                            let bVal = b[this.sortField];

                            if (this.sortDirection === 'asc') {
                                return aVal > bVal ? 1 : -1;
                            } else {
                                return aVal < bVal ? 1 : -1;
                            }
                        });
                    }

                    return filtered;
                },

                get paginatedOrders() {
                    const start = (this.currentPage - 1) * this.itemsPerPage;
                    const end = start + this.itemsPerPage;
                    return this.filteredOrders.slice(start, end);
                },

                get totalPages() {
                    return Math.ceil(this.filteredOrders.length / this.itemsPerPage);
                },

                get visiblePages() {
                    const pages = [];
                    const total = this.totalPages;
                    const current = this.currentPage;

                    for (let i = Math.max(1, current - 2); i <= Math.min(total, current + 2); i++) {
                        pages.push(i);
                    }

                    return pages;
                },

                sortBy(field) {
                    if (this.sortField === field) {
                        this.sortDirection = this.sortDirection === 'asc' ? 'desc' : 'asc';
                    } else {
                        this.sortField = field;
                        this.sortDirection = 'asc';
                    }
                    this.currentPage = 1;
                },

                previousPage() {
                    if (this.currentPage > 1) {
                        this.currentPage--;
                    }
                },

                nextPage() {
                    if (this.currentPage < this.totalPages) {
                        this.currentPage++;
                    }
                },

                goToPage(page) {
                    this.currentPage = page;
                },

                getStatusClass(status) {
                    const classes = {
                        'pending': 'bg-yellow-100 text-yellow-800',
                        'confirmed': 'bg-blue-100 text-blue-800',
                        'installing': 'bg-purple-100 text-purple-800',
                        'completed': 'bg-green-100 text-green-800',
                        'cancelled': 'bg-red-100 text-red-800'
                    };
                    return classes[status] || 'bg-gray-100 text-gray-800';
                },

                getPackageName(packetId) {
                    return this.packages[packetId] || 'Unknown Package';
                },

                formatDate(dateString) {
                    return new Date(dateString).toLocaleDateString('en-US', {
                        year: 'numeric',
                        month: 'short',
                        day: 'numeric'
                    });
                },

                formatDateTime(dateString) {
                    return new Date(dateString).toLocaleString('en-US', {
                        year: 'numeric',
                        month: 'short',
                        day: 'numeric',
                        hour: '2-digit',
                        minute: '2-digit'
                    });
                },

                viewOrder(order) {
                    this.selectedOrder = order;
                    this.showModal = true;
                },

                editOrder(order) {
                    // Implement edit functionality
                    alert('Edit order: ' + order.id);
                },

                deleteOrder(orderId) {
                    if (confirm('Are you sure you want to delete this order?')) {
                        this.orders = this.orders.filter(order => order.id !== orderId);
                    }
                },

                closeModal() {
                    this.showModal = false;
                    this.selectedOrder = null;
                }
            }
        }
