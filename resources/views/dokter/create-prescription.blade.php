<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Tambah Resep Obat</h2>
    </x-slot>

    <div class="max-w-4xl mx-auto py-6">
        <form action="{{ route('prescription.store', $visit->id) }}" method="POST" class="space-y-4 bg-white dark:bg-gray-800 p-6 rounded shadow">
            @csrf
            <div id="obat-container" class="space-y-2">
                {{-- Baris Obat Pertama --}}
                <div class="obat-group flex items-center gap-2">
                    <select name="medicine_id[]" class="flex-1 rounded border-gray-300 dark:border-gray-600 dark:bg-gray-900 dark:text-gray-100" required>
                        <option value="">-- Pilih Obat --</option>
                        @foreach ($medicines as $medicine)
                            <option value="{{ $medicine->id }}">{{ $medicine->nama_obat }} ({{ $medicine->satuan }})</option>
                        @endforeach
                    </select>

                    <input type="number" name="jumlah[]" min="1" value="1" placeholder="Jumlah"
                        class="w-24 rounded border-gray-300 dark:border-gray-600 dark:bg-gray-900 dark:text-gray-100" required>

                    <input type="text" name="aturan_pakai[]" placeholder="Aturan Pakai"
                        class="flex-1 rounded border-gray-300 dark:border-gray-600 dark:bg-gray-900 dark:text-gray-100">

                    <button type="button" class="remove-obat hidden text-red-600 hover:text-red-800 dark:text-red-400 dark:hover:text-red-600">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>

            {{-- Tombol Tambah Obat --}}
            <div>
                <button type="button" id="add-obat" class="px-3 py-1 bg-green-600 text-white rounded hover:bg-green-700 dark:bg-green-500 dark:hover:bg-green-700">
                    + Tambah Obat
                </button>
            </div>

            {{-- Submit --}}
            <div class="pt-4">
                <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700 dark:bg-indigo-500 dark:hover:bg-indigo-700">
                    Simpan Resep
                </button>
                <a href="{{ route('pasien.detail', $visit->id) }}" class="ml-4 text-gray-600 dark:text-gray-300 hover:underline">
                    Batal
                </a>
            </div>
        </form>
    </div>

    <script>
        document.getElementById('add-obat').addEventListener('click', function () {
            const container = document.getElementById('obat-container');

            const html = `
                <div class="obat-group flex items-center gap-2">
                    <select name="medicine_id[]" class="flex-1 rounded border-gray-300 dark:border-gray-600 dark:bg-gray-900 dark:text-gray-100" required>
                        <option value="">-- Pilih Obat --</option>
                        @foreach ($medicines as $medicine)
                            <option value="{{ $medicine->id }}">{{ $medicine->nama_obat }} ({{ $medicine->satuan }})</option>
                        @endforeach
                    </select>

                    <input type="number" name="jumlah[]" min="1" value="1" placeholder="Jumlah"
                        class="w-24 rounded border-gray-300 dark:border-gray-600 dark:bg-gray-900 dark:text-gray-100" required>

                    <input type="text" name="aturan_pakai[]" placeholder="Aturan Pakai"
                        class="flex-1 rounded border-gray-300 dark:border-gray-600 dark:bg-gray-900 dark:text-gray-100">

                    <button type="button" class="remove-obat text-red-600 hover:text-red-800 dark:text-red-400 dark:hover:text-red-600">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            `;

            container.insertAdjacentHTML('beforeend', html);
        });

        document.addEventListener('click', function (e) {
            if (e.target.closest('.remove-obat')) {
                e.target.closest('.obat-group').remove();
            }
        });
    </script>
</x-app-layout>
