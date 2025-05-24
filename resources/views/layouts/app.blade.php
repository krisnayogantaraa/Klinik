<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Klinik</title>
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <link rel="icon" type="image/png" href="{{ asset('logo.png') }}" />
    </head>
    <body class="font-sans antialiased">
        <button
            data-toggle-dark
            class="fixed top-4 right-4 z-50 bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-gray-200 px-3 py-2 rounded shadow focus:outline-none focus:ring-2 focus:ring-red-500 transition"
            type="button"
            aria-label="Toggle dark mode"
        >
            <span class="hidden dark:inline">🌞</span>
            <span class="inline dark:hidden">🌙</span>
        </button>
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            @include('layouts.navigation')
            @if (isset($header))
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif
            <main>
                {{ $slot }}
            </main>
        </div>
        @stack('scripts')
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
