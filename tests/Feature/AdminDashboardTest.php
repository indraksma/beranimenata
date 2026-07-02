<?php

namespace Tests\Feature;

use App\Models\FutureMap;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminDashboardTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_dashboard_shows_future_map_submission_details(): void
    {
        $user = User::factory()->create();

        FutureMap::create([
            'nama_panggilan' => 'Rani',
            'usia' => 16,
            'pendidikan_saat_ini' => 'SMA',
            'cita_cita' => 'Dokter',
            'target_pendidikan' => 'Kuliah kedokteran',
            'target_5_tahun' => 'Lulus SMA dan diterima di jurusan kedokteran.',
            'keterampilan' => ['public speaking', 'bahasa Inggris'],
            'komitmen_berani' => 'Saya akan mencari informasi jurusan dan beasiswa minggu ini.',
        ]);

        $this->actingAs($user)
            ->get(route('admin.dashboard'))
            ->assertOk()
            ->assertSee('Rekap input peta masa depan')
            ->assertSee('Rani')
            ->assertSee('Dokter')
            ->assertSee('Kuliah kedokteran')
            ->assertSee('public speaking, bahasa Inggris')
            ->assertSee('Saya akan mencari informasi jurusan dan beasiswa minggu ini.');
    }
}
