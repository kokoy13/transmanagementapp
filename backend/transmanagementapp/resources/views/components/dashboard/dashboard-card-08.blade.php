@props(['notification'])
<div class="col-span-full xl:col-span-6 bg-white dark:bg-gray-800 shadow-xs rounded-xl">
    <header class="px-5 py-4 border-b border-gray-100 dark:border-gray-700/60">
        <h2 class="font-semibold text-gray-800 dark:text-gray-100">Notification</h2>
    </header>
    <div class="p-3">

        <!-- Table -->
        <div class="overflow-x-auto">
            <table class="table-auto w-full">
                <!-- Table body -->
                <tbody class="text-sm divide-y divide-gray-100 dark:divide-gray-700/60">
                    @foreach ($notification as $notif)
                        <tr class="flex px-2 @if($notif->is_read == true) bg-green-500/10 @else bg-red-500/10 @endif">
                            @if($notif->type == 'order')
                            <td class="w-9 h-9 rounded-full shrink-0 bg-green-500 my-2 mr-3">
                                <svg class="w-9 h-9 fill-current text-white" viewBox="0 0 36 36">
                                    <path d="M15 13v-3l-5 4 5 4v-3h8a1 1 0 000-2h-8zM21 21h-8a1 1 0 000 2h8v3l5-4-5-4v3z" />
                                </svg>
                            </td>
                            @elseif($notif->type == 'payment')
                            <td class="w-9 h-9 rounded-full shrink-0 bg-red-500 my-2 mr-3">
                                <svg class="w-9 h-9 fill-current text-white" viewBox="0 0 36 36">
                                    <path d="M25 24H11a1 1 0 01-1-1v-5h2v4h12v-4h2v5a1 1 0 01-1 1zM14 13h8v2h-8z" />
                                </svg>
                            </td>
                            @elseif($notif->type == 'request')
                            <td class="w-9 h-9 rounded-full shrink-0 bg-violet-500 my-2 mr-3">
                                <svg class="w-9 h-9 fill-current text-white" viewBox="0 0 36 36">
                                    <path d="M18 10c-4.4 0-8 3.1-8 7s3.6 7 8 7h.6l5.4 2v-4.4c1.2-1.2 2-2.8 2-4.6 0-3.9-3.6-7-8-7zm4 10.8v2.3L18.9 22H18c-3.3 0-6-2.2-6-5s2.7-5 6-5 6 2.2 6 5c0 2.2-2 3.8-2 3.8z" />
                                </svg>
                            </td>
                            @endif
                            <td class="grow flex items-center border-b border-gray-100 dark:border-gray-700/60 text-sm py-2">
                                <div class="grow flex justify-between items-center">
                                    <div class="self-center"><span class="font-medium text-gray-800 hover:text-gray-900 dark:text-gray-100 dark:hover:text-white">{{ $notif->user->name }}</span> {{ $notif->title }}"</div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    {{-- <tr>
                        <td class="p-2 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="w-10 h-10 shrink-0 mr-2 sm:mr-3">
                                    <img class="rounded-full" src="{{ asset('images/user-36-05.jpg') }}" width="40" height="40" alt="Alex Shatov" />
                                </div>
                                <div class="font-medium text-gray-800">Alex Shatov</div>
                            </div>
                        </td>
                        <td class="p-2 whitespace-nowrap">
                            <div class="text-left">alexshatov@gmail.com</div>
                        </td>
                        <td class="p-2 whitespace-nowrap">
                            <div class="text-left font-medium text-green-500">$2,890.66</div>
                        </td>
                        <td class="p-2 whitespace-nowrap">
                            <div class="text-lg text-center">🇺🇸</div>
                        </td>
                    </tr> --}}
                </tbody>
            </table>

        </div>

    </div>
</div>
