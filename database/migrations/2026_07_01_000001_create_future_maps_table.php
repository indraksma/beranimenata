<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('future_maps', function (Blueprint $table): void {
            $table->id();
            $table->string('nama_panggilan');
            $table->unsignedTinyInteger('usia');
            $table->string('pendidikan_saat_ini');
            $table->string('cita_cita');
            $table->string('target_pendidikan');
            $table->text('target_5_tahun');
            $table->json('keterampilan');
            $table->text('komitmen_berani');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('future_maps');
    }
};
