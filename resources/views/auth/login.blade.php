<x-layouts.app title="Login Admin">
    <section class="mx-auto grid min-h-[calc(100vh-4rem)] max-w-7xl place-items-center px-4 py-12 sm:px-6 lg:px-8">
        <div class="w-full max-w-md rounded-lg border border-slate-200 bg-white p-6 shadow-sm">
            <div class="mb-6">
                <p class="text-sm font-semibold text-teal-700">Admin BERANI MENATA</p>
                <h1 class="mt-2 text-2xl font-bold text-slate-950">Masuk Dashboard</h1>
            </div>

            <form method="POST" action="{{ route('login') }}" class="space-y-4">
                @csrf
                <label class="block">
                    <span class="form-label">Email</span>
                    <input class="form-input" type="email" name="email" value="{{ old('email') }}" required autofocus>
                    @error('email') <span class="form-error">{{ $message }}</span> @enderror
                </label>
                <label class="block">
                    <span class="form-label">Password</span>
                    <input class="form-input" type="password" name="password" required>
                    @error('password') <span class="form-error">{{ $message }}</span> @enderror
                </label>
                <label class="flex items-center gap-2 text-sm text-slate-600">
                    <input class="size-4 rounded border-slate-300 text-teal-600 focus:ring-teal-500" type="checkbox" name="remember">
                    Ingat saya
                </label>
                <button class="btn-primary w-full" type="submit">Masuk</button>
            </form>
        </div>
    </section>
</x-layouts.app>
