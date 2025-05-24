<x-app-layout>

    <div class="p-4">
        <p>Selamat datang, perawat {{ Auth::user()->nama_lengkap }}</p>
        <!-- Tambahkan tombol/menu khusus dokter di sini -->
    </div>
</x-app-layout>