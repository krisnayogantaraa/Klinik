<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Data Obat</h2>
    </x-slot>

    <div class="max-w-5xl mx-auto py-6">
        @if(session('success'))
            <div class="mb-4 p-4 bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200 rounded">
                {{ session('success') }}
            </div>
        @endif

        <div class="mb-4 flex justify-between items-center">
            <a href="{{ route('medicines.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 dark:bg-blue-500 dark:hover:bg-blue-700">
                + Tambah Obat
            </a>
        </div>

        <div class="bg-white dark:bg-gray-800 shadow rounded-lg overflow-x-auto">
            <table class="min-w-full table-auto">
                <thead class="bg-gray-100 dark:bg-gray-700">
                    <tr>
                        <th class="border px-4 py-2 text-left dark:border-gray-700 dark:text-gray-200">Nama Obat</th>
                        <th class="border px-4 py-2 text-left dark:border-gray-700 dark:text-gray-200">Satuan</th>
                        <th class="border px-4 py-2 text-center dark:border-gray-700 dark:text-gray-200">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($medicines as $medicine)
                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-700">
                        <td class="border px-4 py-2 dark:border-gray-700 dark:text-gray-100">{{ $medicine->nama_obat }}</td>
                        <td class="border px-4 py-2 dark:border-gray-700 dark:text-gray-100">{{ $medicine->satuan }}</td>
                        <td class="border px-4 py-2 text-center space-x-2 dark:border-gray-700">
                            <a href="{{ route('medicines.edit', $medicine->id) }}"
                                class="inline-block px-3 py-1 bg-yellow-400 hover:bg-yellow-500 text-white rounded dark:bg-yellow-500 dark:hover:bg-yellow-600">
                                Edit
                            </a>

                            <form action="{{ route('medicines.destroy', $medicine->id) }}" method="POST" class="inline-block"
                                onsubmit="return confirm('Yakin ingin menghapus obat ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="px-3 py-1 bg-red-600 hover:bg-red-700 text-white rounded dark:bg-red-700 dark:hover:bg-red-800">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="border px-4 py-4 text-center italic text-gray-500 dark:border-gray-700 dark:text-gray-400">Belum ada data obat.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="mt-4">
            {{ $medicines->links() }}
        </div>
    </div>
</x-app-layout>
