<x-app-layout>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if(session('success'))
                <div class="mb-4 p-4 bg-green-100 text-green-700 rounded">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <table class="min-w-full table-auto">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="border px-4 py-2">Nama</th>
                            <th class="border px-4 py-2">Tanggal Lahir</th>
                            <th class="border px-4 py-2">No HP</th>
                            <th class="border px-4 py-2" >Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($patients as $patient)
                        <tr>
                            <td class="border px-4 py-2">{{ $patient->nama }}</td>
                            <td class="border px-4 py-2">{{ $patient->tanggal_lahir}}</td>
                            <td class="border px-4 py-2">{{ $patient->no_hp }}</td>
                            <td class="border px-4 py-2 text-center">
                                <form action="{{ route('pasien.lama.registrasi', $patient->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="inline-flex items-center px-3 py-1 bg-blue-600 hover:bg-blue-700 text-white rounded">
                                        <x-heroicon-o-plus class="w-5 h-5 mr-1" />
                                        Registrasi
                                    </button>
                                </form>
                                <a href="{{ route('pasien.edit', $patient->id) }}" 
                                class="inline-flex items-center px-3 py-1 bg-blue-600 hover:bg-blue-700 text-white rounded">
                                    <x-heroicon-o-pencil-square class="w-5 h-5 mr-1" />
                                    Edit
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</x-app-layout>
