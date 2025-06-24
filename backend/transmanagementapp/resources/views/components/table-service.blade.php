@props(['packets', 'packetName'])
<div class="flex gap-5 justify-evenly">
    @foreach ($packetName as $name)
        <div class="col-span-full xl:col-span-6 bg-white dark:bg-gray-800 shadow-xs rounded-xl">
            <div class="p-3">
                <!-- Card content -->
                <div>
                    <h2 class="text-xs uppercase text-gray-400 dark:text-gray-500 bg-gray-50 dark:bg-gray-700/50 rounded-xs font-semibold p-2">{{ $name->name }}</h2>
                    <ul class="my-1">
                        <!-- Item -->
                        @foreach ($packets as $packet)
                            @if($packet->name == $name->name)
                                <li class="flex px-2">
                                    <div class="w-9 h-9 rounded-full shrink-0 bg-violet-500 my-2 mr-3">
                                        <svg class="w-9 h-9 fill-current text-white" viewBox="0 0 36 36">
                                            <path d="M18 10c-4.4 0-8 3.1-8 7s3.6 7 8 7h.6l5.4 2v-4.4c1.2-1.2 2-2.8 2-4.6 0-3.9-3.6-7-8-7zm4 10.8v2.3L18.9 22H18c-3.3 0-6-2.2-6-5s2.7-5 6-5 6 2.2 6 5c0 2.2-2 3.8-2 3.8z" />
                                        </svg>
                                    </div>
                                    <div class="grow flex items-center border-b border-gray-100 dark:border-gray-700/60 text-sm py-2">
                                        <div class="grow flex gap-10 items-center justify-between">
                                            <div class="flex gap-5 items-center">
                                                <div class="self-center text-gray-800">
                                                    {{ $packet->bandwidth}} Mbps
                                                </div>
                                                <div class="self-start ml-2">
                                                    <span class="font-medium text-green-600">Rp {{ number_format($packet->price, 0, ',', '.') }}</span>
                                                </div>
                                            </div>
                                            <div class="flex gap-2">
                                                <a href="{{ route('service.edit', $packet->id) }}" class="p-2 transition-all ease-in duration-300 rounded-full hover:bg-gray-800 border-gray-100 hover:text-white">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen" viewBox="0 0 16 16">
                                                        <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001m-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708z"/>
                                                    </svg>
                                                </a>
                                                <a href="{{ route('service.delete', $packet->id) }}" class="p-2 transition-all ease-in duration-300 rounded-full hover:bg-gray-800 border-gray-100 hover:text-white">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                                                        <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                                                    </svg>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    @endforeach
</div>
