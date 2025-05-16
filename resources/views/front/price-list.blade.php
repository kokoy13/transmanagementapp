<x-layouts.order-layout>
    <div class="w-full h-full pt-30 pb-20">
        {{-- <div class="group relative max-w-md mx-auto">
  <input type="text" placeholder="Search..." class="w-full pl-10 pr-4 py-2 border-b-2 border-gray-300 bg-transparent focus:border-indigo-500 focus:outline-none transition-colors duration-300" />
  <div class="absolute left-0 top-1/2 transform -translate-y-1/2 text-gray-400 group-hover:text-indigo-500 transition-colors duration-300">
    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
      <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
    </svg>
  </div>
  <div class="absolute bottom-0 left-0 w-0 h-0.5 bg-indigo-500 group-hover:w-full transition-all duration-300"></div>
</div> --}}
<div class="relative max-w-md hover:w-full mx-auto mb-8">
  <div class="flex items-center bg-gray-100 rounded-full shadow-lg py-2 overflow-hidden px-2">
    <input type="text" placeholder="Search..." class="w-full border-0 bg-gray-100 py-3 text-gray-800" />
    <button class="bg-indigo-600 hover:bg-indigo-700 text-white p-3 rounded-full transition-colors duration-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
        <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
      </svg>
    </button>
  </div>
</div>  

        <div class="w-full flex flex-col gap-5">
            <!-- Family Packets -->
            <x-packets-scroll :packets='$family' :title='$familyTitle'></x-packets-scroll>
            <!-- Office Packets -->
            <x-packets-scroll :packets='$office' :title='$officeTitle'></x-packets-scroll>
            <!-- Dedicated Packets -->
            <x-packets-scroll :packets='$dedicated' :title='$dedicatedTitle'></x-packets-scroll>
        </div>
    </div>
</x-layouts.order-layout>