<div class="flex flex-col mb-10 col-span-full sm:col-span-6 bg-white dark:bg-gray-800 shadow-xs rounded-xl">
            <header class="px-5 py-4 border-b flex justify-between items-center dark:border-gray-700/60">
                <h2 class="font-semibold text-gray-800 dark:text-gray-100">{{ $content->title }}</h2>
            </header>
            <div class="grow" style="background-image: url('{{Storage::url('public/'.$content->thumbnail)}}'); background-position: center; background-size: cover">
                <canvas width="595" height="350"></canvas>
            </div>
        </div>
