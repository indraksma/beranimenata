<?php

namespace App\Livewire\Admin;

use App\Models\FutureMap;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Dashboard extends Component
{
    public int $totalMaps = 0;

    public int $commitmentCount = 0;

    /** @var array<int, array{cita_cita: string, total: int}> */
    public array $topDreams = [];

    /** @var array<int, array{date: string, total: int}> */
    public array $submissionTrend = [];

    /** @var array<int, array{id: int, submitted_at: string, nama_panggilan: string, usia: int, pendidikan_saat_ini: string, cita_cita: string, target_pendidikan: string, target_5_tahun: string, keterampilan: string, komitmen_berani: string}> */
    public array $futureMapRows = [];

    public function mount(): void
    {
        $this->totalMaps = FutureMap::count();
        $this->commitmentCount = FutureMap::whereNotNull('komitmen_berani')->count();
        $this->topDreams = FutureMap::query()
            ->select('cita_cita', DB::raw('count(*) as total'))
            ->groupBy('cita_cita')
            ->orderByDesc('total')
            ->limit(5)
            ->get()
            ->map(fn (FutureMap $map): array => [
                'cita_cita' => $map->cita_cita,
                'total' => (int) $map->total,
            ])
            ->all();
        $this->submissionTrend = FutureMap::query()
            ->selectRaw('DATE(created_at) as date, count(*) as total')
            ->groupBy('date')
            ->orderBy('date')
            ->limit(14)
            ->get()
            ->map(fn (object $row): array => [
                'date' => (string) $row->date,
                'total' => (int) $row->total,
            ])
            ->all();
        $this->futureMapRows = FutureMap::query()
            ->latest()
            ->get()
            ->map(fn (FutureMap $map): array => [
                'id' => $map->id,
                'submitted_at' => $map->created_at?->format('d/m/Y H:i') ?? '-',
                'nama_panggilan' => $map->nama_panggilan,
                'usia' => $map->usia,
                'pendidikan_saat_ini' => $map->pendidikan_saat_ini,
                'cita_cita' => $map->cita_cita,
                'target_pendidikan' => $map->target_pendidikan,
                'target_5_tahun' => $map->target_5_tahun,
                'keterampilan' => implode(', ', $map->keterampilan ?? []),
                'komitmen_berani' => $map->komitmen_berani,
            ])
            ->all();
    }

    public function render()
    {
        return view('livewire.admin.dashboard')->layout('layouts.app', ['title' => 'Admin']);
    }
}
