<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('future_maps', function (Blueprint $table): void {
            $table->string('pernah_mengalami_kendala')->default('Tidak')->after('target_5_tahun');
            $table->text('cara_mengatasi_kendala')->nullable()->after('pernah_mengalami_kendala');
        });
    }

    public function down(): void
    {
        Schema::table('future_maps', function (Blueprint $table): void {
            $table->dropColumn(['pernah_mengalami_kendala', 'cara_mengatasi_kendala']);
        });
    }
};
