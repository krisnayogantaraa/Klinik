<x-app-layout>
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(session('success'))
                <div class="mb-4 p-4 bg-green-100 dark:bg-green-900 text-green-700 dark:text-green-200 rounded">
                    {{ session('success') }}
                </div>
            @endif
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <div class="overflow-x-auto">
                    <table class="min-w-full table-auto border border-gray-200 dark:border-gray-700 rounded-lg">
                        <thead class="bg-gradient-to-r from-blue-100 via-white to-blue-100 dark:from-blue-900 dark:via-gray-800 dark:to-blue-900">
                            <tr>
                                <th class="border border-gray-200 dark:border-gray-700 px-4 py-2 text-gray-700 dark:text-gray-200 font-bold uppercase tracking-wider">Nama</th>
                                <th class="border border-gray-200 dark:border-gray-700 px-4 py-2 text-gray-700 dark:text-gray-200 font-bold uppercase tracking-wider">Tanggal Lahir</th>
                                <th class="border border-gray-200 dark:border-gray-700 px-4 py-2 text-gray-700 dark:text-gray-200 font-bold uppercase tracking-wider">No HP</th>
                                <th class="border border-gray-200 dark:border-gray-700 px-4 py-2 text-gray-700 dark:text-gray-200 font-bold uppercase tracking-wider">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($patients as $index => $patient)
                            <tr class="transition hover:bg-blue-50 dark:hover:bg-blue-900 {{ $index % 2 === 0 ? 'bg-white dark:bg-gray-800' : 'bg-blue-50 dark:bg-blue-950' }}">
                                <td class="border border-gray-200 dark:border-gray-700 px-4 py-2 text-gray-900 dark:text-gray-100 font-semibold">{{ $patient->nama }}</td>
                                <td class="border border-gray-200 dark:border-gray-700 px-4 py-2 text-gray-900 dark:text-gray-100">{{ $patient->tanggal_lahir}}</td>
                                <td class="border border-gray-200 dark:border-gray-700 px-4 py-2 text-gray-900 dark:text-gray-100">{{ $patient->no_hp }}</td>
                                <td class="border border-gray-200 dark:border-gray-700 px-4 py-2 text-center">
                                    <form action="{{ route('pasien.lama.registrasi', $patient->id) }}" method="POST" class="inline">
                                        @csrf
                                        <button type="submit" class="inline-flex items-center px-3 py-1 bg-blue-600 hover:bg-blue-700 text-white rounded text-sm transition shadow">
                                            <x-heroicon-o-plus class="w-5 h-5 mr-1" />
                                            Registrasi
                                        </button>
                                    </form>
                                    <a href="{{ route('pasien.edit', $patient->id) }}" class="inline-flex items-center px-3 py-1 bg-yellow-500 hover:bg-yellow-600 text-white rounded text-sm transition ml-2 shadow">
                                        <x-heroicon-o-pencil-square class="w-5 h-5 mr-1" />
                                        Edit
                                    </a>
                                    <form action="{{ route('pasien.destroy', $patient->id) }}" method="POST" class="inline ml-2" onsubmit="return confirm('Yakin ingin menghapus pasien ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="inline-flex items-center px-3 py-1 bg-red-600 hover:bg-red-700 text-white rounded text-sm transition shadow">
                                            <x-heroicon-o-trash class="w-5 h-5 mr-1" />
                                            Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="mt-4">
                    {{ $patients->links('pagination::tailwind') }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
