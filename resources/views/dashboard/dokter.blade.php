<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-white leading-tight">
            Dashboard Dokter
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h3 class="text-lg font-semibold mb-4 text-gray-900 dark:text-white">Daftar Pasien</h3>
                <div class="overflow-x-auto">
                    <table class="min-w-full table-auto border border-gray-200 dark:border-gray-700 rounded-lg">
                        <thead class="bg-gray-100 dark:bg-gray-700">
                            <tr>
                                <th class="border border-gray-200 dark:border-gray-700 px-4 py-2 text-gray-700 dark:text-gray-200">Nama</th>
                                <th class="border border-gray-200 dark:border-gray-700 px-4 py-2 text-gray-700 dark:text-gray-200">Tanggal Kunjungan</th>
                                <th class="border border-gray-200 dark:border-gray-700 px-4 py-2 text-gray-700 dark:text-gray-200">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($visits as $visit)
                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition">
                                <td class="border border-gray-200 dark:border-gray-700 px-4 py-2 text-gray-900 dark:text-gray-100">{{ $visit->patient->nama }}</td>
                                <td class="border border-gray-200 dark:border-gray-700 px-4 py-2 text-gray-900 dark:text-gray-100">{{ $visit->tanggal_kunjungan }}</td>
                                <td class="border border-gray-200 dark:border-gray-700 px-4 py-2 text-center">
                                    <a href="{{ route('pasien.detail', $visit->id) }}"
                                       class="inline-block px-3 py-1 bg-indigo-600 hover:bg-indigo-700 text-white rounded text-sm transition">
                                        Lihat Detail
                                    </a>
                                </td>
                            </tr>
                            @endforeach
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
