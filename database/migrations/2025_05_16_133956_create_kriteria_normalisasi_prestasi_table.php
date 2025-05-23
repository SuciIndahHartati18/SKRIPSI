<?php

use App\Models\KriteriaPrestasi;
use App\Models\NormalisasiPrestasi;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kriteria_normalisasi_prestasi', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(KriteriaPrestasi::class)->constrained('kriteria_prestasi')->cascadeOnDelete();
            $table->foreignIdFor(NormalisasiPrestasi::class)->constrained('normalisasi_prestasi')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kriteria_normalisasi_prestasi');
    }
};
