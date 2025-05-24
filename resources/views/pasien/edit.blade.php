<x-app-layout>

    <div class="py-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 rounded shadow">
                <form action="{{ route('pasien.update', $pasien->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label class="block text-gray-700">Nama</label>
                        <input type="text" name="nama" class="w-full border p-2 rounded" value="{{ old('nama', $pasien->nama) }}">
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700">Tanggal Lahir</label>
                        <input type="date" name="tanggal_lahir" class="w-full border p-2 rounded" value="{{ old('tanggal_lahir', $pasien->tanggal_lahir) }}">
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700">Jenis Kelamin</label>
                        <select name="jenis_kelamin" class="w-full border p-2 rounded">
                            <option value="L" {{ old('jenis_kelamin', $pasien->jenis_kelamin) == 'L' ? 'selected' : '' }}>Laki-laki</option>
                            <option value="P" {{ old('jenis_kelamin', $pasien->jenis_kelamin) == 'P' ? 'selected' : '' }}>Perempuan</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700">No HP</label>
                        <input type="text" name="no_hp" class="w-full border p-2 rounded" value="{{ old('no_hp', $pasien->no_hp) }}">
                    </div>

                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
