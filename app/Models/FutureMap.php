<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable([
    'nama_panggilan',
    'usia',
    'pendidikan_saat_ini',
    'cita_cita',
    'target_pendidikan',
    'target_5_tahun',
    'keterampilan',
    'komitmen_berani',
])]
class FutureMap extends Model
{
    /**
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'keterampilan' => 'array',
        ];
    }
}
