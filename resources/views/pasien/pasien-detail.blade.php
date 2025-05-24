<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-white leading-tight">
            {{ __('Detail Pasien') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-5xl mx-auto space-y-6">

            {{-- Data Pasien --}}
            <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6">
                <h3 class="text-lg font-semibold mb-2 text-gray-900 dark:text-white">Data Pasien</h3>
                <p class="text-gray-800 dark:text-gray-200">Nama: {{ $visit->patient->nama }}</p>
                <p class="text-gray-800 dark:text-gray-200">Tanggal Lahir: {{ $visit->patient->tanggal_lahir }}</p>
                <p class="text-gray-800 dark:text-gray-200">
                    Jenis Kelamin:
                    @if($visit->patient->jenis_kelamin === 'L')
                        <span class="inline-flex items-center px-2 py-1 rounded bg-blue-100 dark:bg-blue-900 text-blue-700 dark:text-blue-200 text-xs font-medium"><x-heroicon-o-user class="w-4 h-4 mr-1 text-blue-500"/>Laki-laki</span>
                    @elseif($visit->patient->jenis_kelamin === 'P')
                        <span class="inline-flex items-center px-2 py-1 rounded bg-pink-100 dark:bg-pink-900 text-pink-700 dark:text-pink-200 text-xs font-medium"><x-heroicon-o-user class="w-4 h-4 mr-1 text-pink-500"/>Perempuan</span>
                    @else
                        -
                    @endif
                </p>
                <p class="text-gray-800 dark:text-gray-200">No HP: {{ $visit->patient->no_hp }}</p>
            </div>

            {{-- Data Kunjungan --}}
            <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6">
                <h3 class="text-lg font-semibold mb-2 text-gray-900 dark:text-white">Data Kunjungan</h3>
                <p class="text-gray-800 dark:text-gray-200">Tanggal Kunjungan: {{ $visit->tanggal_kunjungan }}</p>
            </div>

            {{-- Pemeriksaan Vital Sign --}}
            <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6">
                <h3 class="text-lg font-semibold mb-2 text-gray-900 dark:text-white">Pemeriksaan Vital Sign (Perawat)</h3>
                @if($visit->checkup)
                    <p class="text-gray-800 dark:text-gray-200">Berat Badan: {{ $visit->checkup->berat_badan }} kg</p>
                    <p class="text-gray-800 dark:text-gray-200">Tekanan Darah: {{ $visit->checkup->tekanan_darah }}</p>
                    @role('perawat')
                        <a href="{{ route('checkup.edit', $visit->checkup->id) }}" class="inline-block mt-3 px-4 py-2 bg-yellow-500 text-white rounded hover:bg-yellow-600 transition">
                            <x-heroicon-o-pencil-square class="w-5 h-5 mr-1 inline" /> Edit Vital Sign
                        </a>
                    @endrole
                @else
                    <p class="text-sm text-gray-500 dark:text-gray-400 italic">Data belum ada.</p>
                    @role('perawat')
                        <a href="{{ route('checkup.create', $visit->id) }}"
                        class="inline-block mt-3 px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700 transition">
                            + Tambah Vital Sign
                        </a>
                    @endrole
                @endif
            </div>

            {{-- Diagnosa --}}
            <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6">
                <h3 class="text-lg font-semibold mb-2 text-gray-900 dark:text-white">Diagnosa (Dokter)</h3>

                @if($visit->diagnoses->count())
                    @foreach($visit->diagnoses as $diagnosis)
                        <div class="mb-6 border-b pb-2 flex justify-between items-start border-gray-200 dark:border-gray-700">
                            <div>
                                <p class="text-gray-800 dark:text-gray-200"><strong>Keluhan:</strong> {{ $diagnosis->keluhan }}</p>
                                <p class="text-gray-800 dark:text-gray-200"><strong>Diagnosa:</strong> {{ $diagnosis->diagnosa }}</p>
                                <p class="text-sm text-gray-500 dark:text-gray-400 italic">Oleh: {{ $diagnosis->dokter->nama_lengkap ?? 'Tidak diketahui' }}</p>
                            </div>
                            @role('dokter')
                            <form action="{{ route('diagnosis.destroy', $diagnosis->id) }}" method="POST" onsubmit="return confirm('Yakin ingin hapus diagnosa ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-800 dark:text-red-400 dark:hover:text-red-600 ml-3">
                                    <x-heroicon-o-trash class="w-5 h-5" />
                                </button>
                            </form>
                            @endrole
                        </div>
                    @endforeach
                @else
                    <p class="text-sm text-gray-500 dark:text-gray-400 italic">Data belum ada.</p>
                @endif

                @role('dokter')
                    <a href="{{ route('diagnosis.create', $visit->id) }}"
                        class="inline-block mt-3 px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700 transition">
                        + Tambah Diagnosa
                    </a>
                @endrole
            </div>
            

            {{-- Resep Obat --}}
            <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6">
                <h3 class="text-lg font-semibold mb-2 text-gray-900 dark:text-white">Resep Obat</h3>
                @if($visit->prescriptions->count())
                    <ul class="list-disc ml-5">
                    @foreach($visit->prescriptions as $prescription)
                        <li class="flex justify-between items-center mb-4">
                            <span class="text-gray-800 dark:text-gray-200">
                                {{ $prescription->medicine->nama_obat }} - 
                                {{ $prescription->jumlah }} {{ $prescription->medicine->satuan }},
                                Aturan Pakai: {{ $prescription->aturan_pakai }}
                            </span>
                            @role('apoteker')
                            <form action="{{ route('prescription.destroy', $prescription->id) }}" method="POST" onsubmit="return confirm('Yakin ingin hapus resep ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-800 dark:text-red-400 dark:hover:text-red-600 ml-3">
                                    <x-heroicon-o-trash class="w-5 h-5" />
                                </button>
                            </form>
                            @endrole
                        </li>
                    @endforeach
                    </ul>
                @else
                    <p class="text-sm text-gray-500 dark:text-gray-400 italic">Data belum ada.</p>
                @endif
                @role('apoteker')
                    <a href="{{ route('prescription.create', $visit->id) }}"
                    class="inline-block mt-3 ml-2 px-4 py-2 bg-purple-600 text-white rounded hover:bg-purple-700 transition">
                        + Tambah Resep
                    </a>
                @endrole
            </div>

        </div>
    </div>
</x-app-layout>
