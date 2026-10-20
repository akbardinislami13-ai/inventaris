<x-app-layout>
    <div class="container mx-auto px-4 py-6">
        <h1 class="text-2xl font-bold mb-6">Tambah Barang Baru</h1>

        {{-- Pesan salah isi --}}
        @if($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Form Tambah Barang --}}
        <div class="bg-white rounded-lg shadow p-6 max-w-md">
            <form action="{{ route('items.store') }}" method="POST">
                @csrf

                <div class="mb-4">
                    <label for="category_id" class="block text-gray-700 font-medium mb-2">Kategori</label>
                    <select name="category_id" id="category_id" 
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                        <option value="">-- Pilih Kategori --</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label for="name" class="block text-gray-700 font-medium mb-2">Nama Barang</label>
                    <input type="text" name="name" id="name" value="{{ old('name') }}"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>

                <div class="mb-4">
                    <label for="price" class="block text-gray-700 font-medium mb-2">Harga (Rp)</label>
                    <input type="number" name="price" id="price" value="{{ old('price') }}"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>

               <div class="mb-6">
    <label for="stock" class="block text-gray-700 font-medium mb-2">Stok</label>
    <input type="number" name="stock" id="stock" value="{{ old('stock') }}"
        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
</div>

                <div class="flex gap-3">
                    <button type="submit" 
                        class="bg-blue-600 text-white px-5 py-2 rounded-lg hover:bg-blue-700 transition">
                        Simpan Barang
                    </button>
                    <a href="{{ route('items.index') }}" 
                        class="bg-gray-200 text-gray-700 px-5 py-2 rounded-lg hover:bg-gray-300 transition">
                        Kembali
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>