<x-layouts.auth title="Masuk — donnyhidayat.blog">

    <div class="mb-8">
        <h1 class="text-2xl font-extrabold text-gray-900 mb-1">Selamat datang kembali</h1>
        <p class="text-sm text-gray-500">Masuk untuk mengakses semua produk digitalmu.</p>
    </div>

    @if($errors->any())
        <div class="flex items-center gap-2.5 bg-red-50 border border-red-100 text-red-700 text-sm rounded-xl px-4 py-3 mb-6">
            <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            {{ $errors->first() }}
        </div>
    @endif

    <form method="POST" action="/login" class="space-y-4">
        @csrf

        <div>
            <label class="block text-xs font-semibold text-gray-600 mb-1.5">Email</label>
            <div class="relative">
                <span class="absolute left-3.5 top-1/2 -translate-y-1/2 text-gray-400">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                </span>
                <input type="email" name="email" value="{{ old('email') }}" required placeholder="kamu@email.com"
                    class="w-full pl-10 pr-4 py-2.5 text-sm border border-gray-200 rounded-xl outline-none focus:border-blue-600 focus:ring-2 focus:ring-blue-100 transition">
            </div>
        </div>

        <div>
            <div class="flex justify-between items-center mb-1.5">
                <label class="text-xs font-semibold text-gray-600">Password</label>
            </div>
            <div class="relative" x-data="{ show: false }">
                <span class="absolute left-3.5 top-1/2 -translate-y-1/2 text-gray-400">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                </span>
                <input :type="show ? 'text' : 'password'" name="password" required placeholder="••••••••"
                    class="w-full pl-10 pr-10 py-2.5 text-sm border border-gray-200 rounded-xl outline-none focus:border-blue-600 focus:ring-2 focus:ring-blue-100 transition">
                <button type="button" @click="show = !show"
                        class="absolute right-3.5 top-1/2 -translate-y-1/2 text-gray-400 hover:text-gray-600">
                    <svg x-show="!show" class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                    <svg x-show="!show" x-cloak class="w-4 h-4 hidden" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"/></svg>
                </button>
            </div>
        </div>

        {{-- Captcha --}}
        @php $captcha = $captcha ?? session('captcha'); @endphp
        <div>
            <label class="block text-xs font-semibold text-gray-600 mb-1.5">
                Verifikasi: berapa hasil dari
                <span class="text-blue-700 font-extrabold">{{ $captcha['a'] }} + {{ $captcha['b'] }}</span>?
            </label>
            <div class="relative">
                <span class="absolute left-3.5 top-1/2 -translate-y-1/2 text-gray-400">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 13h.01M13 13h.01M9 7v3m4-3v3m4 3h.01"/></svg>
                </span>
                <input type="number" name="captcha" required placeholder="Jawaban"
                    class="w-full pl-10 pr-4 py-2.5 text-sm border {{ $errors->has('captcha') ? 'border-red-400 bg-red-50' : 'border-gray-200' }} rounded-xl outline-none focus:border-blue-600 focus:ring-2 focus:ring-blue-100 transition">
            </div>
            @error('captcha')
                <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex items-center justify-between">
            <label class="flex items-center gap-2 text-xs text-gray-500 cursor-pointer">
                <input type="checkbox" name="remember" class="rounded border-gray-300 accent-blue-700">
                Ingat saya
            </label>
        </div>

        <button type="submit"
                class="w-full bg-gradient-to-r from-blue-700 to-blue-600 hover:from-blue-800 hover:to-blue-700 text-white font-bold py-3 rounded-xl text-sm transition shadow-sm shadow-blue-200">
            Masuk ke Akun
        </button>
    </form>

    <div class="relative my-6">
        <div class="absolute inset-0 flex items-center"><div class="w-full border-t border-gray-100"></div></div>
        <div class="relative flex justify-center"><span class="bg-white px-3 text-xs text-gray-400">atau</span></div>
    </div>

    <a href="/register"
       class="block w-full text-center border border-gray-200 hover:border-blue-300 hover:bg-blue-50 text-gray-700 hover:text-blue-700 font-semibold py-3 rounded-xl text-sm transition">
        Buat Akun Baru
    </a>

    <p class="text-center text-xs text-gray-400 mt-6">
        Dengan masuk, kamu menyetujui <span class="text-gray-600">syarat & ketentuan</span> yang berlaku.
    </p>

</x-layouts.auth>
