<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-white leading-tight">
            Dashboard Dokter
        </h2>
    </x-slot>
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h3 class="text-lg font-bold mb-4 text-gray-900 dark:text-white">Daftar Kunjungan</h3>
                <div class="overflow-x-auto">
                    <table class="min-w-full table-auto border border-gray-200 dark:border-gray-700 rounded-lg">
                        <thead class="bg-gradient-to-r from-blue-100 via-white to-blue-100 dark:from-blue-900 dark:via-gray-800 dark:to-blue-900">
                            <tr>
                                <th class="px-4 py-2 border border-gray-200 dark:border-gray-700 text-gray-700 dark:text-gray-200 font-bold uppercase tracking-wider">#</th>
                                <th class="border border-gray-200 dark:border-gray-700 px-4 py-2 text-gray-700 dark:text-gray-200 font-bold uppercase tracking-wider">Jenis Kelamin</th>
                                <th class="px-4 py-2 border border-gray-200 dark:border-gray-700 text-gray-700 dark:text-gray-200 font-bold uppercase tracking-wider">Nama Pasien</th>
                                <th class="px-4 py-2 border border-gray-200 dark:border-gray-700 text-gray-700 dark:text-gray-200 font-bold uppercase tracking-wider">No. HP</th>
                                <th class="px-4 py-2 border border-gray-200 dark:border-gray-700 text-gray-700 dark:text-gray-200 font-bold uppercase tracking-wider">Tanggal Kunjungan</th>
                                <th class="px-4 py-2 border border-gray-200 dark:border-gray-700 text-gray-700 dark:text-gray-200 font-bold uppercase tracking-wider">Status</th>
                                <th class="px-4 py-2 border border-gray-200 dark:border-gray-700 text-gray-700 dark:text-gray-200 font-bold uppercase tracking-wider">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($visits as $index => $visit)
                                <tr class="transition hover:bg-blue-50 dark:hover:bg-blue-900 {{ $index % 2 === 0 ? 'bg-white dark:bg-gray-800' : 'bg-blue-50 dark:bg-blue-950' }}">
                                    <td class="px-4 py-2 border border-gray-200 dark:border-gray-700 text-gray-900 dark:text-gray-100 font-semibold">{{ $index + 1 }}</td>
                                    <td class="border border-gray-200 dark:border-gray-700 px-4 py-2 text-gray-900 dark:text-gray-100">
                                        @if($visit->patient->jenis_kelamin === 'L')
                                            <span class="inline-flex items-center px-2 py-1 rounded bg-blue-100 dark:bg-blue-900 text-blue-700 dark:text-blue-200 text-xs font-medium"><x-heroicon-o-user class="w-4 h-4 mr-1 text-blue-500"/>Laki-laki</span>
                                        @elseif($visit->patient->jenis_kelamin === 'P')
                                            <span class="inline-flex items-center px-2 py-1 rounded bg-sky-100 dark:bg-sky-900 text-sky-700 dark:text-sky-200 text-xs font-medium"><x-heroicon-o-user class="w-4 h-4 mr-1 text-sky-500"/>Perempuan</span>
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td class="px-4 py-2 border border-gray-200 dark:border-gray-700 text-gray-900 dark:text-gray-100">{{ $visit->patient->nama }}</td>
                                    <td class="px-4 py-2 border border-gray-200 dark:border-gray-700 text-gray-900 dark:text-gray-100">{{ $visit->patient->no_hp }}</td>
                                    <td class="px-4 py-2 border border-gray-200 dark:border-gray-700 text-gray-900 dark:text-gray-100">{{ $visit->tanggal_kunjungan }}</td>
                                    <td class="px-4 py-2 border border-gray-200 dark:border-gray-700 text-gray-900 dark:text-gray-100">
                                        @if($visit->diagnoses->isNotEmpty())
                                            <span class="inline-flex items-center px-2 py-1 rounded bg-green-100 dark:bg-green-900 text-green-700 dark:text-green-200 text-xs font-medium">
                                                <x-heroicon-o-check-circle class="w-4 h-4 mr-1 text-green-500"/>Sudah Dilayani
                                            </span>
                                        @else
                                            <span class="inline-flex items-center px-2 py-1 rounded bg-yellow-100 dark:bg-yellow-900 text-yellow-700 dark:text-yellow-200 text-xs font-medium">
                                                <x-heroicon-o-clock class="w-4 h-4 mr-1 text-yellow-500"/>Belum Dilayani
                                            </span>
                                        @endif
                                    </td>
                                    <td class="px-4 py-2 text-center">
                                        <a href="{{ route('pasien.detail', $visit->id) }}" class="inline-flex items-center px-3 py-1 bg-blue-600 hover:bg-blue-700 text-white rounded">
                                            <x-heroicon-o-eye class="w-5 h-5 mr-1" />
                                            Lihat Detail
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="px-4 py-2 border border-gray-200 dark:border-gray-700 text-center text-gray-500 dark:text-gray-400 bg-blue-50 dark:bg-blue-900">
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
