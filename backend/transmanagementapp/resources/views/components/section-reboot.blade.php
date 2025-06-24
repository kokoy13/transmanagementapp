<section class="bg-white py-16 px-4 sm:px-6 lg:px-8 rounded-xl">
  <form action="{{ route('reboot') }}" method="post" class="max-w-3xl mx-auto text-center">
    @csrf
    <!-- Title -->
    <h1 class="text-4xl font-bold text-gray-900 sm:text-5xl lg:text-6xl">
      Masukan CustomerID layanan pelanggan
    </h1>

    <!-- Subtitle -->
    <p class="mt-6 text-xl text-gray-600 max-w-2xl mx-auto">
        Fitur Soft Reboot untuk layanan pelanggan sebagai langkah awal troubleshooting
    </p>

    <!-- Search Input -->
    <div class="mt-10 max-w-xl mx-auto">
      <div class="relative">
        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
          <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
            <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
          </svg>
        </div>
        <input
          type="text"
          name="customerid"
          placeholder="Customer ID ..."
          class="block w-full pl-10 pr-12 py-4 text-lg border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 placeholder-gray-500"
        >
        <div class="absolute inset-y-0 right-0 flex items-center">
          <button
            type="submit"
            class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-4 rounded-r-lg transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"
          >
            Search
          </button>
        </div>
      </div>
    </div>
  </form>
</section>
