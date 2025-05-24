<x-app-layout>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h3 class="text-lg font-bold mb-4">Daftar Kunjungan</h3>

                <table class="min-w-full table-auto border">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-4 py-2 border">#</th>
                            <th class="px-4 py-2 border">Nama Pasien</th>
                            <th class="px-4 py-2 border">No. HP</th>
                            <th class="px-4 py-2 border">Tanggal Kunjungan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($visits as $index => $visit)
                            <tr>
                                <td class="px-4 py-2 border">{{ $index + 1 }}</td>
                                <td class="px-4 py-2 border">{{ $visit->patient->nama }}</td>
                                <td class="px-4 py-2 border">{{ $visit->patient->no_hp }}</td>
                                <td class="px-4 py-2 border">{{ $visit->tanggal_kunjungan }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="px-4 py-2 border text-center text-gray-500">
                                    Tidak ada data kunjungan.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
