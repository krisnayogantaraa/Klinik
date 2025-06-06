<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-white">
            {{ __('Hapus Akun') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-300">
            {{ __('Setelah akun Anda dihapus, semua data dan sumber daya akan dihapus secara permanen. Sebelum menghapus akun, silakan unduh data yang ingin Anda simpan.') }}
        </p>
    </header>

    <x-danger-button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
    >{{ __('Hapus Akun') }}</x-danger-button>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-6 bg-white dark:bg-gray-800 rounded-lg">
            @csrf
            @method('delete')

            <h2 class="text-lg font-medium text-gray-900 dark:text-white">
                {{ __('Apakah Anda yakin ingin menghapus akun Anda?') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600 dark:text-gray-300">
                {{ __('Setelah akun Anda dihapus, semua data dan sumber daya akan dihapus secara permanen. Masukkan kata sandi Anda untuk konfirmasi.') }}
            </p>

            <div class="mt-6">
                <x-input-label for="password" value="{{ __('Kata Sandi') }}" class="sr-only" />

                <x-text-input
                    id="password"
                    name="password"
                    type="password"
                    class="mt-1 block w-3/4 bg-gray-50 dark:bg-gray-700 text-gray-900 dark:text-white border-gray-300 dark:border-gray-600 placeholder-gray-400 dark:placeholder-gray-400"
                    placeholder="{{ __('Kata Sandi') }}"
                />

                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
            </div>

            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Batal') }}
                </x-secondary-button>

                <x-danger-button class="ml-3">
                    {{ __('Hapus Akun') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>
</section>
