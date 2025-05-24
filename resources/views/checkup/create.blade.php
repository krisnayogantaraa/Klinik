<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-white leading-tight">
            Tambah Vital Sign
        </h2>
    </x-slot>

    <div class="max-w-xl mx-auto py-6">
        <form action="{{ route('checkup.store', $visit->id) }}" method="POST" class="space-y-4 bg-white dark:bg-gray-800 p-6 rounded shadow">
            @csrf

            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-200">Berat Badan (kg)</label>
                <input type="number" step="0.1" name="berat_badan" class="mt-1 block w-full rounded border-gray-300 dark:border-gray-600 dark:bg-gray-900 dark:text-gray-100 shadow-sm" required>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-200">Tekanan Darah (misal: 120/80)</label>
                <input type="text" name="tekanan_darah" class="mt-1 block w-full rounded border-gray-300 dark:border-gray-600 dark:bg-gray-900 dark:text-gray-100 shadow-sm" required>
            </div>

            <div class="flex justify-end">
                <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700 dark:bg-green-500 dark:hover:bg-green-700">
                    Simpan
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
