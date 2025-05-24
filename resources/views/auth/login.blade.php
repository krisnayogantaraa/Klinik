<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login - Klinik Sehat Sentosa</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="icon" type="image/png" href="{{ asset('logo.png') }}" />
</head>
<body class="font-sans antialiased bg-gray-100 dark:bg-gray-900">
    <button
        data-toggle-dark
        class="fixed top-4 right-4 z-50 bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-gray-200 px-3 py-2 rounded shadow focus:outline-none focus:ring-2 focus:ring-red-500 transition"
        type="button"
        aria-label="Toggle dark mode"
    >
        <span class="hidden dark:inline">🌞</span>
        <span class="inline dark:hidden">🌙</span>
    </button>
    <div class="min-h-screen flex flex-col justify-center items-center">
        <div class="w-full max-w-md bg-white dark:bg-gray-800 rounded-lg shadow-lg p-8 mt-8">
            <div class="flex flex-col items-center mb-6">
                <img src="/logo.png" class="h-14 w-14 rounded-full mb-2" alt="Logo Klinik" />
                <h1 class="text-2xl font-bold text-red-600 mb-1">Klinik Sehat Sentosa</h1>
                <p class="text-gray-600 dark:text-gray-300 text-sm">Silakan login untuk melanjutkan</p>
            </div>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}" class="space-y-6">
                @csrf

                <!-- Email Address -->
                <div>
                    <x-input-label for="email" :value="__('Email')" class="text-gray-900 dark:text-white" />
                    <x-text-input id="email" class="block mt-1 w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div>
                    <x-input-label for="password" :value="__('Password')" class="text-gray-900 dark:text-white" />
                    <x-text-input id="password" class="block mt-1 w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" type="password" name="password" required autocomplete="current-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Remember Me -->
                <div class="flex items-center justify-between">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-red-600 shadow-sm focus:ring-red-500" name="remember">
                        <span class="ml-2 text-sm text-gray-600 dark:text-gray-300">{{ __('Remember me') }}</span>
                    </label>
                </div>

                <div>
                    <button type="submit" class="w-full text-white bg-red-500 hover:bg-red-600 font-semibold rounded-lg text-base px-6 py-2.5 text-center transition">Log in</button>
                </div>
            </form>
        </div>
    </div>
    @stack('scripts')
    <script>
    // Set dark mode sesuai preferensi user
    if (localStorage.getItem('theme') === 'dark' ||
        (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
        document.documentElement.classList.add('dark');
    } else {
        document.documentElement.classList.remove('dark');
    }
    // Toggle dan simpan preferensi
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
