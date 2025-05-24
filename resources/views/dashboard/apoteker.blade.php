<x-app-layout>

    <div class="p-4">
        <p>Selamat datang, Apoteker {{ Auth::user()->nama_lengkap }}</p>
        <!-- Tambahkan tombol/menu khusus dokter di sini -->
    </div>
</x-app-layout>