<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Klinik Sehat Sentosa</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="icon" type="image/png" href="{{ asset('logo.png') }}" />
</head>
<body class="antialiased bg-gray-100 dark:bg-gray-900">
    <button
        data-toggle-dark
        class="fixed top-4 right-4 z-50 bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-gray-200 px-3 py-2 rounded shadow focus:outline-none focus:ring-2 focus:ring-red-500 transition"
        type="button"
        aria-label="Toggle dark mode"
    >
        <span class="hidden dark:inline">🌞</span>
        <span class="inline dark:hidden">🌙</span>
    </button>
    <nav class="bg-white border-gray-200 dark:bg-gray-800 shadow">
      <div class="max-w-7xl mx-auto flex flex-wrap items-center justify-between p-4">
        <a href="#" class="flex items-center">
          <img src="/logo.png" class="h-10 w-10 rounded-full mr-3" alt="Logo Klinik" />
          <span class="self-center text-2xl font-bold whitespace-nowrap text-red-600">Klinik Sehat Sentosa</span>
        </a>
        <button data-collapse-toggle="navbar-default" type="button" class="inline-flex items-center p-2 ml-3 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-default" aria-expanded="false">
          <span class="sr-only">Open main menu</span>
          <svg class="w-6 h-6" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
        </button>
        <div class="hidden w-full md:block md:w-auto" id="navbar-default">
          <ul class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-800 dark:border-gray-700">
            <li><a href="#layanan" class="block py-2 pl-3 pr-4 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-red-600 md:p-0 dark:text-gray-200 dark:hover:text-red-500">Layanan</a></li>
            <li><a href="#tentang" class="block py-2 pl-3 pr-4 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-red-600 md:p-0 dark:text-gray-200 dark:hover:text-red-500">Tentang</a></li>
            <li><a href="#kontak" class="block py-2 pl-3 pr-4 text-gray-700 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-red-600 md:p-0 dark:text-gray-200 dark:hover:text-red-500">Kontak</a></li>
            @if (Route::has('login'))
                @auth
                    <li><a href="{{ url('/dashboard') }}" class="block py-2 px-4 text-white bg-red-500 rounded hover:bg-red-600 md:ml-2">Dashboard</a></li>
                @else
                    <li><a href="{{ route('login') }}" class="block py-2 px-4 text-white bg-red-500 rounded hover:bg-red-600 md:ml-2">Login</a></li>
                @endauth
            @endif
          </ul>
        </div>
      </div>
    </nav>

    <section class="flex flex-col items-center justify-center text-center py-16 px-4 bg-gradient-to-b from-red-50 to-transparent dark:from-gray-800">
      <h1 class="text-4xl sm:text-5xl font-bold text-gray-900 dark:text-white mb-4">Selamat Datang di <span class="text-red-600">Klinik Sehat Sentosa</span></h1>
      <p class="text-lg text-gray-600 dark:text-gray-300 mb-8 max-w-2xl">Melayani kesehatan Anda dan keluarga dengan sepenuh hati. Konsultasi, pemeriksaan, dan pengobatan dengan dokter profesional dan fasilitas modern.</p>
      <a href="#daftar" class="inline-block bg-red-500 hover:bg-red-600 text-white font-semibold px-8 py-3 rounded-lg shadow transition">Daftar Sekarang</a>
    </section>

    <section id="layanan" class="py-16 bg-white dark:bg-gray-800">
      <div class="max-w-5xl mx-auto px-4">
        <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-10 text-center">Layanan Kami</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
          <div class="bg-gray-50 dark:bg-gray-700 rounded-lg shadow p-6 flex flex-col items-center">
            <div class="mb-3"><i class="fa-solid fa-stethoscope text-red-500 text-3xl"></i></div>
            <h3 class="font-semibold text-lg mb-2">Pemeriksaan Umum</h3>
            <p class="text-gray-600 dark:text-gray-300 text-sm text-center">Konsultasi dan pemeriksaan kesehatan umum oleh dokter berpengalaman.</p>
          </div>
          <div class="bg-gray-50 dark:bg-gray-700 rounded-lg shadow p-6 flex flex-col items-center">
            <div class="mb-3"><i class="fa-solid fa-vials text-red-500 text-3xl"></i></div>
            <h3 class="font-semibold text-lg mb-2">Laboratorium</h3>
            <p class="text-gray-600 dark:text-gray-300 text-sm text-center">Layanan cek darah, urine, dan pemeriksaan laboratorium lainnya.</p>
          </div>
          <div class="bg-gray-50 dark:bg-gray-700 rounded-lg shadow p-6 flex flex-col items-center">
            <div class="mb-3"><i class="fa-solid fa-capsules text-red-500 text-3xl"></i></div>
            <h3 class="font-semibold text-lg mb-2">Apotek</h3>
            <p class="text-gray-600 dark:text-gray-300 text-sm text-center">Penyediaan obat-obatan lengkap dan konsultasi penggunaan obat.</p>
          </div>
        </div>
      </div>
    </section>

    <section id="tentang" class="py-16 bg-gray-50 dark:bg-gray-900">
      <div class="max-w-3xl mx-auto px-4 text-center">
        <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">Tentang Klinik</h2>
        <p class="text-gray-600 dark:text-gray-300 text-base">Klinik Sehat Sentosa telah melayani masyarakat sejak 2045 dengan komitmen memberikan pelayanan kesehatan terbaik. Didukung oleh tenaga medis profesional dan fasilitas lengkap, kami siap membantu Anda menjaga kesehatan.</p>
      </div>
    </section>

    <footer id="kontak" class="bg-gray-50 dark:bg-gray-900 p-6 text-center text-gray-600 dark:text-gray-300">
      <div class="mb-2 font-semibold">Kontak Kami</div>
      <div>Jl. Kesehatan No. 123, Jakarta</div>
      <div>Telepon: (021) 12345678 | WhatsApp: 0812-3456-7890</div>
      <div>Email: info@kliniksehat.com</div>
      <div class="mt-4 text-sm">&copy; {{ date('Y') }} Klinik Sehat Sentosa. All rights reserved.</div>
    </footer>
    <script src="https://kit.fontawesome.com/4e8e8e4e8e.js" crossorigin="anonymous"></script>
    <script>
    if (localStorage.getItem('theme') === 'dark' ||
        (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
        document.documentElement.classList.add('dark');
    } else {
        document.documentElement.classList.remove('dark');
    }
    document.querySelectorAll('[data-toggle-dark]').forEach(btn => {
        btn.onclick = function() {
            document.documentElement.classList.toggle('dark');
            localStorage.setItem('theme',
                document.documentElement.classList.contains('dark') ? 'dark' : 'light'
            );
        }
    });
    </script>
</body>
</html>
