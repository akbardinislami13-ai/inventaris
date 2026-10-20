<x-app-layout>
    <div class="container mx-auto px-4 py-8">
        <div class="bg-white rounded-lg shadow p-8 text-center">
            <h1 class="text-3xl font-bold text-gray-800 mb-2">Selamat Datang di Aplikasi Inventaris</h1>
            <p class="text-lg text-gray-600 mb-8">Halo, {{ auth()->user()->name }}!</p>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 max-w-2xl mx-auto">
                {{-- Tombol Kategori --}}
                <a href="{{ route('categories.index') }}" 
                    class="block bg-blue-600 text-white p-6 rounded-lg hover:bg-blue-700 transition">
                    <h2 class="text-xl font-bold">Kelola Kategori</h2>
                    <p class="text-blue-100 mt-2">Tambah, ubah, hapus kategori barang</p>
                </a>

                {{-- Tombol Barang --}}
                <a href="{{ route('items.index') }}" 
                    class="block bg-green-600 text-white p-6 rounded-lg hover:bg-green-700 transition">
                    <h2 class="text-xl font-bold">Kelola Barang</h2>
                    <p class="text-green-100 mt-2">Tambah, ubah, hapus data barang</p>
                </a>
            </div>
        </div>
    </div>
</x-app-layout>