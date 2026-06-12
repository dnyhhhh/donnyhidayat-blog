<x-layouts.app title="Masuk — donnyhidayat.blog">
<div class="min-h-screen flex items-center justify-center px-4">
    <div class="w-full max-w-md bg-white rounded-2xl shadow-sm border border-gray-100 p-8">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Masuk</h1>

        @if($errors->any())
            <div class="bg-red-50 text-red-700 text-sm rounded-lg px-4 py-3 mb-4">{{ $errors->first() }}</div>
        @endif

        <form method="POST" action="/login" class="space-y-4">
            @csrf
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                <input type="email" name="email" value="{{ old('email') }}" required
                    class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                <input type="password" name="password" required
                    class="w-full border border-gray-300 rounded-lg px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <label class="flex items-center gap-2 text-sm text-gray-600">
                <input type="checkbox" name="remember"> Ingat saya
            </label>
            <button type="submit" class="w-full bg-blue-700 text-white font-semibold py-2.5 rounded-lg hover:bg-blue-800">
                Masuk
            </button>
        </form>
        <p class="text-sm text-center text-gray-500 mt-6">Belum punya akun? <a href="/register" class="text-blue-700 hover:underline">Daftar</a></p>
    </div>
</div>
</x-layouts.app>
