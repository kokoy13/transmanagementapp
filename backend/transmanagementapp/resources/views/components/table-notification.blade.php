@props(['notification'])
<div class="col-span-full xl:col-span-6 bg-white dark:bg-gray-800 shadow-xs rounded-xl">
    <header class="px-5 py-4 border-b border-gray-100 dark:border-gray-700/60">
        <h2 class="font-semibold text-gray-800 dark:text-gray-100">Realtime Notification</h2>
    </header>
    <div class="p-3">

        <!-- Card content -->
        <div>
            <ul class="my-1">
                <!-- Item -->
                @foreach ($notification as $notif)
                <li class="flex px-2 @if($notif->is_read == true) bg-green-500/10 @else bg-red-500/10 @endif">
                    @if($notif->type == 'order')
                    <div class="w-9 h-9 rounded-full shrink-0 bg-green-500 my-2 mr-3">
                        <svg class="w-9 h-9 fill-current text-white" viewBox="0 0 36 36">
                            <path d="M15 13v-3l-5 4 5 4v-3h8a1 1 0 000-2h-8zM21 21h-8a1 1 0 000 2h8v3l5-4-5-4v3z" />
                        </svg>
                    </div>
                    @elseif($notif->type == 'payment')
                    <div class="w-9 h-9 rounded-full shrink-0 bg-red-500 my-2 mr-3">
                        <svg class="w-9 h-9 fill-current text-white" viewBox="0 0 36 36">
                            <path d="M25 24H11a1 1 0 01-1-1v-5h2v4h12v-4h2v5a1 1 0 01-1 1zM14 13h8v2h-8z" />
                        </svg>
                    </div>
                    @elseif($notif->type == 'request')
                    <div class="w-9 h-9 rounded-full shrink-0 bg-violet-500 my-2 mr-3">
                        <svg class="w-9 h-9 fill-current text-white" viewBox="0 0 36 36">
                            <path d="M18 10c-4.4 0-8 3.1-8 7s3.6 7 8 7h.6l5.4 2v-4.4c1.2-1.2 2-2.8 2-4.6 0-3.9-3.6-7-8-7zm4 10.8v2.3L18.9 22H18c-3.3 0-6-2.2-6-5s2.7-5 6-5 6 2.2 6 5c0 2.2-2 3.8-2 3.8z" />
                        </svg>
                    </div>
                    @endif
                    <div class="grow flex items-center border-b border-gray-100 dark:border-gray-700/60 text-sm py-2">
                        <div class="grow flex justify-between items-center">
                            <div class="self-center"><span class="font-medium text-gray-800 hover:text-gray-900 dark:text-gray-100 dark:hover:text-white">{{ $notif->user->name }}</span> {{ $notif->title }}, "{{ $notif->message }}"</div>
                            <div class="shrink-0 self-end ml-2">
                                <a class="font-medium text-violet-500 hover:text-violet-600 dark:hover:text-violet-400" href="#0">View<span class="hidden sm:inline"> -&gt;</span></a>
                            </div>
                        </div>
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
