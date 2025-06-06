<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notifications</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Alpine.js -->
    <script defer src="https://cdn.alpinejs.dev/dist/cdn.min.js"></script>
    <!-- Heroicons (for icons) -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@heroicons/react@2.0.18/outline/esm/index.css">
    <style>
        [x-cloak] { display: none !important; }
    </style>
</head>
<body class="bg-gray-100 font-sans">
    <div class="container mx-auto py-8 px-4 max-w-6xl" x-data="notificationsApp()">
        <div class="bg-white rounded-xl shadow-lg p-6">
            <!-- Back button -->
            <div class="mb-6">
                <a class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-50">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    Back to Dashboard
                </a>
            </div>

            <!-- Header -->
            <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-6">
                <div>
                    <h1 class="text-2xl font-bold text-gray-900">Notifications</h1>
                    <p class="text-gray-600 mt-1">Stay updated with your latest activities and messages</p>
                </div>
                <div class="flex mt-4 md:mt-0 space-x-3">
                    <button
                        @click="markAllAsRead"
                        class="inline-flex items-center px-4 py-2 bg-indigo-600 text-white text-sm font-medium rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        Mark All as Read
                    </button>
                    <button class="inline-flex items-center px-3 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        <span class="ml-1">Settings</span>
                    </button>
                </div>
            </div>

            <!-- Search and filters -->
            <div class="flex flex-col md:flex-row space-y-4 md:space-y-0 md:space-x-4 mb-6">
                <div class="relative flex-grow">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <input
                        type="text"
                        x-model="searchQuery"
                        @input="filterNotifications"
                        class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-md leading-5 bg-white placeholder-gray-500 focus:outline-none focus:placeholder-gray-400 focus:ring-1 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                        placeholder="Search notifications..."
                    />
                </div>
                <div class="flex space-x-3">
                    <div x-data="{ open: false }" class="relative inline-block text-left">
                        <button @click="open = !open" type="button" class="inline-flex justify-center w-full rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z" />
                            </svg>
                            Filter
                            <svg class="-mr-1 ml-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>
                        <div
                            x-show="open"
                            @click.away="open = false"
                            x-cloak
                            class="origin-top-right absolute right-0 mt-2 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 divide-y divide-gray-100 focus:outline-none z-10"
                        >
                            <div class="py-1">
                                <a href="#" @click.prevent="filterByStatus('all'); open = false" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">All Notifications</a>
                                <a href="#" @click.prevent="filterByStatus('read'); open = false" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Read</a>
                                <a href="#" @click.prevent="filterByStatus('unread'); open = false" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Unread</a>
                            </div>
                        </div>
                    </div>
                    <div x-data="{ open: false }" class="relative inline-block text-left">
                        <button @click="open = !open" type="button" class="inline-flex justify-center w-full rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                            </svg>
                            Type
                            <svg class="-mr-1 ml-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>
                        <div
                            x-show="open"
                            @click.away="open = false"
                            x-cloak
                            class="origin-top-right absolute right-0 mt-2 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 divide-y divide-gray-100 focus:outline-none z-10"
                        >
                            <div class="py-1">
                                <a href="#" @click.prevent="filterByType('all'); open = false" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">All Types</a>
                                <a href="#" @click.prevent="filterByType('Ticket'); open = false" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Ticket</a>
                                <a href="#" @click.prevent="filterByType('Message'); open = false" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Message</a>
                                <a href="#" @click.prevent="filterByType('Team'); open = false" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Team</a>
                            </div>
                        </div>
                    </div>
                    <button class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                        </svg>
                        Analytics
                    </button>
                </div>
            </div>

            <!-- Notifications table -->
            <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                <table class="min-w-full divide-y divide-gray-300">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">Notification</th>
                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Type</th>
                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Time</th>
                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Status</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 bg-white">
                        <template x-for="notification in filteredNotifications" :key="notification.id">
                            <tr :class="notification.read ? '' : 'bg-blue-50'">
                                <td class="py-4 pl-4 pr-3 text-sm sm:pl-6">
                                    <div class="flex items-center">
                                        <div class="h-10 w-10 flex-shrink-0 flex items-center justify-center" :class="{
                                            'bg-blue-100 text-blue-600': notification.type === 'Ticket',
                                            'bg-green-100 text-green-600': notification.type === 'Message',
                                            'bg-purple-100 text-purple-600': notification.type === 'Team'
                                        }">
                                            <template x-if="notification.type === 'Ticket'">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z" />
                                                </svg>
                                            </template>
                                            <template x-if="notification.type === 'Message'">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
                                                </svg>
                                            </template>
                                            <template x-if="notification.type === 'Team'">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                                </svg>
                                            </template>
                                        </div>
                                        <div class="ml-4">
                                            <div class="font-medium text-gray-900" x-text="notification.title"></div>
                                            <div class="text-gray-500" x-text="notification.description"></div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-3 py-4 text-sm text-gray-500" x-text="notification.type"></td>
                                <td class="px-3 py-4 text-sm text-gray-500" x-text="notification.time"></td>
                                <td class="px-3 py-4 text-sm">
                                    <span
                                        class="inline-flex rounded-full px-2 text-xs font-semibold leading-5"
                                        :class="notification.read ? 'bg-gray-100 text-gray-800' : 'bg-indigo-100 text-indigo-800'"
                                        x-text="notification.read ? 'read' : 'unread'"
                                    ></span>
                                </td>
                            </tr>
                        </template>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        function notificationsApp() {
            return {
                notifications: [],
                filteredNotifications: [],
                searchQuery: '',
                statusFilter: 'all',
                typeFilter: 'all',

                init() {
                    this.fetchNotifications();
                },

                fetchNotifications() {
                    fetch('/api/notifications')
                        .then(response => response.json())
                        .then(data => {
                            this.notifications = data;
                            this.filterNotifications();
                        })
                        .catch(error => {
                            console.error('Error fetching notifications:', error);
                        });
                },

                filterNotifications() {
                    this.filteredNotifications = this.notifications.filter(notification => {
                        // Apply search filter
                        const matchesSearch = this.searchQuery === '' ||
                            notification.title.toLowerCase().includes(this.searchQuery.toLowerCase()) ||
                            notification.description.toLowerCase().includes(this.searchQuery.toLowerCase());

                        // Apply status filter
                        const matchesStatus = this.statusFilter === 'all' ||
                            (this.statusFilter === 'read' && notification.read) ||
                            (this.statusFilter === 'unread' && !notification.read);

                        // Apply type filter
                        const matchesType = this.typeFilter === 'all' || notification.type === this.typeFilter;

                        return matchesSearch && matchesStatus && matchesType;
                    });
                },

                filterByStatus(status) {
                    this.statusFilter = status;
                    this.filterNotifications();
                },

                filterByType(type) {
                    this.typeFilter = type;
                    this.filterNotifications();
                },

                markAllAsRead() {
                    fetch('/api/notifications/mark-all-read', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            this.notifications = this.notifications.map(notification => ({
                                ...notification,
                                read: true
                            }));
                            this.filterNotifications();
                        }
                    })
                    .catch(error => {
                        console.error('Error marking notifications as read:', error);
                    });
                }
            }
        }
    </script>
</body>
</html>
