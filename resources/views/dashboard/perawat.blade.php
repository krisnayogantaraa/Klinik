<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-white leading-tight">
            Dashboard Perawat
        </h2>
    </x-slot>
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h3 class="text-lg font-bold mb-4 text-gray-900 dark:text-white">Daftar Kunjungan Pasien</h3>
                <div class="overflow-x-auto">
                    <table class="min-w-full table-auto border border-gray-200 dark:border-gray-700 rounded-lg">
                        <thead class="bg-gray-100 dark:bg-gray-700">
                            <tr>
                                <th class="px-4 py-2 border border-gray-200 dark:border-gray-700 text-gray-700 dark:text-gray-200">Nama Pasien</th>
                                <th class="px-4 py-2 border border-gray-200 dark:border-gray-700 text-gray-700 dark:text-gray-200">Tanggal Kunjungan</th>
                                <th class="px-4 py-2 border border-gray-200 dark:border-gray-700 text-center text-gray-700 dark:text-gray-200">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($visits as $visit)
                                <tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                                    <td class="px-4 py-2 border border-gray-200 dark:border-gray-700 text-gray-900 dark:text-gray-100">{{ $visit->patient->nama }}</td>
                                    <td class="px-4 py-2 border border-gray-200 dark:border-gray-700 text-gray-900 dark:text-gray-100">{{ $visit->tanggal_kunjungan }}</td>
                                    <td class="px-4 py-2 border border-gray-200 dark:border-gray-700 text-center">
                                        <a href="{{ route('pasien.detail', $visit->id) }}" class="inline-flex items-center px-3 py-1 bg-blue-600 hover:bg-blue-700 text-white rounded text-sm transition">
                                            <x-heroicon-o-eye class="w-5 h-5 mr-1" />
                                            Lihat Detail
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="text-center py-4 text-gray-500 dark:text-gray-400 bg-gray-50 dark:bg-gray-800">Belum ada kunjungan pasien.</td>
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
