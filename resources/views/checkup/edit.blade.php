<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-white leading-tight">
            Edit Vital Sign
        </h2>
    </x-slot>
    <div class="max-w-xl mx-auto py-6">
        <form action="{{ route('checkup.update', $checkup->id) }}" method="POST" class="space-y-4 bg-white dark:bg-gray-800 p-6 rounded shadow">
            @csrf
            @method('PUT')
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-200">Berat Badan (kg)</label>
                <input type="number" step="0.1" name="berat_badan" value="{{ old('berat_badan', $checkup->berat_badan) }}" class="mt-1 block w-full rounded border-gray-300 dark:border-gray-600 dark:bg-gray-900 dark:text-gray-100 shadow-sm" required>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-200">Tekanan Darah (misal: 120/80)</label>
                <input type="text" name="tekanan_darah" value="{{ old('tekanan_darah', $checkup->tekanan_darah) }}" class="mt-1 block w-full rounded border-gray-300 dark:border-gray-600 dark:bg-gray-900 dark:text-gray-100 shadow-sm" required>
            </div>
            <div>
                <button type="submit" class="px-4 py-2 bg-yellow-500 text-white rounded hover:bg-yellow-600 dark:bg-yellow-400 dark:hover:bg-yellow-600">Update</button>
                <a href="{{ route('pasien.detail', $checkup->visit_id) }}" class="ml-4 text-gray-600 dark:text-gray-300 hover:underline">Batal</a>
            </div>
        </form>
    </div>
</x-app-layout>
