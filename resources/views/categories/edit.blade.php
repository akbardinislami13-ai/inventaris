<x-app-layout>
    <div class="container mx-auto px-4 py-6">
        <h1 class="text-2xl font-bold mb-6">Ubah Kategori</h1>

        {{-- Pesan kalau ada salah isi --}}
        @if($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Form Ubah Kategori --}}
        <div class="bg-white rounded-lg shadow p-6 max-w-md">
            <form action="{{ route('categories.update', $category) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-6">
                    <label for="name" class="block text-gray-700 font-medium mb-2">Nama Kategori</label>
                    <input type="text" name="name" id="name" value="{{ old('name', $category->name) }}"
                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>

                <div class="flex gap-3">
                    <button type="submit" 
                        class="bg-blue-600 text-white px-5 py-2 rounded-lg hover:bg-blue-700 transition">
                        Perbarui
                    </button>
                    <a href="{{ route('categories.index') }}" 
                        class="bg-gray-200 text-gray-700 px-5 py-2 rounded-lg hover:bg-gray-300 transition">
                        Kembali
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>