<div class="py-10">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="mb-8 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between" data-reveal>
            <div>
                <p class="section-kicker">Dashboard Admin</p>
                <h1 class="section-title">Ringkasan dampak program.</h1>
            </div>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="btn-secondary" type="submit">Keluar</button>
            </form>
        </div>

        <section class="grid gap-5 md:grid-cols-3">
            <div class="stat-card" data-reveal>
                <span class="stat-number" data-counter="{{ $totalMaps }}">0</span>
                <span class="stat-label">Total pengguna mengisi</span>
            </div>
            <div class="stat-card" data-reveal>
                <span class="stat-number" data-counter="{{ $commitmentCount }}">0</span>
                <span class="stat-label">Komitmen dibuat</span>
            </div>
            <div class="stat-card" data-reveal>
                <span class="stat-number" data-counter="{{ count($topDreams) }}">0</span>
                <span class="stat-label">Ragam cita-cita teratas</span>
            </div>
        </section>

        <section class="mt-8 grid gap-6 lg:grid-cols-2">
            <div class="rounded-lg border border-slate-200 bg-white p-5 shadow-sm" data-reveal>
                <h2 class="text-lg font-bold">Cita-cita paling banyak</h2>
                <div class="mt-4 h-72">
                    <canvas id="dreamChart"></canvas>
                </div>
            </div>
            <div class="rounded-lg border border-slate-200 bg-white p-5 shadow-sm" data-reveal>
                <h2 class="text-lg font-bold">Tren submission</h2>
                <div class="mt-4 h-72">
                    <canvas id="trendChart"></canvas>
                </div>
            </div>
        </section>

        <section class="mt-8 rounded-lg border border-slate-200 bg-white p-5 shadow-sm" data-reveal>
            <div class="flex flex-col gap-1 sm:flex-row sm:items-end sm:justify-between">
                <div>
                    <h2 class="text-lg font-bold">Rekap input peta masa depan</h2>
                    <p class="mt-1 text-sm text-slate-500">Detail semua data yang sudah diinput user dan tersimpan di database.</p>
                </div>
                <span class="text-sm font-semibold text-slate-500">{{ count($futureMapRows) }} data</span>
            </div>
            <div class="mt-4 overflow-x-auto">
                <table class="w-full min-w-[58rem] text-left text-sm">
                    <thead class="border-b border-slate-200 text-slate-500">
                        <tr>
                            <th class="py-3 pr-4 font-semibold">Waktu input</th>
                            <th class="py-3 pr-4 font-semibold">Nama</th>
                            <th class="py-3 pr-4 font-semibold">Usia</th>
                            <th class="py-3 pr-4 font-semibold">Pendidikan</th>
                            <th class="py-3 pr-4 font-semibold">Cita-cita</th>
                            <th class="py-3 pr-4 font-semibold">Target pendidikan</th>
                            <th class="py-3 pr-4 font-semibold">Kendala</th>
                            <th class="py-3 pr-4 font-semibold">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 align-top">
                        @forelse ($futureMapRows as $row)
                            <tr>
                                <td class="py-3 pr-4 whitespace-nowrap text-slate-500">{{ $row['submitted_at'] }}</td>
                                <td class="py-3 pr-4 font-semibold text-slate-900">{{ $row['nama_panggilan'] }}</td>
                                <td class="py-3 pr-4 text-slate-600">{{ $row['usia'] }}</td>
                                <td class="py-3 pr-4 text-slate-600">{{ $row['pendidikan_saat_ini'] }}</td>
                                <td class="py-3 pr-4 font-semibold text-slate-800">{{ $row['cita_cita'] }}</td>
                                <td class="py-3 pr-4 text-slate-600">{{ $row['target_pendidikan'] }}</td>
                                <td class="py-3 pr-4 text-slate-600">{{ $row['pernah_mengalami_kendala'] }}</td>
                                <td class="py-3 pr-4">
                                    <button class="btn-secondary px-3 py-2 text-xs" type="button" onclick="document.getElementById('future-map-detail-{{ $row['id'] }}').showModal()">Detail</button>
                                    <dialog id="future-map-detail-{{ $row['id'] }}" class="w-[min(44rem,calc(100vw-2rem))] rounded-lg border border-slate-200 bg-white p-0 shadow-2xl backdrop:bg-slate-950/50">
                                        <div class="border-b border-slate-200 p-5">
                                            <div class="flex items-start justify-between gap-4">
                                                <div>
                                                    <p class="text-sm font-semibold text-teal-700">{{ $row['submitted_at'] }}</p>
                                                    <h3 class="mt-1 text-xl font-black text-slate-950">Detail {{ $row['nama_panggilan'] }}</h3>
                                                </div>
                                                <form method="dialog">
                                                    <button class="btn-secondary px-3 py-2 text-xs" type="submit">Tutup</button>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="max-h-[72vh] space-y-4 overflow-y-auto p-5 text-sm">
                                            <div>
                                                <span class="block font-semibold text-slate-500">Data diri</span>
                                                <p class="mt-1 font-semibold text-slate-900">{{ $row['nama_panggilan'] }}, {{ $row['usia'] }} tahun, {{ $row['pendidikan_saat_ini'] }}</p>
                                            </div>
                                            <div>
                                                <span class="block font-semibold text-slate-500">Cita-cita</span>
                                                <p class="mt-1 text-slate-800">{{ $row['cita_cita'] }}</p>
                                            </div>
                                            <div>
                                                <span class="block font-semibold text-slate-500">Target pendidikan</span>
                                                <p class="mt-1 text-slate-800">{{ $row['target_pendidikan'] }}</p>
                                            </div>
                                            <div>
                                                <span class="block font-semibold text-slate-500">Target 5 tahun</span>
                                                <p class="mt-1 whitespace-pre-line text-slate-800">{{ $row['target_5_tahun'] }}</p>
                                            </div>
                                            <div>
                                                <span class="block font-semibold text-slate-500">Pernah mengalami kendala</span>
                                                <p class="mt-1 text-slate-800">{{ $row['pernah_mengalami_kendala'] }}</p>
                                            </div>
                                            <div>
                                                <span class="block font-semibold text-slate-500">Cara mengatasi kendala</span>
                                                <p class="mt-1 whitespace-pre-line text-slate-800">{{ $row['cara_mengatasi_kendala'] }}</p>
                                            </div>
                                            <div>
                                                <span class="block font-semibold text-slate-500">Keterampilan</span>
                                                <p class="mt-1 text-slate-800">{{ $row['keterampilan'] }}</p>
                                            </div>
                                            <div>
                                                <span class="block font-semibold text-slate-500">Komitmen BERANI</span>
                                                <p class="mt-1 whitespace-pre-line text-slate-800">{{ $row['komitmen_berani'] }}</p>
                                            </div>
                                        </div>
                                    </dialog>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td class="py-6 text-slate-500" colspan="8">Belum ada data peta masa depan.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </section>

        <section class="mt-8 rounded-lg border border-slate-200 bg-white p-5 shadow-sm" data-reveal>
            <h2 class="text-lg font-bold">Detail cita-cita</h2>
            <div class="mt-4 overflow-x-auto">
                <table class="w-full min-w-96 text-left text-sm">
                    <thead class="border-b border-slate-200 text-slate-500">
                        <tr>
                            <th class="py-3 pr-4 font-semibold">Cita-cita</th>
                            <th class="py-3 pr-4 font-semibold">Jumlah</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        @forelse ($topDreams as $dream)
                            <tr>
                                <td class="py-3 pr-4 font-semibold text-slate-800">{{ $dream['cita_cita'] }}</td>
                                <td class="py-3 pr-4 text-slate-600">{{ $dream['total'] }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td class="py-6 text-slate-500" colspan="2">Belum ada data peta masa depan.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </section>
    </div>

    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.7/dist/chart.umd.min.js" onload="window.bootGenreInteractions && window.bootGenreInteractions()"></script>
        <script>
            window.genreCharts = {
                dreams: @json($topDreams),
                trend: @json($submissionTrend),
            };
        </script>
    @endpush
</div>
