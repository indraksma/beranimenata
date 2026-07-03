<div class="bg-slate-50 py-12">
    <div class="mx-auto max-w-5xl px-4 sm:px-6 lg:px-8">
        @if (! $submitted)
            <div class="mb-8">
                <p class="section-kicker">Peta Arah Masa Depan</p>
                <h1 class="section-title">Susun rencana yang bisa kamu mulai.</h1>
            </div>

            <div class="rounded-lg border border-slate-200 bg-white p-5 shadow-sm sm:p-8">
                <div class="mb-8">
                    <div class="mb-3 flex items-center justify-between text-sm font-semibold text-slate-600">
                        <span>Step {{ $step }} dari 4</span>
                        <span>{{ ['Data Diri', 'Cita-Cita', 'Keterampilan', 'Komitmen'][$step - 1] }}</span>
                    </div>
                    <div class="h-3 rounded-full bg-slate-100">
                        <div class="h-3 rounded-full bg-teal-600 transition-all duration-300" style="width: {{ $step * 25 }}%"></div>
                    </div>
                </div>

                <form wire:submit="submit">
                    <div class="min-h-[24rem]" x-data="{ step: @entangle('step') }" x-transition.opacity>
                        @if ($step === 1)
                            <div class="form-grid" wire:key="future-map-step-1">
                                <label class="block">
                                    <span class="form-label">Nama panggilan</span>
                                    <input class="form-input" type="text" wire:model="nama_panggilan" wire:key="field-nama-panggilan" placeholder="Contoh: Rani">
                                    @error('nama_panggilan') <span class="form-error">{{ $message }}</span> @enderror
                                </label>
                                <label class="block">
                                    <span class="form-label">Usia</span>
                                    <input class="form-input" type="number" min="10" max="24" wire:model="usia" wire:key="field-usia" placeholder="Contoh: 16">
                                    @error('usia') <span class="form-error">{{ $message }}</span> @enderror
                                </label>
                                <label class="block sm:col-span-2">
                                    <span class="form-label">Pendidikan saat ini</span>
                                    <select class="form-input" wire:model="pendidikan_saat_ini" wire:key="field-pendidikan-saat-ini">
                                        <option value="">Pilih pendidikan</option>
                                        @foreach (['SD', 'SMP', 'SMA', 'Kuliah', 'Lainnya'] as $level)
                                            <option value="{{ $level }}">{{ $level }}</option>
                                        @endforeach
                                    </select>
                                    @error('pendidikan_saat_ini') <span class="form-error">{{ $message }}</span> @enderror
                                </label>
                            </div>
                        @elseif ($step === 2)
                            <div class="space-y-5" wire:key="future-map-step-2">
                                <label class="block">
                                    <span class="form-label">Cita-cita</span>
                                    <input class="form-input" type="text" wire:model="cita_cita" wire:key="field-cita-cita" placeholder="Contoh: Dokter, desainer, pengusaha">
                                    @error('cita_cita') <span class="form-error">{{ $message }}</span> @enderror
                                </label>
                                <label class="block">
                                    <span class="form-label">Target pendidikan</span>
                                    <input class="form-input" type="text" wire:model="target_pendidikan" wire:key="field-target-pendidikan" placeholder="Contoh: Lulus SMA dan kuliah di jurusan kesehatan">
                                    @error('target_pendidikan') <span class="form-error">{{ $message }}</span> @enderror
                                </label>
                                <label class="block">
                                    <span class="form-label">Target 5 tahun ke depan</span>
                                    <textarea class="form-input min-h-32" wire:model="target_5_tahun" wire:key="field-target-5-tahun" placeholder="Tuliskan target yang ingin kamu capai."></textarea>
                                    @error('target_5_tahun') <span class="form-error">{{ $message }}</span> @enderror
                                </label>
                                <label class="block">
                                    <span class="form-label">Apakah kamu pernah mengalami kendala dalam mencapai cita-citamu?</span>
                                    <select class="form-input" wire:model.live="pernah_mengalami_kendala" wire:key="field-pernah-mengalami-kendala">
                                        <option value="">Pilih jawaban</option>
                                        <option value="Ya">Ya</option>
                                        <option value="Tidak">Tidak</option>
                                    </select>
                                    @error('pernah_mengalami_kendala') <span class="form-error">{{ $message }}</span> @enderror
                                </label>
                                @if ($pernah_mengalami_kendala === 'Ya')
                                    <label class="block">
                                        <span class="form-label">Kalau iya, apakah kendala tersebut sudah berhasil kamu atasi? Jika sudah, bagaimana cara kamu mengatasinya?</span>
                                        <textarea class="form-input min-h-32" wire:model="cara_mengatasi_kendala" wire:key="field-cara-mengatasi-kendala" placeholder="Contoh: Saya berdiskusi dengan guru BK dan membuat jadwal belajar yang lebih teratur."></textarea>
                                        @error('cara_mengatasi_kendala') <span class="form-error">{{ $message }}</span> @enderror
                                    </label>
                                @endif
                            </div>
                        @elseif ($step === 3)
                            <label class="block" wire:key="future-map-step-3">
                                <span class="form-label">Keterampilan yang ingin dikembangkan</span>
                                <textarea class="form-input min-h-44" wire:model="keterampilan" wire:key="field-keterampilan" placeholder="Pisahkan dengan koma atau baris baru. Contoh: public speaking, bahasa Inggris, desain"></textarea>
                                @error('keterampilan') <span class="form-error">{{ $message }}</span> @enderror
                            </label>
                        @else
                            <div class="space-y-6" wire:key="future-map-step-4">
                                <!-- Narasi BERANI MENATA -->
                                <div class="rounded-xl bg-teal-50/70 p-5 ring-1 ring-teal-100/80">
                                    <h3 class="text-base font-bold text-teal-800 flex items-center gap-2">
                                        <span class="text-lg">📢</span>
                                        BERANI MENATA
                                    </h3>
                                    <p class="mt-1 text-xs text-teal-600 font-semibold italic">
                                        (Berencana Hari Ini, Merencanakan Masa Depan dengan Nyata dan Terarah)
                                    </p>
                                    
                                    <h4 class="mt-4 text-sm font-bold text-slate-800">Mengapa BERANI MENATA?</h4>
                                    <p class="mt-1.5 text-xs sm:text-sm leading-relaxed text-slate-600">
                                        Pada tahun 2024, Jawa Tengah mencatat 7.903 kasus pernikahan anak. Fenomena ini menunjukkan bahwa masih banyak remaja yang menghadapi tantangan dalam merencanakan masa depan secara matang. Di balik setiap angka tersebut terdapat mimpi yang tertunda dan potensi yang belum berkembang secara optimal. Karena itu, BERANI MENATA hadir untuk membantu remaja menyusun pendidikan, karier, dan kehidupan berkeluarga yang lebih terarah.
                                    </p>
                                </div>

                                <!-- Textarea Input -->
                                <label class="block">
                                    <span class="form-label">Apa langkah pertama yang akan kamu lakukan untuk mendekatkan diri pada cita-citamu?</span>
                                    <textarea class="form-input min-h-32" wire:model="komitmen_berani" wire:key="field-komitmen-berani" placeholder="Saya akan mulai mencari informasi jurusan dan beasiswa minggu ini."></textarea>
                                    @error('komitmen_berani') <span class="form-error">{{ $message }}</span> @enderror
                                </label>

                                <!-- Checklist Komitmen -->
                                <div class="rounded-xl border border-slate-200 bg-slate-50/50 p-4 hover:border-teal-200 transition duration-200">
                                    <label class="flex items-start gap-3 cursor-pointer select-none">
                                        <input class="mt-1 size-5 rounded border-slate-300 text-teal-600 focus:ring-teal-500 focus:ring-offset-0 cursor-pointer" type="checkbox" wire:model="setuju_komitmen" wire:key="field-setuju-komitmen">
                                        <div class="text-sm">
                                            <span class="block font-bold text-slate-900">Saya menyatakan komitmen</span>
                                            <span class="block mt-0.5 text-xs leading-relaxed text-slate-500">
                                                Saya secara sadar berkomitmen penuh untuk terus belajar, mengembangkan potensi diri, dan merencanakan masa depan dengan nyata dan terarah demi mewujudkan cita-cita.
                                            </span>
                                        </div>
                                    </label>
                                    @error('setuju_komitmen') <span class="form-error mt-2">{{ $message }}</span> @enderror
                                </div>
                            </div>
                        @endif
                    </div>

                    <div class="mt-8 flex items-center justify-between gap-3">
                        <button class="btn-secondary" type="button" wire:click="previousStep" @disabled($step === 1)>Kembali</button>
                        @if ($step < 4)
                            <button class="btn-primary" type="button" wire:click="nextStep">Lanjut</button>
                        @else
                            <button class="btn-primary" type="submit">Simpan Peta Masa Depan</button>
                        @endif
                    </div>
                </form>
            </div>
        @else
            <div class="grid gap-8 lg:grid-cols-[1fr_.72fr]">
                <div id="future-map-card" class="rounded-lg border-2 border-teal-200 bg-white p-6 shadow-lg">
                    <p class="section-kicker">Kartu Pencapaian</p>
                    <h1 class="mt-2 text-3xl font-black text-slate-950">Peta Masa Depan {{ $futureMap->nama_panggilan }}</h1>
                    <div class="mt-6 grid gap-4">
                        <div class="summary-row"><span>Cita-cita</span><strong>{{ $futureMap->cita_cita }}</strong></div>
                        <div class="summary-row"><span>Target pendidikan</span><strong>{{ $futureMap->target_pendidikan }}</strong></div>
                        <div class="summary-row"><span>Target 5 tahun</span><strong>{{ $futureMap->target_5_tahun }}</strong></div>
                        <div class="summary-row"><span>Pernah mengalami kendala</span><strong>{{ $futureMap->pernah_mengalami_kendala }}</strong></div>
                        @if ($futureMap->cara_mengatasi_kendala)
                            <div class="summary-row"><span>Cara mengatasi kendala</span><strong>{{ $futureMap->cara_mengatasi_kendala }}</strong></div>
                        @endif
                        <div class="summary-row"><span>Keterampilan</span><strong>{{ implode(', ', $futureMap->keterampilan ?? []) }}</strong></div>
                        <div class="rounded-lg bg-teal-50 p-5">
                            <span class="text-sm font-semibold text-teal-700">Komitmen BERANI</span>
                            <p class="mt-2 text-lg font-bold text-slate-950">{{ $futureMap->komitmen_berani }}</p>
                        </div>
                    </div>
                </div>
                <div class="rounded-lg border border-slate-200 bg-white p-6 shadow-sm">
                    <h2 class="text-xl font-bold">Langkah berikutnya</h2>
                    <p class="mt-3 text-slate-600">Pelajari materi singkat tentang perencanaan masa depan, PUP, dan cara menjaga arah cita-cita.</p>
                    <div class="mt-6 grid gap-3">
                        <button class="btn-secondary" type="button" data-download-card>Download sebagai gambar</button>
                        <a class="btn-primary text-center" href="{{ route('education') }}" wire:navigate>Lanjut ke Sudut Edukasi</a>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>
