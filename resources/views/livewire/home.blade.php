<div>
    <section class="relative overflow-hidden bg-slate-950 text-white">
        <img class="absolute inset-0 h-full w-full object-cover opacity-55" src="https://images.unsplash.com/photo-1529156069898-49953e39b3ac?auto=format&fit=crop&w=1800&q=80" alt="Remaja berdiskusi tentang masa depan">
        <div class="absolute inset-0 bg-gradient-to-r from-slate-950 via-slate-950/78 to-teal-700/55"></div>
        <div class="relative mx-auto grid min-h-[calc(100vh-4rem)] max-w-7xl items-center gap-10 px-4 py-16 sm:px-6 lg:grid-cols-[1.05fr_.95fr] lg:px-8">
            <div class="max-w-3xl" data-reveal>
                <p class="mb-4 inline-flex rounded-full bg-white/12 px-4 py-2 text-sm font-semibold text-teal-100 ring-1 ring-white/20">Program untuk Duta GenRe</p>
                <h1 class="text-4xl font-black leading-tight sm:text-6xl">Rencanakan Masa Depanmu, Wujudkan Impianmu.</h1>
                <p class="mt-6 max-w-2xl text-lg leading-8 text-slate-100">Peta Arah Masa Depan membantu remaja menyusun tujuan pendidikan, karier, keterampilan, dan komitmen BERANI MENATA. Fokusnya bukan sekadar menunda pernikahan, tetapi membangun kesiapan hidup yang lebih matang.</p>
                <a class="btn-hero mt-8 inline-flex" href="{{ route('future-map') }}" wire:navigate>Mulai Petakan Masa Depan</a>
            </div>
            <div class="hidden lg:block" data-reveal>
                <div class="rounded-lg border border-white/20 bg-white/10 p-5 shadow-2xl backdrop-blur">
                    <div class="aspect-[4/5] overflow-hidden rounded-md">
                        <img class="h-full w-full object-cover" src="{{ asset('foto2.jpeg') }}" alt="Duta BERANI MENATA bersama remaja">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-white py-16">
        <div class="mx-auto grid max-w-7xl gap-8 px-4 sm:px-6 lg:grid-cols-3 lg:px-8">
            <div class="stat-card" data-reveal>
                <span class="stat-number" data-counter="{{ $futureMapCount }}">0</span>
                <span class="stat-label">Peta masa depan dibuat</span>
            </div>
            <div class="stat-card" data-reveal>
                <span class="stat-number" data-counter="{{ $commitmentCount }}">0</span>
                <span class="stat-label">Komitmen BERANI tertulis</span>
            </div>
            <div class="stat-card" data-reveal>
                <span class="stat-number" data-counter="4">0</span>
                <span class="stat-label">Materi edukasi remaja</span>
            </div>
        </div>
    </section>

    <section class="py-16">
        <div class="mx-auto grid max-w-7xl items-center gap-10 px-4 sm:px-6 lg:grid-cols-2 lg:px-8">
            <div data-reveal>
                <p class="section-kicker">Materi Pengantar</p>
                <h2 class="section-title">Keputusan besar perlu arah yang jelas.</h2>
                <p class="mt-5 text-lg leading-8 text-slate-600">Pendidikan, karier, dan kehidupan pribadi saling terhubung. Saat remaja punya rencana yang realistis, mereka lebih siap memilih prioritas, mencari dukungan, dan memahami pentingnya Pendewasaan Usia Perkawinan.</p>
                <div class="mt-8 grid gap-4 sm:grid-cols-2">
                    <div class="feature-card">
                        <span class="feature-icon">1</span>
                        <h3 class="font-bold">Tujuan</h3>
                        <p class="text-sm text-slate-600">Menentukan cita-cita dan target pendidikan.</p>
                    </div>
                    <div class="feature-card">
                        <span class="feature-icon">2</span>
                        <h3 class="font-bold">Langkah</h3>
                        <p class="text-sm text-slate-600">Menyusun komitmen pertama yang bisa dilakukan.</p>
                    </div>
                </div>
            </div>
            <div class="rounded-lg border border-slate-200 bg-white p-6 shadow-sm" data-reveal>
                <div class="grid gap-4">
                    <div class="rounded-lg bg-teal-50 p-5">
                        <p class="text-sm font-semibold text-teal-700">Peta Pribadi</p>
                        <p class="mt-2 text-2xl font-bold text-slate-950">Cita-cita, pendidikan, keterampilan, komitmen.</p>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="rounded-lg bg-white p-4 ring-1 ring-slate-200">
                            <p class="text-sm text-slate-500">Fokus</p>
                            <p class="mt-1 font-bold">Belajar</p>
                        </div>
                        <div class="rounded-lg bg-white p-4 ring-1 ring-slate-200">
                            <p class="text-sm text-slate-500">Aksi</p>
                            <p class="mt-1 font-bold">Mulai minggu ini</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
