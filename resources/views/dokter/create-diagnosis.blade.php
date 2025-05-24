<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Tambah Diagnosa</h2>
    </x-slot>

    <div class="max-w-3xl mx-auto py-6">
        <form action="{{ route('diagnosis.store', $visit->id) }}" method="POST" class="space-y-4 bg-white dark:bg-gray-800 p-6 rounded shadow">
            @csrf

            <div>
                <label for="keluhan" class="block font-medium text-sm text-gray-700 dark:text-gray-200">Keluhan</label>
                <textarea id="keluhan" name="keluhan" rows="3" class="mt-1 block w-full rounded border-gray-300 dark:border-gray-600 dark:bg-gray-900 dark:text-gray-100" required>{{ old('keluhan') }}</textarea>
                @error('keluhan')
                    <p class="text-red-600 dark:text-red-400 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="diagnosa" class="block font-medium text-sm text-gray-700 dark:text-gray-200">Diagnosa</label>
                <textarea id="diagnosa" name="diagnosa" rows="3" class="mt-1 block w-full rounded border-gray-300 dark:border-gray-600 dark:bg-gray-900 dark:text-gray-100" required>{{ old('diagnosa') }}</textarea>
                @error('diagnosa')
                    <p class="text-red-600 dark:text-red-400 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700 dark:bg-indigo-500 dark:hover:bg-indigo-700">Simpan Diagnosa</button>
                <a href="javascript:history.back()" class="ml-4 text-gray-600 dark:text-gray-300 hover:underline">Batal</a>
            </div>
        </form>
    </div>
</x-app-layout>
