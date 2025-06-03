<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Order Form - Transnet</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 font-sans">
  <x-header2></x-header2>
  <div class="max-w-5xl mx-auto p-6">
    <h1 class="text-3xl font-bold text-black mb-8">Order Form</h1>

    <form class="space-y-6">
      <!-- Baris 1: Nama & Jenis Paket -->
      <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div class="flex flex-col">
          <label class="mb-1 font-semibold text-sm text-gray-700">Nama Lengkap <span class="text-red-500">*</span></label>
          <input type="text" class="border rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required />
        </div>
        <div class="flex flex-col">
          <label class="mb-1 font-semibold text-sm text-gray-700">Jenis Paket <span class="text-red-500">*</span></label>
          <input type="text" class="border rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required />
        </div>
      </div>

      <!-- Baris 2: Email & Checkbox Bandwidth -->
      <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div class="flex flex-col">
          <label class="mb-1 font-semibold text-sm text-gray-700">Email <span class="text-red-500">*</span></label>
          <input type="email" class="border rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required />
        </div>
        <div class="flex flex-col">
          <label class="mb-1 font-semibold text-sm text-gray-700">
            Pilih salah satu dari bandwidth dibawah ini <span class="text-red-500">*</span>
          </label>
          <div class="grid grid-cols-2 sm:grid-cols-3 gap-2 text-sm">
            <label class="flex items-center"><input type="checkbox" class="mr-2">10 Mbps</label>
            <label class="flex items-center"><input type="checkbox" class="mr-2">20 Mbps</label>
            <label class="flex items-center"><input type="checkbox" class="mr-2">30 Mbps</label>
            <label class="flex items-center"><input type="checkbox" class="mr-2">40 Mbps</label>
            <label class="flex items-center"><input type="checkbox" class="mr-2">50 Mbps</label>
            <label class="flex items-center"><input type="checkbox" class="mr-2">60 Mbps</label>
            <label class="flex items-center"><input type="checkbox" class="mr-2">70 Mbps</label>
            <label class="flex items-center"><input type="checkbox" class="mr-2">80 Mbps</label>
            <label class="flex items-center"><input type="checkbox" class="mr-2">90 Mbps</label>
            <label class="flex items-center"><input type="checkbox" class="mr-2">100 Mbps</label>
          </div>
        </div>
      </div>

      <!-- Baris 3: No. Telp & Harga -->
      <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div class="flex flex-col">
          <label class="mb-1 font-semibold text-sm text-gray-700">No. Telp <span class="text-red-500">*</span></label>
          <input type="tel" class="border rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required />
        </div>
        <div class="flex flex-col">
          <label class="mb-1 font-semibold text-sm text-gray-700">Harga</label>
          <p class="rounded-md p-2 text-green-600 font-bold text-2xl">Rp 288.000</p>
        </div>

      </div>

      <!-- Baris 4: Alamat -->
      <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div class="flex flex-col md:col-span-2">
          <label class="mb-1 font-semibold text-sm text-gray-700">Alamat Pemesanan <span class="text-red-500">*</span></label>
          <textarea rows="4" class="border rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required></textarea>
        </div>
      </div>

      <!-- Tombol di kanan bawah -->
      <div class="flex justify-end">
        <div class="mt-4 flex gap-4">
          <button type="submit" class="bg-blue-700 hover:bg-blue-800 text-white font-semibold px-6 py-2 rounded-md">Save Order</button>
          <button type="reset" class="bg-gray-200 text-gray-600 px-6 py-2 rounded-md">Clear</button>
        </div>
      </div>
    </form>
  </div>
</body>
</html>
