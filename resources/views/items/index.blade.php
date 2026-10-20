<x-app-layout>
    <div class="container mx-auto px-4 py-6">
        <h1 class="text-2xl font-bold mb-6">Daftar Barang</h1>

        {{-- Pesan notifikasi --}}
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        {{-- Tombol Tambah --}}
        <div class="mb-6">
            <a href="{{ route('items.create') }}" 
                class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 transition">
                + Tambah Barang Baru
            </a>
        </div>

        {{-- Tabel Barang --}}
        <div class="bg-white rounded-lg shadow overflow-hidden">
            <table class="w-full">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-4 py-3 text-left font-semibold text-gray-700">Nama Barang</th>
                        <th class="px-4 py-3 text-left font-semibold text-gray-700">Kategori</th>
                        <th class="px-4 py-3 text-left font-semibold text-gray-700">Harga</th>
                        <th class="px-4 py-3 text-left font-semibold text-gray-700">Stok</th>
                        <th class="px-4 py-3 text-right font-semibold text-gray-700">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($items as $item)
                    <tr class="border-t border-gray-200 hover:bg-gray-50">
                        <td class="px-4 py-4">{{ $item->name }}</td>
                        <td class="px-4 py-4">{{ $item->category?->name ?? '-' }}</td>
                        <td class="px-4 py-4">Rp {{ number_format($item->price, 0, ',', '.') }}</td>
                        <td class="px-4 py-4">{{ $item->stock }}</td>
                        <td class="px-4 py-4 text-right">
                            <a href="{{ route('items.edit', $item) }}" 
                                class="text-yellow-600 hover:text-yellow-800 mr-2">Ubah</a>
                            <form action="{{ route('items.destroy', $item) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                    class="text-red-600 hover:text-red-800"
                                    onclick="return confirm('Yakin mau hapus?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-6">
            <a href="{{ route('categories.index') }}" class="text-blue-600 hover:underline">← Kelola Kategori</a>
        </div>
    </div>
</x-app-layout>