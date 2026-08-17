<x-guest-layout>
    <div class="mb-6 text-sm text-slate-600 font-medium">
        {{ __('Kami telah mengirimkan kode verifikasi 6 digit ke alamat email Anda. Silakan masukkan kode tersebut di bawah ini untuk melanjutkan masuk ke Dashboard Admin.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('2fa.store') }}">
        @csrf

        <!-- 2FA Code -->
        <div>
            <x-input-label for="two_factor_code" value="Kode Verifikasi (6 Digit)" />
            <x-text-input id="two_factor_code" class="block mt-1 w-full text-center tracking-[0.5em] text-2xl font-bold py-3" type="text" name="two_factor_code" required autofocus maxlength="6" pattern="[0-9]{6}" placeholder="------" />
            <x-input-error :messages="$errors->get('two_factor_code')" class="mt-2" />
        </div>

        <div class="flex items-center justify-between mt-8">
            <a class="text-sm text-slate-500 hover:text-slate-800 underline transition-colors" href="{{ route('login') }}">
                {{ __('Kembali ke Login') }}
            </a>

            <x-primary-button class="ms-4 shadow-lg shadow-orange-500/30">
                {{ __('Verifikasi') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
