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
                <p class="text-gray-700 dark:text-gray-200">Nama: {{ $visit->patient->nama }}</p>
                <p class="text-gray-700 dark:text-gray-200">Tanggal Lahir: {{ $visit->patient->tanggal_lahir }}</p>
                <p class="text-gray-700 dark:text-gray-200">Jenis Kelamin: {{ $visit->patient->jenis_kelamin }}</p>
                <p class="text-gray-700 dark:text-gray-200">No HP: {{ $visit->patient->no_hp }}</p>
            </div>

            {{-- Data Kunjungan --}}
            <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6">
                <h3 class="text-lg font-semibold mb-2 text-gray-900 dark:text-white">Data Kunjungan</h3>
                <p class="text-gray-700 dark:text-gray-200">Tanggal Kunjungan: {{ $visit->tanggal_kunjungan }}</p>
            </div>

            {{-- Pemeriksaan Vital Sign --}}
            <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6">
                <h3 class="text-lg font-semibold mb-2 text-gray-900 dark:text-white">Pemeriksaan Vital Sign (Perawat)</h3>
                @if($visit->checkup)
                    <p class="text-gray-700 dark:text-gray-200">Berat Badan: {{ $visit->checkup->berat_badan }} kg</p>
                    <p class="text-gray-700 dark:text-gray-200">Tekanan Darah: {{ $visit->checkup->tekanan_darah }}</p>
                @else
                    <p class="text-sm text-gray-500 dark:text-gray-400 italic">Data belum ada.</p>
                    @role('perawat')
                        <a href="{{ route('checkup.create', $visit->id) }}"
                        class="inline-block mt-3 px-4 py-2 bg-green-600 hover:bg-green-700 text-white rounded transition">
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
                        <div class="mb-6 border-b border-gray-200 dark:border-gray-700 pb-2 flex justify-between items-start">
                            <div>
                                <p class="text-gray-700 dark:text-gray-200">{{ $diagnosis->diagnosa }}</p>
                                <p class="text-xs text-gray-500 dark:text-gray-400">Oleh: {{ $diagnosis->dokter->name }}</p>
                            </div>
                        </div>
                    @endforeach
                @else
                    <p class="text-sm text-gray-500 dark:text-gray-400 italic">Belum ada diagnosa.</p>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
