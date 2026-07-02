<?php

namespace App\Livewire;

use App\Models\FutureMap;
use Illuminate\Validation\Rule;
use Livewire\Component;

class FutureMapForm extends Component
{
    public int $step = 1;

    public bool $submitted = false;

    public ?FutureMap $futureMap = null;

    public string $nama_panggilan = '';

    public ?int $usia = null;

    public string $pendidikan_saat_ini = '';

    public string $cita_cita = '';

    public string $target_pendidikan = '';

    public string $target_5_tahun = '';

    public string $keterampilan = '';

    public string $komitmen_berani = '';

    public bool $setuju_komitmen = false;

    /** @var array<string, string> */
    protected array $messages = [
        'setuju_komitmen.accepted' => 'Kamu wajib menyetujui komitmen ini untuk menyelesaikan peta masa depan.',
    ];

    /** @return array<string, mixed> */
    protected function rules(): array
    {
        return [
            'nama_panggilan' => ['required', 'string', 'max:80'],
            'usia' => ['required', 'integer', 'min:10', 'max:24'],
            'pendidikan_saat_ini' => ['required', Rule::in(['SD', 'SMP', 'SMA', 'Kuliah', 'Lainnya'])],
            'cita_cita' => ['required', 'string', 'max:120'],
            'target_pendidikan' => ['required', 'string', 'max:160'],
            'target_5_tahun' => ['required', 'string', 'min:15', 'max:1000'],
            'keterampilan' => ['required', 'string', 'min:3', 'max:800'],
            'komitmen_berani' => ['required', 'string', 'min:10', 'max:1000'],
            'setuju_komitmen' => ['accepted'],
        ];
    }

    public function nextStep(): void
    {
        $this->validate($this->rulesForStep($this->step));
        $this->step = min(4, $this->step + 1);
    }

    public function previousStep(): void
    {
        $this->step = max(1, $this->step - 1);
    }

    public function submit(): void
    {
        $this->validate();

        $this->futureMap = FutureMap::create([
            'nama_panggilan' => $this->nama_panggilan,
            'usia' => $this->usia,
            'pendidikan_saat_ini' => $this->pendidikan_saat_ini,
            'cita_cita' => $this->cita_cita,
            'target_pendidikan' => $this->target_pendidikan,
            'target_5_tahun' => $this->target_5_tahun,
            'keterampilan' => $this->skillsAsArray(),
            'komitmen_berani' => $this->komitmen_berani,
        ]);

        $this->submitted = true;
    }

    /** @return array<string, mixed> */
    private function rulesForStep(int $step): array
    {
        return match ($step) {
            1 => [
                'nama_panggilan' => $this->rules()['nama_panggilan'],
                'usia' => $this->rules()['usia'],
                'pendidikan_saat_ini' => $this->rules()['pendidikan_saat_ini'],
            ],
            2 => [
                'cita_cita' => $this->rules()['cita_cita'],
                'target_pendidikan' => $this->rules()['target_pendidikan'],
                'target_5_tahun' => $this->rules()['target_5_tahun'],
            ],
            3 => ['keterampilan' => $this->rules()['keterampilan']],
            default => [
                'komitmen_berani' => $this->rules()['komitmen_berani'],
                'setuju_komitmen' => $this->rules()['setuju_komitmen'],
            ],
        };
    }

    /** @return array<int, string> */
    private function skillsAsArray(): array
    {
        return collect(preg_split('/[\n,]+/', $this->keterampilan) ?: [])
            ->map(fn (string $skill): string => trim($skill))
            ->filter()
            ->values()
            ->all();
    }

    public function render()
    {
        return view('livewire.future-map-form')->layout('layouts.app', ['title' => 'Peta Arah Masa Depan']);
    }
}
