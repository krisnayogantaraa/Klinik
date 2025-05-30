<x-app-layout>
    <div class="py-6">
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 p-6 rounded shadow">
                <form action="{{ route('pasien.store') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label class="block font-medium text-sm text-gray-700 dark:text-gray-200">Nama</label>
                        <input type="text" name="nama" class="form-input w-full border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-100" required>
                    </div>
                    <div class="mb-4">
                        <label class="block font-medium text-sm text-gray-700 dark:text-gray-200">No. HP</label>
                        <input type="text" name="no_hp" class="form-input w-full border border-gray-300 dark:border-gray-700 bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-100" required>
                    </div>
                    <div class="mb-4">
                        <label for="tanggal_lahir" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Tanggal Lahir</label>
                        <input type="date" name="tanggal_lahir" id="tanggal_lahir" required class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 shadow-sm focus:ring focus:ring-blue-200 bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-100">
                    </div>
                    <div class="mb-4">
                        <label for="jenis_kelamin" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Jenis Kelamin</label>
                        <select name="jenis_kelamin" id="jenis_kelamin" required class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 shadow-sm focus:ring focus:ring-blue-200 bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-100">
                            <option value="">-- Pilih --</option>
                            <option value="L">Laki-laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                    </div>
                    <div class="flex justify-end">
                        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded transition">
                            Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
