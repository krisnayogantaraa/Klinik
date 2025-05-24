<x-app-layout>
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h3 class="text-lg font-bold mb-4 text-gray-900 dark:text-white">Daftar Kunjungan</h3>
                <div class="overflow-x-auto">
                    <table class="min-w-full table-auto border border-gray-200 dark:border-gray-700 rounded-lg">
                        <thead class="bg-gray-100 dark:bg-gray-700">
                            <tr>
                                <th class="px-4 py-2 border border-gray-200 dark:border-gray-700 text-gray-700 dark:text-gray-200">#</th>
                                <th class="px-4 py-2 border border-gray-200 dark:border-gray-700 text-gray-700 dark:text-gray-200">Nama Pasien</th>
                                <th class="px-4 py-2 border border-gray-200 dark:border-gray-700 text-gray-700 dark:text-gray-200">No. HP</th>
                                <th class="px-4 py-2 border border-gray-200 dark:border-gray-700 text-gray-700 dark:text-gray-200">Tanggal Kunjungan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($visits as $index => $visit)
                                <tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                                    <td class="px-4 py-2 border border-gray-200 dark:border-gray-700 text-gray-900 dark:text-gray-100">{{ $index + 1 }}</td>
                                    <td class="px-4 py-2 border border-gray-200 dark:border-gray-700 text-gray-900 dark:text-gray-100">{{ $visit->patient->nama }}</td>
                                    <td class="px-4 py-2 border border-gray-200 dark:border-gray-700 text-gray-900 dark:text-gray-100">{{ $visit->patient->no_hp }}</td>
                                    <td class="px-4 py-2 border border-gray-200 dark:border-gray-700 text-gray-900 dark:text-gray-100">{{ $visit->tanggal_kunjungan }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="px-4 py-2 border border-gray-200 dark:border-gray-700 text-center text-gray-500 dark:text-gray-400 bg-gray-50 dark:bg-gray-800">
                                        Tidak ada data kunjungan.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="mt-4">
                    {{ $visits->links('pagination::tailwind') }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
