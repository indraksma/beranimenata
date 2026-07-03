<?php

namespace Tests\Feature;

use App\Livewire\FutureMapForm;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class FutureMapFormTest extends TestCase
{
    use RefreshDatabase;

    public function test_future_map_wizard_can_submit_data(): void
    {
        Livewire::test(FutureMapForm::class)
            ->set('nama_panggilan', 'Rani')
            ->set('usia', 16)
            ->set('pendidikan_saat_ini', 'SMA')
            ->call('nextStep')
            ->assertSet('step', 2)
            ->set('cita_cita', 'Dokter')
            ->set('target_pendidikan', 'Kuliah kedokteran')
            ->set('target_5_tahun', 'Lulus SMA dan diterima di jurusan kedokteran.')
            ->set('pernah_mengalami_kendala', 'Ya')
            ->set('cara_mengatasi_kendala', 'Saya membuat jadwal belajar dan meminta arahan guru.')
            ->call('nextStep')
            ->assertSet('step', 3)
            ->set('keterampilan', 'public speaking, bahasa Inggris')
            ->call('nextStep')
            ->assertSet('step', 4)
            ->set('komitmen_berani', 'Saya akan mencari informasi jurusan dan beasiswa minggu ini.')
            ->set('setuju_komitmen', true)
            ->call('submit')
            ->assertSet('submitted', true);

        $this->assertDatabaseHas('future_maps', [
            'nama_panggilan' => 'Rani',
            'usia' => 16,
            'pendidikan_saat_ini' => 'SMA',
            'cita_cita' => 'Dokter',
            'target_pendidikan' => 'Kuliah kedokteran',
            'pernah_mengalami_kendala' => 'Ya',
            'cara_mengatasi_kendala' => 'Saya membuat jadwal belajar dan meminta arahan guru.',
        ]);
    }
}
