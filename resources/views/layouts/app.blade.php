<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ ($title ?? 'Peta Arah Masa Depan') . ' - BERANI MENATA' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body class="bg-slate-50 text-slate-900 antialiased">
    <header class="fixed inset-x-0 top-0 z-50 border-b border-white/60 bg-white/92 shadow-sm backdrop-blur">
        <nav class="mx-auto flex max-w-7xl items-center justify-between px-4 py-3 sm:px-6 lg:px-8">
            <a href="{{ route('home') }}" class="flex items-center gap-3" wire:navigate>
                <span class="grid size-10 place-items-center rounded-lg bg-teal-600 font-bold text-white">BM</span>
                <span class="leading-tight">
                    <span class="block text-sm font-bold">BERANI MENATA</span>
                    <span class="block text-xs text-slate-500">Peta Arah Masa Depan</span>
                </span>
            </a>
            <div class="flex items-center gap-1 text-sm font-semibold text-slate-700">
                <a class="nav-link" href="{{ route('home') }}" wire:navigate>Beranda</a>
                <a class="nav-link" href="{{ route('future-map') }}" wire:navigate>Peta Masa Depan</a>
                <a class="nav-link" href="{{ route('education') }}" wire:navigate>Edukasi</a>
                @auth
                    @if (request()->routeIs('admin.dashboard'))
                    <a class="nav-link" href="{{ route('admin.dashboard') }}" wire:navigate>Admin</a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button class="nav-link" type="submit">Keluar</button>
                    </form>
                    @endif
                @endauth
            </div>
        </nav>
    </header>

    <main class="min-h-screen pt-16">
        {{ $slot }}
    </main>

    <footer class="border-t border-slate-200 bg-white py-8">
        <div class="mx-auto flex max-w-7xl flex-col gap-2 px-4 text-sm text-slate-500 sm:px-6 lg:px-8">
            <strong class="text-slate-800">BERANI MENATA</strong>
            <span>Rencanakan pendidikan, karier, dan kehidupan sebelum mengambil keputusan besar.</span>
            <span class="mt-4 border-t border-slate-100 pt-4 text-xs text-slate-400">© {{ date('Y') }} BERANI MENATA - CALLYSTA SALSABIL R. All rights reserved.</span>
        </div>
    </footer>

    @livewireScripts
    @stack('scripts')
</body>
</html>
