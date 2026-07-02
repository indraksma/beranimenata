<div class="py-12">
    <!-- Header / Pesan Utama Section -->
    <section class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 text-center sm:text-left" data-reveal>
        <div class="grid gap-8 lg:grid-cols-12 lg:items-center">
            <div class="lg:col-span-7">
                <p class="section-kicker">BERANI MENATA</p>
                <h1 class="section-title">Berencana Hari Ini, Merencanakan Masa Depan dengan Nyata dan Terarah</h1>
                <div class="mt-6 border-l-4 border-teal-500 pl-4 italic text-slate-600 bg-white/60 p-4 rounded-r-xl shadow-sm backdrop-blur ring-1 ring-slate-100">
                    <p class="text-base md:text-lg leading-relaxed">
                        “Ketika remaja memiliki arah, mereka memiliki alasan untuk terus belajar. Ketika mereka memiliki tujuan, mereka akan lebih siap menghadapi masa depan. Karena masa depan yang berkualitas dimulai dari keputusan yang direncanakan sejak hari ini.”
                    </p>
                </div>
            </div>
            <div class="lg:col-span-5 hidden lg:block">
                <div class="relative mx-auto w-full max-w-sm">
                    <div class="absolute -inset-1 rounded-2xl bg-gradient-to-r from-teal-500 to-emerald-500 opacity-20 blur-lg"></div>
                    <div class="relative overflow-hidden rounded-2xl bg-white p-6 shadow-xl ring-1 ring-slate-200">
                        <div class="flex items-center gap-3">
                            <span class="grid size-12 place-items-center rounded-xl bg-teal-50 text-2xl">💡</span>
                            <div>
                                <h3 class="font-bold text-slate-900">Materi Edukasi</h3>
                                <p class="text-xs text-slate-500">4 Topik Utama Perencanaan</p>
                            </div>
                        </div>
                        <div class="mt-4 space-y-2 text-sm text-slate-600 font-medium">
                            <div class="flex items-center gap-2">
                                <span class="text-teal-600 font-bold">✓</span> Menata Arah Masa Depan
                            </div>
                            <div class="flex items-center gap-2">
                                <span class="text-teal-600 font-bold">✓</span> Pendewasaan Usia Perkawinan
                            </div>
                            <div class="flex items-center gap-2">
                                <span class="text-teal-600 font-bold">✓</span> Memahami Dampak Pernikahan Dini
                            </div>
                            <div class="flex items-center gap-2">
                                <span class="text-teal-600 font-bold">✓</span> Aksi Nyata Meraih Cita-Cita
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section Intro for Interactive Cards -->
    <section class="mx-auto mt-16 max-w-7xl px-4 sm:px-6 lg:px-8" data-reveal>
        <div class="border-t border-slate-200 pt-8">
            <h2 class="text-2xl font-black text-slate-900">Materi Pembelajaran Interaktif</h2>
            <p class="mt-2 text-slate-600">Silakan pilih dan buka kartu materi di bawah untuk mempelajari setiap bagian secara detail.</p>
        </div>
    </section>

    <!-- Cards Grid Section -->
    <section class="mx-auto mt-8 grid max-w-7xl items-start gap-5 px-4 sm:px-6 lg:grid-cols-2 lg:px-8">
        @foreach ($materials as $index => $material)
            <article
                class="education-card"
                x-data="{ open: false }"
                x-bind:class="open ? 'education-card-open' : ''"
                data-reveal
            >
                <button
                    class="education-card-button"
                    type="button"
                    x-on:click="open = !open"
                    x-bind:aria-expanded="open.toString()"
                    aria-controls="education-material-{{ $index }}"
                >
                    <span class="education-icon">
                        @switch($material['icon'])
                            @case('target') 🎯 @break
                            @case('heart') 💖 @break
                            @case('alert') ⚠️ @break
                            @case('rocket') 🚀 @break
                            @default 📖
                        @endswitch
                    </span>
                    <span class="min-w-0 flex-1 pr-2">
                        <span class="block text-lg font-black leading-snug text-slate-950 sm:text-xl">{{ $material['title'] }}</span>
                    </span>
                    <span class="education-chevron" aria-hidden="true" x-bind:class="open ? 'rotate-180 bg-teal-600 text-white' : ''">
                        <svg class="size-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 0 1 1.06.02L10 11.17l3.71-3.94a.75.75 0 1 1 1.08 1.04l-4.25 4.5a.75.75 0 0 1-1.08 0l-4.25-4.5a.75.75 0 0 1 .02-1.06Z" clip-rule="evenodd" />
                        </svg>
                    </span>
                </button>
                <div
                    id="education-material-{{ $index }}"
                    class="education-card-panel"
                    x-bind:class="open ? 'education-card-panel-open' : ''"
                >
                    <div class="border-t border-slate-100 pt-5">
                        {{-- Render Intro & Description --}}
                        @if (isset($material['intro']))
                            <p class="text-slate-600 leading-relaxed mb-4 text-sm sm:text-base">{{ $material['intro'] }}</p>
                        @endif
                        @if (isset($material['description']))
                            <p class="text-slate-600 leading-relaxed mb-4 text-sm sm:text-base">{{ $material['description'] }}</p>
                        @endif

                        {{-- Render Quote --}}
                        @if (isset($material['quote']))
                            <div class="border-l-4 border-teal-500 pl-4 py-2 my-4 italic text-slate-700 bg-teal-50/50 rounded-r-md pr-3 text-sm sm:text-base">
                                <p class="leading-relaxed">“{{ $material['quote'] }}”</p>
                            </div>
                        @endif

                        {{-- Render Benefits (Checklist) --}}
                        @if (isset($material['benefits_title']))
                            <h4 class="font-bold text-slate-900 mt-4 mb-2 text-sm sm:text-base">{{ $material['benefits_title'] }}</h4>
                        @endif
                        @if (isset($material['benefits']))
                            <ul class="space-y-2 mb-4">
                                @foreach ($material['benefits'] as $benefit)
                                    <li class="flex items-start gap-2.5 text-slate-600 leading-relaxed text-sm sm:text-base">
                                        <span class="text-teal-600 shrink-0 font-bold">✓</span>
                                        <span>{{ $benefit }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        @endif

                        {{-- Render Requirements (PUP) --}}
                        @if (isset($material['pre_marriage_title']))
                            <h4 class="font-bold text-slate-900 mt-4 mb-2 text-sm sm:text-base">{{ $material['pre_marriage_title'] }}</h4>
                        @endif
                        @if (isset($material['pre_marriage_intro']))
                            <p class="text-slate-600 leading-relaxed mb-3 text-sm sm:text-base">{{ $material['pre_marriage_intro'] }}</p>
                        @endif
                        @if (isset($material['requirements']))
                            <ul class="space-y-3.5 mb-4 pl-1">
                                @foreach ($material['requirements'] as $req)
                                    <li class="flex items-center gap-3 text-slate-800 leading-relaxed text-sm sm:text-base">
                                        <span class="text-xl shrink-0" aria-hidden="true">{{ $req['icon'] }}</span>
                                        <span class="font-medium text-slate-700">{{ $req['text'] }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                        @if (isset($material['pre_marriage_outro']))
                            <p class="text-slate-600 leading-relaxed mt-3 mb-4 text-sm sm:text-base">{{ $material['pre_marriage_outro'] }}</p>
                        @endif

                        {{-- Render Risks --}}
                        @if (isset($material['risks_title']))
                            <h4 class="font-bold text-slate-900 mt-4 mb-3 text-sm sm:text-base">{{ $material['risks_title'] }}</h4>
                        @endif
                        @if (isset($material['risks']))
                            <div class="space-y-4 mb-4">
                                @foreach ($material['risks'] as $risk)
                                    <div class="rounded-lg bg-slate-50/70 p-3.5 border border-slate-100 hover:border-teal-100 hover:bg-white transition duration-200">
                                        <h5 class="font-bold text-slate-900 flex items-center gap-2 text-sm sm:text-base">
                                            <span class="size-1.5 rounded-full bg-rose-500 shrink-0"></span>
                                            {{ $risk['title'] }}
                                        </h5>
                                        <p class="text-slate-600 text-xs sm:text-sm leading-relaxed mt-1.5 pl-3.5">{{ $risk['description'] }}</p>
                                    </div>
                                @endforeach
                            </div>
                        @endif

                        {{-- Render Steps --}}
                        @if (isset($material['steps_title']))
                            <h4 class="font-bold text-slate-900 mt-4 mb-3 text-sm sm:text-base">{{ $material['steps_title'] }}</h4>
                        @endif
                        @if (isset($material['steps']))
                            <div class="space-y-4 mb-4">
                                @foreach ($material['steps'] as $step)
                                    <div class="flex gap-3">
                                        <div class="flex flex-col items-center">
                                            <span class="grid size-7 place-items-center rounded-full bg-teal-600 text-white font-bold text-xs sm:text-sm shrink-0 shadow-sm">{{ $step['num'] }}</span>
                                            @if (!$loop->last)
                                                <div class="w-0.5 grow bg-teal-100 my-1"></div>
                                            @endif
                                        </div>
                                        <div class="pb-3">
                                            <h5 class="font-bold text-slate-950 text-sm sm:text-base leading-snug">{{ $step['title'] }}</h5>
                                            <p class="text-slate-600 text-xs sm:text-sm leading-relaxed mt-1">{{ $step['description'] }}</p>
                                            @if (isset($step['skills']))
                                                <div class="flex flex-wrap gap-1.5 mt-2">
                                                    @foreach ($step['skills'] as $skill)
                                                        <span class="rounded bg-teal-50 px-2.5 py-1 text-2xs sm:text-xs font-semibold text-teal-700 ring-1 ring-inset ring-teal-600/10">{{ $skill }}</span>
                                                    @endforeach
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif

                        {{-- Keep reflection box --}}
                        <div class="mt-6 rounded-lg bg-slate-50 p-4 ring-1 ring-slate-100">
                            <p class="text-sm font-semibold text-slate-700">Refleksi cepat</p>
                            <p class="mt-1 text-sm leading-6 text-slate-600">Tulis satu aksi kecil yang bisa kamu mulai setelah membaca materi ini.</p>
                        </div>
                    </div>
                </div>
            </article>
        @endforeach
    </section>

    <!-- Khas Program Quote Section -->
    <section class="mx-auto mt-16 max-w-4xl px-4 sm:px-6 lg:px-8 text-center" data-reveal>
        <div class="relative rounded-2xl bg-gradient-to-r from-teal-600 to-emerald-600 p-8 text-white shadow-xl overflow-hidden">
            <!-- Decorative background elements -->
            <div class="absolute -right-10 -top-10 size-40 rounded-full bg-teal-500/20 blur-xl"></div>
            <div class="absolute -left-10 -bottom-10 size-40 rounded-full bg-emerald-500/20 blur-xl"></div>

            <div class="relative">
                <span class="text-4xl font-serif text-teal-200">“</span>
                <blockquote class="text-xl font-bold italic md:text-2xl leading-relaxed text-white">
                    Sebelum memutuskan kapan menikah, tentukan terlebih dahulu siapa dirimu di masa depan.
                </blockquote>
                <span class="block mt-4 text-xs font-black uppercase tracking-wider text-teal-100">— CALLYSTA SALSABIL R.</span>
            </div>
        </div>
    </section>
</div>
