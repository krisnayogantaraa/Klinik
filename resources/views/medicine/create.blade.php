<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-white leading-tight">Tambah Data Obat</h2>
    </x-slot>

    <div class="max-w-xl mx-auto py-6">
        <form action="{{ route('medicines.store') }}" method="POST" class="space-y-4 bg-white dark:bg-gray-800 p-6 rounded shadow">
            @csrf

            <div>
                <label for="nama_obat" class="block font-medium text-gray-700 dark:text-gray-200">Nama Obat</label>
                <input type="text" name="nama_obat" id="nama_obat" value="{{ old('nama_obat') }}" required
                    class="w-full rounded border-gray-300 dark:border-gray-600 dark:bg-gray-900 dark:text-gray-100 focus:ring-blue-500 focus:border-blue-500">
                @error('nama_obat')
                <p class="text-red-600 dark:text-red-400 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="satuan" class="block font-medium text-sm text-gray-700 dark:text-gray-200">Satuan</label>
                <select id="satuan" name="satuan" class="mt-1 block w-full rounded border-gray-300 dark:border-gray-600 dark:bg-gray-900 dark:text-gray-100" required>
                    <option value="">-- Pilih Satuan --</option>
                    @php
                        $satuanOptions = ['tablet', 'botol', 'ml', 'mg', 'kapsul'];
                    @endphp
                    @foreach ($satuanOptions as $option)
                        <option value="{{ $option }}" {{ old('satuan') == $option ? 'selected' : '' }}>
                            {{ ucfirst($option) }}
                        </option>
                    @endforeach
                </select>
                @error('satuan')
                    <p class="text-red-600 dark:text-red-400 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <button type="submit"
                    class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 dark:bg-blue-500 dark:hover:bg-blue-700">Simpan</button>
                <a href="{{ route('medicines.index') }}" class="ml-4 text-gray-600 dark:text-gray-300 hover:underline">Batal</a>
            </div>
        </form>
    </div>
</x-app-layout>
