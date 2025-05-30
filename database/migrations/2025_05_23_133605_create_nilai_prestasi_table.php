<?php

use App\Models\KriteriaPrestasi;
use App\Models\Siswa;
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
        Schema::create('nilai_prestasi', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Siswa::class)->constrained('siswa')->cascadeOnDelete();
            $table->foreignIdFor(KriteriaPrestasi::class)->constrained('kriteria_prestasi')->cascadeOnDelete();
            $table->integer('nilai_prestasi');
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
        Schema::dropIfExists('nilai_prestasi');
    }
};
