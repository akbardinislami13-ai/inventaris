<x-app-layout>
    <div class="container mx-auto px-4 py-6">
        <h1 class="text-2xl font-bold mb-6">Daftar Kategori</h1>

        {{-- Pesan notifikasi --}}
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        {{-- Form Tambah --}}
        <div class="mb-6 bg-gray-50 p-4 rounded-lg">
            <form action="{{ route('categories.store') }}" method="POST" class="flex gap-2 items-center">
                @csrf
                <input type="text" name="name" placeholder="Nama Kategori" 
                    class="flex-1 px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                <button type="submit" 
                    class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
                    Tambah
                </button>
            </form>
        </div>

        {{-- Tabel Kategori --}}
        <div class="bg-white rounded-lg shadow overflow-hidden">
            <table class="w-full">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-6 py-3 text-left font-semibold text-gray-700">Nama Kategori</th>
                        <th class="px-6 py-3 text-right font-semibold text-gray-700">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categories as $category)
                    <tr class="border-t border-gray-200 hover:bg-gray-50">
                        <td class="px-6 py-4">{{ $category->name }}</td>
                        <td class="px-6 py-4 text-right">
                            <a href="{{ route('categories.edit', $category) }}" 
                                class="text-yellow-600 hover:text-yellow-800 mr-2">Ubah</a>
                            <form action="{{ route('categories.destroy', $category) }}" method="POST" class="inline">
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
            <a href="{{ route('items.index') }}" class="text-blue-600 hover:underline">→ Lihat Daftar Barang</a>
        </div>
    </div>
</x-app-layout>