<?php

use App\Models\KriteriaTes;
use App\Models\NormalisasiTes;
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
        Schema::create('kriteria_tes_normalisasi_tes', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(KriteriaTes::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(NormalisasiTes::class)->constrained()->cascadeOnDelete();
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
        Schema::dropIfExists('kriteria_tes_normalisasi_tes');
    }
};
